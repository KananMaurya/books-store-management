<?php

namespace App\Models;

use CodeIgniter\Model;

class PublisherModel extends Model
{
    protected $table = 'tbl_publisher'; // If you're fetching writers
    protected $primaryKey = 'id';
    protected $allowedFields = ['name','contact_email','contact_phone','address','website','is_active'];

    // Fetch all writers
    public function get_publisher()
    {
        return $this->findAll(); // Returns all writers
    }

        public function addPublisher(array $data)
    {

        return $this->insert($data);
     }

   public function updatePublisher($id, array $data)
    {      
           return $this->update($id, $data); 
    }
    public function get($id = '')
{
    $builder = $this->select('tbl_publisher.*');

    if ($id) {
        return $builder->where('tbl_publisher.id', $id)->first(); // single row
    }

    return $builder->findAll();
}
}
