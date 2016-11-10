@extends('layouts.app')

@section('content')
<div class="col s12">
    <h1>Изготовление мебели на заказ</h1>
    <h2>Купить мебель от производителя стало совсем просто!</h2>
    <p>Наша компания уже много лет привносит в дома наших клиентов уют, 
    удобство и оригинальность. Заглянув в наш <a href="{{ url('/catalog') }}"><strong>каталог</strong></a>, 
    Вы найдете множество примеров изготовленной по индивидуальным размерам корпусной мебели. 
    У нас Вы можете заказать <a href="{{ url('/section/kuhni') }}">кухонные</a> и 
    <a href="{{ url('/product/spalni') }}">спальные</a> гарнитуры, 
    <a href="{{ url('/product/shkafi-kupe-vstroennie') }}">шкафы-купе</a>, 
    <a href="{{ url('/product/shkafi-v-prihozhuyu') }}">прихожие</a> и 
    многое другое. Каждое изделие прекрасно дополнит Ваш интерьер, а благодаря 
    индивидуальному проекту от наших дизайнеров впишется в любые уголки Вашей 
    квартиры. Мы предлагаем огромное разнообразие дизайнерских решений, материалов и 
    комплектующих. Уже сотни клиентов убедились в качестве нашей продукции, 
    предлагаем сделать это и Вам!</p>
    <p>Наши специалисты с удовольствием проконсультируют Вас по любым вопросам и 
    помогут выбрать подходящую именно Вам мебель.<br />
    Звоните скорей и делайте заказ, мы поможем сделать Ваш дом еще более неповторимым!
    </p>
</div>
<!-- <div class="col s12 l10 offset-l1"> -->
<div class="col s12">
    <div id="gallery" name="main">
        @foreach($main_items as $item)
        <?php
            $path_url = "/section/";
            if ($item->root_product) $path_url = "/product/";
            $bigpath = "photobig/".$item->img_base.'/'.$item->img_title;
            $smallpath = "title_img/".$item->img_title;
        ?>
                    <a href="{{ url($path_url.$item->url_name)}}">
                        <img src="{{ asset( $smallpath ) }}" data-image="{{ asset( $bigpath ) }}" alt="{{ $item->menu_name }}" data-description="{{ $item->header }}">
                    </a>
        @endforeach
    </div>  
</div>
@endsection