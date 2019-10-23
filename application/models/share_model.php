<?php

class share_model extends CI_Model {

    function __construct() {
        $this->load->library('session');
    }

    public function category() {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function Books() {
        $query = $this->db->get('category');
        return $query->result_array();
    }

    public function login($password, $email) {

        $this->db->where('email', $email);
        $this->db->where('Password', $password);
        $query = $this->db->get('userlogin');
        if ($query->num_rows() == 1) {

            $row = $query->row();
            $data = array(
                'memberid' => $row->memberid,
                'isAdmin' => $row->isAdmin,
                'email' => $row->email,
                'name' => $this->getName($row->memberid),
                'validated' => TRUE
            );

            $this->session->set_userdata($data);
            return 1;
        } else {
            return 0;
        }
    }
    
    public function getName($mid) {
        $this->db->where('memberid', $mid);
        return $this->db->get('member')->row()->memberName;
    }

}
