<?php

namespace Middlewares;

class Auth
{
    public function rule()
    {
        if (guest())
            return redirect()->with(['error' => 'Vous devez être connecté pour accéder à cette page.'])->route('user.login');
    }
}