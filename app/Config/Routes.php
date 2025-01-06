<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  auth
$routes->get('/login', 'AuthController::index');

//  dashboard
// $routes->get('/', 'Home::index');
$routes->get('/', 'Dashboard::index');
$routes->get('/sidebar', 'Dashboard::sidebar');

// pasien
$routes->get('/pasien', 'pasienController::index');
$routes->get('/antrian', 'Antrian::index');

// dokter
$routes->get('/rm', 'dokterController::index');


// payment
$routes->get('/laporan', 'LaporanController::index');
