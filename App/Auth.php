<?php

namespace App;

class Auth
{
	private static $_logged = false;
	private static $_infos;
	private static $_model;
	private static $_login;
	private static $_password;

	public static function init($model, $loginColumn, $passwordColumn)
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

	public static function isConnected()
	{
		return self::$_logged;
	}

	public static function user()
	{
		return self::$_infos;
	}

	public static function logout()
	{
		self::$_logged = false;
		self::$_infos = null;

		Session::destroy('_token');
		Cookie::delete('_token');
	}

	public static function login($login, $password, $remember=false)
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