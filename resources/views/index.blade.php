@extends('layouts.app')

@section('content')
    <div class="col s12 l10 offset-l1">
        <div id="gallery" name="main">
            @foreach($main_items as $section)
            <?php
                $path_url = "/section/";
                if ($section->img_base) $path_url = "/product/";
                $bigpath = "photobig/".$section->translit.'/'.$section->title_img;
                $smallpath = "photosmall/".$section->translit.'/'.$section->title_img;
            ?>
                        <a href="{{ url($path_url.$section->translit)}}">
                            <img src="{{ asset( $smallpath ) }}" data-image="{{ asset( $bigpath ) }}" alt="{{ $section->name }}" data-description="{{ $section->name }}">
                        </a>
            @endforeach
        </div>  
    </div>
@endsection