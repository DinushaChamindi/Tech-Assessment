<?php

class Issue_model extends CI_Model {

    public function IssueBook($mid, $bid, $date, $rDate) {

        //`date`, `bookId`, `memberId`, `returnDate`,

        $data = array(
            'date' => $date,
            'bookId' => $bid,
            'memberId' => $mid,
            'returnDate' => $rDate,
            'isReturn' => 0,
        );

        $this->db->insert('issuedetail', $data);
        
        $this->db->set('isAvailable',0);
        $this->db->where('bookId',$bid);
        $this->db->update('book');
        
        
        return $this->db->insert_id();
    }

    public function IssuedBooks() {
        //`date`, `bookId`, `memberId`, `returnDate`, `isReturn
        $query = $this->db->get('issuedetail')->row();
        $data[] = array(
            'Id' => $query->Id,
            'date' => $query->date,
            'bookId' => $query->bookId,
            'memberId' => $query->memberId,
            'returnDate' => $query->returnDate,
            'isReturn' => $query->isReturn,
            'book' => $this->book($query->bookId),
            'member' => $this->member($query->memberId),
        );
        return $data;
    }

    public function book($bid) {
        $this->db->where('bookId', $bid);
        return $this->db->get('book')->row()->bookName;
    }

    public function member($mid) {
        $this->db->where('memberid', $mid);
        return $this->db->get('member')->row()->memberName;
    }

    public function getBook($bid) {
        $this->db->where('bookId', $bid);
        $query = $this->db->get('book')->row();
        $data = array(
            'name' => $query->bookName,
            'auther' => $query->auther
        );
        return $data;
    }

    public function myBooks($id) {
        //`date`, `bookId`, `memberId`, `returnDate`, `
        $data = "";
        $this->db->where('memberId', $id);
        $query = $this->db->get('issuedetail');
        if ($query->num_rows() > 0) {
            foreach ($query->result() as $row) {
                $data[] = array(
                    'date' => $row->date,
                    'bookId' => $row->bookId,
                    'memberId' => $row->memberId,
                    'returnDate' => $row->returnDate,
                    'isReturn' => $row->isReturn,
                    'book' => $this->book($row->bookId),
                    'member' => $this->member($row->memberId),
                );
            }
        }
        return $data;
    }

    public function changeStatus($id, $val) {
        $this->db->where('Id', $id);
        $row = $this->db->get('issuedetail')->row();
        
        $this->db->set('isReturn',$val);
        $this->db->where('Id', $id);
        $this->db->update('issuedetail');
        
        $this->db->set('isAvailable',1);
        $this->db->where('bookId', $row->bookId);
        $this->db->update('book');
        
        return $this->db->affected_rows();
        
    }
}
