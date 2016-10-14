$(document).on('click', 'body', function(event){
    deny_names = ['catalog', 'info', 'about'];
    drop_parent = $(event.target).closest('.drop').size();
    target = $(event.target).attr('name');
    deny_index = deny_names.indexOf(target);
    if ( deny_index == -1 && drop_parent == 0) {
        $('.drop').slideUp('fast');
        $('.drop .subdrop').hide();
    }
});
$(document).on('mouseover', '.drop_menu a', function(){
    $('.drop').hide();
    y = $(this).offset().top + $(this).height() + 5;
    x = $(this).offset().left;
    target = $(this).attr('name');
    $('.drop[name="' + target + '"]').css({'top': y, 'left': x}).slideDown(200, function(){
        $('.drop').not('.drop[name="' + target + '"]').hide();
    });

});
$(document).on('mouseleave', '.drop .subdrop', function(){
    $(this).hide();
    $('a.haschild').removeClass('hover');
});
$(document).on('mouseover', '.drop .subdrop', function(){
    name = $(this).attr('name');
    $('a.haschild[name="' + name + '"]').addClass('hover');
});
$(document).on('mouseleave', '.drop', function(){
    $(this).slideUp('fast');
});
$(document).on('mouseover', '.drop a', function(){
    if ($(this).hasClass('haschild')) {
        $('.drop .subdrop:visible').hide();
        name = $(this).attr('name');
        $('.subdrop[name="' + name + '"]').show();
    }
    else if(!$(this).closest('ul').hasClass('subdrop')) $('.drop .subdrop').hide();
});