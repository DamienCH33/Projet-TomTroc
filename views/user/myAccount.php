<div class="container-fluid homeOne py-5">
    <div class="d-flex flex-column align-items-left">
        <div class="section-title">
            <h1 class="mb-0 text-start mb-3">Mon compte</h1>
        </div>
        <div class="d-flex justify-content-center gap-5">
            <!-- Section 1 (profil) -->
            <div class="profile-section bg-white p-5 rounded d-flex flex-column align-items-center justify-content-start">
                <img src="/<?= htmlspecialchars($user->getPicture() ?: 'images/images_profile/default.png') ?>" alt="Image de profil" class="profile-img img-fluid rounded-circle mb-3">
                <a href="#" class="modifier-link mb-3" onclick="document.getElementById('fileInput').click(); return false;">modifier</a>
                <form method="POST" action="index.php?page=updateProfilePicture" enctype="multipart/form-data" id="pictureForm">
                    <input type="file" name="picture" id="fileInput" accept="image/*" style="display: none;" onchange="document.getElementById('pictureForm').submit();">
                </form>
                <div class="separator mb-3"></div>
                <h2 class="text-muted mb-1 custom-name"><?= htmlspecialchars($user->getPseudo()) ?></h2>
                <p class="text-muted mb-3 custom-date">Membre depuis <?= $user->getAccountAge() ?></p>
                <p class="mb-1 custom-bibli">BIBLIOTHÈQUE</p>
                <p class="text-muted d-flex align-items-center">
                    <img src="images/logoLivre.png" alt="Livre" class="me-2 livre-icon custom-number">
                    <?= $nbBooks ?> livre(s)
                </p>
            </div>
            <!-- Section 2 (infos personnelles) -->
            <div class="form-section bg-white p-4 rounded d-flex flex-column align-items-center justify-content-center text-center">
                <form method="POST" action="index.php?page=updateAccount">
                    <h5 class="mb-4 text-start">Vos informations personnelles</h5>

                    <div class="mb-3 text-start">
                        <label for="email" class="form-label small">Adresse email</label>
                        <input type="email" id="email" name="email" value="<?= htmlspecialchars($user->getEmail()) ?>" class="form-control" />
                    </div>

                    <div class="mb-3 text-start">
                        <label for="password" class="form-label small">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control" />
                    </div>

                    <div class="mb-3 text-start">
                        <label for="pseudo" class="form-label small">Pseudo</label>
                        <input type="text" id="pseudo" name="pseudo" value="<?= htmlspecialchars($user->getPseudo()) ?>" class="form-control" />
                    </div>

                    <div class="text-center pt-2">
                        <button type="submit" class="btn btn-success fw-bold custom-button py-3">Enregistrer</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- Section 3 : tableau -->
<div class="container-fluid homeThree py-3">
    <div class="table-wrapper table-responsive bg-white rounded p-3">
        <table class="table table-borderless align-middle mb-0 custom-table">
            <thead>
                <tr class="text-uppercase small text-muted border-bottom">
                    <th scope="col">Photo</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Auteur</th>
                    <th scope="col">Description</th>
                    <th scope="col">Disponibilité</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($books as $book): ?>
                    <tr>
                        <td><img src="<?= htmlspecialchars($book->getImages()) ?>" alt="book" class="rounded livre-image"></td>
                        <td>
                            <div class="livre-titre"><?= htmlspecialchars($book->getTitle()) ?></div>
                        </td>
                        <td>
                            <div class="livre-auteur"><?= htmlspecialchars($book->getAuthor()) ?></div>
                        </td>
                        <td>
                            <div class="livre-description"><?= htmlspecialchars($book->getDescription()) ?></div>
                        </td>
                        <td>
                            <span class="availability-badge <?= $book->getAvailableClass() ?>" style="white-space: nowrap;">
                                <?= $book->getAvailableLabel() ?>
                            </span>
                        </td>
                        <td>
                            <div class="livre-actions">
                                <a href="/index.php?page=updateBook&id=<?= $book->getId() ?>" class="action-link">Éditer</a>
                                <form action="/index.php?page=deleteBook" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer ce livre ?');" style="display:inline;">
                                    <input type="hidden" name="id" value="<?= $book->getId() ?>">
                                    <button type="submit" class="action-link-delete btn btn-link p-0 m-0">Supprimer</button>
                                </form>
                            </div>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

        <div class="text-end mt-3">
            <a href="/index.php?page=addBook" class="btn btn-primary btn-lg custom-button">Ajouter un livre</a>
        </div>
    </div>
</div>