<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= isset($pageTitle) ? $pageTitle . ' — FitSpace' : 'FitSpace — Gestionnaire de réservations' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Syne:wght@700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
</head>
<body>

  <!-- NAV PUBLIC -->
  <nav class="nav-public">
    <a href="<?= base_url('/') ?>" class="brand">Fit<span>Space</span></a>
    <div class="nav-links">
      <a href="<?= base_url('/creneaux') ?>">Nos créneaux</a>
      <a href="#">Tarifs</a>
      
      <?php if (session()->get('user_id')): ?>
        <!-- Utilisateur connecté -->
        <a href="<?= base_url('/client/dashboard') ?>">Mon espace</a>
        <a href="<?= base_url('/logout') ?>">Déconnexion</a>
      <?php else: ?>
        <!-- Non connecté -->
        <a href="<?= base_url('/login') ?>">Connexion</a>
        <a href="<?= base_url('/register') ?>" class="btn-nav-primary">S'inscrire</a>
      <?php endif; ?>
    </div>
  </nav>

  <!-- CONTENU DE LA PAGE (injecté ici) -->
  <?= $this->renderSection('content') ?>

  <!-- FOOTER -->
  <div class="footer-public">FitSpace &copy; 2025 — Projet CodeIgniter 4 · Tous droits <span>réservés</span></div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('js/app.js') ?>"></script>
</body>
</html>
