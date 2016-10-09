@extends('layouts.app')

@section('content')
<h4>Каталог</h4>
<div class="catalog-box">
    <div class="row">
    @foreach($sections as $section)
        @if ($section->main_section)
        <div class="col s6 m3">
            <div><b><a href="{{ url('/section/'.$section->url_name) }}">{{ $section->menu_name }}</a></b></div>
            <ul>
                @foreach($productsBySection[$section->id] as $product)
                <li><a href="{{ url('/product/'.$product->url_name) }}">{{ $product->menu_name }}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
    @endforeach
    <div class="col s6 m3">
        <div><b>Разная мебель</b></div>
        <ul>
            @foreach($root_products as $rp)
                <li><a name="{{$rp->translit}}" href="{{ url('/product/'.$rp->url_name) }}">{{$rp->menu_name}}</a></li>
            @endforeach
        </ul>
    </div>
    @foreach($sections as $section)
        @if (!$section->main_section)
        <div class="col s6 m3">
            <div><b><a href="{{ url('/section/'.$section->url_name) }}">{{ $section->menu_name }}</a></b></div>
            <ul>
                @foreach($productsBySection[$section->id] as $product)
                <li><a href="{{ url('/product/'.$product->url_name) }}">{{ $product->menu_name }}</a></li>
                @endforeach
            </ul>
        </div>
        @endif
    @endforeach
    </div>
</div>
@endsection