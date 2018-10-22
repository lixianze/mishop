<?php

namespace App\Http\Middleware;

use Closure;
//use Illuminate\Support\Facades\Session;

class TestMiddle
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        if(session()->get('admin_name') == ''){

            return redirect('adminstage/adminPage')
                ->withErrors(['此授权码已过期，请重新生成！']);
        }else{
            return $next($request);
        }

    }
}
