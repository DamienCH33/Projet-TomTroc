
<h1>Modifier <?= htmlspecialchars($book->getTitle()) ?></h1>
<form method="POST" action="index.php?page=updateBookSubmit">
  <input type="hidden" name="id" value="<?= $book->getId() ?>">
  <input type="text" name="title" value="<?= htmlspecialchars($book->getTitle()) ?>">
  <input type="text" name="author" value="<?= htmlspecialchars($book->getAuthor()) ?>">
  <textarea name="description"><?= htmlspecialchars($book->getDescription()) ?></textarea>
  <input type="text" name="available" value="<?= htmlspecialchars($book->getAvailable()) ?>">
  <button type="submit">Enregistrer</button>
</form>
