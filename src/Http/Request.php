<?php

declare(strict_types=1);

namespace App\Http;

class Request
{
	// public readonly array $queryParams; // Works only on PHP ^8.0
	// public readonly array $postVars; // Works only on PHP ^8.0
	// public readonly array $headers; // Works only on PHP ^8.0

	private array $params; // Below 8.0

	public function __construct()
	{
		// $this->queryParams = $_GET; // Works only on PHP ^8.0
		// $this->postVars = $_POST; // Works only on PHP ^8.0
		// $this->headers = getallheaders(); // Works only on PHP ^8.0

		$this->params = [ // Below 8.0
			'queryParams' => $_GET ?? [],
			'postVars' => $_POST ?? [],
			'headers' => getallheaders()
		];
	}

	public function __get($name) // Below 8.0
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
