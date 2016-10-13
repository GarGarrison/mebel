/* TODO 
    убрать из SendForm и loadTab $('body').append(resp.responseText);
    может оставить console.log

*/
function print(text) {
    console.log(text);
}

function load_with_error(url, obj, success=function(){return true;}) {
    obj.load(url, function(response, status, xhr){
        if (status == "error") {
            $('body').prepend(response);
        }
        reloadSomeJS();
        success();
    });
}
function serializeToObject(form) {
    arr = form.serializeArray();
    tmp = {};
    $.each(arr, function(){
        tmp[this.name]=this.value;
    });
    return tmp;
}

function lightErrorsInForm(errors) {
    for (var k in errors) {
        $("form.ajax-form").find('label[for="' + k + '"]').after("<span class='error-block'>" + errors[k] + "</span>");
    }
}
function selectReload() {
    $('select').material_select();
}
function reloadSomeJS(){
    selectReload();
    $('.datepicker').pickadate({
        today: 'Сегодня',
        clear: '',
        close: 'Закрыть',
        onSet: function(context) {this.close();}
    });
}
function loadTab(url) {
    load_with_error(url, $(".tab-container"));
}
function reloadTab() {
    url = $(".tab a.active").attr("href");
    loadTab(url);
}

function standartSuccess(resp) { console.log(resp);}

function formSuccess(resp){
    if (resp.success) {
        alert(resp.success);
        reloadTab();
    }
    else lightErrorsInForm(resp);
}

function SendForm(url, data, success=standartSuccess) {
    if (!data['_token']) data['_token'] = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        'url': url,
        'type': 'post',
        'data': data,
        'success': function(resp){
            success(resp)
        },
        'error': function(resp) {
            $('body').prepend(resp.responseText);
        }
    })
}

$(document).on('submit', '.ajax-form', function(event){
    event.preventDefault();
    url = $(this).attr('action');
    data = serializeToObject($(this));
    SendForm(url, data, formSuccess);
});

$(document).on('change', 'select.filter-donor', function(){
    id = $(this).val();
    $('select.filter-object option').hide();
    $('select.filter-object option[name="' + id + '"]').show();
});