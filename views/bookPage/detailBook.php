<section class="pt-5" style="min-height: 600px;">
  <div class="container-fluid h-100 mt-3 p-0">
    <div class="row h-100 p-0 align-items-stretch">
      <div class="col-md-6 p-0 d-none d-md-block">
        <img style="width: 100%"src="<?= htmlspecialchars($book->getImages()) ?>" alt="Couverture du livre"
          class="img-fluid fixed-size-image">
      </div>
      <div class="col-md-6 d-flex flex-column justify-content-center px-3">
        <h1><?= htmlspecialchars($book->getTitle()) ?></h1>
        <p class="text-muted">par <?= htmlspecialchars($book->getAuthor()) ?></p>
        <hr class="small-line mx-0 my-3">
        <p>Description</p><br>
        <p><?= nl2br(htmlspecialchars($book->getDescription())) ?></p>
        <p class="mt-4">Propriétaire</p><br>
        <a href="/index.php?page=publicAccount" class="user-badge">
          <img src="images/Mask group.png" alt="avatar" class="avatar">
          <span class="username"><?= htmlspecialchars($book->getSellBy()) ?></span>
        </a>
        <a href="/index.php?page=BookExchange" class="btn btn-success btn-lg mt-5">Envoyer un message</a>
      </div>
    </div>
  </div>
</section>