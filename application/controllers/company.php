<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of company
 *
 * @author Eranda
 */
class company extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = "About us";
        $this->load->view("template/header", $data);
        $this->load->view("company/index", $data);
        $this->load->view("template/footer");
    }

    public function terms_and_conditions() {
        $data['title'] = "Term and conditions";
        $this->load->view("template/header", $data);
        $this->load->view("company/terms_and_conditions", $data);
        $this->load->view("template/footer");
    }

    public function privacy_policies() {
        $data['title'] = "Privacy policies";
        $this->load->view("template/header", $data);
        $this->load->view("company/privacy_policies", $data);
        $this->load->view("template/footer");
    }

    public function careers() {
        $data['title'] = "Careers";
        $this->load->view("template/header", $data);
        $this->load->view("company/careers", $data);
        $this->load->view("template/footer");
    }
public function contacts() {
        $data['title'] = "Contacts us";
        $this->load->view("template/header", $data);
        $this->load->view("company/contacts", $data);
        $this->load->view("template/footer");
    }
}
