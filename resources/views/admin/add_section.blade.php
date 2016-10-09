<h5>Добавление раздела</h5>
<?php
    $class = "";
    $chbox_ms = "";
    $submit = "Добавить";
    $action = url('/admin/add_section');
    if ($current){
        $action = url('/admin/edit_section');
        $class = "active";
        $submit = "Сохранить";
        if ($current->main_section) $chbox_ms = "checked='checked'";
    }
?>
<form class="col s12 ajax-form" method="post" action="{{ $action }}">
    {{ csrf_field() }}
    @if($current)
    <input type="hidden" name="id" value="{{$current->id}}">
    @endif
    @include('admin.common')
    <div class="row">
        <div class="col s4">
            <input type="checkbox" name="main_section" id="main_section"  {{ $chbox_ms }}/>
            <label class="{{ $class }}" for="main_section">Главная секция</label>
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