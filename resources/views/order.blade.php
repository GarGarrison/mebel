@extends('layouts.app')

@section('meta')
<meta name="Keywords" content=""/>
<meta name="Description" content=""/>
<title>Изготовление мебели на заказ</title>
@endsection

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
@if (session('response'))
    <script type="text/javascript">alert("Ваш заказ успешно отправлен!")</script>
@endif
@if (!empty($request['current_product']))
    <input type="hidden" name="cur_section" value="{{$request['current_section']}}">
    <input type="hidden" name="cur_product" value="{{$request['current_product']}}">
@endif
<h1>Сделать расчет и заказать</h1>
<p>
Для того, чтобы мы сделали предварительный расчет Вашей <a href="{{ url('/section/kuhni-na-zakaz') }}">кухни</a>, 
<a href="{{ url('/section/shkafi-na-zakaz') }}">шкафа</a> или другой мебели, заполните, 
пожалуйста, следующую форму. Обязательно укажите как с Вами связаться — 
наши специалисты сделают расчет в самое ближайшее время и 
ответят вам по email или перезвонят. Так же Вы можете сразу связаться с нашими консультантами по телефону. Обращаем Ваше внимание на то, что данный расчет будет приблизительным — окончательная сумма заказа будет понятна после вызова замерщика!
</p>
<form class="col s12 order_form" method="post" action="{{ url('/util/mail') }}">
    {{ csrf_field() }}
    <input type="hidden" name="subject" value="order">
    <h2>Что Вы хотите заказать</h2>
    <div class="row">
        <div class="input-field col s12 m6">
            <strong>Выберите мебель</strong>
            <select class="filter-donor browser-default order" name="section">
                <option value="" selected>Не выбрано</option>
                <option class = "k-1" data-children="1">Кухни на заказ</option>
                <option class = "s-1" data-children="2">Шкафы на заказ</option>
                @foreach( $products as $p)
                    @if($p->root_product)
                    <option class = "o-1">{{ $p->menu_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row steps k-2 s-2">
        <div class="input-field col s12 m6">
            <strong>Какого типа</strong>
            <select class="filter-object browser-default order" name="product">
                <option value="" selected>Не выбрано</option>
                @foreach( $products as $p)
                    @if ($p->calculator)
                        <option class="{{ $class_dict[$p->parent_section] }}" data-parent="{{ $p->parent_section }}" value="{{ $p->menu_name }}">{{ $p->menu_name }}</option>
                    @endif
                @endforeach
            </select>
        </div>
    </div>
    <div class="row steps k-3">
        <div class="input-field col s12 m6">
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
       <div class="input-field col s4 m2">
            <input name="height" type="text" class="validate">
            <label>Высота</label>
        </div>
        <div class="input-field col s4 m2">
            <input name="width" type="text" class="validate">
            <label>Ширина</label>
        </div>
        <div class="input-field col s4 m2">
            <input name="length" type="text" class="validate">
            <label>Длинна</label>
        </div>
    </div>
    <div class="row steps k-4">
        <div class="input-field col s12 m6">
            <strong>Материал столешницы</strong>
            <select class="browser-default order" name="format">
                <option class="k-4" value="" selected>Не выбрано</option>
                <option class="k-4" value = "Прямая">Искусственный камень</option>
                <option class="k-4" value = "Угловая">Пластик</option>
            </select>
        </div>
    </div>
    <div class="row steps k-5">
       <div class="input-field col s12 m6">
            <input name="meters" type="text" class="validate">
            <label>Погонные метры</label>
        </div>
    </div>
    <div class="row steps k-5 s-3 o-2">
        <div class="input-field col s12 m6">
            <textarea name="wishes" class="materialize-textarea"></textarea>
            <label>Особые пожелания</label>
        </div>
    </div>

    <h2>Ваши данные</h2>
    <div class="row">
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">account_circle</i>
            <input name="name" type="text" class="validate">
            <label>Имя</label>
            @if ($errors->has('name'))
                <span class="error-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">phone</i>
            <input name="phone" type="text" class="validate">
            <label>Телефон</label>
            @if ($errors->has('phone'))
                <span class="error-block">{{ $errors->first('phone') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">business</i>
            <input name="address" type="text" class="validate">
            <label>Город</label>
            @if ($errors->has('address'))
                <span class="error-block">{{ $errors->first('address') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 m6">
            <i class="material-icons prefix">email</i>
            <input name="email" type="text" class="validate">
            <label>Электронная почта</label>
            @if ($errors->has('email'))
                <span class="error-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="col s12 m6">
            <div class="g-recaptcha" data-sitekey="6LeIJA8UAAAAAK5ndUpXOaLR2WXmLZnpnTiexLel"></div>
        </div>
        @if (session()->has('capcha'))
            <span class="error-block">{{ session('capcha') }}</span>
        @endif
    </div>
    <div class="row">
        <div class="col s12 m6">
            <button type="submit" class="btn-large form-submit">
            <i class="material-icons right">mail_outline</i>
                Отправить
            </button>
        </div>
    </div>
</form>
<script src='https://www.google.com/recaptcha/api.js?hl=ru'></script>
@endsection