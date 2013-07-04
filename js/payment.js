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
    $('.update').hide();
    $('.on').hide();
 
     
     $('.modal-body #datetimepick').datetimepicker({
            format: 'yyyy-MM-dd',
            language: 'pt-BR'
        });
    
    $(".edit").live('click', function() {


        $('.edit').hide();
        $('.delete').hide();
        $(this).closest('tr').find('.amount').hide();
        $(this).closest('tr').find('.paid_date').hide();
        $(this).closest('tr').find('.update').show();
        $(this).closest('tr').find('.TextBox1').show();
        $(this).closest('tr').find('.TextBox2').show();
        $(this).closest('tr').find('.on').show();
       
   
     $('#datetimepicker').datetimepicker({
            format: 'yyyy-MM-dd',
            language: 'pt-BR'
        });
        
      });                  $(".btn-primary").live('click',function(){
                           
                     
                   var post_data=$('.modal-body').find('input,select').serialize();
                  
                     $.ajax(
                        {
                            url:baseurl+ "/payment/payment_insert",
                            type: 'POST',
                            data: post_data,
                            dataType:'json',
                            success: function(result)
                            {
                            var del= '<div class="span4"><form action="'+baseurl+'/payment/pdeletedata/'+result[0].p_id+'" method="post">\n\
                                <input type="submit" name="delete" class="delete btn" value="delete"/></div>';
                           
                           var update='<div class="span4"><form action="'+baseurl+'/payment/pupdatedata/'+result[0].p_id+'" method="post">\n\
                                \n\
                            <input type="text" name="amount" class="TextBox1 input-small" value="'+result[0].amount+'" >\n\
                            \n\
                            <div id="datetimepicke" class="input-append date"><input type="text" name="paid_date" class="TextBox2 input-small"" value="'+result[0].paid_date+'">\n\
                            <span class="add-on on" ><i class="icon-time"></i></span></div><input type="submit" name="update" class="update btn" value="update"/></div>';
                           
                            var edit='<div class="span4"><input type="submit" name="edit" class="edit btn" value="edit"></div>';
                            var id='<div class="span4">'+ result[0].pro_id+'</div>';
                             var $tr = $('<tr/>');
                                    $tr.append($('<td/>').html(result[0].p_id));
                                    $tr.append($('<td/>').html(result[0].project_title));
                                    $tr.append($('<td/>').html(result[0].amount));
                                    
                                    $tr.append($('<td/>').html(result[0].paid_date));
                                    $tr.append($('<td/>').html(id));
                                    $tr.find('td').eq(4).append(update);
                                    $tr.find('td').eq(4).append(edit);
                                    $tr.find('td').eq(4).append(del);
                                    
                                   //  $tr.append($('<td/>').html(del));
                                  
                                    $('.table tr:last').after($tr);
                                    
                                    $('#myModal').modal('hide');
                                    $('.TextBox1').hide();
                                    $('.TextBox2').hide();
                                    $('.update').hide();
                                    $('.on').hide();
                                       $('#datetimepicke').datetimepicker({
                                     format: 'yyyy-MM-dd',
                                     language: 'pt-BR'
                                     });

                            }
                        });
                return false;
                });
  
      
       
});