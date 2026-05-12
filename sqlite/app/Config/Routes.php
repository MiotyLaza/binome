<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

// ==================== PAGES PUBLIQUES ====================
$routes->get('/', 'Home::index');                  // Accueil
$routes->get('/creneaux', 'Creneaux::list');       // Liste créneaux publics

// ==================== AUTHENTIFICATION ====================
$routes->get('/login', 'Auth::login');             // Formulaire login
$routes->post('/login', 'Auth::doLogin');          // Traiter login
$routes->get('/register', 'Auth::register');       // Formulaire inscr.
$routes->post('/register', 'Auth::doRegister');    // Traiter inscr.
$routes->get('/logout', 'Auth::logout');           // Déconnexion

// ==================== DASHBOARD CLIENT (protégé) ====================
$routes->group('client', ['filter' => 'auth'], function($routes) {
    $routes->get('dashboard', 'ClientController::dashboard');
    $routes->get('reservations', 'ClientController::reservations');
    $routes->get('reserve/(:num)', 'ClientController::reserve/$1');
    $routes->post('annuler/(:num)', 'ClientController::cancel/$1');
});

// ==================== DASHBOARD ADMIN (protégé + admin) ====================
$routes->group('admin', ['filter' => 'adminAuth'], function($routes) {
    $routes->get('dashboard', 'AdminController::dashboard');
    $routes->get('creneaux', 'AdminController::creneaux');
    $routes->post('creneau/save', 'AdminController::saveCreneau');
    $routes->post('creneau/delete/(:num)', 'AdminController::deleteCreneau/$1');
    $routes->get('reservations', 'AdminController::reservations');
    $routes->post('reservation/confirm/(:num)', 'AdminController::confirmReservation/$1');
});
