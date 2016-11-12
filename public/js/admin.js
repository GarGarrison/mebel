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

// фильтры по селектам
$(document).on('change', 'select.filter-donor', function(){
    id = $(this).val();
    $('select.filter-object option').hide();
    $('select.filter-object option[name="' + id + '"]').show();
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
    })
})