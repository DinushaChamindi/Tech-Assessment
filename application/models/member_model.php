<?php

class member_model extends CI_Model {

    public function saveMember($name, $address, $type, $Contactno, $email) {
        $query = $this->db->get('member');
        $num_row = $query->num_rows();
        if ($num_row == 0) {
            $memberid = 'M001';
        } else {
            $num_row += 1;
            if ($num_row < 10) {
                $memberid = 'M00' . $num_row;
            } elseif ($num_row < 100) {
                $memberid = 'M0' . $num_row;
            } else {
                $memberid = 'M' . $num_row;
            }
        }


        if ($type == 'user') {
            $isAdmin = 1;
        } else {
            $isAdmin = 0;
        }
        $data = array(
            'memberid' => $memberid,
            'memberName' => $name,
            'address' => $address,
            'contactNo' => $Contactno,
            'isAdmin' => $isAdmin,
            'status' => 1
        );

        $this->db->insert('member', $data);
        $data1 = array(
            'memberid' => $memberid,
            'email' => $email,
            'isAdmin' => $isAdmin,
            'Password' => "user@123",
            'status' => 1
        );
        $this->db->insert('userlogin', $data1);
        return $this->db->insert_id();
    }

    public function updateMember($name, $address, $type, $Contactno, $email, $id) {


        $data = array(
            'memberName' => $name,
            'address' => $address,
            'contactNo' => $Contactno
        );
        $this->db->where('memberid', $id);
        $this->db->update('member', $data);

        if ($type == 'user') {
            $isAdmin = 1;
        } else {
            $isAdmin = 0;
        }
        $data1 = array(
            'email' => $email,
            'isAdmin' => $isAdmin,
        );
        $this->db->where('memberid', $id);
        $this->db->update('userlogin', $data1);

        return $this->db->affected_rows();
    }

    public function getMember($mid) {
        $this->db->where('memberid', $mid);
        $query = $this->db->get('member')->row();
        $data = array(
            'name' => $query->memberName,
            'address' => $query->address,
            'contactNo' => $query->contactNo,
            'email' => $this->getEmail($mid),
            'type' => $this->getType($mid)
        );
        return $data;
    }

    public function getEmail($mid) {
        $this->db->where('memberid', $mid);
        $query = $this->db->get('userlogin');
        return $query->row()->email;
    }

    public function getType($mid) {
        $this->db->where('memberid', $mid);
        $query = $this->db->get('userlogin');
        return $query->row()->isAdmin;
    }

    public function deleteMember($mid) {
        $this->db->where('memberid', $mid);
        $this->db->delete('userlogin');
        $this->db->where('memberid', $mid);
        $this->db->delete('member');
        return $this->db->affected_rows();
    }

    public function getMembers() {

        $query = $this->db->get('member');
        return $query->result_array();
    }

    

}
