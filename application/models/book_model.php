<?php

class book_model extends CI_Model {

    public function updateBook($name, $auther, $Category, $price, $id) {

        $data = array(
            'Categoryid' => $Category,
            'bookName' => $name,
            'auther' => $auther,
            'price' => $price
        );
        $this->db->where('bookId',$id);
        $this->db->update('book', $data);
        return $this->db->affected_rows();
    }

    public function saveBook($name, $auther, $Category, $price) {
        $query = $this->db->get('book');
        $num_row = $query->num_rows();
        if ($num_row == 0) {
            $bookId = 'B001';
        } else {
            $num_row += 1;
            if ($num_row < 10) {
                $bookId = 'B00' . $num_row;
            } elseif ($num_row < 100) {
                $bookId = 'B0' . $num_row;
            } else {
                $bookId = 'B' . $num_row;
            }
        }

        $data = array(
            'bookId' => $bookId,
            'Categoryid' => $Category,
            'bookName' => $name,
            'auther' => $auther,
            'price' => $price,
            'isAvailable' => 1
        );

        $this->db->insert('book', $data);
        return $this->db->insert_id();
    }

    public function getBook($bid) {
        $this->db->where('bookId', $bid);
        $query = $this->db->get('book')->row();
        $data = array(
            'name' => $query->bookName,
            'auther' => $query->auther,
            'price' => $query->price,
            'category' => $this->getCategory($query->Categoryid),
        );
        return $data;
    }
    public function deleteBook($id) {
        $this->db->where('bookId', $id);
         $this->db->delete('book');
        return $this->db->affected_rows();
    }

    public function getBooks() {

        $query = $this->db->get('book');
        return $query->result_array();
    }

    public function getCategory($id) {
        $this->db->where('Id', $id);
        return $this->db->get('category')->row()->categoryName;
    }

}
