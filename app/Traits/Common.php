<?php

namespace App\Traits;

use Curl;
use Log;

trait Common
{
    /**
     * 환율 정보 가져오기
     *
     * @return array
     */
    public function getExchangeRate()
    {
        $return_response = [
            'krw' => 1,
        ];
        $response = Curl::to('http://api.manana.kr/exchange/rate.json')
                        ->withContentType('application/json')
                        ->withTimeout(3)
                        ->get();
        $json_result = json_decode($response, true);

        foreach ($json_result as $result) {
            if ($result['name'] == 'USDKRW=X') {
                $return_response['usd'] = $result['rate'];
            } elseif ($result['name'] == 'JPYKRW=X') {
                $return_response['jpy'] = $result['rate'];
            }
        }
        
        return $return_response;
    }
    
}
