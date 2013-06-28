<div class="container-fluid">
    <div class="row-fluid">
        <div class="span3 bs-docs-sidebar">
            <h3 style="margin: 27px 0px -19px 2px;">Manage user</h3>
            <ul class="nav nav-list bs-docs-sidenav">

                <li class="active"><a href="#anything"><i class="icon-chevron-right"></i> Overview</a></li>
                <li><a href="#nothing"><i class="icon-chevron-right"></i>Describe</a></li>
                <li ><a href="#everything"><i class="icon-chevron-right"></i>Download</a></li>

            </ul>
        </div>
        <div class="span9">
            <div class="row-fluid">
               
               <div class="span3" style="margin-top: 31px;">
                    <ul class="nav nav-pills ">

                        <li class="dropdown">
                            <a class="dropdown-toggle" data-toggle="dropdown" href="" ><!--href style="margin-top: -28px;margin-left: 316px;width: 151px;"-->
                                ATTENDANCE DATE
                                <b class="caret"></b>
                            </a>
                            <ul class="dropdown-menu"  ><!--href style="margin-top: -1px;  margin-left: 325px;"-->

                                <?php
                                foreach ($record as $rec) {

                                    echo '<table class="table">';
                                    echo'<li><a href="http://localhost/attendence_system/index.php/HomeController/manage/' . $rec->date . '"/>';
                                    echo $rec->date . "   " . "";
                                    echo '</a></li>';
                                    echo'</table>';
                                }
                                ?>

                            </ul>
                        </li></div></li>
                        <div class="span6">
                            <?php
                            echo form_open('Homecontroller/checkdate', array('method' => 'post', 'name' => 'range', 'class' => 'navbar-form pull-left', 'style' => 'margin: 27px 0px 0px 0px;'));
                            echo '<c>From</c>'; //echo form_label('From','',array('id'=>'label')); 
                            echo  '<div id="datetimepicker" class="input-append date">';
                            echo form_input('date1', '', 'class="date1" ', 'id="dp1" ');
                            echo '<span class="add-on" >
                             <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span></div>';
                            echo'<c1>To</c1>';
                             echo  '<div id="datetimepicke" class="input-append date">';
                            echo form_input('date2', '', 'class="date2"', 'id="dp2" ');
                            echo '<span class="add-on" style="margin: 0px 7px 0px -12px;">
                             <i data-time-icon="icon-time" data-date-icon="icon-calendar"></i>
                            </span></div>';
                            echo form_submit('submit', 'checkdate', 'class="btn btn1"');
                            echo form_close();
                            ?>

                        </div>
                
                <div class="span1">
                    <a class="brand">
                        <div class="nav-collapse collapse">
                            <div class="navbar-search pull-left">
                                <?php echo form_open('Homecontroller/search', array('method' => 'post', 'name' => 'search')); ?>
                                <input type="text"  name="search" class="search-query" placeholder="Search" style="margin-left:-18px;margin-top: 28px;"/>
                            </div>
                            <?php echo form_close(); ?>
                        </div></a></div>
                </ul>
                
            </div>

        </div>
        <div class="span9" style="margin-top: -9px;">




            <table class="table" >

                <tr href style="color: #fff;
                    background-color: #0088cc;
                    font-family: Helvetica Neue, Helvetica, Arial, sans-serif;
                    height: 39px;">

                    <td>ID</td>
                    <td>Date</td>
                    <td>USername</td>
                    <td>CheckIn</td>
                    <td>CheckOut</td>
                    <td>Worked Time</td>

                </tr>

                <?php
                foreach ($records as $key => $rec) {
                    echo'<tr id="employee_' . $key . '" ><td>';
                    echo $rec->id . "" . "</td>";
                    echo "<td>";
                    echo $rec->date . "   " . "</td>";
                    echo "<td>";
                    echo $rec->username . "   " . "</td>";
                    echo form_open("HomeController/save/$rec->id", array('method' => 'post', 'name' => 'update', 'id' => 'check'));
                    echo '<td>';
                    $s = json_decode($rec->checkin);
                    foreach ($s as $key => $val) {

                        echo '<div class="in">';
                        echo $in = $val . "";
                        echo '</div>';

                       echo  '<div class="input-append bootstrap-timepicker">';

                        echo form_input('checkin[]', $in, 'class="TextBox1 input-small"');
                        echo '<span class="add-on on" >
                             <i class="icon-time"></i>
                            </span></div>';
                    }
                    "</td>";
                    echo '<td>';
                    $r = json_decode($rec->checkout);
                    foreach ($r as $k => $v) {


                        echo '<div class="out">';
                        echo $out = $v . "";
                        echo '</div>';
                        echo  '<div class="input-append bootstrap-timepicker">';
                        echo form_input('checkout[]', $out, 'class="TextBox2 input-small"');
                         echo '<span class="add-on on" >
                             <i class="icon-time"></i>
                            </span></div>';
                    }
                    "</td>";
                    echo "<td>";
                    echo '<div class="span8">';
                    echo '<div class="row-fluid">';
                    echo'<div class="span4">';

                    $w = json_decode($rec->worked);

                    echo '<div class="work">';
                    echo $w;
                    echo '</div></div>';
                    echo form_input('worked', $w, 'class="TextBox3"');

                    echo
                    '<div class="span4">';
                    // echo '<div class="btn">';
                    echo form_submit('submit', 'update', 'class="update btn"');

                    echo form_close();
                    echo form_submit('submit', 'edit', 'class="edit btn"');
                    //'</div>';
                    '</div></div>';
                    "</td></tr>";
                }
                ?> 
            </table>

        </div>
        <div class="pagination"  >
            <ul>
                <li> <?php echo $this->pagination->create_links(); ?></li>
            </ul>
        </div>

    </div>
