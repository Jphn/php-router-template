<?php

declare(strict_types=1);

namespace App\Http;

class Response
{
	private array $headers = ['Content-Type' => 'application/json'];
	private int $statusCode = 200;

	public function status(int $statusCode): Response
	{
		$this->statusCode = $statusCode;

		return $this;
	}

	public function json($json): void // Mixed type is only available on ^8.0
	{
		$this->headers['Content-Type'] = 'application/json';

		$this->sendResponse(json_encode($json));
	}

	public function send($data): void // Mixed type is only available on ^8.0
	{
		$this->headers['Content-Type'] = 'text/html';

		$this->sendResponse($data);
	}

	/* Private Methods */

	private function sendResponse($data): void // Mixed type is only available on ^8.0
	{
		$this->sendHeaders();

		echo $data;
	}

	private function sendHeaders(): void
	{
		http_response_code($this->statusCode);

		foreach ($this->headers as $header => $value) {
			header("${header}: {$value}");
		}
	}
}
