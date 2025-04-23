<?php

declare(strict_types=1);

namespace Framework;

class Router
{
    private array $routes = [];
    private array $middlewares = [];

    public function add(string $path, array $controller, string $method = 'GET')
    {
        error_log($path . $method);
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        $this->routes[] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
        ];
    }

    public function normalizePath(string $path): string
    {
        $path = trim($path, '/');
        $path = $path === '' ? '/' : "/{$path}/";

        return $path;
    }

    public function dispatch(string $path, string $method, ?Container $container = null)
    {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach ($this->routes as $route) {
            if (preg_match("#^{$route['path']}$#", $path) && $route['method'] === $method) {
                [$class, $method] = $route['controller'];

                $controllerInstance = $container ? $container->resolve($class) : new $class;
                $action = fn() => $controllerInstance->{$method}();

                foreach ($this->middlewares as $middleware) {
                    $middlewareInstance = $container ? $container->resolve($middleware) : new $middleware;
                    $action = fn() => $middlewareInstance->process($action);
                }

                $action();

                return;
            }
        }
    }

    public function addMiddleware(string $middleware)
    {
        $this->middlewares[] = $middleware;
    }
}
