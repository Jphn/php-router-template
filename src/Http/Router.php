<?php

declare(strict_types = 1)
;

namespace App\Http;

use App\Controller\ErrorController;

class Router
{
	private string $prefix = '';
	private string $path;
	private array $routesList = [];

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

	public function post(string $path, array $routeParams): Router
	{
		$this->addRoute('POST', $path, $routeParams);

		return $this;
	}

	public function put(string $path, array $routeParams): Router
	{
		$this->addRoute('PUT', $path, $routeParams);

		return $this;
	}

	public function delete(string $path, array $routeParams): Router
	{
		$this->addRoute('DELETE', $path, $routeParams);

		return $this;
	}

	public function run(): void
	{
		$uri = $this->formatPath($_SERVER['REQUEST_URI']);
		$method = $_SERVER['REQUEST_METHOD'];

		extract($this->routesList[$method][$uri] ?? ['controllerName' => ErrorController::class , 'actionName' => 'notFound']);

		call_user_func(array($controllerName, $actionName), new Request(), new Response());
	}

	/* Private Methods */

	private function addRoute(string $method, string $path, array $routeParams): void
	{
		$path = $this->formatPath($this->prefix . $path);

		$routeParams['middlewareList'] = $routeParams['middlewareList'] ?? [];

		$this->routesList[$method][$path] = $routeParams;
	}

	private function formatPath(string $path): string
	{
		$path = explode('?', $path)[0];
		$path = (substr($path, -1) == '/') && strlen($path) > 1 ? $path = rtrim($path, '/') : $path;

		$path = $path == '' ? '/' : $path;

		return $path;
	}
}
