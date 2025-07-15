<?php if (!empty($_SESSION['message'])) : ?>
    <div class="alert alert-info">
        <?= htmlspecialchars($_SESSION['message']) ?>
    </div>
    <?php unset($_SESSION['message']); ?>
<?php endif; ?>
<div class="container-fluid homeOne py-5">
    <div class="d-flex flex-column align-items-left">
        <div class="section-title">
            <h1 class="mb-4">Mon compte</h1>
        </div>
        <div class="d-flex justify-content-center gap-5">
            <!-- Section 1 (profil) -->
            <div class="profile-section bg-white p-5 rounded d-flex flex-column align-items-center justify-content-start">
                <img src="/images/images_profile/nathalire.jpg" alt="Image de profil de l'utilisateur" class="profile-img img-fluid rounded-circle mb-3">
                <a href="#" class="modifier-link mb-3">modifier</a>
                <div class="separator mb-3"></div>
                <h2 class="text-muted mb-1"><?= htmlspecialchars($user->getPseudo()) ?></h2>
                <p class="text-muted mb-3">Membre depuis <?= $user->getAccountAge() ?></p>
                <p class="mb-1">BIBLIOTHÈQUE</p>
                <p class="text-muted d-flex align-items-center">
                    <img src="images/logoLivre.png" alt="Livre" class="me-2 livre-icon">
                    4 livres
                </p>
            </div>
            <!-- Section 2 (infos personnelles) -->
            <div class="form-section bg-white p-4 rounded d-flex flex-column align-items-center justify-content-center text-center">
                <form method="POST" action="index.php?page=updateAccount">
                    <h5 class="mb-4 text-start">Vos informations personnelles</h5>

                    <div class="mb-3 text-start">
                        <label for="email" class="form-label small">Adresse email</label>
                        <input type="email" id="email" name="email" class="form-control"/>
                    </div>

                    <div class="mb-3 text-start">
                        <label for="password" class="form-label small">Mot de passe</label>
                        <input type="password" id="password" name="password" class="form-control" />
                    </div>

                    <div class="mb-3 text-start">
                        <label for="pseudo" class="form-label small">Pseudo</label>
                        <input type="text" id="pseudo" name="pseudo" class="form-control"/>
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
        <table class="table table-borderless align-middle mb-0">
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
                <tr>
                    <td><img src="https://via.placeholder.com/70x80" alt="book" class="img-fluid rounded"></td>
                    <td>The Kinkfolk Table</td>
                    <td>Nathan Williams</td>
                    <td><em>J'ai récemment plongé dans les pages de</em></td>
                    <td><span class="availability-badge available">disponible</span></td>
                    <td>
                        <a href="#" class=" action-link">Éditer</a>
                        <a href="#" class=" action-link-delete">Supprimer</a>
                    </td>
                </tr>
            </tbody>
        </table>
    </div>
</div>