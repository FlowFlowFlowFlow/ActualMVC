<?php

$router->get("/", "first-page.php");
$router->get("/first-page", "first-page.php");
$router->get("/second-page", "second-page.php");
$router->get("/third-page", "third-page.php");

$router->get("/signup", "signup/create.php")->only("guest");
$router->post("/signup", "signup/store.php")->only("guest");

$router->get("/login", "login/create.php")->only("guest");
$router->post("/login", "login/store.php")->only("guest");
$router->delete("/login", "login/destroy.php")->only("authenticated");