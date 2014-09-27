<!DOCTYPE html>
<html>
    <head>
        <title><?php echo isset($title) ? $title : "Payment Application"; ?></title>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link href="<?php echo base_url(); ?>content/css/metro-bootstrap.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/css/metro-bootstrap-responsive.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/css/iconFont.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/css/docs.css" rel="stylesheet">
        <link href="<?php echo base_url(); ?>content/js/prettify/prettify.css" rel="stylesheet">

        <link href="<?php echo base_url(); ?>content/css/styles.css" rel="stylesheet"/>

        <script src="<?php echo base_url(); ?>content/js/jquery/jquery.min.js"></script>
        <script src="<?php echo base_url(); ?>content/js/jquery/jquery.widget.min.js"></script>
        <script src="<?php echo base_url(); ?>content/js/jquery/jquery.mousewheel.js"></script>
        <script src="<?php echo base_url(); ?>content/js/prettify/prettify.js"></script>

        <script src="<?php echo base_url(); ?>content/js/metro.min.js"></script>
    </head>
    <body class="metro">
        <div class="main-content">
            <div class="content_wrapper">
                <header class="bg-dark">
                    <div class="navigation-bar dark">
                        <div class="navigation-bar-content container">
                            <a href="<?php echo $base_url; ?>" class="element">
                                <span class="icon-grid-view"></span> PAYMENT APPLICATION <sup>0.1.0</sup>
                            </a>
                            <span class="element-divider"></span>
                            <a class="element1 pull-menu" href="#"></a>
                            <ul id="sub_nav" class="element-menu">
                                <?php if (!$this->flexi_auth->is_logged_in_via_password()) { ?>
                                    <li>
                                        <a href="<?php echo $base_url; ?>auth"><?php echo ($this->flexi_auth->is_logged_in()) ? 'Login via Password' : 'Login'; ?></a>
                                    </li>
                                <?php } ?>
                                <?php if (!$this->flexi_auth->is_logged_in()) { ?>
                                    <li>
                                        <a href="<?php echo $base_url; ?>auth/register_account">Register</a>
                                    </li>
                                <?php } else { ?>

                                    <li>
                                        <a href="<?php echo $base_url; ?>auth_lite/lite_library">Profile</a>
                                    </li>
                                    <li>
                                        <a class="dropdown-toggle" href="<?php echo $base_url; ?>auth_public/">Public Dashboard</a>
                                        <ul class="dropdown-menu dark" data-role="dropdown">
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_public/">Public Dashboard</a>
                                            </li>
                                            <li class="divider"></li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_public/update_account">Update Account Details</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_public/update_email">Update Email Address</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_public/change_password">Update Password</a>
                                            </li>
                                            <!-- <li>
                                                        <a href="<?php echo $base_url; ?>auth_public/bank_account_address_book">Manage Address Book</a>
                                                    </li>-->
                                            <li>
                                                <a href="<?php echo $base_url; ?>bank_account">Bank Accounts</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>bank_account/add_bank_account">Add Bank Account</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>transaction">Transactions</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>transaction/make_new">New transaction</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>payment_req">Payment Requests</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>payment_req/add_new_request">New Payment Request</a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li>
                                        <a href="<?php echo $base_url; ?>auth/logout">Logout</a>
                                    </li>
                                <?php } ?>
                                <?php if ($this->flexi_auth->is_logged_in() && $this->flexi_auth->is_admin()) { ?>
                                    <li>
                                        <a class="dropdown-toggle" href="<?php echo $base_url; ?>auth_admin/">Admin Dashboard</a>
                                        <ul class="dropdown-menu dark" data-role="dropdown">
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_admin/">Admin Dashboard</a>
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_admin/manage_user_accounts">Manage User Accounts</a>			
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_admin/manage_user_groups">Manage User Groups</a>			
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_admin/manage_privileges">Manage User Privileges</a>			
                                            </li>
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_admin/list_user_status/active">List Active Users</a>
                                            </li>	
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_admin/list_user_status/inactive">List Inactive Users</a>
                                            </li>	
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_admin/delete_unactivated_users">List Unactivated Users</a>
                                            </li>	
                                            <li>
                                                <a href="<?php echo $base_url; ?>auth_admin/failed_login_users">List Failed Logins</a>			
                                            </li>	
                                        </ul>		
                                    </li>
                                <?php } ?>
                            </ul>
                            <?php if ($this->flexi_auth->is_logged_in()) { ?>
                                <div class="no-tablet-portrait no-phone">
                                    <span class="element-divider place-right"></span>
                                    <div title="Notifications" class="element place-right dropdown-toggle noti_container">
                                        <span class="icon-bell"></span>
                                        <?php if ($not_count > 0) { ?>
                                            <span class="github-watchers"><?php echo $not_count; ?></span>
                                        <?php } ?>
                                    </div>
                                    <?php if (is_array($notify->result_object())) { ?>
                                        <ul class="dropdown-menu place-right notifications" data-role="dropdown">
                                            <?php foreach ($notify->result_object() as $notification) { ?>
                                                <li id="<?php echo $notification->not_id; ?>" class="not_level_<?php echo $notification->not_status; ?>">
                                                    <a href="<?php echo isset($not_types[$notification->not_related_type]->not_typ_link) ? $base_url . $not_types[$notification->not_related_type]->not_typ_link : ""; ?>">
                                                        <?php echo $notification->not_message; ?>
                                                    </a>
                                                </li>
                                            <?php } ?>
                                        </ul>
                                    <?php } ?>
                                    <span class="element-divider place-right"></span>
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                </header>
                <div class="container">
                    <h1><?php echo $title; ?></h1>
