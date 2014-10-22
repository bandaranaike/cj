<?php
$expire_month = array();
$expire_year = array();
$this_year = date("Y");
for ($i = 1; $i <= 12; $i++) {
    $expire_month[$i] = $i;
}
for ($k = $this_year; $k <= ($this_year + 20); $k++) {
    $expire_year[$k] = $k;
}
?>

<div class="container grid">
    <div class="container" style="overflow: auto;">
        <nav class="breadcrumbs">
            <ul>
                <li><a href="<?php echo base_url(); ?>"><i class="icon-home"></i></a></li>
                <li><a href="<?php echo base_url() . "booking/"; ?>">Search</a></li>
                <li class="active"><a>Login</a></li>
                <li><a href="<?php echo base_url() . "booking/payment"; ?>">Pay</a></li>
                <li><a href="<?php echo base_url() . "booking/"; ?>">Summary</a></li>
            </ul>
        </nav>
    </div>
    <div class="row">
        <div data-role="tab-control" class="tab-control">
            <ul class="tabs">
                <li class="active"><a href="#_page_1"><i class="icon-paypal"></i> PayPal</a></li>
                <li class=""><a href="#_page_2"><i class="icon-credit-card"></i> Credit card</a></a></li>
                <li class=""><a href="#_page_3"><i class="icon-dollar"></i> POLi</a></li>
                <li class="place-right"><a href="#_page_4"><i class="icon-cog"></i></a></li>
            </ul>
            <div class="frames">
                <form action='https://www.sandbox.paypal.com/cgi-bin/webscr' method='post'>
                    <div id="_page_1" class="frame grid" style="display: block;">

                        <input type='hidden' name='business' value='eragroove-facilitator@live.com'>
                        <input type='hidden' name='cmd' value='_xclick'>
                        <input type='hidden' name='item_name' value='<?php echo $registered['flight_selected']; ?>'>
                        <input type='hidden' name='item_number' value='<?php echo $registered['flight_selected']; ?>'>
                        <input type='hidden' name='amount' value='<?php echo $registered['flight_selected']; ?>'>
                        <input type='hidden' name='no_shipping' value='1'>
                        <input type='hidden' name='currency_code' value='USD'>
                        <input type='hidden' name='cancel_return' value='<?php echo base_url(); ?>payment/cancel'>
                        <input type='hidden' name='return' value='<?php echo base_url(); ?>payment/success'>
<!--                        <input type="image" src="https://paypal.com/en_US/i/btn/btn_buynowCC_LG.gif" name="submit">-->

                        <div class="row">
                            <div class="span2">
                                Amount :
                            </div>
                            <div class="span4 text-bold">
                                20114.22 LKR
                            </div>
                        </div>
                        <div class="row">
                            <div class="span2">
                                Description :
                            </div>
                            <div class="span4 text-bold">
                                Air tickets
                            </div>
                        </div>
                        <div class="row">
                            <div class="span6">
                                <button class="button large" type="submit"><i class="icon-paypal"></i> Pay with PayPal</button>
                            </div>
                        </div>
                    </div>
                </form> 
                <div id="_page_2" class="frame grid" style="display: none;">
                    <div class="row">
                        <div class="span3">
                            <div class="input-control select">
                                <?php echo form_dropdown("person_tile", array('master_card' => 'Master Card', 'visa' => 'Visa', 'discover' => 'Discover', 'amex' => 'Amex')); ?>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="input-control select">
                                <?php echo form_dropdown("expire_month", $expire_month); ?>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="input-control select">
                                <?php echo form_dropdown("expire_year", $expire_year); ?>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <div class="input-control text">
                                <input type="text" name="credit_card_number" placeholder="Credit card number"/>
                            </div>
                        </div>
                        <div class="span3">
                            <div class="input-control text">
                                <input type="text" name="credit_card_cvv2" placeholder="Credit card Cvv2"/>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="span6">
                            <button class="button large"><i class="icon-credit-card"></i> Pay with credit card</button>
                        </div>
                    </div>
                </div>
                <div id="_page_3" class="frame grid" style="display: none;">
                    <div class="row">
                        <div class="span6">
                            <button class="button large"><i class="icon-dollar"></i> Pay with POLi</button>
                        </div>
                    </div>
                </div>
                <div id="_page_4" class="frame grid" style="display: none;">
                    <div class="row">
                        <div class="span4">
                            <div class="input-control text">
                                <input type="text" name="credit_card_number" placeholder="Credit card number"/>
                            </div>
                        </div>
                        <div class="span4">
                            <div class="input-control text">
                                <input type="text" name="credit_card_cvv2" placeholder="Credit card Cvv2"/>
                            </div>
                        </div>
                        <div class="span4">
                            <button class="button large"> Login </button>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>