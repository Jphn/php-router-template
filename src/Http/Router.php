<?php

declare(strict_types=1);

namespace App\Http;

use App\Controller\ErrorController;
use App\Controller\IndexController;

class Router
{
	private string $prefix = '';
	private string $path;
	private array $routesList = [
		'GET' => [
			'/lagartixa' => [
				'middlewareList' => [],
				'controllerName' => IndexController::class,
				'actionName' => 'getIndex'
			]
		]
	];

	public function setPrefix(string $path): Router
	{
		$this->prefix = $this->formatPath($path);

		return $this;
	}

	public function get(string $path, array $routeParams): Router
	{
		$this->addRoute('GET', $path, $routeParams);

		return $this;
	}

	public function run(): void
	{
		$uri = $this->formatPath($_SERVER['REQUEST_URI']);
		$method = $_SERVER['REQUEST_METHOD'];

		extract($this->routesList[$method][$uri] ?? ['controllerName' => ErrorController::class, 'actionName' => 'notFound']);

		call_user_func(array($controllerName, $actionName));
	}

	/* Private Methods */

	private function addRoute(string $method, string $path, array $routeParams): void
	{
		$path = $this->formatPath($path);

		$routeParams['middlewareList'] = $routeParams['middlewareList'] ?? [];

		$this->routesList[$method][$this->prefix . $path] = $routeParams;
	}

	private function formatPath(string $path): string
	{
		$path = explode('?', $path)[0];
		$path = (substr($path, -1) == '/') && strlen($path) > 1 ? $path = rtrim($path, '/') : $path;
		return $path;
	}
}
