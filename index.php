<?php

define('URL', $_SERVER['REQUEST_SCHEME'].'://'.$_SERVER['HTTP_HOST'].str_replace('/index.php', '', $_SERVER['SCRIPT_NAME']));
define('METHOD', $_SERVER['REQUEST_METHOD']);
define('DS', DIRECTORY_SEPARATOR);
define('DIR', __DIR__);

session_start();
setlocale(LC_TIME, 'fr_FR.utf8', 'fra');

$loader = require DIR . '/vendor/autoload.php';
$loader->addPsr4('App\\', DIR . '/App');
$loader->addPsr4('Controllers\\', DIR . '/Controllers');
$loader->addPsr4('Models\\', DIR . '/Models');
$loader->addPsr4('Middlewares\\', DIR . '/Middlewares');
$loader->addPsr4('Library\\', DIR . '/Library');

use App\Kernel;
Kernel::boot();
Kernel::run();
Kernel::end();