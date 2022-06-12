<?php

declare(strict_types = 1)
;

namespace App\Controller;

use App\Http\Request;
use App\Http\Response;

class IndexController
{
	public static function getIndex(Request $req, Response $res): void
	{
		$res->status(200)->json(['msg' => 'this time from crazy controller']);
	}

	public static function getPinkLagartixa(Request $req, Response $res): void
	{
		if (!$req->isGetParamsValid(['name'])) {
			ErrorController::invalidArgs($req, $res);
			return;
		}

		$get = $req->queryParams;

		$res->status(200)->json(['msg' => 'this is the crazy pink lagartixa', 'animal' => $get['name']]);
	}

	public static function getObjectOfNumbers(Request $req, Response $res): void
	{
		$res->status(200)->json([1, 2, 3, 4, 5, 6, 7, 8, 9, 10]);
	}
}
