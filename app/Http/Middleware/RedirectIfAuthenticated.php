<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @param  string|null  ...$guards
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next, ...$guards)
    {
        $guards = empty($guards) ? [null] : $guards;

        
        foreach ($guards as $guard) {
            // if($request->is('*parent*') == false){
            //     return redirect()->back();
            // }
            if (Auth::guard($guard)->check()) {
                if(Auth::guard('admin')->check()){
                    return redirect(RouteServiceProvider::ADMIN_HOME);
                }elseif(Auth::guard('teacher')->check()){
                    return redirect(RouteServiceProvider::TEACHER_HOME);
                }elseif(Auth::guard('parent')->check()){
                    return redirect(RouteServiceProvider::PARENT_HOME);
                }elseif(Auth::guard('stuff')->check()){
                    return redirect(RouteServiceProvider::STUFF_HOME);
                }elseif(Auth::guard('student')->check()){
                    return redirect(RouteServiceProvider::STUDENT_HOME);
                }else{
                    return redirect(RouteServiceProvider::HOME);
                }
            }else{
                redirect()->route('login');
            }
        }

        return $next($request);
    }
}
