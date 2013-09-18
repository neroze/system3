
<?php $this->load->view('header'); ?> 



<div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
        <h3 id="myModalLabel">Add New</h3>
    </div> 


    <div class="modal-body" >
        <table>
            <tr>
                <td>First Name*:</td>
                <td><input id="fname" name="firstname"  type="text" value="" /></td>
                <td><p id="error">The field is required</p></td>
            </tr>



            <tr><td>     Last Name*:</td>

                <td> <input id="lname" name="lastname"  type="text" /></td>
                <td><p id="error1">The field is required</p></td>
            </tr>
            <tr><td>Email*:</td>
                <td> <input id="email" name="email"  type="text" /></td>
                <td><p id="error2">The valid email is required</p><p id="error4">The client with this email address is already saved</p></td>
            </tr>
            <tr><td>Company*:</td>
                <td><?php echo form_input('Team'); ?></td>
            </tr>
            <tr><td>Address:</td>
                <td><?php echo form_input('address'); ?></td>
            </tr>

            <tr><td>City:</td>
                <td><?php echo form_input('city'); ?></td>
            </tr>
            <tr><td>Country*:</td>
                <td><select name ="country" id="e1" class="select">
                        <option value="Australia">Australia</option>
                        <?php foreach ($country as $c) { ?>


                            <option value="<?php echo $c->name; ?>"><?php echo $c->name; ?></option>
                        <?php } ?>

                    </select></td>
            </tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td></td></tr>
            <tr><td>State/Province:</td>
                <td> <?php echo form_input('state', '', 'class="state"');
                        ?>

                    <select name="state1" id="e2" class="state1">
                        <option value="">------Choose State--------</option> 

                        <?php foreach ($state as $s) { ?>
                            <option value="<?php echo $s->name; ?>"><?php echo $s->name; ?></option> 
                        <?php } ?>
                    </select>

                    <select name="state2" id="e3" class="state2">
                        <option value="">------Choose State--------</option> 

                        <?php foreach ($astate as $as) { ?>
                            <option value="<?php echo $as->astate; ?>"><?php echo $as->astate; ?></option> 
                        <?php } ?>
                    </select>
                </td>
            </tr>
            <tr><td>Zip/Postal code:</td>
                <td> <?php echo form_input('zip'); ?></td>
            </tr>
            <tr><td>Phone:</td>
                <td><?php echo form_input('phnum'); ?></td>
            </tr>



            <tr>  
                <td> Client since*:</td>
                <td><div id="datetimepick" class="input-append date">
                        <input id="client" name="client_since"  type="text" />
                        <span class="add-on" >
                            <i class="icon-time"></i>
                        </span>
                    </div></td>
                <td><p id="error3">The field is required</p></td>

            </tr>
        </table>
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
                                "</td>";
                                ?>

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
       
        <div class="pagination"  >
            <ul>
                <li> <?php echo $this->pagination->create_links(); ?></li>
            </ul>
        </div>
    </div>
</div>
</div>
</div>

</body>
</html>


