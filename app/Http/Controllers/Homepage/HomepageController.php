<?
namespace App\Http\Controllers\Homepage;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class HomepageController extends Controller
{
    /**
     * Ajax Action
     *
     */
    public function controllerAction(Request $request)
    {
        return $this->{camel_case($request->action)}();
    }
}