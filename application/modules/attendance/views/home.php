<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ATTENDANCE MANAGEMENT SYSTEM</title>

        <!-- Le styles -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link rel="stylesheet" href=<?php echo base_url('css/jqPagination.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/mycss.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.min.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/docs.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-datetimepicker.min.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-combined.min.css') ?> />
         <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-timepicker.min.css') ?> />
        <script type="text/javascript" src="<?php echo base_url('js/jQuery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-scrollspy.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-affix.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>" ></script>
         <script type="text/javascript" src="<?php echo base_url('js/bootstrap-timepicker.min.js') ?>" ></script>
        <script src="<?php echo base_url('js/application.js') ?>"></script>

    </head>

    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <div class="navbar navbar-inverse navbar-fixed-top" href style="width: 1346px;">
            <div class="navbar-inner">
                <div class="container">
                    <a href="http://localhost/attendence_system/index.php/Homecontroller"
                       href style="margin-left: -69px; color: #999; width: 420px; float: left; font-size: 21px;font-family: Helvetica Neue, Helvetica, Arial, sans-serif;text-decoration: none;margin-top: 10px;"
                       >3Hammers Attendance Management System</a>


                    <ul class="nav nav-pills">
                        <li class="dropdown">
                            <a class="dropdown-toggle"
                               data-toggle="dropdown"
                               href="" href style="  margin-left: 1143px; margin-top: -26px;width: 76px;">
                                Check Out
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu" href style="  margin-left: 1147px; "><li>
                                    <a href="http://localhost/attendence_system/index.php/auth/logout">Check Out</a></li>
                            </ul>
                        </li>
                    </ul>

                </div>
            </div>
        </div>

       <div class="container-fluid">
    <div class="row-fluid">
        <div class="span3 bs-docs-sidebar">
            <h3 style="margin: 27px 0px -19px 2px;">Manage user</h3>
            <div style="margin: -17px 81px 0px 0px;
float: right;">
                   <?php echo form_open('Homecontroller/logout', array('method' => 'post', 'name' => 'logout')); ?>
                    <input type="submit"  name="logout" value="clear" class="btn" />

                    <?php echo form_close(); ?> 
                </div>
            <ul class="nav nav-list bs-docs-sidenav">

                <li class="active"><a href="#anything"><i class="icon-chevron-right"></i> Overview</a></li>
                <li><a href="#nothing"><i class="icon-chevron-right"></i>Describe</a></li>
                <li ><a href="#everything"><i class="icon-chevron-right"></i>Download</a></li>

            </ul>
        </div>
        <div class="span9">
            <div class="row-fluid">
                <div class="span3" style="margin-top: 31px;">
                    <ul class="nav nav-pills ">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="" ><!--href style="margin-top: -28px;margin-left: 316px;width: 151px;"-->
                                ATTENDANCE DATE
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu"  ><!--href style="margin-top: -1px;  margin-left: 325px;"-->

                                <?php
                                foreach ($records as $rec) {

                                    echo '<table class="table">';
                                    echo'<li><a href="http://localhost/attendence_system/index.php/HomeController/manage/' . $rec->date . '"/>';
                                    echo $rec->date . "   " . "";
                                    echo '</a></li>';
                                    echo'</table>';
                                }
                                ?>

                            </ul>
                        </li></div>
                  
                
                 <div class="span6">
                  <?php
                            echo form_open('Homecontroller/checkdate', array('method' => 'post', 'name' => 'range', 'class' => 'navbar-form pull-left', 'style' => 'margin: 27px 0px 0px 0px;'));
                            echo '<c>From</c>'; //echo form_label('From','',array('id'=>'label')); 
                            echo  '<div id="datetimepicker" class="input-append date">';
                            echo form_input('date1', '', 'class="date1" ', 'id="dp1" ');
                            echo '<span class="add-on" >
                             <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span></div>';
                            echo'<c1>To</c1>';
                             echo  '<div id="datetimepicke" class="input-append date">';
                            echo form_input('date2', '', 'class="date2"', 'id="dp2" ');
                            echo '<span class="add-on" style="margin: 0px 7px 0px -12px;">
                             <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span></div>';
                            echo form_submit('submit', 'checkdate', 'class="btn btn1"');
                            echo form_close();
                            ?>
                    
                </div>
                <div class="span1">
                    <a class="brand">
                        <div class="nav-collapse collapse">
                            <div class="navbar-search pull-left">
                                <?php echo form_open('Homecontroller/search', array('method' => 'post', 'name' => 'search')); ?>
                                <input type="text"  name="search" class="search-query" placeholder="Search" style="margin-left:-18px;margin-top: 28px;"/>
                            </div>
                            <?php echo form_close(); ?>
                        </div></a></div>
                </ul>
            </div>

        </div>
        <div class="span9" style="margin-top: -10px;">




            <table class="table" >

                <tr href style="color: #fff;
                    background-color: #0088cc;
                    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                    height: 39px;">

                    <td>ID</td>
                    <td>Date</td>
                    <td>USername</td>
                    <td>CheckIn</td>
                    <td>CheckOut</td>
                    <td>Worked Time</td>

                </tr>
                        <?php
                        foreach ($record as $rec) {
                            echo"<tr><td>";
                            echo $rec->id . "" . "</td>";
                            echo "<td>";
                            echo $rec->date . "   " . "</td>";
                            echo "<td>";
                            echo $rec->username . "   " . "</td>";
                            echo "<td>";
                            $s = json_decode($rec->checkin);
                            foreach ($s as $key => $val) {
                                echo $in = $val . "<br/>";
                            }
                            "</td>";


                            echo "<td>";
                            $r = json_decode($rec->checkout);
                            foreach ($r as $k => $v) {
                                echo $out = $v . "<br/>";
                            }
                            "</td>";
                            echo "<td>";
                            echo $rec->worked . "" . "</td></tr>";
                        }
                        ?> 
                    </table>
                </div>
            </div>
        </div>
         <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR'
      });
        $('#datetimepicke').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR'
      });
    </script>
       
    </body>
</html>