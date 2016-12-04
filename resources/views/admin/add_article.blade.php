<h5>Добавление статьи</h5>
<?php
    $class = "";
    $submit = "Добавить";
    $action = url('/admin/add_article');
    $current_product = '';
    $chbox_usefull = "";
    $isArtical = 1;
    if ($current){
        $action = url('/admin/edit_article');
        $class = "active";
        $submit = "Сохранить";
        if ($current->usefull) $chbox_usefull = "checked='checked'";
    }
?>
<form class="col s12 ajax-form" method="post" action="{{ $action }}">
    {{ csrf_field() }}
    @if($current)
    <input type="hidden" name="id" value="{{$current->id}}">
    @endif
    @include('admin.common')
    <div class="row">
        <div class="input-field col s12 l8">
            <textarea name="annotation" class="materialize-textarea">{{ $current['annotation'] or '' }}</textarea>
            <label class="{{ $class }}" for="text">Аннотация</label>
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <input type="text" name="preview_img" value="{{ $current['preview_img'] or '' }}"/>
            <label class="{{ $class }}">Превью картинка</label>
        </div>
    </div>
    <div class="row">
        <div class="col s3">
            <input type="checkbox" name="usefull" id="usefull" {{ $chbox_usefull }}/>
            <label class="{{ $class }}" for="usefull">В полезном</label>
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