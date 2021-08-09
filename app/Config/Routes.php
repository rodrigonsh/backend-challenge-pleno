<?php

namespace Config;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php'))
{
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
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
$routes->get('/admin/(:alpha)/foreign/(:alpha)/(:num)', 'Admin::foreign/$1/$2/$3');
$routes->get('/admin/(:alpha)', 'Admin::list/$1');
$routes->get('/admin/(:alpha)/new', 'Admin::new/$1');
$routes->post('/admin/(:alpha)/new', 'Admin::saveNew/$1');
$routes->get('/admin/(:alpha)/delete/(:num)', 'Admin::shouldDelete/$1/$2');
$routes->post('/admin/(:alpha)/delete/(:num)', 'Admin::yesDelete/$1/$2');
$routes->get('/admin/(:alpha)/(:num)', 'Admin::edit/$1/$2');
$routes->post('/admin/(:alpha)/(:num)', 'Admin::save/$1/$2');
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
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php'))
{
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
