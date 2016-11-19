@extends('layouts.app')

@section('meta')
<meta name="Keywords" content="{{ $product->meta_keywords}}"/>
<meta name="Description" content="{{ $product->meta_description}}"/>
<title>{{ $product->title }}</title>
@endsection

@section('content')
<div class="valign-wrapper bread">
    <a href="{{ url('/catalog') }}" class="bread_item valign">Каталог</a>
    <i class="material-icons valign">chevron_right</i>
    @if ($parent_section)
    <a href="{{ url('/section/'.$parent_section->url_name) }}" class="bread_item valign">{{ $parent_section->menu_name }}</a>
    <i class="material-icons valign">chevron_right</i>
    @endif
    <span class="active_bread">{{ $product->menu_name }}</span>
</div>
<div class="col s12">
    <h1>{{ $product->header }}</h1>
    <h2>{{ $product->h2 }}</h2>
    {!! $product->text !!}

    @if( $product->have_property)
        <table>
            <tbody>
            @foreach($properties as $p)
                <tr>
                    <td><img class="property-img shadow-big-img" src="{{ asset('/photosmall/'.$p->img) }}" data-image="{{ asset('/photobig/'.$p->img) }}" /></td>
                    <td>
                        @if ($p->text)
                            <b>{{ $p->name }}:</b> {{ $p->text }}
                        @else
                            <b>{{ $p-> name }}</b>
                        @endif
                    </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    @else
        <div id="gallery" data-gallery-type="tiles" style="display: none;">
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
        <!-- <h2>Заказать {{ $product->menu_name }}</h2> -->
        <p>Чтобы сделать предварительный расчет Вашей мебели и сделать заказ, Вы можете связаться с нашим консультантом по телефону<span class="bold-phones">{{ config('z_my.phone') }}</span> или<span class="bold-phones">{{ config('z_my.consult_phone') }}</span></p>
        <p><b>На всю мебель мы предоставляем гарантию 18 месяцев!</b></p>
        <p>Так же вы можете сделать это отправив нам на почту письмо с помощью формы обратной связи:</p>
        <form action="{{ url('/order') }}" method="post">
            {{ csrf_field() }}
            <input type="hidden" name="current_product" value="{{ $product->menu_name }}">
            <input type="hidden" name="current_section" value="{{$parent_section->menu_name or ''}}">
            <?php
                $button = "Сделать расчет";
                if (!$parent_section) $button = "Заказать";
            ?>
            <button type="submit" class="btn-large"><i class="material-icons right">assignment</i>{{ $button }}</button>
        </form>
    @endif
</div>
@endsection

@section('similars')
    @if (count($similars))
    <div class="similars">
        <div class="container">
            <h3>Еще Вам может быть интересно:</h3>
            <div id="similar_gallery" data-gallery-type="main">
            @foreach($similars as $p)
                <?php
                    $smallpath = "title_img/".$p->img_title;
                ?>
                <a href="{{ url('/product/'.$p->url_name) }}">
                    <img src="{{ asset( $smallpath ) }}" data-image="{{ asset( $smallpath ) }}" alt="{{ $p->menu_name }}" data-description="{{ $p->header }}">
                </a>
            @endforeach
            </div>
        </div>
    </div>
    @endif
@endsection