<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

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
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
// $routes->setAutoRoute(false);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
$routes->get('/', 'BerandaController::index');
$routes->get('/beranda', 'BerandaController::index');



// route admin dashboard
$routes->get('dashboard', 'Admin\DashboardController::index');





// route admin produk
$routes->get('daftar-produk', 'Admin\ProdukController::index');
$routes->get('daftar-produk/tambah', 'Admin\ProdukController::form_create');
$routes->get('daftar-produk/ubah/(:num)', 'Admin\ProdukController::form_update/$1');
$routes->post('daftar-produk/create-produk', 'Admin\ProdukController::create_produk');
$routes->put('daftar-produk/update-produk/(:num)', 'Admin\ProdukController::update_produk/$1');
$routes->delete('daftar-produk/delete-produk', 'Admin\ProdukController::delete_produk');
$routes->get('daftar-produk/detail-produk/(:num)', 'Admin\ProdukController::detail_produk/$1');

// route admin akun
$routes->get('akun', 'Admin\AkunController::index');
$routes->put('akun/ubah/(:num)', 'Admin\AkunController::update/$1');
$routes->delete('akun/hapus/(:num)', 'Admin\AkunController::delete/$1');

// routes admin slider
$routes->get('slider', 'Admin\SliderController::index');
$routes->put('slider/ubah/(:num)', 'Admin\SliderController::update/$1');

// routes admin team
$routes->get('team', 'Admin\TeamController::index');
$routes->put('team/ubah/(:num)', 'Admin\TeamController::update/$1');





// route admin kategori produk
$routes->get('daftar-kategori', 'Admin\ProdukController::kategori');
$routes->post('daftar-kategori/tambah', 'Admin\ProdukController::store');
$routes->put('daftar-kategori/ubah/(:num)', 'Admin\ProdukController::update/$1');
$routes->delete('daftar-kategori/hapus/(:num)', 'Admin\ProdukController::destroy/$1');


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
if (is_file(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
    require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
