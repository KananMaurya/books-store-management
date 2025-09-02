<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;
use App\Models\CategoriesModel;

class Categories extends BaseController
{
    protected $categoriesModel;
    public function __construct()
    {
       
        $this->categoriesModel = new CategoriesModel();
    }
    public function index(){

        $data['title'] = 'Categories';
        return $this->renderAdmin('admin/categories/index', $data);
    }

    public function save_categories($id=''){
        if ($this->request->getMethod() == 'POST' && empty($id)) {

            $postData = $this->request->getPost();         
            $this->categoriesModel->addCategories($postData);
            return redirect()->to(admin_url('categories'))->with('success', 'Categories added successfully!');
        }

       if ($this->request->getMethod() == 'POST' && !empty($id)) {
           $updateData = $this->request->getPost();
           $this->categoriesModel->updateCategories($id,$updateData);
            return redirect()->to(admin_url('categories/save_categories/'.$id))->with('success', 'Categories Updated successfully.');
       }

     
        $data['publishers']   = $this->categoriesModel->get_categories();
        $data['title']   = 'Add Categories';
        return $this->renderAdmin('admin/categories/add_edit_categories',$data);
    }


    public function save_sub_categories($id=''){

        $data['title']   = 'Add Sub Categories';

        if ($this->request->getMethod() == 'POST' && empty($id)) {

            $postData = $this->request->getPost();         
            $this->categoriesModel->addSubCategories($postData);
            return redirect()->to(admin_url('categories'))->with('success', 'Categories added successfully!');
        }

       if ($this->request->getMethod() == 'POST' && !empty($id)) {
           $updateData = $this->request->getPost();
           $this->categoriesModel->updateSubCategories($id,$updateData);

            $data['title']   = 'Edit Sub Categories';
            return redirect()->to(admin_url('categories/save_sub_categories/'.$id))->with('success', 'Categories Updated successfully.');
       }
       $data['Categories']   = $this->categoriesModel->get_categories();
       return $this->renderAdmin('admin/categories/add_edit_sub_categories',$data);
    }


}
