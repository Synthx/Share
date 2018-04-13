<?php

namespace App;

class Redirect
{
    /**
     * Redirect to the route
     * @param  string $name
     */
    public function route(string $name)
    {
        header('Location: ' . route($name), true, 303);
        exit;
    }

    /**
     * Add old inputs when redirecting
     * @param  Request $request
     * @return Request
     */
    public function withInputs(Request $request): self
    {
        foreach ($request->inputs() as $key => $value)
            Session::setFlash($key, 'old', $value);

        return $this;
    }

    /**
     * Add flashs messages when redirecting
     * @param  array  $flashs
     * @return Request
     */
    public function with(array $flashs): self
    {
        foreach ($flashs as $key => $message)
            Session::setFlash($key, 'flash', $message);

        return $this;
    }

    /**
     * Redirect to the previous uri
     */
    public function back()
    {
        $routeName = Session::get('previous');

        header('Location: ' . route($routeName), true, 303);
        exit;
    }
}