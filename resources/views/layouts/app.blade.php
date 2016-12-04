<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="utf-8">
    <meta name="yandex-verification" content="a12b6d1e0933c944" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('meta')
        <meta name="Keywords" content="корпусная мебель кухни мебель шкафы спальни на заказ Москва Подмосковье от производителя"/>
        <meta name="Description" content="Мебель на заказ - кухни, шкафы-купе, мебель для спальни, детских и другая корпусная мебель для дома и офиса"/> 
        <title>Изготовление мебели на заказ по индивидуальным размерам</title>
    @show
    <link rel="shortcut icon" href="{{{ asset('/favicon.png') }}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='/unitegallery/dist/css/unite-gallery.css' type='text/css' />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/material_helper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropmenu.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/shadow-img.css')}}">
    @include('layouts.vendorjs')
</head>
<body>
    <noscript><div><img src="https://mc.yandex.ru/watch/40017010" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    <div class="container">
        <div class="row head">
            <div class="col s12 m6 logo">
                <a href="{{ url('/') }}"><img src="{{asset('img/yourlogo_rus.png')}}" alt="yourmebel.com logo"></a>
            </div>
            <div class="phones col s12 m6">
                <div><b>Консультация:</b><span class="bold-phones">{{ config('z_my.phone') }}</span></div>
                <div><span class="bold-phones">{{ config('z_my.consult_phone') }}</span></div>
                <a class="right" title="Напишите нам письмо" href="{{ url('/contacts') }}"><i class="material-icons">email</i></a>
            </div>
        </div>
    </div>
    @include('layouts.menu')
    @yield('admin')
    <div class="container">
        <div class="row">
            <div class="ya-share2 right" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter,lj" data-limit="3"></div>
            @yield('content')
        </div> 
    </div>
    
    @yield('similars')
    
    @include('layouts.footer')
    <!-- Scripts -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/js/materialize.min.js"></script>
    <script type="text/javascript">
        $.ajaxSetup({
            headers: { 'X-CSRF-Token' : $('meta[name="csrf-token"]').attr("content") }
        });
    </script>
    <script type='text/javascript' src='/unitegallery/dist/js/unitegallery.min.js'></script>
    <script type='text/javascript' src='/unitegallery/dist/themes/tiles/ug-theme-tiles.js'></script> 
    <script type='text/javascript' src='/unitegallery/dist/themes/tilesgrid/ug-theme-tilesgrid.js'></script> 
    <script type="text/javascript" src="{{asset('js/helpers.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dropmenu.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/shadow-img.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    @section('custom_script')
    @show
</body>
</html>
