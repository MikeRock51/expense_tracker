<?php

declare(strict_types=1);

namespace Framework;

require __DIR__ . '/../../vendor/autoload.php';


class App {
    private Router $router;

    public function __construct() {
        $this->router = new Router();
    }

    public function run() {
        echo 'Hello, world!!!!!!!!!!';
    }

    public function add(string $path, array $controller, string $method = 'GET') {
        $this->router->add($path, $controller, $method);
    }
}