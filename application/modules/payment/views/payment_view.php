<?php 
$this->load->view('header');?>
                    <div class="span6">
                        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Add New</h3>
                            </div>    <div class="modal-body">
                                <?php
                                echo form_open('payment/payment_insert', array('method' => 'post', 'name' => ''));
                                echo form_label('Title', 'Title');

                                echo '<select name ="e1" id="e1" class="select">';
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
                                        <?php echo form_open('payment/pay_search', array('method' => 'post', 'name' => 'search')); ?>
                                        <input type="text"  name="search" class="search-query" placeholder="Search" style="margin-left:-18px;"/>
                                    </div>
                                        <?php echo form_close(); ?>
                                </div></a></div>
                    </div>

                </div>
                <div class="span9" style="margin-top: -10px;">




                    <table class="table" id="table">

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
                        foreach ($record as $rec) {?>
                            <tr><td>
                            <?php echo $rec->p_id . "" . "</td>";
                            echo form_open("payment/pupdatedata/$rec->p_id", array('method' => 'post', 'name' => 'update', 'id' => 'check'));
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
                            echo form_open('payment/pdeletedata/' . $rec->p_id . "", array('method' => 'post'));
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
                       $(".btn-primary").live('click',function(){
                   var post_data=$('.modal-body').find('input,select').serialize();
                  // var select=$('select').val();
                     $.ajax(
                        {
                            url: "<?php echo site_url("payment/payment_insert"); ?>",
                            type: 'POST',
                            data: post_data,
                            success: function(result)
                            {
                               // alert(result);
                                $('#table tr:last').html(result);
                            }
                        });

                return false;
                });
                
            });
        </script>
    </body>
</html>



