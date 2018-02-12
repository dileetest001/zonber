<?
namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageViewController extends HomepageController
{
    public function __construct()
    {
        
    }

    public function main()
    {
        return $this->routePageView("/homepage/main/index");
    }
}