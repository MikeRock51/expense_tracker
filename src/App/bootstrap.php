<?php

declare(strict_types=1);

include __DIR__ . '/../Framework/App.php';

use Framework\App;
use App\Controllers\HomeController;
use App\Controllers\AboutController;

$app = new App();

$app->add('/', [HomeController::class, 'home']);
$app->add('/about', [AboutController::class, 'about']);

return $app;