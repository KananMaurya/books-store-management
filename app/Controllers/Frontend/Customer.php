<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController; // <-- Add this line

use App\Models\BooksModel;

class Customer extends BaseController
{   protected $booksModel;

    public function __construct()
    {
        $this->booksModel     = new BooksModel(); 
    }
    public function index()
    {
        $this->checkCustomer();

        $data['title']   =  'Customer Dashboard';
        $data['books']   =   $this->booksModel->get_for_website();

        $this->renderCustomer('customer/home', $data);
    }

    public function profile()
    {
        $this->checkCustomer();

        $data = [
            'title' => 'Customer Profile',
        ];

        $this->renderCustomer('customer/profile', $data);
    }
}
