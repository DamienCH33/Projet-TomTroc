<section class="homeOne pt-5" style="min-height: 600px;">
  <div class="container h-100 mt-5">
    <div class="row h-100 align-items-stretch">
      <div class="col-md-6 p-0 d-none d-md-block">
        <img src="<?= htmlspecialchars($books->getImages()) ?>" alt="Couverture du livre" 
             class="img-fluid fixed-size-image">
      </div>
      <div class="col-md-6 d-flex flex-column justify-content-center px-3">
        <h1><?= htmlspecialchars($books->getTitle()) ?></h1>
        <p class="text-muted">par <?= htmlspecialchars($books->getAuthor()) ?></p>
        <hr class="small-line mx-0 my-3">
        <p>Description</p><br>
        <p><?= nl2br(htmlspecialchars($books->getDescription())) ?></p>
        <p class="mt-4">Propriétaire</p><br>
        <a href="/index.php?page=BookExchange" class="user-badge">
          <img src="images/Mask group.png" alt="avatar" class="avatar">
          <span class="username"><?= htmlspecialchars($books->getSellBy()) ?></span>
        </a>
        <a href="/index.php?page=BookExchange" class="btn btn-success btn-lg mt-5">Envoyer un message</a>
      </div>
    </div>
  </div>
</section>
