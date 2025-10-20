<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');
$routes->get('/averias', 'AveriasController::index');
$routes->get('/averias/registrar', 'AveriasController::registrar');
$routes->post('/averias/crear','AveriasController::crear');
$routes->get('/averias/solucionado','AveriasController::editar');
$routes->post('averias/actualizarestado/(:num)', 'AveriasController::actualizar/$1');
