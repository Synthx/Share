<?php

namespace App;

class Auth
{
	private static $_logged = false;
	private static $_infos;
	private static $_model;
	private static $_login;
	private static $_password;

	/**
	 * Init auth class
	 * @param  string $model
	 * @param  string $loginColumn
	 * @param  string $passwordColumn
	 */
	public static function init(string $model, string $loginColumn, string $passwordColumn)
	{
		self::$_model = $model;
		self::$_login = $loginColumn;
		self::$_password = $passwordColumn;

		if (Cookie::exist('_token'))
        {
            $id = Crypt::decrypt(Cookie::get('_token'));

            $user = self::$_model::find($id);

            self::$_logged = true;
            self::$_infos = $user;
            return;
        }

		if (Session::exist('_token'))
		{
			$id = Crypt::decrypt(Session::get('_token'));

			$user = self::$_model::find($id);

			self::$_logged = true;
			self::$_infos = $user;
			return;
		}
	}

	/**
	 * Return true if the current user is connected
	 * @return boolean
	 */
	public static function isConnected(): bool
	{
		return self::$_logged;
	}

	/**
	 * Return user properties
	 * @return stdClass
	 */
	public static function user()
	{
		return self::$_infos;
	}

	/**
	 * Logout the current user
	 */
	public static function logout(): void
	{
		self::$_logged = false;
		self::$_infos = null;

		Session::destroy('_token');
		Cookie::delete('_token');
	}

	/**
	 * Login a user
	 * @param  string  $login
	 * @param  string  $password
	 * @param  boolean $remember
	 * @return boolean
	 */
	public static function login(string $login, string $password, bool $remember=false): bool
	{
		$user = self::$_model::where(self::$_login, $login)->first();

		if (!$user || !password_verify($password, $user->password))
			return false;

		Session::set('_token', Crypt::encrypt($user->id));

		if ($remember)
            Cookie::set('_token', Crypt::encrypt($user->id));

		return true;
	}
}