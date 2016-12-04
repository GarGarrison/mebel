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
@endsection
