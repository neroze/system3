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
                $('.update').hide();
                $('.on').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-
                                   $('.modal-body #datet,#date').datetimepicker({
            format: 'yyyy-MM-dd',
            language: 'pt-BR',
        });
         
                $(".edit").live('click', function() {


                    $('.edit').hide();
                    $('.delete').hide();
                    $(this).closest('tr').find('.title').hide();
                    $(this).closest('tr').find('.start').hide();
                    $(this).closest('tr').find('.end').hide();
                    $(this).closest('tr').find('.update').show();
                    $(this).closest('tr').find('.TextBox1').show();
                    $(this).closest('tr').find('.TextBox2').show();
                    $(this).closest('tr').find('.TextBox3').show();
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
//         $('#datetimepicke').datetimepicker({
//            format: 'yyyy-MM-dd',
//            language: 'pt-BR'
//        });
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
                            var $tr = $('<tr/>');
                            $tr.append($('<td/>').html(result[0].id));
                            $tr.append($('<td/>').html(result[0].title));
                            $tr.append($('<td/>').html(result[0].start));
                            $tr.append($('<td/>').html(result[0].end));
                            $tr.append($('<td/>').html(result[0].budget_amount));
                            $('.table tr:last').after($tr);
                            $('#myModal').modal('hide');
                            $('.delete').show();
                        }
                    });

            return false;
        });
            });