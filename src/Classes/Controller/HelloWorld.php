<?php

namespace App\Classes\Controller;

use App\Classes\Http\Request;
use App\Classes\Http\Response;
use Closure;

abstract class HelloWorld
{
	public static function get(): Closure
	{
		return static function (Request $req, Response $res) {

			$res->status(200)->json('Hello world! Using response class! And using controller!');
		};
	}
}