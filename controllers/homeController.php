<?php
class HomeController
{
    private BookExchangeManager $bookManager;
    public function __construct(BookExchangeManager $bookManager)
    {
        $this->bookManager = $bookManager;
    }
    public function showHome(): void
    {
        $books = $this->bookManager->getAllBooks();

        $view = new View('home');
        $view->render(['books' => $books]);
    }
}
