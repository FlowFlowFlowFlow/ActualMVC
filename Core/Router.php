<?php

namespace Core;

class Router
{

    private $routes = [];

    private function add($method, $uri, $controller)
    {

        $this->routes[] = [
            "method" => $method,
            "uri" => $uri,
            "controller" => $controller,
            "middleware" => null
        ];

        return $this;

    }

    public function get($uri, $controller)
    {

        return $this->add("GET", $uri, $controller);

    }

    public function post($uri, $controller)
    {

        return $this->add("POST", $uri, $controller);

    }

    public function delete($uri, $controller)
    {

        return $this->add("DELETE", $uri, $controller);

    }

    public function patch($uri, $controller)
    {

        return $this->add("PATCH", $uri, $controller);

    }

    public function put($uri, $controller)
    {

        return $this->add("PUT", $uri, $controller);

    }

    public function only($key)
    {

        $this->routes[array_key_last($this->routes)]["middleware"] = $key;

    }

    private function abort($code = 404)
    {

        http_response_code($code);
        view("pages/{$code}");
        exit();

    }

    public function previousUrl()
    {

        return $_SERVER["HTTP_REFERER"];

    }

    public function route($method, $uri)
    {

        foreach ($this->routes as $route) {

            if ($route["method"] === strtoupper($method) && $route["uri"] === $uri) {

                \Core\Middleware\Middleware::resolve(($route["middleware"]));

                return require base_path("Http/controllers/" . $route["controller"]);

            }

        }

        $this->abort();

    }

}