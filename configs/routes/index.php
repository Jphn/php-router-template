<?php

use App\Controller\SampleController;
use App\Http\Router;

$server = new Router();

$server->get('/get', [
	'controllerName' => SampleController::class ,
	'actionName' => 'getSample'
])
	->post('/post', [
	'controllerName' => SampleController::class ,
	'actionName' => 'postSample'
])
	->put('/put', [
	'controllerName' => SampleController::class ,
	'actionName' => 'putSample'
])
	->delete('/delete', [
	'controllerName' => SampleController::class ,
	'actionName' => 'deleteSample'
]);

$server->setPrefix('/prefix')
	->get('/sample', [
	'controllerName' => SampleController::class ,
	'actionName' => 'getPinkLagartixa',
]);


$server->run();
