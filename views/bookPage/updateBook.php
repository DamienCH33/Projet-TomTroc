<div class="container-fluid py-5 px-0 bg-custom-book">
    <div class="container">
        <div class="mb-4">
            <a href="index.php?page=myAccount" class="text-decoration-none text-custom mb-4">&larr;&nbsp;retour</a>
            <h1 class="mt-2 custom-title-book">Modifier les informations</h1>
        </div>
        <div class="row justify-content-center bg-white p-4 rounded shadow-sm">
            <div class="row gap-5">
                <!-- Bloc Photo -->
                <div class="col-auto bloc-photo-custom">
                    <p class="mb-2 custom-P">Photo</p>
                    <img src="<?= htmlspecialchars($book->getImages()) ?>" alt="Image du livre"
                        class="img-fluid mb-2" style="width: 488px; height: 553px; object-fit: cover;">
                    <div class="text-left mb-3 px-4" style="width: 488px; text-align: right;">
                        <a href="#" class="custom-link" onclick="document.getElementById('fileInput').click(); return false;">
                            Modifier la photo
                        </a>
                    </div>
                    <form method="POST" action="index.php?page=updatePictureBook&id=<?= $book->getId() ?>" enctype="multipart/form-data" id="pictureForm">
                        <input type="file" name="images" id="fileInput" accept="image/*" style="display: none;" onchange="document.getElementById('pictureForm').submit();">
                    </form>
                </div>

                <!-- Bloc Formulaire -->
                <div class="col-auto" style="width: 488px; margin-left: 30px;">
                    <form method="POST" action="index.php?page=updateBookSubmit">
                        <input type="hidden" name="id" value="<?= $book->getId() ?>">

                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control input-title" id="title" name="title" value="<?= htmlspecialchars($book->getTitle()) ?>">
                        </div>

                        <div class="mb-3">
                            <label for="author" class="form-label">Auteur</label>
                            <input type="text" class="form-control input-author" id="author" name="author" value="<?= htmlspecialchars($book->getAuthor()) ?>">
                        </div>

                        <div class="mb-3">
                            <label for="description" class="form-label">Commentaire</label>
                            <textarea class="form-control textarea-description" id="description" name="description"><?= htmlspecialchars($book->getDescription()) ?></textarea>
                        </div>

                        <div class="mb-3">
                            <label for="available" class="form-label">Disponibilité</label>
                            <select name="available" id="available" class="form-select select-availability input-available">
                                <option value="1" <?= $book->isAvailable() ? 'selected' : '' ?>>Disponible</option>
                                <option value="0" <?= !$book->isAvailable() ? 'selected' : '' ?>>Non disponible</option>
                            </select>
                        </div>
                        <button type="submit" class="btn btn-success btn-lg btn-validate">Valider</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>