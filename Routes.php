<?php

namespace Config;

use App\Controllers\AsistenController;

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
$routes->setAutoRoute(true);
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

// $routes->get('/', 'todolist::index');

// use App\Controllers\Login;

// $routes->get('login', 'Login::index');
// $routes->match(['get', 'post'], 'login/check', [Login::class, 'check']);
// $routes->get('login/home', [Login::class, 'home']);
// $routes->get('login/logout', [Login::class, 'logout']);

//tugas tgl 30
$routes->get('asisten', 'AsistenController::index');
$routes->match(['get', 'post'], 'asisten/simpan', [AsistenController::class, 'simpan']);
$routes->match(['get', 'post'], 'asisten/update', [AsistenController::class, 'update']);
$routes->match(['get', 'post'], 'asisten/delete', [AsistenController::class, 'delete']);
$routes->match(['get', 'post'], 'asisten/search', [AsistenController::class, 'search']);
$routes->match(['get', 'post'], 'asisten/check', [AsistenController::class, 'check']);

//tgl 22
// use App\Controllers\News;
// use App\Controllers\Pages;

// $routes->match(['get', 'post'], 'news/create', [News::class, 'create']);
// $routes->match(['get', 'post'], 'news/update', [News::class, 'update']);
// $routes->get('news/(:segment)', [News::class, 'view']);
// $routes->get('news', [News::class, 'index']);
// $routes->get('pages', [Pages::class, 'index']);
// $routes->get('(:segment)', [Pages::class, 'view']);

//tugas tgl 15
$routes->get('/', 'Home::index');

$routes->get('ktp', 'Ktp::index');

$routes->get('pesan', 'Pesan::index');

//use App\Controllers\Pages;
$routes->get('pages', [Pages::class, 'index']);
$routes->get('(:segment)', [Pages::class, 'view']);
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
