<?php

namespace Config;

use CodeIgniter\Commands\Utilities\Routes;

// Create a new instance of our RouteCollection class.
$routes = Services::routes();

// Load the system's routing file first, so that the app and ENVIRONMENT
// can override as needed.
if (file_exists(SYSTEMPATH . 'Config/Routes.php')) {
	require SYSTEMPATH . 'Config/Routes.php';
}

/**
 * --------------------------------------------------------------------
 * Router Setup
 * --------------------------------------------------------------------
 */
$routes->setDefaultNamespace('App\Controllers');
$routes->setDefaultController('Users');
$routes->setDefaultMethod('index');
$routes->setTranslateURIDashes(false);
$routes->set404Override();
$routes->setAutoRoute(true);

/**
 * --------------------------------------------------------------------
 * Route Definitions
 * --------------------------------------------------------------------
 */

// We get a performance increase by specifying the default
// route since we don't have to scan directories.

$routes->get('/', 'Home::index');

$routes->get('/admin', 'Admin\Users::index');
$routes->get('/logout', 'Admin\Users::logout');

$routes->get('/mahasiswa', 'Data\Mahasiswa::index');
$routes->get('/mahasiswa/create', 'Data\Mahasiswa::create');
$routes->get('/mahasiswa/edit/(:segment)', 'Data\Mahasiswa::edit/$1');

$routes->get('/dosen', 'Data\Dosen::index');
$routes->get('/dosen/create', 'Data\Dosen::create');
$routes->get('/dosen/edit/(:segment)', 'Data\Dosen::edit/$1');

$routes->get('/tendik', 'Data\Tendik::index');

// routes Jurusan
$routes->get('/ilmu-komputer', 'Jurusan\Ilkom::index');
$routes->get('/ilmu-komputer/S1-ilmu-komputer', 'Jurusan\Ilkom::ilkom');
$routes->get('/ilmu-komputer/D3-manajemen-informatika', 'Jurusan\Ilkom::d3mi');
$routes->post('/ilmu-komputer/D3-manajemen-informatika', 'Jurusan\Ilkom::d3mi');
$routes->post('/ilmu-komputer/S1-ilmu-komputer', 'Jurusan\Ilkom::ilkom');

$routes->get('/matematika', 'Jurusan\Matematika::index');
$routes->get('/matematika/mahasiswa/S1-matematika', 'Jurusan\Matematika::s1matem');
$routes->get('/matematika/mahasiswa/S2-matematika', 'Jurusan\Matematika::s2matem');

$routes->get('/kimia', 'Jurusan\Kimia::index');
$routes->get('/kimia/mahasiswa/S1-kimia', 'Jurusan\Kimia::s1kimia');
$routes->get('/kimia/Mahasiswa/S2-kimia', 'Jurusan\Kimia::s2kimia');

$routes->get('/biologi', 'Jurusan\Biologi::index');
$routes->get('/biologi/mahasiswa/S1-biologi', 'Jurusan\Biologi::s1biologi');
$routes->get('/biologi/mahasiswa/S2-biologi', 'Jurusan\Biologi::s2biologi');

$routes->get('/fisika', 'Jurusan\Fisika::index');
$routes->get('/fisika/mahasiswa/S1-fisika', 'Jurusan\Fisika::s1fisika');

/**
 * --------------------------------------------------------------------
 * Additional Routing
 * --------------------------------------------------------------------
 *
 * There will often be times that you need additional routing and you
 * need to it be able to override any defaults in this file. Environment
 * based routes is one such time. require() additional route files here
 * to make that happen.
 *
 * You will have access to the $routes object within that file without
 * needing to reload it.
 */
if (file_exists(APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php')) {
	require APPPATH . 'Config/' . ENVIRONMENT . '/Routes.php';
}
