<?php

declare(strict_types = 1)
;

namespace App\Http;

class Request
{
	// public readonly array $queryParams; // Works only on PHP ^8.1
	// public readonly array $postVars; // Works only on PHP ^8.1
	// public readonly array $headers; // Works only on PHP ^8.1

	private array $params; // Below 8.1

	public function __construct()
	{
		// $this->queryParams = $_GET; // Works only on PHP ^8.1
		// $this->postVars = $_POST; // Works only on PHP ^8.1
		// $this->headers = getallheaders(); // Works only on PHP ^8.1

		$this->params = [ // Below 8.1
			'queryParams' => $_GET ?? [],
			'postVars' => $_POST ?? [],
			'body' => json_decode(file_get_contents('php://input'), true) ?? [],
			'headers' => getallheaders()
		];
	}

	public function __get($name) // Below 8.1

	{
		return $this->params[$name] ?? null;
	}

	public function isGetParamsValid(array $expectedParams): bool
	{
		foreach ($expectedParams as $key) {
			$isValid = true;

			if (!array_key_exists($key, $this->params['queryParams'])) {
				$isValid = false;
				break;
			}
		}

		return $isValid;
	}
}
