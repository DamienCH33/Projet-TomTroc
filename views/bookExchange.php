<section class="homeTwo py-5">
    <div class="container mt-5">
        <div class="row align-items-center justify-content-start mb-4">
            <div class="col-md-4">
                <h1 class="mb-0 text-start">Nos livres à l’échange</h1>
            </div>

            <div class="col-md-4 ms-auto">
                <form class="d-flex" method="GET" role="search" action="index.php" style="max-width: 322px;">
                    <input type="hidden" name="page" value="BookExchange">
                    <input class="form-control" type="search" name="search" placeholder="Rechercher un livre" aria-label="Search" style="height: 50px;" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                </form>
            </div>
        </div>
        <?php if (empty($books)): ?>
            <p>Aucun livre trouvé pour votre recherche.</p>
        <?php else: ?>
            <div class="row justify-content-center gy-5 py-5">
                <?php foreach ($books as $book): ?>
                    <div class="col-md-3">
                        <div class="card shadow-sm border-0">
                            <a href="detailBook.php">
                                <img class="card-img-top" src="<?= htmlspecialchars($book->getImages()) ?>" alt="<?= htmlspecialchars($book->getTitle()) ?>" style="height: 200px; object-fit: cover;">
                            </a>
                            <div class="card-body text-start">
                                <h5 class="card-title"><?= htmlspecialchars($book->getTitle()) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($book->getAuthor()) ?></p>
                                <p class="card-sell">Vendu par : <?= htmlspecialchars($book->getSellBy()) ?></p>
                                <p class="card-available"><?= htmlspecialchars($book->getAvailable()) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>