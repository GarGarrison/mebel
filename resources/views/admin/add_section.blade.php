<h5>Добавление раздела</h5>
<?php
    $class = "";
    $chbox_ms = "";
    $submit = "Добавить";
    $action = url('/admin/add_section');
    if ($current_sec){
        $action = url('/admin/edit_section');
        $class = "active";
        $submit = "Сохранить";
        if ($current_sec->main_section) $chbox_ms = "checked='checked'";
    }
?>
<form class="col s12 ajax-form" method="post" action="{{ $action }}">
    {{ csrf_field() }}
    @if($current_sec)
    <input type="hidden" name="id" value="{{$current_sec->id}}">
    @endif
    <div class="row">
        <div class="input-field col s4 m4 l3">
            <input name="name" type="text" class="validate" value="{{ $current_sec['name'] or '' }}">
            <label class="{{ $class }}" for="name">Название</label>
            @if ($errors->has('name'))
                <span class="error-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="input-field col s4 m4 l3">
            <input name="translit" type="text" class="validate" value="{{ $current_sec['translit'] or '' }}">
            <label class="{{ $class }}" for="translit">Транслит</label>
            @if ($errors->has('translit'))
                <span class="error-block">{{ $errors->first('translit') }}</span>
            @endif
        </div>
        <div class="input-field col s4 m4 l3">
            <input name="title_img" type="text" class="validate" value="{{ $current_sec['title_img'] or '' }}">
            <label class="{{ $class }}" for="title_img">Заглавная картинка</label>
            @if ($errors->has('title_img'))
                <span class="error-block">{{ $errors->first('title_img') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l6">
            <textarea name="description" class="materialize-textarea">{{ $current_sec['description'] or '' }}</textarea>
            <label class="{{ $class }}" for="description">Описание</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 l4">
            <input name="meta_keywords" type="text" class="validate" value="{{ $current_sec['meta_keywords'] or '' }}">
            <label class="{{ $class }}" for="meta_keywords">Мета keywords</label>
            @if ($errors->has('meta_keywords'))
                <span class="error-block">{{ $errors->first('meta_keywords') }}</span>
            @endif
        </div>
        <div class="input-field col s6 l4">
            <input name="meta_description" type="text" class="validate" value="{{ $current_sec['meta_description'] or '' }}">
            <label class="{{ $class }}" for="meta_description">Мета description</label>
            @if ($errors->has('meta_description'))
                <span class="error-block">{{ $errors->first('meta_description') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col s4">
            <input type="checkbox" name="main_section" id="main_section"  {{ $chbox_ms }}/>
            <label class="{{ $class }}" for="main_section">Главная секция</label>
        </div>
    </div>
    <div class="row">
        <div class="col s6 l3">
            <button type="submit" class="btn">
                {{ $submit }}
            </button>
        </div>
    </div>
</form>