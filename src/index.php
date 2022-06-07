<?php

require __DIR__ . '/../vendor/autoload.php';

use App\Classes\Http\Request;
use App\Classes\Http\Response;
use App\Classes\Http\Router;

$router = new Router();

$router->setContentType('text/html');

$router->setPrefix('/hello');

$router->get('/world', function (Request $req, Response $res) {
	$res->status(200)->send('Hello world! Using response class!');
});

$router->setPrefix('/bye');

$router->get('/world', function () {
	print("Bye World Page!");
});

$router->run();