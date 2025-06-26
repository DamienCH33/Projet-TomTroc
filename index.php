<?php
require_once 'core/view.php';
require_once 'controllers/homeController.php';

$controller = new HomeController();
$controller->showHome();