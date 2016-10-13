<h4>Изменение статьи</h4>
<div class="row">
    <div class="input-field col s6 m6 l4">
        <strong>Статьи</strong>
        <select class="browser-default filter-object" name="articles">
            <option value="" selected>Не выбрано</option>
            @foreach ($articles as $a)
               <option value="{{ url('/admin/show_add_article', [$a->id]) }}">{{ $a->menu_name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="edit_current_position">

</div>