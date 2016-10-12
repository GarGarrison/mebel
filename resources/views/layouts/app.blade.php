<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="yandex-verification" content="a12b6d1e0933c944" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('meta')
        <meta name="Keywords" content="корпусная мебель кухни мебель шкафы спальни на заказ Москва Подмосковье от производителя"/>
        <meta name="Description" content="Изготовление мебели на заказ - кухни, шкафы-купе и другая корпусная мебель"/> 
    @show
    <title>{{config('z_my.name')." - "}}{{ $title or "Изготовление мебели на заказ по индивидуальным размерам" }}</title>
    <link rel="shortcut icon" href="{{{ asset('/favicon3.png') }}}">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/0.97.7/css/materialize.min.css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <link rel='stylesheet' href='/unitegallery/dist/css/unite-gallery.css' type='text/css' />
    <link rel="stylesheet" type="text/css" href="{{asset('css/style.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/material_helper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/picker_helper.css')}}">
    <link rel="stylesheet" type="text/css" href="{{asset('css/dropmenu.css')}}">
    <!-- Scripts -->
    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
<!-- Yandex.Metrika counter -->
<script type="text/javascript">
    (function (d, w, c) {
        (w[c] = w[c] || []).push(function() {
            try {
                w.yaCounter40017010 = new Ya.Metrika({
                    id:40017010,
                    clickmap:true,
                    trackLinks:true,
                    accurateTrackBounce:true
                });
            } catch(e) { }
        });

        var n = d.getElementsByTagName("script")[0],
            s = d.createElement("script"),
            f = function () { n.parentNode.insertBefore(s, n); };
        s.type = "text/javascript";
        s.async = true;
        s.src = "https://mc.yandex.ru/metrika/watch.js";

        if (w.opera == "[object Opera]") {
            d.addEventListener("DOMContentLoaded", f, false);
        } else { f(); }
    })(document, window, "yandex_metrika_callbacks");
</script>
<noscript><div><img src="https://mc.yandex.ru/watch/40017010" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
<!-- /Yandex.Metrika counter -->
</head>
<body>
    <div class="container">
        <div class="row head">
                <div class="col s12 m6 logo">
                    <a href="{{ url('/') }}"><img src="{{asset('img/yourlogo_rus.png')}}"></a>
                </div>
                <div class="phones col s12 m6">
                    <div><b>Консультация:</b><span class="bold-phones">{{ config('z_my.phone') }}</span></div>
                    <div><span class="bold-phones">{{ config('z_my.consult_phone') }}</span></div>
                    <a href="https://vk.com/public68794579"><img src="{{asset('img/vk.png')}}"></a>
                    <a href="{{ url('/contacts') }}"><i class="material-icons">email</i></a>
                </div>
        </div>
        <div class="drop" name="catalog">
                <ul>
                @foreach($sections as $section)
                    @if ($section->main_section)
                    <a class="haschild" name="{{$section->id}}">{{$section->menu_name}}<i class="material-icons">chevron_right</i></a>
                    @endif
                @endforeach
                @foreach($root_products as $rp)
                    <a name="{{$rp->id}}" href="{{ url('/product/'.$rp->url_name) }}">{{$rp->menu_name}}</a>
                @endforeach
                @foreach($sections as $section)
                    @if (!$section->main_section)
                    <a class="haschild" name="{{$section->id}}">{{$section->menu_name}}<i class="material-icons">chevron_right</i></a>
                    @endif
                @endforeach
                </ul>
                @foreach(array_keys($productsBySection) as $key)
                <ul class="subdrop" name="{{$key}}">
                    @foreach( $productsBySection[$key] as $product)
                        <a href="{{ url('/product/'.$product->url_name) }}">{{ $product->menu_name }}</a>
                    @endforeach
                </ul>
                @endforeach
        </div>
        <div class="drop" name="info">
            <ul>
                <a href="{{ url('/about') }}">О компании</a>
                <!-- <a href="{{ url('/kak-vibrat-kuhnyu') }}">Как выбрать кухню</a> -->
            </ul>
        </div>
    </div>
    <nav>
        <div class="nav-wrapper">
            <div class="container">
                <!-- <a href="#" data-activates="collapse_menu" class="button-collapse"><i class="material-icons" style="color:#555">menu</i></a> -->
                <ul class="hide-on-med-and-up">
                    <li><i class="material-icons" style="color:#555">menu</i></li>
                    <li><a href="#" data-activates="collapse_menu" class="button-collapse">Меню</a></li>
                </ul>
                <ul class="hide-on-small-only drop_menu">
                    <li><i class="material-icons hide-on-small-only" style="color:#555">menu</i></li>
                    <li><a name="catalog">Каталог</a></li>
                    <li><a name="info"">Информация</a></li>
                    <li><a href="{{url('/contacts')}}">Контакты</a></li>
                </ul>
                <ul class="side-nav" id="collapse_menu">
                    <li><a href="{{url('/catalog')}}">Каталог</a></li>
                    <li><a href="{{url('/about')}}">О компании</a></li>
                    <li><a href="{{url('/contacts')}}">Контакты</a></li>
                </ul>
                @if (!Auth::guest())
                <ul class="right"> 
                    <li>{{ Auth::user()->name }}</li>  
                    <li><a href="{{ url('/logout') }}">Выйти</a></li>
                </ul>
                @endif
                <!-- <ul class="right">
                    <li><a href="{{url('/admin')}}">Admin</a></li>
                </ul> -->
            </div>
        </div>
    </nav>
    <div class="container">
         <div class="row">
 <!--           <div class="col s12">
                <div class="content"> -->
                    @yield('content')
<!--                 </div>
            </div>-->
        </div> 
    </div>
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <a href="{{ url('/catalog') }}"><b>КАТАЛОГ ПРОДУКЦИИ</b></a>
                    <div class="footer-links">
                    @foreach($sections as $section)
                        @if ($section->main_section)
                        <a class="haschild" name="{{$section->url_name}}" href="{{ url('/section/'.$section->url_name) }}">{{$section->menu_name}}</a>
                        @endif
                    @endforeach
                    @foreach($root_products as $rp)
                        <a name="{{$rp->url_name}}" href="{{ url('/product/'.$rp->url_name) }}">{{$rp->menu_name}}</a>
                    @endforeach
                    @foreach($sections as $section)
                        @if (!$section->main_section)
                        <a class="haschild" name="{{$section->url_name}}" href="{{ url('/section/'.$section->url_name) }}">{{$section->menu_name}}</a>
                        @endif
                    @endforeach
                    </div>
                </div>
                <div class="col s12 m6">
                    <a href="{{ url('/contacts') }}"><b>КОНТАКТЫ</b></a>
                    <div class="footer-links">
                        <div>{{ config('z_my.phone') }}</div>
                        <div>{{ config('z_my.consult_phone') }}</div>
                        <!-- <div>{{ config('z_my.zamer_phone') }}</div> -->
                        <div><u>{{ config('z_my.address') }}</u></div>
                    </div>
                </div>
            </div>
        </div>
        <div class="black-strip"></div>
    </footer>
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
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    @section('admin_script')
    @show
</body>
</html>
