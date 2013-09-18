
function addNewTask(pID) {

    var save = '<button class="btn save">save</button>';

    var task = '<input type="text" name="Task_title" class="TextBox2" id="task" data-content="The field is required"  data-placement="bottom" value="" >';
    var hours = '<input type="text" name="working_hour[]" class="TextBox3 input-small"" id="hours" data-content="The field is required" data-placement="bottom" value="">';
    var status = '<input type="checkbox" name="status" class="TextBox4 input-small"" value="completed">';
    var project_id = pID;
    var id = '<input type="text" name="project_id" class="TextBox1" value="' + project_id + '" >';
    var $tr = $('<tr/>');
var key= $('.last tr').length;
var akey=parseInt(key)+parseInt(1);
    $tr.append($('<td/>').html(akey));
    $tr.find('td').append(id);
     $tr.find('td').append(status);
    $tr.append($('<td/>').html(task));
    $tr.append($('<td/>').html(hours));
    $tr.append($('<td/>'));

    $tr.append($('<td/>').html(save));


    $('.table .last tr:last').after($tr);
    $('.TextBox1').hide();
}


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




    $(".save").live('click', function() {
        var save = $(this);
        var post_data = save.closest('tr').find('input').serialize();
        var id = $('.TextBox1').val();
        if ($('#task').val() === '')
        {
           $('#task').popover('show');
         
        }
      if ($('#hours').val() === ''){
          $('#hours').popover('show');
      }
          else{
        $.ajax(
                {
                    url: baseurl + "/task/insert/" + id,
                    type: 'POST',
                    data: post_data,
                    dataType: 'json',
                    success: function(result)
                    {



                        var del = '<i class="delete icon-trash" title="delete"></i>';
                        var update = '<i class="update icon-check" title="update"></i>';
                        var edit = '<i class="edit icon-edit" title="edit"></i>  ';

                        var task = '<div class="Task_title">' + result.a[0].Task_title + '</div>';
                        var work = '<div class="working_hour">' + result.a[0].working_hour + '&nbsphrs</div>';
                        var status = '<div class="status">' + result.a[0].status + '</div>';
                        var id ='<input type="text"  class="TextBox" value="' +result.a[0].t_id + '" >'
                        save.closest('tr').find('td').eq(1).append(task);
                        save.closest('tr').find('td').eq(1).append(id);
                        save.closest('tr').find('td').eq(2).append(work);
                        save.closest('tr').find('td').eq(3).append(status);

                        save.closest('tr').find('td').eq(4).append(update);
                        save.closest('tr').find('td').eq(4).append(del);
                        save.closest('tr').find('td').eq(4).append(edit);


                        save.closest('tr').find('.TextBox').hide();
                        save.closest('tr').find('.TextBox1').hide();
                        save.closest('tr').find('.TextBox2 ').hide();
                        save.closest('tr').find('.TextBox3 ').hide();
                        save.closest('tr').find('.TextBox4 ').hide();
                        save.closest('tr').find('.TextBox5 ').hide();
                        save.closest('tr').find('.save ').hide();
                        
                         $('.total').html(result.b+"hours");

                    }
                });

        return false;
          }
    });

    $(".edit").live('click', function() {



        $(this).closest('tr').find('.Task_title').hide();
        $(this).closest('tr').find('.working_hour').hide();
        $(this).closest('tr').find('.status').hide();


        $(this).closest('tr').find('.TextBox2').show();
        $(this).closest('tr').find('.TextBox3').show();
        $(this).closest('tr').find('.TextBox4').show();

    });



    $('.delete').live('click', function() {

        var rem = $(this);
        var answer = confirm("Are you sure?");
        if (answer)
        {
            var del = $(this).closest('tr').find('.TextBox').val();
            $.ajax({
                url: baseurl + "/task/delete/" + del,
                type: 'POST',
                success: function()
                {
                    rem.closest('tr').remove();
                }
            });
            return false;
        }

        else {
            return false;

        }


    });



    $(".TextBox3").live('keyup',function() {

        var form_data = $(".TextBox3").serialize();

        $.ajax({
            url: baseurl + "/task/calculate",
            type: 'POST',
            data: form_data,
            success: function(result)
            {

                $('.total').html(result+"hours");
            }
        });

        return false;
    });

});

$('.update').live('click', function() {
    var update = $(this);
    var up = $(this).closest('tr').find('.TextBox').val();
    var update_data = $(this).closest('tr').find('input').serialize();
    $.ajax(
            {
                url: baseurl + "/task/updatedata/" + up,
                type: 'POST',
                data: update_data,
                dataType: 'json',
                success: function(result)
                {
                  
                    var task = '<input type="text" name="Task_title" class="TextBox2" value="'+ result[0].Task_title + '" >';
                    var hours = '<input type="text" name="working_hour[]" class="TextBox3 input-small"" value="'+result[0].working_hour+'">';
//                    var status = '<input type="checkbox" name="status" class="TextBox4 input-small"" value="'+ result[0].status +'">';

                    var task1 = '<div class="Task_title">' + result[0].Task_title + '</div>';
                    var work1 = '<div class="working_hour">' + result[0].working_hour + '&nbsphrs</div>';
                    var status1 = '<div class="status">' + result[0].status + '</div>';
                    
                  
//                      update.closest('tr').find('td').eq(1).html(status);
                    update.closest('tr').find('td').eq(1).html(task1);
                    update.closest('tr').find('td').eq(1).append(task);
                    update.closest('tr').find('td').eq(3).html(status1);
                    update.closest('tr').find('td').eq(2).html(work1);
                    update.closest('tr').find('td').eq(2).append(hours);
                    update.closest('tr').find('td').eq(3).html(status1);




                    update.closest('tr').find('.TextBox2 ').hide();
                    update.closest('tr').find('.TextBox3 ').hide();
                    update.closest('tr').find('.TextBox4 ').hide();


                }

            });
    return false;

});


