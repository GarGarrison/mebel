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
            tile_textpanel_always_on:true
        },
        'tiles': {
            gallery_theme: "tiles",
            slider_control_zoom: false,
            tile_enable_icons:false,
            tiles_type: "justified"
        },
        'slider': {
            gallery_theme: "carousel",
            tile_width: 200,
            theme_navigation_enable_play: false,
            tile_enable_icons:false,
            gallery_autoplay:false
        }
    }
    theme = $("#gallery").attr("name");
    if (!theme) theme = "tiles";
    $("#gallery").unitegallery(themes_params[theme]);
    $(".button-collapse").sideNav();   
});
// $(document).on('click','.ug-item-wrapper img', function(){
//     api = $("#gallery").unitegallery();
//     api.nextItem();
// })