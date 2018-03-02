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
        return view("/homepage/coin", ['room_id' => 'btc']);
    }
}