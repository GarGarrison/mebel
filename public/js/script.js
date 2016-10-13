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
    reloadSomeJS();

    if ($('.order_form').length > 0){
        sec = $('input[name="cur_section"]').val();
        prod = $('input[name="cur_product"]').val();
        $("select[name='section']").val(sec);
        if (sec) {
            $("select[name='product']").val(prod);
            $(".steps.k-2").slideDown(400);
            $(".steps.k-3").slideDown(400);
        }
        else {
            $("select[name='section']").val(prod);
            $(".steps.o-2").slideDown(400);
        }
    };
});
// $(document).on('click','.ug-item-wrapper img', function(){
//     api = $("#gallery").unitegallery();
//     api.nextItem();
// })

$(document).on('change', 'select.order', function(){
    if ($(this).hasClass('filter-donor')) {
        $('.steps').hide();
        $('select.filter-object').val("");
    }
    clas = $(this).find('option:selected').attr('class');
    cl = clas.split('-')[0] + '-';
    next = parseInt(clas.split('-')[1]) + 1;
    $('.steps.' + cl + next).slideDown(400);
});