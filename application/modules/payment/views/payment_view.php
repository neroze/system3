<?php 
$this->load->view('client/header');?>
                    <div class="span6">
                        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Add New</h3>
                            </div>    <div class="modal-body">
                                <?php
                                echo form_open('', array('method' => 'post', 'name' => '','id'=>'myform'));
                                echo form_label('Title', 'Title');?>

                                <select name ="e1" id="e1" class="select">
                                <?php foreach ($records as $reco) {
                                    ?>
                                    <option value='<?php echo $reco->id; ?>'><?php echo $reco->title;}?></option>
                                </select>
                                <?php echo form_label('Paid_Date', 'paid_date');?>
                                <div id="datetimepick" class="input-append date">
                               <?php echo form_input('paid_date');?>
                                 <span class="add-on" >
                                <i class="icon-time"></i>
                                </span>
                                </div>
                                <?php echo form_label('Amount', 'amount');
                                echo form_input('amount');
                              
                                echo '<div class="modal-footer">';
                                echo form_submit('submit', 'submit', 'class="btn btn-primary"');
                                  echo '</div>';
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
<thead>
                        <tr href style="color: #fff;
                            background-color: #0088cc;
                            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                            height: 39px;">

                            <td>ID</td>
                            <td>Title</td>
                            <td>Amount</td>
                            <td>Paid_Date</td>
                            <td>Project_Id</td>
                            <td>Action</td>
                        </tr>
    </thead>
                        <?php
                        foreach ($record as $rec) {?>
                         <tbody>   <tr><td>
                                
                            <?php echo $rec->p_id . "" ;?>
                           <?php echo form_input('id', $rec->p_id, 'class="TextBox input-small"');?>
                                 </td>;
                            <td>
                            <?php
                             echo $rec->project_title . "" . "<br/>";?>
                            </div>
                            </td>
                            <td><div class="amount">
                            <?php echo $rec->amount . "" . "<br/>";?>
                            </div>
                            
                            <?php echo form_input('amount', $rec->amount, 'class="TextBox1 input-small"');?>
                           
                            </td>
                            <td><div class='paid_date'>
                                    
                            <?php 
                            echo $rec->paid_date . "   " . "<br/>";?>
                            </div>
                            <div id="datetime" class="input-append date">
                            <?php     
                            echo form_input('paid_date', $rec->paid_date, 'class="TextBox2 input-small"');?>
                            <span class="add-on on" >
                            <i class="icon-time"></i>
                            </span></div>
                            </td>
                            <td>
                            
                            <?php echo $rec->pro_id . "";?>
                            
                            </td>
                            <td>
                         <div class="span3">
                             <?php
                            echo form_submit('delete', 'delete', 'class="delete btn"');?>
                            </div>
                            <div class="span2">
                            <?php
                             echo form_submit('edit', 'edit', 'class="edit btn"');?>
                            </div>
                            <div class="span4">
                            <?php echo form_submit('update', 'update', 'class="update btn"');?>
                            </div></td>
                </tr></tbody>
                        <?php }?>
                    </table>
                </div>
            </div>
        </div>
    </body>
</html>