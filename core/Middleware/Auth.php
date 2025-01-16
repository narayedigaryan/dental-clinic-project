<?php

namespace core\Middleware;

use Closure;

class Auth
{
    public function handle():void
    {
        if(!check_auth()){
            session()->setFlash('error','Forbidden');
            response()->redirect(base_url('/login'));
        }
    }
}