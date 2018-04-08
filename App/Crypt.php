<?php

namespace App;

class Crypt
{
    private static $_cryptMethod = 'AES-256-CBC';
	private static $_key;
	private static $_iv;

	public static function init($key, $iv)
	{
		self::$_key = hash('gost', $key);
		self::$_iv = substr(hash('sha512', $iv), 0, 16);
	}

	public static function encrypt($data)
	{
		return openssl_encrypt($data, self::$_cryptMethod, self::$_key, 0, self::$_iv);
	}

	public static function decrypt($data)
	{
		return openssl_decrypt($data, self::$_cryptMethod, self::$_key, 0, self::$_iv);
	}
}