<?php

declare(strict_types=1);

namespace Framework;

class TemplateEngine {
    private $globalTemplateData = [];

    public function __construct(private string $basePath) {
    }

    public function render(string $template, array $data = []) {
        extract($data, EXTR_SKIP);
        extract($this->globalTemplateData, EXTR_SKIP);

        include $this->resolve($template);
    }

    public function resolve(string $template): string {
        return $this->basePath . '/' . $template;
    }

    public function addGlobal(string $key, mixed $value) {
        $this->globalTemplateData[$key] = $value;
    }
}