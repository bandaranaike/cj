<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of booking_model
 *
 * @author Eranda
 */
class booking_model extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->load->library('form_validation');
    }

    public function &__get($key) {
        $CI = & get_instance();
        return $CI->$key;
    }

    public function register_flights() {

        $flight_selected = $this->input->post('flight_selected');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('flight_selected', "Flight", "required");
        $this->form_validation->set_rules('email', "Email", "required");
        $this->form_validation->set_rules('password', "Password", "required");

        if ($this->form_validation->run() == TRUE) {
           $data = array(
               'flight_selected'=>$flight_selected,
               'email'=>$email,
               'password'=>$password
           );
           return $data;
        }
    }
    
    public function do_payments() {

        $person_tile = $this->input->post('person_tile');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $id_number = $this->input->post('id_number');
        $mobile_number = $this->input->post('mobile_number');
        $flight_selected = $this->input->post('flight_selected');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $this->form_validation->set_rules('flight_selected', "Flight", "required");
        $this->form_validation->set_rules('first_name', "First name", "required");
        $this->form_validation->set_rules('last_name', "Last name", "required");
        $this->form_validation->set_rules('id_number', "First name", "required");
        $this->form_validation->set_rules('mobile_number', "Last name", "required");
        $this->form_validation->set_rules('flight_selected', "Flight", "required");
        $this->form_validation->set_rules('email', "Email", "required");
        $this->form_validation->set_rules('password', "Password", "required");

        if ($this->form_validation->run() == TRUE) {
           $data = array(
               'person_tile'=>$person_tile,
               'first_name'=>$first_name,
               'last_name'=>$last_name,
               'id_number'=>$id_number,
               'mobile_number'=>$mobile_number,
               'flight_selected'=>$flight_selected,
               'email'=>$email,
               'password'=>$password
           );
           return $data;
        }
    }

    public function searching_flights() {

        $from_location = $this->input->post('from_location');
        $to_location = $this->input->post('to_location');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $dest_type = $this->input->post('destinations');
        $adult_count = $this->input->post('adult_count');
        $children_count = $this->input->post('children_count');
        $infant_count = $this->input->post('infant_count');
        $class = $this->input->post('flight_class');
        $this->load->library('form_validation');
        $this->form_validation->set_rules('from_location', "Start from", "required");
        $this->form_validation->set_rules('to_location', "Destination", "required");
        $this->form_validation->set_rules('start_date', "Start date", "required");
        $this->form_validation->set_rules('end_date', "End date", "required");
        $this->form_validation->set_rules('destinations', "Destination type", "required");
        $this->form_validation->set_rules('adult_count', "Adult count", "required");
        $this->form_validation->set_rules('children_count', "Children", "required");
        $this->form_validation->set_rules('infant_count', "Infant count", "required");
        //$this->form_validation->set_rules('class', "Class", "required");

        if ($this->form_validation->run() == TRUE) {
            
        } else {
            echo validation_errors();
        }
        $USERNAME = 'Universal API/uAPI3328713833-136749ba';
        $PASSWORD = 'STKrWQeGkpfAeZRfTgFAg43gm';
        $TARGETBRANCH = 'P107488';

        $startDate = date("Y-m-d", strtotime($start_date));
        '2014-11-14'; // Outbound search date
        $origin = $from_location; //'CDG';           // Origin City (CDG - Paris, France)
        $destination = $to_location; //'JFK';      // Destination City (JFK - New York City)
        $airline = 'DL';           // Preferred airline to perform the search (Delta Airlines)

        $message = <<<EOM
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Body>
      <air:LowFareSearchReq TargetBranch="$TARGETBRANCH" xmlns:air="http://www.travelport.com/schema/air_v25_0" xmlns:com="http://www.travelport.com/schema/common_v25_0">
        <com:BillingPointOfSaleInfo OriginApplication="UAPI" />
        <air:SearchAirLeg>
          <air:SearchOrigin>
            <com:CityOrAirport Code="$origin" />
          </air:SearchOrigin>
          <air:SearchDestination>
            <com:CityOrAirport Code="$destination" />
          </air:SearchDestination>
          <air:SearchDepTime PreferredTime="$startDate" />
        </air:SearchAirLeg>
        <air:AirSearchModifiers>
          <air:PreferredCarriers>
            <com:Carrier Code="$airline" />
          </air:PreferredCarriers>
        </air:AirSearchModifiers>

        <com:SearchPassenger Code="ADT" />
      </air:LowFareSearchReq>

    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
EOM;

        $CREDENTIALS = $USERNAME . ":" . $PASSWORD;
        $soap_do = curl_init("https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/AirService");
        $header = array(
            "Content-Type: text/xml;charset=UTF-8",
            "Accept: gzip,deflate",
            "User-Agent: Travelport uAPI Test",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "Connection: Keep-Alive",
            "Host: americas.universal-api.pp.travelport.com",
            "Content-length: " . strlen($message),
        );

        curl_setopt($soap_do, CURLOPT_VERBOSE, 1);               // For debugging purposes (read CURL manual for nore info)
        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30);       // Timeout options
        curl_setopt($soap_do, CURLOPT_TIMEOUT, 30);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, 0);        // Verify nothing about peer certificates
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, 0);        // Verify nothing about host certificates
        curl_setopt($soap_do, CURLOPT_POST, 1);                 // Sending post variables
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message);     // Post variable being sent (The XML request)
        //curl_setopt($soap_do, CURLOPT_HEADER, 1 );
        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, TRUE);       // cuel_exec function will show the response directly on the page (if set to 0 curl_exec function will return the result)
        curl_setopt($soap_do, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); // Authentication is BASIC
        curl_setopt($soap_do, CURLOPT_USERPWD, $CREDENTIALS);    // The credentials username:password (CURL will encode this automatically)
        curl_setopt($soap_do, CURLOPT_SSLVERSION, 3);            // SSL version to use (3.0)
        curl_setopt($soap_do, CURLOPT_PORT, 443);                // SSL port to use (443)
        curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);      // Headers sent to the server
        curl_setopt($soap_do, CURLOPT_NOBODY, false);

        $return = curl_exec($soap_do);

        if (curl_errno($soap_do) != '') {
            print curl_errno($soap_do) . ' - ' . curl_error($soap_do) . '<br/>';
        }
        curl_close($soap_do);
        return $return;
    }

}
