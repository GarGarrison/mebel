@extends('layouts.app')

@section('meta')
    <meta name="Keywords" content="корпусная мебель кухни мебель шкафы спальни на заказ Москва Подмосковье от производителя"/>
    <meta name="Description" content="Вашамебель - каталог. Изготовление мебели на заказ - кухни, шкафы-купе и другая корпусная мебель"/> 
    <title>ВашаМебель - изготовление мебели на заказ по индивидуальным размерам - каталог компании</title>
@endsection

@section('content')
<h1>Каталог</h1>
<div class="catalog-box">
    <div class="row">
    @foreach($sections as $section)
        @if ($section->main_section)
        <div class="col s6 m3">
            <div><b><a href="{{ '/section/'.$section->url_name }}">{{ $section->menu_name }}</a></b></div>
            <ul>
                @foreach($productsBySection[$section->id] as $product)
                <li><a href="{{ '/product/'.$product->url_name }}">{{ $product->menu_name }}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
    @endforeach
    <div class="col s6 m3">
        <div><b>Разная мебель</b></div>
        <ul>
            @foreach($root_products as $rp)
                <li><a href="{{ '/product/'.$rp->url_name }}">{{$rp->menu_name}}</a></li>
            @endforeach
        </ul>
    </div>
    @foreach($sections as $section)
        @if (!$section->main_section)
        <div class="col s6 m3">
            <div><b><a href="{{ '/section/'.$section->url_name }}">{{ $section->menu_name }}</a></b></div>
            <ul>
                @foreach($productsBySection[$section->id] as $product)
                <li><a href="{{ '/product/'.$product->url_name }}">{{ $product->menu_name }}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
    @endforeach
    </div>
</div>
@endsection