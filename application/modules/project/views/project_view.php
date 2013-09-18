<?php $this->load->view('header'); ?>

<div class="span6">
        
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Add New</h3>
        </div>    <div class="modal-body addproject">
              <table>
           <tr><td>Title*:</td>
            <td><input type="text" id="title" name="title"></td>
           <td><p id="error">The field is required</p><p id="error4">The Title is already saved</p></td>
           </tr>
            <tr><td>Client*:</td>
            <td><select name ="e1" id="e1">
                <?php foreach ($records as $reco) { ?>
                    <option value='<?php echo $reco->c_id; ?>'><?php echo $reco->firstname . "", $reco->lastname . "";
            }
                ?></option>       

            </select></td>
            </tr>
            <tr><td></td></tr>
              <tr><td></td></tr>
                <tr><td></td></tr>
                 
           <tr><td>Start_date*:</td>
            <td><div id="datet" class="input-append date">
            <?php echo form_input('start_date','','id="sdate"');?>
            <span class="add-on">
                <i class="icon-time"></i>
            </span></div></td>
            <td><p id="error1">The field is required</p>
            </td>
           </tr>
            <tr>
                <td>
            End_date*:</td>
           <td> <div id="date" class="input-append date">
            <?php echo form_input('end_date','','id="edate"');?>
            <span class="add-on" >
                <i class="icon-time"></i>
            </span></div></td>
            <td><p id="error2">The field is required</p></td>
            </tr>
           
           <tr><td>Total Budget*:</td>
           <td><?php echo form_input('budget_amount','','id="bamount"');?></td>
           <td><p id="error3">The field is required</p></td>
           
        </tr>
              </table>
        </div>
        
        <div class="modal-footer">
            <?php
            echo form_submit('submit', 'submit', 'class="project btn btn-primary"');

            ?>
        </div>
    </div>
</div>
</div>
<div class="span9">
    <div class="row-fluid">

        
                <h2>Project List</h2>
                <div class="pull-left"><a href="#myModal" class="btn" data-toggle="modal">Add New</a></div>
                  <a href="#myMod" class="btn prodetail" data-toggle="modal">Add Payment</a> 
                    <div class="pull-right">
                      <?php echo form_open('project/pro_search', array('method' => 'post', 'name' => 'search')); ?>
                        <input type="text"  name="search" class="search-query" placeholder="Search" class="pull-right" style="margin: 2px 0px 0px -39px;"/>
                    </div>
                     <?php echo form_close(); ?>
    </div>



    <table class="table" >

    <thead>    <tr href style="color: #fff;
            background-color: #0088cc;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            height: 39px;">

            <td>Project_ID</td>
            <td>Title</td>
            <td>Date_start</td>
            <td>Date_end</td>
            <td>Total_Budget</td>
            <td>Action</td>
            <td></td>

        </tr>
    </thead>   
    
        <?php
        foreach ($record as $key=> $rec) {?>
            <tbody class="cou">
                <tr><td>
            <?php
            echo $key+1;?>
             <?php echo form_input('id', $rec->id, 'class="TextBox input-small"');?>
                    </td>
            <td><div class='title'>
            <?php echo $rec->title . "" . "<br/>";
            echo '(';
            echo $rec->client_firstname ;
            echo'&nbsp;';
             echo $rec->last;
            echo ')';
            ?>
    </div>
    <?php echo form_input('title', $rec->title, 'class="TextBox1"'); ?>
    </td>
    <td><div class="start">
            <?php echo $rec->start . "   " . "<br/>"; ?>
        </div>
        <div id="datetimepicker" class="input-append date">
            <?php echo form_input('start_date', $rec->start, 'class="TextBox2 input-small"'); ?>
            <span class="add-on on" >
                <i class="icon-time"></i>
            </span></div>
    </td>
    <td><div class="end">
            <?php echo $rec->end . "" . "<br/>"; ?>
        </div>
        <div id="datetimepicke" class="input-append date">  
            <?php echo form_input('end_date', $rec->end, 'class="TextBox3 input-small"'); ?>
            <span class="add-on on" >
                <i class="icon-time"></i>
            </span></div>
    </td>
    <td><div class="budget">
    <?php
    echo $rec->budget_amount . "" . "<br/>";?>
    </div>
    <?php echo form_input('budget_amount', $rec->budget_amount, 'class="TextBox4 input-small"');
    "</td>";?>
    <td>              
                          <i class="update icon-check" alt="update" title="update" ></i>
                            <i class="pdelete icon-trash" alt="delete" title="delete"></i>        
                            <i class="edit icon-edit" alt="edit" title="edit"></i> 
<!--                             <i class="prodetail icon-book" alt="detail"></i>-->
                         
                     <a href="#myModa" class="btn prodetail" data-toggle="modal">Details</a>
                     <a href="<?php echo base_url('task/index/'.$rec->id)?>" class="btn">Task</a>
                         
                             </tr>
<?php }
?>
</tbody>
 
</table>
           <div class="pagination"  >
            <ul>
                <li> <?php echo $this->pagination->create_links(); ?></li>
            </ul>
        </div>
     <div id="myModa" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Project Payments</h3>
        </div>    <div class="modal-body">
            <table class="antable table">
                <tr href style="color: #fff;
            background-color: #0088cc;
            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
            height: 39px;">
                   <td>Project Title </td>
                   <td>Amount Paid</td>
                   <td>Paid Date</td>
                </tr>
                <tbody class = "tbody"></tbody>
            </table>
            <div class="modal-footer"></div>
        </div>
     </div>
    
    
    <div id="myMod" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                            <div class="modal-header">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h3 id="myModalLabel">Add New</h3>
                            </div>    <div class="modal-body another">
                                    <table> 
                                <tr>
                                <td>Title:</td>
                                <td><select name ="e1" id="e2" class="select">
                                <?php foreach ($record as $reco) {
                                    ?>
                                    <option value='<?php echo $reco->id; ?>'><?php echo $reco->title;}?></option>
                                </select>
                                </td>
                                </tr>
                               
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr><td></td></tr>
                                <tr>
                                <td>Paid_Date*:</td>
                                <td><div id="datetimepick" class="input-append date">
                                <?php echo form_input('paid_date','','id="date"');?>
                                 <span class="add-on" >
                                <i class="icon-time"></i>
                                </span>
                                </div>
                                </td>
                                 <td><p id="err">The field is required</p></td>
                                  </tr>
                                
                                
                               <tr>
                               <td>Amount*:</td>
                               <td><?php echo form_input('amount','','id="amount"');?></td>
                               <td><p id="err1">The field is required</p></td>
                            </tr>
                              </table>
                                </div>
                                <div class="modal-footer">
                                <?php echo form_submit('submit', 'submit', 'class="pay btn btn-primary "');?>
                             
                            </div>
                            
                        </div>
</div>

</div>
</div>

</body>
</html>


