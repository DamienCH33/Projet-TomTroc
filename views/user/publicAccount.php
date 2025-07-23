<!-- FOND GLOBAL -->
<div class="container-fluid py-5 global-background">
    <div class="row">
        <div class="col-md-4">
            <!-- BLOC PROFIL -->
            <div class="profile-box d-flex flex-column align-items-center bg-white p-4 rounded shadow-sm">
                <img src="/images/images_profile/nathalire.jpg" alt="Image de profil" class="profile-img img-fluid rounded-circle mb-3">
                <div class="separator mb-3"></div>
                <h2 class="text-muted mb-1"><?= htmlspecialchars($user->getPseudo()) ?></h2>
                <p class="text-muted mb-3">Membre depuis <?= $user->getAccountAge() ?></p>
                <p class="mb-1">BIBLIOTHÈQUE</p>
                <p class="text-muted d-flex align-items-center">
                    <img src="images/logoLivre.png" alt="Livre" class="me-2 livre-icon">
                    <?= $nbBooks ?> livre(s)
                </p>
                <a href="/index.php?page=BookExchange" class="btn btn-primary btn-lg custom-button mt-3">Écrire un message</a>
            </div>
        </div>
        <!-- BLOC TABLEAU -->
        <div class="col-md-8">
            <div class="table-box bg-white rounded shadow-sm">
                <div class="table-responsive">
                    <table class="table table-borderless align-middle custom-table">
                        <thead>
                            <tr class="text-uppercase small text-muted border-bottom">
                                <th scope="col">Photo</th>
                                <th scope="col">Titre</th>
                                <th scope="col">Auteur</th>
                                <th scope="col">Description</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($books as $book): ?>
                                <tr>
                                    <td class="livre-image">
                                        <img src="<?= htmlspecialchars($book->getImages()) ?>" alt="book" class="img-fluid rounded" style="width: 40px;">
                                    </td>
                                    <td class=" livre-titre"><?= htmlspecialchars($book->getTitle()) ?></td>
                                    <td class=" livre-auteur"><?= htmlspecialchars($book->getAuthor()) ?></td>
                                    <td class=" livre-description"><?= htmlspecialchars($book->getDescription()) ?></td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>