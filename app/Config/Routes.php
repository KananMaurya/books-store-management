<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
// Default route
$routes->get('/', 'Frontend\Customer::index');

// ---------------- Customer Routes ----------------
$routes->group('customer', [
    'namespace' => 'App\Controllers\Frontend',
    // 'filter'    => 'customerAuth'   // ✅ only logged-in customers allowed
], function($routes){
    $routes->get('/', 'Customer::index');               
    $routes->get('profile', 'Customer::profile');       
    $routes->get('book/get_book_detail/(:segment)', 'Book::get_books/$1'); 
    $routes->post('addtocart/add/(:segment)', 'Addtocart::add/$1'); 
});

// ---------------- Admin Routes ----------------
$routes->group('admin', [
    'namespace' => 'App\Controllers\Admin',
], function($routes) {

    // ❌ no filter here → login allowed without session
    $routes->get('admin', 'Admin::login');
    $routes->get('login', 'Admin::login');
    $routes->post('authenticate', 'Admin::authenticate');
    $routes->get('logout', 'Admin::logout');

    // ✅ protected routes
    $routes->group('', ['filter' => 'adminAuth'], function($routes) {
        $routes->get('dashboard', 'Admin::dashboard');
        $routes->get('users', 'Admin::users');

        $routes->get('book/listing','Book::listing');
        $routes->match(['get', 'post'], 'book/add_books', 'Book::add_books');
        $routes->match(['get', 'post'], 'book/add_books/(:segment)', 'Book::add_books/$1');
        $routes->get('book/delete/(:segment)','Book::delete/$1');

        $routes->get('categories','Categories::index');
        $routes->match(['get', 'post'],'categories/save_categories','Categories::save_categories');    
        $routes->match(['get', 'post'], 'categories/save_categories/(:segment)', 'Categories::save_categories/$1');
        $routes->match(['get', 'post'],'categories/save_sub_categories','Categories::save_sub_categories');    
        $routes->match(['get', 'post'], 'categories/save_sub_categories/(:segment)', 'Categories::save_sub_categories/$1');
        $routes->get('categories/delete/(:segment)', 'Categories::delete/$1');

        $routes->get('publishers','Publishers::index');
        $routes->match(['get', 'post'],'publishers/save_publisher','Publishers::save_publisher');    
        $routes->match(['get', 'post'], 'publishers/save_publisher/(:segment)', 'Publishers::save_publisher/$1');
    });
});
