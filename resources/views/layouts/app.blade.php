<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @section('meta')
        <meta name="Keywords" content="Кухни мебель шкафы на заказ Москва"/>
        <meta name="Description" content="Изготовление Кухни мебель на заказ по индивидуальным размерам"/> 
    @show
    <title>{{ $title or config('z_my.name')." - Кухни и другая мебель на заказ" }}</title>
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
        var JS_APP_URL = {!! json_encode(url('/')) !!};
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
    <div class="container">
        <div class="row head">
                <div class="col s12 m6 logo">
                    <a href="{{ url('/') }}"><img src="{{asset('img/yourlogo_rus.png')}}"></a>
                </div>
                <div class="phones col s12 m6">
                    <div>консультация:<span class="bold-phones">{{ config('z_my.consult_phone') }}</span></div>
                    <!-- <div>вызов замерщика:<span class="bold-phones">{{ config('z_my.zamer_phone') }}</span></div> -->
                    <a href="https://vk.com/public68794579"><img src="{{asset('img/vk.png')}}"></a>
                    <a href="{{ url('/feedback') }}"><i class="material-icons">email</i></a>
                </div>
        </div>
        <div class="drop" name="catalog">
                <ul>
                @foreach($sections as $section)
                    @if ($section->main_section)
                    <a class="haschild" name="{{$section->translit}}">{{$section->name}}<i class="material-icons">chevron_right</i></a>
                    @endif
                @endforeach
                @foreach($root_products as $rp)
                    <a name="{{$rp->translit}}" href="{{ url('/product/'.$rp->translit) }}">{{$rp->name}}</a>
                @endforeach
                @foreach($sections as $section)
                    @if (!$section->main_section)
                    <a class="haschild" name="{{$section->translit}}">{{$section->name}}<i class="material-icons">chevron_right</i></a>
                    @endif
                @endforeach
                </ul>
                @foreach(array_keys($productsBySection) as $key)
                <ul class="subdrop" name="{{$key}}">
                    @foreach( $productsBySection[$key] as $product)
                        <a href="{{ url('/product/'.$product->translit) }}">{{ $product->menu_name }}</a>
                    @endforeach
                </ul>
                @endforeach
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
                <ul class="hide-on-small-only">
                    <li><i class="material-icons hide-on-small-only" style="color:#555">menu</i></li>
                    <li><a class="catalog">Каталог</a></li>
                    <li><a href="{{url('/about')}}">О компании</a></li>
                    <li><a href="{{url('/feedback')}}">Обратная связь</a></li>
                </ul>
                <ul class="side-nav" id="collapse_menu">
                    <li><a href="{{url('/catalog')}}">Каталог</a></li>
                    <li><a href="{{url('/about')}}">О компании</a></li>
                    <li><a href="{{url('/feedback')}}">Обратная связь</a></li>
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
                        <a class="haschild" name="{{$section->translit}}" href="{{ url('/section/'.$section->translit) }}">{{$section->name}}</a>
                        @endif
                    @endforeach
                    @foreach($root_products as $rp)
                        <a name="{{$rp->translit}}" href="{{ url('/product/'.$rp->translit) }}">{{$rp->name}}</a>
                    @endforeach
                    @foreach($sections as $section)
                        @if (!$section->main_section)
                        <a class="haschild" name="{{$section->translit}}" href="{{ url('/section/'.$section->translit) }}">{{$section->name}}</a>
                        @endif
                    @endforeach
                    </div>
                </div>
                <div class="col s12 m6">
                    <a href="{{ url('/feedback') }}"><b>КОНТАКТЫ</b></a>
                    <div class="footer-links">
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
    <script type='text/javascript' src='/unitegallery/dist/themes/carousel/ug-theme-carousel.js'></script> 
    <script type="text/javascript" src="{{asset('js/helpers.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/dropmenu.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    @section('admin_script')
    @show
</body>
</html>
