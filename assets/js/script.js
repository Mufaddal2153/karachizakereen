$(document).on('keydown', 'input.search-text', function(e) {
    if (e.keyCode == 13) {
        $('.search-submit').trigger('click');
    }
});

$(document).on('click', ".teeper-login-form #submit", async function(e) {
    e.preventDefault();
    console.log('clicked');
    var data = $('.teeper-login-form').serializeArray();
    console.log({data});
    $.ajax({
        url: baseUrl + 'verifyTeeper',
        type: 'POST',
        dataType: 'json',
        data: data,
        beforeSend: function() {
            $('.teeper-login-form #submit').hide();
            $('.teeper-login-form').before('<div class="loading-search"></div>');
        },
        success: function(res) {
            if (typeof res.error != 'undefined') {
                $('.teeper-login-form #submit').show();
                $('.teeper-login-form .loading-search').remove();
                alert(res.error);
            } else {
                location.href = res.redirect;
            }
        }
    });
})

$(document).on('click', '.search-submit', function(){
    var search_value = $('.search-text').val();
    $('.error').hide();
    if(search_value == '' || isNaN(search_value) || search_value.length != 8 ){
        $('.error').fadeIn();
        setTimeout(function(){
	        $('.error').fadeOut();
	    }, 1500);
        return;
    }
    $.ajax({
        type: 'get',
        url: baseUrl+'search',
        data: {search_term:search_value},
        beforeSend: function(){
            $(".loading-search").show();
        },
        success: function(res){
            $(".loading-search").hide();
            $('#surat_data').hide();
            $('#search-data').show();
            $('#search-data').html(res);
        }
    });
});

function printDiv(divName) {
     var printContents = document.getElementById(divName).innerHTML;
     var originalContents = document.body.innerHTML;

     document.body.innerHTML = printContents;

     window.print();

     document.body.innerHTML = originalContents;
}

$(document).on('click', '#schedule_submit', function(e) {
    e.preventDefault();
    $('.ajax-result, .alert').remove();
    var obj = $(this);
    var error = $('<div class="ajax-result alert alert-danger"></div>');
    var bError = false;
    /*if ($('#schedule_table tbody tr').length == 0) {
        error.html("Please enter a schedule first");
        bError = true;
    }*/
    
    $('#schedule_table input.urus, #schedule_table input.date, select').not(':checkbox,:hidden').each(function() {
        if($(this).val() == '') {
            error.html("Incomplete Schedule Entered");
            $('.ajax-result').remove();
            bError = true;
        }
    });
    if(bError){
        $('.panel-heading').before(error);
        return true;
    }
    var form = $('#schedule_form').serializeArray();
    form.push({name: 'party', value: $('#party').val()});
    $.ajax({
        url: baseUrl + 'zakereen',
        type: 'POST',
        dataType: 'json',
        data: form,
        beforeSend: function() {
            //obj.hide();
            obj.before('<div class="loading-search"></div>');
            $('.ajax-result').remove();
        },
        success: function(res) {
            location.reload();
            // location.href = res.result;
        }
    });
});

$(document).on('click', '#event_submit', function(e) {
    
    var row=$(this).parents('tr');
    var event={'title': $('.name', row).val() , 'date': $('.date', row).val() , 'is_multiple': $('.multiple:checked', row).val()};
    console.log(row, event);
    $.ajax({
        url: baseUrl + 'event',
        type: 'POST',
        dataType: 'json',
        data: event,
        success: function(res) {
            alert('Saved Succesfully');
            location.reload();
        },
        fail: function() {
            alert('Error: Saving Data');
        }
    
    });    
});
$(document).on('click','#event_delete', function(e){
    var row=$(this).parents('tr');
    var delet ={'id': $('.id',row).val()};
    $.ajax({
        url: baseUrl + 'eventdelete',
        type: 'POST',
        dataType: 'json',
        data: delet,
        success: function(res) {
            
            row.remove();
        },
        fail: function() {
            alert('Error: Deleting Data');
        }
    
    });   
});
$(document).on('click', '#event_update', function(e) {
    var row=$(this).parents('tr');
    var event={'id': $('.id',row).val(),'title': $('.name', row).val() , 'date': $('.date', row).val() , 'is_multiple': $('.multiple:checked', row).val()};
    console.log(row, event);
    $.ajax({
        url: baseUrl + 'eventupdate',
        type: 'POST',
        dataType: 'json',
        data: event,
        success: function(res) {
            alert('Updated Succesfully');
            location.reload();
        },
        fail: function() {
            alert('Error: Updating Data');
        }
    
    });
});
function addScheduleRow() {
    var html = $('#schedule_table tfoot.hidden').html();
    var count = $('#schedule_table tbody tr').length;
    html = html.replace(/\[-1\]/g, '[' + count + ']');
    $('#schedule_table tbody').append(html);
    $('#remove_schedule').removeClass('hide');
    /*if ($('#schedule_table tbody tr').length > 1) {
    }*/
    return $('#schedule_table tbody tr:last');
}


