@extends('layouts.app')

@section('content')
    <div class="col s12 l10 offset-l1">
        <div id="gallery" name="main">
            @foreach($main_items as $item)
            <?php
                $path_url = "/section/";
                if ($item->root_product) $path_url = "/product/";
                $bigpath = "photobig/".$item->img_base.'/'.$item->img_title;
                $smallpath = "photosmall/".$item->img_base.'/'.$item->img_title;
            ?>
                        <a href="{{ url($path_url.$item->url_name)}}">
                            <img src="{{ asset( $smallpath ) }}" data-image="{{ asset( $bigpath ) }}" alt="{{ $item->header }}" data-description="{{ $item->menu_name }}">
                        </a>
            @endforeach
        </div>  
    </div>
@endsection