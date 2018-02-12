<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
    
    protected function routePageView($view)
    {
        if (view()->exists($view)) {
            return view($view);
        } else {
            // 뷰 페이지 없을시 404 페이지로 redirect
            return abort(404);
        }
    }
}
