<?
namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Redis;

use App\Traits\Common;
use App\Classes\Common\CurlExchange;
use App\Models\Zonber\CoinInfo;
use App\Models\Zonber\Chatting;
use App\Http\Controllers\Controller;

use Log;

class HomepageAjaxController extends HomepageController
{
    use Common;
    
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

        $data = [
            'user_id'   => $user_id,
            'user_name' => $user_name,
            'message'   => $message,
            'type'      => 'send_message',
        ];

        Chatting::create([
            'user_id'   => $user_id,
            'user_name' => $user_name,
            'message'   => $message,
            'type'      => 0,
        ]);

        $response = $redis_client->publish('chatting', json_encode($data));

        return $data;
    }
         
    /*
     * get info
     *
     */
    public function getCoinInfo()
    {
        $return_arr = [];
        
        $coin_infos = CoinInfo::get();
        
        foreach ($coin_infos as $coin_info) {
            $return_arr[$coin_info->currency][$coin_info->trade_market]['usd'] = $coin_info->usd;
            $return_arr[$coin_info->currency][$coin_info->trade_market]['krw'] = $coin_info->krw;
        }

        return $return_arr;
    }

    /*
     * get Chatting info
     *
     */
    public function getMessageInfo()
    {
        $chattings = Chatting::orderBy('id', 'desc')->limit(100)->get();

        return $chattings;
    }
    
    
    public function getRateInfo()
    {
        $response = $this->getExchangeRate();
        return $response;
    }
}