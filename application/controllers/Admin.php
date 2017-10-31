<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Admin extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('security');
        $this->load->library('form_validation');
        $this->load->helper('form');
        $this->load->model('admin_model');
        if (!isset($this->session->userdata['user_id'])) {
            redirect('login');
            exit;
        }
    }

    public function index($messages = NULL) {
        $products['active'] = $this->admin_model->product_list_active();
        $products['inactive'] = $this->admin_model->product_list_inactive();

        $this->load->view('product_list', $products);
    }

    public function add_product() {
        $this->load->view('add_product');
    }

    public function add_product_fn() {
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'xss_clean|trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|xss_clean');
        if (!$this->form_validation->run() == FALSE) {
            $name = $this->input->post("name");
            $description = $this->input->post("description");
            $stock = $this->input->post("stock");

            $config_pf['upload_path'] = './uploads/';
            $config_pf['allowed_types'] = 'gif|jpg|png';

            $this->load->library('upload');
            $this->upload->initialize($config_pf);
            $fileExt = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
            $filename = $name . "." . $fileExt;
            $_FILES['userfile']['name'] = $filename;
            if (!$this->upload->do_upload('userfile')) {
                $data['error'] = array("message" => $this->upload->display_errors());
                $this->load->view('add_product', $data);
            } else {
                $upload_data = $this->upload->data();
                $file_url = $upload_data['file_name'];
                $this->admin_model->add_product($name, $description, $stock, $file_url);
                $this->session->set_flashdata('success', 'Product Added Successfully');
                redirect('admin');
            }
        } else {
            $this->load->view('add_product');
        }
    }

    function edit_product($id = NULL) {
        $res = $this->admin_model->product_details($id);
        $this->load->view('edit_product', $res);
    }

    function status_change($id = NULL, $status = NULL) {
        $res = $this->admin_model->status_change($id, $status);
        if ($res) {
            $this->session->set_flashdata('success', 'status changed successfull');
        } else {
            $this->session->set_flashdata('error', 'error');
        }

        redirect('admin');
    }

    function delete_product($id = NULL) {
        $res = $this->admin_model->delete_product($id);
        if ($res) {
            $this->session->set_flashdata('success', 'product deleted successfull');
        } else {
            $this->session->set_flashdata('error', 'error');
        }

        redirect('admin');
    }

    function update_product_fn() {
        $this->form_validation->set_rules('id', 'Id', 'trim|required');
        $this->form_validation->set_rules('name', 'Name', 'trim|required');
        $this->form_validation->set_rules('description', 'Description', 'xss_clean|trim|required');
        $this->form_validation->set_rules('stock', 'Stock', 'trim|required|xss_clean');
        $id = $this->input->post("id");
        $file_url = NULL;
        if (!$this->form_validation->run() == FALSE) {

            $name = $this->input->post("name");
            $description = $this->input->post("description");
            $stock = $this->input->post("stock");
            if (isset($_FILES['userfile']) && is_uploaded_file($_FILES['userfile']['tmp_name'])) {
                $config_pf['upload_path'] = './uploads/';
                $config_pf['allowed_types'] = 'gif|jpg|png';

                $this->load->library('upload');
                $this->upload->initialize($config_pf);
                $fileExt = pathinfo($_FILES['userfile']['name'], PATHINFO_EXTENSION);
                $filename = $name . "." . $fileExt;
                $_FILES['userfile']['name'] = $filename;
                if (!$this->upload->do_upload('userfile')) {
                    $data = $this->admin_model->product_details($id);
                    $data['error'] = array("message" => $this->upload->display_errors());
                    $this->load->view('edit_product', $data);
                    exit;
                } else {
                    $upload_data = $this->upload->data();
                    $file_url = $upload_data['file_name'];
                }
            }
            $this->admin_model->edit_product($name, $description, $stock, $file_url,$id);
            $this->session->set_flashdata('success', 'Product Edited Successfully');
            redirect('admin');
        } else {
            $data = $this->admin_model->product_details($id);
            $data['error'] =  "some fileds were empty . Coudn't update";
            $this->load->view('edit_product', $data);
        }
    }

}
