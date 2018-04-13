<?php

namespace Controllers;

use App\{Validation, Request};

class Controller
{
    public function validate(Request $request, array $arrayRules, $routeName=null)
    {
        $validator = new Validation($request, $arrayRules);

        if ($validator->countErrors() > 0)
        {
            $validator->generateErrors();

            $response = redirect()->withInputs($request);

            if ($routeName)
                return $response->route($routeName);
            else
                return $response->back();
        }
    }
}