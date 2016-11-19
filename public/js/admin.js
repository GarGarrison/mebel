$(document).ready(function(){
    reloadTab();
    reloadSomeJS();
})
//  переключение табов
$(document).on('click', '.tab', function(){
    $('.tab a').removeClass('active');
    $(this).children('a').addClass('active');
    url = $(this).children('a').attr('href');
    loadTab(url);
});

$(document).on('change', 'select.filter-object', function(){
    url = $(this).val();
    $('.edit_current_position').html();
    load_with_error(url + " .ajax-form", $('.edit_current_position'), function(){
        $('.edit_current_position').prepend("<hr /><br /><br />");
    })
});

$(document).on('click', '.delete-similar', function(){
    url = $(this).attr('name');
    $.ajax({
        'url': url,
        'type': 'post',
        'success': function(resp){
            alert(resp.success);
            reloadTab();
        }
    });
});

$(document).on('click', '.reload_menu', function(){
    $.ajax({
        'url': '/admin/reload_menu',
        'type': 'get',
        'success': function(resp){
            alert(resp.success);
        },
        'error': function(resp) {
            $('body').prepend(resp.responseText);
        }
    });
});
