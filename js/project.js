      $(document).ready(function() {
                $("#e1").select2();
                $('.TextBox1').hide();
                $('.TextBox2').hide();
                $('.TextBox3').hide();
                $('.update').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-
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
                });
            });