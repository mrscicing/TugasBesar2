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
$routes->get('/', 'chart::index');
$routes->get('akun1/index', 'akun1::index');
$routes->get('akun1/addakun','akun1::add');
$routes->get('akun1/save','akun1::save');
$routes->get('akun1/edit','akun1::index' );
$routes->get('akun1/edit/(:any)','akun1::edit/$1' );
$routes->get('akun1/editdata','akun1::editdata' );
$routes->get('akun1/delete/(:any)','akun1::delete/$1' );


$routes->resource('Restapi');
// $routes->get('Restapi','Restapi::index');
// $routes->get('Restapi/(.*)/edit','Restapi::edit/$1');
// $routes->get('Restapi/(.*)','Restapi::show/$1');
// $routes->post('Restapi/create','Restapi::create');
// $routes->patch('Restapi/(.*)','Restapi::update/$1');
// $routes->put('Restapi/(.*)','Restapi::update/$1');
// $routes->delete('Restapi/(.*)','Restapi::delete/$1');


$routes->get('akun2/index', 'akun2::index');
$routes->get('akun2/addakun','akun2::add');
$routes->get('akun2/save','akun2::save');
$routes->get('akun2/edit','akun2::index' );
$routes->get('akun2/edit/(:any)','akun2::edit/$1' );
$routes->get('akun2/editdata','akun2::editdata' );
$routes->get('akun2/delete/(:any)','akun2::delete/$1' );

$routes->get('akun2/indexapi', 'akun2::indexapi');
$routes->post('akun2/saveapi/new', 'akun2::saveapi');



$routes->get('akun3/index', 'akun3::index');
$routes->get('akun3/addakun','akun3::add');
$routes->get('akun3/save','akun3::save');
$routes->get('akun3/edit','akun3::index' );
$routes->get('akun3/edit/(:any)','akun3::edit/$1' );
$routes->get('akun3/editdata','akun3::editdata' );
$routes->get('akun3/delete/(:any)','akun3::delete/$1' );

$routes->get('transaksi/index','transaksi::index');
$routes->get('transaksi/akun3','transaksi::akun3');
$routes->get('transaksi/status','transaksi::status');
$routes->get('transaksi/add','transaksi::add');
$routes->get('transaksi/save','transaksi::save');
$routes->get('transaksi/show/(:any)','transaksi::show/$1');
$routes->get('transaksi/edit','transaksi::index' );
$routes->get('transaksi/editdata','transaksi::editdata' );
$routes->get('transaksi/edit/(:any)','transaksi::edit/$1' );
$routes->get('transaksi/delete/(:any)','transaksi::delete/$1' );


$routes->get('jurnalumum/index','JurnalUmum::index');
$routes->post('jurnalumum','JurnalUmum::index');
$routes->get('jurnalumum','JurnalUmum::index');
$routes->get('jurnalumum/(:any)','JurnalUmum::cetak');

$routes->get('posting/index','posting::index');
$routes->post('posting','posting::index');
$routes->get('posting','posting::index');
$routes->get('posting','posting::index');
$routes->get('posting/(:any)','posting::cetak');

$routes->get('neracasaldo/index','NeracaSaldo::index');
$routes->post('neracasaldo','NeracaSaldo::index');
$routes->get('neracasaldo','NeracaSaldo::index');
$routes->get('neracasaldo','NeracaSaldo::index');
$routes->get('neracasaldo/(:any)','NeracaSaldo::cetak');

$routes->get('penyesuaian/index','penyesuaian::index');
$routes->get('penyesuaian/akun3','penyesuaian::akun3');
$routes->get('penyesuaian/status','penyesuaian::status');
$routes->get('penyesuaian/add','penyesuaian::add');
$routes->get('penyesuaian/save','penyesuaian::save');
$routes->get('penyesuaian/show/(:any)','penyesuaian::show/$1');
$routes->get('penyesuaian/edit','penyesuaian::index' );
$routes->get('penyesuaian/editdata','penyesuaian::editdata' );
$routes->get('penyesuaian/edit/(:any)','penyesuaian::edit/$1' );
$routes->get('penyesuaian/delete/(:any)','penyesuaian::delete/$1' );

$routes->get('jurnalpenyesuaian/index','JurnalPenyesuaian::index');
$routes->post('jurnalpenyesuaian','JurnalPenyesuaian::index');
$routes->get('jurnapenyesuaian','JurnalPenyesuaian::index');
$routes->get('jurnalpenyesuaian/(:any)','JurnalPenyesuaian::cetak');

$routes->get('chart','chart::index');


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
