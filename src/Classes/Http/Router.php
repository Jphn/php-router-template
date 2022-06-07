<?php

namespace App\Classes\Http;

class Router
{
	private string $prefix = '';
	private array $routes;

	public function get(string $path, callable $callback, array $middleware = []): Router
	{
		$this->addRoute('GET', $path, $callback);
		return $this;
	}

	public function post(string $path, callable $callback, ?array $middleware = []): Router
	{
		$this->addRoute('POST', $path, $callback);
		return $this;
	}

	public function put(string $path, callable $callback, ?array $middleware = []): Router
	{
		$this->addRoute('PUT', $path, $callback);
		return $this;
	}

	public function delete(string $path, callable $callback, ?array $middleware = []): Router
	{
		$this->addRoute('DELETE', $path, $callback);
		return $this;
	}

	public function setPrefix(string $prefix): void
	{
		$this->prefix = $prefix;
	}

	public function run(): void
	{
		$uri = $_SERVER['REQUEST_URI'];
		$method = $_SERVER['REQUEST_METHOD'];

		$uri = explode('?', $uri);

		foreach ($this->routes[$method] as $path => $callback) {
			if ($path == $uri[0]) {
				$callback(new Request(), new Response());
			}
		}
	}

	private function addRoute(string $method, string $path, callable $callback): void
	{
		$this->routes[$method][$this->prefix . $path] = $callback;
	}
}