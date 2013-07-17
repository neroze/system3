
<?php 
$this->load->view('header');?>
                    <div class="span6">
                        <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Add New</h3>
                            </div>    <div class="modal-body">
                                 <div class="span2"></div>
                                 <div class="span4">
                                <?php
                              
                                echo form_label('Title', 'Title');?>

                                <select name ="e1" id="e1" class="select">
                                <?php foreach ($records as $reco) {
                                    ?>
                                    <option value='<?php echo $reco->id; ?>'><?php echo $reco->title;}?></option>
                                </select>
                                <br/>
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
                                
                                ?>
                            </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="span9">
                    <div class="row-fluid">
                            <h2>Payment List</h2>
                    
                       <div class="pull-left"><a href="#myModal" class="btn" data-toggle="modal">Add New</a></div>
                        
                        <div class="pull-right">
                            <div class="">
                                <?php echo form_open('payment/pay_search', array('method' => 'post', 'name' => 'search')); ?>
                                 <input type="text"  name="search" class="search-query" placeholder="Search" class="pull-right" style="margin: 2px 0px 0px -39px;"/>
                            </div>
                                <?php echo form_close(); ?>
                       </div>
                    </div>
                   
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
                        foreach ($record as $key => $rec) {?>
                         <tbody class="mero">   
                           <tr>
                               
                               <td>
                                
                            <?php echo $key+1 ;?>
                           <?php echo form_input('id', $rec->p_id, 'class="TextBox input-small"');?>
                                 </td>
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
                                 <div id="datetimep" class="input-append date">
                            <?php     
                            echo form_input('paid_date', $rec->paid_date, 'class="TextBox2 input-small"');?>
                              <span class="add-on on" >
                                <i class="icon-time"></i>
                                </span>
                                </div>
                            </td>
                            <td>
                            
                            <?php echo $rec->pro_id . "";?>
                            
                            </td>
                            <td>
                            <i class="update icon-check" alt="update"></i>
                            <i class="delete icon-trash" alt="delete"></i>        
                            <i class="edit icon-edit" alt="edit"></i> 
                           
                            
                         
                            </td>
                </tr></tbody>
                        <?php }?>
                    </table>
                    
                </div>
                
            </div>
        </div>
                </div>
    </body>
</html>