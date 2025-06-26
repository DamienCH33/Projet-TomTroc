<?php
class View
{
    private string $viewName;

    public function __construct(string $viewName)
    {
        $this->viewName = $viewName;
    }

    public function render(array $data = []): void
    {
        extract($data);
        require __DIR__ . '/../views/' . $this->viewName . '.php';
    }
}
