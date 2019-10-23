<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Book extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('share_model');
        $this->load->model('book_model');
    }

    public function index() {
        // $this->check_isvalidated();
        $this->check_isvalidated();
        $data['categories'] = $this->share_model->category();
        $data['books']=$this->book_model->getBooks();
        $data['main_content'] = 'Book/ManageBooks';
        $this->load->view('admin/master', $data);
    }

    public function NewBook() {
        $this->check_isvalidated();
        $data['categories'] = $this->share_model->category();
        $data['main_content'] = 'Book/NewBook';
        $this->load->view('admin/master', $data);
    }
    public function deleteBook($id) {
       $row_id = $this->book_model->deleteBook($id);


         if ($row_id !== null) {
            $status = $row_id;
            $respond = "successfully";
        } else {
            $status = "error";
            $respond = "Error! please try again.";
        }

        echo json_encode(array('status' => $status, 'respond' => $respond));
    }
    public function saveBook() {
        $name = trim($this->security->xss_clean($this->input->post('name')));
        $auther = trim($this->security->xss_clean($this->input->post('auther')));
        $Category = trim($this->security->xss_clean($this->input->post('Category')));
        $price = trim($this->security->xss_clean($this->input->post('price')));
        
        
         $row_id = $this->book_model->saveBook($name, $auther, $Category, $price);


         if ($row_id !== null) {
            $status = $row_id;
            $respond = "successfully";
        } else {
            $status = "error";
            $respond = "Error! please try again.";
        }

        echo json_encode(array('status' => $status, 'respond' => $respond));
    }
    public function updateBook($id) {
        $name = trim($this->security->xss_clean($this->input->post('name')));
        $auther = trim($this->security->xss_clean($this->input->post('auther')));
        $Category = trim($this->security->xss_clean($this->input->post('Category')));
        $price = trim($this->security->xss_clean($this->input->post('price')));
       
         $row_id = $this->book_model->updateBook($name, $auther, $Category, $price,$id);


         if ($row_id !== null) {
            $status = $row_id;
            $respond = "successfully";
        } else {
            $status = "error";
            $respond = "Error! please try again.";
        }

        echo json_encode(array('status' => $status, 'respond' => $respond));
    }

    public function getBook($bid){
        $data = $this->book_model->getBook($bid);
        echo json_encode($data);
    }
}
