<?php

use App\Controller\SampleController;
use App\Http\Router;

$server = new Router();

$server->get('/get', [SampleController::class , 'getSample'], 'getSample')
	->post('/post', [SampleController::class , 'postSample'], 'postSample')
	->put('/put', [SampleController::class , 'putSample'], 'putSample')
	->delete('/delete', [SampleController::class , 'deleteSample'], 'deleteSample');

$server->get('/redirect', [SampleController::class , 'redirectSample']); // FIXME - Planning to change from an function param to a function. Ex.: get(...)->name('name')

$server->setPrefix('/prefix')
	->get('/sample', [SampleController::class , 'getPinkLagartixa']);


$server->run();
