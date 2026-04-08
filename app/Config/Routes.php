<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Main::index');
$routes->get('vyrobce/(:num)', 'Main::vyrobce/$1');
$routes->get('komponent/(:num)', 'Main::komponent/$1');
