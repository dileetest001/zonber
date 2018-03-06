<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Redis;

use App\Classes\Common\CurlExchange;
use App\Models\Zonber\CoinInfo;

use Log;

class CurlBtcInfo extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'command:get_bit_info';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = '코인 정보 API 호출';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        //
        $currency_arr = config('app.access_coin');
        
        foreach ($currency_arr as $currency) {
            sleep(1);
            $CurlExchange = new CurlExchange();
            
            // 비트파이넥스 DB 저장
            $bitfinex_info = $CurlExchange->getBitfinextInfo($currency);
            if ($bitfinex_info['status'] != 5500) {
                $this->setDatabaseCoin(1, $currency, $bitfinex_info);
            }
            
            // 빗썸 DB 저장
            $bithumb_info  = $CurlExchange->getBithumbInfo($currency);
            if ($bithumb_info['status'] != 5500) {
                $this->setDatabaseCoin(2, $currency, $bithumb_info);
            }
            
            // 코인원 DB 저장
            $coinone_info  = $CurlExchange->getCoinoneInfo($currency);
            if ($coinone_info['status'] != 5500) {
                $this->setDatabaseCoin(3, $currency, $coinone_info);
            }
            
            // 업비트 DB 저장
            $upbit_info = $CurlExchange->getUpbitInfo($currency);
            if ($upbit_info['status'] != 5500) {
                $this->setDatabaseCoin(4, $currency, $upbit_info);
            }
            
        }

    }
    
    private function setDatabaseCoin($trade_market, $currency, $info)
    {
        $coin_info = CoinInfo::where([
                                    ['currency', $currency],
                                    ['trade_market', $trade_market]
                                ])->first();
        if (!$coin_info) {
            CoinInfo::create([
                'trade_market' => $trade_market,
                'currency'     => $currency,
                'krw'          => $info['price_krw'],
                'usd'          => $info['price_usd'],
            ]);
        } else {
            $coin_info->krw = $info['price_krw'];
            $coin_info->usd = $info['price_usd'];
            $coin_info->save();
        }
    }
}
