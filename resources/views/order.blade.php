@extends('layouts.app')
@section('content')
<?php
    $name_dict = array(
        '1'=>'Кухни',
        '2'=>'Шкафы',
    );
    $class_dict = array(
        '1'=>'k-2',
        '2'=>'s-2',
    );
?>
@if (!empty($response))
    <script type="text/javascript">alert("Ваш заказ успешно отправлен!")</script>
@endif
@if (!empty($request['current_section']))
    <input type="hidden" name="cur_section" value="{{$request['current_section']}}">
    <input type="hidden" name="cur_product" value="{{$request['current_product']}}">
@endif
<h4>Сделать расчет и заказать</h4>
<p>
Для того, чтобы мы сделали предварительный расчет Вашей мебели, заполните, 
пожалуйста, следующую форму. Обязательно укажите как с Вами связаться — 
наши специалисты сделают расчет в самое ближайшее время и 
ответят вам по email или перезвонят.
</p>
<form class="col s12 order_form" method="post" action="{{ url('/mail') }}">
    {{ csrf_field() }}
    <input type="hidden" name="subject" value="order">
    <h2>Что Вы хотите заказать</h2>
    <div class="row">
        <div class="input-field col s6">
            <strong>Выберите мебель</strong>
            <select class="filter-donor browser-default order" name="section">
                <option value="" selected>Не выбрано</option>
                <option class = "k-1">Кухни</option>
                <option class = "s-1">Шкафы</option>
                @foreach( $products as $p)
                    @if($p->root_product)
                    <option class = "o-1">{{ $p->menu_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row steps k-2 s-2">
        <div class="input-field col s6">
            <strong>Какого типа</strong>
            <select class="filter-object browser-default order" name="product">
                <option value="" selected>Не выбрано</option>
                @foreach( $products as $p)
                    @if ($p->calculator)
                        <option class="{{ $class_dict[$p->parent_section] }}" name = "{{ $name_dict[$p->parent_section] }}" value="{{ $p->menu_name }}">{{ $p->menu_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row steps k-3">
        <div class="input-field col s6">
            <strong>Форма</strong>
            <select class="browser-default order" name="format">
                <option class="k-3" value="" selected>Не выбрано</option>
                <option class="k-3" value = "Прямая">Прямая</option>
                <option class="k-3" value = "Угловая">Угловая</option>
                <option class="k-3" value = "П-образная">П-образная</option>
            </select>
        </div>
    </div>
    <div class="row steps s-3">
       <div class="input-field col s2">
            <input name="height" type="text" class="validate">
            <label for="height">Высота</label>
        </div>
        <div class="input-field col s2">
            <input name="width" type="text" class="validate">
            <label for="height">Ширина</label>
        </div>
        <div class="input-field col s2">
            <input name="length" type="text" class="validate">
            <label for="height">Длинна</label>
        </div>
    </div>
    <div class="row steps k-4">
       <div class="input-field col s2">
            <input name="meters" type="text" class="validate">
            <label for="name">Погонные метры</label>
        </div>
    </div>
    <div class="row steps k-4 s-3 o-2">
        <div class="input-field col s6">
            <textarea name="wishes" class="materialize-textarea"></textarea>
            <label for="wishes">Особые пожелания</label>
        </div>
    </div>

    <h2>Ваши данные</h2>
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">account_circle</i>
            <input name="name" type="text" class="validate">
            <label for="name">Имя</label>
            @if ($errors->has('name'))
                <span class="error-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">phone</i>
            <input name="phone" type="text" class="validate">
            <label for="phone">Телефон</label>
            @if ($errors->has('phone'))
                <span class="error-block">{{ $errors->first('phone') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">business</i>
            <input name="address" type="text" class="validate">
            <label for="address">Город</label>
            @if ($errors->has('address'))
                <span class="error-block">{{ $errors->first('address') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s6">
            <i class="material-icons prefix">email</i>
            <input name="email" type="text" class="validate">
            <label for="email">Электронная почта</label>
            @if ($errors->has('email'))
                <span class="error-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col s6">
            <a href="{{ url('/mail') }}">
            <button type="submit" class="btn">
                Отправить
            </button>
            </a>
        </div>
    </div>
</form>
@endsection