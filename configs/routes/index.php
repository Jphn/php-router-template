<?php

use App\Controller\IndexController;
use App\Http\Router;

$server = new Router();

$server->setPrefix('/lagartixa')
	->get('/pink', [
		'controllerName' => IndexController::class,
		'actionName' => 'getPinkLagartixa',
		'middlewareList' => ['redirect']
	])
	->get('', [
		'controllerName' => IndexController::class,
		'actionName' => 'getIndex'
	]);

$server->run();
