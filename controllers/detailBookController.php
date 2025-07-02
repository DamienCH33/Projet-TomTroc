<?php

class DetailBookController
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

        $view = new View('detailBook');
        $view->render(['books' => $books]);
    }
}