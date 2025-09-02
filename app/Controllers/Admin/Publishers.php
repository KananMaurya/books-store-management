<?php

namespace App\Controllers\Admin;

use App\Controllers\BaseController;
use CodeIgniter\HTTP\ResponseInterface;

use App\Models\PublisherModel;

class Publishers extends BaseController
{   
    protected $publisherModel;
    public function __construct()
    {
        $this->publisherModel = new PublisherModel();
    }
    public function index()
    {  $data['title']  = 'Publishers';
       $data['publishers']   = $this->publisherModel->get_publisher();
       return $this->renderAdmin('admin/publishers/index',$data);
    }

    public function save_publisher($id=''){

      $data['title'] = 'Create New Publishers';
      if ($this->request->getMethod() == 'POST' && empty($id)) {
           $postData = $this->request->getPost();          
            $this->publisherModel->addPublisher($postData);
            return redirect()->to(admin_url('publishers'))->with('success', 'Publisher added successfully!');
        }

       if ($this->request->getMethod() == 'POST' && !empty($id)) {
           $updateData = $this->request->getPost();           
           $this->publisherModel->updatePublisher($id,$updateData);
            return redirect()->to(admin_url('publishers/save_publisher/'.$id))->with('success', 'Publisher Updated successfully.');
       }

        if (!empty($id)) {
          $data['publisher']   = $this->publisherModel->get($id);
        }
        return $this->renderAdmin('admin/publishers/create_publishers', $data);

    }
}
