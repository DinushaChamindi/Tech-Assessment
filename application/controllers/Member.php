<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Member extends CI_Controller {

	  function __construct() {
        parent::__construct();
        $this->load->model('share_model');
        $this->load->model('member_model');
        $this->load->model('Issue_model');
    }
    

    public function index() {
       // $this->check_isvalidated();
        $this->check_isvalidated();
        $data['Members'] = $this->member_model->getMembers();
        $data['main_content'] = 'Member/ManageMember';
        $this->load->view('admin/master', $data);
    }
    
    public function NewMember(){
        $this->check_isvalidated();
        $data['main_content'] = 'Member/NewMember';
        $this->load->view('admin/master', $data);
    }
    public function ViewMyBooks(){
        $this->check_isvalidated();
        $memberid =$this->session->userdata('memberid');
        $data['IssuedBooks'] = $this->Issue_model->myBooks($memberid);
        $data['main_content'] = 'Member/ViewMyBooks';
        $this->load->view('admin/master', $data);
    }
    public function getMember($mid){
        
      $data= $this->member_model->getMember($mid);
      echo json_encode($data);
    }
    public function deleteMember($mid){
        
      $row_id= $this->member_model->deleteMember($mid);
      if ($row_id !== null) {
            $status = $row_id;
            $respond = "successfully";
        } else {
            $status = "error";
            $respond = "Error! please try again.";
        }

        echo json_encode(array('status' => $status, 'respond' => $respond));
    }
    
      public function saveMember() {
        $name = trim($this->security->xss_clean($this->input->post('name')));
        $address = trim($this->security->xss_clean($this->input->post('address')));
        $email = trim($this->security->xss_clean($this->input->post('email')));
        $type = trim($this->security->xss_clean($this->input->post('type')));
        $Contactno = trim($this->security->xss_clean($this->input->post('Contactno')));
        
        
         $row_id = $this->member_model->saveMember($name, $address, $type, $Contactno,$email);


         if ($row_id !== null) {
            $status = $row_id;
            $respond = "successfully";
        } else {
            $status = "error";
            $respond = "Error! please try again.";
        }

        echo json_encode(array('status' => $status, 'respond' => $respond));
    }
      public function updateMember($id) {
        $name = trim($this->security->xss_clean($this->input->post('name')));
        $address = trim($this->security->xss_clean($this->input->post('address')));
        $email = trim($this->security->xss_clean($this->input->post('email')));
        $type = trim($this->security->xss_clean($this->input->post('type')));
        $Contactno = trim($this->security->xss_clean($this->input->post('Contactno')));
        
        
         $row_id = $this->member_model->updateMember($name, $address, $type, $Contactno,$email,$id);


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
