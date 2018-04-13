<?php

namespace App;

class Cookie
{
    /**
     * Set a cookie
     * @param string      $name
     * @param mixed       $value
     * @param int|integer $time
     */
    public static function set(string $name, $value, int $time=0)
    {
        if ($time == 0)
            $time = 365*24*3600;

        setcookie($name, $value, time() + $time, '/', null, false, true);
    }

    
    /**
     * Retrieve cookke value
     * @param  string $name
     * @param  string $default
     * @return string
     */
    public static function get(string $name, $default=''): string
    {
        if (!self::exist($name))
            return $default;

        return $_COOKIE[$name];
    }

    /**
     * Delete cookie associated with name
     * @param  string $name
     */
    public static function delete(string $name)
    {
        if (self::exist($name))
        {
            unset($_COOKIE[$name]);
            self::set($name, "", -3600);
        }
    }

    /**
     * Return true if cookie with name exist
     * @param  string $name
     * @return boolean
     */
    public static function exist(string $name): bool
    {
        return isset($_COOKIE[$name]);
    }
}