</div>

<script>
    jQuery(document).ready(function() {

        $('.TextBox1').hide();
        $('.TextBox2').hide();
        $('.TextBox3').hide();
        $('.update').hide();
        $('.on').hide();
        //var row=($(this).attr('id'));
        // var row = ($('tr').length)-1;
        $(".edit").live('click', function() {


            $('.edit').hide();
            $(this).closest('tr').find('.in').hide();
            $(this).closest('tr').find('.out').hide();
            $(this).closest('tr').find('.work').hide();
            $(this).closest('tr').find('.check').hide();
            $(this).closest('tr').find('.out').hide();
            $(this).closest('tr').find('.update').show();
            $(this).closest('tr').find('.TextBox1').show();
            $(this).closest('tr').find('.TextBox2').show();
            $(this).closest('tr').find('.TextBox3').show();
            $(this).closest('tr').find('.on').show();
            //$.each(row,function(index){


            $("input").blur(function() {
//                var check = $(this).closest('tr').find('input');
//                
//                var method = $.validator.addMethod(check, function(value, element) {
//                  return this.optional(element) || /^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/i.test(value);
//                }, "");
//                $(this).validate({
//                rules: {
//                    'checkin[]': {
//                        required: true
//                    },
//                    'checkout[]': {
//                        rules: {
//                            required: true
//                        }
//                    }
//                }
//            });
                if (!(this.value.match(/^(([0-1]?[0-9])|([2][0-3])):([0-5]?[0-9])(:([0-5]?[0-9]))?$/i))) {
                    $(this).popover({
                        html: true,
                        trigger: 'blur',
                        content: function() {
                            return 'Invalid Time';

                        }
                    });
                    return false;
                       
                    
                }
                else {



                    var form_data = $(this).closest('tr').find('input').serialize();
                }




                $.ajax(
                        {
                            url: "<?php echo site_url("HomeController/calculate_time_lap"); ?>",
                            type: 'POST',
                            data: form_data,
                            success: function(result)
                            {
                               // alert(result);
                                $('input').closest('tr').find('.TextBox3').val(result);
                            }
                        });

                return false;
            });


        });
    });

    //  });
</script>
 <script type="text/javascript">
      $('#datetimepicker').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR'
      });
        $('#datetimepicke').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR'
      });
       $('.TextBox1').timepicker({
      
        showSeconds:true,
          showMeridian:false
    });
      $('.TextBox2').timepicker({
          showSeconds:true,
          showMeridian:false
      });
    </script>