<?php
class View
{
    private string $viewFile;
    
    public function __construct(string $viewName)
    {
        $this->viewFile = __DIR__ . '/../views/' . $viewName . '.php';      
    }

    public function render(): void
    {
        ob_start();
        require $this->viewFile;
        $content = ob_get_clean();
        require __DIR__ . '/../views/layout.php';
    }
}
