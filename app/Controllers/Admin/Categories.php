<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Categories extends BaseController
{
    public function index()
    {   $data['title'] = 'Categories';
        return $this->renderAdmin('admin/categories/index', $data);
    }
}
