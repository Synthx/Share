<?php

namespace App;

use Jenssegers\Blade\Blade;

class View
{
    /**
     * Render view with name and params
     * @param string $name 
     * @param array  $params
     */
    public static function render(string $name, array $params=[])
    {
        $token = bin2hex(random_bytes(12));
        Session::set('csrf_token', $token);

        $errors = new Error;
        $params['errors'] = $errors;

        $blade = new Blade('views', 'cache');
        $blade->compiler()->directive('datetime', function ($expression) {
            return "<?php echo strftime(\"%e %B %Y à %Hh%M\", with({$expression})->getTimestamp()); ?>";
        });

        echo $blade->make($name, $params);
    }
}