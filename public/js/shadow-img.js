$(document).on('click', '.shadow-big-img', function(){
    big = $(this).attr("data-image");
    code = "<div class='shadow-background-wrapper'><div class='shadow-background'></div><div class='shadow-background-close'><i class='material-icons small'>close</i></div><div class='shadow-background-container'></div></div>";
    $('body').prepend(code);
    $('.shadow-background-container').append("<img class='shadow-background-container-img' src='" + big + "'/>");
    $('.shadow-background-container').fadeIn(200);
});
$(document).on('click', '.shadow-background-wrapper', function(){
    $(this).remove();
});
$(document).on('click', '.shadow-background-close', function(){
    $('.shadow-background-wrapper').remove();
});