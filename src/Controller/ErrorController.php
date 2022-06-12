<?php

declare(strict_types=1);

namespace App\Controller;

use App\Http\Request;
use App\Http\Response;

class ErrorController
{
	public static function notFound(Request $req, Response $res): void
	{
		$res->status(404)->json(['msg' => 'page not found']);
	}

	public static function invalidArgs(Request $req, Response $res): void
	{
		$res->status(400)->json(['msg' => 'invalid args']);
	}
}
