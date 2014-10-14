<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of support
 *
 * @author Eranda
 */
class support extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = "Questions and Answers";
        $this->load->view("template/header", $data);
        $this->load->view("support/index", $data);
        $this->load->view("template/footer");
    }
}
