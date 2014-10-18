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
    }

    public function index() {
        $this->load->view("template/header");
        $this->load->view("booking/index");
        $this->load->view("template/footer");
    }

    public function vehicle() {
        $this->load->view("template/header");
        $this->load->view("booking/uapi_phpSample_Air");
        $this->load->view("template/footer");
    }

    public function hotel() {
        $this->load->view("template/header");
        $this->load->view("booking/hotel");
        $this->load->view("template/footer");
    }

    public function flight() {
        $data['flight'] = $this->searching_flights(); // array(); //
       // $data['flight'] = $this->search_two();
        $this->load->view("template/header");
        $this->load->view("booking/flight_results", $data);
        $this->load->view("template/footer");
    }

    private function search_two() {

        $TARGETBRANCH = 'P107488';
        $CREDENTIALS = 'Universal API/uAPI3328713833-136749ba:STKrWQeGkpfAeZRfTgFAg43gm';
        $message = <<<EOM
            <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:air="http://www.travelport.com/schema/air_v16_0" xmlns:com="http://www.travelport.com/schema/common_v13_0" -->
                <soapenv:header>
                    <soapenv:body>
                        <air:availabilitysearchreq xmlns:air="http://www.travelport.com/schema/air_v16_0" xmlns:com="http://www.travelport.com/schema/common_v13_0" authorizedby="Test" targetbranch="$TARGETBRANCH">
                            <air:searchairleg>
                                <air:searchorigin>
                                    <com:airport code="LHR"></com:airport>
                                </air:searchorigin>
                                <air:searchdestination>
                                    <com:airport code="JFK"></com:airport>
                                </air:searchdestination>
                                <air:searchdeptime preferredtime="2014-11-08"></air:searchdeptime>
                            </air:searchairleg>
                        </air:availabilitysearchreq>
                    </soapenv:body>
            </soapenv:header>
EOM;
        $auth = base64_encode("$CREDENTIALS");
       // $soap_do = curl_init("https://emea.copy-webservices.travelport.com/B2BGateway/connect/uAPI/AirService");
        $soap_do = curl_init("https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/AirService");
        $header = array(
            "Content-Type: text/xml;charset=UTF-8",
            "Accept: gzip,deflate",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: \"\"",
            "Authorization: Basic $auth",
            "Content-length: " . strlen($message),
        );
        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30);
        curl_setopt($soap_do, CURLOPT_TIMEOUT, 30);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false);
        curl_setopt($soap_do, CURLOPT_POST, true);
        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message);
        curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);
        curl_exec($soap_do);

        //$result = curl_getinfo($soap_do);
        $result = curl_multi_getcontent($soap_do);
        return $result;
    }

    private function searching_flights() {
        /*
         * uAPI sample communication in php language 
         * 
         * This example requires the cURL library to be installed and working. 
         * 
         * Please note, in the sample code below, the variable $CREDENTIALS is created by binding your username and password together with a colon e.g. 
         * 
         * $auth = base64_encode("Universal API/API1234567:mypassword"); 
         * 
         * The variable $TARGETBRANCH should be set to the TargetBranch provided by Travelport. 
         * 
         * (C) 2013 Travelport, Inc. 
         * This code is for illustration purposes only.
         * Schema used (UAPI_6.0) 
         */
        $TARGETBRANCH = 'P107488';
        $USERNAME = 'Universal API/uAPI3328713833-136749ba';
        $PASSWORD = 'STKrWQeGkpfAeZRfTgFAg43gm';
        $CREDENTIALS = $USERNAME . ":" . $PASSWORD;
//
// Sample Hotel Search request parameters:
//
        $LOCATION = 'DEN'; // Hotel Location
        $CHECKINDATE = '2014-11-15'; // Checkin Date
        $CHECKOUTDATE = '2014-11-30'; // Checkout Date
//
// This is the SOAP request
//
// IMPORTANT: The SOAP envelope variables are case sensitive, be consistent!
//

        $message = <<<EOM
<s:Envelope xmlns:s="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header>
    <Action s:mustUnderstand="1" xmlns="http://schemas.microsoft.com/ws/2005/05/addressing/none">http://localhost:8080/kestrel/AirService</Action>
  </s:Header>
  <s:Body xmlns:xsi="http://www.w3.org/2001/XMLSchema-instance" xmlns:xsd="http://www.w3.org/2001/XMLSchema">
    <LowFareSearchReq TargetBranch="P105273" xmlns="http://www.travelport.com/schema/air_v20_0">
      <BillingPointOfSaleInfo OriginApplication="UAPI" xmlns="http://www.travelport.com/schema/common_v17_0" ></BillingPointOfSaleInfo>
      <SearchAirLeg>
        <SearchOrigin>
          <CityOrAirport Code="WAS" xmlns="http://www.travelport.com/schema/common_v17_0" ></CityOrAirport>
        </SearchOrigin>
        <SearchDestination>
          <CityOrAirport Code="SIN" xmlns="http://www.travelport.com/schema/common_v17_0" ></CityOrAirport>
        </SearchDestination>
        <SearchDepTime PreferredTime="2014-10-19T00:00:00" ></SearchDepTime>
        <AirLegModifiers>
          <PreferredCabins>
            <CabinClass Type="Economy" ></CabinClass>
          </PreferredCabins>
        </AirLegModifiers>
      </SearchAirLeg>
      <SearchAirLeg>
        <SearchOrigin>
          <CityOrAirport Code="SIN" xmlns="http://www.travelport.com/schema/common_v17_0" ></CityOrAirport>
        </SearchOrigin>
        <SearchDestination>
          <CityOrAirport Code="WAS" xmlns="http://www.travelport.com/schema/common_v17_0" ></CityOrAirport>
        </SearchDestination>
        <SearchDepTime PreferredTime="2014-10-21T00:00:00" ></SearchDepTime>
        <AirLegModifiers>
          <PreferredCabins>
            <CabinClass Type="Economy" ></CabinClass>
          </PreferredCabins>
        </AirLegModifiers>
      </SearchAirLeg>
      <AirSearchModifiers>
        <PreferredProviders>
          <Provider Code="1G" xmlns="http://www.travelport.com/schema/common_v17_0" ></Provider>
        </PreferredProviders>
      </AirSearchModifiers>
      <SearchPassenger Code="ADT" xmlns="http://www.travelport.com/schema/common_v17_0" ></SearchPassenger>
    </LowFareSearchReq>
  </s:Body>
</s:Envelope>
EOM;

        $auth = base64_encode("$CREDENTIALS");
// Initialize the CURL object with the uAPI endpoint URL
        $soap_do = curl_init("https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/HotelService"); // Endpoint URL
//$soap_do = curl_init("https://americas.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/HotelService"); // Endpoint URL
// This is the header of the request
//
        $header = array(
            "Content-Type: text/xml;charset=UTF-8",
            "Accept: gzip,deflate",
            "Cache-Control: no-cache",
            "Pragma: no-cache",
            "SOAPAction: \"\"",
            "Authorization: Basic $auth",
            "Content-length: " . strlen($message),
        );
        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30); // Timeout options
        curl_setopt($soap_do, CURLOPT_TIMEOUT, 30);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false); // Verify nothing about peer certificates
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false); // Verify nothing about host certificate
        curl_setopt($soap_do, CURLOPT_POST, true);
        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message);
        curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);

//
// Run the request
//

        //$return = curl_exec($soap_do);
