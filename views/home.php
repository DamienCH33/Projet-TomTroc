<div class="custom-container-1440">
    <section class="homeOne py-5">
        <div class="container-fluid mt-5">
            <div class="row align-items-center">
                <div class="col-md-4 offset-md-1 home">
                    <h1>Rejoignez nos <br>lecteurs passionnés</h1>
                    <p class="limited-width">Donnez une nouvelle vie à vos livres en les échangeant avec d'autres amoureux de la lecture.
                        Nous croyons en la magie du partage de connaissances et d'histoires à travers les livres.
                    </p>
                    <p>
                        <a href="/index.php?page=BookExchange" class="btn btn-primary btn-lg custom-button-reverse">Découvrir</a>
                    </p>
                </div>
                <div class="col-md-6 mb-6">
                    <img src="images/hamza-nouasria.png" alt="Un homme qui lit assis">
                    <p class="picturename">Hamza</p>
                </div>
            </div>
        </div>
    </section>
    <section class="homeTwo py-5">
        <div class="container mt-5">
            <h1 class="w-100 text-center mb-4">Les derniers livres ajoutés</h1>

            <div class="row justify-content-center gx-4 gy-4">
                <?php foreach (array_slice($books, 0, 4) as $book): ?>
                    <div class="col-auto">
                        <div class="card shadow-sm border-0 mx-auto">
                            <a href="detailBook.php">
                                <img class="card-img-top" src="<?= htmlspecialchars($book->getImages()) ?>" alt="<?= htmlspecialchars($book->getTitle()) ?>" style="height: 200px; object-fit: cover;">
                            </a>
                            <div class="card-body text-start">
                                <h5 class="card-title"><?= htmlspecialchars($book->getTitle()) ?></h5>
                                <p class="card-text"><?= htmlspecialchars($book->getAuthor()) ?></p>
                                <p class="card-sell">Vendu par : <?= htmlspecialchars($book->getSellBy()) ?></p>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>

            <div class="d-flex justify-content-center py-4 mt-3">
                <a href="/index.php?page=BookExchange" class="btn btn-primary btn-lg custom-button-reverse">Voir tous les livres</a>
            </div>
        </div>
    </section>
    <section class="homeThree py-5">
        <div class="container-fluid">
            <div class="row justify-content-center text-center">
                <div class="col-12 mb-5 mt-5">
                    <h2 class="mb-4">Comment ça marche ?</h2>
                    <p>Échanger des livres avec TomTroc c’est simple et <br> amusant ! Suivez ces étapes pour commencer :</p>
                </div>
                <div class="col-auto">
                    <div class="card-info d-flex align-items-center justify-content-center">
                        <p class="card-text-info mb-0">
                            Inscrivez-vous gratuitement sur
                            notre plateforme.
                        </p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="card-info d-flex align-items-center justify-content-center">
                        <p class="card-text-info mb-0">
                            Ajoutez les livres que vous souhaitez échanger à votre profil.
                        </p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="card-info d-flex align-items-center justify-content-center">
                        <p class="card-text-info mb-0">
                            Parcourez les livres disponibles chez d'autres membres.
                        </p>
                    </div>
                </div>
                <div class="col-auto">
                    <div class="card-info d-flex align-items-center justify-content-center">
                        <p class="card-text-info mb-0">
                            Proposez un échange et discutez avec d'autres passionnés de lecture.
                        </p>
                    </div>
                </div>
                <div class="col-12 d-flex justify-content-center mt-4">
                    <a href="views/bookExchange.php" class="btn btn-primary btn-lg custom-button">Voir tous les livres</a>
                </div>
            </div>
            <img class="img-fluid py-5" src="images/banner-home.png" alt="Femme qui cherche un livre sur des étagères">
        </div>
        <div class="container-fluid">
            <div class="row justify-content-center text-center mb-5">
                <div class="col-12 col-md-8 text-start custom-container-value">
                    <h2 class="mb-4">Nos valeurs</h2>
                    <p>
                        Chez Tom Troc, nous mettons l'accent sur le partage, la découverte et la communauté. Nos valeurs sont ancrées dans notre passion pour les livres et notre désir de créer des liens entre les lecteurs. Nous croyons en la puissance des histoires pour rassembler les gens et inspirer des conversations enrichissantes.<br><br>
                        Notre association a été fondée avec une conviction profonde : chaque livre mérite d'être lu et partagé.<br><br>
                    </p>
                    <p>
                        Nous sommes passionnés par la création d'une plateforme conviviale qui permet aux lecteurs de se connecter, de partager leurs découvertes littéraires et d'échanger des livres qui attendent patiemment sur les étagères.
                    </p>

                    <p class="sign mt-4">L’équipe Tom Troc</p>
                    <div class="d-flex justify-content-end custom-heart">
                        <img class="img-fluid" src="images/logoCoeur.png" alt="logo coeur">
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>