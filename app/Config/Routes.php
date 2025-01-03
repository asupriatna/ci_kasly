<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */

$routes->get('login', 'Auth::login');
$routes->post('login', 'Auth::attemptLogin');
$routes->get('logout', 'Auth::logout');

$routes->get('register', 'Auth::register');
$routes->post('register', 'Auth::attemptRegister');
$routes->get('activate/(:any)', 'Auth::activate/$1');

$routes->group('users', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'User::index');
    $routes->get('list', 'User::index');
    $routes->get('create', 'User::create');
    $routes->get('edit/(:any)', 'User::edit/$1');
    $routes->get('delete/(:any)', 'User::delete/$1');

    $routes->post('store', 'User::store');
    $routes->post('update/(:any)', 'User::update/$1');
});

$routes->group('entities', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Entity::index');
    $routes->get('create', 'Entity::create');
    $routes->post('store', 'Entity::store');
    $routes->get('edit/(:any)', 'Entity::edit/$1');
    $routes->post('update/(:any)', 'Entity::update/$1');
    $routes->get('delete/(:any)', 'Entity::delete/$1');
});

$routes->group('accounts', ['filter' => 'auth'], function ($routes) {
    $routes->get('/', 'Account::index');
    $routes->get('create', 'Account::create');
    $routes->post('store', 'Account::store');
    $routes->get('edit/(:any)', 'Account::edit/$1');
    $routes->post('update/(:any)', 'Account::update/$1');
    $routes->get('delete/(:any)', 'Account::delete/$1');
});

$routes->group('transactions', function ($routes) {
    $routes->get('/', 'Transaction::index');
    $routes->get('create', 'Transaction::create');
    $routes->post('store', 'Transaction::store');
    $routes->get('edit/(:any)', 'Transaction::edit/$1');
    $routes->post('update/(:any)', 'Transaction::update/$1');
    $routes->get('delete/(:any)', 'Transaction::delete/$1');
});