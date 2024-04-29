<?php

namespace Http\Forms;

use Core\Validator;

class SignupForm extends Form
{

    public function __construct(public array $attributes)
    {
    
        if (!Validator::string($attributes["username"], 8, 255)) {

            $this->errors["username"] = "Provide a username of at least 8 characters.";

        }

        if (!Validator::email($attributes["email"])) {

            $this->errors["email"] = "Provide a valid email adress.";

        }

        if (!Validator::string($attributes["password"], 8, 255)) {

            $this->errors["password"] = "Provide a password of at least 8 characters.";

        }

    }

}