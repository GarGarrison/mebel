<h4>Изменение специального свойства</h4>
<div class="row">
    <div class="input-field col s6 m6 l4">
        <strong>Родительский продукт</strong>
        <select class="filter-donor browser-default" name="parent">
            <option value="" selected>Не выбрано</option>
            @foreach ($property_products as $product)
               <option data-children="{{ $product->id }}">{{ $product->menu_name }}</option>
            @endforeach
        </select>
    </div>
    <div class="input-field col s6 m6 l4">
        <strong>Свойство</strong>
        <select class="filter-object browser-default" name="properties">
            <option value="" selected>Не выбрано</option>
            @foreach ($properties as $property)
               <option data-parent="{{ $property->parent_product }}" value="{{ url('/admin/show_add_property', [$property->id]) }}">{{ $property->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="edit_current_position">

</div>