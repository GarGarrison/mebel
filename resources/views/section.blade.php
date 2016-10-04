@extends('layouts.app')

@section('meta')
<meta name="Keywords" content="{{ $section->meta_keywords}}"/>
<meta name="Description" content="{{ $section->meta_description}}"/> 
@endsection

@section('content')
<div class="col s12 valign-wrapper bread">
    <a href="{{ url('/catalog') }}" class="bread_item valign">Каталог</a>
    <i class="material-icons valign">chevron_right</i>
    <a href="{{ url('/section/'.$section->translit) }}" class="bread_item valign">{{ $section->name }}</a>
</div>
<div class="col s12">
    <h1>{{ $section->name }}</h1>
    {!! $section->description !!}
    <div class="col s12 l10 offset-l1">
        <div id="gallery" name="main">
        @foreach($products as $p)
            <?php
                $bigpath = "photobig/".$p->img_base.'/'.$p->title_img;
                $smallpath = "photosmall/".$p->img_base.'/'.$p->title_img;
            ?>
            <a href="{{ url('/product/'.$p->translit) }}">
                <img src="{{ asset( $bigpath ) }}" data-image="{{ asset( $bigpath ) }}" alt="{{ $p->name }}" data-description="{{ $p->name }}">
            </a>
        @endforeach
        </div>  
    </div>
</div>
@endsection