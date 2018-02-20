<?
namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use App\Classes\Common\CurlExchange;
use App\Models\Zonber\CoinInfo;
use App\Http\Controllers\Controller;

use Log;

class HomepageAjaxController extends HomepageController
{
    /*
     * SendMessage
     *
     */
    public function sendMessage()
    {
        $message   = request('message');
        $room_id   = request('room_id');
        $user_id   = request('user_id');
        $user_name = request('user_name');
        
        $redis_client = Redis::connection('redis_socket');
        $channel_name = $room_id;

        $data = [
            'user_id'   => $user_id,
            'user_name' => $user_name,
            'message'   => $message,
            'room_id'   => $room_id,
            'type'      => 'send_message',
        ];

        $response = $redis_client->publish($channel_name, json_encode($data));

        return $data;
    }
         
    /*
     * get bitfinex info
     *
     */
    public function getCoinInfo()
    {
        $currency = request('currency');
        $trade_market = request('trade_market');
        
        $coin_info = CoinInfo::where([
            ['currency', $currency],
            ['trade_market', $trade_market]
        ])->first();

        return $coin_info;
    }
}