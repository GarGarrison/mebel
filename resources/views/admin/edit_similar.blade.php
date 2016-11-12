<h4>Изменение похожих продуктов</h4>
<div class="row">
    <table class="striped col s12 m6 l4">
    @foreach ($similars as $similar)
        <tr>
            <td>
                {{ $productById[$similar->parent_product]->menu_name }} ->
                {{ $productById[$similar->similar_product]->menu_name }}
                <i class="material-icons delete-similar right" name="{{ url('/admin/del_similar/'.$similar->id) }}">delete</i>
            </td>
        </tr>
        </div>
    @endforeach
    </table>
</div>