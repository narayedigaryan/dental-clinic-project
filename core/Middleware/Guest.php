<?php

namespace core\Middleware;

class Guest
{
    public function handle():void
    {
        if(check_auth()){
            response()->redirect(base_url('admins/includes/dashboard'));
        }
    }

}