<?php

function dump_and_exit($value) 
{

    echo "<pre>";
    var_dump($value);
    echo "<pre>";

    exit();

}

function base_path($path)
{

    return BASE_PATH . $path;

}

function view($path, $attributes = [])
{

    extract($attributes);

    require base_path("view/{$path}.php");

}

function url_is($value)
{

    return $_SERVER["REQUEST_URI"] === $value;

}

function redirect($path)
{

    header("Location: {$path}");
    exit();

}

function old($key, $default = "")
{

    return Core\Session::get("old")[$key] ?? $default;

}