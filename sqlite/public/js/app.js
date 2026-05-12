// Navigation et interactions demo

document.addEventListener('DOMContentLoaded', function() {
  
  // Gestion des filtres (pills)
  document.querySelectorAll('.filter-pill').forEach(pill => {
    pill.addEventListener('click', function() {
      document.querySelectorAll('.filter-pill').forEach(p => p.classList.remove('active'));
      this.classList.add('active');
    });
  });

  // Exemple : animations au scroll (optionnel)
  // ... à ajouter plus tard
  
});
