<?php

namespace App;

use Exception;

class Handler
{
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

    public static function handleCode(int $code)
    {
        View::render("errors.{$code}");
        exit;
    }

    public static function handleMessage(string $message)
    {
        echo $message;
        exit;
    }
}