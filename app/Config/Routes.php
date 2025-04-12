<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('test-db', 'TestDb::index');
$routes->get('hello', 'Hello::index');
$routes->get('goodbye', 'Goodbye::index');
