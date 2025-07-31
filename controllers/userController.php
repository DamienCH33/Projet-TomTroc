<?php

class UserController extends AbstractController
{
    private UserManager $userManager;
    private BookExchangeManager $bookManager;

    public function __construct()
    {
        $this->userManager = new UserManager();
        $this->bookManager = new BookExchangeManager();
    }
    public function showInscriptionForm(): void
    {
        $view = new View("user/userForm");
        $view->render(['action' => 'inscription']);
    }
    public function showLoginForm(): void
    {
        $view = new View("user/loginForm");
        $view->render(['action' => 'connexion']);
    }
    public function showMyAccount(): void
    {
        $this->checkIfUserIsConnected();

        $email = $_SESSION['user']['email'];

        $user = $this->userManager->getUserByEmail($email);
        $books = $this->bookManager->getBooksByUser($user);
        $nbBooks = $this->bookManager->countBookByUser($user->getId());

        $view = new View("user/myAccount");
        $view->render([
            'user' => $user,
            'books' => $books,
            'nbBooks' => $nbBooks,
        ]);
    }

    public function showUserProfile()
    {
        $pseudo = $_GET['pseudo'] ?? null;

        if (!$pseudo) {
            $_SESSION['message'] = "Aucun pseudo fourni.";
            header("Location: /index.php?page=BookExchange");
            exit;
        }
        $userData = $this->userManager->getUserByPseudo($pseudo);
        if (!$userData) {
            $view = new View("error/notFound");
            $view->render(["message" => "Utilisateur introuvable"]);
            return;
        }

        $user = new User($userData);
        $books = $this->bookManager->getBooksByUser($user);
        $nbBooks = $this->bookManager->countBookByUser($user->getId());

        $view = new View("user/publicAccount");
        $view->render([
            'user' => $user,
            'books' => $books,
            'nbBooks' => $nbBooks,
        ]);
    }

