<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController; // <-- Add this line

use App\Models\BooksModel;
use App\Models\CategoriesModel;

class Order extends BaseController
{   protected $booksModel;
    protected $categoriesModel;

    public function __construct()
    {
        $this->booksModel     = new BooksModel(); 
        $this->categoriesModel     = new CategoriesModel(); 
    }
   
     public function TrackOrder(){
        $data = [
            'title' => 'Track Order',
        ];

        $this->renderCustomer('customer/track_order', $data);
    }
}
