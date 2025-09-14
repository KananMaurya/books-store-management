<?php

namespace App\Models;

use CodeIgniter\Model;

class CategoriesModel extends Model
{
    protected $table            = 'tbl_sub_categories';
    protected $primaryKey       = 'id';
    protected $allowedFields    = ['sub_categories_name','categories_id','is_active','created_at'];

    // public function addCategories(array $data)
    // {

    //     return $this->insert($data);
    //  }

    // public function updateCategories($id, array $data)
    // {      
    //     return $this->update($id, $data); 
    // }

    // public function deleteCategories($id)
    // {
    //     return $this->delete($id);
    // }

    //  public function get_categories()
    // {
    //     return $this->findAll(); // Returns all writers
    // }


  public function addSubCategories(array $data){

    return $this->insert($data);
  }

    public function getSubCategories($id='')
    {
         $builder = $this->select('*');                   
    if ($id) {
        return $builder->where('id', $id)->first(); // single row
    }
        return $this->findAll(); // Returns all writers
    }
  public function updateSubCategories($id, array $data)
    {      
        return $this->update($id, $data); 
    }

public function deleteSubCategories($id){
    return $this->delete($id);
}


}
