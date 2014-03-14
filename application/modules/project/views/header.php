<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>3HAMMERS CLIENT MANAGEMENT SYSTEM</title>

        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">

        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.min.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/docs.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-datetimepicker.min.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-combined.min.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-timepicker.min.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/select2.css') ?> />
        <script type="text/javascript" src="<?php echo base_url('js/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js') ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-timepicker.min.js') ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-scrollspy.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-affix.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-popover.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/select2.js') ?>"></script>
        <script>var baseurl="<?php echo site_url() ?>";</script>
        <script type="text/javascript" src="<?php echo base_url('js/client.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/project.js') ?>"></script>
         <script type="text/javascript" src="<?php echo base_url('js/payment.js') ?>"></script>
         
        <script src="<?php echo base_url('js/application.js') ?>"></script>

    </head>

    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <div class="navbar navbar-inverse navbar-fixed-top">
      <div class="navbar-inner">
        <div class="container-fluid">
          <div class="nav-collapse collapse">
             <ul class="nav nav-pills pull-right">
                        <li class="dropdown">
                            <a class="dropdown-toggle"
                               data-toggle="dropdown"
                               href="">
                                Check Out
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu"><li>
                                   <a href="<?php echo base_url('auth/logout')?>">Check Out</a></li>
                                 <?php if ($this->session->userdata('user')):?> 
                                <li> <a href="<?php echo base_url('auth/create_user')?>">Create User</a></li>
                                <li> <a href="<?php echo base_url('auth')?>">Manage users</a></li>
                                <?php endif;?>
                                 
                                <li> <a href="<?php echo base_url('auth/change_password')?>">Change Password</a></li>
                            </ul>
                        </li>
                    </ul>
            <div class="nav">
                <a class="brand" href="<?php echo base_url('client')?>">3HAMMERS CLIENT MANAGEMENT SYSTEM</a>
            </div>
          </div><!--/.nav-collapse -->
        </div>
      </div>
    </div>
<div class="bodywidth">
        <div class="container-fluid">
            <div class="row-fluid">
                
                <div class="span3 bs-docs-sidebar" style="margin-top: 81px;">
                    
                    <ul class="nav nav-list bs-docs-sidenav">
                         <li class="active"><a href="">MANAGE USER</a></li>
                       <li><a href="<?php echo base_url('project')?>"><i class="icon-chevron-right"></i>Project</a></li>
                        <li ><a href="<?php echo base_url('payment')?>"><i class="icon-chevron-right"></i>Payment</a></li>
                        <li><a href="<?php echo base_url('client')?>"><i class="icon-chevron-right"></i> Client</a></li>

                    </ul>
                    