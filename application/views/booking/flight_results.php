<?php
if (is_array($flight)) {
    foreach ($flight as $key => $value) {
        ?>
        <div>
            <?php
            if (is_array($value)) {
                echo "<p style='padding:20px;'>";
                echo $key, "s are :";
                foreach ($value as $key_n => $value_n) {
                    echo $key_n, " - ", $value_n;
                }
                echo "</p>";
            } else {
                echo $key, " - ", $value;
            }
            ?>
        </div>
    <?php
    }
} else {
    //var_dump($flight);
    echo $flight;
}
?>
<div>
    <?php
    //var_dump($flight); 
//Your Credentials: Universal API Web Services
//Universal API User ID: Universal API/uAPI3862924803
//Universal API Password: A4JGwQA9cbDTAdkCsWCpGEDe4
//Branch Code for Galileo (1G): P105396
//URLs: https://apac.universal-api.pp.travelport.com/B2BGateway/connect/uAPI/
    ?>
</div>
<div class="event-content" style="left: 0px;">
    <div class="event-content-logo">
        <img src="images/live1.jpg" class="icon">
        <div class="time" style="background-color: rgb(0, 171, 169);">10:20</div>
    </div>
    <div class="event-content-data">
        <div class="title">Katerina Kostereva</div>
        <div class="subtitle">Terrasoft</div>
        <div class="remark">Create and develop a business without external investment</div>
    </div>
</div>