$(document).on('click', '#add_schedule', function() {
    addScheduleRow();
});
function addEventRow() {
    var html = $('#event_table tfoot.hidden').html();
    $('#event_table tbody').append(html);
    
}
$(document).on('click', '#add_event', function() {
    addEventRow();
});
$(document).on('click', '#remove_schedule', function() {
        var row=$(this).parents('tr');
        var deletSchedule ={'id': $('#id',row).val()};
        $(this).closest('tr').remove();
 $.ajax({
       url:'schedule_delete',
       type:'POST',
       dataType:'json',
       data: deletSchedule,
       success: function(){

       } 
});
    // if ($('#schedule_table tbody tr').length > 1)
});



function clearScheduleForm() {
    $('#schedule_form input').val('');
    $('#schedule_form input[type=hidden]').remove();
    $('#schedule_form select option:first').attr('selected', true);
    $('#schedule_table tbody tr').not(':first').remove();
    //$('#remove_schedule').addClass('hide');
}

$(document).on('click', '#schedule_report #submit', function() {
    var obj = $(this);
    $('.ajax-result').remove();
    if($('#party').val() == "") {
        $('#schedule_form').addClass('hide');
        return false;
    }
    $.ajax({
        url: baseUrl + 'schedule',
        type: 'POST',
        dataType: 'json',
        data: {party: $('#party').val()},
        beforeSend: function() {
            $('#schedule_form').addClass('hide');
            //obj.hide();
            obj.before('<div class="loading-search"></div>');
            $('.alert-danger').remove();
        },
        success: function(res) {
                clearScheduleForm();
                var html = "";

                $('#schedule_form').removeClass('hide');
                if (res.schedules.length > 0) {
                    $.each(res.schedules, function (i, val) {
                        if (i == 0 && $('#schedule_table tbody tr').length >= 1) {
                            var row = $('#schedule_table tbody tr:first');
                        } else {
                            var row = addScheduleRow();
                        }
                        row.append('<input type="hidden" id="id" name="target[' + i + '][id]" value="' + val.id + '" />');
                        $('.event option[value='+val.event_id+']', row).attr('selected', true);
                        $('.mohalla option[value='+val.mohalla_id+']', row).attr('selected', true);
                        //row.append('<input type="button" id="remove_schedule" class="btn btn-md btn-primary"/>Remove</button>');
                        //$('.multiple', row).prop('checked',val.is_multiple == 1);
                        
                    });
                    // $('.party').prop('disabled',true);
                } else {
                    $('#schedule_table tbody').html('');
                    if($('#schedule_table tbody tr').length == 0)
                        addScheduleRow();
                    alert('No Record Found');
                }
                    
                $('#schedule_submit').val($('#party').val());
        },
        fail: function() {
            alert('Error: Saving Data');
        },
        complete: function() {
            $('.loading-search').remove();
            obj.show();
        }
    });
});
$(document).on('click', '#filter_event', function() {
    $.ajax({
        url: baseUrl + 'eventtime',
        type: 'POST',
        dataType: 'json',
        data:{event_id:$('#event').val(),event:$('#event option:selected' ).text()},
        beforeSend: function() {
            
        },
        success: function(res){
            console.log(res);
            $('#event_form').removeClass('hide');
            if (res.mohallah.length > 0) {
                $('.event').html('');
                $.each(res.mohallah,function (i, val) { 
                    if(val.time==null){
                        val.time='';
                    }
                    var html = "<tr>";
                    html += '<td class="text-center" valign="middle">'+val.id+'</td>';
                    html += '<td valign="middle"><h5 class="text-uppercase"><strong>'+val.name+'</strong></h5></td>';
                    html += '<td valign="middle"><input type="text" class="form-control text-center time timepicker" name="time['+val.id+']" value="'+val.time+'"></td>';
                    html += '</tr>';
                    $('.event').append(html);
                    $('.event tr:last .timepicker').timepicker();
                });
            }        
        },
    });
});
$(document).on('submit', '#schedule_event', function(e) {
   alert('click');
});

