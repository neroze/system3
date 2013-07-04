<?php $this->load->view('header'); ?>
<div class="span6">
    <div id="myModal" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-header">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
            <h3 id="myModalLabel">Add New</h3>
        </div>    <div class="modal-body">
            <?php
            echo form_open('', array('method' => 'post', 'name' => ''));
            echo form_label('Title', 'title');
            echo form_input('title');
            echo form_label('Client', 'client');
            ?>
            <select name ="e1" id="e1">
                <?php foreach ($records as $reco) { ?>
                    <option value='<?php echo $reco->c_id; ?>'><?php echo $reco->firstname . "", $reco->lastname . "";
            }
                ?></option>       

            </select>
            <?php
            echo form_label('Start-Date', 'start_date');?>
            <div id="datet" class="input-append date">
            <?php echo form_input('start_date');?>
            <span class="add-on">
                <i class="icon-time"></i>
            </span></div>
            <?php echo form_label('End-Date', 'end_date');?>
            <div id="date" class="input-append date">
            <?php echo form_input('end_date');?>
            <span class="add-on" >
                <i class="icon-time"></i>
            </span></div>
            <?php echo form_label('Total Budget', 'budget_amount');
            echo form_input('budget_amount');
            ?>
        </div>
        <div class="modal-footer">
            <?php
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
                      <?php echo form_open('project/pro_search', array('method' => 'post', 'name' => 'search')); ?>
                        <input type="text"  name="search" class="search-query" placeholder="Search" style="margin-left:-18px;"/>
                    </div>
                     <?php echo form_close(); ?>
                </div></a></div>
        </ul>
    </div>

</div>
<div class="span9" style="margin-top: -10px;">




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
            <td></td>

        </tr>
    </thead>    
        <?php
        foreach ($record as $rec) {?>
            <tbody>
                <tr><td>
            <?php
            echo $rec->id . "" . "</td>";
            echo form_open("project/pro_updatedata/$rec->id", array('method' => 'post', 'name' => 'update', 'id' => 'check'));
            echo "<td><div class='title'>";
            echo $rec->title . "" . "<br/>";
            echo '(';
            echo $rec->client_firstname . "" . "", $rec->last . "" . "";
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
    <?php
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
    echo form_open('project/deletedata/' . $rec->id, array('method' => 'post'));
    echo form_submit('delete', 'delete', 'class="delete btn"');
    echo form_close();?>
     </td></div></div></tr>
<?php }
?>
</tbody>
 
</table>
</div>
</div>
</div>

</body>
</html>


