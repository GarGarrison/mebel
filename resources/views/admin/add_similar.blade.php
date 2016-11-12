<h4>Добавление похожего товара</h4>
<form class="col s12 ajax-form" method="post" action="{{ url('/admin/add_similar') }}">
    {{ csrf_field() }}
    <div class="row">
        <div class="input-field col s6 m6 l4">
            <strong>Родительский продукт</strong>
            <select class="browser-default" name="parent_product">
                <option value="" selected>Не выбрано</option>
                @foreach ($products as $product)
                   <option value="{{ $product->id }}">{{ $product->menu_name }}</option>
                @endforeach
            </select>
        </div>
        <div class="input-field col s6 m6 l4">
            <strong>Похожий продукт</strong>
            <select class="browser-default" name="similar_product">
                <option value="" selected>Не выбрано</option>
                @foreach ($products as $product)
                   <option value="{{ $product->id }}">{{ $product->menu_name }}</option>
                @endforeach
            </select>
        </div>
    </div>
    <div class="row">
        <div class="col s6 l3">
            <button type="submit" class="btn">
                Добавить
            </button>
        </div>
    </div>
</form>