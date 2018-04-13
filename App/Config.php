<?php

namespace App;

use Exception;

class Config
{
    private static $_config;

    /**
     * Init config class with parsing config.php file
     * @param  array  $array
     */
    public static function init(array $array)
    {
        self::_exploreArray($array);
    }

    /**
     * Convert a multidimensional array to one dimension array
     * @param  array       $array
     * @param  int|integer $level
     * @param  string      $prefix
     */
    private static function _exploreArray(array $array, int $level=0, string $prefix='')
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

    /**
     * Get config value associated with key
     * @param  string $key
     * @return mixed
     */
    public static function get(string $key)
    {
        if (!self::_exist($key))
            throw new Exception("Unknown config key [{$key}].", 0);

        return self::$_config[$key];
    }

    /**
     * Return true if key exist in config
     * @param  string $key
     * @return boolean
     */
    private static function _exist(string $key): bool
    {
        return array_key_exists($key, self::$_config);
    }
}