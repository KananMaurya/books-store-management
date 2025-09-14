<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController; 

use App\Models\CategoriesModel;

class Categories extends BaseController
{   protected $categoriesModel;

    public function __construct()
    {
        $this->categoriesModel     = new CategoriesModel(); 
    }
    public function index()
    {
        $this->checkCustomer();

        $data['categories']       =   get_categories_list();
        $data['sub_Categories']   =   $this->categoriesModel->getSubCategories();

        $this->renderCustomer('customer/home', $data);
    }


}
