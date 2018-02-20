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
            sleep(2);
            $CurlExchange = new CurlExchange();
            
            // 비트파이넥스 DB 저장
            $bitfinex_info = $CurlExchange->getBitfinextInfo($currency);
            $bitfinex_coin_info = CoinInfo::where([
                                                ['currency', $currency],
                                                ['trade_market', 1]
                                            ])->first();
                                            
            if (!$bitfinex_coin_info) {
                $bitfinex_coin_info = CoinInfo::create([
                    'trade_market' => 1,
                    'currency'     => $currency,
                    'krw'          => $bitfinex_info['price_krw'],
                    'usd'          => $bitfinex_info['price_usd'],
                ]);
            } else {
                $bitfinex_coin_info->krw = $bitfinex_info['price_krw'];
                $bitfinex_coin_info->usd = $bitfinex_info['price_usd'];
                $bitfinex_coin_info->save();
            }
            
            // 빗썸 DB 저장
            $bithumb_info  = $CurlExchange->getBithumbInfo($currency);
            $bithumb_coin_info = CoinInfo::where([
                                                ['currency', $currency],
                                                ['trade_market', 2]
                                            ])->first();
                                            
            if (!$bithumb_coin_info) {
                $bithumb_coin_info = CoinInfo::create([
                    'trade_market' => 2,
                    'currency'     => $currency,
                    'krw'          => $bithumb_info['price_krw'],
                    'usd'          => $bithumb_info['price_usd'],
                ]);
            } else {
                $bithumb_coin_info->krw = $bithumb_info['price_krw'];
                $bithumb_coin_info->usd = $bithumb_info['price_usd'];
                $bithumb_coin_info->save();
            }
            
            
            // 코인원 DB 저장
            $coinone_info  = $CurlExchange->getCoinoneInfo($currency);
            $coinone_coin_info = CoinInfo::where([
                                                ['currency', $currency],
                                                ['trade_market', 3]
                                            ])->first();
                                            
            if (!$coinone_coin_info) {
                $coinone_coin_info = CoinInfo::create([
                    'trade_market' => 3,
                    'currency'     => $currency,
                    'krw'          => $coinone_info['price_krw'],
                    'usd'          => $coinone_info['price_usd'],
                ]);
            } else {
                $coinone_coin_info->krw = $coinone_info['price_krw'];
                $coinone_coin_info->usd = $coinone_info['price_usd'];
                $coinone_coin_info->save();
            }
            
        }

    }
}
