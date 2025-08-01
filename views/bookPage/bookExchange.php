<section class=" homeTwo py-5">
    <div class="container ">
        <div class="row justify-content-between mb-4 align-items-center">
            <div class="col-md-6">
                <h1 class="mb-0 text-start custom-title">Nos livres à l’échange</h1>
            </div>
            <div class="col-md-3">
                <form class="d-flex custom-search" method="GET" role="search" action="index.php">
                    <input type="hidden" name="page" value="BookExchange">
                    <input class="form-control" type="search" name="search" placeholder="Rechercher un livre" aria-label="Search" style="height: 50px;" value="<?= htmlspecialchars($_GET['search'] ?? '') ?>">
                </form>
            </div>
        </div>
        <?php if (empty($books)): ?>
            <p>Aucun livre trouvé pour votre recherche.</p>
        <?php else: ?>
            <div class="row g-4">
                <?php foreach ($books as $book): ?>
                    <div class="col-md-3">
                        <a href="index.php?page=DetailBook&id=<?= $book->getId() ?>" class="text-decoration-none text-reset">
                            <div class="card shadow-sm">
                                <img class="card-img-top" src="<?= htmlspecialchars($book->getImages()) ?>" alt="<?= htmlspecialchars($book->getTitle()) ?>" style="height: 200px; object-fit: cover;">
                                <?php if (!$book->isAvailable()): ?>
                                    <span class="availability-badge unavailable position-absolute top-0 end-0 m-2">
                                        Non disponible
                                    </span>
                                <?php endif; ?>
                                <div class="card-body text-start">
                                    <h5 class="card-title"><?= htmlspecialchars($book->getTitle()) ?></h5>
                                    <p class="card-text"><?= htmlspecialchars($book->getAuthor()) ?></p>
                                    <p class="card-sell">Vendu par : <?= htmlspecialchars($book->getSellBy()) ?></p>
                                </div>
                            </div>
                        </a>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>