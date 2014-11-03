<?php

class test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = "Test";
        $data['result'] = $this->get_response();
        //$this->load->view("template/header", $data);
        $this->load->view("test/index", $data);
        // $this->load->view("template/footer");
    }

    private function get_response() {

        $USERNAME = 'Universal API/uAPI3328713833-136749ba';
        $PASSWORD = 'STKrWQeGkpfAeZRfTgFAg43gm';
        $TARGETBRANCH = 'P107488';

        $startDate = '2014-11-14';
        $origin = 'CDG';
        $destination = 'JFK';
        $airline = 'DL';

        $CREDENTIALS = $USERNAME . ":" . $PASSWORD;

        $message = <<<EOM
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Body>
        <air:AirPriceReq TargetBranch="$TARGETBRANCH" xmlns:air="http://www.travelport.com/schema/air_v25_0" xmlns:com="http://www.travelport.com/schema/common_v25_0">
            <com:BillingPointOfSaleInfo OriginApplication="UAPI"/>
            <air:AirItinerary>
                <air:AirSegment 
                    ArrivalTime="2014-11-03T16:20:00.000-05:00" 
                    AvailabilitySource="AvailStatusTTY" 
                    Carrier="DL" 
                    ChangeOfPlane="false" 
                    DepartureTime="2014-11-03T13:55:00.000+01:00" 
                    Destination="JFK" 
                    ETicketability="Yes" 
                    Equipment="388" 
                    FlightNumber="1020" 
                    FlightTime="505" 
                    Group="0" 
                    Key="xII/q0WpTWW0yIst2TG+XQ=="
                    OptionalServicesIndicator="false" 
                    Origin="CDG" 
                    ParticipantLevel="Airline Source"
                    ProviderCode="1G"/>
            </air:AirItinerary>
            <com:SearchPassenger BookingTravelerRef="gr8AVWGCR064r57Jt0+8bA==" Code="ADT"/>
            <air:AirPricingCommand CabinClass="Economy"/>
        </air:AirPriceReq>
    </SOAP-ENV:Body>
</SOAP-ENV:Envelope>
EOM;



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

        curl_setopt($soap_do, CURLOPT_VERBOSE, 1);
        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($soap_do, CURLOPT_TIMEOUT, 30);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, 0);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, 0);
        curl_setopt($soap_do, CURLOPT_POST, 1);
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message);
        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, TRUE);
        curl_setopt($soap_do, CURLOPT_HTTPAUTH, CURLAUTH_BASIC);
        curl_setopt($soap_do, CURLOPT_USERPWD, $CREDENTIALS);
        curl_setopt($soap_do, CURLOPT_SSLVERSION, 1);
        curl_setopt($soap_do, CURLOPT_PORT, 443);
        curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
        curl_setopt($soap_do, CURLOPT_NOBODY, false);

        $return = curl_exec($soap_do);
        if (curl_errno($soap_do) != '') {
            print curl_errno($soap_do) . ' - ' . curl_error($soap_do) . '<br/>';
        }
        curl_close($soap_do);
        return $return;
    }

}
