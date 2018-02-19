<?
namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use Log;

class HomepageViewController extends HomepageController
{
    public function __construct()
    {
        
    }
    
    public function coin()
    {
        $room_id = request('room_id') ?? '';
        $coin_arr = [
            'btc', 
            'bch', 
            'eth', 
            'etc', 
            'xrp', 
            'ltc', 
            'btg', 
            'zec',
        ];

        if (in_array(strtolower($room_id), $coin_arr)) {
            return view("/homepage/coin", ['room_id' => $room_id]);
        } else {
            return abort(404);
        }
        
    }
}