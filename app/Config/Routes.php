<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  auth
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');

//  dashboard
// $routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index');
$routes->get('/sidebar', 'Dashboard::sidebar');

// pasien
$routes->get('/pasien', 'pasienController::index');
$routes->post('/pasien/save', 'PasienController::save');

// antrian
$routes->get('/antrian', 'AntrianController::index');
$routes->post('/antrian/tambah', 'AntrianController::AmbilAntrian');
$routes->post('/antrian/ubah-status/(:num)', 'AntrianController::ubahStatus/$1');
$routes->post('antrian/tambah', 'AntrianController::ambilAntrian');
$routes->post('/update-tarif', 'AntrianController::updateTarif');
$routes->post('/antrian/ubah-status-bayar/(:num)', 'AntrianController::ubahStatusBayar/$1');


// dokter
$routes->get('/rm/(:num)', 'DokterController::index/$1');
$routes->get('/rm', 'DokterController::index');
$routes->get('rekamMedis', 'DokterController::rekam');
$routes->post('/update_rekam_medis', 'DokterController::updateRekamMedis');


// payment
$routes->get('/laporan', 'LaporanController::index');
