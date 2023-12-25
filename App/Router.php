<?php

declare(strict_types=1);

namespace App;

class Router
{
    private static function handle($method = "GET", string $uri = "/", callable|string|array $action = ""): mixed
    {
        $currentUri = $_SERVER["REQUEST_URI"];
        $currentMethod = $_SERVER["REQUEST_METHOD"];
        $fileRoot = "./view/";
        if ($currentMethod == $method && $currentUri == $uri) {
            if (is_array($action)) {
                self::handleController($action);
            } elseif (file_exists("$fileRoot{$action}.php")) {
                require_once "$fileRoot{$action}.php";
            } else echo "view file not fould";
            exit();
        }
        return false;
    }

    public static function get(string $uri = "/", callable|string|array $action = ""): mixed
    {
        return self::handle(uri: $uri, action: $action);
    }

    public static function view(string $fileName): void
    {
        require_once "./view/$fileName.php";
        exit();
    }

    private static function handleController(array $action): void
    {
        [ $class , $method] = $action;
        $obj = new ($class);
        $obj->$method();
    }
}
