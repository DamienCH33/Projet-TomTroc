<?php

class BookController
{
    public function showDetailBook(): void
    {
        $db = new Database();
        $pdo = $db->getPDO();

        $id = $_GET['id'] ?? null;
        if (!$id) {
            throw new Exception("ID de livre manquant.");
        }

        $manager = new BookExchangeManager($pdo);
        $book = $manager->getBookById((int) $id);

        $view = new View('bookPage/detailBook');
        $view->render(['book' => $book]);
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
    public function showUpdateBook()
    {
        $db = new Database();
        $pdo = $db->getPDO();
        $id = $_GET['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            echo "ID de livre manquant ou invalide.";
            exit;
        }

        $manager = new BookExchangeManager($pdo);
        $book = $manager->getBookById((int)$id);

        $view = new View('bookPage/updateBook');
        $view->render(['book' => $book]);
    }
}
