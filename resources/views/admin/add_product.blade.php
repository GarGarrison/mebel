<h5>Добавление продукта</h5>
<?php
    $class = "";
    $chbox_root = "";
    $chbox_calc = "";
    $submit = "Добавить";
    $action = url('/admin/add_product');
    $current_section = '';
    if ($current){
        $action = url('/admin/edit_product');
        $class = "active";
        $submit = "Сохранить";
        $current_section = $current->parent_section;
        if ($current->root_product) $chbox_root = "checked='checked'";
        if ($current->calculator) $chbox_calc = "checked='checked'";
    }
?>
<form class="col s12 ajax-form" method="post" action="{{ $action }}">
    {{ csrf_field() }}
    @if($current)
    <input type="hidden" name="id" value="{{$current->id}}">
    @endif
    @include('admin.common')
    <div class="row">
        <div class="input-field col s6 l4">
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