<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <title>Tom Troc</title>
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;700&family=Playfair+Display:wght@400;700&display=swap" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" />
    <link href="/css/style.css" rel="stylesheet" />
</head>

<body>
    <header>
        <nav class="navbar navbar-expand-lg bg-light">
            <div class="custom-container">
                <a class="navbar-brand" href="/index.php?page=home">
                    <img src="images/logoNavbar.png" alt="Logo Tom Troc" class="navbar-logo">
                </a>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarContent"
                    aria-controls="navbarContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarContent">
                    <ul class="navbar-nav me-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item mx-2">
                            <a class="nav-link nav-accueil" href="/index.php?page=home">Accueil</a>
                        </li>
                        <li class="nav-item mx-2">
                            <a class="nav-link" href="/index.php?page=BookExchange">Nos livres à l'échange</a>
                        </li>
                    </ul>

                    <div class="vr mx-3 d-none d-lg-block"></div>

                    <ul class="navbar-nav mx-auto mb-2 mb-lg-0 align-items-center">
                        <li class="nav-item mx-2">
                            <a class="nav-link d-flex align-items-center" href="/index.php?page=chat">
                                <img src="images/Icon_messagerie.png" alt="Messagerie" class="icon-nav me-1">
                                <span class="d-flex align-items-center">
                                    Messagerie
                                    <?php $newMessagesCount = $GLOBALS['newMessagesCount'] ?? 0; ?>
                                    <?php if ($newMessagesCount > 0): ?>
                                        <span class="unread-badge ms-2">
                                            <?= $newMessagesCount ?>
                                        </span>
                                    <?php endif; ?>
                                </span>
                            </a>
                        </li>
                        <?php if (isset($_SESSION['user'])): ?>
                            <li class="nav-item mx-2">
                                <a class="nav-link d-flex align-items-center" href="index.php?page=myAccount">
                                    <img src="images/Icon_myaccount.png" alt="Mon compte" class="icon-nav">
                                    Mon compte
                                </a>
                            </li>
                            <li class="nav-item mx-2">
                                <a href="index.php?page=logout" class="nav-link"
                                    onclick="return confirm('Voulez-vous vraiment vous déconnecter ?');">
                                    Déconnexion
                                </a>
                            </li>
                        <?php else: ?>
                            <li class="nav-item mx-2">
                                <a class="nav-link" href="index.php?page=userForm">Connexion</a>
                            </li>
                        <?php endif; ?>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
    <?php if (!empty($_SESSION['message'])) : ?>
        <div class="alert alert-info">
            <?= htmlspecialchars($_SESSION['message']) ?>
        </div>
        <?php unset($_SESSION['message']); ?>
    <?php endif; ?>