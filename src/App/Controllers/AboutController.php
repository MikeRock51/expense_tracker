<?php

declare(strict_types=1);

namespace App\Controllers;

use Framework\TemplateEngine;
use App\Config\Paths;

class AboutController {
    private TemplateEngine $view;

    public function __construct() {
        $this->view = new TemplateEngine(Paths::VIEW);
    }

    public function about() {
        $this->view->render('/about.php', ['title' => 'About Page Title']);
    }
}