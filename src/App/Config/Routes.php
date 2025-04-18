<?php

declare(strict_types=1);

namespace App\Config;

use App\Controllers\{HomeController, AboutController};
use Framework\App;

function registerRoutes(App $app) {
    $app->add('/', [HomeController::class, 'home']);
    $app->add('/about', [AboutController::class, 'about']);
}
