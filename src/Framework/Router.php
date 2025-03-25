<?php

declare(strict_types=1);

namespace Framework;

class Router {
    private array $routes = [];

    public function add(string $path, array $controller, string $method = 'GET') {
        $path = $this->normalizePath($path);

        $this->routes[$path] = [
            'method' => strtoupper($method),
            'path' => $path,
            'controller' => $controller,
        ];
    }

    public function normalizePath(string $path): string {
        $path = trim($path, '/');
        $path = $path === '' ? '/' : "/{$path}/";

        return $path;
    }

    public function dispatch(string $path, string $method) {
        $path = $this->normalizePath($path);
        $method = strtoupper($method);

        foreach($this-> routes as $route) {
            if (preg_match("#^{$route['path']}$#", $path) && $route['method'] === $method) {
                [$class, $method] = $route['controller'];

                $controllerInstance = new $class;
                $controllerInstance->{$method}();
            }
        }
    }

}
