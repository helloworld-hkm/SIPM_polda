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
$routes->get('/user', 'User::index', ['filter' => 'role:user']);
$routes->put('/user/detail/(:num)', 'user::detail/$1', ['filter' => 'role:user']);
$routes->put('/user/profile/(:num)', 'user::profile/$1', ['filter' => 'role:user']);
$routes->put('/user/tentang/(:num)', 'user::tentang/$1', ['filter' => 'role:user']);
$routes->put('/user/ubah/simpanProfile/(:num)', 'user::simpanProfile/$1', ['filter' => 'role:user']);

$routes->get('/user/pengaduan', 'User::pengaduan', ['filter' => 'role:user']);
$routes->get('/user/simpanPengaduan', 'User::simpanPengaduan', ['filter' => 'role:user']);
$routes->put('/user/ubah/(:num)', 'user::ubah/$1', ['filter' => 'role:user']);
$routes->put('/user/ubah/ubahPengaduan/(:num)', 'user::ubahPengaduan/$1', ['filter' => 'role:user']);
$routes->get('/admin', 'Admin::index', ['filter' => 'role:admin']);
$routes->get('/admin/pengaduan', 'Admin::pengaduan', ['filter' => 'role:admin']);
$routes->put('/admin/detail/(:num)', 'admin::detail/$1', ['filter' => 'role:admin']);
$routes->put('/admin/simpanBalasan/(:num)', 'admin::simpanBalasan/$1', ['filter' => 'role:admin']);
$routes->put('/admin/prosesPengaduan/(:num)', 'admin::prosesPengaduan/$1', ['filter' => 'role:admin']);
$routes->put('/admin/terimaPengaduan/(:num)', 'admin::terimaPengaduan/$1', ['filter' => 'role:admin']);
$routes->put('/admin/ubah/simpanProfile/(:num)', 'admin::simpanProfile/$1', ['filter' => 'role:admin']);
$routes->put('/admin/ubah/updatePassword/(:num)', 'admin::updatePassword/$1', ['filter' => 'role:admin']);
$routes->put('/user/updatePassword/(:num)', 'user::updatePassword/$1', ['filter' => 'role:user']);

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
