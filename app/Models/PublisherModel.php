<?php

namespace App\Models;

use CodeIgniter\Model;

class PublisherModel extends Model
{
    protected $table = 'tbl_publisher'; // If you're fetching writers
    protected $primaryKey = 'id';
    protected $allowedFields = ['name'];

    // Fetch all writers
    public function get_publisher()
    {
        return $this->findAll(); // Returns all writers
    }
}
