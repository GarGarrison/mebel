<h4>Изменение раздела</h4>
<div class="row">
    <div class="input-field col s6 m6 l4">
        <strong>Раздел</strong>
        <select class="filter-object" name="parent">
            <option value="" selected>Не выбрано</option>
            @foreach ($sections as $section)
               <option value="{{ url('/admin/show_add_section', [$section->id]) }}">{{ $section->name }}</option>
            @endforeach
        </select>
    </div>
</div>
<div class="edit_current_position">

</div>