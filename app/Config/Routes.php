<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// $routes->get('/', 'Halaman::Beranda');
// $routes->get('/About_Us', 'Halaman::About_Us');
$routes->get('/', 'books::index');
$routes->get('/books/(:segment)', 'Books::detail/$1');
