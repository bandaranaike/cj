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
<div class="container grid">
    <?php
    echo form_open(base_url() . "booking/booking_plane");
    echo ($registered);
    ?>

    <div class="row">
        <div class="span2">
            <div class="input-control select">
                <?php echo form_dropdown("person_tile", array('Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', 'Hon.' => 'Hon.')); ?>
            </div>
        </div>
        <div class="span5">
            <div class="input-control text">
                <input type="text" name="first_name" value="<?php echo is_array($user) ? $user['first_name'] : ""; ?>" placeholder="First name"/>
            </div>
        </div>
        <div class="span5">
            <div class="input-control text">
                <input type="text" name="last_name" value="<?php echo is_array($user) ? $user['last_name'] : ""; ?>" placeholder="Last name"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="span5 offset2">
            <div class="input-control text">
                <input type="text" name="email" placeholder="Email"/>
            </div>
        </div>
        <div class="span5">
            <div class="input-control text">
                <input type="text" name="mobile_number" placeholder="Mobile"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="span5 offset2">
            <div data-week-start="1" data-format="yyyy-mm-dd" data-role="datepicker" class="input-control text">
                <input type="text" name="date_of_birth" placeholder="Dath of birth"/>
                <button class="btn-date"></button>
            </div>
        </div>
    </div>
    <button class="button large" type="submit">Continue</button>
    <?php echo form_close(); ?>

</div>
