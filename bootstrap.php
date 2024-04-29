<?php

$container = new Core\Container();

$container->bind("Core\Database", function () {

    $config = require base_path("config.php");

    return new Core\Database($config["database"]);

});

Core\App::setContainer($container);