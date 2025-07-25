<?php

class BookController
{
    private BookExchangeManager $bookManager;
    public function __construct(BookExchangeManager $bookManager)
    {
        $this->bookManager = $bookManager;
    }
    public function showDetailBook(): void
    {
               $id = $_GET['id'] ?? null;
        if (!$id) {
            throw new Exception("ID de livre manquant.");
        }

        $book = $this->bookManager->getBookById((int) $id);

        $view = new View('bookPage/detailBook');
        $view->render(['book' => $book]);
    }

    public function showBookExchange(): void
    {
          $search = $_GET['search'] ?? '';
        $books = $this->bookManager->getBookBySearch($search);

        $view = new View('bookPage/bookExchange');
        $view->render(['books' => $books]);
    }
    public function showUpdateBook()
    {
        $id = $_GET['id'] ?? null;
        if (!$id || !is_numeric($id)) {
            echo "ID de livre manquant ou invalide.";
            exit;
        }
        $book = $this->bookManager->getBookById((int)$id);

        if (!$book || $book->getId_User() !== $_SESSION['user']['id']) {
            $_SESSION['message'] = "Vous n'avez pas le droit de modifier ce livre.";
            header("Location: /index.php?page=myAccount");
            exit;
        }

        $view = new View('bookPage/updateBook');
        $view->render(['book' => $book]);
    }
    public function updateBookProfile()
    {
        $id = $_POST['id'] ?? null;
        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $available = $_POST['available'] ?? null;

        if (!$id || empty($title) || empty($author) || empty($description) || !in_array($available, ['0', '1'])) {
            $_SESSION['message'] = "Veuillez remplir correctement tous les champs.";
            header("Location: /index.php?page=updateBook&id=" . urlencode($id));
            exit();
        }
        $book = $this->bookManager->getBookById((int) $id);
        $userId = $_SESSION['user']['id'];

        if (!$book || $book->getId_User() !== $_SESSION['user']['id']) {
            $_SESSION['message'] = "Action non autorisée.";
            header("Location: /index.php?page=myAccount");
            exit();
        }
        if (!$book) {
            $_SESSION['message'] = "Livre introuvable.";
            header("Location: /index.php?page=BookExchange");
            exit();
        }
        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setDescription($description);
        $book->setAvailable($available);

        $this->bookManager->updateBook($book);

        $_SESSION['message'] = "Livre mis à jour avec succès.";
        header("Location: /index.php?page=DetailBook&id=" . $book->getId());
        exit();
    }
}
