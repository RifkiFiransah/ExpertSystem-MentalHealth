<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/data-penyakit', 'Home::penyakit');
$routes->get('/info-profile', 'Home::profile');
$routes->post('/update-profile', 'Home::updateProfile');
$routes->get('/diagnosa-penyakit', 'Home::diagnosa', ['filter' => 'auth']);
$routes->post('/hasil-diagnosa', 'Diagnosa::checkDiagnosa', ['filter' => 'auth']);
$routes->get('/hasil-diagnosa', 'Diagnosa::hasilDiagnosa', ['filter' => 'auth']);
$routes->post('/proses-diagnosa', 'Diagnosa::store', ['filter' => 'auth']);
$routes->get('/riwayat-diagnosa', 'Home::riwayatDiagnosa', ['filter' => 'auth']);
$routes->get('/error-page', 'Home::errorPage', ['filter' => 'auth']);

$routes->get('/Dashboard', 'Home::dashboard', ['filter' => 'auth']);
$routes->get('/Login', 'Auth::index');
$routes->post('/Login', 'Auth::login');
$routes->get('/Logout', 'Auth::logout');
$routes->get('/Registrasi', 'Auth::registrasi');
$routes->post('/Registrasi', 'Auth::register');

$routes->get('/Penyakit', 'Penyakit::index', ['filter' => 'auth']);
$routes->get('/Penyakit/(:num)', 'Penyakit::show/$1', ['filter' => 'auth']);
$routes->post('/Penyakit', 'Penyakit::store', ['filter' => 'auth']);
$routes->get('/Penyakit/(:num)/edit', 'Penyakit::edit/$1', ['filter' => 'auth']);
$routes->post('/Penyakit/(:num)/edit', 'Penyakit::update/$1', ['filter' => 'auth']);
$routes->get('/Penyakit/(:num)/delete', 'Penyakit::delete/$1', ['filter' => 'auth']);

$routes->get('/Gejala', 'Gejala::index', ['filter' => 'auth']);
$routes->post('/Gejala', 'Gejala::store', ['filter' => 'auth']);
$routes->get('/Gejala/(:num)/edit', 'Gejala::edit/$1', ['filter' => 'auth']);
$routes->post('/Gejala/(:num)/edit', 'Gejala::update/$1', ['filter' => 'auth']);
$routes->get('/Gejala/(:num)/delete', 'Gejala::delete/$1', ['filter' => 'auth']);

$routes->get('/Rule', 'Rule::index', ['filter' => 'auth']);
$routes->post('/Rule/update', 'Rule::update', ['filter' => 'auth']);
$routes->post('/Rule/store', 'Rule::store', ['filter' => 'auth']);

$routes->get('/User', 'User::index', ['filter' => 'auth']);
$routes->get('/User/(:num)/edit', 'User::edit/$1', ['filter' => 'auth']);
$routes->post('/User/(:num)/edit', 'User::update/$1', ['filter' => 'auth']);
$routes->post('/User/(:num)/delete', 'User::delete/$1', ['filter' => 'auth']);

$routes->get('/Profile/(:any)', 'Profile::index/$1', ['filter' => 'auth']);
$routes->post('/Profile/(:num)/admin', 'Profile::update_admin/$1', ['filter' => 'auth']);
$routes->post('/Profile/(:num)/user', 'Profile::update_user/$1', ['filter' => 'auth']);

$routes->get('/Diagnosa', 'Diagnosa::index', ['filter' => 'auth']);
