
                <?php $this->load->view('header'); ?> 




                </div>
                <div class="span9">
                    <div class="row-fluid">
                        <h2><?php foreach ($title as $rec) {

                } echo $rec->title; ?>/Tasks</h2>
                <!--                            <div id="project_id" style="display:none;"><?php echo $project_id; ?></div>-->
                        <div class="pull-left newtask btn" onclick="addNewTask(<?php echo $project_id; ?>);">Add New</div>


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

                                    <td>ID</td>
                                    <td>Task Title</td>
                                    <td>Working Hours</td>
                                    <td>Status</td>
                                    <td>Action</td>
                                </tr>
                            </thead>
                                        <?php foreach ($record as $key => $rec) { ?>
                                <tbody class="last"><tr><td>
                                            <?php echo $key + 1; ?>
                                            <?php echo form_input('t_id', $rec->t_id, 'class="TextBox input-small"'); ?>
                                                 <input type="checkbox" name="status" class="TextBox4">
                                            <?php echo form_input('project_id', $rec->project_id, 'class="TextBox1 input-small"'); ?>
                                        </td>
                                        <td>
                                           
                                            <div class="Task_title">
                                                <?php echo $rec->Task_title; ?>
                                            </div>
                                            <?php echo form_input('Task_title', $rec->Task_title, 'class="TextBox2"'); ?>
                                        </td>
                                        <td><div class='working_hour'>
                                                <?php echo "$rec->working_hour hrs"; ?>
                                            </div>
                                            <?php echo form_input('working_hour[' . $key . ']', $rec->working_hour, 'class="TextBox3 input-small"'); ?>
                                        </td>
                                        <td>
                                            <div class='status'>
                                                <?php echo $rec->status; ?>
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
                            <tr  href style="color: #fff;
                                              background-color: #0088cc;
                                              font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                                              height: 39px;"">
                                <td><strong>Total working Time</strong></td>
                                <td></td>
                                <td colspan="3"> <div class="total">
                                        <?php
                                        $sum = 0;
                                        foreach ($total as $val) {

                                            $sum += $val->working_hour;
                                            
                                        }
                                        echo" $sum hours";
                                        ?>
                                    </div></td>
                            </tr>
                        </table>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>


