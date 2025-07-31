<div class="container-fluid py-5 global-background">
    <div class="container">
        <div class="row">
            <div class="col-md-4">
                <!-- BLOC PROFIL -->
                <div class="profile-box d-flex flex-column align-items-center bg-white p-4 rounded">
                    <img src="/<?= htmlspecialchars($user->getPicture() ?: 'images/images_profile/default.png') ?>" alt="Image de profil" class="profile-img img-fluid rounded-circle mb-3 mt-4">
                    <div class="separator mb-3"></div>
                    <div class="d-flex flex-column align-items-center justify-content-center text-center profil-container">
                        <div class="profil">
                            <h2 class="text-muted mb-1 custom-name"><?= htmlspecialchars($user->getPseudo()) ?></h2>
                            <p class="text-muted mb-3 custom-date">Membre depuis <?= $user->getAccountAge() ?></p>
                            <p class="mb-1 custom-bibli">BIBLIOTHÈQUE</p>
                            <p class="text-muted d-flex align-items-center justify-content-center custom-number">
                                <img src="images/logoLivre.png" alt="Livre" class="me-2 livre-icon">
                                <?= $nbBooks ?> livre(s)
                            </p>
                        </div>
                        <a href="/index.php?page=chat&with=<?= $user->getId() ?>" class="btn btn-primary btn-lg custom-button mt-3">
                            Écrire un message
                        </a>
                    </div>
                </div>
            </div>
            <!-- BLOC TABLEAU -->
            <div class="col-md-8">
                <div class=" p-3">
                    <table class="custom-table-bis w-75">
                        <thead>
                            <tr>
                                <th>Photo</th>
                                <th>Titre</th>
                                <th>Auteur</th>
                                <th>Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($books as $book): ?>
                                <tr>
                                    <td class="livre-image">
                                        <img src="<?= htmlspecialchars($book->getImages()) ?>" alt="book" class="img-fluid rounded" style="width: 40px;">
                                    </td>
                                    <td class="livre-titre"><?= htmlspecialchars($book->getTitle()) ?></td>
                                    <td class="livre-auteur"><?= htmlspecialchars($book->getAuthor()) ?></td>
                                    <td class="livre-description align-middle"><?= htmlspecialchars($book->getDescription()) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>