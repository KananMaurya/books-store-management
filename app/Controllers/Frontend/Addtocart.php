<?php

namespace App\Controllers\Frontend;
use App\Controllers\BaseController; // <-- Add this line

use App\Models\BooksModel;
use App\Models\AddtocartModel;

class Addtocart extends BaseController
{   protected $booksModel;
    protected $addtocartModel;

    public function __construct()
    {
        $this->booksModel          = new BooksModel(); 
        $this->addtocartModel     = new AddtocartModel(); 
    }
   public function add($book_id = null)
    {
        if (empty($book_id)) {
            return $this->response->setJSON(['status' => 0, 'count' => 0]);
        }

        $data = $this->booksModel->get_for_website($book_id);
        if (!$data) {
            return $this->response->setJSON(['status' => 0, 'count' => 0]);
        }
        $ip_address = $this->request->getIPAddress();
        $add_data = [
            'customer_name'  => '',
            'customer_email' => '',
            'customer_phone' => '',
            'book_id'        => $book_id,
            'book_name'      => $data['name'],
            'sell_price'     => $data['sell_price'],
            'ip_address'     => $ip_address,
        ];

        $result = $this->addtocartModel->addCart($add_data);

        if ($result) {
            $count = $this->addtocartModel->getCartCount($ip_address);
            return $this->response->setJSON(['status' => 1, 'count' => $count]);
        } else {
            return $this->response->setJSON(['status' => 0, 'count' => 0]);
        }
    }
   
}
