<?php

declare(strict_types=1);

namespace App\Controller;

class ErrorController
{
	public static function notFound(): void
	{
		header('Content-Type: application/json');

		echo json_encode(['msg' => 'page not found']);
	}
}
