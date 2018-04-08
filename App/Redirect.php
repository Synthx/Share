<?php

namespace App;

class Redirect
{
    public function route($name)
    {
        header('Location: ' . route($name), true, 303);
        exit;
    }

    public function withInputs(Request $request)
    {
        foreach ($request->inputs() as $key => $value)
            Session::setFlash($key, 'old', $value);

        return $this;
    }

    public function with($flashs)
    {
        foreach ($flashs as $key => $message)
            Session::setFlash($key, 'flash', $message);

        return $this;
    }

    public function back()
    {
        $routeName = Session::get('previous');

        header('Location: ' . route($routeName), true, 303);
        exit;
    }
}