<!DOCTYPE html>
<html lang="fr">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title><?= isset($pageTitle) ? $pageTitle . ' — FitSpace' : 'FitSpace' ?></title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" />
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;600&family=Syne:wght@700;800&display=swap" rel="stylesheet" />
  <link rel="stylesheet" href="<?= base_url('css/main.css') ?>">
</head>
<body>

  <div class="app-wrapper">
    
    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="sidebar-logo">Fit<span>Space</span>
        <?php if (session()->get('role') === 'admin'): ?>
          <span style="font-size:0.6rem;background:#e94560;color:#fff;padding:2px 6px;border-radius:4px;vertical-align:middle;margin-left:0.25rem;">Admin</span>
        <?php endif; ?>
      </div>

      <div class="sidebar-section">Menu</div>
      <ul class="sidebar-nav">
        <?php if (session()->get('role') === 'admin'): ?>
          <!-- Menu Admin -->
          <li><a href="<?= base_url('/admin/dashboard') ?>" class="<?= (current_page() == 'admin/dashboard') ? 'active' : '' ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
          </a></li>
          <li><a href="<?= base_url('/admin/creneaux') ?>" class="<?= (current_page() == 'admin/creneaux') ? 'active' : '' ?>">
            <i class="bi bi-calendar2-event"></i> Créneaux
          </a></li>
          <li><a href="<?= base_url('/admin/reservations') ?>" class="<?= (current_page() == 'admin/reservations') ? 'active' : '' ?>">
            <i class="bi bi-bookmark"></i> Réservations
          </a></li>
        <?php else: ?>
          <!-- Menu Client -->
          <li><a href="<?= base_url('/client/dashboard') ?>" class="<?= (current_page() == 'client/dashboard') ? 'active' : '' ?>">
            <i class="bi bi-speedometer2"></i> Dashboard
          </a></li>
          <li><a href="<?= base_url('/client/reservations') ?>" class="<?= (current_page() == 'client/reservations') ? 'active' : '' ?>">
            <i class="bi bi-bookmark"></i> Mes réservations
          </a></li>
        <?php endif; ?>
      </ul>

      <div class="sidebar-footer">
        <div class="sidebar-user">
          <div class="avatar"><?= strtoupper(substr(session()->get('name'), 0, 1)) ?></div>
          <div class="user-info">
            <div class="name"><?= esc(session()->get('name')) ?></div>
            <div class="role"><?= session()->get('role') === 'admin' ? 'Administrateur' : 'Client' ?></div>
          </div>
        </div>
        <a href="<?= base_url('/logout') ?>" style="display:block;padding:0.5rem;text-align:center;color:#7b7b96;font-size:0.8rem;text-decoration:none;margin-top:0.5rem;">
          <i class="bi bi-box-arrow-right"></i> Déconnexion
        </a>
      </div>
    </aside>

    <!-- CONTENU PRINCIPAL -->
    <div class="main-content">
      <div class="topbar">
        <div class="topbar-title"><?= isset($pageTitle) ? $pageTitle : 'Dashboard' ?></div>
        <div class="topbar-actions">
          <button class="icon-btn"><i class="bi bi-bell"></i></button>
          <button class="icon-btn"><i class="bi bi-gear"></i></button>
        </div>
      </div>

      <div class="page-content">
        <!-- Affichage des messages flash -->
        <?php if (session()->getFlashdata('success')): ?>
          <div class="flash-message flash-success">
            <i class="bi bi-check-circle"></i>
            <?= session()->getFlashdata('success') ?>
          </div>
        <?php endif; ?>
        
        <?php if (session()->getFlashdata('error')): ?>
          <div class="flash-message flash-error">
            <i class="bi bi-exclamation-triangle"></i>
            <?= session()->getFlashdata('error') ?>
          </div>
        <?php endif; ?>

        <!-- CONTENU DE LA PAGE -->
        <?= $this->renderSection('content') ?>
      </div>
    </div>

  </div>

  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
  <script src="<?= base_url('js/app.js') ?>"></script>
</body>
</html>
