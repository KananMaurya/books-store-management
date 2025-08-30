<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

class Publishers extends BaseController
{
    public function index()
    {  $data['title']  = 'Publishers';
      return $this->renderAdmin('admin/publishers/index',$data);
    }
}
