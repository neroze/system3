
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
                 <div class="span9"></div>
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
                                        <input type="text"  name="search" class="search-query" placeholder="Search" style="margin-left:-18px;"/>
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
                            echo'<div class="span12">';
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
                            echo form_open('client/cdeletedata/' . $rec->c_id, array('method' => 'post'));
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

                $('.TextBox1').hide();
                $('.TextBox2').hide();
                $('.TextBox3').hide();
                $('.TextBox4').hide();
                $('.TextBox5').hide();
                 $('.TextBox6').hide();
                $('.update').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-1;
                      $(".btn-primary").live('click',function(){
                   var post_data=$('.modal-body').find('input').serialize();
                     $.ajax(
                        {
                            url: "<?php echo site_url("client/client_insert"); ?>",
                            type: 'POST',
                            data: post_data,
                            success: function(result)
                            {
                               // alert(result);
                                $('body').html(result);
                            }
                        });

                return false;
                });
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


