<?php

declare(strict_types=1);


namespace App\Controllers;

use App\Services\ValidatorService;
use Framework\TemplateEngine;

class AuthController
{
    public function __construct(
        private TemplateEngine $view,
        private ValidatorService $validatorService,
    ) {}

    public function registerView()
    {
        $this->view->render('register.php');
    }

    public function register()
    {
        $this->validatorService->validateRegister($_POST);
    }
}
