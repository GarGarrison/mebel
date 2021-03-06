@extends('layouts.app')

@section('content')
    <h1>Изготовление мебели на заказ</h1>
    <h2>Купить мебель от производителя стало совсем просто!</h2>
    <p>Наша компания уже много лет привносит в дома наших клиентов уют, 
    удобство и оригинальность. Заглянув в наш <a href="{{ url('/catalog') }}"><strong>каталог</strong></a>, 
    Вы найдете множество примеров изготовленной по индивидуальным размерам корпусной мебели. 
    У нас Вы можете заказать <a href="{{ url('/section/kuhni-na-zakaz') }}">кухонные</a> и 
    <a href="{{ url('/product/spalni-na-zakaz') }}">спальные</a> гарнитуры, 
    <a href="{{ url('/product/shkafi-kupe-vstroennie-na-zakaz') }}">шкафы-купе</a>, 
    <a href="{{ url('/product/shkafi-v-prihozhuyu-na-zakaz') }}">прихожие</a> и 
    многое другое. Каждое изделие прекрасно дополнит Ваш интерьер, а благодаря 
    индивидуальному проекту от наших дизайнеров впишется в любые уголки Вашей 
    квартиры. Мы предлагаем огромное разнообразие дизайнерских решений, материалов и 
    комплектующих. Уже сотни клиентов убедились в качестве нашей продукции, 
    предлагаем сделать это и Вам!</p>
    <p>Наши специалисты с удовольствием проконсультируют Вас по любым вопросам и 
    помогут выбрать подходящую именно Вам мебель.<br />
    Звоните скорей и делайте заказ, мы поможем сделать Ваш дом еще более неповторимым!
    </p>
    <div id="gallery" data-gallery-type="main">
        @foreach($main_items as $item)
        <?php
            $path_url = "/section/";
            if ($item->root_product) $path_url = "/product/";
            $smallpath = "/img/title_img/".$item->img_title;
        ?>
                    <a href="{{ url($path_url.$item->url_name)}}">
                        <img src="{{ asset( $smallpath ) }}" data-image="{{ asset( $smallpath ) }}" alt="{{ $item->menu_name }}" data-description="{{ $item->header }}">
                    </a>
        @endforeach
    </div>
    <h2 class="big">Три простых шага до идеальной мебели</h2>
    <div class="row">
        <div class="col s12 m4 why">
            <div class="why-head-wrapper">
                <img src='{{ asset("img/common_imgs/index_telefon_mini.png") }} '>
                <strong>Звонок</strong>
            </div>
            <p>Свяжитесь с нашими специалистами и они проконсультируют Вас по всем вопросам, помогут выбрать материалы, посоветуют наилучший способ воплотить Ваши идеи и сделают предварительный расчет.</p>
        </div>
        <div class="col s12 m4 why">
            <div class="why-head-wrapper">
                <img src='{{ asset("img/common_imgs/index_design_mini.png") }} '>
                <strong>Вызов дизайнера</strong>
            </div>
            <p>Наш дизайнер приедет в удобное время, сделает замер помещения и создаст вместе с Вами эскиз будущей мебели. Также Вы сможете ознакомится с образцами материалов, выбрать наиболее подходящий к интерьеру. На этом этапе устанавливается окончательная стоимость и заключается договор.</p>
        </div>
        <div class="col s12 m4 why">
            <div class="why-head-wrapper">
                <img src='{{ asset("img/common_imgs/index_dostavka_mini.png") }} '>
                <strong>Доставка</strong>
            </div>
            <p>Поздравляем — Ваша мебель готова! Мы доставим ее в любую точку Москвы и Подмосковья в удобное для Вас время и соберем. Наслаждайтесь Вашей новой мебелью! </p>
        </div>
    </div>
    <div style="text-align: center;"><a href="/kak-mi-rabotaem"><button type="submit" class="btn-large"><i class="material-icons right">chevron_right</i>Подробнее</button></a></div>
    <h2 class="big">Почему стоит выбрать именно нас</h2>
    <div class="row">
        <div class="col s12 m4 why">
            <div class="why-head-wrapper">
                <img src='{{ asset("img/common_imgs/index_garanty_mini.png") }} '>
                <strong>Гарантия 18 месяцев</strong>
            </div>
            <p>Мы уверены в качестве нашей мебели, поэтому на всю продукцию предоставляется гарантия 18 месяцев!</p>
        </div>
        <div class="col s12 m4 why">
            <div class="why-head-wrapper">
                <img src='{{ asset("img/common_imgs/index_individ_mini.png") }} '>
                <strong>Индивидуальный подход</strong>
            </div>
            <p>Эскизы Вашей новой кухни или шкафа-купе будут созданы нашими опытными дизайнерами специально для Вас — новая мебель будет не просто уникальна, но и идеально впишется в интерьер!</p>
        </div>
        <div class="col s12 m4 why">
            <div class="why-head-wrapper">
                <img src='{{ asset("img/common_imgs/index_credit_mini.png") }} '>
                <strong>Рассрочка и кредит</strong>
            </div>
            <p>Если Вы устали копить на мебель Вашей мечты и хотите ее прямо сейчас, то возможен заказ нашей мебели в кредит или рассрочку!</p>
        </div>
    </div>
@endsection
