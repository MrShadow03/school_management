<?php
    foreach (array('admin','student','teacher','parent','stuff') as $i_guard) {
        if(Auth::guard($i_guard)->check()){
            $guard = $i_guard;
            break;
        }else{
            $guard = '';
        }
    }
//
$user = Auth::guard($guard)->user() ?? 'invalid user';
$logout_route = $guard == 'student'? 'logout' : $guard.'.logout';

?>