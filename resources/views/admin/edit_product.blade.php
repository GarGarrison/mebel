<h4>Изменение продукта</h4>
<div class="row">
    <div class="input-field col s6 m6 l4">
        <strong>Раздел</strong>
        <select class="filter-donor browser-default">
            <option value="0" selected>Не выбрано</option>
            @foreach ($sections as $section)
               <option value="{{ $section->id }}">{{ $section->menu_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="input-field col s6 m6 l4">
        <strong>Продукт</strong>
        <select class="filter-object browser-default">
            <option value="" selected>Не выбрано</option>
            @foreach ($products as $product)
               <option data-parent="{{ $product->parent_section }}" value="{{ url('/admin/show_add_product', [$product->id]) }}">{{ $product->menu_name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="edit_current_position">

</div>