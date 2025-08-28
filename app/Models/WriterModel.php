<?php

namespace App\Models;

use CodeIgniter\Model;

class WriterModel extends Model
{
    protected $table = 'tbl_writers'; // If you're fetching writers
    protected $primaryKey = 'id';
    protected $allowedFields = ['name', 'biography', 'date_of_birth', 'nationality'];

    // Fetch all writers
    public function get_writer()
    {
        return $this->findAll(); // Returns all writers
    }
}
