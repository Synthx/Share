<?php

use App\{View, Router, Config, Session, Redirect, Auth};

// ROUTER

/**
 * Return route uri with name
 * @param  string $name
 * @return string
 */
function route(string $name): string
{
	return Router::url($name);
}

/**
 * Return full uri with uri
 * @param  string $uri
 * @return string
 */
function url(string $uri): string
{
	return Router::to($uri);
}

// CONFIG

/**
 * Get config value with key
 * @param  string $key
 * @return mixed 
 */
function config(string $key)
{
	return Config::get($key);
}

// AUTH

/**
 * Check if current user is authentified
 * @return boolean
 */
function auth(): bool
{
	return Auth::isConnected();
}

/**
 * Check if current user is not authentified
 * @return boolean
 */
function guest(): bool
{
	return !Auth::isConnected();
}

/**
 * Return current user informations
 * @return stdClass
 */
function user()
{
    return Auth::user();
}

// VIEW

/**
 * Render view with name and params
 * @param string $filePath
 * @param array  $params
 */
function view(string $filePath, array $params=[])
{
	View::render($filePath, $params);
}

// SESSION

/**
 * Return old value of input with key
 * @param  string $key
 * @param  mixed $default
 * @return string
 */
function old(string $key, $default=''): string
{
	return Session::getFlash($key, 'old', $default);
}

/**
 * Check if flash session exist
 * @param  string $key
 * @return boolean
 */
function flashExist(string $key): bool
{
    return Session::existFlash($key, 'flash');
}

/**
 * Get flash session with key
 * @param  string $key
 * @return string
 */
function flashGet(string $key): string
{
    return Session::getFlash($key, 'flash');
}

// REDIRECT

/**
 * Return instance of Redirect class
 * @return Redirect
 */
function redirect(): Redirect
{
	return new Redirect;
}

// MISC

/**
 * Return full uri for resource
 * @param  string $resource
 * @return string
 */
function asset(string $resource): string
{
    return URL . '/' . $resource;
}

/**
 * Create csrf token and return input
 * @return string
 */
function csrf(): string
{
    $token = Session::get('csrf_token');

    return '<input type="hidden" name="csrf_token" value="'.$token.'">';
}