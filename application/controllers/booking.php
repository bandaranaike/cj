<?php

/**
 * This is the index
 *
 * @author Eranda Bandaranaike
 */
class booking extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $this->load->view("template/header");
        $this->load->view("booking/index");
        $this->load->view("template/footer");
    }

    public function vehicle() {
        $this->load->view("template/header");
        $this->load->view("booking/vehicle");
        $this->load->view("template/footer");
    }

    public function hotel() {
        $this->load->view("template/header");
        $this->load->view("booking/hotel");
        $this->load->view("template/footer");
    }
    public function flight_booking() {
        $this->load->view("template/header");
        $this->load->view("booking/flight_results");
        $this->load->view("template/footer");
    }
}
