<?php

class test extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper('url');
    }

    public function index() {
        $data['title'] = "Test";
        $data['result'] = $this->get_response();
        $this->load->view("template/header", $data);
        $this->load->view("test/index", $data);
        $this->load->view("template/footer");
    }

    public function booking() {
        $data['title'] = "Test";
        $data['result'] = $this->get_booking();
        $this->load->view("template/header", $data);
        $this->load->view("test/index", $data);
        $this->load->view("template/footer");
    }

    private function get_response() {

        $USERNAME = 'Universal API/uAPI9170948637-485aa294';
        $PASSWORD = 'w6DDXsDRHHYpztbr7A3MHz32B';
        $TARGETBRANCH = 'P7022986';
        /**
         * Universal API User ID: Universal API/uAPI9170948637-485aa294 
          Universal API Password: w6DDXsDRHHYpztbr7A3MHz32B
          Branch Code for Galileo (1G): P7022986

          URLs: https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/
         */
        $startDate = '2014-11-14';
        $origin = 'CDG';
        $destination = 'JFK';
        $airline = 'DL';

        $CREDENTIALS = $USERNAME . ":" . $PASSWORD;

        $message = <<<EOM
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">   
    <soapenv:Header/>   
    <soapenv:Body>      
        <air:LowFareSearchReq xmlns:air="http://www.travelport.com/schema/air_v26_0" AuthorizedBy="uAPI9170948637" SolutionResult="true" TargetBranch="$TARGETBRANCH" TraceId="$PASSWORD">         
            <com:BillingPointOfSaleInfo xmlns:com="http://www.travelport.com/schema/common_v26_0" OriginApplication="UAPI"/>         
            <air:SearchAirLeg>            
                <air:SearchOrigin>               
                    <com:Airport xmlns:com="http://www.travelport.com/schema/common_v26_0" Code="MUC"/>            
                </air:SearchOrigin>            
                <air:SearchDestination>               
                    <com:Airport xmlns:com="http://www.travelport.com/schema/common_v26_0" Code="BCN"/>            
                </air:SearchDestination>            
                <air:SearchDepTime PreferredTime="2014-12-09"/>         
            </air:SearchAirLeg>         
            <air:SearchAirLeg>            
                <air:SearchOrigin>               
                    <com:Airport xmlns:com="http://www.travelport.com/schema/common_v26_0" Code="BCN"/>            
                </air:SearchOrigin>            
                <air:SearchDestination>               
                    <com:Airport xmlns:com="http://www.travelport.com/schema/common_v26_0" Code="MUC"/>            
                </air:SearchDestination>            
                <air:SearchDepTime PreferredTime="2014-12-10"/>         
            </air:SearchAirLeg>         
            <air:AirSearchModifiers>            
                <air:PreferredProviders>               
                    <com:Provider xmlns:com="http://www.travelport.com/schema/common_v26_0" Code="1G"/>            
                </air:PreferredProviders>            
                <air:PermittedCarriers>               
                    <com:Carrier xmlns:com="http://www.travelport.com/schema/common_v26_0" Code="LH"/>            
                </air:PermittedCarriers>         
            </air:AirSearchModifiers>         
            <com:SearchPassenger xmlns:com="http://www.travelport.com/schema/common_v26_0" BookingTravelerRef="gr8AVWGCR064r57Jt0+8bA==" Code="ADT"/>      
        </air:LowFareSearchReq>   
    </soapenv:Body>
</soapenv:Envelope>
                
EOM;

        /**
         * Universal API User ID: Universal API/uAPI9170948637-485aa294 
          Universal API Password: w6DDXsDRHHYpztbr7A3MHz32B
          Branch Code for Galileo (1G): P7022986

          URLs: https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/
         */
        $soap_do = curl_init("https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/AirService");
        //https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/ 

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

    private function get_booking() {

        $USERNAME = 'Universal API/uAPI9170948637-485aa294';
        $PASSWORD = 'w6DDXsDRHHYpztbr7A3MHz32B';
        $TARGETBRANCH = 'P7022986';
        /**
         * Universal API User ID: Universal API/uAPI9170948637-485aa294 
          Universal API Password: w6DDXsDRHHYpztbr7A3MHz32B
          Branch Code for Galileo (1G): P7022986

          URLs: https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/
         */
        $startDate = '2014-11-14';
        $origin = 'CDG';
        $destination = 'JFK';
        $airline = 'DL';

        $CREDENTIALS = $USERNAME . ":" . $PASSWORD;

        $message = <<<EOM
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">   
    <soapenv:Header/>   
    <soapenv:Body>      
        <univ:AirCreateReservationReq xmlns:univ="http://www.travelport.com/schema/universal_v26_0" AuthorizedBy="user" RetainReservation="Both" TargetBranch="TRGT_BRCH" TraceId="trace">         
            <com:BillingPointOfSaleInfo xmlns:com="http://www.travelport.com/schema/common_v26_0" OriginApplication="UAPI"/>         
            <com:BookingTraveler xmlns:com="http://www.travelport.com/schema/common_v26_0" DOB="1957-05-12" Gender="M" Key="gr8AVWGCR064r57Jt0+8bA==" TravelerType="ADT">            
                <com:BookingTravelerName First="Frederick" Last="Heinrich" Prefix="Herr"/>            
                <com:DeliveryInfo>               
                    <com:ShippingAddress>                  
                        <com:AddressName>Home</com:AddressName>                  
                        <com:Street>Rossmarkt 6</com:Street>                  
                        <com:City>Frankfurt</com:City>                  
                        <com:State>Hesse</com:State>                  
                        <com:PostalCode>60311</com:PostalCode>                  
                        <com:Country>DE</com:Country>               
                    </com:ShippingAddress>            
                </com:DeliveryInfo>            
                <com:PhoneNumber AreaCode="49" CountryCode="069" Location="FRA" Number="261111111"/>            
                <com:Email EmailID="test@travelport.com" Type="Home"/>            
                <com:Address>               
                    <com:AddressName>Home</com:AddressName>               
                    <com:Street>Rossmarkt 6</com:Street>               
                    <com:City>Frankfurt</com:City>               
                    <com:State>Hesse</com:State>               
                    <com:PostalCode>60311</com:PostalCode>               
                    <com:Country>DE</com:Country>            
                </com:Address>         
            </com:BookingTraveler>         
            <air:AirPricingSolution xmlns:air="http://www.travelport.com/schema/air_v26_0" ApproximateBasePrice="AUD167.00" ApproximateTotalPrice="AUD330.50" BasePrice="EUR101.00" EquivalentBasePrice="AUD167.00" Key="qLr4efwJRu2RuCpxRvD0uw==" Taxes="AUD163.50" TotalPrice="AUD330.50">            
                <air:AirSegment ArrivalTime="2014-04-09T17:35:00.000+02:00" AvailabilitySource="Seamless" Carrier="LH" ChangeOfPlane="false" ClassOfService="T" DepartureTime="2014-04-09T15:30:00.000+02:00" Destination="BCN" Distance="681" Equipment="321" FlightNumber="1814" FlightTime="125" Group="0" Key="0BspzEiJTO2dZExA5crSjw==" LinkAvailability="true" OptionalServicesIndicator="false" Origin="MUC" ParticipantLevel="Secure Sell" PolledAvailabilityOption="Cached status used. Polled avail exists" ProviderCode="1G" TravelTime="125">               
                    <air:CodeshareInfo OperatingCarrier="LH" OperatingFlightNumber="1814"/>               
                    <air:FlightDetails ArrivalTime="2014-04-09T17:35:00.000+02:00" DepartureTime="2014-04-09T15:30:00.000+02:00" Destination="BCN" FlightTime="125" Key="ruU1rN17REeVdUlWzyVgDg==" Origin="MUC" TravelTime="125"/>            
                </air:AirSegment>            
                <air:AirSegment ArrivalTime="2014-04-18T09:55:00.000+02:00" AvailabilitySource="Seamless" Carrier="LH" ChangeOfPlane="false" ClassOfService="T" DepartureTime="2014-04-18T07:55:00.000+02:00" Destination="MUC" Distance="681" Equipment="321" FlightNumber="1817" FlightTime="120" Group="1" Key="lnvwSdgdTDGY+lA2GCI6fA==" LinkAvailability="true" OptionalServicesIndicator="false" Origin="BCN" ParticipantLevel="Secure Sell" PolledAvailabilityOption="Cached status used. Polled avail exists" ProviderCode="1G" TravelTime="120">               
                    <air:CodeshareInfo OperatingCarrier="LH" OperatingFlightNumber="1817"/>               
                    <air:FlightDetails ArrivalTime="2014-04-18T09:55:00.000+02:00" DepartureTime="2014-04-18T07:55:00.000+02:00" Destination="MUC" FlightTime="120" Key="IEyyCKRkSrqbDt2imorsrA==" Origin="BCN" TravelTime="120"/>            
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
            <com:ActionStatus xmlns:com="http://www.travelport.com/schema/common_v26_0" ProviderCode="1G" TicketDate="2014-02-26T09:45:03" Type="TAW"/>         
            <com:FormOfPayment xmlns:com="http://www.travelport.com/schema/common_v26_0" Key="jwt2mcK1Qp27I2xfpcCtAw==" Type="Cash"/>      
        </univ:AirCreateReservationReq>   
    </soapenv:Body>
</soapenv:Envelope>
EOM;

        /**
         * Universal API User ID: Universal API/uAPI9170948637-485aa294 
          Universal API Password: w6DDXsDRHHYpztbr7A3MHz32B
          Branch Code for Galileo (1G): P7022986

          URLs: https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/
         */
        $soap_do = curl_init("https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/AirService");
        //https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/ 

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
