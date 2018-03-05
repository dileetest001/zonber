<?php

namespace App\Classes\Common;

use App\Traits\Common;
use Curl;
use Log;

class CurlExchange
{
    use Common;
    
    private $bithumb_key = '3abb99ff4f9f02190634b3934c6b3cde';
    private $bithumb_secret_key = '-';
    private $coinone_key = '9b9ea2d4-9afc-4f5d-8d1c-e32bf71bb084';
    private $coinone_secret_key = '18b52d65-4bc2-42fa-b4b6-83887e473c02';
    
    private $doller;
    
    public function __construct()
    {
        $response = $this->getExchangeRate();
        $this->doller = $response['usd'];
    }
    
    /*
     *
     * BTC, ETH, DASH, LTC, ETC, XRP, BCH, XMR, ZEC, QTUM, BTG, EOS (기본값: BTC)
     *
     */
    public function getBithumbInfo($currency)
    {
        // 대문자 변형
        $currency = strtoupper($currency);
        
		list($usec, $sec) = explode(' ', microtime());
		$usec = substr($usec, 2, 3); 
		$usec_time = intval($sec.$usec);
		
        // 파라미터
        $par = [
			'Api-Key'   => $this->bithumb_key,
			'Api-Sign'  => $this->bithumb_secret_key,
			'Api-Nonce' => $usec_time,
        ];
        
        $response = Curl::to('https://api.bithumb.com/public/orderbook/'.$currency)
                        ->withData($par)
                        ->withTimeout(3)
                        ->post();
        $json_data = json_decode($response, true);
        
        if ($json_data['status'] != 5500) {
            $price = $json_data['data']['asks'][0]['price'] ?? 0;

            $return_arr = [
                'status'     => $json_data['status'],
                'price_usd'  => $price ? $price/$this->doller : 0,
                'price_krw'  => $price ? $price : 0,
            ];
        } else {
            $return_arr = [
                'status'     => $json_data['status'],
                'price_usd'  => 0,
                'price_krw'  => 0,
            ];
        }
        
        
        return $return_arr;
    }
    
    /*
     *
     * btc, bch, eth, etc, xrp, qtum, iota, ltc, btg, zec
     *
     */
	public function getCoinoneInfo($currency)
	{
	    // 소문자 변형
        $currency = strtolower($currency);

        // 파라미터
        $par = [
            'currency' => $currency
        ];
        $response = Curl::to('https://api.coinone.co.kr/orderbook/')
                        ->withContentType('application/json')
                        ->withData($par)
                        ->withTimeout(3)
                        ->get();
        $json_data = json_decode($response, true);
        
        if (isset($json_data['currency']) && $currency == $json_data['currency']) {
            $price = $json_data['ask'][0]['price'] ?? 0;
        
            $return_arr = [
                'status'     => $json_data['errorCode'],
                'price_usd'  => $price ? $price/$this->doller : 0,
                'price_krw'  => $price ? $price : 0,
            ];
        } else {
            $return_arr = [
                'status'     => 5500,
                'price_usd'  => 0,
                'price_krw'  => 0,
            ];
        }
        
        return $return_arr;
	}
	
    /*
     *
     * BTC, ETH, DASH, LTC, ETC, XRP, BCC, XMR, ZEC, QTUM, BTG, EOS 
     *
     */
	public function getUpbitInfo($currency)
	{
	    if ($currency == 'bch') {
	        $currency = 'bcc';
	    }
	    
	    // 소문자 변형
        $currency = strtoupper($currency);

        // 요청
        $response = Curl::to('https://crix-api-endpoint.upbit.com/v1/crix/candles/minutes/1?code=CRIX.UPBIT.KRW-'.$currency.'&count=1')
                        ->withContentType('application/json')
                        ->withTimeout(3)
                        ->get();
        $json_data = json_decode($response, true);
        
        if ($json_data) {
            $price = $json_data[0]['tradePrice'] ?? false;
        
            $return_arr = [
                'status'     => 0,
                'price_usd'  => $price ? $price/$this->doller : 0,
                'price_krw'  => $price ? $price : 0,
            ];
        } else {
            $return_arr = [
                'status'     => 5500,
                'price_usd'  => 0,
                'price_krw'  => 0,
            ];
        }
        
        
        return $return_arr;
	}
	
    /*
     *
     * btc, bch, eth, etc, xrp, qtum, iota, ltc, btg
     *
     */
	public function getBitfinextInfo($currency)
	{
	    $currency = strtoupper($currency)."USD";
        
        $response = Curl::to('https://api.bitfinex.com/v1/book/'.$currency)
                        ->withContentType('application/json')
                        ->withTimeout(3)
                        ->get();
        $json_data = json_decode($response, true);

        if (!isset($json_data['message']) || $json_data['message'] != 'Unknown symbol') {
            $price = $json_data['asks'][0]['price'] ?? 0;

            $return_arr = [
                'status' => 0,
                'price_usd'  => $price ? $price : 0,
                'price_krw'  => $price ? $price*$this->doller : 0,
            ];
        } else {
            $return_arr = [
                'status' => 5500,
                'price_usd'  => 0,
                'price_krw'  => 0,
            ];
        }

	    return $return_arr;
	}

}