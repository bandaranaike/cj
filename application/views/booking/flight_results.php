<script>
    $(document).ready(function () {
        $(".form_submit_radio").click(function () {
            var form_id = $(this).attr("itemid");
            $("#" + form_id).submit();
        });
    });
</script>
<div class="container" style="overflow: auto;">
    <nav class="breadcrumbs">
        <ul>
            <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
            <li class="active"><a>Search</a></li>
            <li><a href="<?php echo base_url(); ?>">Login</a></li>
            <li><a href="#">Pay</a></li>
            <li><a href="#">Summary</a></li>
        </ul>
    </nav>
</div>
<?php
//var_dump($flight);
$flightb = <<<XML
XML;
$soap = new SimpleXMLElement($flight);
var_dump($flight);
if (1 == 1) {
    $soap->registerXPathNamespace('air', 'http://www.travelport.com/schema/air_v25_0');
    $test = $soap->xpath('//air:LowFareSearchRsp/air:AirSegmentList/air:AirSegment');
//$test = $soap->xpath('//air:lowfaresearchrsp/air:airsegmentlist/air:airsegment');
    ?>
    <?php
    foreach ($test as $keyO => $valueO) {
        echo "<br/>****************************************<br/>", $keyO;
        foreach ($valueO->attributes() as $key => $value) {
            echo "<br/>";
            echo $key, " - ", $value;
        }
    }
    ?>
    <?php ?>
    <div class="container grid" style="overflow: auto">
        <h2 style="clear: both">From LKG To CDG</h2>
        <?php
        if (count($test) > 0) {
            foreach ($test as $keyO => $valueO) {
                echo form_open(base_url() . "booking/register", array("id" => $keyO));
                $values = $valueO->attributes();
                foreach ($values as $name => $value) {
                    echo form_hidden($name, $value);
                }
                ?>
                <div class="streamer" style="float: left; margin: 0 10px 10px 0; width: auto">
                    <div class="events" style="overflow-x: hidden; padding: 0">
                        <div class="event-stream">
                            <div class="event">
                                <div class="event-content">
                                    <div class="event-content-logo">
                                        <div class="icon" style="color: #4291cb; border: 1px solid rgba(53,60,205,0.2); background: rgb(236,236,246);padding: 8px 0; font-size: 1.2em; text-align: center;">
                                            <?php echo substr($values['ArrivalTime'], 0, 4); ?></div>
                                        <div class="time" style="background-color: rgb(67, 144, 223);">
                                            <?php echo substr($values['ArrivalTime'], 5, 5); ?></div>
                                    </div>
                                    <div class="event-content-data">
                                        <div class="title">Flight : <?php echo $values['FlightNumber']; ?></div>
                                        <div class="subtitle">From : <?php echo $values['Origin']; ?> - To :<?php echo $values['Destination']; ?></div>
                                        <div class="remark">Flight time is <?php echo $values['FlightTime']; ?> and <?php echo $values['AvailabilitySource']; ?> </div>
                                        <div style="float: right; margin: 5px 0 2px" data-role="input-control" class="input-control radio margin10">
                                            <label>
                                                <input type="radio" value="<?php echo $values['FlightNumber']; ?>" itemid="<?php echo $keyO; ?>" class="form_submit_radio" name="flight_selected">
                                                <span class="check"></span>
                                            </label>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <?php
                echo form_close();
            }
        } else {
            ?>
            <div class="container grid">
                <div style="border:1px solid #eee; padding:20px;">There are no flight with your searching scope. Please try again with defferent search values</div>
            </div>
        <?php } ?>
    </div>
    <?php
    if (isset($login_fail)) {
        $style_class = " error-state";
    } else {
        $style_class = "";
    }
    ?>
    <div class="container grid">
        <div class="row">
            <div class="span5">
                <div class="input-control text<?php echo $style_class; ?>">
                    <input type="text" name="email" placeholder="Email">
                </div>
            </div>
            <div class="span5">
                <div class="input-control text<?php echo $style_class; ?>">
                    <input type="password" placeholder="Password" name="password">
                </div>
            </div>
            <div class="span4">
                <div class="input-control text">
                    <button class="button large ">Select and continue</button>
                </div>
            </div>
        </div>
    </div>
<?php } else { ?>
    <div class="container grid">
        <div style="border:1px solid #eee; padding:20px;">There is an error with server response. Please try again</div>
    </div>
<?php } ?>
<?php
//var_dump($flight); 
//Your Credentials: Universal API Web Services
//Universal API User ID: Universal API/uAPI3862924803
//Universal API Password: A4JGwQA9cbDTAdkCsWCpGEDe4
//Branch Code for Galileo (1G): P105396
//URLs: https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/
?>
