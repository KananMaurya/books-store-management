<?php

namespace App\Controllers\Frontend;

use App\Controllers\BaseController;
use App\Models\BooksModel;
use App\Models\WriterModel;
use App\Models\PublisherModel;

class Book extends BaseController
{
    protected $booksModel;
    protected $writerModel;
    protected $publisherModel;

    public function __construct()
    {
        $this->booksModel     = new BooksModel(); 
        $this->writerModel    = new WriterModel(); 
        $this->publisherModel = new PublisherModel();
    }

  public function get_books($id = null)
{
    $this->response->setContentType('application/json');

    $book = $this->booksModel->get_for_website($id); // Custom method jo joins kare
    echo json_encode($book ?: ['error' => 'Book not found']);
}




    // public function listing(){
    //   $data['title']   = 'Books list';
    //   $data['books']   = $this->booksModel->get();
  
    //   return $this->renderAdmin('admin/books/listing', $data); 
    // }
    // public function delete($id){
    //    $this->booksModel->deleteBook($id);
    //    $data['books']   = $this->booksModel->get();
    //    return redirect()->to(admin_url('book/listing'))->with('success', 'Record delete successfully.');
    // }
}
