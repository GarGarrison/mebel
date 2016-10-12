$(document).ready(function(){
    themes_params = {
        'main': {
            gallery_theme: "tilesgrid",
            tiles_type: "justified",
            tile_as_link:true,
            tile_link_newpage: false,
            tile_width: 300,
            tile_height: 200,
            tile_enable_icons:false,
            tile_enable_textpanel:true,
            tile_textpanel_title_text_align: "center",
            grid_num_rows: 4,
            tile_textpanel_always_on:true
        },
        'tiles': {
            gallery_theme: "tiles",
            slider_control_zoom: false,
            tile_enable_icons:false,
            tiles_type: "justified"
        }
    }
    theme = $("#gallery").attr("name");
    if (!theme) theme = "tiles";
    $("#gallery").unitegallery(themes_params[theme]);
    $(".button-collapse").sideNav();

    if ($('body').height() < $(window).height() && location.href.split('/').indexOf("admin") <=0 && $("#gallery").length == 0 ) $('footer').addClass('fixed-footer');
});
// $(document).on('click','.ug-item-wrapper img', function(){
//     api = $("#gallery").unitegallery();
//     api.nextItem();
// })
$(document).on('click', '.property-img', function(){
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