<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8">
        <title>ATTENDANCE MANAGEMENT SYSTEM</title>

        <link href="<?php echo base_url('css/bootstrap.min.css'); ?>" rel="stylesheet" media="screen">

        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/bootstrap-responsive.min.css') ?> />
        <link rel="stylesheet" href=<?php echo base_url('css/mycss.css') ?> />
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
        <script src="<?php echo base_url('js/application.js') ?>"></script>

    </head>

    <body data-spy="scroll" data-target=".bs-docs-sidebar">
        <div class="navbar navbar-inverse navbar-fixed-top" href style="width: 1346px;">
            <div class="navbar-inner">
                <div class="container">
                    <a href="http://localhost/system3/index.php/client"
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

                    <ul class="nav nav-list bs-docs-sidenav">

                        <li class="active"><a href="http://localhost/system3/index.php/client"><i class="icon-chevron-right"></i> Client</a></li>
                        <li><a href="http://localhost/system3/index.php/client/pro_getdata"><i class="icon-chevron-right"></i>Project</a></li>
                        <li ><a href="http://localhost/system3/index.php/client/payment_getdata"><i class="icon-chevron-right"></i>Payment</a></li>

                    </ul>
                    <div class="span6">
                        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Add New</h3>
                            </div>    <div class="modal-body">
                                <?php
                                echo form_open('client/payment_insert', array('method' => 'post', 'name' => ''));
                                echo form_label('Title', 'Title');

                                echo '<select name ="select" id="e1">';
                                foreach ($records as $reco) {
                                    ?>
                                    <option value='<?php echo $reco->id; ?>'><?php echo $reco->title;
                            }
                                ?></option>
                                <?php
                                echo '</select>';
                                echo form_label('Paid_Date', 'paid_date');
                                echo form_input('paid_date');
                                echo form_label('Amount', 'amount');
                                echo form_input('amount');
                                echo '</div>';
                                echo '<div class="modal-footer">';
                                echo form_submit('submit', 'submit', 'class="btn btn-primary"');

                                echo form_close();
                                ?>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span9">
                    <div class="row-fluid">
                        <div class="span9"></div>
                        <div class="span9">
                        <div class="span4">
                            <h2>Payment List</h2>
                        </div>

                        <div class="span4">
                            <a href="#myModal" class="btn" data-toggle="modal">Add New</a>
                        </div>
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
                            <td>Title</td>
                            <td>Amount</td>
                            <td>Paid_Date</td>
                            <td>Project_Id</td>
                        </tr>
                        <?php
                        foreach ($record as $rec) {
                            echo"<tr><td>";
                            echo $rec->p_id . "" . "</td>";
                            echo form_open("client/pupdatedata/$rec->p_id", array('method' => 'post', 'name' => 'update', 'id' => 'check'));
                            echo "<td>";
                            echo $rec->project_title . "" . "<br/>";
                            echo "</div>";
                            "</td>";
                            echo "<td><div class='amount'>";
                            echo $rec->amount . "" . "<br/>";
                            echo "</div>";
                            echo form_input('amount', $rec->amount, 'class="TextBox1 input-small"');
                            "</td>";
                            echo "<td><div class='paid_date'>";
                            echo $rec->paid_date . "   " . "<br/>";
                            echo '</div>';
                            echo form_input('paid_date', $rec->paid_date, 'class="TextBox2 input-small"');
                            echo "</td>";
                            echo "<td>";
                            echo '<div class="span8">';
                            echo '<div class="row-fluid">';
                            echo '<div class="span4">';
                            echo $rec->pro_id . "";
                            echo '</div>';
                            echo '<div class="span4">';
                            echo form_submit('update', 'update', 'class="update btn"');
                            echo form_close();
                            echo'</div>';

                            echo '<div class="span4">';
                            echo form_open('client/pdeletedata/' . $rec->p_id . "", array('method' => 'post'));
                            echo form_submit('delete', 'delete', 'class="delete btn"');
                            echo form_close();
                            echo '<div class="span4">';
                            echo form_submit('edit', 'edit', 'class="edit btn"');
                            echo'</div>';
                            echo " </td> </tr></div></div>";
                        }
                        ?> 
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {
                $("#e1").select2();
                $('.TextBox1').hide();
                $('.TextBox2').hide();
                $('.update').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-1;
                $(".edit").live('click', function() {


                    $('.edit').hide();
                    $('.delete').hide();
                    $(this).closest('tr').find('.amount').hide();
                    $(this).closest('tr').find('.paid_date').hide();
                    $(this).closest('tr').find('.update').show();
                    $(this).closest('tr').find('.TextBox1').show();
                    $(this).closest('tr').find('.TextBox2').show();
                });
            });
        </script>
    </body>
</html>



