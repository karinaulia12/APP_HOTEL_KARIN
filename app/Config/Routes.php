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
$routes->get('/', 'Home::index');

// admin
$routes->get('/petugas', 'PetugasController::index');
$routes->post('/petugas/login', 'PetugasController::login');
$routes->get('/petugas/dashboard', 'PetugasController::dashboard', ['filter' => 'otentifikasi']);
$routes->get('/petugas/logout', 'PetugasController::logout');

// crud kamar
$routes->get('/petugas/kamar', 'PetugasController::tampilKamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/tambah', 'PetugasController::tampiltambahkamar', ['filter' => 'otentifikasi']);
$routes->post('/petugas/kamar/add', 'PetugasController::tambahKamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/detail/(:num)', 'PetugasController::tampildetailkamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/edit/(:num)', 'PetugasController::tampileditkamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/kamar/update', 'PetugasController::editKamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/edit-foto/(:num)', 'PetugasController::tampileditfotokamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/kamar/update-foto', 'PetugasController::editFotoKamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/kamar/hapus/(:num)', 'PetugasController::hapuskamar/$1', ['filter' => 'otentifikasi']);

// crud fasilitas kamar
$routes->get('/petugas/fkamar', 'PetugasController::tampilfasilitaskamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/tambah', 'PetugasController::tampiltambah_fkamar', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fkamar/add', 'PetugasController::tambah_fkamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/edit/(:num)', 'PetugasController::tampiledit_fkamar/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fkamar/update', 'PetugasController::edit_fkamar', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/detail/(:num)', 'PetugasController::tampildetail_fkamar/$1', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fkamar/hapus/(:num)', 'PetugasController::hapus_fkamar/$1', ['filter' => 'otentifikasi']);

// crud fasilitas hotel
$routes->get('/petugas/fumum', 'PetugasController::tampil_fumum', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fumum/tambah', 'PetugasController::tampiltambah_fumum', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fumum/add', 'PetugasController::tambah_fumum', ['filter' => 'otentifikasi']);
$routes->get('/petugas/fumum/edit/(:num)', 'PetugasController::tampiledit_fumum/$1', ['filter' => 'otentifikasi']);
$routes->post('/petugas/fumum/update', 'PetugasController::edit_fumum', ['filter' => 'otentifikasi']);


// resepsionis


// tamu

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
