<?php

class UserController
{
    private UserManager $userManager;

    public function __construct(UserManager $userManager)
    {
        $this->userManager = $userManager;
    }
    protected function checkIfUserIsConnected(): void
    {
        if (empty($_SESSION['userEmail'])) {
            $_SESSION['message'] = "Accès refusé. Veuillez vous connecter.";
            header("Location: index.php?page=loginForm");
            exit();
        }
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

        $email = $_SESSION['userEmail'];

        $db = new Database();
        $pdo = $db->getPDO();

        $manager = new UserManager($pdo);
        $user = $manager->getUserByEmail($email);

        $bookManager = new BookExchangeManager($pdo);
        $books = $bookManager->getBooksByUser($user);

        $view = new View("user/myAccount");
        $view->render([
            'user' => $user,
            'books' => $books,
        ]);
    }

    public function showUserProfile()
    {
        $db = new Database();
        $pdo = $db->getPDO();

        $pseudo = $_GET['pseudo'] ?? null;

        $manager = new UserManager($pdo);
        $user = $manager->getUserByPseudo($pseudo);

        $view = new View("user/publicAccount");
        $view->render(['user' => $user]);
        if (!$user) {

            $view = new View("error/notFound");
            $view->render(["message" => "Utilisateur introuvable"]);
            return;
        }
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
        $_SESSION['userId'] = $user->getId();
        $_SESSION['userEmail'] = $user->getEmail();

        header("Location: /index.php?page=myAccount");
        exit();
    }
    public function disconnectUser(): void
    {
        unset($_SESSION['userEmail']);
        unset($_SESSION['userId']);

        header("Location: /index.php?page=home");
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

        $id = $_SESSION['userId'];
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
    /*public function updatePictureProfile(){
        $this->checkIfUserIsConnected();
        $id = $_SESSION['userId'];
        $picture = $_SESSION['userPicture'];

        $success = $this->userManager->updatePicture($id, $picture);
        if ($success) {
                $_SESSION['userPicture'] = $picture;
                $_SESSION['message'] = "Votre photo de profil a été mis à jour avec succès.";
            } else {
                $_SESSION['message'] = "Une erreur s'est produite lors de la mise à jour de votre compte.";
        }
        header("Location: /index.php?page=myAccount");
        exit();
    }*/
}
