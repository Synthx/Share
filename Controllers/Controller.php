<?php

namespace Controllers;

use App\Validation;
use App\Request;

class Controller
{
    public function validate(Request $request, $arrayRules)
    {
        $validator = new Validation($request, $arrayRules);

        if ($validator->countErrors() > 0)
        {
            $validator->generateErrors();

            return redirect()->withInputs($request)->back();
        }
    }
}