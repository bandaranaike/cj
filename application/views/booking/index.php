<?php
//
// Universal API by Travelport (Schema v6.0)
// https://support.travelport.com/webhelp/uapi/uAPI.htm
//
// Credentials provided by Travelport:
//
$USERNAME = 'Universal API/uAPI3862924803';
$PASSWORD = 'A4JGwQA9cbDTAdkCsWCpGEDe4';
$TARGETBRANCH = 'P105396';
//
// Sample Low Fare Search request parameters:
//
$startDate = '2014-07-14'; // Outbound search date
$origin = 'CDG';           // Origin City (CDG - Paris, France)
$destination = 'JFK';      // Destination City (JFK - New York City)
$airline = 'DL';           // Preferred airline to perform the search (Delta Airlines)
//
// This is the SOAP request
/*
 * Your Credentials: Universal API Web Services
  Universal API User ID: Universal API/uAPI3862924803
  Universal API Password: A4JGwQA9cbDTAdkCsWCpGEDe4
  Branch Code for Galileo (1G): P105396
  URLs: https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/
 */
// IMPORTANT: The SOAP envelope variables are case sensitive, be consistent!
//
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
$message = <<<EOM
<soapenv:Envelope xmlns:soapenv="http://schemas.xmlsoap.org/soap/envelope/" xmlns:air="http://www.travelport.com/schema/air_v16_0" xmlns:com="http://www.travelport.com/schema/common_v13_0" -->
<soapenv:header>
<soapenv:body>
<air:availabilitysearchreq xmlns:air="http://www.travelport.com/schema/air_v16_0" xmlns:com="http://www.travelport.com/schema/common_v13_0" authorizedby="Test" targetbranch="$TARGETBRANCH">
<air:searchairleg>
<air:searchorigin>
<com:airport code="LHR">
</com:airport></air:searchorigin>
<air:searchdestination>
<com:airport code="JFK">
</com:airport></air:searchdestination>
<air:searchdeptime preferredtime="2011-11-08">
</air:searchdeptime></air:searchairleg>
</air:availabilitysearchreq>
</soapenv:body> 
EOM;
//
$CREDENTIALS = $USERNAME . ":" . $PASSWORD; // Format the uname and password to the HTTP authentication. Format: "username:password"
//
// Initialize the CURL object with the uAPI endpoint URL (in this case is the AirService)
// Full endpoint list : https://support.travelport.com/webhelp/uapi/Content/Getting_Started/Easy_Overview/Complete_Services_List.htm
//
$soap_do = curl_init("https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/");
//
// This is the header of the request
//
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
//
curl_setopt($soap_do, CURLOPT_VERBOSE, 1);               // For debugging purposes (read CURL manual for nore info)
curl_setopt($soap_do, CURLOPT_CONNECTTIMEOUT, 30);       // Timeout options
curl_setopt($soap_do, CURLOPT_TIMEOUT, 30);
curl_setopt($soap_do, CURLOPT_SSL_VERIFYPEER, 0);        // Verify nothing about peer certificates
curl_setopt($soap_do, CURLOPT_SSL_VERIFYHOST, 0);        // Verify nothing about host certificates
curl_setopt($soap_do, CURLOPT_POST, 1);                 // Sending post variables
curl_setopt($soap_do, CURLOPT_POSTFIELDS, $message);     // Post variable being sent (The XML request)
//curl_setopt($soap_do, CURLOPT_HEADER, 1 );
curl_setopt($soap_do, CURLOPT_RETURNTRANSFER, 0);       // cuel_exec function will show the response directly on the page (if set to 0 curl_exec function will return the result)
curl_setopt($soap_do, CURLOPT_HTTPAUTH, CURLAUTH_BASIC); // Authentication is BASIC
curl_setopt($soap_do, CURLOPT_USERPWD, $CREDENTIALS);    // The credentials username:password (CURL will encode this automatically)
curl_setopt($soap_do, CURLOPT_SSLVERSION, 3);            // SSL version to use (3.0)
curl_setopt($soap_do, CURLOPT_PORT, 443);                // SSL port to use (443)
curl_setopt($soap_do, CURLOPT_HTTPHEADER, $header);      // Headers sent to the server
//
// Make the request and CURL will show it on the page, if you want it into a variable to process it see the line 77, the CURL_RETURNTRANSFER option
//
//curl_exec($soap_do);
//
// Check for errors and show them
// If CURL_RETURNTRANSFER option set to 0, you don't need this, since the errors will be shown on the page
//
//if (curl_errno($soap_do) != '') {
//print curl_errno($soap_do) . ' - ' . curl_error($soap_do) . '<br/>';
//}
//curl_close($soap_do);
//	
// Official PHP CURL manual; http://php.net/manual/en/book.curl.php
//
?>

