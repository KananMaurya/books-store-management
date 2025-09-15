<?php

namespace App\Controllers\Admin;
use App\Controllers\BaseController;

use App\Models\BooksModel;
use App\Models\WriterModel;
use App\Models\PublisherModel;
use App\Models\CategoriesModel;

class Book extends BaseController
{
    protected $booksModel;
    protected $writerModel;
    protected $publisherModel;
    protected $categoriesModel;

    public function __construct()
    {
        $this->booksModel     = new BooksModel(); 
        $this->writerModel    = new WriterModel(); 
        $this->publisherModel = new PublisherModel();
        $this->categoriesModel = new CategoriesModel();
    }

    public function add_books($id = '')
    {   
        if ($this->request->getMethod() == 'POST' && empty($id)) {

           $img = $this->request->getFile('image');
           $postData = $this->request->getPost();
          if ($img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads', $newName);
            $postData['image'] = $newName;
            }
            $this->booksModel->addBook($postData);
            return redirect()->to(admin_url('book/listing'))->with('success', 'Book added successfully!');
        }

       if ($this->request->getMethod() == 'POST' && !empty($id)) {
           $updateData = $this->request->getPost();
           $img = $this->request->getFile('image');
            if ($img && $img->isValid() && !$img->hasMoved()) {
            $newName = $img->getRandomName();
            $img->move(ROOTPATH . 'public/uploads', $newName);
            $updateData['image'] = $newName;
            }
           $this->booksModel->updateBook($id,$updateData);
            return redirect()->to(admin_url('book/add_books/'.$id))->with('success', 'Book Updated successfully.');
       }

     
        $data['title']         = 'Add Book';
        $data['writers']       = $this->writerModel->get_writer();
        $data['publishers']    = $this->publisherModel->get_publisher();
        $data['taxs']          = $this->booksModel->get_taxs();
        $data['subCategories'] = $this->categoriesModel->getSubCategories();

        if (!empty($id)) {
          $data['book']   = $this->booksModel->get($id);
        }
        
        return $this->renderAdmin('admin/books/add_books', $data); 
    }


    public function listing(){
      $data['title']   = 'Books list';
      $data['books']   = $this->booksModel->get();
  
      return $this->renderAdmin('admin/books/listing', $data); 
    }
    public function delete($id){
       $this->booksModel->deleteBook($id);
       // $data['books']   = $this->booksModel->get();
       return redirect()->to(admin_url('book/listing'))->with('success', 'Record delete successfully.');
    }
}