$return = <<<EOM
<SOAP:Envelope xmlns:SOAP="http://schemas.xmlsoap.org/soap/envelope/">
  <s:Header xmlns:s="http://schemas.xmlsoap.org/soap/envelope/" ></s:Header>
  <SOAP:Body>
    <air:LowFareSearchRsp TransactionId="2203E5F70A07643BD532C62CE847116D" ResponseTime="19704" DistanceUnits="MI" CurrencyType="GBP" xmlns:air="http://www.travelport.com/schema/air_v20_0">
      <air:FlightDetailsList>
        <air:FlightDetails Key="2854T" Origin="DCA" Destination="DFW" ></air:FlightDetails>
        <air:FlightDetails Key="2855T" Origin="DFW" Destination="HKG" ></air:FlightDetails>
        <air:FlightDetails Key="2857T" Origin="HKG" Destination="SIN" DepartureTime="2014-10-20T20:25:00.000+08:00" ArrivalTime="2014-10-21T00:15:00.000+08:00" FlightTime="230" Equipment="330" OriginTerminal="1" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2859T" Origin="SIN" Destination="HKG" DepartureTime="2014-10-21T08:00:00.000+08:00" ArrivalTime="2014-10-21T12:00:00.000+08:00" FlightTime="240" Equipment="773" OriginTerminal="1" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2861T" Origin="HKG" Destination="DFW" ></air:FlightDetails>
        <air:FlightDetails Key="2862T" Origin="DFW" Destination="DCA" ></air:FlightDetails>
        <air:FlightDetails Key="2864T" Origin="IAD" Destination="DFW" DepartureTime="2014-10-19T06:25:00.000-04:00" ArrivalTime="2014-10-19T08:45:00.000-05:00" FlightTime="200" Equipment="738" OnTimePerformance="90" DestinationTerminal="0" ></air:FlightDetails>
        <air:FlightDetails Key="2866T" Origin="DFW" Destination="HKG" DepartureTime="2014-10-19T12:15:00.000-05:00" ArrivalTime="2014-10-20T18:05:00.000+08:00" FlightTime="1010" Equipment="77W" OriginTerminal="0" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2868T" Origin="HKG" Destination="DFW" DepartureTime="2014-10-21T13:30:00.000+08:00" ArrivalTime="2014-10-21T15:25:00.000-05:00" FlightTime="895" Equipment="77W" OriginTerminal="1" DestinationTerminal="0" ></air:FlightDetails>
        <air:FlightDetails Key="2870T" Origin="DFW" Destination="IAD" DepartureTime="2014-10-21T19:50:00.000-05:00" ArrivalTime="2014-10-21T23:35:00.000-04:00" FlightTime="165" Equipment="738" OnTimePerformance="50" OriginTerminal="0" ></air:FlightDetails>
        <air:FlightDetails Key="2872T" Origin="DCA" Destination="ORD" DepartureTime="2014-10-19T11:35:00.000-04:00" ArrivalTime="2014-10-19T12:35:00.000-05:00" FlightTime="120" Equipment="738" OnTimePerformance="70" OriginTerminal="B" DestinationTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2874T" Origin="ORD" Destination="NRT" DepartureTime="2014-10-19T13:30:00.000-05:00" ArrivalTime="2014-10-20T16:45:00.000+09:00" FlightTime="795" Equipment="777" OriginTerminal="3" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2876T" Origin="NRT" Destination="SIN" DepartureTime="2014-10-20T18:10:00.000+09:00" ArrivalTime="2014-10-21T00:30:00.000+08:00" FlightTime="440" Equipment="763" OriginTerminal="2" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2878T" Origin="DFW" Destination="NRT" DepartureTime="2014-10-19T12:46:00.000-05:00" ArrivalTime="2014-10-20T16:15:00.000+09:00" FlightTime="809" Equipment="777" OriginTerminal="D" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2880T" Origin="DFW" Destination="NRT" DepartureTime="2014-10-19T10:31:00.000-05:00" ArrivalTime="2014-10-20T13:55:00.000+09:00" FlightTime="804" Equipment="777" OriginTerminal="D" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2882T" Origin="SIN" Destination="HND" DepartureTime="2014-10-21T21:50:00.000+08:00" ArrivalTime="2014-10-22T05:50:00.000+09:00" FlightTime="420" Equipment="777" OriginTerminal="1" DestinationTerminal="I" ></air:FlightDetails>
        <air:FlightDetails Key="2884T" Origin="NRT" Destination="DFW" ></air:FlightDetails>
        <air:FlightDetails Key="2885T" Origin="DFW" Destination="DCA" ></air:FlightDetails>
        <air:FlightDetails Key="2887T" Origin="IAD" Destination="NRT" Equipment="777" ></air:FlightDetails>
        <air:FlightDetails Key="2888T" Origin="NRT" Destination="SIN" Equipment="777" ></air:FlightDetails>
        <air:FlightDetails Key="2890T" Origin="SIN" Destination="NRT" DepartureTime="2014-10-21T05:50:00.000+08:00" ArrivalTime="2014-10-21T14:00:00.000+09:00" FlightTime="430" Equipment="788" OriginTerminal="2" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2892T" Origin="NRT" Destination="IAD" DepartureTime="2014-10-21T15:55:00.000+09:00" ArrivalTime="2014-10-21T15:30:00.000-04:00" FlightTime="755" Equipment="777" OriginTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2894T" Origin="SIN" Destination="NRT" DepartureTime="2014-10-21T06:00:00.000+08:00" ArrivalTime="2014-10-21T14:10:00.000+09:00" FlightTime="430" Equipment="777" OriginTerminal="3" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2896T" Origin="NRT" Destination="JFK" DepartureTime="2014-10-21T16:40:00.000+09:00" ArrivalTime="2014-10-21T16:25:00.000-04:00" FlightTime="765" Equipment="77W" OriginTerminal="1" DestinationTerminal="7" ></air:FlightDetails>
        <air:FlightDetails Key="2898T" Origin="JFK" Destination="IAD" DepartureTime="2014-10-22T06:00:00.000-04:00" ArrivalTime="2014-10-22T07:15:00.000-04:00" FlightTime="75" Equipment="CRJ" OriginTerminal="7" ></air:FlightDetails>
        <air:FlightDetails Key="2900T" Origin="NRT" Destination="ORD" DepartureTime="2014-10-21T16:55:00.000+09:00" ArrivalTime="2014-10-21T14:15:00.000-05:00" FlightTime="680" Equipment="744" OriginTerminal="1" DestinationTerminal="5" ></air:FlightDetails>
        <air:FlightDetails Key="2902T" Origin="ORD" Destination="DCA" DepartureTime="2014-10-21T16:10:00.000-05:00" ArrivalTime="2014-10-21T19:04:00.000-04:00" FlightTime="114" Equipment="319" OnTimePerformance="20" OriginTerminal="1" DestinationTerminal="B" ></air:FlightDetails>
        <air:FlightDetails Key="2907T" Origin="SIN" Destination="NRT" Equipment="777" ></air:FlightDetails>
        <air:FlightDetails Key="2908T" Origin="NRT" Destination="IAD" Equipment="777" ></air:FlightDetails>
        <air:FlightDetails Key="2910T" Origin="IAD" Destination="JFK" DepartureTime="2014-10-19T09:53:00.000-04:00" ArrivalTime="2014-10-19T11:00:00.000-04:00" FlightTime="67" Equipment="E90" OnTimePerformance="90" DestinationTerminal="5" ></air:FlightDetails>
        <air:FlightDetails Key="2912T" Origin="JFK" Destination="PEK" DepartureTime="2014-10-19T12:50:00.000-04:00" ArrivalTime="2014-10-20T14:20:00.000+08:00" FlightTime="810" Equipment="773" OriginTerminal="1" DestinationTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2914T" Origin="PEK" Destination="SIN" DepartureTime="2014-10-20T15:35:00.000+08:00" ArrivalTime="2014-10-20T21:40:00.000+08:00" FlightTime="365" Equipment="333" OriginTerminal="3" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2916T" Origin="SIN" Destination="PEK" DepartureTime="2014-10-21T00:15:00.000+08:00" ArrivalTime="2014-10-21T06:10:00.000+08:00" FlightTime="355" Equipment="333" OriginTerminal="1" DestinationTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2918T" Origin="PEK" Destination="IAD" DepartureTime="2014-10-21T12:45:00.000+08:00" ArrivalTime="2014-10-21T14:35:00.000-04:00" FlightTime="830" Equipment="773" OriginTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2923T" Origin="IAD" Destination="BOS" DepartureTime="2014-10-19T08:35:00.000-04:00" ArrivalTime="2014-10-19T10:04:00.000-04:00" FlightTime="89" Equipment="E90" DestinationTerminal="C" ></air:FlightDetails>
        <air:FlightDetails Key="2925T" Origin="BOS" Destination="NRT" DepartureTime="2014-10-19T13:15:00.000-04:00" ArrivalTime="2014-10-20T15:55:00.000+09:00" FlightTime="820" Equipment="788" OriginTerminal="E" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2927T" Origin="NRT" Destination="JFK" DepartureTime="2014-10-22T11:10:00.000+09:00" ArrivalTime="2014-10-22T11:05:00.000-04:00" FlightTime="775" Equipment="77W" OriginTerminal="2" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2929T" Origin="JFK" Destination="DCA" DepartureTime="2014-10-22T13:05:00.000-04:00" ArrivalTime="2014-10-22T14:23:00.000-04:00" FlightTime="78" Equipment="CR7" OriginTerminal="8" DestinationTerminal="B" ></air:FlightDetails>
        <air:FlightDetails Key="2931T" Origin="JFK" Destination="IAD" DepartureTime="2014-10-22T17:55:00.000-04:00" ArrivalTime="2014-10-22T19:08:00.000-04:00" FlightTime="73" Equipment="E90" OriginTerminal="5" ></air:FlightDetails>
        <air:FlightDetails Key="2933T" Origin="IAD" Destination="NRT" DepartureTime="2014-10-19T12:20:00.000-04:00" ArrivalTime="2014-10-20T15:25:00.000+09:00" FlightTime="845" Equipment="777" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2935T" Origin="NRT" Destination="SIN" DepartureTime="2014-10-20T18:05:00.000+09:00" ArrivalTime="2014-10-21T00:05:00.000+08:00" FlightTime="420" Equipment="788" OriginTerminal="1" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2938T" Origin="DCA" Destination="EWR" DepartureTime="2014-10-19T07:59:00.000-04:00" ArrivalTime="2014-10-19T09:16:00.000-04:00" FlightTime="77" Equipment="DH4" OriginTerminal="B" DestinationTerminal="C" ></air:FlightDetails>
        <air:FlightDetails Key="2940T" Origin="EWR" Destination="NRT" DepartureTime="2014-10-19T10:55:00.000-04:00" ArrivalTime="2014-10-20T13:55:00.000+09:00" FlightTime="840" Equipment="777" OriginTerminal="C" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2945T" Origin="JFK" Destination="IAD" DepartureTime="2014-10-21T19:30:00.000-04:00" ArrivalTime="2014-10-21T20:47:00.000-04:00" FlightTime="77" Equipment="CRJ" OnTimePerformance="50" OriginTerminal="7" ></air:FlightDetails>
        <air:FlightDetails Key="2947T" Origin="IAD" Destination="JFK" DepartureTime="2014-10-19T06:00:00.000-04:00" ArrivalTime="2014-10-19T07:21:00.000-04:00" FlightTime="81" Equipment="ERJ" OnTimePerformance="90" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2949T" Origin="JFK" Destination="NRT" DepartureTime="2014-10-19T14:45:00.000-04:00" ArrivalTime="2014-10-20T17:35:00.000+09:00" FlightTime="830" Equipment="744" OriginTerminal="4" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2951T" Origin="NRT" Destination="SIN" DepartureTime="2014-10-20T19:25:00.000+09:00" ArrivalTime="2014-10-21T01:40:00.000+08:00" FlightTime="435" Equipment="777" OriginTerminal="1" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2953T" Origin="SIN" Destination="NRT" DepartureTime="2014-10-21T06:10:00.000+08:00" ArrivalTime="2014-10-21T14:10:00.000+09:00" FlightTime="420" Equipment="777" OriginTerminal="1" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2955T" Origin="NRT" Destination="JFK" DepartureTime="2014-10-21T15:10:00.000+09:00" ArrivalTime="2014-10-21T14:50:00.000-04:00" FlightTime="760" Equipment="744" OriginTerminal="1" DestinationTerminal="4" ></air:FlightDetails>
        <air:FlightDetails Key="2957T" Origin="JFK" Destination="IAD" DepartureTime="2014-10-21T19:35:00.000-04:00" ArrivalTime="2014-10-21T21:11:00.000-04:00" FlightTime="96" Equipment="ERJ" OriginTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2959T" Origin="NRT" Destination="DTW" DepartureTime="2014-10-21T15:05:00.000+09:00" ArrivalTime="2014-10-21T13:50:00.000-04:00" FlightTime="705" Equipment="777" OriginTerminal="1" DestinationTerminal="EM" ></air:FlightDetails>
        <air:FlightDetails Key="2961T" Origin="DTW" Destination="DCA" DepartureTime="2014-10-21T15:15:00.000-04:00" ArrivalTime="2014-10-21T16:45:00.000-04:00" FlightTime="90" Equipment="M80" OnTimePerformance="80" OriginTerminal="EM" DestinationTerminal="B" ></air:FlightDetails>
        <air:FlightDetails Key="2963T" Origin="DTW" Destination="DCA" DepartureTime="2014-10-21T17:20:00.000-04:00" ArrivalTime="2014-10-21T18:46:00.000-04:00" FlightTime="86" Equipment="320" OnTimePerformance="70" OriginTerminal="EM" DestinationTerminal="B" ></air:FlightDetails>
        <air:FlightDetails Key="2965T" Origin="DCA" Destination="JFK" DepartureTime="2014-10-19T11:30:00.000-04:00" ArrivalTime="2014-10-19T12:47:00.000-04:00" FlightTime="77" Equipment="CR9" OnTimePerformance="70" OriginTerminal="B" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2967T" Origin="DCA" Destination="JFK" DepartureTime="2014-10-19T06:00:00.000-04:00" ArrivalTime="2014-10-19T07:08:00.000-04:00" FlightTime="68" Equipment="CR9" OnTimePerformance="90" OriginTerminal="B" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2969T" Origin="IAD" Destination="LHR" DepartureTime="2014-10-19T18:40:00.000-04:00" ArrivalTime="2014-10-20T07:05:00.000+01:00" FlightTime="445" Equipment="333" DestinationTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2971T" Origin="LHR" Destination="SIN" DepartureTime="2014-10-20T11:30:00.000+01:00" ArrivalTime="2014-10-21T07:20:00.000+08:00" FlightTime="770" Equipment="388" OriginTerminal="2" DestinationTerminal="0" ></air:FlightDetails>
        <air:FlightDetails Key="2973T" Origin="SIN" Destination="LHR" DepartureTime="2014-10-21T23:30:00.000+08:00" ArrivalTime="2014-10-22T05:55:00.000+01:00" FlightTime="805" Equipment="388" OriginTerminal="3" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2975T" Origin="LHR" Destination="IAD" DepartureTime="2014-10-22T11:35:00.000+01:00" ArrivalTime="2014-10-22T14:50:00.000-04:00" FlightTime="495" Equipment="333" OriginTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2977T" Origin="SIN" Destination="LHR" DepartureTime="2014-10-21T12:45:00.000+08:00" ArrivalTime="2014-10-21T19:05:00.000+01:00" FlightTime="800" Equipment="77W" OriginTerminal="3" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="2979T" Origin="SIN" Destination="DXB" DepartureTime="2014-10-21T21:25:00.000+08:00" ArrivalTime="2014-10-22T00:55:00.000+04:00" FlightTime="450" Equipment="388" OriginTerminal="1" DestinationTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2981T" Origin="DXB" Destination="IAD" DepartureTime="2014-10-22T02:20:00.000+04:00" ArrivalTime="2014-10-22T08:50:00.000-04:00" FlightTime="870" Equipment="77W" OriginTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2983T" Origin="PEK" Destination="SIN" DepartureTime="2014-10-21T00:05:00.000+08:00" ArrivalTime="2014-10-21T06:25:00.000+08:00" FlightTime="380" Equipment="333" OriginTerminal="3" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2985T" Origin="SIN" Destination="DXB" DepartureTime="2014-10-21T10:35:00.000+08:00" ArrivalTime="2014-10-21T13:45:00.000+04:00" FlightTime="430" Equipment="773" OriginTerminal="1" DestinationTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2987T" Origin="SIN" Destination="DXB" DepartureTime="2014-10-21T09:35:00.000+08:00" ArrivalTime="2014-10-21T12:45:00.000+04:00" FlightTime="430" Equipment="77W" OriginTerminal="1" DestinationTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2989T" Origin="IAD" Destination="DXB" DepartureTime="2014-10-19T10:55:00.000-04:00" ArrivalTime="2014-10-20T08:00:00.000+04:00" FlightTime="785" Equipment="77W" DestinationTerminal="3" ></air:FlightDetails>
        <air:FlightDetails Key="2991T" Origin="DXB" Destination="SIN" DepartureTime="2014-10-20T09:35:00.000+04:00" ArrivalTime="2014-10-20T20:55:00.000+08:00" FlightTime="440" Equipment="77W" OriginTerminal="3" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2993T" Origin="DXB" Destination="SIN" DepartureTime="2014-10-20T21:15:00.000+04:00" ArrivalTime="2014-10-21T09:00:00.000+08:00" FlightTime="465" Equipment="773" OriginTerminal="3" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2995T" Origin="DXB" Destination="SIN" DepartureTime="2014-10-21T02:45:00.000+04:00" ArrivalTime="2014-10-21T14:05:00.000+08:00" FlightTime="440" Equipment="77W" OriginTerminal="3" DestinationTerminal="1" ></air:FlightDetails>
        <air:FlightDetails Key="2997T" Origin="IAD" Destination="ICN" DepartureTime="2014-10-19T13:35:00.000-04:00" ArrivalTime="2014-10-20T17:10:00.000+09:00" FlightTime="875" Equipment="77W" ></air:FlightDetails>
        <air:FlightDetails Key="2999T" Origin="ICN" Destination="SIN" DepartureTime="2014-10-20T18:40:00.000+09:00" ArrivalTime="2014-10-20T23:50:00.000+08:00" FlightTime="370" Equipment="773" DestinationTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="3001T" Origin="SIN" Destination="ICN" DepartureTime="2014-10-21T22:35:00.000+08:00" ArrivalTime="2014-10-22T05:55:00.000+09:00" FlightTime="380" Equipment="773" OriginTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="3003T" Origin="ICN" Destination="IAD" DepartureTime="2014-10-22T10:30:00.000+09:00" ArrivalTime="2014-10-22T11:15:00.000-04:00" FlightTime="825" Equipment="77W" ></air:FlightDetails>
        <air:FlightDetails Key="3005T" Origin="SIN" Destination="ICN" DepartureTime="2014-10-21T01:10:00.000+08:00" ArrivalTime="2014-10-21T08:25:00.000+09:00" FlightTime="375" Equipment="773" OriginTerminal="2" ></air:FlightDetails>
        <air:FlightDetails Key="3007T" Origin="ICN" Destination="IAD" DepartureTime="2014-10-21T10:30:00.000+09:00" ArrivalTime="2014-10-21T11:15:00.000-04:00" FlightTime="825" Equipment="77W" ></air:FlightDetails>
      </air:FlightDetailsList>
      <air:AirSegmentList>
        <air:AirSegment Key="2853T" Group="0" Carrier="AA" FlightNumber="137" Origin="DCA" Destination="HKG" DepartureTime="2014-10-19T08:50:00.000-04:00" ArrivalTime="2014-10-20T18:05:00.000+08:00" FlightTime="1275" Distance="8150" ETicketability="Yes" Equipment="CHG" ChangeOfPlane="true" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" NumberOfStops="1" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R7|F7|A7|J7|S7|Y7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2854T" ></air:FlightDetailsRef>
          <air:FlightDetailsRef Key="2855T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2856T" Group="0" Carrier="AA" FlightNumber="8902" Origin="HKG" Destination="SIN" DepartureTime="2014-10-20T20:25:00.000+08:00" ArrivalTime="2014-10-21T00:15:00.000+08:00" FlightTime="230" Distance="1594" ETicketability="Yes" Equipment="330" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="CX" OperatingFlightNumber="715">CATHAY PACIFIC</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R7|J7|D7|S7|Y7|W7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2857T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2858T" Group="1" Carrier="AA" FlightNumber="8898" Origin="SIN" Destination="HKG" DepartureTime="2014-10-21T08:00:00.000+08:00" ArrivalTime="2014-10-21T12:00:00.000+08:00" FlightTime="240" Distance="1594" ETicketability="Yes" Equipment="773" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="CX" OperatingFlightNumber="2710">CATHAY PACIFIC</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R7|J7|D7|S7|Y7|W7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2859T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2860T" Group="1" Carrier="AA" FlightNumber="138" Origin="HKG" Destination="DCA" DepartureTime="2014-10-21T13:30:00.000+08:00" ArrivalTime="2014-10-21T21:45:00.000-04:00" FlightTime="1215" Distance="8150" ETicketability="Yes" Equipment="CHG" ChangeOfPlane="true" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" NumberOfStops="1" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="RL|F7|A7|J7|S7|Y7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2861T" ></air:FlightDetailsRef>
          <air:FlightDetailsRef Key="2862T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2863T" Group="0" Carrier="AA" FlightNumber="127" Origin="IAD" Destination="DFW" DepartureTime="2014-10-19T06:25:00.000-04:00" ArrivalTime="2014-10-19T08:45:00.000-05:00" FlightTime="200" Distance="1177" ETicketability="Yes" Equipment="738" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="P7|F7|A7|S7|Y7|W7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2864T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2865T" Group="0" Carrier="AA" FlightNumber="137" Origin="DFW" Destination="HKG" DepartureTime="2014-10-19T12:15:00.000-05:00" ArrivalTime="2014-10-20T18:05:00.000+08:00" FlightTime="1010" Distance="8115" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R7|F7|A7|J7|S7|Y7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2866T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2867T" Group="1" Carrier="AA" FlightNumber="138" Origin="HKG" Destination="DFW" DepartureTime="2014-10-21T13:30:00.000+08:00" ArrivalTime="2014-10-21T15:25:00.000-05:00" FlightTime="895" Distance="8115" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Cached status used. Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="CacheSeamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F7|P6|A0|R7|J7|D7|I7|Y7|B7|H7|K7|M7|L7|V7|S7|N7|G7|Q7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2868T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2869T" Group="1" Carrier="AA" FlightNumber="128" Origin="DFW" Destination="IAD" DepartureTime="2014-10-21T19:50:00.000-05:00" ArrivalTime="2014-10-21T23:35:00.000-04:00" FlightTime="165" Distance="1177" ETicketability="Yes" Equipment="738" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="P7|F7|A7|S7|Y7|W7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2870T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2871T" Group="0" Carrier="AA" FlightNumber="1075" Origin="DCA" Destination="ORD" DepartureTime="2014-10-19T11:35:00.000-04:00" ArrivalTime="2014-10-19T12:35:00.000-05:00" FlightTime="120" Distance="594" ETicketability="Yes" Equipment="738" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="P7|F7|A7|S7|Y7|W7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2872T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2873T" Group="0" Carrier="AA" FlightNumber="153" Origin="ORD" Destination="NRT" DepartureTime="2014-10-19T13:30:00.000-05:00" ArrivalTime="2014-10-20T16:45:00.000+09:00" FlightTime="795" Distance="6283" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Cached status used. Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="CacheSeamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F7|A7|P7|J7|R7|D7|I7|Y7|B7|H7|K7|M7|L7|V7|S7|N7|Q7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2874T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2875T" Group="0" Carrier="AA" FlightNumber="8482" Origin="NRT" Destination="SIN" DepartureTime="2014-10-20T18:10:00.000+09:00" ArrivalTime="2014-10-21T00:30:00.000+08:00" FlightTime="440" Distance="3312" ETicketability="Yes" Equipment="763" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="JL" OperatingFlightNumber="711">JAPAN AIRLINES</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="RL|J7|D7|S7|Y7|W7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2876T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2877T" Group="0" Carrier="AA" FlightNumber="61" Origin="DFW" Destination="NRT" DepartureTime="2014-10-19T12:46:00.000-05:00" ArrivalTime="2014-10-20T16:15:00.000+09:00" FlightTime="809" Distance="6436" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R7|P7|F7|A7|J7|D7|S7|Y7|W7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|I7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2878T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2879T" Group="0" Carrier="AA" FlightNumber="175" Origin="DFW" Destination="NRT" DepartureTime="2014-10-19T10:31:00.000-05:00" ArrivalTime="2014-10-20T13:55:00.000+09:00" FlightTime="804" Distance="6436" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R7|P7|F7|A7|J7|D7|S7|Y7|W7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|I7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2880T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2881T" Group="1" Carrier="JL" FlightNumber="36" Origin="SIN" Destination="HND" DepartureTime="2014-10-21T21:50:00.000+08:00" ArrivalTime="2014-10-22T05:50:00.000+09:00" FlightTime="420" Distance="3312" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J2|C4|D4|I4|W4|S4|Y4|B4|H4|Q4|M4|N4|K4|L4|V4|X4|G4|E4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2882T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2883T" Group="1" Carrier="AA" FlightNumber="176" Origin="NRT" Destination="DCA" DepartureTime="2014-10-22T11:30:00.000+09:00" ArrivalTime="2014-10-22T14:15:00.000-04:00" FlightTime="945" Distance="6762" ETicketability="Yes" Equipment="CHG" ChangeOfPlane="true" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" NumberOfStops="1" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R7|P7|F7|A7|J7|D7|S7|Y7|W7|B7|H7|M7|N7|K7|L7|Q7|V7|G7|I7|O7" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2884T" ></air:FlightDetailsRef>
          <air:FlightDetailsRef Key="2885T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2886T" Group="0" Carrier="UA" FlightNumber="803" Origin="IAD" Destination="SIN" DepartureTime="2014-10-19T12:20:00.000-04:00" ArrivalTime="2014-10-21T00:10:00.000+08:00" FlightTime="1430" Distance="9702" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" NumberOfStops="1" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F6|A2|J9|C5|D2|ZR|PR|Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G9|N9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2887T" ></air:FlightDetailsRef>
          <air:FlightDetailsRef Key="2888T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2889T" Group="1" Carrier="UA" FlightNumber="9674" Origin="SIN" Destination="NRT" DepartureTime="2014-10-21T05:50:00.000+08:00" ArrivalTime="2014-10-21T14:00:00.000+09:00" FlightTime="430" Distance="3312" ETicketability="Yes" Equipment="788" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="NH" OperatingFlightNumber="802">ALL NIPPON</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D9|Z9|P9|Y9|B9|M9|U9|H9|Q9|V9|W9|S9|T9|L9|K9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2890T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2891T" Group="1" Carrier="UA" FlightNumber="804" Origin="NRT" Destination="IAD" DepartureTime="2014-10-21T15:55:00.000+09:00" ArrivalTime="2014-10-21T15:30:00.000-04:00" FlightTime="755" Distance="6762" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F5|A4|J9|C9|D9|Z9|P9|Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G9|N9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2892T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2893T" Group="1" Carrier="UA" FlightNumber="804" Origin="SIN" Destination="NRT" DepartureTime="2014-10-21T06:00:00.000+08:00" ArrivalTime="2014-10-21T14:10:00.000+09:00" FlightTime="430" Distance="3312" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Cached status used. Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="CacheSeamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F4|A4|J9|C9|D7|Z7|P7|Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G0|N0" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2894T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2895T" Group="1" Carrier="UA" FlightNumber="9667" Origin="NRT" Destination="JFK" DepartureTime="2014-10-21T16:40:00.000+09:00" ArrivalTime="2014-10-21T16:25:00.000-04:00" FlightTime="765" Distance="6737" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="NH" OperatingFlightNumber="1010">ALL NIPPON</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|AR|J9|C9|D9|Z9|P9|Y9|B9|M9|U9|H9|Q9|V9|W9|S9|T9|L9|K9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2896T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2897T" Group="1" Carrier="UA" FlightNumber="5716" Origin="JFK" Destination="IAD" DepartureTime="2014-10-22T06:00:00.000-04:00" ArrivalTime="2014-10-22T07:15:00.000-04:00" FlightTime="75" Distance="215" ETicketability="Yes" Equipment="CRJ" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Cached status used. Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="CacheSeamless">
          <air:CodeshareInfo>EXPRESSJET AIRLINES DBA UNITED EXPRESS</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G9|N0" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2898T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2899T" Group="1" Carrier="UA" FlightNumber="882" Origin="NRT" Destination="ORD" DepartureTime="2014-10-21T16:55:00.000+09:00" ArrivalTime="2014-10-21T14:15:00.000-05:00" FlightTime="680" Distance="6283" ETicketability="Yes" Equipment="744" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|A9|J9|C9|D9|Z9|P9|Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G9|N9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2900T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2901T" Group="1" Carrier="UA" FlightNumber="620" Origin="ORD" Destination="DCA" DepartureTime="2014-10-21T16:10:00.000-05:00" ArrivalTime="2014-10-21T19:04:00.000-04:00" FlightTime="114" Distance="594" ETicketability="Yes" Equipment="319" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Cached status used. Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="CacheSeamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F6|C6|A4|D4|Z0|P0|Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G9|N9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2902T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2903T" Group="1" Carrier="NH" FlightNumber="7050" Origin="SIN" Destination="NRT" DepartureTime="2014-10-21T06:00:00.000+08:00" ArrivalTime="2014-10-21T14:10:00.000+09:00" FlightTime="430" Distance="3312" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="UA" OperatingFlightNumber="804">UNITED AIRLINES</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|A9|J9|C9|D9|Z9|P9|Y9|B9|M9|U9|H9|Q9|V9|W9|S9|L9|K9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2894T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2904T" Group="1" Carrier="NH" FlightNumber="7028" Origin="NRT" Destination="IAD" DepartureTime="2014-10-21T15:55:00.000+09:00" ArrivalTime="2014-10-21T15:30:00.000-04:00" FlightTime="755" Distance="6762" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="UA" OperatingFlightNumber="804">UNITED AIRLINES</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|A9|J9|C9|D9|Z9|P9|Y9|B9|M9|U9|H9|Q9|V9|W9|S9|L9|K9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2892T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2905T" Group="1" Carrier="NH" FlightNumber="802" Origin="SIN" Destination="NRT" DepartureTime="2014-10-21T05:50:00.000+08:00" ArrivalTime="2014-10-21T14:00:00.000+09:00" FlightTime="430" Distance="3312" ETicketability="Yes" Equipment="788" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D9|Z9|P9|Y9|B9|M9|U9|H9|Q9|V9|W9|S9|L9|K9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2890T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2906T" Group="1" Carrier="UA" FlightNumber="804" Origin="SIN" Destination="IAD" DepartureTime="2014-10-21T06:00:00.000+08:00" ArrivalTime="2014-10-21T15:30:00.000-04:00" FlightTime="1290" Distance="9702" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" NumberOfStops="1" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F5|A4|J9|CR|DR|ZR|PR|Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G9|N9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2907T" ></air:FlightDetailsRef>
          <air:FlightDetailsRef Key="2908T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2909T" Group="0" Carrier="B6" FlightNumber="1308" Origin="IAD" Destination="JFK" DepartureTime="2014-10-19T09:53:00.000-04:00" ArrivalTime="2014-10-19T11:00:00.000-04:00" FlightTime="67" Distance="215" ETicketability="Yes" Equipment="E90" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="No polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="Y7|E7|K7|H7|Q7|B7|L7|V7|R7|W7|M7|Z7|OC|UC|SC|PC" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2910T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2911T" Group="0" Carrier="CA" FlightNumber="990" Origin="JFK" Destination="PEK" DepartureTime="2014-10-19T12:50:00.000-04:00" ArrivalTime="2014-10-20T14:20:00.000+08:00" FlightTime="810" Distance="6817" ETicketability="Yes" Equipment="773" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F7|A1|O0|C9|D9|Z9|J4|I0|R0|Y9|B9|M9|H9|K9|L9|Q9|G9|S0|X4|N4|V9|U9|T0|E0" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2912T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2913T" Group="0" Carrier="CA" FlightNumber="969" Origin="PEK" Destination="SIN" DepartureTime="2014-10-20T15:35:00.000+08:00" ArrivalTime="2014-10-20T21:40:00.000+08:00" FlightTime="365" Distance="2791" ETicketability="Yes" Equipment="333" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="C9|D9|Z4|J1|I0|R0|W9|Y9|B9|M9|H9|K9|L9|Q9|G9|S9|X3|N9|V9|U9|T9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2914T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2915T" Group="1" Carrier="CA" FlightNumber="970" Origin="SIN" Destination="PEK" DepartureTime="2014-10-21T00:15:00.000+08:00" ArrivalTime="2014-10-21T06:10:00.000+08:00" FlightTime="355" Distance="2791" ETicketability="Yes" Equipment="333" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="C9|D9|Z5|J2|I2|R0|W9|Y9|B9|M9|H9|K9|L9|Q9|G9|S9|X8|N6|V9|U2|T9|E1" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2916T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2917T" Group="1" Carrier="CA" FlightNumber="817" Origin="PEK" Destination="IAD" DepartureTime="2014-10-21T12:45:00.000+08:00" ArrivalTime="2014-10-21T14:35:00.000-04:00" FlightTime="830" Distance="6911" ETicketability="Yes" Equipment="773" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|A2|O0|C9|D9|Z9|J3|I0|R0|Y9|B9|M9|H9|K9|L9|Q9|G9|S9|X5|N3|V9|U9|T0|E0" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2918T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2919T" Group="0" Carrier="JL" FlightNumber="7341" Origin="DCA" Destination="ORD" DepartureTime="2014-10-19T11:35:00.000-04:00" ArrivalTime="2014-10-19T12:35:00.000-05:00" FlightTime="120" Distance="594" ETicketability="Yes" Equipment="738" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="AA" OperatingFlightNumber="1075">AMERICAN</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F2|A4|S4|Y4|B4|H4|Q4|M4|N4|K4|L4|V4|G4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2872T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2920T" Group="0" Carrier="JL" FlightNumber="7009" Origin="ORD" Destination="NRT" DepartureTime="2014-10-19T13:30:00.000-05:00" ArrivalTime="2014-10-20T16:45:00.000+09:00" FlightTime="795" Distance="6283" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="AA" OperatingFlightNumber="153">AMERICAN</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F2|A4|J2|C4|D4|I4|S4|Y4|B4|H4|Q4|M4|N4|K4|L4|V4|X4|G4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2874T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2921T" Group="0" Carrier="JL" FlightNumber="711" Origin="NRT" Destination="SIN" DepartureTime="2014-10-20T18:10:00.000+09:00" ArrivalTime="2014-10-21T00:30:00.000+08:00" FlightTime="440" Distance="3312" ETicketability="Yes" Equipment="767" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J2|C4|D4|I4|S4|Y4|B4|H4|Q4|M4|N4|K4|L4|V4|X4|G4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2876T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2922T" Group="0" Carrier="JL" FlightNumber="5865" Origin="IAD" Destination="BOS" DepartureTime="2014-10-19T08:35:00.000-04:00" ArrivalTime="2014-10-19T10:04:00.000-04:00" FlightTime="89" Distance="406" ETicketability="Yes" Equipment="E90" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="B6" OperatingFlightNumber="56">JETBLUE AIRWAYS CORPORATION</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="S4|Y4|B4|H4|Q4|M4|N4|K4|L4|V4|GC|OC" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2923T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2924T" Group="0" Carrier="JL" FlightNumber="7" Origin="BOS" Destination="NRT" DepartureTime="2014-10-19T13:15:00.000-04:00" ArrivalTime="2014-10-20T15:55:00.000+09:00" FlightTime="820" Distance="6700" ETicketability="Yes" Equipment="788" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J2|C4|D4|I4|S4|Y4|B4|H4|Q4|M4|N4|K4|L4|V4|X4|G4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2925T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2926T" Group="1" Carrier="JL" FlightNumber="6" Origin="NRT" Destination="JFK" DepartureTime="2014-10-22T11:10:00.000+09:00" ArrivalTime="2014-10-22T11:05:00.000-04:00" FlightTime="775" Distance="6737" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="FL|AL|J2|C4|DL|IL|W4|S4|Y4|B4|H4|QC|M4|N4|K4|L4|V4|XL|GL|E4|OC" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2927T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2928T" Group="1" Carrier="JL" FlightNumber="7460" Origin="JFK" Destination="DCA" DepartureTime="2014-10-22T13:05:00.000-04:00" ArrivalTime="2014-10-22T14:23:00.000-04:00" FlightTime="78" Distance="215" ETicketability="Yes" Equipment="CR7" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo>ENVOY AIR AS AMERICAN EAGLE FOR AA</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F2|A4|S4|Y4|B4|H4|Q4|M4|N4|K4|L4|V4|G4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2929T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2930T" Group="1" Carrier="JL" FlightNumber="5830" Origin="JFK" Destination="IAD" DepartureTime="2014-10-22T17:55:00.000-04:00" ArrivalTime="2014-10-22T19:08:00.000-04:00" FlightTime="73" Distance="215" ETicketability="Yes" Equipment="E90" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="B6" OperatingFlightNumber="1407">JETBLUE AIRWAYS CORPORATION</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="S4|Y4|B4|H4|Q4|M4|N4|K4|L4|V4|G4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2931T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2932T" Group="0" Carrier="UA" FlightNumber="803" Origin="IAD" Destination="NRT" DepartureTime="2014-10-19T12:20:00.000-04:00" ArrivalTime="2014-10-20T15:25:00.000+09:00" FlightTime="845" Distance="6762" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F6|A5|J9|C9|D2|ZR|PR|Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G9|N9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2933T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2934T" Group="0" Carrier="UA" FlightNumber="9675" Origin="NRT" Destination="SIN" DepartureTime="2014-10-20T18:05:00.000+09:00" ArrivalTime="2014-10-21T00:05:00.000+08:00" FlightTime="420" Distance="3312" ETicketability="Yes" Equipment="788" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Cached status used. Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="CacheSeamless">
          <air:CodeshareInfo OperatingCarrier="NH" OperatingFlightNumber="801">ALL NIPPON</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D9|Z9|P2|Y9|B9|M9|U9|H9|Q9|V9|W9|S9|T4|L6|K0" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2935T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2936T" Group="0" Carrier="UA" FlightNumber="9681" Origin="IAD" Destination="NRT" DepartureTime="2014-10-19T12:20:00.000-04:00" ArrivalTime="2014-10-20T15:25:00.000+09:00" FlightTime="845" Distance="6762" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="NH" OperatingFlightNumber="1">ALL NIPPON</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|AR|J9|C9|D9|Z9|P9|Y9|B9|M9|U9|H9|Q9|V9|W9|S9|T9|L9|K9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2933T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2937T" Group="0" Carrier="UA" FlightNumber="3885" Origin="DCA" Destination="EWR" DepartureTime="2014-10-19T07:59:00.000-04:00" ArrivalTime="2014-10-19T09:16:00.000-04:00" FlightTime="77" Distance="215" ETicketability="Yes" Equipment="DH4" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo>REPUBLIC AIRLINES DBA UNITED EXPRESS</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|C9|A9|D9|Z9|P9|Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G9|N9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2938T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2939T" Group="0" Carrier="UA" FlightNumber="79" Origin="EWR" Destination="NRT" DepartureTime="2014-10-19T10:55:00.000-04:00" ArrivalTime="2014-10-20T13:55:00.000+09:00" FlightTime="840" Distance="6737" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D9|Z9|P9|Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S9|T9|L9|K9|G9|N9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2940T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2941T" Group="0" Carrier="NH" FlightNumber="1" Origin="IAD" Destination="NRT" DepartureTime="2014-10-19T12:20:00.000-04:00" ArrivalTime="2014-10-20T15:25:00.000+09:00" FlightTime="845" Distance="6762" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|A9|J9|C9|D9|Z9|P9|Y9|E9|B9|M9|U9|H9|Q9|V9|W9|S9|L9|K9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2933T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2942T" Group="0" Carrier="NH" FlightNumber="801" Origin="NRT" Destination="SIN" DepartureTime="2014-10-20T18:05:00.000+09:00" ArrivalTime="2014-10-21T00:05:00.000+08:00" FlightTime="420" Distance="3312" ETicketability="Yes" Equipment="788" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Cached status used. Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="CacheSeamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D9|Z9|P1|R0|Y9|B9|M9|U9|H9|Q9|V9|W9|S9|L1|K0|N0" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2935T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2943T" Group="0" Carrier="NH" FlightNumber="7029" Origin="IAD" Destination="NRT" DepartureTime="2014-10-19T12:20:00.000-04:00" ArrivalTime="2014-10-20T15:25:00.000+09:00" FlightTime="845" Distance="6762" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:CodeshareInfo OperatingCarrier="UA" OperatingFlightNumber="803">UNITED AIRLINES</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|A9|J9|C9|D9|ZL|PC|Y9|B9|M9|U9|H9|Q9|V9|W9|S9|L9|K9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2933T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2944T" Group="1" Carrier="UA" FlightNumber="5714" Origin="JFK" Destination="IAD" DepartureTime="2014-10-21T19:30:00.000-04:00" ArrivalTime="2014-10-21T20:47:00.000-04:00" FlightTime="77" Distance="215" ETicketability="Yes" Equipment="CRJ" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Point to point cache or polled status used with different O and D status" OptionalServicesIndicator="false" AvailabilitySource="CacheSeamless">
          <air:CodeshareInfo>EXPRESSJET AIRLINES DBA UNITED EXPRESS</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="Y9|B9|M9|E9|U9|H9|Q9|V9|W9|S0|T0|L0|K0|G0|N0" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2945T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2946T" Group="0" Carrier="DL" FlightNumber="6124" Origin="IAD" Destination="JFK" DepartureTime="2014-10-19T06:00:00.000-04:00" ArrivalTime="2014-10-19T07:21:00.000-04:00" FlightTime="81" Distance="215" ETicketability="Yes" Equipment="ERJ" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:CodeshareInfo>CHAUTAUQUA DBA DELTA CONNECTION</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2947T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2948T" Group="0" Carrier="DL" FlightNumber="473" Origin="JFK" Destination="NRT" DepartureTime="2014-10-19T14:45:00.000-04:00" ArrivalTime="2014-10-20T17:35:00.000+09:00" FlightTime="830" Distance="6737" ETicketability="Yes" Equipment="744" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J0|C0|D0|I0|Z0|Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2949T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2950T" Group="0" Carrier="DL" FlightNumber="167" Origin="NRT" Destination="SIN" DepartureTime="2014-10-20T19:25:00.000+09:00" ArrivalTime="2014-10-21T01:40:00.000+08:00" FlightTime="435" Distance="3312" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D9|I9|Z9|Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2951T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2952T" Group="1" Carrier="DL" FlightNumber="166" Origin="SIN" Destination="NRT" DepartureTime="2014-10-21T06:10:00.000+08:00" ArrivalTime="2014-10-21T14:10:00.000+09:00" FlightTime="420" Distance="3312" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D9|I5|Z3|Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2953T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2954T" Group="1" Carrier="DL" FlightNumber="172" Origin="NRT" Destination="JFK" DepartureTime="2014-10-21T15:10:00.000+09:00" ArrivalTime="2014-10-21T14:50:00.000-04:00" FlightTime="760" Distance="6737" ETicketability="Yes" Equipment="744" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D5|I5|Z3|Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2955T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2956T" Group="1" Carrier="DL" FlightNumber="2950" Origin="JFK" Destination="IAD" DepartureTime="2014-10-21T19:35:00.000-04:00" ArrivalTime="2014-10-21T21:11:00.000-04:00" FlightTime="96" Distance="215" ETicketability="Yes" Equipment="ERJ" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:CodeshareInfo>CHAUTAUQUA DBA DELTA CONNECTION</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2957T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2958T" Group="1" Carrier="DL" FlightNumber="276" Origin="NRT" Destination="DTW" DepartureTime="2014-10-21T15:05:00.000+09:00" ArrivalTime="2014-10-21T13:50:00.000-04:00" FlightTime="705" Distance="6398" ETicketability="Yes" Equipment="777" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J0|C0|D0|I0|Z0|Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2959T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2960T" Group="1" Carrier="DL" FlightNumber="1144" Origin="DTW" Destination="DCA" DepartureTime="2014-10-21T15:15:00.000-04:00" ArrivalTime="2014-10-21T16:45:00.000-04:00" FlightTime="90" Distance="391" ETicketability="Yes" Equipment="M80" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|P9|A8|G7|Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2961T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2962T" Group="1" Carrier="DL" FlightNumber="2144" Origin="DTW" Destination="DCA" DepartureTime="2014-10-21T17:20:00.000-04:00" ArrivalTime="2014-10-21T18:46:00.000-04:00" FlightTime="86" Distance="391" ETicketability="Yes" Equipment="320" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|P8|A6|G5|Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2963T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2964T" Group="0" Carrier="DL" FlightNumber="3390" Origin="DCA" Destination="JFK" DepartureTime="2014-10-19T11:30:00.000-04:00" ArrivalTime="2014-10-19T12:47:00.000-04:00" FlightTime="77" Distance="215" ETicketability="Yes" Equipment="CR9" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:CodeshareInfo>ENDEAVOR AIR DBA DELTA CONNECTION</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F7|P5|A5|G4|Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X8|V5|E2" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2965T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2966T" Group="0" Carrier="DL" FlightNumber="3370" Origin="DCA" Destination="JFK" DepartureTime="2014-10-19T06:00:00.000-04:00" ArrivalTime="2014-10-19T07:08:00.000-04:00" FlightTime="68" Distance="215" ETicketability="Yes" Equipment="CR9" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:CodeshareInfo>ENDEAVOR AIR DBA DELTA CONNECTION</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F9|P9|A9|G9|Y9|B9|M9|S9|H9|Q9|K9|L9|U9|T9|X9|V8|E6" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2967T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2968T" Group="0" Carrier="VS" FlightNumber="22" Origin="IAD" Destination="LHR" DepartureTime="2014-10-19T18:40:00.000-04:00" ArrivalTime="2014-10-20T07:05:00.000+01:00" FlightTime="445" Distance="3678" ETicketability="Yes" Equipment="333" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D9|I9|Z7|W9|S9|H9|K9|Y9|B9|R9|L9|U9|M9|E9|Q9|X9|N9|O9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2969T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2970T" Group="0" Carrier="VS" FlightNumber="7317" Origin="LHR" Destination="SIN" DepartureTime="2014-10-20T11:30:00.000+01:00" ArrivalTime="2014-10-21T07:20:00.000+08:00" FlightTime="770" Distance="6742" ETicketability="Yes" Equipment="388" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:CodeshareInfo OperatingCarrier="SQ" OperatingFlightNumber="317">SINGAPORE</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J0|C0|D0|I0|Z0|Y4|B4|R4|L4|U0|M0|E0|Q0|X4|N4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2971T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2972T" Group="1" Carrier="VS" FlightNumber="7322" Origin="SIN" Destination="LHR" DepartureTime="2014-10-21T23:30:00.000+08:00" ArrivalTime="2014-10-22T05:55:00.000+01:00" FlightTime="805" Distance="6742" ETicketability="Yes" Equipment="388" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:CodeshareInfo OperatingCarrier="SQ" OperatingFlightNumber="322">SINGAPORE</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J0|C0|D0|I0|Z0|Y4|B4|R4|L4|U4|M4|E4|Q4|X4|N4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2973T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2974T" Group="1" Carrier="VS" FlightNumber="21" Origin="LHR" Destination="IAD" DepartureTime="2014-10-22T11:35:00.000+01:00" ArrivalTime="2014-10-22T14:50:00.000-04:00" FlightTime="495" Distance="3678" ETicketability="Yes" Equipment="333" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J9|C9|D9|I9|Z9|W9|S9|H8|K7|Y9|B9|R9|L9|U9|M9|E9|Q9|X9|N9|O9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2975T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2976T" Group="1" Carrier="VS" FlightNumber="7320" Origin="SIN" Destination="LHR" DepartureTime="2014-10-21T12:45:00.000+08:00" ArrivalTime="2014-10-21T19:05:00.000+01:00" FlightTime="800" Distance="6742" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:CodeshareInfo OperatingCarrier="SQ" OperatingFlightNumber="318">SINGAPORE</air:CodeshareInfo>
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="J4|C4|D4|I0|Z0|Y4|B4|R4|L4|U4|M4|E4|Q4|X4|N4|O4" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2977T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2978T" Group="1" Carrier="EK" FlightNumber="355" Origin="SIN" Destination="DXB" DepartureTime="2014-10-21T21:25:00.000+08:00" ArrivalTime="2014-10-22T00:55:00.000+04:00" FlightTime="450" Distance="3635" ETicketability="Yes" Equipment="388" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F4|A4|J7|C7|I7|O7|P7|Y9|E9|R9|W9|M9|B9|U9|K9|HC|Q9|L9|T9|V9|X9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2979T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2980T" Group="1" Carrier="EK" FlightNumber="231" Origin="DXB" Destination="IAD" DepartureTime="2014-10-22T02:20:00.000+04:00" ArrivalTime="2014-10-22T08:50:00.000-04:00" FlightTime="870" Distance="7057" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F4|A4|J7|C7|I7|O7|P7|Y9|E9|R9|W9|M9|B9|U9|K9|HC|Q9|L9|T9|V9|X9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2981T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2982T" Group="0" Carrier="CA" FlightNumber="975" Origin="PEK" Destination="SIN" DepartureTime="2014-10-21T00:05:00.000+08:00" ArrivalTime="2014-10-21T06:25:00.000+08:00" FlightTime="380" Distance="2791" ETicketability="Yes" Equipment="333" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="C9|D9|Z2|J2|I2|R0|W9|Y9|B9|M9|H9|K9|L9|Q9|G9|S9|X5|N9|V9|U9|T9|E9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2983T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2984T" Group="1" Carrier="EK" FlightNumber="353" Origin="SIN" Destination="DXB" DepartureTime="2014-10-21T10:35:00.000+08:00" ArrivalTime="2014-10-21T13:45:00.000+04:00" FlightTime="430" Distance="3635" ETicketability="Yes" Equipment="773" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F4|A4|J7|C7|I7|O7|P7|Y9|E9|R9|W9|M9|B9|U9|K9|HC|Q9|L9|T9|V9|X9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2985T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2986T" Group="1" Carrier="EK" FlightNumber="433" Origin="SIN" Destination="DXB" DepartureTime="2014-10-21T09:35:00.000+08:00" ArrivalTime="2014-10-21T12:45:00.000+04:00" FlightTime="430" Distance="3635" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F4|A4|J7|C7|I7|O7|P7|Y9|E9|R9|W9|M9|B9|U9|K9|HC|Q9|L9|T9|V9|X9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2987T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2988T" Group="0" Carrier="EK" FlightNumber="232" Origin="IAD" Destination="DXB" DepartureTime="2014-10-19T10:55:00.000-04:00" ArrivalTime="2014-10-20T08:00:00.000+04:00" FlightTime="785" Distance="7057" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F3|AC|J7|C7|I7|OC|PC|Y9|E9|R9|W9|M9|B9|U9|K9|HC|Q9|L9|TC|VC|XC" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2989T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2990T" Group="0" Carrier="EK" FlightNumber="404" Origin="DXB" Destination="SIN" DepartureTime="2014-10-20T09:35:00.000+04:00" ArrivalTime="2014-10-20T20:55:00.000+08:00" FlightTime="440" Distance="3635" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F3|AC|J7|C7|I7|OC|PC|Y9|E9|R9|W9|M9|B9|U9|K9|HC|Q9|L9|TC|VC|XC" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2991T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2992T" Group="0" Carrier="EK" FlightNumber="352" Origin="DXB" Destination="SIN" DepartureTime="2014-10-20T21:15:00.000+04:00" ArrivalTime="2014-10-21T09:00:00.000+08:00" FlightTime="465" Distance="3635" ETicketability="Yes" Equipment="773" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F4|A4|J7|C7|I7|O7|P7|Y9|E9|R9|W9|M9|B9|U9|K9|HC|Q9|L9|TC|V9|XC" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2993T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2994T" Group="0" Carrier="EK" FlightNumber="432" Origin="DXB" Destination="SIN" DepartureTime="2014-10-21T02:45:00.000+04:00" ArrivalTime="2014-10-21T14:05:00.000+08:00" FlightTime="440" Distance="3635" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Polled avail used" OptionalServicesIndicator="false" AvailabilitySource="Seamless">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="F0|AC|J7|C7|I7|OC|PC|Y9|E9|R9|W9|M9|B9|U9|K9|HC|Q9|L9|TC|VC|XC" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2995T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2996T" Group="0" Carrier="KE" FlightNumber="94" Origin="IAD" Destination="ICN" DepartureTime="2014-10-19T13:35:00.000-04:00" ArrivalTime="2014-10-20T17:10:00.000+09:00" FlightTime="875" Distance="6944" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="No polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R9|J9|C9|D9|I9|Z9|Y9|B9|M9|H9|E9|K9|Q9|T9|G9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2997T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="2998T" Group="0" Carrier="KE" FlightNumber="641" Origin="ICN" Destination="SIN" DepartureTime="2014-10-20T18:40:00.000+09:00" ArrivalTime="2014-10-20T23:50:00.000+08:00" FlightTime="370" Distance="2883" ETicketability="Yes" Equipment="773" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="Cache status used. No polled avail exists." OptionalServicesIndicator="false" AvailabilitySource="CacheLastSeatAvail">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R8|A7|J9|C9|D9|I9|Z9|Y9|B9|M9|H9|E9|K9|Q9|T9|GR" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="2999T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="3000T" Group="1" Carrier="KE" FlightNumber="644" Origin="SIN" Destination="ICN" DepartureTime="2014-10-21T22:35:00.000+08:00" ArrivalTime="2014-10-22T05:55:00.000+09:00" FlightTime="380" Distance="2883" ETicketability="Yes" Equipment="773" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="No polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="P9|J9|C9|D9|I9|Z9|Y9|B9|M9|H9|E9|K9|Q9|T9|GR" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="3001T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="3002T" Group="1" Carrier="KE" FlightNumber="93" Origin="ICN" Destination="IAD" DepartureTime="2014-10-22T10:30:00.000+09:00" ArrivalTime="2014-10-22T11:15:00.000-04:00" FlightTime="825" Distance="6944" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="No polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R9|J9|C9|DR|I9|Z9|Y9|B9|M9|H9|E9|KR|Q9|TR|GR" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="3003T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="3004T" Group="1" Carrier="KE" FlightNumber="642" Origin="SIN" Destination="ICN" DepartureTime="2014-10-21T01:10:00.000+08:00" ArrivalTime="2014-10-21T08:25:00.000+09:00" FlightTime="375" Distance="2883" ETicketability="Yes" Equipment="773" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="No polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="P9|J9|C9|D9|I9|Z9|Y9|B9|M9|H9|E9|K9|Q9|T9|GR" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="3005T" ></air:FlightDetailsRef>
        </air:AirSegment>
        <air:AirSegment Key="3006T" Group="1" Carrier="KE" FlightNumber="93" Origin="ICN" Destination="IAD" DepartureTime="2014-10-21T10:30:00.000+09:00" ArrivalTime="2014-10-21T11:15:00.000-04:00" FlightTime="825" Distance="6944" ETicketability="Yes" Equipment="77W" ChangeOfPlane="false" ParticipantLevel="Secure Sell" LinkAvailability="true" PolledAvailabilityOption="No polled avail exists" OptionalServicesIndicator="false" AvailabilitySource="AvailStatusTTY">
          <air:AirAvailInfo ProviderCode="1G">
            <air:BookingCodeInfo BookingCounts="R9|J9|C9|D9|I9|Z9|Y9|B9|M9|H9|E9|K9|Q9|T9|G9" ></air:BookingCodeInfo>
          </air:AirAvailInfo>
          <air:FlightDetailsRef Key="3007T" ></air:FlightDetailsRef>
        </air:AirSegment>
      </air:AirSegmentList>
      <air:FareInfoList>
        <air:FareInfo Key="14T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="DCA" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP212.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:FareSurcharge Key="15T" Type="Other" Amount="NUC5.80" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="14T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh04dakXKaBPJ1Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl51a8R0RF3D1Ij6+9dTex2EACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQssgC099pNUGa/RSHZpCFN56sbHhSe/6LdsnlNoKJJnpBUX90UpSt9rZr/pagneTWM=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="16T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="SIN" Destination="DCA" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP212.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:FareSurcharge Key="17T" Type="Other" Amount="NUC5.80" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="16T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG052JPcSa42qvFIZYckmwsvtB83f1UwCbb2XN69syx9dx8Hae4mNlGCfspcTF4bGJBOb5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl9KlevZD+bIBIj6+9dTex2EACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQssgC099pNUGa/RSHZpCFN56sbHhSe/6LdsnlNoKJJnpBUX90UpSt9rZr/pagneTWM=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="34T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP212.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:FareSurcharge Key="35T" Type="Other" Amount="NUC5.80" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="34T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh04dakXKaBPJ1Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jlW7Fj1cBa1QlIj6+9dTex2EACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQubE6BQqtkc7DIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="53T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP212.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="53T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG053GHc7JIv0dYQbF3gjlRQC983f1UwCbb2XN69syx9dx8Hae4mNlGCfspcTF4bGJBOb5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl9KlevZD+bIBIj6+9dTex2EACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQubE6BQqtkc7DIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="91T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="DCA" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP209.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="91T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh04dakXKaBPJ1Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl51a8R0RF3D2/tWqrSubFrkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQsdk8ah0tXjYzIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="111T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP209.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="111T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh04dakXKaBPJ1Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jlW7Fj1cBa1Qm/tWqrSubFrkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQsBz5QN3F+0SDIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="211T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="SIN" Destination="DCA" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP209.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-22" NotValidAfter="2014-10-22">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="211T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG052JPcSa42qvFIZYckmwsvtB83f1UwCbb2XN69syx9dx8Hae4mNlGCfspcTF4bGJBOb5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl9KlevZD+bIC/tWqrSubFrkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA7n6t+CfUCZb6oxE1UL944Aqt4e2p60ClHDB1sJcNUcuj/pV1PwRgdCCw++3E1oOdn79wHAVh1+f6BV31o+qihUoDF6+zzB/wA==</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="291T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="DCA" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP209.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="291T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh04dakXKaBPJ1Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl51a8R0RF3D2/tWqrSubFrkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQsdk8ah0tXjYzIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="311T" FareBasis="KLX0ZMM5" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP206.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-19" NotValidAfter="2014-10-19">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="311T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG050SY4glpjjh01cZEYyX6LlQQu0ZscBMSQ7N69syx9dx8NcpUmjVONqEVxokoo7O7N2ddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelkXYdCH957odcmPgj/3dewZJTyB5x9tYSQLWhthMb3jlW7Fj1cBa1QmtLoqva1O26kACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTgAfc6i1FcygJBF6sEINZCFD06ceIB9u7Y</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="312T" FareBasis="KLX0ZMM5" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP206.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="312T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG053GHc7JIv0dYZcOTsW+869S83f1UwCbb2XN69syx9dx8NcpUmjVONqEVxokoo7O7N35msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelkXYdCH957odcmPgj/3dewZJTyB5x9tYSQLWhthMb3jl9KlevZD+bICtLoqva1O26kACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTgAfc6i1FcygJBF6sEINZCFD06ceIB9u7Y</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="348T" FareBasis="KLX0ZMM5" PassengerTypeCode="ADT" Origin="SIN" Destination="DCA" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP206.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="348T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG052JPcSa42qvFFQKzNkwwJcj83f1UwCbb2XN69syx9dx8NcpUmjVONqEVxokoo7O7N35msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelkXYdCH957odcmPgj/3dewZJTyB5x9tYSQLWhthMb3jl9KlevZD+bICtLoqva1O26kACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTgAfc6i1FcygJBF6sEINZCFD06ceIB9u7Y</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="417T" FareBasis="RH00AE2U" PassengerTypeCode="ADT" Origin="IAD" Destination="JFK" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP100.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-19" NotValidAfter="2014-10-19">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="417T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA8SDY+yuzEilM3ExqSoG052opmM5arCHLDtw2wJecOTMQu0ZscBMSQ7AvMKi/VPtctCWwIyN7VUXegUYW6lbodqddQAwG0QXAGLgFn3B9sPd6v9tEaRJgF5C/YIEuJEelpGL74YNUBfVsbbOoAyZ1UFJTyB5x9tYSbUSm61kBU5OW7Fj1cBa1QlPaDPd82GCn0ACA4xcw3/+OEVofhvcFVSF/oTXxxF6MRdVAmZB4NevHZNO0IOqY3aUuA32Ku4i9aZ6+auNdXRZcmbCa/zahKTWg2faVrf8O0TDTbM9oUYrXmtEMKkpniiuJyB+BA4VZzQapDbCAMr/v4Xvb2u1Qx+/he9va7VDH7+F729rtUMfUeheje7bAE8=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="418T" FareBasis="GLPRUS" PassengerTypeCode="ADT" Origin="JFK" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP262.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="418T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA0TKTsfO6LdaM3ExqSoG050SY4glpjjh09NnzlhnD4vI83f1UwCbb2XN69syx9dx8FMB1CH1QqtQWUFxYOLMXjuaKfjPBozXessiOHFaFMf8hf6E18cRejGVqfCTByZWB1jJ1WppfdgsfKA33KQnpZzqNbjwzJx7oo0sKBvhNXxaezolnBc8vl8SNSMLMKVu+Yq+cJFUBzrily5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA3N5jV9Rrzq8txHW6jzw2UZwwdbCXDVHLj+nu6SiYjZn3dD8FtbZvlj1l84JDyoj5VWoPFTrm2r7</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="419T" FareBasis="QLRIU" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP225.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="419T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA0TKTsfO6LdaM3ExqSoG053GHc7JIv0dYWIbExZTxQycabvfXqtwnkTN69syx9dx8PL5eEE9TdV1dTmn1YwVqBmF/oTXxxF6MeJYtF79PC3YfoLT9JoAKrPwx9zlz405AotQILcAgPH2s1a4t7f9S1rg2BMJ0qOmdTyy/Q52QOiIr+B0TkaDAh9YthzKTytHH/wBShF29N4Sv4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx8Qxibp/OJehpo2LrM59tO1jp8ZENljzx6G39D2qNorRKXn4wV4sipX0UbyxbpPTGHcF7TvWtaxDxqfkN1UXoEa</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="440T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="DCA" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP255.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="440T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAwvvPn7Sr2SQM3ExqSoG050SY4glpjjh01VS0IvtpwM3Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl51a8R0RF3D1DrwmYwlgNgEACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQsdk8ah0tXjYzIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hBMgDkOgHUehA=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="461T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP255.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="461T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAwvvPn7Sr2SQM3ExqSoG050SY4glpjjh01VS0IvtpwM3Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jlW7Fj1cBa1QlDrwmYwlgNgEACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQvbHW4Jsps9EzIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hBMgDkOgHUehA=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="482T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="DCA" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP212.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:FareSurcharge Key="483T" Type="Other" Amount="NUC5.80" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="482T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh04dakXKaBPJ1Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl51a8R0RF3D1Ij6+9dTex2EACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQssgC099pNUGa/RSHZpCFN56sbHhSe/6LdsnlNoKJJnpBUX90UpSt9rZr/pagneTWM=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="484T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="SIN" Destination="DCA" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP255.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-22" NotValidAfter="2014-10-22">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="484T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAwvvPn7Sr2SQM3ExqSoG052JPcSa42qvFJ2/oZbxEo2783f1UwCbb2XN69syx9dx8Hae4mNlGCfspcTF4bGJBOb5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl9KlevZD+bIBDrwmYwlgNgEACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQvIuWylPB6ZKDIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hBMgDkOgHUehA=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="505T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP212.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:FareSurcharge Key="506T" Type="Other" Amount="NUC5.80" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="505T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh04dakXKaBPJ1Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jlW7Fj1cBa1QlIj6+9dTex2EACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQubE6BQqtkc7DIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="528T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP255.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-22" NotValidAfter="2014-10-22">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="528T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAwvvPn7Sr2SQM3ExqSoG053GHc7JIv0dYVa2WYMyj7mf83f1UwCbb2XN69syx9dx8Hae4mNlGCfspcTF4bGJBOb5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl9KlevZD+bIBDrwmYwlgNgEACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQvIuWylPB6ZKDIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hBMgDkOgHUehA=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="550T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP212.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="550T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG053GHc7JIv0dYQbF3gjlRQC983f1UwCbb2XN69syx9dx8Hae4mNlGCfspcTF4bGJBOb5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jl9KlevZD+bIBIj6+9dTex2EACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQubE6BQqtkc7DIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="593T" FareBasis="NLU0R4D1" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP209.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="593T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh04dakXKaBPJ1Qu0ZscBMSQ7N69syx9dx8Hae4mNlGCfspcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEeluCkDwv8cSUV8KZ4I8x6i2RJTyB5x9tYSQLWhthMb3jlW7Fj1cBa1Qm/tWqrSubFrkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQsBz5QN3F+0SDIMfHptK6eriySuPDHKossqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="719T" FareBasis="LLW0ZNMH" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP273.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="719T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG050SY4glpjjh0+6YN22Ug57SQu0ZscBMSQ7N69syx9dx8EMGm6kbO206pW1hX843FM2ddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelkXYdCH957odCA6BcpTzEKNJTyB5x9tYSQLWhthMb3jlW7Fj1cBa1QmzK+Yz6Z41IUACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTgSjZyxtrJKepBF6sEINZCFD06ceIB9u7Y</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="756T" FareBasis="LLW0ZNMH" PassengerTypeCode="ADT" Origin="DCA" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP273.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="756T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG050SY4glpjjh0+6YN22Ug57SQu0ZscBMSQ7N69syx9dx8EMGm6kbO206pW1hX843FM2ddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelkXYdCH957odCA6BcpTzEKNJTyB5x9tYSQLWhthMb3jl51a8R0RF3D2zK+Yz6Z41IUACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTgSjZyxtrJKepBF6sEINZCFD06ceIB9u7Y</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1272T" FareBasis="KLX0ZBM2" PassengerTypeCode="ADT" Origin="SIN" Destination="JFK" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP201.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1272T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG052opmM5arCHLKt312xzVYdz83f1UwCbb2XN69syx9dx8BxIXMLBSRgx5sphQQJB1Mj5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelkXYdCH957odcmPgj/3dewZJTyB5x9tYSQLWhthMb3jl9KlevZD+bIA13Le/wZyX6EACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTgAfc6i1FcygJBF6sEINZCFD06ceIB9u7Y</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1273T" FareBasis="VAA03JHN" PassengerTypeCode="ADT" Origin="JFK" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP82.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1273T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG053GHc7JIv0dYYT3pfAfR3/yabvfXqtwnkTAvMKi/VPtcrnHDKgVAR5YDBBlTngHxff5msf8K0kvEGLgFn3B9sPd6v9tEaRJgF5C/YIEuJEelpGL74YNUBfVsbbOoAyZ1UFJTyB5x9tYSbUSm61kBU5O9/iqt+hu/n0m3qx7YGqOikACA4xcw3/+MIFq5m5ZweaF/oTXxxF6MRdVAmZB4NevHZNO0IOqY3aUuA32Ku4i9aSsfDUcij9UiYqD1taBKM+6v6r/fJWNLGGpPgf41D/Hccvr40e6Z37hTdRV2s3CuDzD4Wdjal2fly5qxZ3qLwOXLmrFneovA5cuasWd6i8DUAh2WcSFc+w=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1390T" FareBasis="ULW0ZNAR" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP273.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1390T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA35VSLl1BK/rM3ExqSoG050SY4glpjjh0+6YN22Ug57SQu0ZscBMSQ7N69syx9dx8Ep8cImYRFQRIRMuKS/9OT+ddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelsrmEO4NuNNXDZKjWNFuUe9JTyB5x9tYSQLWhthMb3jlW7Fj1cBa1QmzK+Yz6Z41IUACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQvIuWylPB6ZKDIMfHptK6era50Mq9V+BgoqNLlUpBwT1wEmujohP6hB0bvA0OmlSUQ=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1391T" FareBasis="ULX0ZNAR" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP255.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1391T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA35VSLl1BK/rM3ExqSoG053GHc7JIv0dYVa2WYMyj7mf83f1UwCbb2XN69syx9dx8I4+YRvhewldIRMuKS/9OT/5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelsrmEO4NuNNXDZKjWNFuUe9JTyB5x9tYSQLWhthMb3jl9KlevZD+bIBDrwmYwlgNgEACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQvIuWylPB6ZKDIMfHptK6era50Mq9V+BgoqNLlUpBwT1wEmujohP6hB0bvA0OmlSUQ=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1412T" FareBasis="ULX0ZNAR" PassengerTypeCode="ADT" Origin="SIN" Destination="DCA" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP255.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1412T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA35VSLl1BK/rM3ExqSoG052JPcSa42qvFJ2/oZbxEo2783f1UwCbb2XN69syx9dx8I4+YRvhewldIRMuKS/9OT/5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelsrmEO4NuNNXDZKjWNFuUe9JTyB5x9tYSQLWhthMb3jl9KlevZD+bIBDrwmYwlgNgEACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuocwR/VL8DVTIMfHptK6era50Mq9V+BgoqNLlUpBwT1wEmujohP6hB0bvA0OmlSUQ=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1453T" FareBasis="ULW0ZNAR" PassengerTypeCode="ADT" Origin="DCA" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP273.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1453T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA35VSLl1BK/rM3ExqSoG050SY4glpjjh0+6YN22Ug57SQu0ZscBMSQ7N69syx9dx8Ep8cImYRFQRIRMuKS/9OT+ddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelsrmEO4NuNNXDZKjWNFuUe9JTyB5x9tYSQLWhthMb3jl51a8R0RF3D2zK+Yz6Z41IUACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQvIuWylPB6ZKDIMfHptK6era50Mq9V+BgoqNLlUpBwT1wEmujohP6hB0bvA0OmlSUQ=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1805T" FareBasis="NLUSFE" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP302.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1805T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAxRZuR6ywm63M3ExqSoG050SY4glpjjh0ynIXByqSFglQu0ZscBMSQ4ordQA3SvM7Afe5pY+EFXPWUFxYOLMXjuaKfjPBozXessiOHFaFMf8hf6E18cRejGVqfCTByZWB01sRxVReeu1jNBdtZgX87XqNbjwzJx7oo0sKBvhNXxaVTcLQF+6NzxjStSU36V1CIq+cJFUBzrily5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA3N5jV9Rrzq8txHW6jzw2Ua9kBcA9/6mKTktShz4Ljgf26rFJnPeT1QHOXqqAjEv0Ir7t4GmIDFv</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1806T" FareBasis="NLUSFE" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP302.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-22" NotValidAfter="2014-10-22">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1806T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAxRZuR6ywm63M3ExqSoG053GHc7JIv0dYYp8uxJu6uXZ83f1UwCbb2UordQA3SvM7Afe5pY+EFXPvH6tpxmkEwKWWdwS4Dg2ycsiOHFaFMf8hf6E18cRejGVqfCTByZWB01sRxVReeu1jNBdtZgX87XqNbjwzJx7oo0sKBvhNXxa3C5/OJ7khP5jStSU36V1CIq+cJFUBzrily5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA3N5jV9Rrzq8txHW6jzw2Ua9kBcA9/6mKTktShz4Ljgf26rFJnPeT1QHOXqqAjEv0Ir7t4GmIDFv</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1842T" FareBasis="LLOIU" PassengerTypeCode="ADT" Origin="JFK" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP422.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1842T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA0TKTsfO6LdaM3ExqSoG050SY4glpjjh07yoU6umrkVH83f1UwCbb2XN69syx9dx8E76kE0cliXN7objoMjbob2F/oTXxxF6MeJYtF79PC3YfoLT9JoAKrPwx9zlz405AotQILcAgPH29HRm67uGDGDg2BMJ0qOmdTyy/Q52QOiIooJ2S22VXQTT8F/cbYWLY/wBShF29N4Sv4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx8Qxibp/OJehpo2LrM59tO1jp8ZENljzx6G39D2qNorRKXn4wV4sipXNuRGu9omHIvJ7logtYsrzQUpueLiHpgH</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1843T" FareBasis="ULOWUS1" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP515.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-22" NotValidAfter="2014-10-22">
          <air:FareSurcharge Key="1844T" Type="Other" Amount="NUC344.00" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1843T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5U9GsfIDrTVM3ExqSoG053GHc7JIv0dYRT/fp9JbTlGabvfXqtwnkQordQA3SvM7OAVNu9BYV8fv5KvOGDKP+PMN4B6NiLACBll6FxyIC6cYuAWfcH2w92IEQfz1U0L71+TZlLj7F4w3wmg1+l4DwLqkp0FEw0raOCbZ1nsUQQBuhYGJmZrNDHtrOWjSa/wz+aeJIc23zoev4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx+/he9va7VDH8ONhV50oNexly5qxZ3qLwMDucejlxbWvgU2i5vKx7Q6LrZl1oe8/VMKbZoGR2eFTgnWc30pNupU</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1965T" FareBasis="YUA" PassengerTypeCode="ADT" Origin="DCA" Destination="EWR" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP365.00" PrivateFare="false" NegotiatedFare="false">
          <air:FareSurcharge Key="1966T" Type="Other" Amount="NUC46.51" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1965T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG050Dn+DiFHOwe8TLT/iFCwT8Qu0ZscBMSQ7AvMKi/VPtcjDTUnBup2V5980y0bnc+Rdi4BZ9wfbD3er/bRGkSYBezFOd+W7w/Ux0yW3p+wEZbkSXyVUQo7izjDC3rTjJ9BRDxXO2ZkIT/oMN1QPqv5KjIllwTDNz2yBvMEMFLAmi0MVD69tYhfhovqEDHlrMB7a8Fa7fStx34l5rRDCpKZ4oH8QPtfc7JUamjMOUc7R/4eW9YxRR37BF5Pyzy0urUKC5j7YlJmzP9WtA+czAxiLh3m1+cnXKJufqjETVQv3jgPwBShF29N4Sv4Xvb2u1Qx+/he9va7VDH3C6Ft4pH9C6</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1967T" FareBasis="LLE0OBM2" PassengerTypeCode="ADT" Origin="EWR" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP267.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1967T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG050SY4glpjjh0xD2g3E9WO+O83f1UwCbb2XN69syx9dx8HmKNWAdki5j5sphQQJB1MiddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelkXYdCH957odpz6X4mcxdUpJTyB5x9tYSQLWhthMb3jlyyTgu7lMSq/TQButuYs5V0ACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTgyjg4NR1EsDBBF6sEINZCFD06ceIB9u7Y</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1968T" FareBasis="QLOIU" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP295.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1968T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA0TKTsfO6LdaM3ExqSoG053GHc7JIv0dYXERSWUj1a9qabvfXqtwnkTN69syx9dx8FT7K9bKh6UkdTmn1YwVqBmF/oTXxxF6MeJYtF79PC3YfoLT9JoAKrPwx9zlz405AotQILcAgPH2s1a4t7f9S1rg2BMJ0qOmdTyy/Q52QOiIugrcjMRVFX3ZPFU17AQOnPwBShF29N4Sv4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx8Qxibp/OJehpo2LrM59tO1jp8ZENljzx6G39D2qNorRKXn4wV4sipX0UbyxbpPTGHcF7TvWtaxDxqfkN1UXoEa</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1988T" FareBasis="ULOWUS1" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP515.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:FareSurcharge Key="1989T" Type="Other" Amount="NUC344.00" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1988T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5U9GsfIDrTVM3ExqSoG050SY4glpjjh03lN/tQqaRRfQu0ZscBMSQ4ordQA3SvM7OAVNu9BYV8fv5KvOGDKP+OsvDsZ+769zBll6FxyIC6cYuAWfcH2w92IEQfz1U0L71+TZlLj7F4w3wmg1+l4DwLqkp0FEw0raOCbZ1nsUQQBftYd704RBzftrOWjSa/wz+aeJIc23zoev4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx+/he9va7VDH8ONhV50oNexly5qxZ3qLwMDucejlxbWvgU2i5vKx7Q6LrZl1oe8/VMKbZoGR2eFTgnWc30pNupU</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1990T" FareBasis="VOWSG" PassengerTypeCode="ADT" Origin="SIN" Destination="PEK" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP154.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1990T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA0TKTsfO6LdaM3ExqSoG053Ma3FfzOfuOTkXnhALVJ8W83f1UwCbb2X/yqZm8ZlXA+tQiyCje2i+dTmn1YwVqBmF/oTXxxF6MeJYtF79PC3YfoLT9JoAKrPVW5TpURjX8eH+rsorDymtfbxiFhIou8Dg2BMJ0qOmdTyy/Q52QOiIdl3xHj6wKBzVMfWY6nCwE/wBShF29N4Sv4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx8Qxibp/OJehpo2LrM59tO1jp8ZENljzx72lVAJ3nO/P3nnyEBwBFR63YEloYcrlsL4hs37zHnOPwUpueLiHpgH</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="1991T" FareBasis="QXOWU" PassengerTypeCode="ADT" Origin="PEK" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP441.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:FareSurcharge Key="1992T" Type="Other" Amount="NUC180.86" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="1991T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA0TKTsfO6LdaM3ExqSoG053GHc7JIv0dYZ9X2d0RKdcyabvfXqtwnkTN69syx9dx8PTVYFYNs0wmdTmn1YwVqBmF/oTXxxF6MeJYtF79PC3YfoLT9JoAKrPwx9zlz405AotQILcAgPH27eCN45T9f3Tg2BMJ0qOmdTyy/Q52QOiItf97bEle9cuKat/4DwOT4PwBShF29N4Sv4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx8Qxibp/OJehpo2LrM59tO1jp8ZENljzx6G39D2qNorRNQAqXidryQaRtbtXwgQxlG+LUlTYimkjQUpueLiHpgH</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2013T" FareBasis="WLE0IGM2" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP336.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2013T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG050SY4glpjjh0xX3DcXBYaG/Qu0ZscBMSQ7N69syx9dx8By0OIMyCpwZ5sphQQJB1MiddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelkXYdCH957odpz6X4mcxdUpJTyB5x9tYSQLWhthMb3jlW7Fj1cBa1QkYgSsKPj9QYUACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTgyjg4NR1EsDBBF6sEINZCFD06ceIB9u7Y</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2068T" FareBasis="ELX1YUS1" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP680.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-20" NotValidAfter="2014-10-20">
          <air:FareSurcharge Key="2069T" Type="Other" Amount="NUC344.00" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2068T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5U9GsfIDrTVM3ExqSoG050SY4glpjjh07wg+TrfU8qcQu0ZscBMSQ4ordQA3SvM7MGNWfvcCGbcpcTF4bGJBOaddQAwG0QXAMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelok8KBz2k3oW29Gb9ca1WX9JTyB5x9tYSQLWhthMb3jlW7Fj1cBa1Qkj6/IdFu29UouFsAExMoVlv4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx+/he9va7VDHzyxauAs+veBE308BFXsd7QfxZixrQl8ih2WN4EjYakqgFw6wsAhhaiDVYZcM3r4LY+hYIafqRaE5GwF8kqQiiA=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2070T" FareBasis="ELX1YUS1" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP680.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-22" NotValidAfter="2014-10-22">
          <air:FareSurcharge Key="2071T" Type="Other" Amount="NUC344.00" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2070T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5U9GsfIDrTVM3ExqSoG053GHc7JIv0dYYTZpMGLr03/83f1UwCbb2UordQA3SvM7MGNWfvcCGbcpcTF4bGJBOb5msf8K0kvEMCIbRqMTJch6v9tEaRJgF5C/YIEuJEelok8KBz2k3oW29Gb9ca1WX9JTyB5x9tYSQLWhthMb3jl9KlevZD+bIAj6/IdFu29UouFsAExMoVlv4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx+/he9va7VDHzyxauAs+veBE308BFXsd7QfxZixrQl8ih2WN4EjYakqgFw6wsAhhaiDVYZcM3r4LY+hYIafqRaE5GwF8kqQiiA=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2244T" FareBasis="HLWEUS3" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP780.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2244T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA2lYQhPu//wQM3ExqSoG050SY4glpjjh0wtAciPEVdYwQu0ZscBMSQ7N69syx9dx8P7zbvwvx7M/v5KvOGDKP+OsvDsZ+769zBll6FxyIC6cYuAWfcH2w92IEQfz1U0L77FKaNQc1wdpcS8WsLHLvBjqkp0FEw0raOCbZ1nsUQQBftYd704RBzdNZl0rUG2yj0ACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTga+ZBPC1kqHjiTuSMVaYntxmMwjV2pqTRKAxevs8wf8A=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2245T" FareBasis="HLWEUS3" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP780.00" PrivateFare="false" NegotiatedFare="false">
          <air:FareSurcharge Key="2246T" Type="Other" Amount="NUC287.00" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2245T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA2lYQhPu//wQM3ExqSoG053GHc7JIv0dYcJcM4VKVuBk83f1UwCbb2XN69syx9dx8P7zbvwvx7M/v5KvOGDKP+PMN4B6NiLACBll6FxyIC6cYuAWfcH2w92IEQfz1U0L77FKaNQc1wdpcS8WsLHLvBjqkp0FEw0raOCbZ1nsUQQBuhYGJmZrNDFNZl0rUG2yj0ACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQuf2hQrOzRVUlNFX/4N2RTga+ZBPC1kqHjiTuSMVaYntxmMwjV2pqTRKAxevs8wf8A=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2284T" FareBasis="HLX0R2B1" PassengerTypeCode="ADT" Origin="SIN" Destination="DCA" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP1015.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-22" NotValidAfter="2014-10-22">
          <air:FareSurcharge Key="2285T" Type="Other" Amount="NUC272.20" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2284T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG052JPcSa42qvFHcgEZ0Nve0orqM1AKMEdIlLTjKwIngZNR6TvWCCRNJCSqj4IvxAn13+86ul6TAzEjvQIlbeGa6Ahf6E18cRejF6+WRr8tqYPEwvch3nAVadVi0OEKLOxwJW8vSBNa8ZUmwC02UUzMsn8eE+Wj2ruoKk4yQZyP1khm0N03Bf4LZGly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+iqbM1Qdf97Hna1H5QsLdGzJbfq7d6Cf9lk81nXTQ+DU0Vf/g3ZFOAuPHB/saWhCBzyRUNy+Nd00WS/IqNsGGpGfMxHhlsNnQ==</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2326T" FareBasis="HLX0R2B1" PassengerTypeCode="ADT" Origin="SIN" Destination="DCA" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP1018.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:FareSurcharge Key="2327T" Type="Other" Amount="NUC272.20" ></air:FareSurcharge>
          <air:FareSurcharge Key="2328T" Type="Other" Amount="NUC5.80" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2326T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG052JPcSa42qvFHcgEZ0Nve0orqM1AKMEdIlLTjKwIngZNR6TvWCCRNJCSqj4IvxAn13+86ul6TAzEjvQIlbeGa6Ahf6E18cRejF6+WRr8tqYPEwvch3nAVadVi0OEKLOxwJW8vSBNa8ZUmwC02UUzMsn8eE+Wj2ruoJEdb4t0ocFGG0N03Bf4LZGly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA2+QKPIWaRvq6oxE1UL944D2yoyLNXYwpYbf0Pao2itE2X3WjWdbZ2kKv+O6fxzCUJ9Ve4zDgk//TSTlh0UtFUPkbAXySpCKIA==</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2348T" FareBasis="HLX0R2B1" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP1018.00" PrivateFare="false" NegotiatedFare="false" NotValidBefore="2014-10-21" NotValidAfter="2014-10-21">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2348T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG053GHc7JIv0dYa1nd7U0RWnTrqM1AKMEdIlLTjKwIngZNR6TvWCCRNJCSqj4IvxAn13+86ul6TAzEjvQIlbeGa6Ahf6E18cRejF6+WRr8tqYPEwvch3nAVadVi0OEKLOxwJW8vSBNa8ZUmwC02UUzMsn8eE+Wj2ruoJEdb4t0ocFGG0N03Bf4LZGly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA2+QKPIWaRvq6oxE1UL944AIFgDXgG74C3DB1sJcNUcuj/pV1PwRgdCCw++3E1oOdn79wHAVh1+f6BV31o+qihUoDF6+zzB/wA==</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2390T" FareBasis="B1RMA" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP1594.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2390T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG053GHc7JIv0dYdp3WhTb/sDzrqM1AKMEdIlLTjKwIngZNQiorXimCh0EvH6tpxmkEwKWWdwS4Dg2ycsiOHFaFMf8hf6E18cRejGVqfCTByZWB909yQT48PjSc0gYcv7xBefqNbjwzJx7oo0sKBvhNXxa3C5/OJ7khP7YBOBoE54EvOaeJIc23zoev4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx+/he9va7VDH8ONhV50oNexly5qxZ3qLwNNjEk+TQhn0a/RSHZpCFN5s9QErdreKrtsnlNoKJJnpBUX90UpSt9rIn92u2ozcms=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2452T" FareBasis="B1RMA" PassengerTypeCode="ADT" Origin="SIN" Destination="JFK" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP1616.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2452T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG052opmM5arCHLFyD/Fw5zjCYGqxwKzgb8d9LTjKwIngZNQiorXimCh0EvH6tpxmkEwKWWdwS4Dg2ycsiOHFaFMf8hf6E18cRejGVqfCTByZWB909yQT48PjSc0gYcv7xBefqNbjwzJx7oo0sKBvhNXxa3C5/OJ7khP69XlT7lKprXuaeJIc23zoev4Xvb2u1Qx+/he9va7VDH7+F729rtUMfv4Xvb2u1Qx+/he9va7VDH8ONhV50oNexly5qxZ3qLwOmsURlyERYTa/RSHZpCFN5s9QErdreKrtsnlNoKJJnpGrdeQU9OxE9In92u2ozcms=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2453T" FareBasis="YUA" PassengerTypeCode="ADT" Origin="JFK" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP337.00" PrivateFare="false" NegotiatedFare="false">
          <air:FareSurcharge Key="2454T" Type="Other" Amount="NUC46.51" ></air:FareSurcharge>
          <air:BaggageAllowance>
            <air:NumberOfPieces>2</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2453T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA+FUKxZ/6grdM3ExqSoG053GHc7JIv0dYZ5aPCx7d4kpabvfXqtwnkTAvMKi/VPtcjDTUnBup2V5AhTQeMu2jw9i4BZ9wfbD3er/bRGkSYBezFOd+W7w/Ux0yW3p+wEZbkSXyVUQo7izjDC3rTjJ9BRDxXO2ZkIT/oMN1QPqv5Kj1R4xHuczo7HziQSbssI0DMVD69tYhfhovqEDHlrMB7a8Fa7fStx34l5rRDCpKZ4oH8QPtfc7JUamjMOUc7R/4eW9YxRR37BF5Pyzy0urUKC5j7YlJmzP9WtA+czAxiLh3m1+cnXKJufqjETVQv3jgPwBShF29N4Sv4Xvb2u1Qx+/he9va7VDH3C6Ft4pH9C6</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2472T" FareBasis="J1YRTS" PassengerTypeCode="ADT" Origin="DCA" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP5000.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>3</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2472T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh02oqUErcHeZQJJJkSAQvpY5LTjKwIngZNcVD3B486aGAv5KvOGDKP+OsvDsZ+769zBll6FxyIC6cYuAWfcH2w92IEQfz1U0L7zEVEBxRkrpYvKFhVW7FjFzqkp0FEw0raOCbZ1nsUQQBa0VyzKKntEMzpOK0LM6zzkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQssgC099pNUGa/RSHZpCFN5JwewIvhf++dsnlNoKJJnpBUX90UpSt9rZr/pagneTWM=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2473T" FareBasis="J1XRTS" PassengerTypeCode="ADT" Origin="SIN" Destination="DCA" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP4692.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>3</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2473T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG052JPcSa42qvFHpeOWIGDW3iGqxwKzgb8d9LTjKwIngZNd14qj3w+dGZv5KvOGDKP+PMN4B6NiLACBll6FxyIC6cYuAWfcH2w92IEQfz1U0L7zEVEBxRkrpYvKFhVW7FjFzqkp0FEw0raOCbZ1nsUQQBuhYGJmZrNDGyQLitinj0KUACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQssgC099pNUGa/RSHZpCFN5JwewIvhf++dsnlNoKJJnpBUX90UpSt9rZr/pagneTWM=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2490T" FareBasis="J1YRTS" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP5000.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>3</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2490T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh02oqUErcHeZQJJJkSAQvpY5LTjKwIngZNcVD3B486aGAv5KvOGDKP+OsvDsZ+769zBll6FxyIC6cYuAWfcH2w92IEQfz1U0L7zEVEBxRkrpYvKFhVW7FjFzqkp0FEw0raOCbZ1nsUQQBftYd704RBzczpOK0LM6zzkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQubE6BQqtkc7DIMfHptK6erkVAlbFlnWdAqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2508T" FareBasis="J1XRTS" PassengerTypeCode="ADT" Origin="SIN" Destination="IAD" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP4692.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>3</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2508T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG053GHc7JIv0dYbPnoukYq9M9GqxwKzgb8d9LTjKwIngZNd14qj3w+dGZv5KvOGDKP+PMN4B6NiLACBll6FxyIC6cYuAWfcH2w92IEQfz1U0L7zEVEBxRkrpYvKFhVW7FjFzqkp0FEw0raOCbZ1nsUQQBuhYGJmZrNDGyQLitinj0KUACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQubE6BQqtkc7DIMfHptK6erkVAlbFlnWdAqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2546T" FareBasis="J1YRTS" PassengerTypeCode="ADT" Origin="DCA" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP4996.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>3</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2546T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh02oqUErcHeZQJJJkSAQvpY5LTjKwIngZNcVD3B486aGAv5KvOGDKP+OsvDsZ+769zBll6FxyIC6cYuAWfcH2w92IEQfz1U0L7zEVEBxRkrpYvKFhVW7FjFzqkp0FEw0raOCbZ1nsUQQBa0VyzKKntEM4w0X+FFRGpkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQsdk8ah0tXjYzIMfHptK6erkVAlbFlnWdAqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2566T" FareBasis="J1YRTS" PassengerTypeCode="ADT" Origin="IAD" Destination="SIN" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-19" Amount="GBP4996.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>3</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2566T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG050SY4glpjjh02oqUErcHeZQJJJkSAQvpY5LTjKwIngZNcVD3B486aGAv5KvOGDKP+OsvDsZ+769zBll6FxyIC6cYuAWfcH2w92IEQfz1U0L7zEVEBxRkrpYvKFhVW7FjFzqkp0FEw0raOCbZ1nsUQQBftYd704RBzc4w0X+FFRGpkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQsBz5QN3F+0SDIMfHptK6erkVAlbFlnWdAqNLlUpBwT1wEmujohP6hB54S6dfi4fXE=</air:FareRuleKey>
        </air:FareInfo>
        <air:FareInfo Key="2847T" FareBasis="J1XOWS" PassengerTypeCode="ADT" Origin="SIN" Destination="DCA" EffectiveDate="2014-10-18T06:49:00.000+00:00" DepartureDate="2014-10-21" Amount="GBP5664.00" PrivateFare="false" NegotiatedFare="false">
          <air:BaggageAllowance>
            <air:NumberOfPieces>1</air:NumberOfPieces>
            <air:MaxWeight ></air:MaxWeight>
          </air:BaggageAllowance>
          <air:FareRuleKey FareInfoRef="2847T" ProviderCode="1G">6UUVoSldxwg4fAnjGtg5tMbKj3F8T9EyxsqPcXxP0TIjSPOlaHfQe5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovAzb4nUktgikfM3ExqSoG052JPcSa42qvFO8u2fOvEZMarqM1AKMEdIlLTjKwIngZNdCjR+wuP5tqv5KvOGDKP+PMN4B6NiLACBll6FxyIC6cYuAWfcH2w92IEQfz1U0L7zEVEBxRkrpYvKFhVW7FjFzqkp0FEw0raOCbZ1nsUQQBuhYGJmZrNDGS5k/Wg6JXVkACA4xcw3/+ly5qxZ3qLwOXLmrFneovA5cuasWd6i8Dly5qxZ3qLwOXLmrFneovA4q+cJFUBzriwNmwgE7MqQssgC099pNUGa/RSHZpCFN5JwewIvhf++dsnlNoKJJnpBUX90UpSt9rZr/pagneTWM=</air:FareRuleKey>
        </air:FareInfo>
      </air:FareInfoList>
      <air:RouteList>
        <air:Route Key="3008T">
          <air:Leg Key="1T" Group="0" Origin="WAS" Destination="SIN" ></air:Leg>
          <air:Leg Key="2T" Group="1" Origin="SIN" Destination="WAS" ></air:Leg>
        </air:Route>
      </air:RouteList>
      <air:AirPricingSolution Key="0T" TotalPrice="GBP815.20" BasePrice="USD690.00" ApproximateTotalPrice="GBP815.20" ApproximateBasePrice="GBP425.00" EquivalentBasePrice="GBP425.00" Taxes="GBP390.20">
        <air:Journey TravelTime="P1DT3H25M0S">
          <air:AirSegmentRef Key="2853T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="3T" TotalPrice="GBP815.20" BasePrice="USD690.00" ApproximateTotalPrice="GBP815.20" ApproximateBasePrice="GBP425.00" EquivalentBasePrice="GBP425.00" Taxes="GBP390.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="14T" ></air:FareInfoRef>
          <air:FareInfoRef Key="16T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="14T" SegmentRef="2853T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="14T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DCA" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA(PA) X/HKG AA SIN Q5.80M339.00NLU0R4D1 AA X/HKG AA(PA) WAS Q5.80M339.00NLU0R4D1 NUC689.60END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="22T" TotalPrice="GBP815.20" BasePrice="USD690.00" ApproximateTotalPrice="GBP815.20" ApproximateBasePrice="GBP425.00" EquivalentBasePrice="GBP425.00" Taxes="GBP390.20">
        <air:Journey TravelTime="P1DT5H50M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2865T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="23T" TotalPrice="GBP815.20" BasePrice="USD690.00" ApproximateTotalPrice="GBP815.20" ApproximateBasePrice="GBP425.00" EquivalentBasePrice="GBP425.00" Taxes="GBP390.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="34T" ></air:FareInfoRef>
          <air:FareInfoRef Key="16T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2865T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/HKG AA SIN Q5.80M339.00NLU0R4D1 AA X/HKG AA(PA) WAS Q5.80M339.00NLU0R4D1 NUC689.60END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="41T" TotalPrice="GBP818.60" BasePrice="USD690.00" ApproximateTotalPrice="GBP818.60" ApproximateBasePrice="GBP425.00" EquivalentBasePrice="GBP425.00" Taxes="GBP393.60">
        <air:Journey TravelTime="P1DT3H25M0S">
          <air:AirSegmentRef Key="2853T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="42T" TotalPrice="GBP818.60" BasePrice="USD690.00" ApproximateTotalPrice="GBP818.60" ApproximateBasePrice="GBP425.00" EquivalentBasePrice="GBP425.00" Taxes="GBP393.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="14T" ></air:FareInfoRef>
          <air:FareInfoRef Key="53T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="14T" SegmentRef="2853T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="14T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DCA" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA(PA) X/HKG AA SIN Q5.80M339.00NLU0R4D1 AA X/HKG AA X/DFW Q5.80 AA WAS M339.00NLU0R4D1 NUC689.60END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="59T" TotalPrice="GBP818.60" BasePrice="USD690.00" ApproximateTotalPrice="GBP818.60" ApproximateBasePrice="GBP425.00" EquivalentBasePrice="GBP425.00" Taxes="GBP393.60">
        <air:Journey TravelTime="P1DT5H50M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2865T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="60T" TotalPrice="GBP818.60" BasePrice="USD690.00" ApproximateTotalPrice="GBP818.60" ApproximateBasePrice="GBP425.00" EquivalentBasePrice="GBP425.00" Taxes="GBP393.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="34T" ></air:FareInfoRef>
          <air:FareInfoRef Key="53T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2865T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/HKG AA SIN Q5.80M339.00NLU0R4D1 AA X/HKG AA X/DFW Q5.80 AA WAS M339.00NLU0R4D1 NUC689.60END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="77T" TotalPrice="GBP820.00" BasePrice="USD684.00" ApproximateTotalPrice="GBP820.00" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP399.00">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2871T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2873T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="78T" TotalPrice="GBP820.00" BasePrice="USD684.00" ApproximateTotalPrice="GBP820.00" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP399.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="91T" ></air:FareInfoRef>
          <air:FareInfoRef Key="16T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="91T" SegmentRef="2871T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="91T" SegmentRef="2873T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="91T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/CHI AA X/TYO AA SIN M339.00NLU0R4D1 AA X/HKG AA(PA) WAS Q5.80M339.00NLU0R4D1 NUC683.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="97T" TotalPrice="GBP820.00" BasePrice="USD684.00" ApproximateTotalPrice="GBP820.00" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP399.00">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2877T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="98T" TotalPrice="GBP820.00" BasePrice="USD684.00" ApproximateTotalPrice="GBP820.00" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP399.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="111T" ></air:FareInfoRef>
          <air:FareInfoRef Key="16T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2877T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 AA X/HKG AA(PA) WAS Q5.80M339.00NLU0R4D1 NUC683.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="117T" TotalPrice="GBP820.00" BasePrice="USD684.00" ApproximateTotalPrice="GBP820.00" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP399.00">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2879T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="118T" TotalPrice="GBP820.00" BasePrice="USD684.00" ApproximateTotalPrice="GBP820.00" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP399.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="111T" ></air:FareInfoRef>
          <air:FareInfoRef Key="16T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2879T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 AA X/HKG AA(PA) WAS Q5.80M339.00NLU0R4D1 NUC683.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="136T" TotalPrice="GBP823.40" BasePrice="USD684.00" ApproximateTotalPrice="GBP823.40" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP402.40">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2871T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2873T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="137T" TotalPrice="GBP823.40" BasePrice="USD684.00" ApproximateTotalPrice="GBP823.40" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP402.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="91T" ></air:FareInfoRef>
          <air:FareInfoRef Key="53T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="91T" SegmentRef="2871T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="91T" SegmentRef="2873T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="91T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/CHI AA X/TYO AA SIN M339.00NLU0R4D1 AA X/HKG AA X/DFW Q5.80 AA WAS M339.00NLU0R4D1 NUC683.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="156T" TotalPrice="GBP823.40" BasePrice="USD684.00" ApproximateTotalPrice="GBP823.40" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP402.40">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2877T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="157T" TotalPrice="GBP823.40" BasePrice="USD684.00" ApproximateTotalPrice="GBP823.40" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP402.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="111T" ></air:FareInfoRef>
          <air:FareInfoRef Key="53T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2877T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 AA X/HKG AA X/DFW Q5.80 AA WAS M339.00NLU0R4D1 NUC683.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="176T" TotalPrice="GBP823.40" BasePrice="USD684.00" ApproximateTotalPrice="GBP823.40" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP402.40">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2879T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="177T" TotalPrice="GBP823.40" BasePrice="USD684.00" ApproximateTotalPrice="GBP823.40" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP402.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="111T" ></air:FareInfoRef>
          <air:FareInfoRef Key="53T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2879T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="53T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 AA X/HKG AA X/DFW Q5.80 AA WAS M339.00NLU0R4D1 NUC683.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="196T" TotalPrice="GBP827.90" BasePrice="USD684.00" ApproximateTotalPrice="GBP827.90" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP406.90">
        <air:Journey TravelTime="P1DT3H25M0S">
          <air:AirSegmentRef Key="2853T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="197T" TotalPrice="GBP827.90" BasePrice="USD684.00" ApproximateTotalPrice="GBP827.90" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP406.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="14T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="14T" SegmentRef="2853T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="14T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DCA" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.00" ></air:TaxInfo>
          <air:FareCalc>WAS AA(PA) X/HKG AA SIN Q5.80M339.00NLU0R4D1 JL X/TYO AA WAS M339.00NLU0R4D1 NUC683.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="216T" TotalPrice="GBP827.90" BasePrice="USD684.00" ApproximateTotalPrice="GBP827.90" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP406.90">
        <air:Journey TravelTime="P1DT5H50M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2865T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="217T" TotalPrice="GBP827.90" BasePrice="USD684.00" ApproximateTotalPrice="GBP827.90" ApproximateBasePrice="GBP421.00" EquivalentBasePrice="GBP421.00" Taxes="GBP406.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="34T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2865T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.00" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/HKG AA SIN Q5.80M339.00NLU0R4D1 JL X/TYO AA WAS M339.00NLU0R4D1 NUC683.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="236T" TotalPrice="GBP832.70" BasePrice="USD678.00" ApproximateTotalPrice="GBP832.70" ApproximateBasePrice="GBP417.00" EquivalentBasePrice="GBP417.00" Taxes="GBP415.70">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2877T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="237T" TotalPrice="GBP832.70" BasePrice="USD678.00" ApproximateTotalPrice="GBP832.70" ApproximateBasePrice="GBP417.00" EquivalentBasePrice="GBP417.00" Taxes="GBP415.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="111T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2877T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.00" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 JL X/TYO AA WAS M339.00NLU0R4D1 NUC678.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="256T" TotalPrice="GBP832.70" BasePrice="USD678.00" ApproximateTotalPrice="GBP832.70" ApproximateBasePrice="GBP417.00" EquivalentBasePrice="GBP417.00" Taxes="GBP415.70">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2879T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="257T" TotalPrice="GBP832.70" BasePrice="USD678.00" ApproximateTotalPrice="GBP832.70" ApproximateBasePrice="GBP417.00" EquivalentBasePrice="GBP417.00" Taxes="GBP415.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="111T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2879T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.00" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 JL X/TYO AA WAS M339.00NLU0R4D1 NUC678.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="276T" TotalPrice="GBP832.70" BasePrice="USD678.00" ApproximateTotalPrice="GBP832.70" ApproximateBasePrice="GBP417.00" EquivalentBasePrice="GBP417.00" Taxes="GBP415.70">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2871T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2873T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="277T" TotalPrice="GBP832.70" BasePrice="USD678.00" ApproximateTotalPrice="GBP832.70" ApproximateBasePrice="GBP417.00" EquivalentBasePrice="GBP417.00" Taxes="GBP415.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="291T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="291T" SegmentRef="2871T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="291T" SegmentRef="2873T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="291T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.00" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/CHI AA X/TYO AA SIN M339.00NLU0R4D1 JL X/TYO AA WAS M339.00NLU0R4D1 NUC678.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="297T" TotalPrice="GBP833.70" BasePrice="USD668.00" ApproximateTotalPrice="GBP833.70" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP422.70">
        <air:Journey TravelTime="P0DT23H50M0S">
          <air:AirSegmentRef Key="2886T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2891T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="298T" TotalPrice="GBP833.70" BasePrice="USD668.00" ApproximateTotalPrice="GBP833.70" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP422.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="311T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="311T" SegmentRef="2886T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2891T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP350.10" ></air:TaxInfo>
          <air:FareCalc>WAS UA SIN 334.00KLX0ZMM5 UA X/TYO UA WAS 334.00KLX0ZMM5 NUC668.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="1" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="316T" TotalPrice="GBP837.10" BasePrice="USD668.00" ApproximateTotalPrice="GBP837.10" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP426.10">
        <air:Journey TravelTime="P0DT23H50M0S">
          <air:AirSegmentRef Key="2886T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT13H15M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2897T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="317T" TotalPrice="GBP837.10" BasePrice="USD668.00" ApproximateTotalPrice="GBP837.10" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP426.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="311T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="311T" SegmentRef="2886T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2897T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP350.10" ></air:TaxInfo>
          <air:FareCalc>WAS UA SIN 334.00KLX0ZMM5 UA X/TYO UA X/NYC UA WAS 334.00KLX0ZMM5 NUC668.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="334T" TotalPrice="GBP837.10" BasePrice="USD668.00" ApproximateTotalPrice="GBP837.10" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP426.10">
        <air:Journey TravelTime="P0DT23H50M0S">
          <air:AirSegmentRef Key="2886T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H4M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2899T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2901T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="335T" TotalPrice="GBP837.10" BasePrice="USD668.00" ApproximateTotalPrice="GBP837.10" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP426.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="311T" ></air:FareInfoRef>
          <air:FareInfoRef Key="348T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="311T" SegmentRef="2886T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2899T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2901T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP350.10" ></air:TaxInfo>
          <air:FareCalc>WAS UA SIN 334.00KLX0ZMM5 UA X/TYO UA X/CHI UA WAS 334.00KLX0ZMM5 NUC668.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="353T" TotalPrice="GBP837.30" BasePrice="USD668.00" ApproximateTotalPrice="GBP837.30" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP426.30">
        <air:Journey TravelTime="P0DT23H50M0S">
          <air:AirSegmentRef Key="2886T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2903T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="354T" TotalPrice="GBP837.30" BasePrice="USD668.00" ApproximateTotalPrice="GBP837.30" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP426.30" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="311T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="311T" SegmentRef="2886T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2903T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP353.70" ></air:TaxInfo>
          <air:FareCalc>WAS UA SIN 334.00KLX0ZMM5 NH X/TYO NH WAS 334.00KLX0ZMM5 NUC668.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="1" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="370T" TotalPrice="GBP837.30" BasePrice="USD668.00" ApproximateTotalPrice="GBP837.30" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP426.30">
        <air:Journey TravelTime="P0DT23H50M0S">
          <air:AirSegmentRef Key="2886T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2905T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="371T" TotalPrice="GBP837.30" BasePrice="USD668.00" ApproximateTotalPrice="GBP837.30" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP426.30" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="311T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="311T" SegmentRef="2886T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2905T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP353.70" ></air:TaxInfo>
          <air:FareCalc>WAS UA SIN 334.00KLX0ZMM5 NH X/TYO NH WAS 334.00KLX0ZMM5 NUC668.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="1" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="387T" TotalPrice="GBP843.20" BasePrice="USD668.00" ApproximateTotalPrice="GBP843.20" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP432.20">
        <air:Journey TravelTime="P0DT23H50M0S">
          <air:AirSegmentRef Key="2886T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2906T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="388T" TotalPrice="GBP843.20" BasePrice="USD668.00" ApproximateTotalPrice="GBP843.20" ApproximateBasePrice="GBP411.00" EquivalentBasePrice="GBP411.00" Taxes="GBP432.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="311T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="311T" SegmentRef="2886T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2906T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP359.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA SIN 334.00KLX0ZMM5 UA WAS 334.00KLX0ZMM5 NUC668.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="403T" TotalPrice="GBP866.00" BasePrice="USD952.00" ApproximateTotalPrice="GBP866.00" ApproximateBasePrice="GBP586.00" EquivalentBasePrice="GBP586.00" Taxes="GBP280.00">
        <air:Journey TravelTime="P0DT23H47M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2913T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H20M0S">
          <air:AirSegmentRef Key="2915T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2917T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="404T" TotalPrice="GBP866.00" BasePrice="USD952.00" ApproximateTotalPrice="GBP866.00" ApproximateBasePrice="GBP586.00" EquivalentBasePrice="GBP586.00" Taxes="GBP280.00" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="418T" ></air:FareInfoRef>
          <air:FareInfoRef Key="419T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="G" CabinClass="Economy" FareInfoRef="418T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="G" CabinClass="Economy" FareInfoRef="418T" SegmentRef="2913T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="419T" SegmentRef="2915T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="419T" SegmentRef="2917T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP18.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP10.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP197.00" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 425.00GLPRUS CA X/BJS CA WAS 365.00QLRIU NUC951.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP92.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="425T" TotalPrice="GBP870.00" BasePrice="USD759.00" ApproximateTotalPrice="GBP870.00" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP403.00">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2919T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2920T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="426T" TotalPrice="GBP870.00" BasePrice="USD759.00" ApproximateTotalPrice="GBP870.00" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP403.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="440T" ></air:FareInfoRef>
          <air:FareInfoRef Key="16T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2919T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2920T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP171.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/CHI JL X/TYO JL SIN M414.00NLU0R4D1 AA X/HKG AA(PA) WAS Q5.80M339.00NLU0R4D1 NUC758.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="446T" TotalPrice="GBP870.00" BasePrice="USD759.00" ApproximateTotalPrice="GBP870.00" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP403.00">
        <air:Journey TravelTime="P1DT3H55M0S">
          <air:AirSegmentRef Key="2922T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2924T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="447T" TotalPrice="GBP870.00" BasePrice="USD759.00" ApproximateTotalPrice="GBP870.00" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP403.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="461T" ></air:FareInfoRef>
          <air:FareInfoRef Key="16T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2922T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2924T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="16T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="BOS" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP171.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/BOS JL X/TYO JL SIN M414.00NLU0R4D1 AA X/HKG AA(PA) WAS Q5.80M339.00NLU0R4D1 NUC758.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="467T" TotalPrice="GBP871.10" BasePrice="USD759.00" ApproximateTotalPrice="GBP871.10" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP404.10">
        <air:Journey TravelTime="P1DT3H25M0S">
          <air:AirSegmentRef Key="2853T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H33M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2928T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="468T" TotalPrice="GBP871.10" BasePrice="USD759.00" ApproximateTotalPrice="GBP871.10" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP404.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="482T" ></air:FareInfoRef>
          <air:FareInfoRef Key="484T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="482T" SegmentRef="2853T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="482T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2928T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DCA" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:FareCalc>WAS AA(PA) X/HKG AA SIN Q5.80M339.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC758.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="490T" TotalPrice="GBP871.10" BasePrice="USD759.00" ApproximateTotalPrice="GBP871.10" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP404.10">
        <air:Journey TravelTime="P1DT5H50M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2865T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H33M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2928T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="491T" TotalPrice="GBP871.10" BasePrice="USD759.00" ApproximateTotalPrice="GBP871.10" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP404.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="505T" ></air:FareInfoRef>
          <air:FareInfoRef Key="484T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="505T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="505T" SegmentRef="2865T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="505T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2928T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/HKG AA SIN Q5.80M339.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC758.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="513T" TotalPrice="GBP871.10" BasePrice="USD759.00" ApproximateTotalPrice="GBP871.10" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP404.10">
        <air:Journey TravelTime="P1DT5H50M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2865T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT9H18M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2930T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="514T" TotalPrice="GBP871.10" BasePrice="USD759.00" ApproximateTotalPrice="GBP871.10" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP404.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="34T" ></air:FareInfoRef>
          <air:FareInfoRef Key="528T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2865T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="34T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2930T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/HKG AA SIN Q5.80M339.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC758.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="535T" TotalPrice="GBP873.40" BasePrice="USD759.00" ApproximateTotalPrice="GBP873.40" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP406.40">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2919T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2920T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="536T" TotalPrice="GBP873.40" BasePrice="USD759.00" ApproximateTotalPrice="GBP873.40" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP406.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="440T" ></air:FareInfoRef>
          <air:FareInfoRef Key="550T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2919T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2920T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="550T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="550T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="550T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP171.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/CHI JL X/TYO JL SIN M414.00NLU0R4D1 AA X/HKG AA X/DFW Q5.80 AA WAS M339.00NLU0R4D1 NUC758.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="557T" TotalPrice="GBP873.40" BasePrice="USD759.00" ApproximateTotalPrice="GBP873.40" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP406.40">
        <air:Journey TravelTime="P1DT3H55M0S">
          <air:AirSegmentRef Key="2922T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2924T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="558T" TotalPrice="GBP873.40" BasePrice="USD759.00" ApproximateTotalPrice="GBP873.40" ApproximateBasePrice="GBP467.00" EquivalentBasePrice="GBP467.00" Taxes="GBP406.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="461T" ></air:FareInfoRef>
          <air:FareInfoRef Key="550T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2922T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2924T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="550T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="550T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="550T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="BOS" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP171.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/BOS JL X/TYO JL SIN M414.00NLU0R4D1 AA X/HKG AA X/DFW Q5.80 AA WAS M339.00NLU0R4D1 NUC758.80END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="578T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2877T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H33M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2928T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="579T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="593T" ></air:FareInfoRef>
          <air:FareInfoRef Key="484T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="593T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="593T" SegmentRef="2877T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="593T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2928T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC753.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="600T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2879T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H33M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2928T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="601T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="593T" ></air:FareInfoRef>
          <air:FareInfoRef Key="484T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="593T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="593T" SegmentRef="2879T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="593T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2928T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC753.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="621T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2871T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2873T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H33M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2928T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="622T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="291T" ></air:FareInfoRef>
          <air:FareInfoRef Key="484T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="291T" SegmentRef="2871T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="291T" SegmentRef="2873T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="291T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2928T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/CHI AA X/TYO AA SIN M339.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC753.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="642T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2877T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT9H18M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2930T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="643T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="111T" ></air:FareInfoRef>
          <air:FareInfoRef Key="528T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2877T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2930T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC753.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="663T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2879T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT9H18M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2930T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="664T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="111T" ></air:FareInfoRef>
          <air:FareInfoRef Key="528T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2879T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="111T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2930T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="DFW" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/DFW AA X/TYO AA SIN M339.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC753.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="684T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2871T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2873T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT9H18M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2930T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="685T" TotalPrice="GBP876.90" BasePrice="USD753.00" ApproximateTotalPrice="GBP876.90" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP412.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="AA" ProviderCode="1G">
          <air:FareInfoRef Key="291T" ></air:FareInfoRef>
          <air:FareInfoRef Key="528T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="291T" SegmentRef="2871T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="291T" SegmentRef="2873T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="291T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2930T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:FareCalc>WAS AA X/CHI AA X/TYO AA SIN M339.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC753.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="705T" TotalPrice="GBP892.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP892.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP413.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2932T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2891T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="706T" TotalPrice="GBP892.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP892.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP413.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2932T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2891T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="724T" TotalPrice="GBP892.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP892.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP413.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2936T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2891T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="725T" TotalPrice="GBP892.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP892.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP413.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2936T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2891T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="742T" TotalPrice="GBP892.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP892.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP413.20">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2891T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="743T" TotalPrice="GBP892.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP892.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP413.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="756T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2891T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/EWR UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="762T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2932T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT13H15M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2897T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="763T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2932T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2897T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA X/NYC UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="781T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2936T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT13H15M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2897T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="782T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2936T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2897T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA X/NYC UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="800T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2932T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H4M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2899T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2901T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="801T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="348T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2932T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2899T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2901T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA X/CHI UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="819T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2936T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H4M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2899T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2901T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="820T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="348T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2936T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2899T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2901T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA X/CHI UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="838T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT13H15M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2897T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="839T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="756T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2897T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/EWR UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA X/NYC UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="858T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H4M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2899T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2901T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="859T" TotalPrice="GBP895.60" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.60" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="756T" ></air:FareInfoRef>
          <air:FareInfoRef Key="348T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2899T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2901T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/EWR UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA X/CHI UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="878T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2932T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2903T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="879T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2932T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2903T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="896T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2936T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2903T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="897T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2936T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2903T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="914T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2932T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2905T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="915T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2932T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2905T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="932T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2936T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2905T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="933T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2936T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2905T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="950T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2941T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2891T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="951T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2941T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2891T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="968T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2943T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2891T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="969T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2943T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2891T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="986T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2903T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="987T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="756T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2903T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/EWR UA X/TYO UA SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1005T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2905T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1006T" TotalPrice="GBP895.80" BasePrice="USD778.00" ApproximateTotalPrice="GBP895.80" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP416.80" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="756T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2905T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/EWR UA X/TYO UA SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1024T" TotalPrice="GBP899.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2941T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H4M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2899T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2901T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1025T" TotalPrice="GBP899.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="348T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2941T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2899T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2901T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA X/CHI UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1043T" TotalPrice="GBP899.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2943T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H4M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2899T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2901T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1044T" TotalPrice="GBP899.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="348T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2943T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2899T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="348T" SegmentRef="2901T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA X/CHI UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1062T" TotalPrice="GBP899.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2941T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT13H15M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2897T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1063T" TotalPrice="GBP899.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2941T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2897T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA X/NYC UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1081T" TotalPrice="GBP899.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2943T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT13H15M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2897T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1082T" TotalPrice="GBP899.20" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.20" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2943T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2897T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA X/NYC UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1100T" TotalPrice="GBP899.40" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.40" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.40">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2941T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2903T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1101T" TotalPrice="GBP899.40" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.40" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="No" PlatingCarrier="NH" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2941T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2903T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP347.80" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1118T" TotalPrice="GBP899.40" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.40" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.40">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2943T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2903T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1119T" TotalPrice="GBP899.40" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.40" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="No" PlatingCarrier="NH" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2943T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2903T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP347.80" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1136T" TotalPrice="GBP899.40" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.40" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.40">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2941T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2905T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1137T" TotalPrice="GBP899.40" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.40" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="No" PlatingCarrier="NH" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2941T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2905T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP347.80" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1154T" TotalPrice="GBP899.40" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.40" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.40">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2943T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2905T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1155T" TotalPrice="GBP899.40" BasePrice="USD778.00" ApproximateTotalPrice="GBP899.40" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP420.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="No" PlatingCarrier="NH" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2943T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2905T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP347.80" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH NH X/TYO NH WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1172T" TotalPrice="GBP901.70" BasePrice="USD778.00" ApproximateTotalPrice="GBP901.70" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP422.70">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2932T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2906T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1173T" TotalPrice="GBP901.70" BasePrice="USD778.00" ApproximateTotalPrice="GBP901.70" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP422.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2932T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2906T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP350.10" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1189T" TotalPrice="GBP901.70" BasePrice="USD778.00" ApproximateTotalPrice="GBP901.70" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP422.70">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2936T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2906T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1190T" TotalPrice="GBP901.70" BasePrice="USD778.00" ApproximateTotalPrice="GBP901.70" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP422.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2936T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2906T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP350.10" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1206T" TotalPrice="GBP901.70" BasePrice="USD778.00" ApproximateTotalPrice="GBP901.70" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP422.70">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2906T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1207T" TotalPrice="GBP901.70" BasePrice="USD778.00" ApproximateTotalPrice="GBP901.70" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP422.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="756T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2906T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP350.10" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/EWR UA X/TYO UA SIN 444.00LLW0ZNMH UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1224T" TotalPrice="GBP905.30" BasePrice="USD778.00" ApproximateTotalPrice="GBP905.30" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP426.30">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2941T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2906T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1225T" TotalPrice="GBP905.30" BasePrice="USD778.00" ApproximateTotalPrice="GBP905.30" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP426.30" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2941T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2906T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP353.70" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1241T" TotalPrice="GBP905.30" BasePrice="USD778.00" ApproximateTotalPrice="GBP905.30" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP426.30">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2943T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2906T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1242T" TotalPrice="GBP905.30" BasePrice="USD778.00" ApproximateTotalPrice="GBP905.30" ApproximateBasePrice="GBP479.00" EquivalentBasePrice="GBP479.00" Taxes="GBP426.30" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="312T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2943T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="312T" SegmentRef="2906T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP353.70" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA WAS 334.00KLX0ZMM5 NUC778.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1258T" TotalPrice="GBP914.10" BasePrice="USD793.00" ApproximateTotalPrice="GBP914.10" ApproximateBasePrice="GBP488.00" EquivalentBasePrice="GBP488.00" Taxes="GBP426.10">
        <air:Journey TravelTime="P0DT23H50M0S">
          <air:AirSegmentRef Key="2886T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H47M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1259T" TotalPrice="GBP914.10" BasePrice="USD793.00" ApproximateTotalPrice="GBP914.10" ApproximateBasePrice="GBP488.00" EquivalentBasePrice="GBP488.00" Taxes="GBP426.10" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="311T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="311T" SegmentRef="2886T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP350.10" ></air:TaxInfo>
          <air:FareCalc>WAS UA SIN 334.00KLX0ZMM5 UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC793.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1278T" TotalPrice="GBP914.10" BasePrice="USD793.00" ApproximateTotalPrice="GBP914.10" ApproximateBasePrice="GBP488.00" EquivalentBasePrice="GBP488.00" Taxes="GBP426.10">
        <air:Journey TravelTime="P0DT23H50M0S">
          <air:AirSegmentRef Key="2886T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H57M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1279T" TotalPrice="GBP914.10" BasePrice="USD793.00" ApproximateTotalPrice="GBP914.10" ApproximateBasePrice="GBP488.00" EquivalentBasePrice="GBP488.00" Taxes="GBP426.10" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="311T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="311T" SegmentRef="2886T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP350.10" ></air:TaxInfo>
          <air:FareCalc>WAS UA SIN 334.00KLX0ZMM5 UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC793.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1296T" TotalPrice="GBP935.10" BasePrice="USD828.00" ApproximateTotalPrice="GBP935.10" ApproximateBasePrice="GBP510.00" EquivalentBasePrice="GBP510.00" Taxes="GBP425.10">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2919T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2920T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H33M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2928T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1297T" TotalPrice="GBP935.10" BasePrice="USD828.00" ApproximateTotalPrice="GBP935.10" ApproximateBasePrice="GBP510.00" EquivalentBasePrice="GBP510.00" Taxes="GBP425.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="440T" ></air:FareInfoRef>
          <air:FareInfoRef Key="484T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2919T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2920T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2928T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP343.20" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/CHI JL X/TYO JL SIN M414.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC828.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1316T" TotalPrice="GBP935.10" BasePrice="USD828.00" ApproximateTotalPrice="GBP935.10" ApproximateBasePrice="GBP510.00" EquivalentBasePrice="GBP510.00" Taxes="GBP425.10">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2919T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2920T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT9H18M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2930T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1317T" TotalPrice="GBP935.10" BasePrice="USD828.00" ApproximateTotalPrice="GBP935.10" ApproximateBasePrice="GBP510.00" EquivalentBasePrice="GBP510.00" Taxes="GBP425.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="440T" ></air:FareInfoRef>
          <air:FareInfoRef Key="528T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2919T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2920T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2930T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP343.20" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/CHI JL X/TYO JL SIN M414.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC828.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1336T" TotalPrice="GBP935.10" BasePrice="USD828.00" ApproximateTotalPrice="GBP935.10" ApproximateBasePrice="GBP510.00" EquivalentBasePrice="GBP510.00" Taxes="GBP425.10">
        <air:Journey TravelTime="P1DT3H55M0S">
          <air:AirSegmentRef Key="2922T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2924T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H33M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2928T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1337T" TotalPrice="GBP935.10" BasePrice="USD828.00" ApproximateTotalPrice="GBP935.10" ApproximateBasePrice="GBP510.00" EquivalentBasePrice="GBP510.00" Taxes="GBP425.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="461T" ></air:FareInfoRef>
          <air:FareInfoRef Key="484T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2922T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2924T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="484T" SegmentRef="2928T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="BOS" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP343.20" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/BOS JL X/TYO JL SIN M414.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC828.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1356T" TotalPrice="GBP935.10" BasePrice="USD828.00" ApproximateTotalPrice="GBP935.10" ApproximateBasePrice="GBP510.00" EquivalentBasePrice="GBP510.00" Taxes="GBP425.10">
        <air:Journey TravelTime="P1DT3H55M0S">
          <air:AirSegmentRef Key="2922T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2924T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT9H18M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2930T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1357T" TotalPrice="GBP935.10" BasePrice="USD828.00" ApproximateTotalPrice="GBP935.10" ApproximateBasePrice="GBP510.00" EquivalentBasePrice="GBP510.00" Taxes="GBP425.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="461T" ></air:FareInfoRef>
          <air:FareInfoRef Key="528T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2922T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2924T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2930T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="BOS" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP343.20" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/BOS JL X/TYO JL SIN M414.00NLU0R4D1 JL X/TYO JL X/NYC JL WAS M414.00NLU0R4D1 NUC828.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1376T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT7H40M0S">
          <air:AirSegmentRef Key="2946T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2948T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2950T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H1M0S">
          <air:AirSegmentRef Key="2952T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2954T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2956T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1377T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="DL" ProviderCode="1G">
          <air:FareInfoRef Key="1390T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1391T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1390T" SegmentRef="2946T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1390T" SegmentRef="2948T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1390T" SegmentRef="2950T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1391T" SegmentRef="2952T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1391T" SegmentRef="2954T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1391T" SegmentRef="2956T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS DL X/NYC DL X/TYO DL SIN M444.00ULW0ZNAR DL X/TYO DL X/NYC DL WAS M414.00ULX0ZNAR NUC858.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1398T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT7H40M0S">
          <air:AirSegmentRef Key="2946T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2948T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2950T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT22H35M0S">
          <air:AirSegmentRef Key="2952T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2958T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2960T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1399T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="DL" ProviderCode="1G">
          <air:FareInfoRef Key="1390T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1412T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1390T" SegmentRef="2946T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1390T" SegmentRef="2948T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1390T" SegmentRef="2950T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2952T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2958T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2960T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS DL X/NYC DL X/TYO DL SIN M444.00ULW0ZNAR DL X/TYO DL X/DTT DL WAS M414.00ULX0ZNAR NUC858.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1419T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT7H40M0S">
          <air:AirSegmentRef Key="2946T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2948T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2950T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT0H36M0S">
          <air:AirSegmentRef Key="2952T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2958T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2962T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1420T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="DL" ProviderCode="1G">
          <air:FareInfoRef Key="1390T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1412T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1390T" SegmentRef="2946T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1390T" SegmentRef="2948T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1390T" SegmentRef="2950T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2952T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2958T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2962T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS DL X/NYC DL X/TYO DL SIN M444.00ULW0ZNAR DL X/TYO DL X/DTT DL WAS M414.00ULX0ZNAR NUC858.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1439T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT2H10M0S">
          <air:AirSegmentRef Key="2964T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2948T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2950T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H1M0S">
          <air:AirSegmentRef Key="2952T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2954T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2956T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1440T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="DL" ProviderCode="1G">
          <air:FareInfoRef Key="1453T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1391T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2964T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2948T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2950T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1391T" SegmentRef="2952T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1391T" SegmentRef="2954T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1391T" SegmentRef="2956T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS DL X/NYC DL X/TYO DL SIN M444.00ULW0ZNAR DL X/TYO DL X/NYC DL WAS M414.00ULX0ZNAR NUC858.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1460T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT7H40M0S">
          <air:AirSegmentRef Key="2966T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2948T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2950T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H1M0S">
          <air:AirSegmentRef Key="2952T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2954T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2956T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1461T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="DL" ProviderCode="1G">
          <air:FareInfoRef Key="1453T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1391T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2966T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2948T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2950T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1391T" SegmentRef="2952T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1391T" SegmentRef="2954T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1391T" SegmentRef="2956T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS DL X/NYC DL X/TYO DL SIN M444.00ULW0ZNAR DL X/TYO DL X/NYC DL WAS M414.00ULX0ZNAR NUC858.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1480T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT2H10M0S">
          <air:AirSegmentRef Key="2964T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2948T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2950T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT22H35M0S">
          <air:AirSegmentRef Key="2952T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2958T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2960T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1481T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="DL" ProviderCode="1G">
          <air:FareInfoRef Key="1453T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1412T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2964T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2948T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2950T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2952T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2958T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2960T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS DL X/NYC DL X/TYO DL SIN M444.00ULW0ZNAR DL X/TYO DL X/DTT DL WAS M414.00ULX0ZNAR NUC858.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1500T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT7H40M0S">
          <air:AirSegmentRef Key="2966T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2948T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2950T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT22H35M0S">
          <air:AirSegmentRef Key="2952T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2958T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2960T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1501T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="DL" ProviderCode="1G">
          <air:FareInfoRef Key="1453T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1412T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2966T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2948T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2950T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2952T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2958T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2960T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS DL X/NYC DL X/TYO DL SIN M444.00ULW0ZNAR DL X/TYO DL X/DTT DL WAS M414.00ULX0ZNAR NUC858.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1520T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT2H10M0S">
          <air:AirSegmentRef Key="2964T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2948T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2950T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT0H36M0S">
          <air:AirSegmentRef Key="2952T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2958T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2962T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1521T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="DL" ProviderCode="1G">
          <air:FareInfoRef Key="1453T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1412T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2964T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2948T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2950T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2952T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2958T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2962T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS DL X/NYC DL X/TYO DL SIN M444.00ULW0ZNAR DL X/TYO DL X/DTT DL WAS M414.00ULX0ZNAR NUC858.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1540T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT7H40M0S">
          <air:AirSegmentRef Key="2966T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2948T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2950T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT0H36M0S">
          <air:AirSegmentRef Key="2952T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2958T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2962T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1541T" TotalPrice="GBP944.60" BasePrice="USD858.00" ApproximateTotalPrice="GBP944.60" ApproximateBasePrice="GBP528.00" EquivalentBasePrice="GBP528.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="DL" ProviderCode="1G">
          <air:FareInfoRef Key="1453T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1412T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2966T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2948T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1453T" SegmentRef="2950T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2952T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2958T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1412T" SegmentRef="2962T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS DL X/NYC DL X/TYO DL SIN M444.00ULW0ZNAR DL X/TYO DL X/DTT DL WAS M414.00ULX0ZNAR NUC858.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1560T" TotalPrice="GBP965.70" BasePrice="USD753.00" ApproximateTotalPrice="GBP965.70" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP501.70">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2919T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2920T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1561T" TotalPrice="GBP965.70" BasePrice="USD753.00" ApproximateTotalPrice="GBP965.70" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP501.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="440T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2919T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2920T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="ORD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP255.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/CHI JL X/TYO JL SIN M414.00NLU0R4D1 JL X/TYO AA WAS M339.00NLU0R4D1 NUC753.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1580T" TotalPrice="GBP965.70" BasePrice="USD753.00" ApproximateTotalPrice="GBP965.70" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP501.70">
        <air:Journey TravelTime="P1DT3H55M0S">
          <air:AirSegmentRef Key="2922T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2924T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1581T" TotalPrice="GBP965.70" BasePrice="USD753.00" ApproximateTotalPrice="GBP965.70" ApproximateBasePrice="GBP464.00" EquivalentBasePrice="GBP464.00" Taxes="GBP501.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="JL" ProviderCode="1G">
          <air:FareInfoRef Key="461T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2922T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2924T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="BOS" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP255.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:FareCalc>WAS JL X/BOS JL X/TYO JL SIN M414.00NLU0R4D1 JL X/TYO AA WAS M339.00NLU0R4D1 NUC753.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP153.00</air:Amount>
          </air:ChangePenalty>
          <air:CancelPenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1600T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2932T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H47M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1601T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2932T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1619T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2936T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H47M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1620T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2936T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1638T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2932T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H57M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1639T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2932T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1657T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2936T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H57M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1658T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2936T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1676T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H47M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1677T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="756T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/EWR UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1696T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H57M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1697T" TotalPrice="GBP972.60" BasePrice="USD903.00" ApproximateTotalPrice="GBP972.60" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP416.60" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="756T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="756T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP340.60" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/EWR UA X/TYO UA SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1716T" TotalPrice="GBP976.20" BasePrice="USD903.00" ApproximateTotalPrice="GBP976.20" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP420.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2941T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H47M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1717T" TotalPrice="GBP976.20" BasePrice="USD903.00" ApproximateTotalPrice="GBP976.20" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP420.20" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2941T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1735T" TotalPrice="GBP976.20" BasePrice="USD903.00" ApproximateTotalPrice="GBP976.20" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP420.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2943T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H47M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1736T" TotalPrice="GBP976.20" BasePrice="USD903.00" ApproximateTotalPrice="GBP976.20" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP420.20" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2943T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1754T" TotalPrice="GBP976.20" BasePrice="USD903.00" ApproximateTotalPrice="GBP976.20" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP420.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2941T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H57M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1755T" TotalPrice="GBP976.20" BasePrice="USD903.00" ApproximateTotalPrice="GBP976.20" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP420.20" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2941T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1773T" TotalPrice="GBP976.20" BasePrice="USD903.00" ApproximateTotalPrice="GBP976.20" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP420.20">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2943T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2942T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H57M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2944T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1774T" TotalPrice="GBP976.20" BasePrice="USD903.00" ApproximateTotalPrice="GBP976.20" ApproximateBasePrice="GBP556.00" EquivalentBasePrice="GBP556.00" Taxes="GBP420.20" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="719T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1272T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1273T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2943T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="719T" SegmentRef="2942T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="K" CabinClass="Economy" FareInfoRef="1272T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1273T" SegmentRef="2944T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP344.20" ></air:TaxInfo>
          <air:FareCalc>WAS NH X/TYO NH SIN 444.00LLW0ZNMH UA X/TYO UA NYC 326.00KLX0ZBM2 UA WAS 133.02VAA03JHN NUC903.02END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1792T" TotalPrice="GBP1009.12" BasePrice="USD980.00" ApproximateTotalPrice="GBP1009.12" ApproximateBasePrice="GBP603.00" EquivalentBasePrice="GBP603.00" Taxes="GBP406.12">
        <air:Journey TravelTime="P1DT0H40M0S">
          <air:AirSegmentRef Key="2968T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2970T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H20M0S">
          <air:AirSegmentRef Key="2972T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2974T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1793T" TotalPrice="GBP1009.12" BasePrice="USD980.00" ApproximateTotalPrice="GBP1009.12" ApproximateBasePrice="GBP603.00" EquivalentBasePrice="GBP603.00" Taxes="GBP406.12" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="VS" ProviderCode="1G">
          <air:FareInfoRef Key="1805T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1806T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="1805T" SegmentRef="2968T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="1805T" SegmentRef="2970T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="1806T" SegmentRef="2972T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="1806T" SegmentRef="2974T" ></air:BookingInfo>
          <air:TaxInfo Category="UB" Amount="GBP67.72" ></air:TaxInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP283.40" ></air:TaxInfo>
          <air:FareCalc>WAS VS X/LON VS SIN 490.00NLUSFE VS X/LON VS WAS 490.00NLUSFE NUC980.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP169.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1811T" TotalPrice="GBP1009.12" BasePrice="USD980.00" ApproximateTotalPrice="GBP1009.12" ApproximateBasePrice="GBP603.00" EquivalentBasePrice="GBP603.00" Taxes="GBP406.12">
        <air:Journey TravelTime="P1DT0H40M0S">
          <air:AirSegmentRef Key="2968T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2970T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT14H5M0S">
          <air:AirSegmentRef Key="2976T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2974T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1812T" TotalPrice="GBP1009.12" BasePrice="USD980.00" ApproximateTotalPrice="GBP1009.12" ApproximateBasePrice="GBP603.00" EquivalentBasePrice="GBP603.00" Taxes="GBP406.12" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="VS" ProviderCode="1G">
          <air:FareInfoRef Key="1805T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1806T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="1805T" SegmentRef="2968T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="1805T" SegmentRef="2970T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="1806T" SegmentRef="2976T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="1806T" SegmentRef="2974T" ></air:BookingInfo>
          <air:TaxInfo Category="UB" Amount="GBP67.72" ></air:TaxInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP283.40" ></air:TaxInfo>
          <air:FareCalc>WAS VS X/LON VS SIN 490.00NLUSFE VS X/LON VS WAS 490.00NLUSFE NUC980.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP169.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1828T" TotalPrice="GBP1203.50" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1203.50" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP167.50">
        <air:Journey TravelTime="P0DT23H47M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2913T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT23H25M0S">
          <air:AirSegmentRef Key="2978T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1829T" TotalPrice="GBP1203.50" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1203.50" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP167.50" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1843T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2913T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2978T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP5.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU EK X/DXB EK WAS Q SINWAS344.00 492.00ULOWUS1 NUC1682.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1850T" TotalPrice="GBP1203.50" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1203.50" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP167.50">
        <air:Journey TravelTime="P1DT8H32M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2982T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT23H25M0S">
          <air:AirSegmentRef Key="2978T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1851T" TotalPrice="GBP1203.50" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1203.50" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP167.50" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1843T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2982T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2978T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP5.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU EK X/DXB EK WAS Q SINWAS344.00 492.00ULOWUS1 NUC1682.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1869T" TotalPrice="GBP1204.30" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1204.30" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP168.30">
        <air:Journey TravelTime="P0DT23H47M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2913T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT10H15M0S">
          <air:AirSegmentRef Key="2984T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1870T" TotalPrice="GBP1204.30" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1204.30" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP168.30" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1843T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2913T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2984T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP5.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU EK X/DXB EK WAS Q SINWAS344.00 492.00ULOWUS1 NUC1682.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1889T" TotalPrice="GBP1204.30" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1204.30" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP168.30">
        <air:Journey TravelTime="P1DT8H32M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2982T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT10H15M0S">
          <air:AirSegmentRef Key="2984T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1890T" TotalPrice="GBP1204.30" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1204.30" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP168.30" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1843T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2982T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2984T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP5.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU EK X/DXB EK WAS Q SINWAS344.00 492.00ULOWUS1 NUC1682.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1909T" TotalPrice="GBP1204.30" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1204.30" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP168.30">
        <air:Journey TravelTime="P0DT23H47M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2913T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT11H15M0S">
          <air:AirSegmentRef Key="2986T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1910T" TotalPrice="GBP1204.30" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1204.30" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP168.30" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1843T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2913T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2986T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP5.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU EK X/DXB EK WAS Q SINWAS344.00 492.00ULOWUS1 NUC1682.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1929T" TotalPrice="GBP1204.30" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1204.30" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP168.30">
        <air:Journey TravelTime="P1DT8H32M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2982T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT11H15M0S">
          <air:AirSegmentRef Key="2986T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1930T" TotalPrice="GBP1204.30" BasePrice="USD1683.00" ApproximateTotalPrice="GBP1204.30" ApproximateBasePrice="GBP1036.00" EquivalentBasePrice="GBP1036.00" Taxes="GBP168.30" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1843T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2982T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2986T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP5.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU EK X/DXB EK WAS Q SINWAS344.00 492.00ULOWUS1 NUC1682.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1949T" TotalPrice="GBP1273.60" BasePrice="USD1506.00" ApproximateTotalPrice="GBP1273.60" ApproximateBasePrice="GBP927.00" EquivalentBasePrice="GBP927.00" Taxes="GBP346.60">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H20M0S">
          <air:AirSegmentRef Key="2915T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2917T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1950T" TotalPrice="GBP1273.60" BasePrice="USD1506.00" ApproximateTotalPrice="GBP1273.60" ApproximateBasePrice="GBP927.00" EquivalentBasePrice="GBP927.00" Taxes="GBP346.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="1965T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1967T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1968T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="1965T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="1968T" SegmentRef="2915T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="1968T" SegmentRef="2917T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP175.30" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS UA EWR Q46.51 546.98YUA UA X/TYO UA SIN 433.00LLE0OBM2 CA X/BJS CA WAS 480.00QLOIU NUC1506.49END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1974T" TotalPrice="GBP1276.50" BasePrice="USD1802.00" ApproximateTotalPrice="GBP1276.50" ApproximateBasePrice="GBP1109.00" EquivalentBasePrice="GBP1109.00" Taxes="GBP167.50">
        <air:Journey TravelTime="P0DT22H0M0S">
          <air:AirSegmentRef Key="2988T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2990T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H20M0S">
          <air:AirSegmentRef Key="2915T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2917T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1975T" TotalPrice="GBP1276.50" BasePrice="USD1802.00" ApproximateTotalPrice="GBP1276.50" ApproximateBasePrice="GBP1109.00" EquivalentBasePrice="GBP1109.00" Taxes="GBP167.50" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="EK" ProviderCode="1G">
          <air:FareInfoRef Key="1988T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1990T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1991T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1988T" SegmentRef="2988T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1988T" SegmentRef="2990T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1990T" SegmentRef="2915T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="1991T" SegmentRef="2917T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP5.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS EK X/DXB EK SIN Q WASSIN344.00 492.00ULOWUS1 CA BJS 250.48VOWSG CA WAS Q180.86 535.00QXOWU NUC1802.34END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="1997T" TotalPrice="GBP1276.60" BasePrice="USD1511.00" ApproximateTotalPrice="GBP1276.60" ApproximateBasePrice="GBP930.00" EquivalentBasePrice="GBP930.00" Taxes="GBP346.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2932T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H20M0S">
          <air:AirSegmentRef Key="2915T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2917T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="1998T" TotalPrice="GBP1276.60" BasePrice="USD1511.00" ApproximateTotalPrice="GBP1276.60" ApproximateBasePrice="GBP930.00" EquivalentBasePrice="GBP930.00" Taxes="GBP346.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="2013T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1990T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1991T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="W" CabinClass="Economy" FareInfoRef="2013T" SegmentRef="2932T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="W" CabinClass="Economy" FareInfoRef="2013T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1990T" SegmentRef="2915T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="1991T" SegmentRef="2917T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP175.30" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 545.00WLE0IGM2 CA BJS 250.48VOWSG CA WAS Q180.86 535.00QXOWU NUC1511.34END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2018T" TotalPrice="GBP1276.60" BasePrice="USD1511.00" ApproximateTotalPrice="GBP1276.60" ApproximateBasePrice="GBP930.00" EquivalentBasePrice="GBP930.00" Taxes="GBP346.60">
        <air:Journey TravelTime="P0DT23H45M0S">
          <air:AirSegmentRef Key="2936T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H20M0S">
          <air:AirSegmentRef Key="2915T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2917T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2019T" TotalPrice="GBP1276.60" BasePrice="USD1511.00" ApproximateTotalPrice="GBP1276.60" ApproximateBasePrice="GBP930.00" EquivalentBasePrice="GBP930.00" Taxes="GBP346.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="2013T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1990T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1991T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="W" CabinClass="Economy" FareInfoRef="2013T" SegmentRef="2936T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="W" CabinClass="Economy" FareInfoRef="2013T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1990T" SegmentRef="2915T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="1991T" SegmentRef="2917T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP175.30" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS UA X/TYO UA SIN 545.00WLE0IGM2 CA BJS 250.48VOWSG CA WAS Q180.86 535.00QXOWU NUC1511.34END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2038T" TotalPrice="GBP1286.10" BasePrice="USD1511.00" ApproximateTotalPrice="GBP1286.10" ApproximateBasePrice="GBP930.00" EquivalentBasePrice="GBP930.00" Taxes="GBP356.10">
        <air:Journey TravelTime="P0DT23H50M0S">
          <air:AirSegmentRef Key="2886T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT2H20M0S">
          <air:AirSegmentRef Key="2915T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2917T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2039T" TotalPrice="GBP1286.10" BasePrice="USD1511.00" ApproximateTotalPrice="GBP1286.10" ApproximateBasePrice="GBP930.00" EquivalentBasePrice="GBP930.00" Taxes="GBP356.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="2013T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1990T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1991T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="W" CabinClass="Economy" FareInfoRef="2013T" SegmentRef="2886T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="V" CabinClass="Economy" FareInfoRef="1990T" SegmentRef="2915T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="1991T" SegmentRef="2917T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP184.80" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS UA SIN 545.00WLE0IGM2 CA BJS 250.48VOWSG CA WAS Q180.86 535.00QXOWU NUC1511.34END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="1" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2057T" TotalPrice="GBP1414.00" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.00" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.00">
        <air:Journey TravelTime="P0DT22H0M0S">
          <air:AirSegmentRef Key="2988T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2990T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT23H25M0S">
          <air:AirSegmentRef Key="2978T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2058T" TotalPrice="GBP1414.00" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.00" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.00" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="EK" ProviderCode="1G">
          <air:FareInfoRef Key="2068T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2070T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2988T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2990T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2978T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:FareCalc>WAS EK X/DXB EK SIN Q WASSIN344.00 760.00ELX1YUS1 EK X/DXB EK WAS Q SINWAS344.00 760.00ELX1YUS1 NUC2208.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2076T" TotalPrice="GBP1414.80" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.80" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.80">
        <air:Journey TravelTime="P0DT22H0M0S">
          <air:AirSegmentRef Key="2988T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2990T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT10H15M0S">
          <air:AirSegmentRef Key="2984T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2077T" TotalPrice="GBP1414.80" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.80" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.80" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="EK" ProviderCode="1G">
          <air:FareInfoRef Key="2068T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2070T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2988T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2990T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2984T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:FareCalc>WAS EK X/DXB EK SIN Q WASSIN344.00 760.00ELX1YUS1 EK X/DXB EK WAS Q SINWAS344.00 760.00ELX1YUS1 NUC2208.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2092T" TotalPrice="GBP1414.80" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.80" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.80">
        <air:Journey TravelTime="P0DT22H0M0S">
          <air:AirSegmentRef Key="2988T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2990T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT11H15M0S">
          <air:AirSegmentRef Key="2986T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2093T" TotalPrice="GBP1414.80" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.80" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.80" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="EK" ProviderCode="1G">
          <air:FareInfoRef Key="2068T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2070T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2988T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2990T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2986T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:FareCalc>WAS EK X/DXB EK SIN Q WASSIN344.00 760.00ELX1YUS1 EK X/DXB EK WAS Q SINWAS344.00 760.00ELX1YUS1 NUC2208.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2108T" TotalPrice="GBP1414.80" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.80" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.80">
        <air:Journey TravelTime="P1DT10H5M0S">
          <air:AirSegmentRef Key="2988T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2992T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT23H25M0S">
          <air:AirSegmentRef Key="2978T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2109T" TotalPrice="GBP1414.80" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.80" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.80" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="EK" ProviderCode="1G">
          <air:FareInfoRef Key="2068T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2070T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2988T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2992T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2978T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:FareCalc>WAS EK X/DXB EK SIN Q WASSIN344.00 760.00ELX1YUS1 EK X/DXB EK WAS Q SINWAS344.00 760.00ELX1YUS1 NUC2208.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2124T" TotalPrice="GBP1414.80" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.80" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.80">
        <air:Journey TravelTime="P1DT15H10M0S">
          <air:AirSegmentRef Key="2988T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2994T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT23H25M0S">
          <air:AirSegmentRef Key="2978T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2125T" TotalPrice="GBP1414.80" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1414.80" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP55.80" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="EK" ProviderCode="1G">
          <air:FareInfoRef Key="2068T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2070T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2988T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2994T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2978T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:FareCalc>WAS EK X/DXB EK SIN Q WASSIN344.00 760.00ELX1YUS1 EK X/DXB EK WAS Q SINWAS344.00 760.00ELX1YUS1 NUC2208.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2140T" TotalPrice="GBP1415.60" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1415.60" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP56.60">
        <air:Journey TravelTime="P1DT10H5M0S">
          <air:AirSegmentRef Key="2988T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2992T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT10H15M0S">
          <air:AirSegmentRef Key="2984T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2141T" TotalPrice="GBP1415.60" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1415.60" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP56.60" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="EK" ProviderCode="1G">
          <air:FareInfoRef Key="2068T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2070T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2988T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2992T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2984T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP1.60" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:FareCalc>WAS EK X/DXB EK SIN Q WASSIN344.00 760.00ELX1YUS1 EK X/DXB EK WAS Q SINWAS344.00 760.00ELX1YUS1 NUC2208.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2156T" TotalPrice="GBP1415.60" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1415.60" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP56.60">
        <air:Journey TravelTime="P1DT10H5M0S">
          <air:AirSegmentRef Key="2988T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2992T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT11H15M0S">
          <air:AirSegmentRef Key="2986T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2157T" TotalPrice="GBP1415.60" BasePrice="USD2208.00" ApproximateTotalPrice="GBP1415.60" ApproximateBasePrice="GBP1359.00" EquivalentBasePrice="GBP1359.00" Taxes="GBP56.60" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="EK" ProviderCode="1G">
          <air:FareInfoRef Key="2068T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2070T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2988T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2068T" SegmentRef="2992T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2986T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="E" CabinClass="Economy" FareInfoRef="2070T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP1.60" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:FareCalc>WAS EK X/DXB EK SIN Q WASSIN344.00 760.00ELX1YUS1 EK X/DXB EK WAS Q SINWAS344.00 760.00ELX1YUS1 NUC2208.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2172T" TotalPrice="GBP1542.20" BasePrice="USD1862.00" ApproximateTotalPrice="GBP1542.20" ApproximateBasePrice="GBP1146.00" EquivalentBasePrice="GBP1146.00" Taxes="GBP396.20">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT23H25M0S">
          <air:AirSegmentRef Key="2978T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2173T" TotalPrice="GBP1542.20" BasePrice="USD1862.00" ApproximateTotalPrice="GBP1542.20" ApproximateBasePrice="GBP1146.00" EquivalentBasePrice="GBP1146.00" Taxes="GBP396.20" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="1965T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1967T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1843T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="1965T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2978T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP332.40" ></air:TaxInfo>
          <air:FareCalc>WAS UA EWR Q46.51 546.98YUA UA X/TYO UA SIN 433.00LLE0OBM2 EK X/DXB EK WAS Q SINWAS344.00 492.00ULOWUS1 NUC1862.49END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2191T" TotalPrice="GBP1543.00" BasePrice="USD1862.00" ApproximateTotalPrice="GBP1543.00" ApproximateBasePrice="GBP1146.00" EquivalentBasePrice="GBP1146.00" Taxes="GBP397.00">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT10H15M0S">
          <air:AirSegmentRef Key="2984T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2192T" TotalPrice="GBP1543.00" BasePrice="USD1862.00" ApproximateTotalPrice="GBP1543.00" ApproximateBasePrice="GBP1146.00" EquivalentBasePrice="GBP1146.00" Taxes="GBP397.00" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="1965T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1967T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1843T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="1965T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2984T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP332.40" ></air:TaxInfo>
          <air:FareCalc>WAS UA EWR Q46.51 546.98YUA UA X/TYO UA SIN 433.00LLE0OBM2 EK X/DXB EK WAS Q SINWAS344.00 492.00ULOWUS1 NUC1862.49END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2211T" TotalPrice="GBP1543.00" BasePrice="USD1862.00" ApproximateTotalPrice="GBP1543.00" ApproximateBasePrice="GBP1146.00" EquivalentBasePrice="GBP1146.00" Taxes="GBP397.00">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT11H15M0S">
          <air:AirSegmentRef Key="2986T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2980T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2212T" TotalPrice="GBP1543.00" BasePrice="USD1862.00" ApproximateTotalPrice="GBP1543.00" ApproximateBasePrice="GBP1146.00" EquivalentBasePrice="GBP1146.00" Taxes="GBP397.00" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="1965T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1967T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1843T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="1965T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2986T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1843T" SegmentRef="2980T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="ZR" Amount="GBP0.80" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP332.40" ></air:TaxInfo>
          <air:FareCalc>WAS UA EWR Q46.51 546.98YUA UA X/TYO UA SIN 433.00LLE0OBM2 EK X/DXB EK WAS Q SINWAS344.00 492.00ULOWUS1 NUC1862.49END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2231T" TotalPrice="GBP1629.20" BasePrice="USD2534.00" ApproximateTotalPrice="GBP1629.20" ApproximateBasePrice="GBP1560.00" EquivalentBasePrice="GBP1560.00" Taxes="GBP69.20">
        <air:Journey TravelTime="P0DT22H15M0S">
          <air:AirSegmentRef Key="2996T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2998T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT0H40M0S">
          <air:AirSegmentRef Key="3000T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="3002T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2232T" TotalPrice="GBP1629.20" BasePrice="USD2534.00" ApproximateTotalPrice="GBP1629.20" ApproximateBasePrice="GBP1560.00" EquivalentBasePrice="GBP1560.00" Taxes="GBP69.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="HR" ProviderCode="1G">
          <air:FareInfoRef Key="2244T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2245T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2244T" SegmentRef="2996T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2244T" SegmentRef="2998T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2245T" SegmentRef="3000T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2245T" SegmentRef="3002T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="BP" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.40" ></air:TaxInfo>
          <air:FareCalc>WAS KE X/SEL Q287.00 KE SIN 980.00HLWEUS3 KE X/SEL KE WAS Q287.00 980.00HLWEUS3 NUC2534.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:CancelPenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2251T" TotalPrice="GBP1629.20" BasePrice="USD2534.00" ApproximateTotalPrice="GBP1629.20" ApproximateBasePrice="GBP1560.00" EquivalentBasePrice="GBP1560.00" Taxes="GBP69.20">
        <air:Journey TravelTime="P0DT22H15M0S">
          <air:AirSegmentRef Key="2996T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2998T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT22H5M0S">
          <air:AirSegmentRef Key="3004T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="3006T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2252T" TotalPrice="GBP1629.20" BasePrice="USD2534.00" ApproximateTotalPrice="GBP1629.20" ApproximateBasePrice="GBP1560.00" EquivalentBasePrice="GBP1560.00" Taxes="GBP69.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" Refundable="true" ETicketability="Yes" PlatingCarrier="HR" ProviderCode="1G">
          <air:FareInfoRef Key="2244T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2245T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2244T" SegmentRef="2996T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2244T" SegmentRef="2998T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2245T" SegmentRef="3004T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2245T" SegmentRef="3006T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="BP" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.40" ></air:TaxInfo>
          <air:FareCalc>WAS KE X/SEL Q287.00 KE SIN 980.00HLWEUS3 KE X/SEL KE WAS Q287.00 980.00HLWEUS3 NUC2534.00END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:CancelPenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:CancelPenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2268T" TotalPrice="GBP1802.20" BasePrice="USD2495.00" ApproximateTotalPrice="GBP1802.20" ApproximateBasePrice="GBP1536.00" EquivalentBasePrice="GBP1536.00" Taxes="GBP266.20">
        <air:Journey TravelTime="P0DT23H47M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2913T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2269T" TotalPrice="GBP1802.20" BasePrice="USD2495.00" ApproximateTotalPrice="GBP1802.20" ApproximateBasePrice="GBP1536.00" EquivalentBasePrice="GBP1536.00" Taxes="GBP266.20" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2284T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2913T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2284T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2284T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP89.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU JL X/TYO AA WAS Q272.20M1376.00HLX0R2B1 NUC2494.96END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP92.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2291T" TotalPrice="GBP1802.20" BasePrice="USD2495.00" ApproximateTotalPrice="GBP1802.20" ApproximateBasePrice="GBP1536.00" EquivalentBasePrice="GBP1536.00" Taxes="GBP266.20">
        <air:Journey TravelTime="P1DT8H32M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2982T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2292T" TotalPrice="GBP1802.20" BasePrice="USD2495.00" ApproximateTotalPrice="GBP1802.20" ApproximateBasePrice="GBP1536.00" EquivalentBasePrice="GBP1536.00" Taxes="GBP266.20" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2284T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2982T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2284T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2284T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP89.00" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU JL X/TYO AA WAS Q272.20M1376.00HLX0R2B1 NUC2494.96END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP92.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2312T" TotalPrice="GBP1884.10" BasePrice="USD2680.00" ApproximateTotalPrice="GBP1884.10" ApproximateBasePrice="GBP1650.00" EquivalentBasePrice="GBP1650.00" Taxes="GBP234.10">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2313T" TotalPrice="GBP1884.10" BasePrice="USD2680.00" ApproximateTotalPrice="GBP1884.10" ApproximateBasePrice="GBP1650.00" EquivalentBasePrice="GBP1650.00" Taxes="GBP234.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="1965T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1967T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2326T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="1965T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2326T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2326T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP170.30" ></air:TaxInfo>
          <air:FareCalc>WAS UA EWR Q46.51 546.98YUA UA X/TYO UA SIN 433.00LLE0OBM2 AA X/HKG AA(PA) WAS Q5.80Q272.20M1376.00HLX0R2B1 NUC2680.49END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2334T" TotalPrice="GBP1887.50" BasePrice="USD2680.00" ApproximateTotalPrice="GBP1887.50" ApproximateBasePrice="GBP1650.00" EquivalentBasePrice="GBP1650.00" Taxes="GBP237.50">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2335T" TotalPrice="GBP1887.50" BasePrice="USD2680.00" ApproximateTotalPrice="GBP1887.50" ApproximateBasePrice="GBP1650.00" EquivalentBasePrice="GBP1650.00" Taxes="GBP237.50" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="1965T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1967T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2348T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="1965T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2348T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2348T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2348T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP170.30" ></air:TaxInfo>
          <air:FareCalc>WAS UA EWR Q46.51 546.98YUA UA X/TYO UA SIN 433.00LLE0OBM2 AA X/HKG AA X/DFW Q5.80Q272.20 AA WAS M1376.00HLX0R2B1 NUC2680.49END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2355T" TotalPrice="GBP1979.80" BasePrice="USD2675.00" ApproximateTotalPrice="GBP1979.80" ApproximateBasePrice="GBP1647.00" EquivalentBasePrice="GBP1647.00" Taxes="GBP332.80">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2356T" TotalPrice="GBP1979.80" BasePrice="USD2675.00" ApproximateTotalPrice="GBP1979.80" ApproximateBasePrice="GBP1647.00" EquivalentBasePrice="GBP1647.00" Taxes="GBP332.80" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="UA" ProviderCode="1G">
          <air:FareInfoRef Key="1965T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1967T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2284T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="1965T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2284T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="H" CabinClass="Economy" FareInfoRef="2284T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="EWR" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP254.30" ></air:TaxInfo>
          <air:FareCalc>WAS UA EWR Q46.51 546.98YUA UA X/TYO UA SIN 433.00LLE0OBM2 JL X/TYO AA WAS Q272.20M1376.00HLX0R2B1 NUC2674.69END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP184.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2374T" TotalPrice="GBP2462.60" BasePrice="USD3437.00" ApproximateTotalPrice="GBP2462.60" ApproximateBasePrice="GBP2116.00" EquivalentBasePrice="GBP2116.00" Taxes="GBP346.60">
        <air:Journey TravelTime="P0DT23H47M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2913T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2889T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2891T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2375T" TotalPrice="GBP2462.60" BasePrice="USD3437.00" ApproximateTotalPrice="GBP2462.60" ApproximateBasePrice="GBP2116.00" EquivalentBasePrice="GBP2116.00" Taxes="GBP346.60" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2390T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2913T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="B" CabinClass="Economy" FareInfoRef="2390T" SegmentRef="2889T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="B" CabinClass="Economy" FareInfoRef="2390T" SegmentRef="2891T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP175.30" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU UA X/TYO UA WAS M2590.00B1RMA NUC3436.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP92.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2396T" TotalPrice="GBP2466.20" BasePrice="USD3437.00" ApproximateTotalPrice="GBP2466.20" ApproximateBasePrice="GBP2116.00" EquivalentBasePrice="GBP2116.00" Taxes="GBP350.20">
        <air:Journey TravelTime="P0DT23H47M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2913T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H30M0S">
          <air:AirSegmentRef Key="2903T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2397T" TotalPrice="GBP2466.20" BasePrice="USD3437.00" ApproximateTotalPrice="GBP2466.20" ApproximateBasePrice="GBP2116.00" EquivalentBasePrice="GBP2116.00" Taxes="GBP350.20" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2390T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2913T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="B" CabinClass="Economy" FareInfoRef="2390T" SegmentRef="2903T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="B" CabinClass="Economy" FareInfoRef="2390T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP178.90" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU NH X/TYO NH WAS M2590.00B1RMA NUC3436.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP92.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2417T" TotalPrice="GBP2466.20" BasePrice="USD3437.00" ApproximateTotalPrice="GBP2466.20" ApproximateBasePrice="GBP2116.00" EquivalentBasePrice="GBP2116.00" Taxes="GBP350.20">
        <air:Journey TravelTime="P0DT23H47M0S">
          <air:AirSegmentRef Key="2909T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2911T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2913T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P0DT21H40M0S">
          <air:AirSegmentRef Key="2905T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2904T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2418T" TotalPrice="GBP2466.20" BasePrice="USD3437.00" ApproximateTotalPrice="GBP2466.20" ApproximateBasePrice="GBP2116.00" EquivalentBasePrice="GBP2116.00" Taxes="GBP350.20" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="CA" ProviderCode="1G">
          <air:FareInfoRef Key="417T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1842T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2390T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="R" CabinClass="Economy" FareInfoRef="417T" SegmentRef="2909T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2911T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1842T" SegmentRef="2913T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="B" CabinClass="Economy" FareInfoRef="2390T" SegmentRef="2905T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="B" CabinClass="Economy" FareInfoRef="2390T" SegmentRef="2904T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80">
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="CN" Amount="GBP9.00" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP178.90" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP98.50" ></air:TaxInfo>
          <air:FareCalc>WAS B6 NYC 161.76RH00AE2U CA X/BJS CA SIN 685.00LLOIU NH X/TYO NH WAS M2590.00B1RMA NUC3436.76END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP92.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2438T" TotalPrice="GBP2869.40" BasePrice="USD4008.00" ApproximateTotalPrice="GBP2869.40" ApproximateBasePrice="GBP2467.00" EquivalentBasePrice="GBP2467.00" Taxes="GBP402.40">
        <air:Journey TravelTime="P0DT22H0M0S">
          <air:AirSegmentRef Key="2988T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2990T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT13H15M0S">
          <air:AirSegmentRef Key="2893T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2895T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2897T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2439T" TotalPrice="GBP2869.40" BasePrice="USD4008.00" ApproximateTotalPrice="GBP2869.40" ApproximateBasePrice="GBP2467.00" EquivalentBasePrice="GBP2467.00" Taxes="GBP402.40" LatestTicketingTime="2014-10-18T23:59:00.000+00:00" PricingMethod="Guaranteed" ETicketability="Yes" PlatingCarrier="EK" ProviderCode="1G">
          <air:FareInfoRef Key="1988T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2452T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2453T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1988T" SegmentRef="2988T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="U" CabinClass="Economy" FareInfoRef="1988T" SegmentRef="2990T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="B" CabinClass="Economy" FareInfoRef="2452T" SegmentRef="2893T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="B" CabinClass="Economy" FareInfoRef="2452T" SegmentRef="2895T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2453T" SegmentRef="2897T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP5.60">
            <air:TaxDetail Amount="USD4.50" OriginAirport="IAD" ></air:TaxDetail>
            <air:TaxDetail Amount="USD4.50" OriginAirport="JFK" ></air:TaxDetail>
          </air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP332.40" ></air:TaxInfo>
          <air:FareCalc>WAS EK X/DXB EK SIN Q WASSIN344.00 492.00ULOWUS1 UA X/TYO UA NYC M2625.00B1RMA UA WAS Q46.51 500.47YUA NUC4007.98END ROE1.0</air:FareCalc>
          <air:PassengerType Code="ADT" ></air:PassengerType>
          <air:ChangePenalty>
            <air:Amount>GBP123.00</air:Amount>
          </air:ChangePenalty>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection StopOver="true" SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2460T" TotalPrice="GBP10082.20" BasePrice="USD15744.00" ApproximateTotalPrice="GBP10082.20" ApproximateBasePrice="GBP9692.00" EquivalentBasePrice="GBP9692.00" Taxes="GBP390.20">
        <air:Journey TravelTime="P1DT3H25M0S">
          <air:AirSegmentRef Key="2853T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2461T" TotalPrice="GBP10082.20" BasePrice="USD15744.00" ApproximateTotalPrice="GBP10082.20" ApproximateBasePrice="GBP9692.00" EquivalentBasePrice="GBP9692.00" Taxes="GBP390.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2472T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2473T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2472T" SegmentRef="2853T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2472T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2478T" TotalPrice="GBP10082.20" BasePrice="USD15744.00" ApproximateTotalPrice="GBP10082.20" ApproximateBasePrice="GBP9692.00" EquivalentBasePrice="GBP9692.00" Taxes="GBP390.20">
        <air:Journey TravelTime="P1DT5H50M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2865T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2479T" TotalPrice="GBP10082.20" BasePrice="USD15744.00" ApproximateTotalPrice="GBP10082.20" ApproximateBasePrice="GBP9692.00" EquivalentBasePrice="GBP9692.00" Taxes="GBP390.20" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2490T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2473T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2865T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2496T" TotalPrice="GBP10085.60" BasePrice="USD15744.00" ApproximateTotalPrice="GBP10085.60" ApproximateBasePrice="GBP9692.00" EquivalentBasePrice="GBP9692.00" Taxes="GBP393.60">
        <air:Journey TravelTime="P1DT3H25M0S">
          <air:AirSegmentRef Key="2853T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2497T" TotalPrice="GBP10085.60" BasePrice="USD15744.00" ApproximateTotalPrice="GBP10085.60" ApproximateBasePrice="GBP9692.00" EquivalentBasePrice="GBP9692.00" Taxes="GBP393.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2472T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2508T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2472T" SegmentRef="2853T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2472T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2514T" TotalPrice="GBP10085.60" BasePrice="USD15744.00" ApproximateTotalPrice="GBP10085.60" ApproximateBasePrice="GBP9692.00" EquivalentBasePrice="GBP9692.00" Taxes="GBP393.60">
        <air:Journey TravelTime="P1DT5H50M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2865T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2515T" TotalPrice="GBP10085.60" BasePrice="USD15744.00" ApproximateTotalPrice="GBP10085.60" ApproximateBasePrice="GBP9692.00" EquivalentBasePrice="GBP9692.00" Taxes="GBP393.60" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2490T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2508T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2865T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2532T" TotalPrice="GBP10087.00" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10087.00" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP399.00">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2871T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2873T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2533T" TotalPrice="GBP10087.00" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10087.00" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP399.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2546T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2473T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2546T" SegmentRef="2871T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2546T" SegmentRef="2873T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2546T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2552T" TotalPrice="GBP10087.00" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10087.00" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP399.00">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2877T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2553T" TotalPrice="GBP10087.00" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10087.00" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP399.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2566T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2473T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2877T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2572T" TotalPrice="GBP10087.00" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10087.00" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP399.00">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2879T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2573T" TotalPrice="GBP10087.00" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10087.00" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP399.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2566T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2473T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2879T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2591T" TotalPrice="GBP10090.40" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10090.40" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP402.40">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2871T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2873T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2592T" TotalPrice="GBP10090.40" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10090.40" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP402.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2546T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2508T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2546T" SegmentRef="2871T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2546T" SegmentRef="2873T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2546T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2611T" TotalPrice="GBP10090.40" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10090.40" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP402.40">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2877T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2612T" TotalPrice="GBP10090.40" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10090.40" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP402.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2566T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2508T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2877T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2631T" TotalPrice="GBP10090.40" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10090.40" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP402.40">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2879T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT3H35M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2867T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2869T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2632T" TotalPrice="GBP10090.40" BasePrice="USD15738.00" ApproximateTotalPrice="GBP10090.40" ApproximateBasePrice="GBP9688.00" EquivalentBasePrice="GBP9688.00" Taxes="GBP402.40" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2566T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2508T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2879T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2867T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2508T" SegmentRef="2869T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2651T" TotalPrice="GBP5615.90" BasePrice="USD8461.00" ApproximateTotalPrice="GBP5615.90" ApproximateBasePrice="GBP5209.00" EquivalentBasePrice="GBP5209.00" Taxes="GBP406.90">
        <air:Journey TravelTime="P1DT3H25M0S">
          <air:AirSegmentRef Key="2853T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2652T" TotalPrice="GBP5615.90" BasePrice="USD8461.00" ApproximateTotalPrice="GBP5615.90" ApproximateBasePrice="GBP5209.00" EquivalentBasePrice="GBP5209.00" Taxes="GBP406.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2472T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2472T" SegmentRef="2853T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2472T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.00" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="2" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2670T" TotalPrice="GBP5615.90" BasePrice="USD8461.00" ApproximateTotalPrice="GBP5615.90" ApproximateBasePrice="GBP5209.00" EquivalentBasePrice="GBP5209.00" Taxes="GBP406.90">
        <air:Journey TravelTime="P1DT5H50M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2865T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2671T" TotalPrice="GBP5615.90" BasePrice="USD8461.00" ApproximateTotalPrice="GBP5615.90" ApproximateBasePrice="GBP5209.00" EquivalentBasePrice="GBP5209.00" Taxes="GBP406.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2490T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2865T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.00" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2690T" TotalPrice="GBP5620.70" BasePrice="USD8455.00" ApproximateTotalPrice="GBP5620.70" ApproximateBasePrice="GBP5205.00" EquivalentBasePrice="GBP5205.00" Taxes="GBP415.70">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2877T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2691T" TotalPrice="GBP5620.70" BasePrice="USD8455.00" ApproximateTotalPrice="GBP5620.70" ApproximateBasePrice="GBP5205.00" EquivalentBasePrice="GBP5205.00" Taxes="GBP415.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2566T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2877T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.00" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2710T" TotalPrice="GBP5620.70" BasePrice="USD8455.00" ApproximateTotalPrice="GBP5620.70" ApproximateBasePrice="GBP5205.00" EquivalentBasePrice="GBP5205.00" Taxes="GBP415.70">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2879T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT4H25M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2883T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2711T" TotalPrice="GBP5620.70" BasePrice="USD8455.00" ApproximateTotalPrice="GBP5620.70" ApproximateBasePrice="GBP5205.00" EquivalentBasePrice="GBP5205.00" Taxes="GBP415.70" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2566T" ></air:FareInfoRef>
          <air:FareInfoRef Key="211T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2879T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="211T" SegmentRef="2883T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP335.20" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP2.00" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2730T" TotalPrice="GBP5350.00" BasePrice="USD8036.00" ApproximateTotalPrice="GBP5350.00" ApproximateBasePrice="GBP4947.00" EquivalentBasePrice="GBP4947.00" Taxes="GBP403.00">
        <air:Journey TravelTime="P1DT0H55M0S">
          <air:AirSegmentRef Key="2919T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2920T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2731T" TotalPrice="GBP5350.00" BasePrice="USD8036.00" ApproximateTotalPrice="GBP5350.00" ApproximateBasePrice="GBP4947.00" EquivalentBasePrice="GBP4947.00" Taxes="GBP403.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="440T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2473T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2919T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2920T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="440T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP171.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2750T" TotalPrice="GBP5350.00" BasePrice="USD8036.00" ApproximateTotalPrice="GBP5350.00" ApproximateBasePrice="GBP4947.00" EquivalentBasePrice="GBP4947.00" Taxes="GBP403.00">
        <air:Journey TravelTime="P1DT3H55M0S">
          <air:AirSegmentRef Key="2922T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2924T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2921T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2751T" TotalPrice="GBP5350.00" BasePrice="USD8036.00" ApproximateTotalPrice="GBP5350.00" ApproximateBasePrice="GBP4947.00" EquivalentBasePrice="GBP4947.00" Taxes="GBP403.00" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="461T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2473T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2922T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2924T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="461T" SegmentRef="2921T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2473T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP171.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2770T" TotalPrice="GBP5659.10" BasePrice="USD8536.00" ApproximateTotalPrice="GBP5659.10" ApproximateBasePrice="GBP5255.00" EquivalentBasePrice="GBP5255.00" Taxes="GBP404.10">
        <air:Journey TravelTime="P1DT5H50M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2865T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2856T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT9H18M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2930T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2771T" TotalPrice="GBP5659.10" BasePrice="USD8536.00" ApproximateTotalPrice="GBP5659.10" ApproximateBasePrice="GBP5255.00" EquivalentBasePrice="GBP5255.00" Taxes="GBP404.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2490T" ></air:FareInfoRef>
          <air:FareInfoRef Key="528T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2865T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2490T" SegmentRef="2856T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2930T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP11.80" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2791T" TotalPrice="GBP5663.90" BasePrice="USD8530.00" ApproximateTotalPrice="GBP5663.90" ApproximateBasePrice="GBP5251.00" EquivalentBasePrice="GBP5251.00" Taxes="GBP412.90">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2877T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT9H18M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2930T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2792T" TotalPrice="GBP5663.90" BasePrice="USD8530.00" ApproximateTotalPrice="GBP5663.90" ApproximateBasePrice="GBP5251.00" EquivalentBasePrice="GBP5251.00" Taxes="GBP412.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2566T" ></air:FareInfoRef>
          <air:FareInfoRef Key="528T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2877T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2930T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2812T" TotalPrice="GBP5663.90" BasePrice="USD8530.00" ApproximateTotalPrice="GBP5663.90" ApproximateBasePrice="GBP5251.00" EquivalentBasePrice="GBP5251.00" Taxes="GBP412.90">
        <air:Journey TravelTime="P1DT6H5M0S">
          <air:AirSegmentRef Key="2863T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2879T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2875T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT9H18M0S">
          <air:AirSegmentRef Key="2881T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2926T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2930T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2813T" TotalPrice="GBP5663.90" BasePrice="USD8530.00" ApproximateTotalPrice="GBP5663.90" ApproximateBasePrice="GBP5251.00" EquivalentBasePrice="GBP5251.00" Taxes="GBP412.90" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="2566T" ></air:FareInfoRef>
          <air:FareInfoRef Key="528T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2863T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2879T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2566T" SegmentRef="2875T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2881T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2926T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="N" CabinClass="Economy" FareInfoRef="528T" SegmentRef="2930T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP6.80" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP5.80" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP17.70" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YR" Amount="GBP167.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP163.40" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
        <air:Connection SegmentIndex="4" ></air:Connection>
      </air:AirPricingSolution>
      <air:AirPricingSolution Key="2833T" TotalPrice="GBP6529.10" BasePrice="USD10226.00" ApproximateTotalPrice="GBP6529.10" ApproximateBasePrice="GBP6295.00" EquivalentBasePrice="GBP6295.00" Taxes="GBP234.10">
        <air:Journey TravelTime="P1DT4H6M0S">
          <air:AirSegmentRef Key="2937T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2939T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2934T" ></air:AirSegmentRef>
        </air:Journey>
        <air:Journey TravelTime="P1DT1H45M0S">
          <air:AirSegmentRef Key="2858T" ></air:AirSegmentRef>
          <air:AirSegmentRef Key="2860T" ></air:AirSegmentRef>
        </air:Journey>
        <air:LegRef Key="1T" ></air:LegRef>
        <air:LegRef Key="2T" ></air:LegRef>
        <air:AirPricingInfo Key="2834T" TotalPrice="GBP6529.10" BasePrice="USD10226.00" ApproximateTotalPrice="GBP6529.10" ApproximateBasePrice="GBP6295.00" EquivalentBasePrice="GBP6295.00" Taxes="GBP234.10" LatestTicketingTime="2014-10-19T23:59:00.000+00:00" PricingMethod="Guaranteed" ProviderCode="1G">
          <air:FareInfoRef Key="1965T" ></air:FareInfoRef>
          <air:FareInfoRef Key="1967T" ></air:FareInfoRef>
          <air:FareInfoRef Key="2847T" ></air:FareInfoRef>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="1965T" SegmentRef="2937T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2939T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="L" CabinClass="Economy" FareInfoRef="1967T" SegmentRef="2934T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2847T" SegmentRef="2858T" ></air:BookingInfo>
          <air:BookingInfo BookingCode="Y" CabinClass="Economy" FareInfoRef="2847T" SegmentRef="2860T" ></air:BookingInfo>
          <air:TaxInfo Category="AY" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="US" Amount="GBP21.60" ></air:TaxInfo>
          <air:TaxInfo Category="XA" Amount="GBP3.10" ></air:TaxInfo>
          <air:TaxInfo Category="XF" Amount="GBP2.80" ></air:TaxInfo>
          <air:TaxInfo Category="XY" Amount="GBP4.30" ></air:TaxInfo>
          <air:TaxInfo Category="YC" Amount="GBP3.40" ></air:TaxInfo>
          <air:TaxInfo Category="OI" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SW" Amount="GBP5.90" ></air:TaxInfo>
          <air:TaxInfo Category="OO" Amount="GBP3.90" ></air:TaxInfo>
          <air:TaxInfo Category="OP" Amount="GBP2.90" ></air:TaxInfo>
          <air:TaxInfo Category="SG" Amount="GBP9.60" ></air:TaxInfo>
          <air:TaxInfo Category="YQ" Amount="GBP170.30" ></air:TaxInfo>
          <air:PassengerType Code="ADT" ></air:PassengerType>
        </air:AirPricingInfo>
        <air:Connection StopOver="true" SegmentIndex="0" ></air:Connection>
        <air:Connection SegmentIndex="1" ></air:Connection>
        <air:Connection SegmentIndex="3" ></air:Connection>
      </air:AirPricingSolution>
    </air:LowFareSearchRsp>
  </SOAP:Body>
</SOAP:Envelope>
EOM;
        //$result = curl_getinfo($soap_do);
        $result = curl_multi_getcontent($soap_do);
//	
// Official PHP CURL manual; http://php.net/manual/en/book.curl.php
//
        return $return;
    }
}
