<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of wishbone
 *
 * @author Eranda
 */
class wishbone extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        echo "test";
    }

    public function interview() {
        $data['title'] = "This is the title";
        $data['name'] = $this->something();
        $this->load->view("template/header", $data);
        $this->load->view("wishbone/interview");
        $this->load->view("template/footer");
    }
    private function something(){
       return array("Harshani", "Yashas");
    }

}
