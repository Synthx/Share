<?php

use App\View;
use App\Router;
use App\Config;
use App\Session;
use App\Redirect;
use App\Auth;

/* ROUTER */

function route($name)
{
	return Router::url($name);
}

function url($uri)
{
	return Router::to($uri);
}

/* CONFIG */

function config($key)
{
	return Config::get($key);
}

/* AUTH */

function auth()
{
	return Auth::isConnected();
}

function guest()
{
	return !Auth::isConnected();
}

function user()
{
    return Auth::user();
}

/* VIEW */

function view($filePath, $params=[])
{
	View::render($filePath, $params);
}

/* SESSION */

function old($key, $default='')
{
	return Session::getFlash($key, 'old', $default);
}

function flashExist($key)
{
    return Session::existFlash($key, 'flash');
}

function flashGet($key)
{
    return Session::getFlash($key, 'flash');
}

/* REDIRECT */

function redirect()
{
	return new Redirect;
}

/* MISC */

function asset($path)
{
    return URL . '/' . $path;
}

function csrf()
{
    $token = Session::get('csrf_token');

    return '<input type="hidden" name="csrf_token" value="'.$token.'">';
}