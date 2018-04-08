<?php

namespace App;

use Exception;

class Config
{
    private static $_config;

    public static function init($array)
    {
        self::_exploreArray($array);
    }

    private static function _exploreArray($array, $level=0, $prefix='')
    {
        foreach ($array as $key => $value)
        {
            if ($level == 0)
                $prefix = '';

            if (!is_array($value))
                self::$_config[$prefix . $key] = $value;
            else
            {
                $prefix .= $key . '.';
                $level += 1;

                self::_exploreArray($value, $level, $prefix);

                $level -= 1;
            }
        }
    }

    public static function get($key)
    {
        if (!self::_exist($key))
            throw new Exception("Unknown config key [{$key}].", 0);

        return self::$_config[$key];
    }

    private static function _exist($key)
    {
        return array_key_exists($key, self::$_config);
    }
}