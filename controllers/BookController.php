<?php

class BookController
{
    public function showDetailBook():void
    {
        $db = new Database();
        $pdo = $db->getPDO();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            throw new Exception("ID de livre manquant.");
        }

        $manager = new BookExchangeManager($pdo);
        $books = $manager->getBookById((int) $id);

        $view = new View('bookPage/detailBook');
        $view->render(['books' => $books]);
    }

    public function showBookExchange(): void
    {

        $db = new Database();
        $pdo = $db->getPDO();

        $manager = new BookExchangeManager($pdo);
        
        $search = $_GET['search'] ?? '';
        $books = $manager->getBookBySearch($search);

        $view = new View('bookPage/bookExchange');
        $view->render(['books' => $books]);
    }
}