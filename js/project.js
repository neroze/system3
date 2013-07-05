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
                $('.TextBox3').hide();
                 $('.TextBox4').hide();
                $('.on').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-
        
            $('#datet,#date').datetimepicker({
            format: 'yyyy-MM-dd',
            language: 'pt-BR'
        });
                $(".edit").live('click', function() {


                    
                    $(this).closest('tr').find('.title').hide();
                    $(this).closest('tr').find('.start').hide();
                    $(this).closest('tr').find('.end').hide();
                    $(this).closest('tr').find('.budget').hide();
                    $(this).closest('tr').find('.update').show();
                    $(this).closest('tr').find('.TextBox1').show();
                    $(this).closest('tr').find('.TextBox2').show();
                    $(this).closest('tr').find('.TextBox3').show();
                    $(this).closest('tr').find('.TextBox4').show();
                    $(this).closest('tr').find('.on').show();
                    var date1 = $(this).closest('tr').find('.TextBox2');
                    var date2 = $(this).closest('tr').find('.TextBox3');
                    date1.blur(function() {

                        if (!(date1.val().match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/))) {
                            $(this).popover({
                                html: true,
                                trigger: 'blur',
                                content: function() {
                                    return 'Invalid Date';

                                }
                            });
                            return false;



                        } else {
                            return true;
                        }
                    });
                    date2.blur(function() {

                        if (!(date2.val().match(/^\d{4}-((0\d)|(1[012]))-(([012]\d)|3[01])$/))) {
                            $(this).popover({
                                html: true,
                                trigger: 'blur',
                                content: function() {
                                    return 'Invalid Date';

                                }
                            });
                            return false;



                        }
                        else {
                            return true;
                        }
                    });
                           $('#datetimepicker,#datetimepicke').datetimepicker({
                             format: 'yyyy-MM-dd',
                             language: 'pt-BR'
                              });
      
                });
         
       
        
        
        $(".btn-primary").on('click', function() {
            var post_data = $('.modal-body').find('input,select').serialize();
            $.ajax(
                    {
                        url: baseurl + "/project/pro_insert",
                        type: 'POST',
                        data: post_data,
                        dataType: 'json',
                        success: function(result)
                        {
                             var del= '<div class="span4"><input type="submit" name="delete" class="delete btn" value="delete"/></div>'; 
                           var update='<div class="span4"><input type="submit" name="update" class="update btn" value="update"/></div>';
                          var edit='<div class="span4"><input type="submit" name="edit" class="edit btn" value="edit"></div>';
                          var title='<input type="text" name="title" class="TextBox1 input-small" value="'+result[0].title+'" >';
                        var start='<div id="datetimepicker" class="input-append date"><input type="text" name="start_date" class="TextBox2 input-small"" value="'+result[0].start+'">\n\
                           <span class="add-on on" ><i class="icon-time"></i></span></div>';
                        var end='<div id="datetimepicker" class="input-append date"><input type="text" name="end_date" class="TextBox3 input-small"" value="'+result[0].end+'">\n\
                           <span class="add-on on" ><i class="icon-time"></i></span></div>';
                       var budget='<input type="text" name="budget_amount" class="TextBox4 input-small" value="'+result[0].budget_amount+'" >';
                        var id= '<input type="text" name="id" class="TextBox input-small" value="'+result[0].id+'" >';
                        
                          var title1='<div class="title">'+result[0].title+'</div>';
                        var start2='<div class="start">'+result[0].start+'</div>';
                        var end2='<div class="end">'+result[0].end+'</div>';
                        var budget_amount2='<div class="budget">'+result[0].budget_amount+'</div>';
                            var $tr = $('<tr/>');
                            $tr.append($('<td/>').html(result[0].id));
                            $tr.find('td').eq(0).append(id);
                            $tr.append($('<td/>').html(title1));
                            $tr.find('td').eq(1).append(title);
                            $tr.append($('<td/>').html(start2));
                            $tr.find('td').eq(2).append(start);
                            $tr.append($('<td/>').html(end2));
                              $tr.find('td').eq(3).append(end);
                            
                            $tr.append($('<td/>').html(budget_amount2));
                            $tr.find('td').eq(4).append(budget);
                            
                            $tr.append($('<td/>').html(del));
                            $tr.find('td').eq(5).append(edit);
                            $tr.find('td').eq(5).append(update);
                            $('.table tr:last').after($tr);
                            $('#myModal').modal('hide');
                            
                       $('.TextBox').hide();
                      $('.TextBox1').hide();
                      $('.TextBox2 ').hide();
                       $('.TextBox3 ').hide();
                        $('.TextBox4 ').hide();
                      $('.on').hide(); 
                      
                        }
                    });

            return false;
        });
        
        $('.update').live('click',function(){
    var update=$(this);
            var up=  $(this).closest('tr').find('.TextBox').val();
        var update_data=  $(this).closest('tr').find('input').serialize();
        $.ajax(
                {
                    url: baseurl + "/project/pro_updatedata/"+up,
                    type: 'POST',
                    data: update_data,
                    dataType: 'json',
                    success: function(result)
                    {
                        var title='<input type="text" name="title" class="TextBox1 input-small" value="'+result[0].title+'" >';
                        var start='<div id="datetimepicker" class="input-append date"><input type="text" name="start_date" class="TextBox2 input-small"" value="'+result[0].start+'">\n\
                           <span class="add-on on" ><i class="icon-time"></i></span></div>';
                        var end='<div id="datetimepicker" class="input-append date"><input type="text" name="end_date" class="TextBox3 input-small"" value="'+result[0].end+'">\n\
                           <span class="add-on on" ><i class="icon-time"></i></span></div>';
                       var budget='<input type="text" name="budget_amount" class="TextBox4 input-small" value="'+result[0].budget_amount+'" >';
                        
                        var title1='<div class="title">'+result[0].title+'</div>';
                        var start2='<div class="start">'+result[0].start+'</div>';
                        var end2='<div class="end">'+result[0].end+'</div>';
                        var budget_amount2='<div class="budget">'+result[0].budget_amount+'</div>';
                        
                        update.closest('tr').find('td').eq(1).html(title1);
                       update.closest('tr').find('td').eq(1).append(title);
                        update.closest('tr').find('td').eq(2).html(start2);
                       update.closest('tr').find('td').eq(2).append(start);
                      update.closest('tr').find('td').eq(3).html(end2);
                       update.closest('tr').find('td').eq(3).append(end);
                        update.closest('tr').find('td').eq(4).html(budget_amount2);
                         update.closest('tr').find('td').eq(4).append(budget);
                     
                      $('.TextBox1').hide();
                      $('.TextBox2 ').hide();
                       $('.TextBox3 ').hide();
                        $('.TextBox4 ').hide();
                      $('.on').hide(); 
                     
                    }
                   
                });
                 return false;
        
    });
    $('.delete').live('click',function(){
        $(this).closest('tr').remove();
            var del=  $(this).closest('tr').find('.TextBox').val();
       $.ajax({
        url: baseurl + "/project/deletedata/"+del,
                    type: 'POST',
                     success: function()
                    {
                        
                    }
       });
       return false;
    });
            });