<?php if (!empty($_SESSION['message'])): ?>
    <div class="alert alert-<?= $_SESSION['message_type'] ?? 'danger' ?> text-center">
        <?= htmlspecialchars($_SESSION['message']) ?>
    </div>
    <?php
    unset($_SESSION['message']);
    unset($_SESSION['message_type']);
    ?>
<?php endif; ?>

<div class="container-fluid vh-100">
  <div class="row h-100">
    <section class="col-md-6 d-flex flex-column justify-content-center align-items-center bg-light">
      <div class="w-50">
        <h1 class="mb-4">Inscription</h1>
        <form method="POST" action="index.php?page=userForm">
          <div class="mb-3">
            <label for="pseudo" class="form-label">Pseudo</label>
            <input type="text" id="pseudo" name="pseudo" class="form-control" required />
          </div>

          <div class="mb-3">
            <label for="email" class="form-label">Adresse email</label>
            <input type="email" id="email" name="email" class="form-control" required />
          </div>

          <div class="mb-4">
            <label for="password" class="form-label">Mot de passe</label>
            <input type="password" id="password" name="password" class="form-control" required />
          </div>

          <button type="submit" class="btn btn-success w-100 mb-3">S’inscrire</button>
        </form>

        <p class="text-center">
          Déjà inscrit ? <a href="/index.php?page=loginForm">Connectez-vous</a>
        </p>
      </div>
    </section>

    <section class="col-md-6 p-0 d-none d-md-block">
      <img src="images/bookwall.jpg" alt="Bibliothèque" class="img-fluid fixed-size-image" />
    </section>
  </div>
</div>