<?php
session_start();
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/autoload.php';

$db = new Database();
$pdo = $db->getPDO();
$userManager = new UserManager($pdo);

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'DetailBook':
        $bookController = new DetailBookController();
        $bookController->showDetailBook();
        break;
    case 'BookExchange':
        $bookController = new BookExchangeController();
        $bookController->showBookExchange();
        break;
    case 'userForm':
        $userController = new UserController($userManager);
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $userController->signUpUser();
        } else {
            $userController->showInscriptionForm();
        }
        break;
    case 'home':
    default:
        $controller = new HomeController();
        $controller->showHome();
        break;
}
