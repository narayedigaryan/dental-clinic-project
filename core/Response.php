<?php

namespace core;

class Response
{
    public function setResponseCode(int $code)
    {
        http_response_code($code);
    }
    public function redirect($url='')
    {
        if($url){
            $redirect = $url;
        }else{
            $redirect = $_SERVER['HTTP_REFERER'] ?? base_url('/');
        }
        header("Location: $redirect");
        die;
    }

}