<section class="pt-5" style="min-height: 600px;">
  <div class=" h-100 mt-3 p-0">
    <div class="container">
      <div class="row h-100 p-0 align-items-stretch">
        <div class="col-12 mb-4">
          <nav class="text-custom" aria-label="breadcrumb">
            <ol class="breadcrumb mb-0">
              <li class="breadcrumb-item">
                <a href="index.php?page=BookExchange" class="text-custom text-decoration-none text-reset">Nos livres</a>
              </li>
              <li class="breadcrumb-item active text-muted text-custom" aria-current="page">
                <?= htmlspecialchars($book->getTitle()) ?>
              </li>
            </ol>
          </nav>
        </div>
        <div class="col-md-6 p-0 d-none d-md-block">
          <img style="width: 100%" src="<?= htmlspecialchars($book->getImages()) ?>" alt="Couverture du livre"
            class="img-fluid fixed-size-image">
        </div>
        <div class="col-md-5 d-flex flex-column justify-content-center px-3 ms-5">
          <h1><?= htmlspecialchars($book->getTitle()) ?></h1>
          <p class="text-muted custom-author">par <?= htmlspecialchars($book->getAuthor()) ?></p>
          <hr class="small-line mx-0 my-3">
          <p class="custom-bibli">Description</p><br>
          <p class="custom-number"><?= nl2br(htmlspecialchars($book->getDescription())) ?></p>
          <p class="mt-4 custom-bibli">Propriétaire</p><br>
          <a href="/index.php?page=publicAccount&pseudo=<?= urlencode($book->getSellBy()) ?>" class="user-badge">
            <?php if ($user !== null): ?>
              <img src="<?= htmlspecialchars($user->getPicture()) ?>" alt="Photo de profil" class="avatar">
            <?php else: ?>
              <!-- Affichage alternatif si pas d'utilisateur ou pas de photo -->
              <img src="images/livres.jpeg" alt="Photo de profil par défaut" class="avatar">
            <?php endif; ?>
            <span class="username"><?= htmlspecialchars($book->getSellBy()) ?></span>
          </a>
          <a href="/index.php?page=chat&with=<?= urlencode($book->getSellBy()) ?>" class="btn btn-primary btn-lg custom-button-reverse mt-5">Envoyer un message</a>
        </div>
      </div>
    </div>
  </div>
</section>