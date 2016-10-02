<h5>Добавление свойства</h5>
<?php
    $class = "";
    $submit = "Добавить";
    $action = url('/admin/add_property');
    $current_product = '';
    if ($current_property){
        $action = url('/admin/edit_property');
        $class = "active";
        $submit = "Сохранить";
        $current_product = $current_property->parent_product;
    }
?>
<form class="col s12 ajax-form" method="post" action="{{ $action }}">
    {{ csrf_field() }}
    @if($current_property)
    <input type="hidden" name="id" value="{{$current_property->id}}">
    @endif
    <div class="row">
        <div class="input-field col s6 m6 l4">
            <input name="name" type="text" class="validate" value="{{ $current_property['name'] or '' }}">
            <label class="{{ $class }}" for="name">Название</label>
            @if ($errors->has('name'))
                <span class="error-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
        <div class="input-field col s6 m6 l4">
            <input name="translit" type="text" class="validate" value="{{ $current_property['translit'] or '' }}">
            <label class="{{ $class }}" for="translit">Транслит</label>
            @if ($errors->has('translit'))
                <span class="error-block">{{ $errors->first('translit') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m12 l6">
            <textarea name="description" class="materialize-textarea">{{ $current_property['description'] or '' }}</textarea>
            <label class="{{ $class }}" for="description">Описание</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6 m6 l4">
            <strong>Раздел</strong>
            <select class="browser-default filter-donor" name="parent">
                <option value="" selected>Не выбрано</option>
                @foreach ($sections as $section)
                   <option value="{{ $section->id }}">{{ $section->name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field col s6 m6 l4">
            <strong>Родительский продукт</strong>
            <select class="browser-default filter-object" name="parent_product">
                <option value="" selected>Не выбрано</option>
                @foreach ($products as $product)
                    @if($current_product == $product->id)
                    <option name="{{ $product->parent_section }}" value="{{ $product->id }}" selected="selected">{{ $product->name }}</option>
                    @else
                    <option name="{{ $product->parent_section }}" value="{{ $product->id }}">{{ $product->name }}</option>
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