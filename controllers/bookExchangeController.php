<?php
class BookExchangeController
{

    public function showBookExchange(): void
    {

        $db = new Database();
        $pdo = $db->getPDO();

        $manager = new BookExchangeManager($pdo);
        
        $search = $_GET['search'] ?? '';
        $books = $manager->getBookBySearch($search);

        $view = new View('bookExchange');
        $view->render(['books' => $books]);
    }
}