    public function signUpUser()
    {
        $pseudo = trim($_POST['pseudo']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($pseudo) || empty($email) || empty($password)) {
            $_SESSION['message'] = "Veuillez remplir tous les champs.";
            header("Location: /index.php?page=userForm");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = "Le format de l'email n'est pas valide.";
            header("Location: /index.php?page=userForm");
            exit();
        }
        if ($this->userManager->emailExists($email)) {
            $_SESSION['message'] = "Cette adresse e-mail est déjà utilisée.";
            header("Location: /index.php?page=userForm");
            exit();
        }

        $existingUserByEmail = $this->userManager->getUserByEmail($email);
        $existingUserByPseudo = $this->userManager->getUserByPseudo($pseudo);

        if ($existingUserByEmail || $existingUserByPseudo) {
            $_SESSION['message'] = "Un utilisateur avec cet email ou ce pseudo existe déjà.";
            header("Location: /index.php?page=userForm");
            exit();
        }

        $hashPassword = password_hash($password, PASSWORD_DEFAULT);
        $result = $this->userManager->saveUser($pseudo, $email, $hashPassword);

        if ($result) {
            $_SESSION['message'] = "Inscription réussie ! Vous pouvez vous connecter.";
            header("Location: /index.php?page=loginForm");
            exit();
        } else {
            $_SESSION['message'] = "Erreur lors de l'inscription. Veuillez réessayer.";
            $_SESSION['message_type'] = "danger";
            header("Location: /index.php?page=userForm");
            exit();
        }
    }
    public function logInUser()
    {
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($email) || empty($password)) {
            $_SESSION['message'] = "Veuillez remplir tous les champs.";
            header("Location: /index.php?page=loginForm");
            exit();
        }
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = "Le format de l'email n'est pas valide.";
            header("Location: /index.php?page=loginForm");
            exit();
        }
        $user = $this->userManager->getUserByEmail($email);
        if (!$user) {
            $_SESSION['message'] = "Aucun utilisateur trouvé avec cet email.";
            header("Location: /index.php?page=loginForm");
            exit();
        }
        if (!password_verify($password, $user->getPassword())) {
            $_SESSION['message'] = "Le mot de passe est incorrect.";
            header("Location: /index.php?page=loginForm");
            exit();
        }
        $_SESSION['user'] = [
            'id' => $user->getId(),
            'email' => $user->getEmail(),
            'pseudo' => $user->getPseudo(),
        ];

        header("Location: /index.php?page=myAccount");
        exit();
    }
    public function logout(): void
    {
        session_unset();
        session_destroy();
        header('Location: index.php?page=loginForm');
        exit;
    }

    public function updateUserProfile()
    {
        $this->checkIfUserIsConnected();

        $pseudo = trim($_POST['pseudo']);
        $email = trim($_POST['email']);
        $password = trim($_POST['password']);

        if (empty($pseudo) || empty($email)) {
            $_SESSION['message'] = "Veuillez remplir tous les champs.";
            header("Location: /index.php?page=userForm");
            exit();
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $_SESSION['message'] = "Le format de l'email n'est pas valide.";
            header("Location: /index.php?page=loginForm");
            exit();
        }

        $id = $_SESSION['user']['id'];
        $hashPassword = !empty($password) ? password_hash($password, PASSWORD_DEFAULT) : null;

        $success =  $this->userManager->updateUser($id, $pseudo, $email, $hashPassword);

        if ($success) {
            $_SESSION['userEmail'] = $email;
            $_SESSION['message'] = "Votre compte a été mis à jour avec succès.";
        } else {
            $_SESSION['message'] = "Une erreur s'est produite lors de la mise à jour de votre compte.";
        }
        header("Location: /index.php?page=myAccount");
        exit();
    }
    public function deleteBookUserProfile()
    {
        $this->checkIfUserIsConnected();

        if (!isset($_POST['id']) || !is_numeric($_POST['id'])) {
            $_SESSION['message'] = "ID de livre invalide.";
            header("Location: /index.php?page=myAccount");
            exit;
        }

        $bookId = (int)$_POST['id'];
        $userId = (int)$_SESSION['user']['id'];


        $book = $this->bookManager->getBookById($bookId);

        if (!$book || $book->getIdUser() !== $userId) {
            $_SESSION['message'] = "Vous n'avez pas le droit de supprimer ce livre.";
            header("Location: /index.php?page=myAccount");
            exit;
        }

        if ($this->bookManager->deleteBookByUser($bookId, $userId)) {
            $_SESSION['message'] = "Livre supprimé avec succès.";
        } else {
            $_SESSION['message'] = "Erreur lors de la suppression du livre.";
        }

        header("Location: /index.php?page=myAccount");
        exit;
    }
    public function addBookUserProfile()
    {
        $this->checkIfUserIsConnected();

        $title = trim($_POST['title'] ?? '');
        $author = trim($_POST['author'] ?? '');
        $description = trim($_POST['description'] ?? '');
        $available = $_POST['available'] ?? null;

        if (empty($title) || empty($author) || empty($description) || !in_array($available, ['0', '1'])) {
            $_SESSION['message'] = "Veuillez remplir correctement tous les champs.";
            header("Location: /index.php?page=myAccount");
            exit();
        }

        $book = new Book();
        $book->setTitle($title);
        $book->setAuthor($author);
        $book->setDescription($description);
        $book->setAvailable($available);
        $book->setImages('/images/livres.jpeg');

        $userId = $_SESSION['user']['id'];
        $pseudo = $_SESSION['user']['pseudo'];

        $this->bookManager->addBookByUser($book, $userId, $pseudo);

        $_SESSION['message'] = "Livre ajouté avec succès.";
        header("Location: /index.php?page=myAccount");
        exit();
    }
    public function updatePictureProfile()
    {
        $this->checkIfUserIsConnected();
        $id = $_SESSION['user']['id'];

        if (!isset($_FILES['picture']) || $_FILES['picture']['error'] !== UPLOAD_ERR_OK) {
            $_SESSION['message'] = "Aucune image valide n'a été envoyée.";
            header("Location: /index.php?page=myAccount");
            exit();
        }

        $uploadDir = 'images/images_profile/';
        $ext = pathinfo($_FILES['picture']['name'], PATHINFO_EXTENSION);
        $filename = uniqid('profile_') . '.' . $ext;
        $targetFile = $uploadDir . $filename;

        // Vérification type MIME + taille
        $allowedMime = ['image/jpeg', 'image/png', 'image/webp'];
        if (!in_array($_FILES['picture']['type'], $allowedMime)) {
            $_SESSION['message'] = "Format d'image non autorisé.";
            header("Location: /index.php?page=myAccount");
            exit();
        }

        if ($_FILES['picture']['size'] > 2 * 1024 * 1024) { // 2 Mo max
            $_SESSION['message'] = "Image trop lourde. 2 Mo max.";
            header("Location: /index.php?page=myAccount");
            exit();
        }

        // Déplacement et update
        if (move_uploaded_file($_FILES['picture']['tmp_name'], $targetFile)) {
            $this->userManager->updatePictureProfile($id, $targetFile);
            $_SESSION['user']['picture'] = $targetFile;
            $_SESSION['message'] = "Image de profil mise à jour.";
        } else {
            $_SESSION['message'] = "Échec du téléchargement de l'image.";
        }

        header("Location: /index.php?page=myAccount");
        exit();
    }
}
