/* TODO 
    убрать из SendForm и loadTab $('body').append(resp.responseText);
    может оставить console.log

*/
var error_func = function(){
    alert('Произошла ошибка');
};
if (Debug) error_func = function(response){
    $('body').prepend(response);
}

function print(text) {
    console.log(text);
}

// функция ответа на отправку формы с подсветкой ошибочных данных
function formSuccess(resp){
    if (resp.success) {
        alert(resp.success);
        reloadTab();
    }
    else lightErrorsInForm(resp);
}

function load_with_error(url, obj, success=function(){return true;}) {
    obj.load(url, function(response, status, xhr){
        if (status == "error") {
            error_func(response);
        }
        reloadSomeJS();
        success();
    });
}
// собрать форму в словарь
function serializeToObject(form) {
    arr = form.serializeArray();
    tmp = {};
    $.each(arr, function(){
        tmp[this.name]=this.value;
    });
    return tmp;
}
// подсветить неправильно заполненные поля формы в материалайзе
function lightErrorsInForm(errors) {
    for (var k in errors) {
        $("form.ajax-form").find('label[for="' + k + '"]').after("<span class='error-block'>" + errors[k] + "</span>");
    }
}
// перезагрузка материального селекта
function selectReload() {
    $('select').material_select();
}
// перезагрузка материального селекта
function editorReload() {
    //bkLib.onDomLoaded(nicEditors.allTextAreas);
    nicEditors.allTextAreas();
}
//перезагрузка разных объектов
function reloadSomeJS(){
    selectReload();
    editorReload();
    $('.datepicker').pickadate({
        today: 'Сегодня',
        clear: '',
        close: 'Закрыть',
        onSet: function(context) {this.close();}
    });
}
// загрузка данных таба
function loadTab(url) {
    load_with_error(url, $(".tab-container"));
}
// перезагрузка данных таба
function reloadTab() {
    url = $(".tab a.active").attr("href");
    loadTab(url);
}
// отправка любой формы
function SendForm(url, data, callback) {
    if (!data['_token']) data['_token'] = $('meta[name="csrf-token"]').attr("content");
    $.ajax({
        'url': url,
        'type': 'post',
        'data': data,
        'success': function(resp){
            if (callback && typeof(callback) === "function") callback(resp);
        },
        'error': function(resp) {
            error_func(resp.responseText);
        }
    });
}
// аякс сабмит формы
$(document).on('submit', '.ajax-form', function(event){
    event.preventDefault();
    url = $(this).attr('action');
    data = serializeToObject($(this));
    SendForm(url, data, formSuccess);
});
// запрос на поиск
$(document).on('submit', '.search_form', function(event){
    event.preventDefault();
    url = $(this).attr("action");
    data = serializeToObject($(this));
    SendForm(url, data, function(resp) {
        $('.content').html(resp);
    });
});

// фильтрация по двум селектам
$(document).on('change', 'select.filter-donor', function(){
    id = $(this).find('option:selected').attr('data-children');
    $('select.filter-object option').hide();
    $('select.filter-object option[data-parent="' + id + '"]').show();
});