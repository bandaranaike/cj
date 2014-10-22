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
    echo form_open(base_url() . "booking/payment");
    echo form_hidden($registered);
    ?>

    <div class="row">
        <div class="span2">
            <div class="input-control select">
                <?php echo form_dropdown("person_tile", array('Mr.' => 'Mr.', 'Mrs.' => 'Mrs.', 'Ms.' => 'Ms.', 'Hon.' => 'Hon.')); ?>
            </div>
        </div>
        <div class="span5">
            <div class="input-control text">
                <input type="text" name="first_name" placeholder="First name"/>
            </div>
        </div>
        <div class="span5">
            <div class="input-control text">
                <input type="text" name="last_name" placeholder="Last name"/>
            </div>
        </div>
    </div>
    <div class="row">
        <div class="span5 offset2">
            <div class="input-control text">
                <input type="text" name="id_number" placeholder="ID Number"/>
            </div>
        </div>
        <div class="span5">
            <div class="input-control text">
                <input type="text" name="mobile_number" placeholder="Mobile"/>
            </div>
        </div>
    </div>
    <button class="button large" type="submit">Continue</button>
    <?php echo form_close(); ?>

</div>
