
                    <div class="span6">
                         <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Add New</h3>
                            </div>    <div class="modal-body">
                        <?php
                        echo form_open('client/pro_insert', array('method' => 'post', 'name' => ''));
                        echo form_label('Title', 'title');
                        echo form_input('title');
                        echo form_label('Client', 'client');
                        echo '<select name ="e1" id="e1">';
                        foreach ($records as $reco) {?>
                        <option value='<?php echo $reco->c_id; ?>'><?php echo $reco->firstname."",$reco->lastname."";}?></option>       
                        <?php 
                        echo '</select>';
                        echo form_label('Start-Date', 'start_date');
                        echo form_input('start_date');
                        echo form_label('End-Date', 'end_date');
                        echo form_input('end_date');
                        echo form_label('Total Budget', 'budget_amount');
                        echo form_input('budget_amount');
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
                            <h2>Project List</h2>
                        </div>
                        <div class="span4">
                            <a href="#myModal" class="btn" data-toggle="modal">Add New</a>
                        </div>
                        </div>
                        <div class="span1">
                            <a class="brand">
                                <div class="nav-collapse collapse">
                                    <div class="navbar-search pull-left">
                                        <?php echo form_open('client/pro_search', array('method' => 'post', 'name' => 'search')); ?>
                                        <input type="text"  name="search" class="search-query" placeholder="Search" style="margin-left:-18px;"/>
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

                            <td>Project_ID</td>
                            <td>Title</td>
                            <td>Date_start</td>
                            <td>Date_end</td>
                            <td>Total_Budget</td>
                            <td></td>

                        </tr>
                        <?php
                        foreach ($record as $rec) {
                            echo"<tr><td>";
                            echo $rec->id . "" . "</td>";
                            echo form_open("client/pro_updatedata/$rec->id", array('method' => 'post', 'name' => 'update', 'id' => 'check'));
                            echo "<td><div class='title'>";
                            echo $rec->title . "" . "<br/>";
                            echo '(';
                            echo $rec->client_firstname.""."" , $rec->last.""."";
                            echo ')';
                            echo '</div>';
                            echo form_input('title', $rec->title, 'class="TextBox1"');
                            "</td>";
                            echo "<td><div class='start'>";
                            echo $rec->start . "   " . "<br/>";
                            echo'</div>';
                            echo form_input('start_date', $rec->start, 'class="TextBox2 input-small"');
                            "</td>";
                            echo "<td><div class='end'>";
                            echo $rec->end . "" . "<br/>";
                            echo '</div>';
                            echo form_input('end_date', $rec->end, 'class="TextBox3 input-small"');
                            "</td>";
                              echo "<td><div class='end'>";
                            echo $rec->budget_amount . "" . "<br/>";
                            echo '</div>';
                            echo form_input('budget_amount', $rec->budget_amount, 'class="TextBox3 input-small"');
                            "</td>";
                            echo "<td>";
                            echo '<div class="span8">';
                            echo '<div class="row-fluid">';
                            echo '<div class="span4">';
                            echo form_submit('update', 'update', 'class="update btn"');
                            echo form_close();
                            echo'</div>';
                            echo '<div class="span4">';
                            echo form_submit('edit', 'edit', 'class="edit btn"');
                            echo'</div>';
                            echo '<div class="span4">';
                            echo form_open('client/deletedata/' . $rec->id, array('method' => 'post'));
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
                $("#e1").select2();
                $('.TextBox1').hide();
                $('.TextBox2').hide();
                $('.TextBox3').hide();
                $('.update').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-1;
                $(".btn-primary").live('click',function(){
                   var post_data=$('.modal-body').find('input').serialize();
                         var select=$('select').val();
                         var naya = post_data.add(select);
                     $.ajax(
                        {
                            url: "<?php echo site_url("client/pro_insert"); ?>",
                            type: 'POST',
                            data: naya,
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
                    $(this).closest('tr').find('.title').hide();
                    $(this).closest('tr').find('.start').hide();
                    $(this).closest('tr').find('.end').hide();
                    $(this).closest('tr').find('.update').show();
                    $(this).closest('tr').find('.TextBox1').show();
                    $(this).closest('tr').find('.TextBox2').show();
                    $(this).closest('tr').find('.TextBox3').show();
                    var date1 = $(this).closest('tr').find('.TextBox2');
                    var date2 = $(this).closest('tr').find('.TextBox3');
                    date1.blur(function() {

                        if (!(date1.val().match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/))) {
                            $(this).popover({
                                html: true,
                                trigger: 'blur',
                                content: function() {
                                    return 'Invalid Date';

                                }
                            });
                            return false;



                        } else {
                            return true;
                        }
                    });
                    date2.blur(function() {

                        if (!(date2.val().match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/))) {
                            $(this).popover({
                                html: true,
                                trigger: 'blur',
                                content: function() {
                                    return 'Invalid Date';

                                }
                            });
                            return false;



                        }
                        else {
                            return true;
                        }
                    });
                });
            });
        </script>

    </body>
</html>


