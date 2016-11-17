<!DOCTYPE html>
<html lang="ru">
<head>
    @include('layouts.head')
</head>
<body>
    <noscript><div><img src="https://mc.yandex.ru/watch/40017010" style="position:absolute; left:-9999px;" alt="" /></div></noscript>
    @include('layouts.hat')

    @include('layouts.menu')

    @yield('admin')
    <div class="container">
        <div class="row">
            <div class="ya-share2 right" data-services="vkontakte,facebook,odnoklassniki,gplus,twitter,lj" data-limit="3"></div>
            @yield('content')
        </div> 
    </div>
    
    @yield('similars')
    
    <footer class="page-footer">
        <div class="container">
            <div class="row">
                <div class="col s12 m6">
                    <a href="{{ url('/catalog') }}"><b>КАТАЛОГ</b></a>
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
                        <a class="left" href="https://vk.com/public68794579"><img src="{{asset('img/icon-vk.png')}}" alt="vk logo"></a>
                        <a class="left" href="{{ url('/contacts') }}"><i class="material-icons">email</i></a>
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
    <script type="text/javascript" src="{{asset('js/shadow-img.js')}}"></script>
    <script type="text/javascript" src="{{asset('js/script.js')}}"></script>
    @section('custom_script')
    @show
</body>
</html>
