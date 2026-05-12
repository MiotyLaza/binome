<section id="page-dashboard-client">
  <div class="app-wrapper">

    <!-- SIDEBAR -->
    <aside class="sidebar">
      <div class="sidebar-logo">Fit<span>Space</span></div>

      <div class="sidebar-section">Menu</div>
      <ul class="sidebar-nav">
        <li><a href="#page-dashboard-client" class="active"><i class="bi bi-grid-1x2-fill"></i> Tableau de bord</a></li>
        <li><a href="#page-creneaux"><i class="bi bi-calendar3"></i> Voir les créneaux</a></li>
        <li>
          <a href="#page-mes-reservations">
            <i class="bi bi-bookmark-check-fill"></i> Mes réservations
            <span class="sidebar-badge urgent"><?= count($upcomingReservations) ?></span>
          </a>
        </li>
        <li><a href="#page-profil"><i class="bi bi-person-fill"></i> Mon profil</a></li>
      </ul>

      <div class="sidebar-footer">
        <div class="sidebar-user">
          <div class="avatar"><?= strtoupper(substr(esc($user['prenom']), 0, 1) . substr(esc($user['nom']), 0, 1)) ?></div>
          <div class="user-info">
            <div class="name"><?= esc($user['prenom'] . ' ' . $user['nom']) ?></div>
            <div class="role"><?= esc(ucfirst($user['role'])) ?></div>
          </div>
          <a href="<?= base_url('/logout') ?>" style="margin-left:auto;color:rgba(255,255,255,0.3);font-size:1.1rem;" title="Déconnexion"><i class="bi bi-box-arrow-right"></i></a>
        </div>
      </div>
    </aside>

    <!-- CONTENU -->
    <div class="main-content">
      <div class="topbar">
        <span class="topbar-title">Tableau de bord</span>
        <div class="topbar-actions">
          <a href="#page-creneaux" class="icon-btn" title="Voir les créneaux"><i class="bi bi-plus-lg"></i></a>
        </div>
      </div>

      <div class="page-content">

        <?php if (! empty($flashMessage)): ?>
          <div class="flash-message flash-success">
            <i class="bi bi-check-circle-fill"></i>
            <?= esc($flashMessage) ?>
          </div>
        <?php endif; ?>

        <!-- Métriques -->
        <div class="metrics-row">
          <div class="metric-card">
            <div class="metric-icon yellow"><i class="bi bi-hourglass-split"></i></div>
            <div class="metric-value"><?= esc($counts['pending']) ?></div>
            <div class="metric-label">En attente</div>
          </div>
          <div class="metric-card">
            <div class="metric-icon green"><i class="bi bi-check-circle-fill"></i></div>
            <div class="metric-value"><?= esc($counts['confirmed']) ?></div>
            <div class="metric-label">Confirmées</div>
          </div>
          <div class="metric-card">
            <div class="metric-icon red"><i class="bi bi-x-circle-fill"></i></div>
            <div class="metric-value"><?= esc($counts['cancelled']) ?></div>
            <div class="metric-label">Annulées</div>
          </div>
          <div class="metric-card">
            <div class="metric-icon blue"><i class="bi bi-calendar-check"></i></div>
            <div class="metric-value"><?= esc($counts['upcoming']) ?></div>
            <div class="metric-label">À venir</div>
          </div>
        </div>

        <!-- Prochains créneaux réservés -->
        <div class="data-card">
          <div class="data-card-header">
            <h3>Mes prochaines réservations</h3>
            <a href="#page-mes-reservations" style="font-size:0.8rem;color:var(--accent);text-decoration:none;">Voir tout →</a>
          </div>
          <table class="table-custom">
            <thead>
              <tr>
                <th>Créneau</th>
                <th>Date</th>
                <th>Horaire</th>
                <th>Statut</th>
                <th>Action</th>
              </tr>
            </thead>
            <tbody>
              <?php if (empty($upcomingReservations)): ?>
                <tr>
                  <td colspan="5" class="td-muted">Aucune réservation à venir.</td>
                </tr>
              <?php else: ?>
                <?php foreach ($upcomingReservations as $reservation): ?>
                  <tr>
                    <td class="td-name"><?= esc($reservation['creneau_nom']) ?></td>
                    <td class="td-muted"><?= date('D d M Y', strtotime($reservation['date_debut'])) ?></td>
                    <td class="td-muted"><?= date('H\hi', strtotime($reservation['date_debut'])) ?> – <?= date('H\hi', strtotime($reservation['date_fin'])) ?></td>
                    <td>
                      <?php $status = mb_strtolower($reservation['statut']); ?>
                      <span class="badge-statut <?= $status === 'en attente' ? 's-attente' : ($status === 'confirmée' || $status === 'confirmé' ? 's-confirmee' : 's-annulee') ?>">
                        <?= esc($reservation['statut']) ?>
                      </span>
                    </td>
                    <td>
                      <?php if ($status !== 'confirmée' && $status !== 'confirmé'): ?>
                        <form method="post" action="<?= base_url('/client/annuler/' . $reservation['id']) ?>">
                          <?= csrf_field() ?>
                          <button type="submit" class="btn-sm-custom btn-cancel"><i class="bi bi-x"></i> Annuler</button>
                        </form>
                      <?php else: ?>
                        <span style="font-size:0.75rem;color:var(--muted);">—</span>
                      <?php endif; ?>
                    </td>
                  </tr>
                <?php endforeach; ?>
              <?php endif; ?>
            </tbody>
          </table>
        </div>

      </div>
    </div>
  </div>
</section>
