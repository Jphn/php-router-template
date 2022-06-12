<?php

declare(strict_types=1);

namespace App\Http;

class Request
{
	public readonly array $queryParams;
	public readonly array $postVars;
	public readonly array $headers;

	public function __construct()
	{
		$this->queryParams = $_GET;
		$this->postVars = $_POST;
		$this->headers = getallheaders();
	}

	public function isGetParamsValid(array $expectedParams): bool
	{
		foreach ($expectedParams as $key) {
			$isValid = true;

			if (!array_key_exists($key, $this->queryParams)) {
				$isValid = false;
				break;
			}
		}

		return $isValid;
	}
}
