<?php

namespace App;

class Crypt
{
    private static $_cryptMethod = 'AES-256-CBC';
	private static $_key;
	private static $_iv;

	/**
	 * Init crypt class
	 * @param  string $key
	 * @param  string $iv
	 */
	public static function init(string $key, string $iv)
	{
		self::$_key = hash('gost', $key);
		self::$_iv = substr(hash('sha512', $iv), 0, 16);
	}

	/**
	 * Encrypt data
	 * @param  string $data
	 * @return string
	 */
	public static function encrypt(string $data): string
	{
		return openssl_encrypt($data, self::$_cryptMethod, self::$_key, 0, self::$_iv);
	}

	/**
	 * Decrypt data
	 * @param  string $data
	 * @return string
	 */
	public static function decrypt(string $data): string
	{
		return openssl_decrypt($data, self::$_cryptMethod, self::$_key, 0, self::$_iv);
	}
}