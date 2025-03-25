<?php

declare(strict_types=1);

include __DIR__ . '/../Framework/App.php';

use Framework\App;
use App\Controllers\HomeController;

// echo HomeController::class . " ";

$app = new App();

$app->add('/', [HomeController::class, 'home']);

return $app;