<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return string|null
     */
    protected function redirectTo($request)
    {
        if ($request->is('admin/*')) {
            return $request->expectsJson() == false ? route('admin.login'):'';
        }elseif($request->is('teacher/*')){
            return $request->expectsJson() == false ? route('teacher.login'):'';
        }elseif($request->is('parent/*')){
            return $request->expectsJson() == false ? route('parent.login'):'';
        }elseif($request->is('stuff/*')){
            return $request->expectsJson() == false ? route('stuff.login'):'';
        }else{
            return $request->expectsJson() == false ? route('login'):'';
        }
    }
}
