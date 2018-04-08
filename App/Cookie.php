<?php

namespace App;

class Cookie
{
    public static function set($name, $value, $time=0)
    {
        if ($time == 0)
            $time = 365*24*3600;

        setcookie($name, $value, time() + $time, '/', null, false, true);
    }

    public static function get($name, $default='')
    {
        if (!self::exist($name))
            return $default;

        return $_COOKIE[$name];
    }

    public static function delete($name)
    {
        if (self::exist($name))
        {
            unset($_COOKIE[$name]);
            self::set($name, "", -3600);
        }
    }

    public static function exist($name)
    {
        return isset($_COOKIE[$name]);
    }
}