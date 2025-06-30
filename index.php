<?php
require_once __DIR__ . '/config/config.php';
require_once __DIR__ . '/config/autoload.php';

$page = $_GET['page'] ?? 'home';

switch ($page) {
    case 'BookExchange':
        $bookController = new BookExchangeController();
        $bookController->showBookExchange();
        break;

    case 'home':
    default:
        $controller = new HomeController();
        $controller->showHome();
        break;
}