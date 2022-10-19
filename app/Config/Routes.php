<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (is_file(SYSTEMPATH . 'Config/Routes.php')) {
    require SYSTEMPATH . 'Config/Routes.php';
}

/*
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('akun1');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
// The Auto Routing (Legacy) is very dangerous. It is easy to create vulnerable apps
// where controller filters or CSRF protection are bypassed.
// If you don't want to define all routes, please use the Auto Routing (Improved).
// Set `$autoRoutesImproved` to true in `app/Config/Feature.php` and set the following to true.
$routes->setAutoRoute(true);

/*
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.
// $routes->get('/', 'akun1::index');
// $routes->post('akun1/addakun','akun1::save');
// $routes->post('akun1/edit','akun1::index' );
// $routes->get('/', 'akun2::index');

// $routes->post('akun2/addakun','akun2::save');
// $routes->post('akun2/edit','akun2::index' );
// $routes->post('akun2/edit/(:any)','akun2::edit' );

// $routes->post('akun3/addakun','akun3::save');
// $routes->post('akun3/edit','akun3::index' );
// $routes->post('akun3/edit/(:any)','akun3::edit' );

// $routes->post('transaksi/addakun','transaksi::save');
// $routes->post('transaksi/edit','transaksi::index' );
// $routes->post('transaksi/edit/(:any)','transaksi::edit' );

// $routes->resource('akun2');
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
