<?php

namespace App;

use Exception;

class Validation
{
    private $_errors = [];
    private $_inputs = [];
    private $_fields;

    public function __construct(Request $request, $arrayRules)
    {
        $this->_fields = require DIR . '/config/validation.php';

        foreach ($arrayRules as $key => $rules)
        {
            $rules = explode('|', $rules);
            $this->_inputs[$key] = $request->{$key};

            if (METHOD == 'POST')
            {
                if ($request->csrf_token == '' || Session::get('csrf_token') != $request->csrf_token)
                    throw new Exception('Invalid csrf token.');
            }

            foreach ($rules as $rule)
            {
                $rule = explode(':', $rule);

                if (isset($rule[1]))
                    $this->{$rule[0]}($key, $this->_inputs[$key], explode(',', $rule[1]));
                else
                    $this->{$rule[0]}($key, $this->_inputs[$key]);
            }
        }
    }

    public function getErrors()
    {
        return $this->_errors;
    }

    public function countErrors()
    {
        return count($this->_errors);
    }

    public function generateErrors()
    {
        if ($this->countErrors() > 0)
        {
            foreach ($this->_errors as $key => $message)
                Session::setFlash($key, 'errors', $message[0]);
        }
    }

    protected function required($key, $value)
    {
        if ($value == '')
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} est requis.");
        }
    }

    protected function email($key, $value)
    {
        if (!filter_var($value, FILTER_VALIDATE_EMAIL))
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} doit être une adresse e-mail valide.");
        }
    }

    protected function alpha_num($key, $value)
    {
        if (!preg_match('/^[0-9A-Za-z\-_]+$/', $value))
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} doit contenir uniquement des chiffres et des lettres.");
        }
    }

    protected function num($key, $value)
    {
        if (!preg_match('/^[0-9]+$/', $value))
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} doit contenir un nombre.");
        }
    }

    protected function string($key, $value)
    {
        if (!preg_match('/^[\s\wÀ-ÿ\-\,\.\"\' ]+$/', $value))
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} doit être une chaîne de caractères.");
        }
    }

    private function _validateDate($date, $format = 'd/m/Y H:i')
    {
        $d = \DateTime::createFromFormat($format, $date);
        return $d && $d->format($format) == $date;
    }

    protected function datetime($key, $value)
    {
        if (!$this->_validateDate($value))
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} n'est pas une date valide.");
        }
    }

    protected function date($key, $value)
    {
        if (!$this->_validateDate($value, 'd/m/Y'))
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} n'est pas une date valide.");
        }
    }

    protected function address($key, $value)
    {
        $e = explode(',', $value);

        if ($e[count($e) - 1] != ' France')
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} n'est pas une adresse valide.");
        }
    }

    protected function min($key, $value, $args)
    {
        if (intval($value) < intval($args[0]))
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "La valeur du champs {$field_name} doit être supérieure ou égale à {$args[0]}.");
        }
    }

    protected function max($key, $value, $args)
    {
        if (intval($value) > intval($args[0]))
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "La valeur du champs {$field_name} doit être inférieure ou égale à {$args[0]}.");
        }
    }

    protected function min_size($key, $value, $args)
    {
        if (strlen($value) < $args[0])
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} doit contenir au moins {$args[0]} caractères.");
        }
    }

    protected function max_size($key, $value, $args)
    {
        if (strlen($value) > $args[0])
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} ne peut contenir plus de {$args[0]} caractères.");
        }
    }

    protected function size($key, $value, $args)
    {
        if (strlen($value) != $args[0])
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} doit contenir exactement {$args[0]} caractères.");
        }
    }

    protected function sex($key, $value)
    {
        if (!in_array($value, ['m', 'f']))
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "Le champs {$field_name} n'est pas valide.");
        }
    }

    protected function exist($key, $value, $args)
    {
        if (Model::table($args[0])->where($args[1], $value)->count() == 0)
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "La valeur du champs {$field_name} est invalide.");
        }
    }

    protected function unique($key, $value, $args)
    {
        if (Model::table($args[0])->where($args[1], $value)->count() > 0)
        {
            $field_name = (array_key_exists($key, $this->_fields)) ? $this->_fields[$key] : $key ;

            if (!array_key_exists($key, $this->_errors))
                $this->_errors[$key] = [];

            array_push($this->_errors[$key], "La valeur du champs {$field_name} est déjà utilisée.");
        }
    }
}