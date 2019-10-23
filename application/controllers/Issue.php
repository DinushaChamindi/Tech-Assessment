<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Issue extends CI_Controller {

	  function __construct() {
        parent::__construct();
        
        $this->load->model('Issue_model');
        $this->load->model('share_model');
    }

    public function index() {
       // $this->check_isvalidated();
        $this->check_isvalidated();
        $data['main_content'] = 'IssueBook/IssueNewBook';
        $this->load->view('admin/master', $data);
    }
    
    public function IssuedBook(){
        $this->check_isvalidated();
        $data['IssuedBooks'] = $this->Issue_model->IssuedBooks();
        $data['main_content'] = 'IssueBook/ManageIssuedBook';
        $this->load->view('admin/master', $data);
    }
    
    public function IssueBook() {
        $this->check_isvalidated();
        $mid = trim($this->security->xss_clean($this->input->post('mid')));
        $bid = trim($this->security->xss_clean($this->input->post('bid')));
        $date = trim($this->security->xss_clean($this->input->post('date')));
        $rDate = trim($this->security->xss_clean($this->input->post('rDate')));
        
        
        
         $row_id = $this->Issue_model->IssueBook($mid, $bid, $date, $rDate);


         if ($row_id !== null) {
            $status = $row_id;
            $respond = "successfully";
        } else {
            $status = "error";
            $respond = "Error! please try again.";
        }

        echo json_encode(array('status' => $status, 'respond' => $respond));
    }
    public function changeStatus($id,$val) {
              
         $row_id = $this->Issue_model->changeStatus($id, $val) ;


         if ($row_id !== null) {
            $status = $row_id;
            $respond = "successfully";
        } else {
            $status = "error";
            $respond = "Error! please try again.";
        }

        echo json_encode(array('status' => $status, 'respond' => $respond));
    }
}
