<h5>Добавление статьи</h5>
<?php
    $class = "";
    $submit = "Добавить";
    $action = url('/admin/add_article');
    $current_product = '';
    $isArtical = 1;
    if ($current){
        $action = url('/admin/edit_article');
        $class = "active";
        $submit = "Сохранить";
    }
?>
<form class="col s12 ajax-form" method="post" action="{{ $action }}">
    {{ csrf_field() }}
    @if($current)
    <input type="hidden" name="id" value="{{$current->id}}">
    @endif
    @include('admin.common')
    <div class="row">
        <div class="col s6 l3">
            <button type="submit" class="btn">
                {{ $submit }}
            </button>
        </div>
    </div>
</form>