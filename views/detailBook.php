<section class="homeOne pt-5">
    <div class="container-fluid mt-5">
        <div class="row align-items-stretch">

            <div class="col-md-6 p-0">
                <img src="<?= htmlspecialchars($books->getImages()) ?>" alt="Couverture du livre"
                    class="img-fluid w-100 h-100 object-fit-cover">
            </div>
            <div class="col-md-6 d-flex flex-column justify-content-center ps-5">
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
                <a href="/index.php?page=BookExchange" class="btn btn-success btn-lg mt-6">Envoyer un message</a>
            </div>

        </div>
    </div>
</section>