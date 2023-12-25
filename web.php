<?php

spl_autoload_register(function($name)
{
    require $name.'.php';
});

use App\Router;
use App\Controller;

Router::get('/me',[Controller::class,"index"]);
Router::get('/guy',[Controller::class,'showGuy'])


 ?>