<?php

use Http\Forms\SignupForm;
use Core\App;
use Core\Database;

$form = SignupForm::validate($attributes = [
    "username" => $_POST["username"],
    "email" => $_POST["email"],
    "password" => $_POST["password"]
]);

$user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
    "email" => $attributes["email"]
])->find();

if ($user) {

    $form->error(
        "email_already_in_use", "A user with that email adress already exists."
    )->throw();

} else {

    App::resolve(Database::class)->query(
        "INSERT INTO users(username, pwd, email) VALUES(:username, :pwd, :email)", [
            "username" => $attributes["username"],
            "pwd" => password_hash($attributes["password"], PASSWORD_BCRYPT),
            "email" => $attributes["email"]
        ]);

    (new Core\Authenticator)->login($attributes["username"]);

}

redirect("/");