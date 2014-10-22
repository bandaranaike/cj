<!DOCTYPE html>
<html>
    <head>
        <title><?php echo isset($title) ? $title : "Crazy Jets"; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link href="<?php echo base_url(); ?>content/css/metro-bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/css/metro-bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/css/iconFont.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/css/docs.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/js/prettify/prettify.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/css/styles.css" rel="stylesheet"/>

        <link href="<?php echo base_url(); ?>content/css/owl.carousel.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/css/owl.theme.css" rel="stylesheet">

        <script src="<?php echo base_url(); ?>content/js/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>content/js/jquery/jquery.widget.min.js"></script>
        <script src="<?php echo base_url(); ?>content/js/jquery/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url(); ?>content/js/prettify/prettify.js"></script>
        <script src="<?php echo base_url(); ?>content/js/metro.min.js"></script>
        <script src="<?php echo base_url(); ?>content/js/owl.carousel.min.js"></script>
        <script type="text/javascript">
//            var __lc = {};
//            __lc.license = 5047721;
//
//            (function () {
//                var lc = document.createElement('script');
//                lc.type = 'text/javascript';
//                lc.async = true;
//                lc.src = ('https:' == document.location.protocol ? 'https://' : 'http://') + 'cdn.livechatinc.com/tracking.js';
//                var s = document.getElementsByTagName('script')[0];
//                s.parentNode.insertBefore(lc, s);
//            })();
        </script>
    </head>
    <body class="metro">
        <header class="bg-dark">
            <div class="navigation-bar light fixed-top shadow">
                <div class="navigation-bar-content container">
                    <a class="element" href="<?php echo base_url(); ?>" style="padding: 8px;">
                        <img src="<?php echo base_url(); ?>content/images/logo.png"/>
                        <sup>0.1 - Beeta</sup></a>
                    <span class="element-divider"></span>
                    <a href="#" class="element1 pull-menu"></a>
                    <ul class="element-menu">
                        <li><a href="<?php echo base_url(); ?>company/careers">Careers</a></li>
                        <li><a href="<?php echo base_url(); ?>support">FAQ</a></li>  
                        <li><a href="<?php echo base_url(); ?>company/privacy_policies">Privacy Policies</a></li>  
                        <li><a href="<?php echo base_url(); ?>company/terms_and_conditions">Terms and Conditions</a></li>
                        <li><a href="#" class="dropdown-toggle">Test</a>
                            <ul data-role="dropdown" class="dropdown-menu light">
                                <li><a href="<?php echo base_url(); ?>booking/flight">Flight</a></li>
                                <li><a href="<?php echo base_url(); ?>booking/hotel">Hotels</a></li>
                                <li><a href="<?php echo base_url(); ?>booking/vehicle">Vehicle</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </header>
        <div class="main-content">
            <div class="content_wrapper">
                <!--                <div class="container grid">
                                    <div class="row">
                                        <div class="span5 offset9 right">
                                            <a href="http://www.twitter.com" class="right">
                                                <div class="tile half bg-blue" title="Twitter">
                                                    <div class="tile-content icon">
                                                        <i class="icon-twitter"></i>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="http://www.facebook.com">
                                                <div class="tile half bg-darkBlue" title="Facebook">
                                                    <div class="tile-content icon">
                                                        <i class="icon-facebook"></i>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="http://www.plus.google.com">
                                                <div class="tile half bg-red" title="Google plus">
                                                    <div class="tile-content icon">
                                                        <i class="icon-google-plus"></i>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="<?php echo base_url(); ?>company">
                                                <div class="tile half bg-yellow" title="About Us">
                                                    <div class="tile-content icon">
                                                        <i class="icon-user-2"></i>
                                                    </div>
                                                </div>
                                            </a>
                                            <a href="<?php echo base_url(); ?>company/contacts">
                                                <div class="tile half bg-darkBrown" title="Contacts">
                                                    <div class="tile-content icon">
                                                        <i class="icon-phone"></i>
                                                    </div>
                                                </div>
                                            </a>
                                        </div>
                                    </div>
                                </div>-->
                <div class="container">
                    <h1 style="margin: 25px 0 28px"><?php echo isset($title) ? $title : ""; ?></h1>
                </div>