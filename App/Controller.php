<?php
namespace App;
use App\Router;

class Controller 
{
    public function index(): mixed
    {
        return Router::view("test");
    }

    public function showGuy(): mixed

    {
        return Router::view('guy');
    }
}