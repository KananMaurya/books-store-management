<?php

namespace App\Models;

use CodeIgniter\Model;

class AddtocartModel extends Model
{
    protected $table = 'addtocart'; // If you're fetching writers
    protected $primaryKey = 'id';
    protected $allowedFields = ['customer_name','customer_email','customer_phone','book_id','book_name','sell_price','ip_address','added_at'];


public function addCart(array $data)
{
  if ($this->insert($data)) {
    return true;  
  } else {
    return false; 
  }
}
public function getCartCount($ip_address)
{
   return $this->where('ip_address', $ip_address)->countAllResults();
}


//    public function update($id, array $data)
//     {      
//            return $this->update($id, $data); 
//     }
//    public function get($id = '')
//   {
//     $builder = $this->select('addtocart.*');

//     if ($id) {
//         return $builder->where('addtocart.id', $id)->first(); // single row
//     }

//     return $builder->findAll();
// }
}
