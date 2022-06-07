<?php

use App\Classes\Controller;
use App\Classes\Http\Router;

$router = new Router();

$router->setPrefix('/hello');

$router->get('/world', Controller\HelloWorld::get());

$router->setPrefix('/bye');

$router->get('/world', function () {
	echo "Bye World Page!";
});

$router->run();
