@extends('layouts.app')

@section('meta')
<meta name="Keywords" content="{{ $section->meta_keywords}}"/>
<meta name="Description" content="{{ $section->meta_description}}"/> 
@endsection

@section('content')
<div class="col s12 valign-wrapper bread">
    <a href="{{ url('/catalog') }}" class="bread_item valign">Каталог</a>
    <i class="material-icons valign">chevron_right</i>
    <a href="{{ url('/section/'.$section->url_name) }}" class="bread_item valign">{{ $section->menu_name }}</a>
</div>
<div class="col s12">
    <h1>{{ $section->header }}</h1>
    {!! $section->description !!}
    <div class="col s12 l10 offset-l1">
        <div id="gallery" name="main">
        @foreach($products as $p)
            <?php
                $bigpath = "photobig/".$p->img_base.'/'.$p->img_title;
                $smallpath = "photosmall/".$p->img_base.'/'.$p->img_title;
            ?>
            <a href="{{ url('/product/'.$p->url_name) }}">
                <img src="{{ asset( $smallpath ) }}" data-image="{{ asset( $bigpath ) }}" alt="{{ $p->menu_name }}" data-description="{{ $p->header }}">
            </a>
        @endforeach
        </div>  
    </div>
</div>
@endsection