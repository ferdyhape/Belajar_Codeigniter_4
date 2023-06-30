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

// STATIC PAGE
$routes->get('/', 'Pages::index');
$routes->get('/about', 'Pages::about');
$routes->get('/contact', 'Pages::contact');

// PRODUCT
$routes->get('/product', 'ProductController::index');
$routes->get('/product/(:num)', 'ProductController::detail/$1');
$routes->get('/product/create', 'ProductController::create');
$routes->post('/product/store', 'ProductController::store');

// CATEGORY
$routes->get('/category', 'CategoryController::index');


// $routes->get('/about', 'Home::about'); // Get tanpa parameter
$routes->get('/about/(:any)/(:num)', 'Home::about/$1/$2'); // Get dengan parameter. $1 adalah parameter pertama, $2 adalah parameter kedua
$routes->get('/HelloWorld', 'Home::HelloWorld'); //(/Tes) adalah request, Home adalah controller, HelloWorld adalah method
$routes->get('/coba', 'Coba::index'); //(/Coba) adalah request, Coba adalah controller, index adalah method

$routes->get('/users', 'Admin\UserController::index'); // Get tanpa parameter
$routes->get('/use_fun', function () {
    echo "Route ini menggunakan function closure";
});

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
