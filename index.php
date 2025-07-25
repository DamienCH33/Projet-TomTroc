<?php
session_start();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/autoload.php';

$db = new Database();
$pdo = $db->getPDO();

$userManager = new UserManager();
$bookManager = new BookExchangeManager();
$chatManager = new ChatManager();

$controller = new HomeController($bookManager);
$userController = new UserController();
$bookController = new BookController($bookManager);
$chatController = new ChatController($chatManager, $userManager, $bookManager);

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'sendMessage':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $chatController->sendMessage();
        } else {
            header('Location: index.php?page=chat');
        }
        break;
    case 'chat':
        $chatController->showChat();
        break;
    case 'DetailBook':
        $bookController->showDetailBook();
        break;
    case 'BookExchange':
        $bookController->showBookExchange();
        break;
    case 'updateBook':
        $bookController->showUpdateBook();
        break;
    case 'updateBookSubmit':
        $bookController->updateBookProfile();
        break;
    case 'deleteBook':
        $userController->deleteBookUserProfile();
        break;
    case 'loginForm':
        $userController->showLoginForm();
        break;
    case 'logout':
        $userController->logout();
        break;
    case 'publicAccount':
        $userController->showUserProfile();
        break;
    case 'userForm':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->signUpUser();
        } else {
            $userController->showInscriptionForm();
        }
        break;
    case 'myAccount':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->logInUser();
        } else {
            $userController->showMyAccount();
        }
        break;
    case 'updateAccount':
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->updateUserProfile();
        } else {
            header("Location: index.php?page=myAccount");
            exit();
        }
        break;
    case 'home':
    default:
        $controller->showHome();
        break;
}
