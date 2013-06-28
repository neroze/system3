
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
        <script type="text/javascript" src="<?php echo base_url('js/jquery.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.js') ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('js/jquery.validate.min.js') ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-datetimepicker.min.js') ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-timepicker.min.js') ?>" ></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap.min.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-scrollspy.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-affix.js') ?>"></script>
        <script type="text/javascript" src="<?php echo base_url('js/bootstrap-popover.js') ?>"></script>
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
                    <div class="span5">
                         <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Add New</h3>
                            </div>    <div class="modal-body">

                        <?php
                        echo form_open('client/client_insert', array('method' => 'post', 'name' => ''));
                        echo form_label('Firstname', 'firstname');
                        echo validation_errors('firstname');
                        echo form_input('firstname');
                        echo form_label('Lastname', 'lastname');
                        echo validation_errors('lastname');
                        echo form_input('lastname');
                        echo form_label('Email', 'email');
                        echo validation_errors('email');
                        echo form_input('email');
                        echo form_label('Ph-num', 'phnum');
                        echo form_input('phnum');
                        echo form_label('Address', 'address');
                        echo form_input('address');
                        echo form_label('Country', 'country');
                        echo form_input('country');
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
                        <div class="span9">

                        <div class="span4">
                            <h2>Client List</h2>
                        </div>
                         <div class="span4">
                            <a href="#myModal" class="btn" data-toggle="modal">Add New</a>
                        </div>
                        </div>
                        <div class="span1">
                            <a class="brand">
                                <div class="nav-collapse collapse">
                                    <div class="navbar-search pull-left">
                                        <?php echo form_open('client/c_search', array('method' => 'post', 'name' => 'search')); ?>
                                        <input type="text"  name="search" class="search-query" placeholder="Search" style="margin-left:-18px;margin-top: 28px;"/>
                                    </div>
                                    <?php echo form_close(); ?>
                                </div></a></div>
                    </div>

                </div>
                <div class="span9" style="margin-top: -10px;">




                    <table class="table" >

                        <tr href style="color: #fff;
                            background-color: #0088cc;
                            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                            height: 39px;">

                            <td>Client_ID</td>
                            <td>Firstname</td>
                            <td>Lastname</td>
                            <td>Email</td>

                            <td>Ph-num</td>
                            <td>Address</td>
                            <td>Country</td>
                        </tr>
                        <?php
                        foreach ($record as $rec) {
                            echo"<tr><td>";
                            echo $rec->c_id . "" . "</td>";
                            echo form_open("client/cupdatedata/$rec->c_id", array('method' => 'post', 'name' => 'update', 'id' => 'check'));
                            echo "<td><div class='firstname'>";
                            echo $rec->firstname . "" . "";
                            echo '</div>';
                            echo form_input('firstname', $rec->firstname, 'class="TextBox1 input-small"');
                            "</td>";
                            echo "<td><div class='lastname'>";
                            echo $rec->lastname . "   " . "";
                            echo '</div>';
                            echo form_input('lastname', $rec->lastname, 'class="TextBox2 input-small"');
                            "</td>";
                            echo "<td><div class='email'>";
                            echo $rec->email . "" . "";
                            echo '</div>';
                            echo form_input('email', $rec->email, 'class="TextBox3"');
                            "</td>";
                            echo "<td><div class='phnum'>";
                            echo $rec->phnum . "" . "";
                            echo '</div>';
                            echo form_input('phnum', $rec->phnum, 'class="TextBox4 input-small"');
                            "</td>";
                            echo "<td><div class='address'>";
                            echo $rec->address . "" . "";
                            echo'</div>';
                            echo form_input('address', $rec->address, 'class="TextBox5 input-small"');
                            "</td>";


                            echo "<td>";
                            echo '<div class="span8">';
                            echo '<div class="row-fluid">';
                            echo'<div class="span4">';
                            echo '<div class="country">';
                            echo $rec->country . "" . "";
                            echo '</div>';
                            echo form_input('country', $rec->country, 'class="TextBox6 input-small"');
                            echo'</div>';
                            echo '<div class="span4">';
                            echo form_submit('update', 'update', 'class="update btn"');
                            echo form_close();
                            echo'</div>';
                            echo '<div class="span4">';
                            echo form_submit('edit', 'edit', 'class="edit btn"');
                            echo'</div>';
                            echo '<div class="span4">';
                            echo form_open('client/cdeletedata/' . $rec->c_id, array('method' => 'post'));
                            echo form_submit('delete', 'delete', 'class="delete btn"');
                            echo form_close();
                            echo " </td> </tr></div></div>";
                        }
                        ?> 
                    </table>
                </div>
            </div>
        </div>
        <script>
            $(document).ready(function() {

                $('.TextBox1').hide();
                $('.TextBox2').hide();
                $('.TextBox3').hide();
                $('.TextBox4').hide();
                $('.TextBox5').hide();
                 $('.TextBox6').hide();
                $('.update').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-1;
                $(".edit").live('click', function() {


                    $('.edit').hide();
                    $('.delete').hide();
                    $(this).closest('tr').find('.firstname').hide();
                    $(this).closest('tr').find('.lastname').hide();
                    $(this).closest('tr').find('.email').hide();
                    $(this).closest('tr').find('.phnum').hide();
                    $(this).closest('tr').find('.address').hide();
                    $(this).closest('tr').find('.country').hide();
                    $(this).closest('tr').find('.update').show();
                    $(this).closest('tr').find('.TextBox1').show();
                    $(this).closest('tr').find('.TextBox2').show();
                    $(this).closest('tr').find('.TextBox3').show();
                    $(this).closest('tr').find('.TextBox4').show();
                    $(this).closest('tr').find('.TextBox5').show();
                     $(this).closest('tr').find('.TextBox6').show();

                    var email = $(this).closest('tr').find('.TextBox3');
                    email.blur(function() {
                        if (!((/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i).test(email.val())))
                        {
                            $(this).popover({
                                html: true,
                                trigger: 'blur',
                                content: function() {
                                    return 'Invalid Email';

                                }
                            });
                            return false;



                        }
                        else {
                            return true;
                        }
                    });
//                        var phnum = $(this).closest('tr').find('.TextBox4');
//                        phnum.blur(function(){
//                        if(!(phnum.val().match(/[^\d]/)))
//                        {
//                           $(this).popover({
//                                html: true,
//                                trigger: 'blur',
//                                content: function() {
//                                    return 'Invalid Phone number';
//
//                                }
//                            });
//                            return false;
//
//
//
//                        }
//                        else {
//                            return true; 
//                        }
//                        });
                        
                });

            });
        </script>
    </body>
</html>


