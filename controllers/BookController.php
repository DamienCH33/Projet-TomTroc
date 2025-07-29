<?php

class BookController extends AbstractController
{
    private BookExchangeManager $bookManager;
    private UserManager $userManager;
    public function __construct()
    {
        $this->bookManager = new BookExchangeManager();
        $this->userManager = new UserManager();
    }
    public function showDetailBook(): void
    {
        $id = $_GET['id'] ?? null;
        if (!$id) {
            throw new Exception("ID de livre manquant.");
        }

        $book = $this->bookManager->getBookById((int) $id);

        $user = null;
        if ($book && $book->getIdUser() !== null) {
            $user = $this->userManager->getUserById($book->getIdUser());
        }

        $view = new View('bookPage/detailBook');
        $view->render([
            'book' => $book,
            'user' => $user,
        ]);
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

        if (!$book || $book->getIdUser() !== $_SESSION['user']['id']) {
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

        if (!$book || $book->getIdUser() !== $_SESSION['user']['id']) {
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

        $_SESSION['message'] = "Livre mise à jour avec succès.";
        header("Location: /index.php?page=myAccount");
        exit();
    }
    public function updatePictureBook()
    {
        $this->checkIfUserIsConnected();

        $bookId = $_POST['id'] ?? $_GET['id'] ?? null;

        if (!$bookId) {
            $_SESSION['message'] = "ID du livre manquant.";
            header("Location: index.php?page=updateBook&id=" . $bookId);
            exit();
        }
var_dump($_FILES);
die;
        if (!isset($_FILES['images']) || $_FILES['images']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['message'] = "Aucune image valide n'a été envoyée.";
            header("Location: index.php?page=updateBook&id=" . $bookId);
            exit();
        }

        $uploadDir = 'images/images_books/';
        $ext = pathinfo($_FILES['images']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('book_') . '.' . $ext;
        $targetFile = $uploadDir . $filename;

        $allowedMime = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($_FILES['images']['type'], $allowedMime)) {
            $_SESSION['message'] = "Format d'image non autorisé.";
            header("Location: index.php?page=updateBook&id=" . $bookId);
            exit();
        }

        if ($_FILES['images']['size'] > 2 * 1024 * 1024) {
            $_SESSION['message'] = "Image trop lourde. 2 Mo max.";
            header("Location: index.php?page=updateBook&id=" . $bookId);
            exit();
        }

        if (move_uploaded_file($_FILES['images']['tmp_name'], $targetFile)) {
            $this->bookManager->updatePictureBook((int)$bookId, $targetFile);
            $_SESSION['message'] = "Image du livre mise à jour.";
        } else {
            $_SESSION['message'] = "Échec du téléchargement de l'image.";
        }

        header("Location: index.php?page=updateBook&id=" . $bookId);
        exit();
    }
}
