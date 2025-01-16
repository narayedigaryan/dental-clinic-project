<?php

namespace core;

class Cache
{
    public static function set($key, $data, $seconds = 3600):void
    {
        $content['data'] = $data;
        $content['end_time'] = time() + $seconds;
        $content_file = CACHE . '/' . md5($key) . '.txt';
        file_put_contents($content_file, serialize($content));
    }
    public static function get($key,$default=null)
    {
        $content_file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($content_file)) {
            $content = unserialize(file_get_contents($content_file));
            if(time() <= $content['end_time']) {
                return $content['data'];
            }
            unlink($content_file);
        }
            return $default;
    }
    public static function remove($key):void
    {
        $content_file = CACHE . '/' . md5($key) . '.txt';
        if (file_exists($content_file)) {
            unlink($content_file);
        }
    }
}