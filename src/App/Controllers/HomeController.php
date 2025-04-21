<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;

class HomeController {
    public function __construct(private TemplateEngine $view) {
        var_dump($this->view);
        echo "<br>";
    }

    public function home() {
        $this->view->render('/index.php');
    }
}