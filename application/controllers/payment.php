<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of payments
 *
 * @author Eranda
 */
class payment extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }
    public function index() {
        $data['title'] = "Payments is not good";

        $data['message'] = "Payment is not successfull. There was a problem while completing the payment process";

        $this->load->view("template/header", $data);
        $this->load->view("payment/index", $data);
        $this->load->view("template/footer");
    }
    public function cancel($param = NULL) {
        $data['title'] = "Payments is not successfull";

        $data['message'] = "Payment is not successfull. There was a problem while completing the payment process";

        $this->load->view("template/header", $data);
        $this->load->view("payment/index", $data);
        $this->load->view("template/footer");
    }

    public function success($param = NULL) {
        $data['title'] = "Payments is successfull";
        $data['message'] = "Payment is successfull. You will have an email with details. Please check the emails";

        $this->load->view("template/header", $data);
        $this->load->view("payment/index", $data);
        $this->load->view("template/footer");
    }

}
