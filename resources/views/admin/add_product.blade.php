<h5>Добавление продукта</h5>
<?php
    $class = "";
    $chbox_root = "";
    $chbox_calc = "";
    $submit = "Добавить";
    $action = url('/admin/add_product');
    $current_section = '';
    if ($current_prod){
        $action = url('/admin/edit_product');
        $class = "active";
        $submit = "Сохранить";
        $current_section = $current_prod->parent_section;
        if ($current_prod->root_product) $chbox_root = "checked='checked'";
        if ($current_prod->calculator) $chbox_calc = "checked='checked'";
    }
?>
<form class="col s12 ajax-form" method="post" action="{{ $action }}">
    {{ csrf_field() }}
    @if($current_prod)
    <input type="hidden" name="id" value="{{$current_prod->id}}">
    @endif
    <div class="row">
        <div class="input-field col s6 m6 l4">
            <input name="name" type="text" class="validate" value="{{ $current_prod['name'] or '' }}">
            <label class="{{ $class }}" for="name">Название</label>
            @if ($errors->has('name'))
                <span class="error-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="input-field col s6 m6 l4">
            <input name="translit" type="text" class="validate" value="{{ $current_prod['translit'] or '' }}">
            <label class="{{ $class }}" for="translit">Транслит</label>
            @if ($errors->has('translit'))
                <span class="error-block">{{ $errors->first('translit') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l4">
            <input name="menu_name" type="text" class="validate" value="{{ $current_prod['menu_name'] or '' }}">
            <label class="{{ $class }}" for="menu_name">Названия для меню</label>
            @if ($errors->has('menu_name'))
                <span class="error-block">{{ $errors->first('menu_name') }}</span>
            @endif
        </div>
        <div class="input-field col s6 m6 l4">
            <input name="title_img" type="text" class="validate" value="{{ $current_prod['title_img'] or '' }}">
            <label class="{{ $class }}" for="title_img">Заглавная картинка</label>
            @if ($errors->has('title_img'))
                <span class="error-block">{{ $errors->first('title_img') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l6">
            <textarea name="description" class="materialize-textarea">{{ $current_prod['description'] or '' }}</textarea>
            <label class="{{ $class }}" for="description">Описание</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l4">
            <select name="parent_section">
                <option value="0">Не выбрано</option>
                @foreach ($sections as $section)
                    @if($current_section == $section->id)
                    <option value="{{ $section->id }}" selected="selected">{{ $section->name }}</option>
                    @else
                   <option value="{{ $section->id }}">{{ $section->name }}</option>
                   @endif
                @endforeach
            </select>
            <label class="{{ $class }}" for="parent">Родительская категория</label>
        </div>
    </div>
    <div class="row">
        <div class="col s3">
            <input type="checkbox" name="root_product" id="root_product" {{ $chbox_root }}/>
            <label class="{{ $class }}" for="root_product">Корневой</label>
        </div>
        <div class="col s3">
            <input type="checkbox" name="calculator" id="calculator" {{ $chbox_calc }}/>
            <label class="{{ $class }}" for="calculator">Калькулятор</label>
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