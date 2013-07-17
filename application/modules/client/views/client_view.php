
                <?php $this->load->view('header');?> 
               
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
                        echo validation_errors('firstname');
                        echo form_input('firstname');
                        echo form_label('Lastname', 'lastname');
                        echo validation_errors('lastname');
                        echo form_input('lastname');
                        echo form_label('Email', 'email');
                        echo validation_errors('email');
                        echo form_input('email');
                        echo form_label('Team', 'Team');
                        echo form_input('Team');
                        echo form_label('Ph-num', 'phnum');
                        echo form_input('phnum');
                        echo form_label('Address', 'address');
                        echo form_input('address');
                        echo form_label('Country', 'country');
                        echo form_input('country');?>
                        </div>
                        </div>
                        <div class="modal-footer">
                        <?php echo form_submit('submit', 'submit', 'class="btn btn-primary"');

                        
                        ?>
                                </div>
                            </div>
                         
                    
                </div>
                <div class="span9">
                    <div class="row-fluid">
                            <h2>Client List</h2>
                         
                        <div class="pull-left"><a href="#myModal" class="btn" data-toggle="modal">Add New</a></div>
                        

                                    <div class="pull-right">
                                        <?php echo form_open('client/c_search', array('method' => 'post', 'name' => 'search')); ?>
                                          <input type="text"  name="search" class="search-query" placeholder="Search" class="pull-right" style="margin: 2px 0px 0px -39px;"/>
                                   
                                    <?php echo form_close(); ?>
                                    </div>



                    <table class="table" >

                 <thead>       <tr href style="color: #fff;
                            background-color: #0088cc;
                            font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                            height: 39px;">

                            <td>Client_ID</td>
                            <td>Firstname</td>
                            <td>Lastname</td>
                            <td>Email</td>
                            <td>Team</td>
                            <td>Ph-num</td>
                            <td>Address</td>
                            <td>Country</td>
                            <td>Action</td>
                        </tr>
                 </thead>
                        <?php
                        foreach ($record as $key => $rec) {?>
                    <tbody><tr><td>
                            <?php
                            echo $key+1 ;?>
                            <?php echo form_input('id', $rec->c_id, 'class="TextBox input-small"');?>
                            <td><div class='firstname'>
                            <?php
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
                              echo "<td><div class='Team'>";
                            echo $rec->Team . "" . "";
                            echo '</div>';
                            echo form_input('Team', $rec->Team, 'class="TextBox4 input-small"');
                            "</td>";
                            echo "<td><div class='phnum'>";
                            echo $rec->phnum . "" . "";
                            echo '</div>';
                            echo form_input('phnum', $rec->phnum, 'class="TextBox5 input-small"');
                            "</td>";
                            echo "<td><div class='address'>";
                            echo $rec->address . "" . "";
                            echo'</div>';
                            echo form_input('address', $rec->address, 'class="TextBox6 input-small"');?>
                            </td>


                            <td>
                            <div class="country">
                            <?php
                            echo $rec->country . "" . "";?>
                            </div>
                            <?php echo form_input('country', $rec->country, 'class="TextBox7 input-small"');?>
                            
                                 <td>
                            <i class="update icon-check" alt="update"></i>
                            <i class="delete icon-trash" alt="delete"></i>        
                            <i class="edit icon-edit" alt="edit"></i> 
                                     
                          
                            
                            
                            
    </td>
                           </tbody>
                     <?php   }
                        ?> 
                    </table>
                </div>
            </div>
        </div>
</div>
    </body>
</html>


