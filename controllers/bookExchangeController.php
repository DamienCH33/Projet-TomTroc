<?php
class BookExchangeController{

public function showBookExchange(): void
    {

        $db = new Database();
        $pdo = $db->getPDO();

        $manager = new BookExchangeManager($pdo);
        $books = $manager->getAllBooks();

        $view = new View('bookExchange');
        $view->render(['books' => $books]);
    }
}
