<?php
abstract class AbstractController
{
    protected function checkIfUserIsConnected(): void
    {
        if (empty($_SESSION['user']) || empty($_SESSION['user']['email'])) {
            $_SESSION['message'] = "Accès refusé. Veuillez vous connecter.";
            header("Location: index.php?page=loginForm");
            exit();
        }
    }
}