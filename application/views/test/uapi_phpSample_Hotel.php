<?php 
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
$CREDENTIALS = $USERNAME.":".$PASSWORD; 
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
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/">
	<soapenv:Header/>
	<soapenv:Body>
		<hot:HotelSearchAvailabilityReq xmlns:com="http://www.travelport.com/schema/common_v25_0" xmlns:hot="http://www.travelport.com/schema/hotel_v25_0" AuthorizedBy="user" TargetBranch="$TARGETBRANCH" TraceId="trace">
			<com:BillingPointOfSaleInfo OriginApplication="UAPI"/>
			<hot:HotelLocation Location="$LOCATION"/>
			<hot:HotelStay>
				<hot:CheckinDate>$CHECKINDATE</hot:CheckinDate>
				<hot:CheckoutDate>$CHECKOUTDATE</hot:CheckoutDate>
			</hot:HotelStay>
		</hot:HotelSearchAvailabilityReq>
	</soapenv:Body>
</soapenv:Envelope>
EOM;

$auth = base64_encode("$CREDENTIALS"); 
// Initialize the CURL object with the uAPI endpoint URL
$soap_do = curl_init ("https://americas.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/HotelService"); // Endpoint URL

//
// This is the header of the request
//
$header = array(
"Content-Type: text/xml;charset=UTF-8", 
"Accept: gzip,deflate", 
"Cache-Control: no-cache", 
"Pragma: no-cache", 
"SOAPAction: \"\"",
"Authorization: Basic $auth", 
"Content-length: ".strlen($message),
); 
//curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30); // Timeout options
//curl_setopt($soap_do, CURLOPT_TIMEOUT, 30); 
curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, false); // Verify nothing about peer certificates
curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, false); // Verify nothing about host certificate
curl_setopt($soap_do, CURLOPT_POST, true ); 
curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message); 
curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header); 

//
// Run the request
//

$return = curl_exec($soap_do);
print '<br>';
echo $return;
print '<br>';
print_r(curl_getinfo($soap_do));
//	
// Official PHP CURL manual; http://php.net/manual/en/book.curl.php
//

$xml = new SimpleXMLElement($return);
foreach($xml->xpath('//soap:body') as $header) {
    $output = $header->registerXPathNamespace('default', 'http://FpwebBox.Fareportal.com/Gateway.asmx');    
}
?>