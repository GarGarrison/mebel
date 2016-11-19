<footer class="page-footer">
    <div class="container">
        <div class="row">
            <div class="col s12 m6">
                <a href="/catalog"><b>КАТАЛОГ</b></a>
                <div class="footer-links">
                @foreach($sections as $section)
                    @if ($section->main_section)
                    <a href="{{ '/section/'.$section->url_name }}">{{$section->menu_name}}</a>
                    @endif
                @endforeach
                @foreach($root_products as $rp)
                    <a href="{{ '/product/'.$rp->url_name }}">{{$rp->menu_name}}</a>
                @endforeach
                @foreach($sections as $section)
                    @if (!$section->main_section)
                    <a href="{{ '/section/'.$section->url_name }}">{{$section->menu_name}}</a>
                    @endif
                @endforeach
                </div>
            </div>
            <div class="col s12 m6">
                <a href="/contacts"><b>КОНТАКТЫ</b></a>
                <div class="footer-links">
                    <div>{{ config('z_my.phone') }}</div>
                    <div>{{ config('z_my.consult_phone') }}</div>
                    <!-- <div>{{ config('z_my.zamer_phone') }}</div> -->
                    <div><u>{{ config('z_my.address') }}</u></div>
                    <a class="left" href="{{ config('z_my.vkgroup') }}"><img src="{{asset('img/icon-vk.png')}}" alt="vk logo"></a>
                    <a class="left" href="/contacts"><i class="material-icons">email</i></a>
                </div>
            </div>
        </div>
    </div>
    <div class="black-strip"></div>
</footer>