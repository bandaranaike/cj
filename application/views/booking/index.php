<script>
    $(document).ready(function () {
        //getLocation();
    });
    var x = document.getElementById("demo");
    function getLocation() {
        if (navigator.geolocation) {
            navigator.geolocation.getCurrentPosition(showPosition);
        } else {
            x.innerHTML = "Geolocation is not supported by this browser.";
        }
    }
    function showPosition(position) {
        x.innerHTML = "Latitude: " + position.coords.latitude +
                "<br>Longitude: " + position.coords.longitude;
    }
</script>
</head>
<body>
    <div class="first_row">
        <div class="container grid">
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
                                        <?php echo form_input("from_location","CDG"); ?>
                                    </div>
                                </label>
                                <label style="width: 48%; float: left">To
                                    <div class="input-control text">
                                        <?php echo form_input("to_location","JFK"); ?>
                                    </div>
                                </label>
                                <div data-role="input-control" class="input-control switch" style="width: 100%">
                                    <div class="clearfix">
                                        <label style="width: 48%; margin-right: 3%; float: left">Start Date
                                            <div data-week-start="1" data-role="datepicker" class="input-control text">
                                                <?php echo form_input("start_date"); ?>
                                                <button class="btn-date"></button>
                                            </div>
                                        </label>
                                        <label style="width: 48%; float: left">End Date
                                            <div data-week-start="1" data-role="datepicker" class="input-control text">
                                                <?php echo form_input("end_date"); ?>
                                                <button class="btn-date"></button>
                                            </div>
                                        </label>
                                    </div>
                                </div>
                                <div data-role="input-control" class="input-control radio default-style inline-block">
                                    <label class="inline-block">
                                        <?php echo form_radio("destinations", "return"); ?>
                                        <span class="check"></span>
                                        Return
                                    </label>
                                    <label class="inline-block">
                                        <?php echo form_radio("destinations", "on_way", TRUE); ?>
                                        <span class="check"></span>
                                        One way
                                    </label>
                                    <label class="inline-block">
                                        <?php echo form_radio("destinations", "multy_destinations"); ?>
                                        <span class="check"></span>
                                        Multiple Destinations
                                    </label>
                                </div>
                                <div class="input-control select">
                                    <label style="margin-right: 20px; float: left;" class="inline-block">Adults
                                        <select name="adult_count">
                                            <?php for ($i = 0; $i < 10; $i++) { ?>
                                                <option <?php echo $i == 1 ? "selected='selected'" : "" ?> value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </label>
                                    <label style="margin-right: 20px; float: left;" class="inline-block">Children
                                        <select name="children_count">
                                            <?php for ($i = 0; $i < 5; $i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </label>
                                    <label style="margin-right: 20px; float: left;" class="inline-block">Infants
                                        <select name="infant_count">
                                            <?php for ($i = 0; $i < 4; $i++) { ?>
                                                <option value="<?php echo $i; ?>"><?php echo $i; ?></option>
                                            <?php } ?>
                                        </select>
                                    </label>
                                    <label style="float: left;" class="inline-block">Class
                                        <select name="flight_class">
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
                <div class="span9">
                    <div style="background: #f8f8f8; height: 300px; margin: 0 0 20px 0;">
                        <h1  style="margin:0; text-align: center; padding-top: 100px;">Customer's banner</h1>
                    </div>
                    <div style="">
                        <div style="float: left; width: 32%; margin-right: 2%; background: #f8f8f8; height: 150px;">
                            <h4 style="padding-top: 50px; text-align: center;">Customer's Banner</h4>
                        </div>
                        <div style="float: left; width: 32%; margin-right: 2%; background: #f8f8f8; height: 150px;">
                            <h4 style="padding-top: 50px; text-align: center;">Customer's Banner</h4>
                        </div>
                        <div style="float: left; width: 32%; background: #f8f8f8; height: 150px;">
                            <h4 style="padding-top: 50px; text-align: center;">Customer's Banner</h4>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!--<script>
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
    </div>-->