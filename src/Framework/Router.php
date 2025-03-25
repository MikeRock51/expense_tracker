<?php

declare(strict_types=1);

namespace Framework;

class Router {
    private array $routes = [];

    public function add(string $path, array $controller, string $method = 'GET') {
        $path = $this->normalizePath($path);

        $this->routes[$path] = [
            'method' => $method,
            'path' => $path,
            'controller' => $controller,
        ];
    }

    public function normalizePath(string $path): string {
        $path = trim($path, '/');
        $path = $path === '' ? '/' : "/{$path}/";

        return $path;
    }

}
