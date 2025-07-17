<?php
session_start();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/autoload.php';

$db = new Database();
$pdo = $db->getPDO();

$controller = new HomeController();
$userManager = new UserManager($pdo);
$userController = new UserController($userManager);
$bookController = new BookController();

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'DetailBook':
        $bookController->showDetailBook();
        break;
    case 'BookExchange':
        $bookController->showBookExchange();
        break;
    case 'updateBook':
        $bookController->showUpdateBook();
        break;
    case 'loginForm':
        $userController->showLoginForm();
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
