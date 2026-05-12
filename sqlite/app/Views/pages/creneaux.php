<?= $this->extend('layouts/public') ?>

<?= $this->section('content') ?>

<div class="page-section">
  <div class="section-head">
    <h2>Créneaux disponibles</h2>
    <span class="count"><?= count($creneaux) ?> créneaux trouvés</span>
  </div>

  <!-- Filtres -->
  <div class="filter-bar">
    <button class="filter-pill active">Tous</button>
    <button class="filter-pill"><i class="bi bi-people-fill"></i> Cours collectifs</button>
    <button class="filter-pill"><i class="bi bi-door-open-fill"></i> Salles</button>
    <button class="filter-pill"><i class="bi bi-dribbble"></i> Terrains</button>
  </div>

  <!-- Grille créneaux -->
  <div class="creneaux-grid">
    
    <?php if (empty($creneaux)): ?>
      <div style="grid-column: 1 / -1;" class="empty-state">
        <i class="bi bi-calendar2-x"></i>
        <p>Aucun créneau disponible pour le moment.</p>
      </div>
    <?php else: ?>
      
      <?php foreach ($creneaux as $creneau): ?>
        <div class="creneau-card <?= ($creneau['places_dispo'] == 0) ? 'full' : '' ?>">
          <div class="creneau-header">
            <span class="creneau-type type-cours"><i class="bi bi-people-fill"></i> <?= esc($creneau['type']) ?></span>
          </div>
          
          <h3 class="creneau-title"><?= esc($creneau['nom']) ?></h3>
          
          <div class="creneau-meta">
            <div class="meta-row">
              <i class="bi bi-calendar3"></i>
              <span><?= date('d/m/Y H:i', strtotime($creneau['date_debut'])) ?></span>
            </div>
            <div class="meta-row">
              <i class="bi bi-geo-alt"></i>
              <span><?= esc($creneau['lieu']) ?></span>
            </div>
          </div>

          <div>
            <div class="places-bar">
              <div class="places-fill" style="width: <?= ($creneau['places_dispo'] > 0) ? ((($creneau['places_total'] - $creneau['places_dispo']) / $creneau['places_total']) * 100) : 100 ?>%"></div>
            </div>
            <div class="places-label"><?= $creneau['places_dispo'] ?> place<?= ($creneau['places_dispo'] > 1) ? 's' : '' ?> restante<?= ($creneau['places_dispo'] > 1) ? 's' : '' ?></div>
          </div>

          <?php if (session()->get('user_id')): ?>
            <?php if ($creneau['places_dispo'] > 0): ?>
              <a href="<?= base_url('/client/reserve/' . $creneau['id']) ?>" class="btn-reserver">Réserver ce créneau</a>
            <?php else: ?>
              <button class="btn-reserver disabled" disabled>Complet</button>
            <?php endif; ?>
          <?php else: ?>
            <a href="<?= base_url('/login') ?>" class="btn-reserver">Se connecter pour réserver</a>
          <?php endif; ?>
        </div>
      <?php endforeach; ?>
      
    <?php endif; ?>

  </div>
</div>

<?= $this->endSection() ?>
