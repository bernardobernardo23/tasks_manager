<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

//$routes->get('caminho', 'controller:função');
//retorna geralmente uma view

$routes->get('/', 'Home::index');

$routes->get('test-db', 'TestDb::index'); //teste conexao com bd
$routes->get('hello', 'Hello::index'); //teste conexao


// exibir todas as tarefas   http://localhost:8080/tasks
$routes->get('/tasks', 'TaskController::index');


$routes->get('criar', 'TaskController::create'); 


$routes->post('/tasks', 'TaskController::store');  // manda o sinal para salvar

// editar - chama pelo id
$routes->get('editar-tarefa/(:segment)', 'TaskController::edit/$1');

// chama função update do taskcontroller
$routes->post('/tasks/update/(:segment)', 'TaskController::update/$1'); 

$routes->get('/tasks/delete/(:segment)', 'TaskController::delete/$1');


$routes->group('api', function($routes) {
    //  listar todas as tarefas
    $routes->get('tasks', 'ApiController::index'); 
    // exibir uma por id
    $routes->get('tasks/(:num)', 'ApiController::show/$1'); 
    // criar nova
    $routes->post('tasks', 'ApiController::create'); 
    // editar por id
    $routes->put('tasks/(:num)', 'ApiController::update/$1'); 
    $routes->delete('tasks/(:num)', 'ApiController::delete/$1'); 
});
