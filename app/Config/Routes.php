<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Default route
$routes->get('/', 'Frontend\Customer::index');

// Customer routes
$routes->group('customer', ['namespace' => 'App\Controllers\Frontend'], function($routes){
    $routes->get('/', 'Customer::index');               // /customer
    $routes->get('profile', 'Customer::profile');       // /customer/profile
    $routes->get('book/get_book_detail/(:segment)', 'Book::get_books/$1'); // /customer/book/get_book_detail/ID
});


// Book detail route (agar Book controller frontend me hai to namespace add karo)

// Admin routes - FIXED
$routes->group('admin',['namespace' => 'App\Controllers\Admin'], function($routes) {
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

    $routes->get('categories','Categories::index');
});
