<?php

namespace App\Controllers;

use Config\Database;

class ClientController extends BaseController
{
    protected $db;

    public function initController(\CodeIgniter\HTTP\RequestInterface $request, \CodeIgniter\HTTP\ResponseInterface $response, \Psr\Log\LoggerInterface $logger)
    {
        parent::initController($request, $response, $logger);
        $this->db = Database::connect();
    }

    public function dashboard()
    {
        $session = session();
        $userId = $session->get('user_id') ?? 1;

        $user = $this->db->table('users')->where('id', $userId)->get()->getRowArray();
        if (!$user) {
            return redirect()->to('/');
        }

        $reservations = $this->db->table('reservations r')
            ->select('r.id, r.statut, r.created_at, c.nom AS creneau_nom, c.date_debut, c.date_fin')
            ->join('creneaux c', 'c.id = r.creneau_id')
            ->where('r.user_id', $userId)
            ->orderBy('c.date_debut', 'ASC')
            ->get()
            ->getResultArray();

        $counts = [
            'pending'   => 0,
            'confirmed' => 0,
            'cancelled' => 0,
            'upcoming'  => 0,
        ];

        $upcomingReservations = [];
        $now = date('Y-m-d H:i:s');

        foreach ($reservations as $reservation) {
            $statut = mb_strtolower($reservation['statut']);

            if (str_contains($statut, 'attente') || str_contains($statut, 'pending')) {
                $counts['pending']++;
            } elseif (str_contains($statut, 'confirm')) {
                $counts['confirmed']++;
            } elseif (str_contains($statut, 'annul')) {
                $counts['cancelled']++;
            }

            if ($reservation['date_debut'] >= $now && !str_contains($statut, 'annul')) {
                $counts['upcoming']++;
                $upcomingReservations[] = $reservation;
            }
        }

        return view('client/dashboard', [
            'user' => $user,
            'counts' => $counts,
            'upcomingReservations' => $upcomingReservations,
            'totalReservations' => count($reservations),
            'flashMessage' => $session->getFlashdata('success'),
        ]);
    }

    public function cancel(int $id)
    {
        $session = session();
        $userId = $session->get('user_id') ?? 1;

        $reservation = $this->db->table('reservations')
            ->where('id', $id)
            ->where('user_id', $userId)
            ->get()
            ->getRowArray();

        if ($reservation) {
            $this->db->table('reservations')->where('id', $id)->update(['statut' => 'annulée']);
            $session->setFlashdata('success', 'Votre réservation a bien été annulée.');
        }

        return redirect()->to('/client/dashboard');
    }
}
