$(document).ready(function() {
    var _val = "";
    $('.search-query').live('keyup', function() {
        _q = $(this).val();
        $('#table tbody tr').each(function() {
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
                 $('.TextBox').hide();
                $('.TextBox1').hide();
                $('.TextBox2').hide();
                $('.TextBox3').hide();
                $('.TextBox4').hide();
                $('.TextBox5').hide();
                 $('.TextBox6').hide();
                  $('.TextBox7').hide();
               
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-1;
               
                $(".edit").live('click', function() {


                    
                    $(this).closest('tr').find('.firstname').hide();
                    $(this).closest('tr').find('.lastname').hide();
                    $(this).closest('tr').find('.email').hide();
                    $(this).closest('tr').find('.Team').hide();
                    $(this).closest('tr').find('.phnum').hide();
                    $(this).closest('tr').find('.address').hide();
                    $(this).closest('tr').find('.country').hide();
                    $(this).closest('tr').find('.TextBox1').show();
                    $(this).closest('tr').find('.TextBox2').show();
                    $(this).closest('tr').find('.TextBox3').show();
                    $(this).closest('tr').find('.TextBox4').show();
                    $(this).closest('tr').find('.TextBox5').show();
                     $(this).closest('tr').find('.TextBox6').show();
                     $(this).closest('tr').find('.TextBox7').show();
                   
                        
                });
                

                $(".btn-primary").on('click',function(){
                   
$('.modal-body').find('input').each(function() {
     if (($(this).val()).length!== 0) {
     
var post_data=$('.modal-body').find('input').serialize();
                     $.ajax(
                        {
                            url: baseurl+"/client/client_insert",
                            type: 'POST',
                            data: post_data,
                            dataType:'json',
                            success: function(result)
                            {
                              var $tr = $('<tr/>');
                          var del= ' <i class="delete icon-trash"></i>  '; 
                           var update = '<i class="update icon-check"></i>';
                           var edit='<i class="edit icon-edit"></i>  ';
                 
                           var firstname = '<input type="text" name="firstname" class="TextBox1 input-small" value="' + result[0].firstname + '" >';
                           var lastname = '<input type="text" name="lastname" class="TextBox2 input-small"" value="' + result[0].lastname + '">';
                           var email = '<input type="text" name="email" class="TextBox3 input-small"" value="' + result[0].email + '">';
                           var team='<input type="text" name="Team" class="TextBox4 input-small" value="' + result[0].Team + '" >';
                           var phnum = '<input type="text" name="phnum" class="TextBox5 input-small" value="' + result[0].phnum + '" >';
                           var address = '<input type="text" name="address" class="TextBox6 input-small" value="' + result[0].address + '" >';
                           var country = '<input type="text" name="country" class="TextBox7 input-small" value="' + result[0].country + '" >';
                         var id= '<input type="text" name="id" class="TextBox input-small" value="'+result[0].c_id+'" >';
                        
                          var firstname1='<div class="firstname">'+result[0].firstname+'</div>';
                        var lastname1='<div class="lastname">'+result[0].lastname+'</div>';
                        var email1='<div class="email">'+result[0].email+'</div>';
                        var team1='<div class="Team">'+result[0].Team+'</div>';
                        var phnum1='<div class="phnum">'+result[0].phnum+'</div>';
                        var address1='<div class="address">'+result[0].address+'</div>';
                        var country1='<div class="country">'+result[0].country+'</div>';
                        
                                   var key= $('table tbody').length;
                         var akey=parseInt(key)+parseInt(1);   
                        $tr.append($('<td/>').html(akey));
                                    $tr.find('td').eq(0).append(id);
                                    $tr.append($('<td/>').html(firstname1));
                                    $tr.find('td').eq(1).append(firstname);
                                    $tr.append($('<td/>').html(lastname1));
                                    $tr.find('td').eq(2).append(lastname);
                                    $tr.append($('<td/>').html(email1));
                                    $tr.find('td').eq(3).append(email);
                                    $tr.append($('<td/>').html(team1));
                                    $tr.find('td').eq(4).append(team);
                                    $tr.append($('<td/>').html(phnum1));
                                    $tr.find('td').eq(5).append(phnum);
                                    $tr.append($('<td/>').html(address1));
                                    $tr.find('td').eq(6).append(address);
                                    $tr.append($('<td/>').html(country1));
                                    $tr.find('td').eq(7).append(country);
                                    
                                    $tr.append($('<td/>').html(update));
                                     $tr.find('td').eq(8).append(del);
                                    $tr.find('td').eq(8).append(edit);
                                   
                                    $('.table tr:last').after($tr);
                                    $('#myModal').modal('hide');
                      
                      $tr.closest('tr').find('.TextBox').hide();
                      $tr.closest('tr').find('.TextBox1').hide();
                      $tr.closest('tr').find('.TextBox2 ').hide();
                      $tr.closest('tr').find('.TextBox3 ').hide();
                      $tr.closest('tr').find('.TextBox4 ').hide();
                      $tr.closest('tr').find('.TextBox5 ').hide();
                      $tr.closest('tr').find('.TextBox6 ').hide(); 
                      $tr.closest('tr').find('.TextBox7 ').hide();
                    
                            }
                        });
            
                return false;
     }
     else{
     alert('empty fields');
        return false;
            }
});
                });
                
                  $('.update').live('click',function(){
                var update = $(this);
                 var email = update.closest('tr').find('.TextBox3');
                        if (!((/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i).test(email.val())))
                        {
                            email.popover({
                                html: true,
                                trigger: 'blur',
                                content: function() {
                                    return 'Invalid Email';

                                }
                            });
                            return false;



                        }
                        else {
                            
                    
                 var up=  $(this).closest('tr').find('.TextBox').val();
                  var update_data=  $(this).closest('tr').find('input').serialize();
        $.ajax(
                {
                    url: baseurl + "/client/cupdatedata/"+up,
                    type: 'POST',
                    data: update_data,
                    dataType: 'json',
                    success: function(result)
                    {
                        var firstname='<input type="text" name="firstname" class="TextBox1 input-small" value="'+result[0].firstname+'" >';
                        var lastname='<input type="text" name="lastname" class="TextBox2 input-small"" value="'+result[0].lastname+'">';
                        var email='<input type="text" name="email" class="TextBox3" value="'+result[0].email+'">';
                        var team='<input type="text" name="Team" class="TextBox4 input-small" value="' + result[0].Team + '" >';
                        var phnum='<input type="text" name="phnum" class="TextBox5 input-small" value="'+result[0].phnum+'" >';
                        var address='<input type="text" name="address" class="TextBox6 input-small" value="'+result[0].address+'" >';
                        var country='<input type="text" name="country" class="TextBox7 input-small" value="'+result[0].country+'" >';
                        
                        var firstname1='<div class="firstname">'+result[0].firstname+'</div>';
                        var lastname1='<div class="lastname">'+result[0].lastname+'</div>';
                        var email1='<div class="email">'+result[0].email+'</div>';
                        var team1='<div class="Team">'+result[0].Team+'</div>';
                        var phnum1='<div class="phnum">'+result[0].phnum+'</div>';
                        var address1='<div class="address">'+result[0].address+'</div>';
                        var country1='<div class="country">'+result[0].country+'</div>';
                        
                        update.closest('tr').find('td').eq(1).html(firstname1);
                        update.closest('tr').find('td').eq(1).append(firstname);
                        update.closest('tr').find('td').eq(2).html(lastname1);
                        update.closest('tr').find('td').eq(2).append(lastname);
                        update.closest('tr').find('td').eq(3).html(email1);
                        update.closest('tr').find('td').eq(3).append(email);
                        update.closest('tr').find('td').eq(4).html(team1);
                        update.closest('tr').find('td').eq(4).append(team);
                        update.closest('tr').find('td').eq(5).html(phnum1);
                        update.closest('tr').find('td').eq(5).append(phnum);
                        update.closest('tr').find('td').eq(6).html(address1);
                        update.closest('tr').find('td').eq(6).append(address);
                        update.closest('tr').find('td').eq(7).html(country1);
                        update.closest('tr').find('td').eq(7).append(country);
                         
                     
                      update.closest('tr').find('.TextBox1').hide();
                      update.closest('tr').find('.TextBox2 ').hide();
                      update.closest('tr').find('.TextBox3 ').hide();
                      update.closest('tr').find('.TextBox4 ').hide();
                      update.closest('tr').find('.TextBox5 ').hide();
                      update.closest('tr').find('.TextBox6 ').hide();
                      update.closest('tr').find('.TextBox7 ').hide();
                    }
                   
                });
                 return false;
            }
                  
    });
    $('.delete').live('click',function(e){
         e.preventDefault();
      var rem=$(this);
       var answer=confirm("Are you sure?");
         if (answer)
        { 
                    var del=  $(this).closest('tr').find('.TextBox').val();
       $.ajax({
        url: baseurl + "/client/cdeletedata/"+del,
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