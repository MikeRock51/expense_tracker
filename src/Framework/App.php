<?php

declare(strict_types=1);

namespace Framework;

require __DIR__ . '/../../vendor/autoload.php';


class App {
    private Router $router;
    private Container $container;

    public function __construct() {
        $this->router = new Router();
        $this->container = new Container();
    }

    public function run() {
        $path = parse_url($_SERVER['REQUEST_URI'], PHP_URL_PATH);
        $method = $_SERVER['REQUEST_METHOD'];

        $this->router->dispatch($path, $method);
    }

    public function add(string $path, array $controller, string $method = 'GET') {
        $this->router->add($path, $controller, $method);
    }
}