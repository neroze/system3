
<?php $this->load->view('header'); ?> 



<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add New</h3>
    </div> 
    
  
    <div class="modal-body" >
       <?php
            echo form_label('Firstname*', 'firstname');

//            echo form_input('firstname','','class="required"');?>
        <input id="fname" name="firstname"  type="text" /><p id="error">The field is required</p>
        
            <?php echo form_label('Lastname*', 'lastname');?>

        <input id="lname" name="lastname"  type="text" /><p id="error1">The field is required</p>
            <?php echo form_label('Email*', 'email');?>
           <input id="email" name="email"  type="text" /><p id="error2">The valid email is required</p>
           <?php echo form_label('Company', 'Team');
            echo form_input('Team');
            echo form_label('Address', 'address');
            echo form_input('address');
            echo form_label('City', 'city');
            echo form_input('city');
            echo form_label('Country*', 'country');?>
            <select name ="country" id="e1" class="select">
            <option value="Australia">Australia</option>
            <?php foreach ($country as $c) {?>
                
            
            <option value="<?php echo $c->name;?>"><?php echo $c->name; ?></option>
            <?php }?>
            
             </select>
            <?php echo form_label('State/Province', 'state');
            echo form_input('state[]', '','class="state"');
            ?>
        
            <select name="state[]" id="e2" class="state1">
            <option value="">------Choose State--------</option> 
            
             <?php foreach ($state as $s) {?>
            <option value="<?php echo $s->name;?>"><?php echo $s->name;?></option> 
             <?php }?>
            </select>
        
            <select name="state[]" id="e3" class="state2">
            <option value="">------Choose State--------</option> 
            
             <?php foreach ($astate as $as) {?>
            <option value="<?php echo $as->astate;?>"><?php echo $as->astate;?></option> 
            <?php }?>
            </select>
            <?php echo form_label('Phone', 'phnum');
            echo form_input('phnum');
            echo form_label('Zip/Postal code', 'zip');
            echo form_input('zip');
            echo form_label('Client since*', 'client_since');
            ?>

            <div id="datetimepick" class="input-append date">
                <input id="client" name="client_since"  type="text" />
                <span class="add-on" >
                    <i class="icon-time"></i>
                </span>
            </div>
           <p id="error3">The field is required</p>
            
        </div>    
   
    
    <div class="modal-footer">
        <?php echo form_submit('submit', 'submit', 'class="client btn btn-primary"');
        ?>
    </div>
        
   
</div>
</div>
<div class="span9">
    <div class="row-fluid">
        <h2>Client List</h2>

        <div class="pull-left"><a href="#myModal" class="btn" data-toggle="modal">Add New</a></div>

<div class="pull-right">
                      <?php echo form_open('', array('method' => 'post', 'name' => 'search')); ?>
                        <input type="text"  name="search" class="search-query" placeholder="Search" class="pull-right" style="margin: 2px 0px 0px -39px;"/>
                    </div>
                     <?php echo form_close(); ?>
      



        <table class="table" >

            <thead>       <tr href style="color: #fff;
                              background-color: #0088cc;
                              font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                              height: 39px;">

                    <td>ID</td>
                    <td>Name</td>
                    <td>Email</td>
                    <td>Country</td>
                    <td> Client Since</td>



                    <td>Action</td>
                </tr>
            </thead>
<?php foreach ($record as $key => $rec) { ?>
                <tbody>
                    <tr><td>
                <?php echo $key + 1; ?>
                <?php echo form_input('id', $rec->c_id, 'class="TextBox input-small"'); ?>
                        <td><div class='firstname'>
                            <?php
                            echo $rec->firstname . "" . "&nbsp" . $rec->lastname . "";
                            echo '</div>';
                            echo form_input('firstname', $rec->firstname, 'class="TextBox1 input-small"');
                            echo form_input('lastname', $rec->lastname, 'class="TextBox2 input-small"');
                            "</td>";
                            echo "<td><div class='email'>";
                            echo $rec->email . "" . "";
                            echo '</div>';
                            echo form_input('email', $rec->email, 'class="TextBox3"');
                            "</td>";?>
                           
                        <td>
                            <div class="country">
                            <?php echo $rec->country . "" . ""; ?>
                            </div>
                                <?php echo form_input('country', $rec->country, 'class="TextBox6 input-small"'); ?>
                        </td>
                        

                        <td>
                            <div class="client_since">
                            <?php echo $rec->client_since . "" . ""; ?>
                            </div>
                             <div id="datetimepicker" class="input-append date">
                                <?php echo form_input('client_since', $rec->client_since, 'class="TextBox7 input-small"'); ?>
                            <span class="add-on on" >
                    <i class="icon-time"></i>
                </span>
            </div>
                        </td>
                        <td>
                            <i class="update icon-check" alt="update" title="update"></i>
                            <i class="delete icon-trash" alt="delete" title="delete"></i>        
                            <i class="edit icon-edit" alt="edit" title="edit"></i> 





                        </td>
                </tbody>
<?php }
?> 
        </table>
    </div>
</div>
</div>
</div>
</body>
</html>


