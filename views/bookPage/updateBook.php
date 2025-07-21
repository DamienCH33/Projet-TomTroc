<div class="container py-5">
    <div class="mb-4">
        <a href="index.php?page=myAccount" class="text-decoration-none">&larr; retour</a>
        <h1 class="mt-2">Modifier les informations</h1>
    </div>
    <div class="row">
        <div class="col-6">
            <p class="fw-semibold mb-2">Photo</p>
            <img src="<?= htmlspecialchars($book->getImages()) ?>" alt="Image du livre" class="img-fluid rounded shadow-sm mb-2">
            <div>
                <a href="#" class="text-decoration-underline small text-end">Modifier la photo</a>
            </div>
        </div>
        <div class="col-6 ">
            <form method="POST" action="index.php?page=updateBookSubmit">
                <input type="hidden" name="id" value="<?= $book->getId() ?>">

                <div class="mb-3">
                    <label for="title" class="form-label">Titre</label>
                    <input type="text" class="form-control" id="title" name="title" value="<?= htmlspecialchars($book->getTitle()) ?>">
                </div>

                <div class="mb-3">
                    <label for="author" class="form-label">Auteur</label>
                    <input type="text" class="form-control" id="author" name="author" value="<?= htmlspecialchars($book->getAuthor()) ?>">
                </div>

                <div class="mb-3">
                    <label for="description" class="form-label">Commentaire</label>
                    <textarea class="form-control" id="description" name="description" rows="5"><?= htmlspecialchars($book->getDescription()) ?></textarea>
                </div>

                <div class="mb-3">
                    <label for="available" class="form-label">Disponibilité</label>
                    <select name="available" id="available" class="form-select">
                        <option value="1" <?= $book->isAvailable() ? 'selected' : '' ?>>Disponible</option>
                        <option value="0" <?= !$book->isAvailable() ? 'selected' : '' ?>>Non disponible</option>
                    </select>
                </div>
                <button type="submit" class="btn btn-success btn-lg w-75">Valider</button>
            </form>
        </div>
    </div>
</div>