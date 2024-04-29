<?php

use Http\Forms\LoginForm;

$form = LoginForm::validate($attributes = [
    "email" => $_POST["email"],
    "password" => $_POST["password"]
]);

$signedIn = (new Core\Authenticator)->attempt($attributes["email"], $attributes["password"]);

if (!$signedIn) {

    $form->error(
        "not_matching", "The combination of that email adress and password is incorrect."
    )->throw();

}

redirect("/");