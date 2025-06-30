<?php

class HomeController
{
    public function showHome(): void
    {
        $db = new Database();
        $pdo = $db->getPDO();

        $manager = new BookExchangeManager($pdo);
        $books = $manager->getAllBooks();

        $view = new View('home');
        $view->render(['books' => $books]);
    }
}
