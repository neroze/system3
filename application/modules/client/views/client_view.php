
<?php $this->load->view('header'); ?> 

<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add New</h3>
    </div>   
    <div class="modal-body">
        <div class="span2"></div>
        <div class="span4">
            <?php
            echo form_label('Firstname', 'firstname');

            echo form_input('firstname');
            echo form_label('Lastname', 'lastname');

            echo form_input('lastname');
            echo form_label('Email', 'email');
            echo form_input('email');
            echo form_label('Company', 'Team');
            echo form_input('Team');
            echo form_label('Address', 'address');
            echo form_input('address');
            echo form_label('City', 'city');
            echo form_input('city');
            echo form_label('Country', 'country');
            echo form_input('country');
            echo form_label('State/Province', 'state');
            echo form_input('state');
            echo form_label('Phone', 'phnum');
            echo form_input('phnum');
            echo form_label('Zip/Postal code', 'zip');
            echo form_input('zip');
            echo form_label('Client since', 'client_since');
            ?>

            <div id="datetimepick" class="input-append date">
                <?php echo form_input('client_since'); ?>
                <span class="add-on" >
                    <i class="icon-time"></i>
                </span>
            </div>
        </div>
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
                      <?php echo form_open('project/pro_search', array('method' => 'post', 'name' => 'search')); ?>
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
                    <td>Phone</td>
                    <td>Zip/Postal Code</td>
                    <td>Country</td>
                    <td> Client Since</td>



                    <td>Action</td>
                </tr>
            </thead>
<?php foreach ($record as $key => $rec) { ?>
                <tbody><tr><td>
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
                            "</td>";
                            echo "<td><div class='phnum'>";
                            echo $rec->phnum . "" . "";
                            echo '</div>';
                            echo form_input('phnum', $rec->phnum, 'class="TextBox4 input-small"');
                            "</td>";
                            echo "<td><div class='zip'>";
                            echo $rec->zip . "" . "";
                            echo '</div>';
                            echo form_input('zip', $rec->zip, 'class="TextBox5"');
                            ?>
                        </td>
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
                            <i class="update icon-check" alt="update"></i>
                            <i class="delete icon-trash" alt="delete"></i>        
                            <i class="edit icon-edit" alt="edit"></i> 





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


