<?php

declare(strict_types = 1)
;

namespace App\Http;

use App\Controller\ErrorController;

class Router
{
	private string $prefix = '';
	private array $routesList = [];
	private static array $routesPaths = [];

	public function setPrefix(string $path): Router
	{
		$this->prefix = $this->formatPath($path);

		return $this;
	}

	public function get(string $path, array $routeParams, string $routeName = null): Router
	{
		return $this->addRoute('GET', $path, $routeParams, $routeName);
	}

	public function post(string $path, array $routeParams, string $routeName = null): Router
	{
		return $this->addRoute('POST', $path, $routeParams, $routeName);
	}

	public function put(string $path, array $routeParams, string $routeName = null): Router
	{
		return $this->addRoute('PUT', $path, $routeParams, $routeName);
	}

	public function delete(string $path, array $routeParams, string $routeName = null): Router
	{
		return $this->addRoute('DELETE', $path, $routeParams, $routeName);
	}

	public function run(): void
	{
		$uri = $this->formatPath($_SERVER['REQUEST_URI']);
		$method = $_SERVER['REQUEST_METHOD'];

		$controller = $this->routesList[$method][$uri] ?? [ErrorController::class , 'notFound'];

		call_user_func($controller, new Request(), new Response());
	}

	/* SECTION - PUBLIC STATIC METHODS */

	public static function redirect(string $routeName): void
	{
		$location = self::$routesPaths[$routeName] ?? '/';

		header("Location: {$location}");
		exit;
	}

	/* !SECTION - PUBLIC STATIC METHODS */

	/* Private Methods */

	private function addRoute(string $method, string $path, array $routeParams, string $routeName = null): Router
	{
		$path = $this->formatPath($this->prefix . $path);

		if (isset($routeName))
			self::$routesPaths[$routeName] = $path;

		$this->routesList[$method][$path] = $routeParams;

		return $this;
	}

	private function formatPath(string $path): string
	{
		$path = explode('?', $path)[0];
		$path = (substr($path, -1) == '/') && strlen($path) > 1 ? $path = rtrim($path, '/') : $path;

		$path = $path == '' ? '/' : $path;

		return $path;
	}
}
