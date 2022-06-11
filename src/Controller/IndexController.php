<?php

declare(strict_types=1);

namespace App\Controller;

class IndexController
{
	public static function getIndex()
	{
		header('Content-Type: application/json');

		echo json_encode(['msg' => 'this time from crazy controller']);
	}

	public static function getPinkLagartixa()
	{
		header('Content-Type: application/json');

		echo json_encode(['msg' => 'this is the crazy pink lagartixa']);
	}
}
