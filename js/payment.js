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
                 $('.TextBox').hide();
                $('.TextBox1').hide();
                $('.TextBox2').hide();
                $('.TextBox3').hide();
                 $('.TextBox4').hide();
                $('.on').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-
          $('#datetimepick').datetimepicker({
        format: 'yyyy-MM-dd',
        language: 'pt-BR'
    });
         
                $(".edit").live('click', function() {


          $(this).closest('tr').find('.amount').hide();
        $(this).closest('tr').find('.paid_date').hide();
        $(this).closest('tr').find('.TextBox1').show();
        $(this).closest('tr').find('.TextBox2').show();
        $(this).closest('tr').find('.on').show();

                             $('#datetimepicker,#datetimep').datetimepicker({
                            format: 'yyyy-MM-dd',
                            language: 'pt-BR'
                        });
    });
       
        
        
        $(".btn-primary").on('click', function() {
            $('.modal-body').find('input').each(function() {
     if (($(this).val()).length!== 0) {
            var post_data = $('.modal-body').find('input,select').serialize();
          
            $.ajax(
                    {
                        url: baseurl + "/payment/payment_insert",
                        type: 'POST',
                        data: post_data,
                        dataType: 'json',
                        success: function(result)
                        {
                            var del= '<i class="delete icon-trash"></i>'; 
                           var update ='<i class="update icon-check"></i>';
                           var edit='<i class="edit icon-edit"></i>  ';
                            var paid_date='<div id="datetimepicker" class="input-append date"><input type="text" name="paid_date" class="TextBox2 input-small"" value="'+result[0].paid_date+'">\n\
                           <span class="add-on on" ><i class="icon-time"></i></span></div>';
                        var id ='<input type="text" name="id" class="TextBox input-small" value="'+result[0].p_id+'" >';
                         var amount='<input type="text" name="amount" class="TextBox2 input-small" value="'+result[0].amount+'" >';
                        var amount2='<div class="amount">'+result[0].amount+'</div>';
                        var paid_date2='<div class="paid_date">'+result[0].paid_date+'</div>';
                        var $tr = $('<tr/>');
                        
                       var key= $('.mero tr').length;
                         var akey=parseInt(key)+parseInt(1);   
                        $tr.append($('<td/>').html(akey));
                        
                         $tr.find('td').eq(0).append(id);
                        $tr.append($('<td/>').html(result[0].project_title));
                        $tr.append($('<td/>').html(amount2));
                        $tr.find('td').eq(2).append(amount);
                        $tr.append($('<td/>').html(paid_date2));
                        $tr.find('td').eq(3).append(paid_date);
                        $tr.append($('<td/>').html(result[0].pro_id));
                         
                            $tr.append($('<td/>').html(update));
                            $tr.find('td').eq(5).append(del);
                            $tr.find('td').eq(5).append(edit);
                          
                            $('.table tr:last').after($tr);
                            $('#myModal').modal('hide');
                            
                       $tr.closest('tr').find('.TextBox').hide();
                        $tr.closest('tr').find('.TextBox1').hide();
                        $tr.closest('tr').find('.TextBox2').hide();
                        $tr.closest('tr').find('.on').hide();
                      
                        }
                    });
            
            return false;
            
            }
            else{alert('empty fields');
            return false;}
        });
       
       
       
        });
        
        $('.update').live('click',function(){
    var update=$(this);
            var up=  $(this).closest('tr').find('.TextBox').val();
        var update_data=  $(this).closest('tr').find('input').serialize();
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
                      update.closest('tr').find('.TextBox1').hide();
                      update.closest('tr').find('.TextBox2 ').hide();
                      update.closest('tr').find('.on').hide(); 
                     
                    }
                   
                });
                 return false;
        
    });
  $('.delete').live('click',function(e){
         e.preventDefault();
      var rem=$(this);
       var answer=confirm("Are you sure?");
         if (answer)
        { 
                    var del=  $(this).closest('tr').find('.TextBox').val();
       $.ajax({
        url: baseurl + "/payment/pdeletedata/"+del,
                    type: 'POST',
                     success: function()
                    {
                        rem.closest('tr').remove();
                    }
       });
       return false;
        }   
        
        else{
            return false;
            
    }

      
    });


            });