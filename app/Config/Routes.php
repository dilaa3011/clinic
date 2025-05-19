<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//  auth
$routes->get('/', 'AuthController::index');
$routes->post('/login', 'AuthController::login');
$routes->get('/logout', 'AuthController::logout');

// data master
$routes->get('/master-user', 'UserController::index',['filter' => 'role:1,2']); //role:2
$routes->post('user/add', 'UserController::addUser',['filter' => 'role:1,2']); //role:2
$routes->post('user/update', 'UserController::update',['filter' => 'role:1,2']); //role:2
$routes->get('user/delete/(:num)', 'UserController::delete/$1',['filter' => 'role:1,2']); //role:2

$routes->get('/master-pendidikan', 'PendidikanController::index',['filter' => 'role:1,2']); //role:2
$routes->post('pendidikan/add', 'PendidikanController::addPendidikan',['filter' => 'role:1,2']); //role:2
$routes->post('pendidikan/update', 'PendidikanController::update',['filter' => 'role:1,2']); //role:2
$routes->get('pendidikan/delete/(:num)', 'PendidikanController::delete/$1',['filter' => 'role:1,2']); //role:2

$routes->get('/master-dokter', 'dokterController::index',['filter' => 'role:1,2']);
$routes->post('dokter/add', 'DokterController::addDokter',['filter' => 'role:1,2']);
$routes->post('dokter/update', 'DokterController::update',['filter' => 'role:1,2']);
$routes->get('dokter/delete/(:num)', 'DokterController::delete/$1',['filter' => 'role:1,2']);

$routes->get('/master-agama', 'agamaController::index',['filter' => 'role:1,2']); //role:2
$routes->post('agama/add', 'AgamaController::addAgama',['filter' => 'role:1,2']); //role:2
$routes->post('agama/update', 'AgamaController::update',['filter' => 'role:1,2']); //role:2
$routes->get('agama/delete/(:num)', 'AgamaController::delete/$1',['filter' => 'role:1,2']); //role:2


$routes->get('/master-gender', 'genderController::index',['filter' => 'role:1,2']); //role:2
$routes->post('gender/add', 'GenderController::addGender',['filter' => 'role:1,2']); //role:2
$routes->post('gender/update', 'GenderController::update',['filter' => 'role:1,2']); //role:2
$routes->get('gender/delete/(:num)', 'GenderController::delete/$1',['filter' => 'role:1,2']); //role:2

$routes->get('/master-penyakit', 'PenyakitController::index',['filter' => 'role:1,2']);
$routes->post('penyakit/add', 'PenyakitController::addPenyakit',['filter' => 'role:1,2']);
$routes->post('penyakit/update', 'PenyakitController::update',['filter' => 'role:1,2']);
$routes->get('penyakit/delete/(:num)', 'PenyakitController::delete/$1',['filter' => 'role:1,2']);

$routes->get('/master-tindakan', 'TindakanController::index',['filter' => 'role:1,2']);
$routes->post('tindakan/add', 'tindakanController::addTindakan',['filter' => 'role:1,2']);
$routes->post('tindakan/update', 'tindakanController::update',['filter' => 'role:1,2']);
$routes->get('tindakan/delete/(:num)', 'tindakanController::delete/$1',['filter' => 'role:1,2']);

$routes->get('/master-obat', 'ObatController::index',['filter' => 'role:1,2']);
$routes->post('obat/add', 'obatController::addObat',['filter' => 'role:1,2']);
$routes->post('obat/update', 'obatController::update',['filter' => 'role:1,2']);
$routes->get('obat/delete/(:num)', 'obatController::delete/$1',['filter' => 'role:1,2']);
//  dashboard
// $routes->get('/', 'Home::index');
$routes->get('/dashboard', 'Dashboard::index',['filter' => 'role:1,2,3']);
$routes->get('/sidebar', 'Dashboard::sidebar',['filter' => 'role:1,2,3']);

// pasien
$routes->get('/pasien', 'pasienController::index',['filter' => 'role:1,2']);
$routes->post('/pasien-add', 'PasienController::addPasien',['filter' => 'role:1,2']);
$routes->post('/pasien/save', 'PasienController::save',['filter' => 'role:1,2']);

$routes->get('/add-pasien', 'DetailPasien::index',['filter' => 'role:1,2']);

// antrian
$routes->get('/antrian', 'AntrianController::index',['filter' => 'role:1,2']); //role:2
// $routes->post('/antrian/tambah', 'AntrianController::AmbilAntrian');
$routes->post('/antrian/ubah-status/(:num)', 'AntrianController::ubahStatus/$1',['filter' => 'role:1,2']); //role:2
$routes->post('/ambilAntrian', 'AntrianController::ambilAntrian',['filter' => 'role:1,2']); //role:2
$routes->post('/pembayaran', 'AntrianController::bayar',['filter' => 'role:1,2']); //role:2
$routes->post('/antrian/ubah-status-bayar/(:num)', 'AntrianController::ubahStatusBayar/$1',['filter' => 'role:1,2']); //role:2


// dokter
// $routes->get('/rekam_medis/(:num)', 'RmController::index/$1');
$routes->get('/rekam-medis', 'RmController::index',['filter' => 'role:1,2']);
$routes->get('/detail', 'RmController::detail',['filter' => 'role:1,2']);
// $routes->get('/detail/(:num)', 'RmController::detail/$1',['filter' => 'role:1,2']);
// $routes->post('/rekam-medis/set-detail', 'RmController::setDetail',['filter' => 'role:1,2']);
// $routes->get('/rekam-medis/detail/(:segment)', 'RmController::detail/$1',['filter' => 'role:1,2']);

// $routes->get('/detail/(:num)', 'RmController::detail/$1', ['filter' => 'role:1,2']);
$routes->post('/update_rekam_medis', 'RmController::updateRekamMedis',['filter' => 'role:1,2']);
$routes->get('/all-rm', 'RmController::all',['filter' => 'role:1,2']);
$routes->post('/resep/simpan', 'RmController::simpan',['filter' => 'role:1,2']);
$routes->get('/resep/hapus/(:num)', 'RmController::hapusResep/$1');


// laporan
$routes->get('/cetak-informed-consent(:num)', 'LaporanController::cetakSuratPerserujuan/$1');
$routes->get('/master-lap-klinik', 'LaporanController::klinik',['filter' => 'role:1,2']);
$routes->get('/master-lap-pasien', 'LaporanController::pasien',['filter' => 'role:1,2']);
$routes->get('/cetak-surat-sakit/(:num)', 'LaporanController::cetakSuratSakit/$1');
$routes->post('/laporan/cetak', 'LaporanController::cetakLapKlinik',['filter' => 'role:1,2']);
// $routes->post('/laporan', 'LaporanController::index',['filter' => 'role:1,2']);