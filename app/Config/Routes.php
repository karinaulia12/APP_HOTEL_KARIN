<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Home');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

// tamu
// $routes->get('/', 'Home::welcome');
$routes->get('/', 'Home::index');
$routes->get('/welcome', 'Home::welcome');
$routes->get('/form-booking', 'Home::form');
$routes->post('/booking', 'Home::simpanBooking1');
$routes->get('/fasilitas-kamar', 'Home::lp_fkamar');
$routes->get('/fasilitas-hotel', 'Home::lp_fumum');
$routes->get('/harga', 'Home::lp_harga');
$routes->get('/form', 'Home::lp_form');
$routes->get('/form-booking/(:any)', 'Home::form_typeKamar/$1');
$routes->post('/booking/type', 'Home::simpanBooking_tk');
$routes->get('/reservasi/pdf/(:num)', 'PdfController::index/$1');

// admin
$routes->get('/petugas', 'PetugasController::index');
$routes->post('/petugas/login', 'PetugasController::login');
$routes->get('/petugas/dashboard', 'PetugasController::dashboard', ['filter' => 'otentifikasi']);
$routes->get('/petugas/logout', 'PetugasController::logout');

// resepsionis
$routes->get('/resepsionis/dashboard', 'ResepsionisController::dashboard', ['filter' => 'otentifikasi']);
$routes->get('/resepsionis/reservasi', 'ResepsionisController::data', ['filter' => 'otentifikasi']);
$routes->get('/resepsionis/type-kamar', 'ResepsionisController::tampil_tk', ['filter' => 'otentifikasi']);
$routes->get('/resepsionis/reservasi/detail/(:any)', 'ResepsionisController::detail_reservasi/$1', ['filter' => 'otentifikasi']);
$routes->get('/resepsionis/reservasi/edit/(:num)', 'ResepsionisController::edit_rsv/$1', ['filter' => 'otentifikasi']);
$routes->post('/reservasi/update', 'ResepsionisController::update_rsv/$1', ['filter' => 'otentifikasi']);
$routes->get('/resepsionis/tamu', 'ResepsionisController::tampil_tamu', ['filter' => 'otentifikasi']);
$routes->get('/resepsionis/reservasi/checkin/(:num)', 'ResepsionisController::checkin/$1', ['filter' => 'otentifikasi']);
$routes->get('/resepsionis/reservasi/checkout/(:num)', 'ResepsionisController::checkout/$1', ['filter' => 'otentifikasi']);
$routes->get('/resepsionis/reservasi/pending/(:num)', 'ResepsionisController::pending/$1', ['filter' => 'otentifikasi']);
$routes->get('/resepsionis/reservasi/batal/(:num)', 'ResepsionisController::batal/$1', ['filter' => 'otentifikasi']);

// crud kamar
$routes->get('/petugas/kamar', 'KamarController::tampilKamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/tambah', 'KamarController::tampiltambahkamar', ['filter' => 'otentifikasi']);
$routes->post('/petugas/kamar/add', 'KamarController::tambahKamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/detail/(:num)', 'KamarController::tampildetailkamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/edit/(:num)', 'KamarController::tampileditkamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/kamar/update', 'KamarController::editKamar1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/edit-foto/(:num)', 'KamarController::tampileditfotokamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/kamar/update-foto', 'KamarController::editFotoKamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/hapus/(:num)', 'KamarController::hapuskamar/$1', ['filter' => 'otentifikasi']);

// crud type_kamar
$routes->get('/petugas/tkamar', 'TipeKamarController::tampiltypekamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tkamar/tambah', 'TipeKamarController::tampiltambah_tkamar', ['filter' => 'otentifikasi']);
$routes->post('/petugas/tkamar/add', 'TipeKamarController::tambah_tkamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tkamar/edit/(:num)', 'TipeKamarController::tampiledit_tkamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/tkamar/update', 'TipeKamarController::edit_tkamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/tkamar/hapus/(:num)', 'TipeKamarController::hapus_tkamar/$1', ['filter' => 'otentifikasi']);


// crud fasilitas kamar
$routes->get('/petugas/fkamar', 'FKamarController::tampilfasilitaskamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/tambah', 'FKamarController::tampiltambah_fkamar', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fkamar/add', 'FKamarController::tambah_fkamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/edit/(:num)', 'FKamarController::tampiledit_fkamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fkamar/update', 'FKamarController::edit_fkamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/detail/(:num)', 'FKamarController::tampildetail_fkamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/hapus/(:num)', 'FKamarController::hapus_fkamar/$1', ['filter' => 'otentifikasi']);

// crud fasilitas hotel
$routes->get('/petugas/fumum', 'FUmumController::tampil_fumum', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fumum/tambah', 'FUmumController::tampiltambah_fumum', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fumum/add', 'FUmumController::tambah_fumum', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fumum/edit/(:num)', 'FUmumController::tampiledit_fumum/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fumum/update/(:num)', 'FUmumController::edit_fumum/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fumum/hapus/(:num)', 'FUmumController::hapus_fumum/$1', ['filter' => 'otentifikasi']);


/*
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need it to be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
