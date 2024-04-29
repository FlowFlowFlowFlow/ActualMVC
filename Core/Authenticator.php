<?php

namespace Core;

class Authenticator
{

    public function attempt($email, $password)
    {

        $user = App::resolve(Database::class)->query("SELECT * FROM users WHERE email = :email", [
            "email" => $email
        ])->find();

        if ($user) {

            if (password_verify($password, $user["pwd"])) {

                $this->login($user["username"]);

                return true;

            }

        }

        return false;

    }

    public function login($username)
    {

        $_SESSION["user"]["username"] = $username;

        session_regenerate_id(true);

    }

    public static function logout()
    {

        Session::destroy();

    }

}