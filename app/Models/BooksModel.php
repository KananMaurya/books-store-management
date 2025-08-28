<?php

namespace App\Models;

use CodeIgniter\Model;

class BooksModel extends Model
{
     protected $table = 'tbl_product';        
     protected $primaryKey = 'product_id';             

     protected $allowedFields = [
          'name', 'slug', 'description', 'writer', 'publisher', 'language', 'isbn',
          'format', 'tax_id', 'sell_price', 'cost_price', 'discount', 'coupone',
          'stock_quantity', 'sku', 'barcode', 'image', 'video_url', 'weight', 'is_active','added_to', 'updated_at'
        ];


    protected $useTimestamps = true;
    protected $createdField  = 'added_to';
    protected $updatedField  = 'updated_at';

    public function addBook(array $data)
    {

        return $this->insert($data);
     }

   public function updateBook($id, array $data)
{      
       return $this->update($id, $data); 
}

public function deleteBook($id){
    return $this->delete($id);
}

public function get($id = '')
{
    $builder = $this->select('tbl_product.*, 
                              tbl_writers.name as writer_name, 
                              tbl_writers.id as writer_id, 
                              tbl_publisher.name as publisher_name, 
                              tbl_publisher.id as publisher_id,
                              tbl_tax.id as tax_id,
                              tbl_tax.name as tax_name,
                              tbl_tax.rate as tax_rate')
                    ->join('tbl_writers', 'tbl_writers.id = tbl_product.writer', 'left')
                    ->join('tbl_publisher', 'tbl_publisher.id = tbl_product.publisher', 'left')
                    ->join('tbl_tax', 'tbl_tax.id = tbl_product.tax_id', 'left');

    if ($id) {
        return $builder->where('tbl_product.product_id', $id)->first(); // single row
    }

    return $builder->findAll();
}

public function get_taxs($id = '')
{
    $db = \Config\Database::connect();
    $builder = $db->table('tbl_tax'); // yaha hum manually tbl_tax select kar rahe hain

    if ($id) {
        return $builder->where('id', $id)->get()->getRowArray();
    }

    return $builder->get()->getResultArray();
}



}
