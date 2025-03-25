<?php

declare(strict_types=1);

include __DIR__ . '/../Framework/App.php';

use Framework\App;

$app = new App();

$app->add('/');
$app->add('/about');
$app->add('about/contact');

return $app;