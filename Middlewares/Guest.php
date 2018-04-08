<?php

namespace Middlewares;

class Guest
{
    public function rule()
    {
        if (auth())
            return redirect()->route('home');
    }
}