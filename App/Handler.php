<?php

namespace App;

use Exception;

class Handler
{
    /**
     * Show basic error view
     * @param  Exception $e
     */
    public static function handleError(Exception $e)
    {
        View::render('errors.exception', [
            'title' => $e->getCode(),
            'message' => $e->getMessage(),
            'file' => $e->getFile(),
            'line' => $e->getLine(),
            'traces' => $e->getTrace()
        ]);
        exit;
    }

    /**
     * Handle error with code
     * @param  int    $code
     */
    public static function handleCode(int $code)
    {
        View::render("errors.{$code}");
        exit;
    }

    /**
     * Handle error with message
     * @param  string $message
     */
    public static function handleMessage(string $message)
    {
        echo $message;
        exit;
    }
}