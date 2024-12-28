<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  dashboard
// $routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');
$routes->get('/sidebar', 'Dashboard::sidebar');

// pasien
$routes->get('/pasien', 'pasienController::index');

// dokter

// payment
