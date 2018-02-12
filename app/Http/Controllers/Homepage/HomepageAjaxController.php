<?
namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageAjaxController extends HomepageController
{
    /*
     * Ajax Å×½ºÆ®
     *
     */
    public function getTestAjax()
    {
        $result = [
            'result'  => 'sucess',
            'message' => 'homepage controller test'
        ];
        
        return $result;
    }
}