$('.datepicker').datepicker({
    format: 'yyyy-mm-dd',
    //startDate: '-3d'
});



$(document).on('click', '.attended', function() {
    var obj = $(this);
    var checked = obj.prop('checked') == true ? "1" : "0";
    $.ajax({
        url: baseUrl + 'attended',
        type: 'POST',
        dataType: 'json',
        data: {id: obj.attr('data-id'), type: obj.attr('data-type'), status: checked},
        beforeSend: function() {
            obj.hide();
            obj.before('<div class="loading-search"></div>');
            $('.ajax-result').remove();
        },
        success: function(res) {
            if (typeof res.error != 'undefined') {
                var error = $('<div class="ajax-result alert alert-danger" style="display: none;"></div>');
                error.html(res.error).fadeIn();
                $('#search-data .table-responsive').before(error);
            } else {
                var success = $('<div class="ajax-result alert alert-success" style="display: none;"></div>');
                success.html(res.success).fadeIn();
                $('#search-data .table-responsive').before(success);
            }
        },
        complete: function() {
            $('.loading-search').remove();
            obj.show();
        }
    });
    setTimeout(function(){
        $('.alert').fadeOut();
    }, 3000)
});

$(document).on('change', '.verified', function() {
    var obj = $(this);
    var checked = obj.val();
    $.ajax({
        url: baseUrl + 'attended',
        type: 'POST',
        dataType: 'json',
        data: {id: obj.attr('data-id'), type: obj.attr('data-type'), status: checked},
        beforeSend: function() {
            obj.hide();
            obj.before('<div class="loading-search"></div>');
            $('.ajax-result').remove();
        },
        success: function(res) {
            if (typeof res.error != 'undefined') {
                var error = $('<div class="ajax-result alert alert-danger" style="display: none;"></div>');
                error.html(res.error).fadeIn();
                $('#search-data .table-responsive').before(error);
            } else {
                var success = $('<div class="ajax-result alert alert-success" style="display: none;"></div>');
                success.html(res.success).fadeIn();
                $('#search-data .table-responsive').before(success);
            }
        },
        complete: function() {
            $('.loading-search').remove();
            obj.show();
        }
    });
    setTimeout(function(){
        $('.alert').fadeOut();
    }, 3000)
});

$(document).on('click', '.search-mohalla', function(){
    var search_value = $('#mohalla').val();
    $('.error').hide();
    if(search_value == ''){
        $('.error').show();
        return;
    }
    $.ajax({
        type: 'POST',
        url: baseUrl+'mohalla',
        data: {search_term:search_value},
        dataType: 'html',
        beforeSend: function(){
            $(".loading-search").show();
        },
        success: function(res){
            $(".loading-search").hide();
            $('#search-data').html(res);
        }
    });
});


$(function(){
    if($('#calendar').length > 0){
        $('#calendar').fullCalendar({
            header: {
                left: 'prev,next today',
                center: 'title',
                right: 'month,agendaWeek,agendaDay,listWeek'
            },
            //defaultDate: '2017-10-12',
            navLinks: true, // can click day/week names to navigate views
            editable: true,
            eventLimit: true, // allow "more" link when too many events
            events: aEvents
        });
    }
});

$(document).on('click', '.clear-log',function(){
    $.ajax({
        type: 'POST',
        url: baseUrl+'clear_log',
        dataType: 'json',
        success: function(res){
            if(typeof res.success != 'undefined'){
                alert(res.success);
            }
            else{
                alert('error deleting log');
            }
        }
    })
});

$(document).on('click', '.clear-schedule',function(){
    $.ajax({
        type: 'POST',
        url: baseUrl+'clear_schedule',
        dataType: 'json',
        success: function(res){
            if(typeof res.success != 'undefined'){
                alert(res.success);
            }
            else{
                alert('error deleting Schedule');
            }
        }
    })
})