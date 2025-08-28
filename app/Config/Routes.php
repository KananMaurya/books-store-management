<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Customer::index');

// Customer routes
$routes->group('customer', function($routes){
    $routes->get('/', 'Customer::index');
    $routes->get('profile', 'Customer::profile');
});
// Admin routes - FIXED
$routes->group('admin', function($routes) {
    $routes->get('admin', 'Admin::login');
    $routes->get('login', 'Admin::login');
    $routes->post('authenticate', 'Admin::authenticate');
    $routes->get('dashboard', 'Admin::dashboard');
    $routes->get('logout', 'Admin::logout');
    $routes->get('users', 'Admin::users');

$routes->get('book/listing','Book::listing');
$routes->match(['get', 'post'], 'book/add_books', 'Book::add_books');
$routes->match(['get', 'post'], 'book/add_books/(:segment)', 'Book::add_books/$1');
$routes->get('book/delete/(:segment)','Book::delete/$1');

});