<?php

use App\Controller\SampleController;
use App\Http\Router;

$server = new Router();

$server->get('/get', [
	SampleController::class ,
	'getSample'
])
	->post('/post', [
	SampleController::class ,
	'postSample'
])
	->put('/put', [
	SampleController::class ,
	'putSample'
])
	->delete('/delete', [
	SampleController::class ,
	'deleteSample'
]);

$server->setPrefix('/prefix')
	->get('/sample', [
	SampleController::class ,
	'getPinkLagartixa',
]);


$server->run();
