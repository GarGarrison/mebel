<h5>Добавление свойства</h5>
<?php
    $class = "";
    $submit = "Добавить";
    $action = url('/admin/add_property');
    $current_product = '';
    if ($current){
        $action = url('/admin/edit_property');
        $class = "active";
        $submit = "Сохранить";
        $current_product = $current->parent_product;
    }
?>
<form class="col s12 ajax-form" method="post" action="{{ $action }}">
    {{ csrf_field() }}
    @if($current)
    <input type="hidden" name="id" value="{{$current->id}}">
    @endif
    <div class="row">
        <div class="input-field col s6 m6 l4">
            <input name="name" type="text" class="validate" value="{{ $current['name'] or '' }}">
            <label class="{{ $class }}" for="name">Название</label>
            @if ($errors->has('name'))
                <span class="error-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="input-field col s6 m6 l4">
            <input name="img" type="text" class="validate" value="{{ $current['img'] or '' }}">
            <label class="{{ $class }}" for="img">Картинка</label>
            @if ($errors->has('img'))
                <span class="error-block">{{ $errors->first('img') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l6">
            <textarea name="text" class="materialize-textarea">{{ $current['text'] or '' }}</textarea>
            <label class="{{ $class }}" for="text">Описание</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l4">
            <strong>Раздел</strong>
            <select class="browser-default filter-donor" name="parent">
                <option value="" selected>Не выбрано</option>
                @foreach ($sections as $section)
                   <option value="{{ $section->id }}">{{ $section->menu_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field col s6 m6 l4">
            <strong>Родительский продукт</strong>
            <select class="browser-default filter-object" name="parent_product">
                <option value="" selected>Не выбрано</option>
                @foreach ($products as $product)
                    @if($current_product == $product->id)
                    <option name="{{ $product->parent_section }}" value="{{ $product->id }}" selected="selected">{{ $product->menu_name }}</option>
                    @else
                    <option name="{{ $product->parent_section }}" value="{{ $product->id }}">{{ $product->menu_name }}</option>
                    @endif
                @endforeach
            </select>
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