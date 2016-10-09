@extends('layouts.app')

@section('meta')
<meta name="Keywords" content="{{ $product->meta_keywords}}"/>
<meta name="Description" content="{{ $product->meta_description}}"/> 
@endsection

@section('content')
<div class="col s12 valign-wrapper bread">
    <a href="{{ url('/catalog') }}" class="bread_item valign">Каталог</a>
    <i class="material-icons valign">chevron_right</i>
    @if ($parent_section)
    <a href="{{ url('/section/'.$parent_section->url_name) }}" class="bread_item valign">{{ $parent_section->menu_name }}</a>
    <i class="material-icons valign">chevron_right</i>
    @endif
    <a href="{{ url('/section/'.$product->url_name) }}" class="bread_item valign">{{ $product->menu_name }}</a>
</div>
<div class="col s12">
    <h1>{{ $product->header }}</h1>
    {!! $product->description !!}

    @if( $product->have_property)
        @foreach($properties as $p)
            {{ $p->name }}
        @endforeach
    @else
        <div id="gallery" name = "tiles" style="display: none;">
        @foreach($path as $p)
            <?php
                $bigpath = "photobig/".$product->img_base.'/'.$p;
                $smallpath = "photosmall/".$product->img_base.'/'.$p;
                $alt = str_replace("_", " ", $p);
                $alt = str_replace(".png", "", $alt);
                $alt = str_replace(".jpg", "", $alt);
            ?>
            <img src="{{ asset( $smallpath ) }}" data-image="{{ asset( $bigpath ) }}" alt="{{ $alt }}" data-description="">
        @endforeach
        </div>
    @endif
    @if ($product->parent_section != 3 && $product->parent_section != 4)
        <p><b>На всю мебель мы предоставляем гарантию 18 месяцев!</b></p>
        <p>Чтобы сделать предварительный расчет Вашей мебели и сделать заказ, Вы можете связаться с нашим консультантом по телефону<span class="bold-phones">{{ config('z_my.phone') }}</span> или<span class="bold-phones">{{ config('z_my.consult_phone') }}</span></p>
        <p>Так же вы можете сделать это отправив нам на почту письмо с помощью формы обратной связи:</p>
        <a href="{{ url('/contacts') }}"><button type="submit" class="btn">Заказать</button></a>
    @endif
</div>
@endsection