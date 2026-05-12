<?php

namespace App\Controllers;

class Creneaux extends BaseController
{
    /**
     * Affiche la liste des créneaux publics
     */
    public function list()
    {
        // Pour l'instant, données fictives
        // Bientôt, on ira chercher dans la BD
        $creneaux = [
            [
                'id' => 1,
                'nom' => 'Yoga Détente',
                'type' => 'Cours collectifs',
                'date_debut' => '2026-05-13 09:00:00',
                'date_fin' => '2026-05-13 10:00:00',
                'lieu' => 'Salle A',
                'places_total' => 15,
                'places_dispo' => 5,
            ],
            [
                'id' => 2,
                'nom' => 'CrossFit Intensif',
                'type' => 'Cours collectifs',
                'date_debut' => '2026-05-13 10:30:00',
                'date_fin' => '2026-05-13 11:30:00',
                'lieu' => 'Salle B',
                'places_total' => 12,
                'places_dispo' => 0,
            ],
            [
                'id' => 3,
                'nom' => 'Salle de musculation',
                'type' => 'Salles',
                'date_debut' => '2026-05-13 13:00:00',
                'date_fin' => '2026-05-13 14:00:00',
                'lieu' => 'Salle C',
                'places_total' => 8,
                'places_dispo' => 3,
            ],
            [
                'id' => 4,
                'nom' => 'Terrain badminton',
                'type' => 'Terrains',
                'date_debut' => '2026-05-13 15:00:00',
                'date_fin' => '2026-05-13 16:00:00',
                'lieu' => 'Terrain 1',
                'places_total' => 2,
                'places_dispo' => 1,
            ],
        ];

        $data = [
            'creneaux' => $creneaux,
            'pageTitle' => 'Nos créneaux',
        ];

        return view('pages/creneaux', $data);
    }
}
