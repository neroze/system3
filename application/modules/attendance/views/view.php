<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ATTENDANCE MANAGEMENT SYSTEM</title>

        <!-- Le styles -->
        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">
        <link rel="stylesheet" href=<?php echo base_url('css/jqPagination.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.min.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/docs.css') ?> />
        <script type="text/javascript" src="<?php echo base_url('js/jquery.js')?>"></script>

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
                    <h3>Manage user</h3>
                    <ul class="nav nav-list bs-docs-sidenav">

                        <li class="active"><a href="#anything"><i class="icon-chevron-right"></i> Overview</a></li>
                        <li><a href="#nothing"><i class="icon-chevron-right"></i>Describe</a></li>
                        <li ><a href="#everything"><i class="icon-chevron-right"></i>Download</a></li>

                    </ul>
                </div>
                <div class="span9">
                    <div class="row-fluid">
                        <div class="span9">
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
                        <div class="span1">
                            <a class="brand">
                                <div class="nav-collapse collapse">
                                    <div class="navbar-search pull-left">
                                        <?php echo form_open('Homecontroller/search', array('method' => 'post', 'name' => 'search')); ?>
                                        <input type="text"  name="search" class="search-query" placeholder="Search"/>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div></a></div>
                        </ul>
                    </div>

                </div>
                <div class="span9" >




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
                       <div id="employ">
                        <?php
                        foreach ($record as $key => $rec) {
                            echo '<tr id="employee_'.$key.'"><td>';
                            echo $rec->id . "" . "</td>";
                            echo "<td>";
                            echo $rec->date . "   " . "</td>";
                            echo "<td>";
                            echo $rec->username . "   " . "</td>";
                            echo "<td>"; 
                            $s = json_decode($rec->checkin);
                            foreach ($s as $key => $val) {
                                $in = $val;
                                ?>
                                <?php echo form_open('Homecontroller/save', array('method' => 'post', 'name' => 'save')); ?>

                                <input  name ="checkin" type="textbox" id="employ_1" class="TextBox1" value="<?php echo $in; ?>"/>
                                <?php
                            }

                            "</td>";
                            ?> 


                            <?php
                            echo "<td>";
                            $r = json_decode($rec->checkout);
                            foreach ($r as $k => $v) {
                                $out = $v;
                                ?>
                                <input  name ="checkout" type="textbox" id="employ_2" class="TextBox2" value="<?php echo $out; ?>"/>
                                <?php
                            }
                            "</td>";

                            echo "<td>";


                            $w = json_decode($rec->worked);
                            ?>



                            <input class="TextBox3" id="employ_3" name="worked" type ="textbox" value="<?php echo $w; ?>"/>
                            <?php
                        }
                        "</td></tr>";
                        ?>
                        </div>
                    </table>

                    <input type="submit"  name="save"  value="Update"/>
                </div>
                <?php echo form_close(); ?>
            </div>
        </div>

    </div>

    <div class="pagination"  >
        <ul>
            <?php echo $this->pagination->create_links(); ?>
        </ul>
    </div>
    <script>
        $(document).ready(function() {
            
        
            $("input").blur(function() {

                var form_data =
                        {
                            time1: $(".TextBox1").val(),
                            time2: $(".TextBox2").val()
                        };
                $.ajax(
                        {
                            url: "<?php echo site_url("HomeController/calculate_time_lap"); ?>",
                            type: 'POST',
                            data: form_data,
                            success: function(result)
                            {
                                
                            $('tr').each(function(index){
                            $('#employee_'+index).find('.TextBox3').val(result);
                           });
                       }
                        });
                return false;

            }); 
        });

    </script>
    <script type="text/javascript" src="<?php echo base_url('js/jQuery.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/bootstrap-scrollspy.js') ?>"></script>
    <script type="text/javascript" src="<?php echo base_url('js/bootstrap-affix.js') ?>"></script>
    <script src="<?php echo base_url('js/application.js') ?>"></script>

</body>
</html>