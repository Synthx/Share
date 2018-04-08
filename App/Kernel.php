<?php

namespace App;

use Exception;

class Kernel extends Handler
{
    public static function boot()
    {
        try
        {
            if (!file_exists(DIR . '/config/app.php'))
                throw new Exception("Impossible to locate file [config/app.php]", 0);

            $config = require DIR . '/config/app.php';
            Config::init($config);

            if (!file_exists(DIR . '/config/routes.php'))
                throw new Exception("Impossible to locate file [config/routes.php]", 0);

            include DIR . '/config/routes.php';

            include DIR . '/config/utils.php';

            Crypt::init(config('crypt.key1'), config('crypt.key2'));

            Model::init(config('database.host'), config('database.name'), config('database.user'), config('database.pass'));

            Auth::init(config('auth.model'), config('auth.login'), config('auth.password'));
        }
        catch (Exception $e)
        {
            self::handleError($e);
        }
    }

    public static function run()
    {
        try
        {
            $uri = (isset($_GET['uri']) && preg_match('/[0-9A-Za-z_\-\/]+/', $_GET['uri'])) ? $_GET['uri'] : '/';

            Router::match($uri);
        }
        catch (Exception $e)
        {
            self::handleError($e);
        }
    }

    public static function end()
    {
        Session::set('previous', Router::current());
        Session::cleanFlash();
    }
}