<?php

Class Admin_model extends CI_Model {

// Read data using username and password
    public function login($username, $password) {

        $condition = "username =" . "'" . $username . "' AND " . "password =" . "'" . md5($password) . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return 1;
        } else {
            return 0;
        }
    }

    function product_list_active() {
        $this->db->where(array('delete_status' => 0, 'active' => 1));
        return $this->db->get('products')->result_array();
    }

    function product_list_inactive() {
        $this->db->where(array('delete_status' => 0, 'active' => 0));
        return $this->db->get('products')->result_array();
    }

// Read data from database to show data in admin page
    public function read_user_information($username) {

        $condition = "username =" . "'" . $username . "'";
        $this->db->select('*');
        $this->db->from('users');
        $this->db->where($condition);
        $this->db->limit(1);
        $query = $this->db->get();

        if ($query->num_rows() == 1) {
            return $query->result();
        } else {
            return false;
        }
    }

    function add_product($name, $desc, $stock, $image) {
        $data = array('name' => $name,
            'description' => $desc,
            'stock' => $stock,
            'image' => $image,
            'added_by' => $this->session->userdata['user_id']);
        $this->db->insert('products', $data);
    }

    function edit_product($name, $desc, $stock, $image, $id) {
        if ($image != NULL) {
            $data = array('name' => $name,
                'description' => $desc,
                'stock' => $stock,
                'image' => $image,
                'added_by' => $this->session->userdata['user_id']);
        } else {
            $data = array('name' => $name,
                'description' => $desc,
                'stock' => $stock,
                'added_by' => $this->session->userdata['user_id']);
        }
        $this->db->where('id',$id);
        $this->db->update('products', $data);
    }

    function status_change($id, $status) {
        $data = array('active' => $status);
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    function delete_product($id) {
        $data = array('delete_status' => 1);
        $this->db->where('id', $id);
        return $this->db->update('products', $data);
    }

    function product_details($id) {
        $this->db->where(array('id' => $id));
        return $this->db->get('products')->result_array()[0];
    }
    
    function all_active_products(){
        $this->db->where(array('active' => 1, 'delete_status' => 0));
        return $this->db->get('products')->result_array();
    }

}

?>