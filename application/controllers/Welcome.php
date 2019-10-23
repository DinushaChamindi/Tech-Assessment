<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Welcome extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('share_model');
        $this->load->model('Issue_model');
       
    }

    public function index() {
        // $this->check_isvalidated();

        $data['main_content'] = 'Home/home_Page';
        $this->load->view('admin/master', $data);
    }

    public function login() {

        $data['main_content'] = 'login/login';
        $this->load->view('admin/master', $data);
    }

    public function logOut() {

        $this->session->sess_destroy();
        redirect('Welcome');
    }

    public function logincheck() {
        $email = trim($this->security->xss_clean($this->input->post('email')));
        $password = trim($this->security->xss_clean($this->input->post('password')));

        $res = $this->share_model->login($password, $email);

        echo $res;


        if ($res) {
            $status = $res;
            $respond = "successfully";
        } else {
            $status = "error";
            $respond = "Error! please try again.";
        }

        echo json_encode(array('status' => $status, 'respond' => $respond));
    }

   

}
