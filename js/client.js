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

                $('.TextBox1').hide();
                $('.TextBox2').hide();
                $('.TextBox3').hide();
                $('.TextBox4').hide();
                $('.TextBox5').hide();
                 $('.TextBox6').hide();
                $('.update').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-1;
               
                $(".edit").live('click', function() {


                    $('.edit').hide();
                    $('.delete').hide();
                    $(this).closest('tr').find('.firstname').hide();
                    $(this).closest('tr').find('.lastname').hide();
                    $(this).closest('tr').find('.email').hide();
                    $(this).closest('tr').find('.phnum').hide();
                    $(this).closest('tr').find('.address').hide();
                    $(this).closest('tr').find('.country').hide();
                    $(this).closest('tr').find('.update').show();
                    $(this).closest('tr').find('.TextBox1').show();
                    $(this).closest('tr').find('.TextBox2').show();
                    $(this).closest('tr').find('.TextBox3').show();
                    $(this).closest('tr').find('.TextBox4').show();
                    $(this).closest('tr').find('.TextBox5').show();
                     $(this).closest('tr').find('.TextBox6').show();

                    var email = $(this).closest('tr').find('.TextBox3');
                    email.blur(function() {
                        if (!((/^\b[A-Z0-9._%-]+@[A-Z0-9.-]+\.[A-Z]{2,4}\b$/i).test(email.val())))
                        {
                            $(this).popover({
                                html: true,
                                trigger: 'blur',
                                content: function() {
                                    return 'Invalid Email';

                                }
                            });
                            return false;



                        }
                        else {
                            return true;
                        }
                    });
                        
                });
                
                
                $(".btn-primary").live('click',function(){
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
                                    $tr.append($('<td/>').html(result[0].c_id));
                                    $tr.append($('<td/>').html(result[0].firstname));
                                    $tr.append($('<td/>').html(result[0].lastname));
                                    $tr.append($('<td/>').html(result[0].email));
                                    $tr.append($('<td/>').html(result[0].phnum));
                                    $tr.append($('<td/>').html(result[0].address));
                                    $tr.append($('<td/>').html(result[0].country));
                                //  $tr.append($('<td/>').find('.edit').show());
                                  //   $('.delete').show();
                                    $('.table tr:last').after($tr);
                                    $('#myModal').modal('hide');
                            }
                        });

                return false;
                });

            });