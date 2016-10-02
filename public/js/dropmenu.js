$(document).on('click', 'body', function(event){
    deny_classes = ['catalog', 'drop'];
    drop_parent = $(event.target).closest('.drop').size();
    deny_index = deny_classes.indexOf($(event.target).attr('class'));
    if ( deny_index == -1 && drop_parent == 0) {
        $('.drop').slideUp('fast');
        $('.drop .subdrop').hide();
    }
});
$(document).on('mouseover', '.catalog', function(){
    y = $(this).offset().top + $(this).height() + 5;
    x = $(this).offset().left;
    target = $(this).attr('class');
    $('.drop[name="' + target + '"]').css({'top': y, 'left': x}).slideDown('fast');

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