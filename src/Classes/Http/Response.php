<?php

namespace App\Classes\Http;

class Response
{
	private string $contentType = 'text/html';
	private int $httpCode = 200;

	public function status(?int $statusCode): Response
	{
		$this->httpCode = $statusCode ? $statusCode : 200;

		return $this;
	}

	public function send(mixed $content): void
	{
		$this->sendResponse($content);
	}

	public function json(mixed $json): void
	{
		$this->contentType = 'application/json';

		$this->sendResponse(json_encode($json));
	}

	private function sendHeaders()
	{
		http_response_code($this->httpCode);

		header("Content-Type: {$this->contentType};");
	}

	private function sendResponse(mixed $content)
	{
		$this->sendHeaders();

		echo $content;
	}
}