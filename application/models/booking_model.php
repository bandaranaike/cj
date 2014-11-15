<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of booking_model
 *
 * @author Eranda Bandaranaike
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
        return $this->get_flight_pricing();
    }

    public function booking_flights() {

        $person_tile = $this->input->post('person_tile');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $date_of_birth = $this->input->post('date_of_birth');
        $mobile_number = $this->input->post('mobile_number');
        $flight_selected = $this->input->post('flight_selected');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //$this->form_validation->set_rules('flight_selected', "Flight", "required");
        $this->form_validation->set_rules('first_name', "First name", "required");
        $this->form_validation->set_rules('last_name', "Last name", "required");
        $this->form_validation->set_rules('date_of_birth', "First name", "required");
        $this->form_validation->set_rules('mobile_number', "Phone number", "required");
        // $this->form_validation->set_rules('flight_selected', "Flight", "required");
        $this->form_validation->set_rules('email', "Email", "required");
        $this->form_validation->set_rules('password', "Password", "required");

        if ($this->form_validation->run() == TRUE) {
            $data = array(
                'person_tile' => $person_tile,
                'first_name' => $first_name,
                'last_name' => $last_name,
                'date_of_birth' => $date_of_birth,
                'mobile_number' => $mobile_number,
                'flight_selected' => $flight_selected,
                'email' => $email,
                'password' => $password
            );
            return $data;
        }
    }

    public function send_booking_request() {

        $person_tile = $this->input->post('person_tile');
        $first_name = $this->input->post('first_name');
        $last_name = $this->input->post('last_name');
        $date_of_birth = $this->input->post('date_of_birth');
        $mobile_number = $this->input->post('mobile_number');
        $flight_selected = $this->input->post('flight_selected');
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        //$this->form_validation->set_rules('flight_selected', "Flight", "required");
        $this->form_validation->set_rules('first_name', "First name", "required");
        $this->form_validation->set_rules('last_name', "Last name", "required");
        $this->form_validation->set_rules('date_of_birth', "Date of birth", "required");
        $this->form_validation->set_rules('mobile_number', "Phone number", "required");
        //$this->form_validation->set_rules('flight_selected', "Flight", "required");
        $this->form_validation->set_rules('email', "Email", "required");
        $this->form_validation->set_rules('password', "Password", "required");
        $user = array();
        if ($this->form_validation->run() == TRUE) {
            $user = array(
                'first_name' => $first_name,
                'last_name' => $last_name,
                'phone' => $mobile_number,
                'email' => $email,
                'password' => $password
            );
            $this->ion_auth->register("eranda", $password, $email);
            return $user;
        } else {
            echo validation_errors();
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
        $username = 'Universal API/uAPI3328713833-136749ba';
        $user = "uAPI3328713833";
        $password = 'STKrWQeGkpfAeZRfTgFAg43gm';
        $targetBranch = 'P107488';
//        $USERNAME = 'Universal API/uAPI3862924803';
//        $PASSWORD = 'A4JGwQA9cbDTAdkCsWCpGEDe4';
//        $TARGETBRANCH = 'P105396';

        $startDate = date("Y-m-d", strtotime($start_date));
        $origin = $from_location; //'CDG';           // Origin City (CDG - Paris, France)
        $destination = $to_location; //'JFK';      // Destination City (JFK - New York City)
        $airline = 'DL';           // Preferred airline to perform the search (Delta Airlines)

        $message = <<<EOM
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">   
    <soapenv:Header/>   
    <soapenv:Body>      
        <univ:AirCreateReservationReq xmlns:univ="http://www.travelport.com/schema/universal_v26_0" AuthorizedBy="$user" RetainReservation="Both" TargetBranch="$targetBranch" TraceId="trace">         
            <com:BillingPointOfSaleInfo xmlns:com="http://www.travelport.com/schema/common_v26_0" OriginApplication="UAPI"/>         
            <com:BookingTraveler xmlns:com="http://www.travelport.com/schema/common_v26_0" DOB="1957-05-12" Gender="$gender" Key="$BookingTravelerKey" TravelerType="$travelTpe">            
                <com:BookingTravelerName First="$BookingTravelerFirstName" Last="$BookingTravelerLastName" Prefix="$BookingTravelerPrefix"/>            
                <com:DeliveryInfo>               
                    <com:ShippingAddress>                  
                        <com:AddressName>$DeliveryInfoAdressName</com:AddressName>                  
                        <com:Street>$DeliveryInfoStreet</com:Street>                  
                        <com:City>$DeliveryInfoCity</com:City>                  
                        <com:State>$DeliveryInfoState</com:State>                  
                        <com:PostalCode>$DeliveryInfoPostalCode</com:PostalCode>                  
                        <com:Country>$DeliveryInfoCountry</com:Country>               
                    </com:ShippingAddress>            
                </com:DeliveryInfo>            
                <com:PhoneNumber AreaCode="$DeliveryInfoPhoneNumberAreaCode" CountryCode="$DeliveryInfoPhoneNumberCountryCode" Location="$DeliveryInfoPhoneNumberLocation" Number="$DeliveryInfoPhoneNumber"/>            
                <com:Email EmailID="$DeliveryInfoEmailID" Type="$DeliveryInfoEmailType"/>            
                <com:Address>               
                    <com:AddressName>$AddressAdressName</com:AddressName>                  
                        <com:Street>$AddressStreet</com:Street>                  
                        <com:City>$AddressCity</com:City>                  
                        <com:State>$AddressState</com:State>                  
                        <com:PostalCode>$AddressPostalCode</com:PostalCode>                  
                        <com:Country>$AddressCountry</com:Country>             
                </com:Address>         
            </com:BookingTraveler>         
            <air:AirPricingSolution xmlns:air="http://www.travelport.com/schema/air_v26_0" ApproximateBasePrice="$ApproximateBasePrice" ApproximateTotalPrice="$ApproximateTotalPrice" BasePrice="$BasePrice" EquivalentBasePrice="$EquivalentBasePrice" Key="$AirPricingSolutionKey" Taxes="$Taxes" TotalPrice="$TotalPrice">            
                <air:AirSegment ArrivalTime="$ArrivalTime1" AvailabilitySource="Seamless" Carrier="$airSegCarrier" ChangeOfPlane="$changePlane" ClassOfService="$classOfService" DepartureTime="$departureTime" Destination="$destination" Distance="$distance" Equipment="$equipment" FlightNumber="$flightNumber" FlightTime="$flightTime" Group="$airSegGroup" Key="$airSegKey" LinkAvailability="$LinkAvailability" OptionalServicesIndicator="$OptionalServicesIndicator" Origin="$Origin" ParticipantLevel="$ParticipantLevel" PolledAvailabilityOption="Cached status used. Polled avail exists" ProviderCode="$ProviderCode" TravelTime="125">               
                    <air:CodeshareInfo OperatingCarrier="$OperatingCarrier" OperatingFlightNumber="$OperatingFlightNumber"/>               
                    <air:FlightDetails ArrivalTime="$ArrivalTime1" DepartureTime="2014-04-09T15:30:00.000+02:00" Destination="BCN" FlightTime="125" Key="ruU1rN17REeVdUlWzyVgDg==" Origin="MUC" TravelTime="125"/>            
                </air:AirSegment>            
                <air:AirSegment ArrivalTime="$ArrivalTime" AvailabilitySource="$AvailabilitySource" Carrier="$Carrier" ChangeOfPlane="$ChangeOfPlane" ClassOfService="$ClassOfService" DepartureTime="$DepartureTime" Destination="$Destination" Distance="$Distance" Equipment="$Equipment" FlightNumber="$FlightNumber" FlightTime="$FlightTime" Group="$Group" Key="$AirSegmentKey" LinkAvailability="$LinkAvailability" OptionalServicesIndicator="false" Origin="BCN" ParticipantLevel="Secure Sell" PolledAvailabilityOption="Cached status used. Polled avail exists" ProviderCode="1G" TravelTime="120">               
                    <air:CodeshareInfo OperatingCarrier="$OperatingCarrier" OperatingFlightNumber="$OperatingFlightNumber"/>               
                    <air:FlightDetails ArrivalTime="$ArrivalTime" DepartureTime="2014-04-18T07:55:00.000+02:00" Destination="MUC" FlightTime="120" Key="IEyyCKRkSrqbDt2imorsrA==" Origin="BCN" TravelTime="120"/>            
                </air:AirSegment>            
                <air:AirPricingInfo ApproximateBasePrice="AUD167.00" ApproximateTotalPrice="AUD330.50" BasePrice="EUR101.00" ETicketability="Yes" EquivalentBasePrice="AUD167.00" IncludesVAT="false" Key="on7u7b76SpS2GEaAwn2RVA==" LatestTicketingTime="2014-02-27T23:59:00.000+10:00" PlatingCarrier="LH" PricingMethod="Guaranteed" ProviderCode="1G" Taxes="AUD163.50" TotalPrice="AUD330.50">               
                    <air:FareInfo Amount="NUC69.00" DepartureDate="2014-04-09" Destination="BCN" EffectiveDate="2014-02-27T02:45:00.000+10:00" FareBasis="TNN293D1" Key="DN2T6kyVQk6st6B+hJY5zQ==" NotValidAfter="2014-04-09" NotValidBefore="2014-04-09" Origin="MUC" PassengerTypeCode="ADT">                  
                        <common_v26_0:Endorsement xmlns:common_v26_0="http://www.travelport.com/schema/common_v26_0" Value="NONREF/FL/CHG RESTRICTED"/>                  
                        <common_v26_0:Endorsement xmlns:common_v26_0="http://www.travelport.com/schema/common_v26_0" Value="CHECK FARE NOTE"/>                  
                        <air:FareRuleKey FareInfoRef="DN2T6kyVQk6st6B+hJY5zQ==" ProviderCode="1G">AHymPOcH9FC3B8PanMGpdXBoLjhbR1gVcGguOFtHWBVwaC44W0dYFXBoLjhbR1gVcGguOFtHWBVg3wcBOxII7WybJVm95fJDtrxcCZbzmQWugn0va8S1PMcsbDmg4EgrUIE70p/EpukpUmLEXpXFsbaHUcYyEfIbF7UppFniS9PcgKkdC2lARDZX0MZrjfKTRyjyUlO8j/WkAFsoeht+gZb1HknyyPk8iEJA/G7+ge9LT00dXQZ315ZJGPEw2h5/drSMys44fpfeEoMLNNg/SJf3yTMMb2NCcGguOFtHWBVwaC44W0dYFXBoLjhbR1gVcGguOFtHWBVg3wcBOxII7UtbwSdNKgai8rRKYsWhklEPmtIzqro+Q7USItuVBMOXuJPEp41+S2x/q8zVxeNF3HGc0GK1E/o4</air:FareRuleKey>               
                    </air:FareInfo>               
                    <air:FareInfo Amount="NUC69.00" DepartureDate="2014-04-18" Destination="MUC" EffectiveDate="2014-02-27T02:45:00.000+10:00" FareBasis="TNN293D1" Key="BRwLRmqwRnGeCAq/roBmdw==" NotValidAfter="2014-04-18" NotValidBefore="2014-04-18" Origin="BCN" PassengerTypeCode="ADT">                  
                        <common_v26_0:Endorsement xmlns:common_v26_0="http://www.travelport.com/schema/common_v26_0" Value="NONREF/FL/CHG RESTRICTED"/>                  
                        <common_v26_0:Endorsement xmlns:common_v26_0="http://www.travelport.com/schema/common_v26_0" Value="CHECK FARE NOTE"/>                  
                        <air:FareRuleKey FareInfoRef="BRwLRmqwRnGeCAq/roBmdw==" ProviderCode="1G">AHymPOcH9FC3B8PanMGpdXBoLjhbR1gVcGguOFtHWBVwaC44W0dYFXBoLjhbR1gVcGguOFtHWBVg3wcBOxII7WybJVm95fJDtrxcCZbzmQXuZcxCmy1g4HFtEISwqHb+UIE70p/EpukpUmLEXpXFsbaHUcYyEfIbE9BK12HZQeTcgKkdC2lARDZX0MZrjfKTRyjyUlO8j/WkAFsoeht+gZb1HknyyPk8iEJA/G7+ge9LT00dXQZ315ZJGPEw2h5/Sn84e5e/MuzeEoMLNNg/SJf3yTMMb2NCcGguOFtHWBVwaC44W0dYFXBoLjhbR1gVcGguOFtHWBVg3wcBOxII7UtbwSdNKgai8rRKYsWhklEPmtIzqro+Q7USItuVBMOXuJPEp41+S2x/q8zVxeNF3HGc0GK1E/o4</air:FareRuleKey>               
                    </air:FareInfo>               
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="DN2T6kyVQk6st6B+hJY5zQ==" SegmentRef="0BspzEiJTO2dZExA5crSjw=="/>               
                    <air:BookingInfo BookingCode="T" CabinClass="Economy" FareInfoRef="BRwLRmqwRnGeCAq/roBmdw==" SegmentRef="lnvwSdgdTDGY+lA2GCI6fA=="/>               
                    <air:TaxInfo Amount="AUD9.20" Category="DE" Key="rzplvR3SR2icyh08Hd3djg=="/>               
                    <air:TaxInfo Amount="AUD12.40" Category="OY" Key="bqn2eFjARAeXUFtCadV5Bg=="/>               
                    <air:TaxInfo Amount="AUD31.90" Category="RA" Key="4AdMmxyLTVOUqI8R/GND0A=="/>               
                    <air:TaxInfo Amount="AUD26.50" Category="JD" Key="YrxeF7P3QvCz2CdbSDgVGg=="/>               
                    <air:TaxInfo Amount="AUD1.00" Category="OG" Key="sIR2s2RwQCOhAyzk1dg3Gg=="/>               
                    <air:TaxInfo Amount="AUD6.30" Category="QV" Key="D+5l8LAXRy6HSQ5Zpv45Xg=="/>               
                    <air:TaxInfo Amount="AUD76.20" Category="YQ" Key="Qa16wm/oT9Shn+8BXL42dg=="/>               
                    <air:FareCalc>MUC LH BCN 69.00TNN293D1 LH MUC 69.00TNN293D1 NUC138.00END ROE0.731857</air:FareCalc>               
                    <air:PassengerType BookingTravelerRef="gr8AVWGCR064r57Jt0+8bA==" Code="ADT"/>               
                    <air:ChangePenalty>                  
                        <air:Percentage>100.00</air:Percentage>               
                    </air:ChangePenalty>               
                    <air:BaggageAllowances>                  
                        <air:BaggageAllowanceInfo Carrier="LH" Destination="BCN" Origin="MUC" TravelerType="ADT">                     
                            <air:URLInfo>                        
                                <air:URL>MYTRIPANDMORE.COM/BAGGAGEDETAILSLH.BAGG</air:URL>                     
                            </air:URLInfo>                     
                            <air:TextInfo>                        
                                <air:Text>1P</air:Text>                        
                                <air:Text>BAGGAGE DISCOUNTS MAY APPLY BASED ON FREQUENT FLYER STATUS/ ONLINE CHECKIN/FORM OF PAYMENT/MILITARY/ETC.</air:Text>                     
                            </air:TextInfo>                     
                            <air:BagDetails ApplicableBags="1stChecked" ApproximateBasePrice="AUD0.00" ApproximateTotalPrice="AUD0.00" BasePrice="EUR0.00" TotalPrice="EUR0.00">                        
                                <air:BaggageRestriction>                           
                                    <air:TextInfo>                              
                                        <air:Text>UPTO50LB/23KG AND UPTO62LI/158LCM</air:Text>                           
                                    </air:TextInfo>                        
                                </air:BaggageRestriction>                     
                            </air:BagDetails>                     
                            <air:BagDetails ApplicableBags="2ndChecked" ApproximateBasePrice="AUD124.05" ApproximateTotalPrice="AUD124.05" BasePrice="EUR75.00" TotalPrice="EUR75.00">                        
                                <air:BaggageRestriction>                           
                                    <air:TextInfo>                              
                                        <air:Text>UPTO50LB/23KG AND UPTO62LI/158LCM</air:Text>                           
                                    </air:TextInfo>                        
                                </air:BaggageRestriction>                     
                            </air:BagDetails>                  
                        </air:BaggageAllowanceInfo>                  
                        <air:BaggageAllowanceInfo Carrier="LH" Destination="MUC" Origin="BCN" TravelerType="ADT">                     
                            <air:URLInfo>                        
                                <air:URL>MYTRIPANDMORE.COM/BAGGAGEDETAILSLH.BAGG</air:URL>                     
                            </air:URLInfo>                     
                            <air:TextInfo>                        
                                <air:Text>1P</air:Text>                        
                                <air:Text>BAGGAGE DISCOUNTS MAY APPLY BASED ON FREQUENT FLYER STATUS/ ONLINE CHECKIN/FORM OF PAYMENT/MILITARY/ETC.</air:Text>                     
                            </air:TextInfo>                     
                            <air:BagDetails ApplicableBags="1stChecked" ApproximateBasePrice="AUD0.00" ApproximateTotalPrice="AUD0.00" BasePrice="EUR0.00" TotalPrice="EUR0.00">                        
                                <air:BaggageRestriction>                           
                                    <air:TextInfo>                              
                                        <air:Text>UPTO50LB/23KG AND UPTO62LI/158LCM</air:Text>                           
                                    </air:TextInfo>                        
                                </air:BaggageRestriction>                     
                            </air:BagDetails>                     
                            <air:BagDetails ApplicableBags="2ndChecked" ApproximateBasePrice="AUD124.05" ApproximateTotalPrice="AUD124.05" BasePrice="EUR75.00" TotalPrice="EUR75.00">                        
                                <air:BaggageRestriction>                           
                                    <air:TextInfo>                              
                                        <air:Text>UPTO50LB/23KG AND UPTO62LI/158LCM</air:Text>                           
                                    </air:TextInfo>                        
                                </air:BaggageRestriction>                     
                            </air:BagDetails>                  
                        </air:BaggageAllowanceInfo>                  
                        <air:CarryOnAllowanceInfo Carrier="LH" Destination="BCN" Origin="MUC">                     
                            <air:TextInfo>                        
                                <air:Text>UPTO18LB/8KG AND UPTO46LI/118LCM</air:Text>                     
                            </air:TextInfo>                     
                            <air:TextInfo>                        
                                <air:Text>CARRY ON PERSONAL ITEMS</air:Text>                     
                            </air:TextInfo>                     
                            <air:CarryOnDetails ApplicableCarryOnBags="1" ApproximateBasePrice="AUD0.00" ApproximateTotalPrice="AUD0.00" BasePrice="EUR0.00" TotalPrice="EUR0.00"/>                     
                            <air:CarryOnDetails ApplicableCarryOnBags="2" ApproximateBasePrice="AUD0.00" ApproximateTotalPrice="AUD0.00" BasePrice="EUR0.00" TotalPrice="EUR0.00"/>                  
                        </air:CarryOnAllowanceInfo>                  
                        <air:CarryOnAllowanceInfo Carrier="LH" Destination="MUC" Origin="BCN">                     
                            <air:TextInfo>                        
                                <air:Text>UPTO18LB/8KG AND UPTO46LI/118LCM</air:Text>                     
                            </air:TextInfo>                     
                            <air:TextInfo>                        
                                <air:Text>CARRY ON PERSONAL ITEMS</air:Text>                     
                            </air:TextInfo>                     
                            <air:CarryOnDetails ApplicableCarryOnBags="1" ApproximateBasePrice="AUD0.00" ApproximateTotalPrice="AUD0.00" BasePrice="EUR0.00" TotalPrice="EUR0.00"/>                     
                            <air:CarryOnDetails ApplicableCarryOnBags="2" ApproximateBasePrice="AUD0.00" ApproximateTotalPrice="AUD0.00" BasePrice="EUR0.00" TotalPrice="EUR0.00"/>                  
                        </air:CarryOnAllowanceInfo>               
                    </air:BaggageAllowances>            
                </air:AirPricingInfo>         
            </air:AirPricingSolution>         
            <com:ActionStatus xmlns:com="http://www.travelport.com/schema/common_v26_0" ProviderCode="$actionProviderCode" TicketDate="$ticketDate" Type="$ticketType"/>         
            <com:FormOfPayment xmlns:com="http://www.travelport.com/schema/common_v26_0" Key="$paymentKey" Type="$paymentType"/>      
        </univ:AirCreateReservationReq>   
    </soapenv:Body>
</soapenv:Envelope>

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
        curl_setopt($soap_do, CURLOPT_SSLVERSION, 1);            // SSL version to use (3.0)
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

    public function do_payment() {
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
//        $USERNAME = 'Universal API/uAPI3862924803';
//        $PASSWORD = 'A4JGwQA9cbDTAdkCsWCpGEDe4';
//        $TARGETBRANCH = 'P105396';

        $startDate = date("Y-m-d", strtotime($start_date));
        '2014-11-14'; // Outbound search date
        $origin = $from_location; //'CDG';           // Origin City (CDG - Paris, France)
        $destination = $to_location; //'JFK';      // Destination City (JFK - New York City)
        $airline = 'DL';           // Preferred airline to perform the search (Delta Airlines)

        $request = <<<EOM
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">   
    <soapenv:Header/>   
    <soapenv:Body>      
        <univ:AirCreateReservationReq xmlns:univ="http://www.travelport.com/schema/universal_v26_0" AuthorizedBy="$user" RetainReservation="Both" TargetBranch="$TRGT_BRCH" TraceId="$trace">         
            <com:BillingPointOfSaleInfo xmlns:com="http://www.travelport.com/schema/common_v26_0" OriginApplication="UAPI"/>         
            <com:BookingTraveler xmlns:com="http://www.travelport.com/schema/common_v26_0" DOB="1967-11-23" Gender="F" Key="gr8AVWGCR064r57Jt0+8bA==" TravelerType="ADT">            
                <com:BookingTravelerName First="$BookingTravelerNameFirst" Last="$BookingTravelerNameLast" Prefix="$BookingTravelerNamePrefix"/>            
                <com:DeliveryInfo>               
                    <com:ShippingAddress>                  
                        <com:AddressName>$address_name</com:AddressName>                  
                        <com:Street>$street</com:Street>                  
                        <com:City>$city</com:City>                  
                        <com:State>$state</com:State>                  
                        <com:PostalCode>$postal_code</com:PostalCode>                  
                        <com:Country>$country</com:Country>               
                    </com:ShippingAddress>            
                </com:DeliveryInfo>            
                <com:PhoneNumber AreaCode="$area_code" CountryCode="$country_code" Location="$phone_location" Number="$phone_number"/>            
                <com:Email EmailID="$email" Type="Home"/>            
                <com:Address>               
                    <com:AddressName>$address_name</com:AddressName>                  
                    <com:Street>$street</com:Street>                  
                    <com:City>$city</com:City>                  
                    <com:State>$state</com:State>                  
                    <com:PostalCode>$postal_code</com:PostalCode>                  
                    <com:Country>$country</com:Country>           
                </com:Address>         
            </com:BookingTraveler>         
            <air:AirPricingSolution xmlns:air="http://www.travelport.com/schema/air_v26_0" ApproximateBasePrice="$ap_base_price" ApproximateTotalPrice="$ap_total_price" BasePrice="$base_price" Key="$pricing_key" Taxes="$taxes" TotalPrice="$total_price">            
                <air:AirSegment ArrivalTime="$arival_time" AvailabilitySource="$availabilty_source" Carrier="$career" ChangeOfPlane="$change_of_plane" ClassOfService="$class_of_service" DepartureTime="$departure_time" Destination="$destination" Distance="$distance" Equipment="$equipment" FlightNumber="$flight_number" FlightTime="$flight_time" Group="$segment_group" Key="$segment_key" LinkAvailability="$availability" OptionalServicesIndicator="$service_indicater" Origin="$segment_origin" ParticipantLevel="Secure Sell" PolledAvailabilityOption="Polled avail used" ProviderCode="1G" TravelTime="$travel_time">               
                    <air:FlightDetails ArrivalTime="$arival_time" DepartureTime="$departure_time" Destination="$destination" FlightTime="$flight_time" Key="$flight_detail_key" Origin="$origin" TravelTime="$travel_time"/>            
                </air:AirSegment>            
                <air:AirPricingInfo ApproximateBasePrice="$AirPricingInfoApproximateBasePrice" ApproximateTotalPrice="$AirPricingInfoApproximateTotalPrice" BasePrice="$AirPricingInfoBasePrice" ETicketability="$AirPricingInfoETicketability" IncludesVAT="$AirPricingInfoIncludesVAT" Key="$AirPricingInfoKey" LatestTicketingTime="$AirPricingInfoLatestTicketingTime" PlatingCarrier="$AirPricingInfoPlatingCarrier" PricingMethod="$AirPricingInfoPricingMethod" ProviderCode="$AirPricingInfoProviderCode" Taxes="$AirPricingInfoTaxes" TotalPrice="$AirPricingInfoTotalPrice">               
                    <air:FareInfo Amount="AUD146.78" DepartureDate="2014-04-02" Destination="MEL" EffectiveDate="2014-03-01T05:22:00.000+10:00" FareBasis="QPTDEAL" Key="qcTfGZ3sQu2LoBtmGn5gKg==" NotValidAfter="2014-04-02" NotValidBefore="2014-04-02" Origin="SYD" PassengerTypeCode="ADT" PrivateFare="AirlinePrivateFare" PseudoCityCode="PCC">                  
                        <common_v26_0:Endorsement xmlns:common_v26_0="http://www.travelport.com/schema/common_v26_0" Value="NON-REF/NON-END"/>                  
                        <common_v26_0:Endorsement xmlns:common_v26_0="http://www.travelport.com/schema/common_v26_0" Value="SPECIAL FARE CONDITIONS"/>                  
                        <air:FareRuleKey FareInfoRef="qcTfGZ3sQu2LoBtmGn5gKg==" ProviderCode="1G">8uhHvTUmz5m3B8PanMGpdcre9sAIS979OeId8dIpk/mQZoIo6UX4aoiiVpwVSEBp3mQhq1AGx7Sb0mp6h+G8QR/B/k6oQIqNVUIEbCzfD8mDZwr04yo4OKfbaN4uWbAxrhy0nAPDiI+IolacFUhAaZJCGHEdKkxvT1miUiBFWqPHHBiYRWFhvkxKI1oUd9Lg6/Rgx+FENLfNVIJwUsLa/YmdBrhL3pxWFrX9cz2RiWy1zwxc/rgpvALKvqcM1gN3ljURjE9iXDFCc5qa5oWlu1CBO9KfxKbpM2o3Mkq7DQAzvzdhDjs6UJ2nwDTRGpy6cJAFz2wfLYj7GQ6XHn494bpQWaHbr6JTAjJk42lVWLx5S4+wSPrMk3BoLjhbR1gVcGguOFtHWBVwaC44W0dYFXBoLjhbR1gVcGguOFtHWBWSNyWGAFjiWwyJmqFJiMm997hW/UA3Awf2deCxDN7RI5M29POVCgxoXAM3AwVKse5vOP0OyTGW2A==</air:FareRuleKey>               
                    </air:FareInfo>               
                    <air:BookingInfo BookingCode="$BookingInfoBookingCode" CabinClass="$BookingInfoCabinClass" FareInfoRef="$BookingInfoFareInfoRef" SegmentRef="$BookingInfoSegmentRef"/>               
                    <air:TaxInfo Amount="$TaxInforAmount1" Category="$TaxInforCategory1" Key="$TaxInforKey1"/>
                    <air:TaxInfo Amount="$TaxInforAmount2" Category="$TaxInforCategory2" Key="$TaxInforKey2"/>
                    <air:TaxInfo Amount="$TaxInforAmount3" Category="$TaxInforCategory3" Key="$TaxInforKey3"/>
                    <air:TaxInfo Amount="$TaxInforAmount4" Category="$TaxInforCategory4" Key="$TaxInforKey4"/>           
                    <air:FareCalc>$FareCalc</air:FareCalc>               
                    <air:PassengerType BookingTravelerRef="$PassengerTypeBookingTravelerRef" Code="$PassengerType"/>               
                    <air:ChangePenalty>                  
                        <air:Amount>$ChangePenaltyAmount</air:Amount>               
                    </air:ChangePenalty>               
                    <air:BaggageAllowances>                  
                        <air:BaggageAllowanceInfo Carrier="$BaggageAllowanceInfo" Destination="$BaggageAllowanceInfoDestination" Origin="$BaggageAllowanceInfoOrigin" TravelerType="$BaggageAllowanceInfoTravelerType">                     
                            <air:URLInfo>                        
                                <air:URL>$URLInfoURL</air:URL>                     
                            </air:URLInfo>                     
                            <air:TextInfo>                        
                                <air:Text>$TextInfoText1</air:Text>                        
                                <air:Text>$TextInfoText2</air:Text>                     
                            </air:TextInfo>                     
                            <air:BagDetails ApplicableBags="$BagDetailsApplicableBags1">                        
                                <air:BaggageRestriction>                           
                                    <air:TextInfo>                              
                                        <air:Text>$BaggageRestrictionTextInfo1</air:Text>                           
                                    </air:TextInfo>                        
                                </air:BaggageRestriction>                     
                            </air:BagDetails>                     
                            <air:BagDetails ApplicableBags="$BagDetailsApplicableBags2" ApproximateBasePrice="$BagDetailsApproximateBasePrice" ApproximateTotalPrice="A$BagDetailsApproximateTotalPrice" BasePrice="$BagDetailsBasePrice" TotalPrice="$BagDetailsTotalPrice">                        
                                <air:BaggageRestriction>                           
                                    <air:TextInfo>                              
                                        <air:Text>$BaggageRestrictionTextInfo2</air:Text>                           
                                    </air:TextInfo>                        
                                </air:BaggageRestriction>                     
                            </air:BagDetails>                  
                        </air:BaggageAllowanceInfo>                  
                        <air:CarryOnAllowanceInfo Carrier="$CarryOnAllowanceInfo" Destination="$CarryOnAllowanceInfoDestination" Origin="$CarryOnAllowanceInfoOrigin"/>                  
                        <air:EmbargoInfo Carrier="$EmbargoInfoCarrier" Destination="$EmbargoInfoDestination" Origin="$EmbargoInfoOrigin">                     
                            <air:URLInfo>                        
                                <air:URL>$EmbargoInfoURL</air:URL>                     
                            </air:URLInfo>                     
                            <air:TextInfo>                        
                                <air:Text>$EmbargoInfoText</air:Text>                     
                            </air:TextInfo>                  
                        </air:EmbargoInfo>               
                    </air:BaggageAllowances>            
                </air:AirPricingInfo>         
            </air:AirPricingSolution>         
            <com:ActionStatus xmlns:com="http://www.travelport.com/schema/common_v26_0" ProviderCode="$ActionStatusProviderCode" TicketDate="$ActionStatusTicketDate" Type="$ActionStatusType"/>         
            <com:FormOfPayment xmlns:com="http://www.travelport.com/schema/common_v26_0" Key="$FormOfPaymentKey" Type="$FormOfPaymentType"/>      
        </univ:AirCreateReservationReq>   
    </soapenv:Body>
</soapenv:Envelope>
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
            "Content-length: " . strlen($request),
        );

        curl_setopt($soap_do, CURLOPT_VERBOSE, 1);               // For debugging purposes (read CURL manual for nore info)
        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30);       // Timeout options
        curl_setopt($soap_do, CURLOPT_TIMEOUT, 30);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, 0);        // Verify nothing about peer certificates
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, 0);        // Verify nothing about host certificates
        curl_setopt($soap_do, CURLOPT_POST, 1);                  // Sending post variables
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $request);     // Post variable being sent (The XML request)
        //curl_setopt($soap_do, CURLOPT_HEADER, 1 );
        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, TRUE);     // cuel_exec function will show the response directly on the page (if set to 0 curl_exec function will return the result)
        curl_setopt($soap_do, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); // Authentication is BASIC
        curl_setopt($soap_do, CURLOPT_USERPWD, $CREDENTIALS);    // The credentials username:password (CURL will encode this automatically)
        curl_setopt($soap_do, CURLOPT_SSLVERSION, 1);            // SSL version to use (3.0)
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

    private function get_flight_pricing() {

        $from_location = $this->input->post('from_location');
        $to_location = $this->input->post('to_location');
        $start_date = $this->input->post('start_date');
        $end_date = $this->input->post('end_date');
        $dest_type = $this->input->post('destinations');
        $adult_count = $this->input->post('adult_count');
        $children_count = $this->input->post('children_count');
        $infant_count = $this->input->post('infant_count');
        $class = $this->input->post('flight_class');


        $ArrivalTime = $this->input->post('ArrivalTime');
        $AvailabilitySource = $this->input->post('AvailabilitySource');
        $Carrier = $this->input->post('Carrier');
        $ChangeOfPlane = $this->input->post('ChangeOfPlane');
        $DepartureTime = $this->input->post('DepartureTime');
        $Destination = $this->input->post('Destination');
        $ETicketability = $this->input->post('ETicketability');
        $Equipment = $this->input->post('Equipment');
        $FlightNumber = $this->input->post('FlightNumber');
        $FlightTime = $this->input->post('FlightTime');
        $Group = $this->input->post('Group');
        $Key = $this->input->post('Key');
        $OptionalServicesIndicator = $this->input->post('OptionalServicesIndicator');
        $Origin = $this->input->post('Origin');
        $ParticipantLevel = $this->input->post('ParticipantLevel');
        $ProviderCode = $this->input->post('ProviderCode');


        $this->load->library('form_validation');
        $this->form_validation->set_rules('ArrivalTime', "Start from", "required");
//        $this->form_validation->set_rules('to_location', "Destination", "required");
//        $this->form_validation->set_rules('start_date', "Start date", "required");
//        $this->form_validation->set_rules('end_date', "End date", "required");
//        $this->form_validation->set_rules('destinations', "Destination type", "required");
//        $this->form_validation->set_rules('adult_count', "Adult count", "required");
//        $this->form_validation->set_rules('children_count', "Children", "required");
//        $this->form_validation->set_rules('infant_count', "Infant count", "required");
        //$this->form_validation->set_rules('class', "Class", "required");

        if ($this->form_validation->run() == TRUE) {
            
        } else {
            echo validation_errors();
        }
        $USERNAME = 'Universal API/uAPI3328713833-136749ba';
        $PASSWORD = 'STKrWQeGkpfAeZRfTgFAg43gm';
        $TARGETBRANCH = 'P107488';
//        $USERNAME = 'Universal API/uAPI3862924803';
//        $PASSWORD = 'A4JGwQA9cbDTAdkCsWCpGEDe4';
//        $TARGETBRANCH = 'P105396';

        $startDate = date("Y-m-d", strtotime($start_date));
        '2014-11-14'; // Outbound search date
        $origin = $from_location; //'CDG';           // Origin City (CDG - Paris, France)
        $destination = $to_location; //'JFK';      // Destination City (JFK - New York City)
        $airline = 'DL';           // Preferred airline to perform the search (Delta Airlines)     

        $request = <<<EOM
<SOAP-ENV:Envelope xmlns:SOAP-ENV="http://schemas.xmlsoap.org/soap/envelope/">
    <SOAP-ENV:Body>
        <air:AirPriceReq TargetBranch="$TARGETBRANCH" xmlns:air="http://www.travelport.com/schema/air_v25_0" xmlns:com="http://www.travelport.com/schema/common_v25_0">
            <com:BillingPointOfSaleInfo OriginApplication="UAPI"/>
            <air:AirItinerary>
                <air:AirSegment 
                    ArrivalTime="$ArrivalTime" 
                    AvailabilitySource="$AvailabilitySource" 
                    Carrier="$Carrier" 
                    ChangeOfPlane="$ChangeOfPlane" 
                    DepartureTime="$DepartureTime" 
                    Destination="$Destination" 
                    ETicketability="$ETicketability" 
                    Equipment="$Equipment" 
                    FlightNumber="$FlightNumber" 
                    FlightTime="$FlightTime" 
                    Group="$Group" 
                    Key="$Key"
                    OptionalServicesIndicator="$OptionalServicesIndicator" 
                    Origin="$Origin" 
                    ParticipantLevel="$ParticipantLevel"
                    ProviderCode="$ProviderCode"/>
            </air:AirItinerary>
            <com:SearchPassenger BookingTravelerRef="gr8AVWGCR064r57Jt0+8bA==" Code="ADT"/>
            <air:AirPricingCommand CabinClass="Economy"/>
        </air:AirPriceReq>
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
            "Content-length: " . strlen($request),
        );

        curl_setopt($soap_do, CURLOPT_VERBOSE, 1);               // For debugging purposes (read CURL manual for nore info)
        curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30);       // Timeout options
        curl_setopt($soap_do, CURLOPT_TIMEOUT, 30);
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, 0);        // Verify nothing about peer certificates
        curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, 0);        // Verify nothing about host certificates
        curl_setopt($soap_do, CURLOPT_POST, 1);                  // Sending post variables
        curl_setopt($soap_do, CURLOPT_POSTFIELDS, $request);     // Post variable being sent (The XML request)
        //curl_setopt($soap_do, CURLOPT_HEADER, 1 );
        curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, TRUE);     // cuel_exec function will show the response directly on the page (if set to 0 curl_exec function will return the result)
        curl_setopt($soap_do, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); // Authentication is BASIC
        curl_setopt($soap_do, CURLOPT_USERPWD, $CREDENTIALS);    // The credentials username:password (CURL will encode this automatically)
        curl_setopt($soap_do, CURLOPT_SSLVERSION, 1);            // SSL version to use (3.0)
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

    private function do_booking($param) {
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
//        $USERNAME = 'Universal API/uAPI3862924803';
//        $PASSWORD = 'A4JGwQA9cbDTAdkCsWCpGEDe4';
//        $TARGETBRANCH = 'P105396';

        $startDate = date("Y-m-d", strtotime($start_date));
        '2014-11-14'; // Outbound search date
        $origin = $from_location; //'CDG';           // Origin City (CDG - Paris, France)
        $destination = $to_location; //'JFK';      // Destination City (JFK - New York City)
        $airline = 'DL';           // Preferred airline to perform the search (Delta Airlines)

        $request = <<<DOM
                <soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">   
    <soapenv:Header/>   
    <soapenv:Body>      
        <univ:AirCreateReservationReq xmlns:univ="http://www.travelport.com/schema/universal_v26_0" AuthorizedBy="user" RetainReservation="Both" TargetBranch="TRGT_BRCH" TraceId="trace">         
            <com:BillingPointOfSaleInfo xmlns:com="http://www.travelport.com/schema/common_v26_0" OriginApplication="UAPI"/>         
            <com:BookingTraveler xmlns:com="http://www.travelport.com/schema/common_v26_0" DOB="1967-11-23" Gender="F" Key="gr8AVWGCR064r57Jt0+8bA==" TravelerType="ADT">            
                <com:BookingTravelerName First="Mary" Last="Smith" Prefix="Mrs"/>            
                <com:DeliveryInfo>               
                    <com:ShippingAddress>                  
                        <com:AddressName>Smiths</com:AddressName>                  
                        <com:Street>2914 N. Dakota Avenue</com:Street>                  
                        <com:City>Denver</com:City>                  
                        <com:State>CO</com:State>                  
                        <com:PostalCode>80206</com:PostalCode>                  
                        <com:Country>US</com:Country>               
                    </com:ShippingAddress>            
                </com:DeliveryInfo>            
                <com:PhoneNumber AreaCode="303" CountryCode="1" Location="DEN" Number="111-1111"/>            
                <com:Email EmailID="test@travelport.com" Type="Home"/>            
                <com:Address>               
                    <com:AddressName>Smiths</com:AddressName>               
                    <com:Street>2914 N. Dakota Avenue</com:Street>               
                    <com:City>Denver</com:City>               
                    <com:State>CO</com:State>               
                    <com:PostalCode>80206</com:PostalCode>               
                    <com:Country>US</com:Country>            
                </com:Address>         
            </com:BookingTraveler>         
            <air:AirPricingSolution xmlns:air="http://www.travelport.com/schema/air_v26_0" ApproximateBasePrice="AUD146.78" ApproximateTotalPrice="AUD179.00" BasePrice="AUD146.78" Key="kg7yn0IiQiGzgqPijOPmKw==" Taxes="AUD32.22" TotalPrice="AUD179.00">            
                <air:AirSegment ArrivalTime="2014-04-02T07:35:00.000+11:00" AvailabilitySource="Seamless" Carrier="QF" ChangeOfPlane="false" ClassOfService="Q" DepartureTime="2014-04-02T06:00:00.000+11:00" Destination="MEL" Distance="456" Equipment="73H" FlightNumber="401" FlightTime="95" Group="0" Key="R1uia8DsQZK2sTx4iXmC2w==" LinkAvailability="true" OptionalServicesIndicator="false" Origin="SYD" ParticipantLevel="Secure Sell" PolledAvailabilityOption="Polled avail used" ProviderCode="1G" TravelTime="95">               
                    <air:FlightDetails ArrivalTime="2014-04-02T07:35:00.000+11:00" DepartureTime="2014-04-02T06:00:00.000+11:00" Destination="MEL" FlightTime="95" Key="yyWrBU/PSAqiWqNdODt8fQ==" Origin="SYD" TravelTime="95"/>            
                </air:AirSegment>            
                <air:AirPricingInfo ApproximateBasePrice="AUD146.78" ApproximateTotalPrice="AUD179.00" BasePrice="AUD146.78" ETicketability="Yes" IncludesVAT="false" Key="onfvQ13ORN24Vm3grL124Q==" LatestTicketingTime="2014-02-28T23:59:00.000+10:00" PlatingCarrier="QF" PricingMethod="GuaranteedUsingAirlinePrivateFare" ProviderCode="1G" Taxes="AUD32.22" TotalPrice="AUD179.00">               
                    <air:FareInfo Amount="AUD146.78" DepartureDate="2014-04-02" Destination="MEL" EffectiveDate="2014-03-01T05:22:00.000+10:00" FareBasis="QPTDEAL" Key="qcTfGZ3sQu2LoBtmGn5gKg==" NotValidAfter="2014-04-02" NotValidBefore="2014-04-02" Origin="SYD" PassengerTypeCode="ADT" PrivateFare="AirlinePrivateFare" PseudoCityCode="PCC">                  
                        <common_v26_0:Endorsement xmlns:common_v26_0="http://www.travelport.com/schema/common_v26_0" Value="NON-REF/NON-END"/>                  
                        <common_v26_0:Endorsement xmlns:common_v26_0="http://www.travelport.com/schema/common_v26_0" Value="SPECIAL FARE CONDITIONS"/>                  
                        <air:FareRuleKey FareInfoRef="qcTfGZ3sQu2LoBtmGn5gKg==" ProviderCode="1G">8uhHvTUmz5m3B8PanMGpdcre9sAIS979OeId8dIpk/mQZoIo6UX4aoiiVpwVSEBp3mQhq1AGx7Sb0mp6h+G8QR/B/k6oQIqNVUIEbCzfD8mDZwr04yo4OKfbaN4uWbAxrhy0nAPDiI+IolacFUhAaZJCGHEdKkxvT1miUiBFWqPHHBiYRWFhvkxKI1oUd9Lg6/Rgx+FENLfNVIJwUsLa/YmdBrhL3pxWFrX9cz2RiWy1zwxc/rgpvALKvqcM1gN3ljURjE9iXDFCc5qa5oWlu1CBO9KfxKbpM2o3Mkq7DQAzvzdhDjs6UJ2nwDTRGpy6cJAFz2wfLYj7GQ6XHn494bpQWaHbr6JTAjJk42lVWLx5S4+wSPrMk3BoLjhbR1gVcGguOFtHWBVwaC44W0dYFXBoLjhbR1gVcGguOFtHWBWSNyWGAFjiWwyJmqFJiMm997hW/UA3Awf2deCxDN7RI5M29POVCgxoXAM3AwVKse5vOP0OyTGW2A==</air:FareRuleKey>               
                    </air:FareInfo>               
                    <air:BookingInfo BookingCode="Q" CabinClass="Economy" FareInfoRef="qcTfGZ3sQu2LoBtmGn5gKg==" SegmentRef="R1uia8DsQZK2sTx4iXmC2w=="/>               
                    <air:TaxInfo Amount="AUD7.74" Category="QR" Key="3HQrQqMbQQSLlF9LAFIZJQ=="/>               
                    <air:TaxInfo Amount="AUD5.53" Category="WG" Key="X8SEtXu7SIqaVKebPimdzg=="/>               
                    <air:TaxInfo Amount="AUD16.27" Category="UO" Key="TKC3ErEBRN6ualEu/CFDNg=="/>               
                    <air:TaxInfo Amount="AUD2.68" Category="YQ" Key="nsv1Nt5PTse9m1S78SAOTw=="/>               
                    <air:FareCalc>SYD QF MEL 146.78QPTDEAL AUD146.78END</air:FareCalc>               
                    <air:PassengerType BookingTravelerRef="gr8AVWGCR064r57Jt0+8bA==" Code="ADT"/>               
                    <air:ChangePenalty>                  
                        <air:Amount>AUD77.00</air:Amount>               
                    </air:ChangePenalty>               
                    <air:BaggageAllowances>                  
                        <air:BaggageAllowanceInfo Carrier="QF" Destination="MEL" Origin="SYD" TravelerType="ADT">                     
                            <air:URLInfo>                        
                                <air:URL>MYTRIPANDMORE.COM/BAGGAGEDETAILSQF.BAGG</air:URL>                     
                            </air:URLInfo>                     
                            <air:TextInfo>                        
                                <air:Text>1P</air:Text>                        
                                <air:Text>BAGGAGE DISCOUNTS MAY APPLY BASED ON FREQUENT FLYER STATUS/ ONLINE CHECKIN/FORM OF PAYMENT/MILITARY/ETC.</air:Text>                     
                            </air:TextInfo>                     
                            <air:BagDetails ApplicableBags="1stChecked">                        
                                <air:BaggageRestriction>                           
                                    <air:TextInfo>                              
                                        <air:Text>BAGGAGE CHARGES DATA NOT AVAILABLE</air:Text>                           
                                    </air:TextInfo>                        
                                </air:BaggageRestriction>                     
                            </air:BagDetails>                     
                            <air:BagDetails ApplicableBags="2ndChecked" ApproximateBasePrice="AUD40.00" ApproximateTotalPrice="AUD40.00" BasePrice="AUD40.00" TotalPrice="AUD40.00">                        
                                <air:BaggageRestriction>                           
                                    <air:TextInfo>                              
                                        <air:Text>UPTO50LB/23KG AND UPTO55LI/140LCM</air:Text>                           
                                    </air:TextInfo>                        
                                </air:BaggageRestriction>                     
                            </air:BagDetails>                  
                        </air:BaggageAllowanceInfo>                  
                        <air:CarryOnAllowanceInfo Carrier="QF" Destination="MEL" Origin="SYD"/>                  
                        <air:EmbargoInfo Carrier="QF" Destination="MEL" Origin="SYD">                     
                            <air:URLInfo>                        
                                <air:URL>MYTRIPANDMORE.COM/BAGGAGEDETAILSQF.BAGG</air:URL>                     
                            </air:URLInfo>                     
                            <air:TextInfo>                        
                                <air:Text>888</air:Text>                     
                            </air:TextInfo>                  
                        </air:EmbargoInfo>               
                    </air:BaggageAllowances>            
                </air:AirPricingInfo>         
            </air:AirPricingSolution>         
            <com:ActionStatus xmlns:com="http://www.travelport.com/schema/common_v26_0" ProviderCode="1G" TicketDate="2014-02-28T12:22:51" Type="TAW"/>         
            <com:FormOfPayment xmlns:com="http://www.travelport.com/schema/common_v26_0" Key="jwt2mcK1Qp27I2xfpcCtAw==" Type="Cash"/>      
        </univ:AirCreateReservationReq>   
    </soapenv:Body>
</soapenv:Envelope>
DOM;
    }

}
