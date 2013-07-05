$(document).ready(function() {
    var _val = "";
    $('.search-query').live('keyup', function() {
        _q = $(this).val();
        $('.table tbody tr').each(function() {
            var _tr = this;
            $(this).find('td').each(function() {
                _val += $(this).text() + '';
            });
            _val = _val.toLowerCase();
            _data = _val.search(_q);
            if (_data > -1) {
                console.log('found here');
                $(_tr).fadeIn();
            } else {
                $(_tr).fadeOut();
                console.log('not found here');
            }
            _val = "";
        });
    });
    $("#e1").select2();
    $('.TextBox1').hide();
    $('.TextBox2').hide();
    $('.on').hide();
    $('.TextBox').hide();


    $('#datetimepick').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR'
    });

    $(".edit").live('click', function() {


        $(this).closest('tr').find('.amount').hide();
        $(this).closest('tr').find('.paid_date').hide();
        $(this).closest('tr').find('.update').show();
        $(this).closest('tr').find('.TextBox1').show();
        $(this).closest('tr').find('.TextBox2').show();
        $(this).closest('tr').find('.on').show();

        $('#datetime').datetimepicker({
            format: 'yyyy-MM-dd',
            language: 'pt-BR'
        });

    });
    
    
    
    
    $(".btn-primary").live('click', function() {


        var post_data = $('.modal-body').find('input,select').serialize();

        $.ajax(
                {
                    url: baseurl + "/payment/payment_insert",
                    type: 'POST',
                    data: post_data,
                    dataType: 'json',
                    success: function(result)
                    {
                        var del= '<div class="span3"><input type="submit" name="delete" class="delete btn" value="delete"/></div>'; 
                        var update='<div class="span4"><input type="submit" name="update" class="update btn" value="update"/></div>';
                        var edit='<div class="span2"><input type="submit" name="edit" class="edit btn" value="edit"></div>';
                        var amount='<input type="text" name="amount" class="TextBox2 input-small" value="'+result[0].amount+'" >';
                        var paid_date='<div id="datetimepicker" class="input-append date"><input type="text" name="paid_date" class="TextBox2 input-small"" value="'+result[0].paid_date+'">\n\
                           <span class="add-on on" ><i class="icon-time"></i></span></div>';
                        var id ='<input type="text" name="id" class="TextBox input-small" value="'+result[0].p_id+'" >';
                        
                        var amount2='<div class="amount">'+result[0].amount+'</div>';
                        var paid_date2='<div class="paid_date">'+result[0].paid_date+'</div>';
                        var $tr = $('<tr/>');
                        $tr.append($('<td/>').html(result[0].p_id));
                        $tr.find('td').eq(0).append(id);
                        $tr.append($('<td/>').html(result[0].project_title));
                        $tr.append($('<td/>').html(amount2));
                        $tr.find('td').eq(2).append(amount);
                        $tr.append($('<td/>').html(paid_date2));
                        $tr.find('td').eq(3).append(paid_date);
                        $tr.append($('<td/>').html(result[0].pro_id));
                        $tr.append($('<td/>').html(del));
                        $tr.find('td').eq(5).append(edit);
                        $tr.find('td').eq(5).append(update);

                        $('.table tr:last').after($tr);
                        
                        $('#myModal').modal('hide');
                        $('.TextBox').hide();
                        $('.TextBox1').hide();
                        $('.TextBox2').hide();
                        $('.on').hide();
                        $('#datetimepicker').datetimepicker({
                            format: 'yyyy-MM-dd',
                            language: 'pt-BR'
                        });

                    }
                });
        return false;
    });
    $('.update').live('click',function(){
    var update = $(this);
            var up=  $(this).closest('tr').find('.TextBox').val();
        var update_data=  $(this).closest('tr').find('.TextBox1,.TextBox2').serialize();
        $.ajax(
                {
                    url: baseurl + "/payment/pupdatedata/"+up,
                    type: 'POST',
                    data: update_data,
                    dataType: 'json',
                    success: function(result)
                    {
                        
                        var amount='<input type="text" name="amount" class="TextBox1 input-small" value="'+result[0].amount+'" >';
                        var paid_date='<div id="datetimepicker" class="input-append date"><input type="text" name="paid_date" class="TextBox2 input-small"" value="'+result[0].paid_date+'">\n\
                           <span class="add-on on" ><i class="icon-time"></i></span></div>';
                        var amount2='<div class="amount">'+result[0].amount+'</div>';
                        var paid_date2='<div class="paid_date">'+result[0].paid_date+'</div>';
                        //var update=$('.update');
                          update.closest('tr').find('td').eq(2).html(amount2);
                          update.closest('tr').find('td').eq(2).append(amount);
                          update.closest('tr').find('td').eq(3).html(paid_date2);
                          update.closest('tr').find('td').eq(3).append(paid_date);
                      $('.TextBox1').hide();
                      $('.TextBox2 ').hide();
                      $('.on').hide(); 
                     
                    }
                   
                });
                 return false;
        
    });
    $('.delete').live('click', function() {
        $(this).closest('tr').remove();
        var del = $(this).closest('tr').find('.TextBox').val();
        $.ajax({
            url: baseurl + "/payment/pdeletedata/" + del,
            type: 'POST',
            success: function()
            {
       
            }
        });
        return false;
    });



});