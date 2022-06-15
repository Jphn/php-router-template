<?php

declare(strict_types = 1)
;

namespace App\Controller;

use App\Http\Request;
use App\Http\Response;

class SampleController
{
	public static function getSample(Request $req, Response $res)
	{
		$res->status(200)->json(['sample' => 'json', 'response' => 'data']);
	}

	public static function postSample(Request $req, Response $res)
	{
		var_dump($req->body);
	}

	public static function putSample(Request $req, Response $res)
	{
		$res->status(200)->json(['sample' => 'json', 'response' => 'data']);
	}

	public static function deleteSample(Request $req, Response $res)
	{
		$res->status(204)->json([]);
	}
}
