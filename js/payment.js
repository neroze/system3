 $(document).ready(function() {
               // $("#e1").select2();
                $('.TextBox1').hide();
                $('.TextBox2').hide();
                $('.update').hide();
                //var row=($(this).attr('id'));
                // var row = ($('tr').length)-1;
             
                $(".edit").live('click', function() {


                    $('.edit').hide();
                    $('.delete').hide();
                    $(this).closest('tr').find('.amount').hide();
                    $(this).closest('tr').find('.paid_date').hide();
                    $(this).closest('tr').find('.update').show();
                    $(this).closest('tr').find('.TextBox1').show();
                    $(this).closest('tr').find('.TextBox2').show();
                });
            });