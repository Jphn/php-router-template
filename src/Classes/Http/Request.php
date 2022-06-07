<?php

namespace App\Classes\Http;

class Request
{
	private array $queryParams, $postVars, $headers;

	public function __construct()
	{
		$this->queryParams = $_GET ?? [];
		$this->postVars = $_POST ?? [];
		$this->headers = getallheaders();
	}

	public function getQueryParams(): array
	{
		return $this->queryParams;
	}

	public function getPostVars(): array
	{
		return $this->postVars;
	}

	public function getHeaders(): array
	{
		return $this->headers;
	}
}