<div class="row">
    <div class="booking_window span5">
        <div class="booking_window_header" style="min-width: 30px;">Booking</div>
        <div class="tab-control" data-role="tab-control">
            <ul class="tabs">
                <li class="active"><a href="#_page_1"><i class="icon-"></i>Flight</a></li>
                <li><a href="#_page_2">Hotels</a></li>
                <li><a href="#_page_3">Vehicles</a></li>
            </ul>
            <div class="frames">
                <div class="frame" id="_page_1">
                    <?php echo form_open(base_url() . "booking/flight"); ?>
                    <label style="width: 48%; margin-right: 3%; float: left">From
                        <div class="input-control text">
                            <input type="text" value="">
                        </div>
                    </label>
                    <label style="width: 48%; float: left">To
                        <div class="input-control text">
                            <input type="text">
                        </div>
                    </label>
                    <div data-role="input-control" class="input-control switch" style="width: 100%">
                        <div class="clearfix">
                            <label style="width: 48%; margin-right: 3%; float: left">Start Date
                                <div data-week-start="1" data-role="datepicker" class="input-control text">
                                    <input type="text" readonly="readonly">
                                    <button class="btn-date"></button>
                                </div>
                            </label>
                            <label style="width: 48%; float: left">End Date
                                <div data-week-start="1" data-role="datepicker" class="input-control text">
                                    <input type="text" readonly="readonly">
                                    <button class="btn-date"></button>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div data-role="input-control" class="input-control radio default-style inline-block">
                        <label class="inline-block">
                            <input type="radio" checked="" name="r2">
                            <span class="check"></span>
                            Return
                        </label>
                        <label class="inline-block">
                            <input type="radio" name="r2">
                            <span class="check"></span>
                            One way
                        </label>
                        <label class="inline-block">
                            <input type="radio" name="r2">
                            <span class="check"></span>
                            Multiple Destinations
                        </label>
                    </div>
                    <div class="input-control select">
                        <label style="margin-right: 20px; float: left;" class="inline-block">Adults
                            <select>
                                <?php for ($i = 0; $i < 10; $i++) { ?>
                                    <option <?php echo $i == 1 ? "selected='selected'" : "" ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label style="margin-right: 20px; float: left;" class="inline-block">Children
                            <select>
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label style="margin-right: 20px; float: left;" class="inline-block">Infants
                            <select>
                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label style="float: left;" class="inline-block">Class
                            <select>
                                <option>Economy</option>
                                <option>Business</option>
                                <option>First Class</option>
                            </select>
                        </label>
                    </div>
                    <div class="input-control select">

                    </div>
                    <input type="submit" name="search" value="Search"/>
                    <?php echo form_close(); ?>
                </div>
                <div class="frame" id="_page_2">
                    <?php echo form_open(base_url() . "booking/hotel"); ?>
                    <div data-role="input-control" class="input-control switch" style="width: 100%">
                        <div class="clearfix">
                            <label style="width: 48%; margin-right: 3%; float: left">Start Date
                                <div data-week-start="1" data-role="datepicker" class="input-control text">
                                    <?php echo form_input('username', 'johndoe'); ?>
                                    <button class="btn-date"></button>
                                </div>
                            </label>
                            <label style="width: 48%; float: left">End Date
                                <div data-week-start="1" data-role="datepicker" class="input-control text">
                                    <input type="text" readonly="readonly">
                                    <button class="btn-date"></button>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="input-control select">
                        <label style="margin-right: 20px; float: left;" class="inline-block">Adults
                            <select>
                                <?php for ($i = 0; $i < 10; $i++) { ?>
                                    <option <?php echo $i == 1 ? "selected='selected'" : "" ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label style="margin-right: 20px; float: left;" class="inline-block">Children
                            <select>
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label style="margin-right: 20px; float: left;" class="inline-block">Infants
                            <select>
                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label style="float: left;" class="inline-block">Class
                            <select>
                                <option>Economy</option>
                                <option>Luxury</option>
                                <option>First Class</option>
                            </select>
                        </label>
                    </div>
                    <div class="input-control select">

                    </div>
                    <input type="submit" name="search" value="Search"/>
                    <?php echo form_close(); ?>
                </div>
                <div class="frame" id="_page_3">
                    <?php echo form_open(base_url() . "booking/vehicle"); ?>
                    <label style="width: 48%; margin-right: 3%; float: left">From
                        <div class="input-control text">
                            <input type="text">
                        </div>
                    </label>
                    <label style="width: 48%; float: left">To
                        <div class="input-control text">
                            <input type="text">
                        </div>
                    </label>
                    <div data-role="input-control" class="input-control switch" style="width: 100%">
                        <div class="clearfix">
                            <label style="width: 48%; margin-right: 3%; float: left">Start Date
                                <div data-week-start="1" data-role="datepicker" class="input-control text">
                                    <input type="text" readonly="readonly">
                                    <button class="btn-date"></button>
                                </div>
                            </label>
                            <label style="width: 48%; float: left">End Date
                                <div data-week-start="1" data-role="datepicker" class="input-control text">
                                    <input type="text" readonly="readonly">
                                    <button class="btn-date"></button>
                                </div>
                            </label>
                        </div>
                    </div>
                    <div class="input-control select">
                        <label style="margin-right: 20px; float: left;" class="inline-block">Adults
                            <select>
                                <?php for ($i = 0; $i < 10; $i++) { ?>
                                    <option <?php echo $i == 1 ? "selected='selected'" : "" ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label style="margin-right: 20px; float: left;" class="inline-block">Children
                            <select>
                                <?php for ($i = 0; $i < 5; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label style="margin-right: 20px; float: left;" class="inline-block">Infants
                            <select>
                                <?php for ($i = 0; $i < 4; $i++) { ?>
                                    <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                <?php } ?>
                            </select>
                        </label>
                        <label style="float: left;" class="inline-block">Class
                            <select>
                                <option>Economy</option>
                                <option>Business</option>
                                <option>First Class</option>
                            </select>
                        </label>
                    </div>
                    <div class="input-control select">

                    </div>
                    <input type="submit" name="search" value="Search"/>
                    <?php echo form_close(); ?>
                </div>
            </div>
        </div>    
    </div>
    <div class="span7">
        <div class="slider_content">
            <div data-role="live-tile" class="tile quadro live" style="height: 200px;">
                <div class="tile-content image" style="background: #0067cb"></div>
                <div class="tile-content image" style="background: #ca5716"></div>
                <div class="tile-content image" style="background: #36ca16"></div>
                <div class="tile-content image" style="background: #ca7816"></div>
            </div>
        </div>
        <div class="slider_content">
            <div data-role="live-tile" class="tile live">
                <div class="tile-content image" style="background: #36ca16"></div>
                <div class="tile-content image" style="background: #0067cb"></div>
                <div class="tile-content image" style="background: #ca5716"></div>
                <div class="tile-content image" style="background: #ca7816"></div>
            </div>
            <div data-role="live-tile" class="tile live">
                <div class="tile-content image" style="background: #0067cb"></div>
                <div class="tile-content image" style="background: #ca7816"></div>
                <div class="tile-content image" style="background: #ca5716"></div>
                <div class="tile-content image" style="background: #36ca16"></div>
            </div>
            <div data-role="live-tile" class="tile live">
                <div class="tile-content image" style="background: #ca5716"></div>
                <div class="tile-content image" style="background: #0067cb"></div>
                <div class="tile-content image" style="background: #ca7816"></div>
                <div class="tile-content image" style="background: #36ca16"></div>
            </div>
        </div>
    </div>
</div>
<div class="row">
    <div class="span12">This is the content</div>
</div>
<script>
    $(document).ready(function () {
        $("#owl-demo").owlCarousel({
            items: 4,
            lazyLoad: true,
            navigation: true
        });
    });
</script>
<style>


    #owl-demo .item{
        margin: 3px;
    }
    #owl-demo .item img{
        display: block;
        width: 100%;
        height: auto;
    }


</style>
<div id="owl-demo" class="owl-carousel">
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl1.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl2.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl3.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl4.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl5.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl6.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl7.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl8.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl1.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl2.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl3.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl4.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl5.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl6.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl7.jpg" alt="Lazy Owl Image"></div>
    <div class="item"><img class="lazyOwl" data-src="<?php echo base_url(); ?>content/images/owl8.jpg" alt="Lazy Owl Image"></div>
</div>

