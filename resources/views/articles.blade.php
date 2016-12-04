@extends('layouts.app')

@section('meta')
    <meta name="Keywords" content="корпусная мебель кухни мебель шкафы спальни детские на заказ Москва Подмосковье от производителя как выбрать"/>
    <meta name="Description" content="Вашамебель - полезная информация. Статьи о том, как лучше выбрать кухни, шкафы и другую мебель на заказ"/> 
    <title>ВашаМебель - советы по выбору кухонь, шкафов и другой мебели на заказ</title>
@endsection

@section('content')
<h1>Полезные статьи</h1>
@foreach($articles as $a)
<a href="/article/{{ $a->url_name }}">
<div class="preview_item">
    <img src="{{ $a->preview_img }}">
    <h5>{{ $a->header }}</h5>
    <p>{!! $a->annotation !!}</p>
</div>
</a>
@endforeach
@endsection