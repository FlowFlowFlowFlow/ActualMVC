<?php

namespace Http\Forms;

use Core\Validator;

class LoginForm extends Form
{

    public function __construct(public array $attributes)
    {
    
        if (!Validator::email($attributes["email"])) {
    
            $this->errors["email"] = "Provide a valid email adress.";

        }

        if (!Validator::string($attributes["password"])) {

            $this->errors["password"] = "Provide a valid password.";

        }

    }

}