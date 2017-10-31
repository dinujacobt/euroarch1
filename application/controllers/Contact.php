<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

Class Contact extends CI_Controller {

    function index() {
        $this->load->view('contact');
    }

    function send_mail() {
        $this->email->from('dinu.jacob@sblsoftware.com', 'Your Name');
        $this->email->to('dinujacobt@gmail.com');
        
        $this->email->subject('Email Test');
        $this->email->message('Testing the email class.');

        $this->email->send();
    }

}
