<link rel="stylesheet" href="<?php echo base_url(); ?>content/css/main.css">
<style type="text/css">
    .back-link a {
        color: #4ca340;
        text-decoration: none; 
        border-bottom: 1px #4ca340 solid;
    }
    .back-link a:hover,
    .back-link a:focus {
        color: #408536; 
        text-decoration: none;
        border-bottom: 1px #408536 solid;
    }
    h1 {
        height: 100%;
        /* The html and body elements cannot have any padding or margin. */
        margin: 0;
        font-size: 14px;
        font-family: 'Open Sans', sans-serif;
        color: #1c1d1e;
        font-size: 32px;
        margin-bottom: 3px;
    }
    h2 {
        color: #1c1d1e;
        font-family: 'Open Sans', sans-serif;
        font-weight: normal;
    }
    .entry-header .inner {
        text-align: left;
        margin: 0 auto 20px auto;
    }
    .entry-header { padding-top: 20px; background-color: #fff; width:100%; position: fixed; top: 0; left: 0; z-index: 999999}
</style>
<main>
    <section id="slide-1" class="homeSlide">
        <div class="bcg" data-center="background-position: 50% 0px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-1">
            <div class="hsContainer">
                <div class="hsContent" data-center="opacity: 1" data-506-top="opacity: 0" data-anchor-target="#slide-1 h2">
                    <h2>Flight, Hotels and Vehicle Booking</h2>
                    <div class="grid">
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
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="slide-2">
        <div class="bcg" data-0="background-color:rgb(1,27,59);" data-top="background-color:(0,0,0);"  data-anchor-target="#slide-2">
            <div class="hsContainer">
                <div class="hsContent">
                    <h2 data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2">Fade me in and out</h2>
                    <p data-center="opacity: 1" data--200-bottom="opacity: 0" data-206-top="opacity: 1" data-106-top="opacity: 0" data-anchor-target="#slide-2 h2">Here we are changing the background color from blue to black. Text is fading in at 206 pixels from the bottom and fading out 106 pixels from the top.</p>
                </div>
            </div>
        </div>
    </section>
<!--    <section id="slide-3" class="homeSlide">
        <div class="bcg" data-center="background-position: 0px 50%;" data-bottom-top="background-position: 0px 40%;" data-top-bottom="background-position: -40px 50%;" data-anchor-target="#slide-3">
            <div class="hsContainer">
                <div class="hsContent">
                    <div class="plaxEl" data-106-top="opacity: 0" data--30p-top="opacity: 1;" data--60p-top="opacity: 0;" data-bottom="opacity: 1; position: fixed; top: 206px; width: 100%; left: 0;"  data-anchor-target="#slide-3">
                        <h2>Fixed element fading in and out</h2>
                        <p><span class="bgBlack">Text is fixed 206 pixels from the top, while the background is moving 40 pixels to the left.</span></p>
                        <p><span class="bgBlack">Or did you think that the scooter is driving off?</span></p>
                    </div>
                </div>
            </div>

        </div>
    </section>-->
    <section id="slide-4" class="homeSlide homeSlideTall">
        <div class="bcg" data-center="background-position: 50% 0px;" data-bottom-top="background-position: 50% 100px;" data-top-bottom="background-position: 50% -100px;" data-anchor-target="#slide-4">
            <div class="curtainContainer">

                <div class="curtain" data-bottom-top="opacity: 0" data-106-top="height: 1%; opacity: 0; top: -10%;" data-center="height: 100%; opacity: 0.5; top: 0%;" data-anchor-target="#slide-4"></div>
                <div class="copy" data-bottom-top="opacity: 0" data--100-bottom="opacity: 0" data--280-bottom="opacity: 1;" data-280-top="opacity: 1;" data-106-top="opacity: 0;" data-anchor-target="#slide-4 .copy">
                    <h2>Curtain effect while you scroll</h2>
                </div>

            </div>
        </div>
    </section>
    <section id="slide-5" class="homeSlide homeSlideTall2">
        <div class="bcg">
            &nbsp;
        </div>
        <div class="bcg bcg2" data-bottom-top="opacity: 0;" data--33p-top="opacity: 0;" data--66p-top="opacity: 1;" data-anchor-target="#slide-5">
            <div class="hsContainer">
                <div class="hsContent" data-bottom-top="opacity: 0;" data-center="opacity: 1" data-anchor-target="#slide-5">
                    <h2>Fixed element fading in and out</h2>
                    <p>Showcase your beautiful images before blurring the scene and fading in your headline.</p>
                </div>
            </div>
        </div>
        <div class="bcg bcg3" data-300-bottom="opacity: 0;" data-100-bottom="opacity: 1;" data-anchor-target="#slide-5">
            <div class="hsContainer">
                <div class="hsContent" data-100-bottom="opacity: 0;" data-bottom="opacity: 1;" data-anchor-target="#slide-5">
                    <h2>The End</h2>
                    <p>Not enough parallax goodness? Let me know in the comments or hit me up at <a href="https://www.twitter.com/ihatetomatoes" target="_blank">@ihatetomatoes</a>.</p>
                </div>
            </div>
        </div>
    </section>
</main>
<script src="<?php echo base_url(); ?>content/js/imagesloaded.js"></script>
<script src="<?php echo base_url(); ?>content/js/skrollr.js"></script>
<script src="<?php echo base_url(); ?>content/js/_main.js"></script>
