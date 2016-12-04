@extends('layouts.app')

@section('meta')
<meta name="Keywords" content="{{ $section->meta_keywords}}"/>
<meta name="Description" content="{{ $section->meta_description}}"/> 
<title>{{ $section->title }}</title>
@endsection

@section('content')
<div class="valign-wrapper bread">
    <a href="{{ url('/catalog') }}" class="bread_item valign">Каталог</a>
    <i class="material-icons valign">chevron_right</i>
    <span class="active_bread">{{ $section->menu_name }}</span>
</div>
<div class="col s12">
    <h1>{{ $section->header }}</h1>
    <h2>{{ $section->h2 }}</h2>
    {!! $section->text !!}
</div>   
<div class="col s12">
    <div id="gallery" data-gallery-type="main">
    @foreach($children_products as $p)
        <?php
            $bigpath = "photobig/".$p->img_base.'/'.$p->img_title;
            $smallpath = "title_img/".$p->img_title;
        ?>
        <a href="{{ url('/product/'.$p->url_name) }}">
            <img src="{{ asset( $smallpath ) }}" data-image="{{ asset( $bigpath ) }}" alt="{{ $p->menu_name }}" data-description="{{ $p->header }}">
        </a>
    @endforeach
    </div>  
</div>
@endsection