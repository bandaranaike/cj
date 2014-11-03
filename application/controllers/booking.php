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
        $this->load->helper('form');
        $this->load->library('ion_auth');
        $this->load->model("booking_model");
    }

    /**
     * 01
     */
    public function index() {
        $this->load->view("template/header");
        $this->load->view("booking/index");
        $this->load->view("template/footer");
    }

    /**
     * 02
     */
    public function flight() {
        $data['title'] = "Flight booking search result";
        $data['flight'] = $this->booking_model->searching_flights();

        $this->load->view("template/header", $data);
        $this->load->view("booking/flight_results", $data);
        $this->load->view("template/footer");
    }

    /**
     * 03
     */
    public function register() {
        $data['title'] = "Register";
        $data['user'] = NULL;
        $registerd = $this->booking_model->register_flights();
        $data['registered'] = $registerd;
        if (isset($registerd['user_login'])) {
            $data['user'] = $this->ion_auth->user();
           
            $this->load->view("template/header", $data);
            $this->load->view("booking/register", $data);
            $this->load->view("template/footer");
        } else {
            $data['login_fail'] = TRUE;
            $this->load->view("template/header", $data);
            $this->load->view("booking/register", $data);
            $this->load->view("template/footer");
        }
    }

    /**
     * 04
     */
    public function booking_plane() {
        $data['title'] = "Booking Flights";
        $data['booking'] = $this->booking_model->send_booking_request();

        // $this->load->view("template/header", $data);
        $this->load->view("booking/booking_plane", $data);
        //$this->load->view("template/footer");
    }

    /**
     * 05
     */
    public function payment() {
        $data['title'] = "Payments";

        $data['registered'] = $this->booking_model->do_payments();

        $this->load->view("template/header", $data);
        $this->load->view("booking/payments");
        $this->load->view("template/footer");
    }

    public function load_cities() {

        $file = file_get_contents(base_url() . "content/js/airports.json");
        $data['cities'] = json_decode($file);

        $this->load->view("template/header");
        $this->load->view("booking/cities", $data);
        $this->load->view("template/footer");
    }

    public function vehicle() {
        $this->load->view("template/header");
        $this->load->view("booking/scrollindex");
        $this->load->view("template/footer");
    }

    public function hotel() {
        $this->load->view("template/header");
        $this->load->view("booking/uapi_phpSample_Hotel");
        $this->load->view("template/footer");
    }

}
