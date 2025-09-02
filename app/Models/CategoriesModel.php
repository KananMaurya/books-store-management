<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table            = 'tblcategories';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['name','is_active'];

    protected $createdField  = 'created_at';
    protected $updatedField  = 'updated_at';

    public function addCategories(array $data)
    {

        return $this->insert($data);
     }

    public function updateCategories($id, array $data)
    {      
        return $this->update($id, $data); 
    }

    public function deleteCategories($id)
    {
        return $this->delete($id);
    }

     public function get_categories()
    {
        return $this->findAll(); // Returns all writers
    }

       
}
