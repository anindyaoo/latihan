<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Halaman::Beranda');
// $routes->get('/About_Us', 'Halaman::About_Us');
$routes->get('/', 'Books::index');
$routes->get('/bookd/(:segment)', 'Books::detail/$1');
$routes->get('/tambah', 'Books::tambah');
$routes->post('/simpan', 'Books::simpan');
$routes->delete('/books/(:num)', 'Books::delete/$1');
$routes->get('/books/edit/(:segment)', 'Books::edit/$1');
$routes->post('/update/(:num)', 'Books::update/$1');
