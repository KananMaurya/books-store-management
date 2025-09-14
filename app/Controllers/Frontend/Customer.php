<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController; // <-- Add this line

use App\Models\BooksModel;
use App\Models\CategoriesModel;

class Customer extends BaseController
{   protected $booksModel;
    protected $categoriesModel;

    public function __construct()
    {
        $this->booksModel     = new BooksModel(); 
        $this->categoriesModel     = new CategoriesModel(); 
    }
    public function index()
    {
        $this->checkCustomer();

        $data['title']   =  'Customer Dashboard';
        $data['books']   =   $this->booksModel->get_for_website();
        $data['subcategories']   =   $this->categoriesModel->getSubCategories();

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
