<?php
class View
{
    private string $viewFile;
    
    public function __construct(string $viewName)
    {
        $this->viewFile = __DIR__ . '/../views/' . $viewName . '.php';      
    }

   public function render(array $vars = []): void
    {
        if (!file_exists($this->viewFile)) {
            die("Erreur : Vue introuvable : " . $this->viewFile);
        }

        extract($vars);
        ob_start();
        require $this->viewFile;
        $content = ob_get_clean();

        require __DIR__ . '/../views/layout.php';
    }
}
