<div class="drop" data-drop-target="catalog">
        <ul>
        @foreach($sections as $section)
            @if ($section->main_section)
            <li><a class="haschild" data-subdrop="{{$section->id}}">{{$section->menu_name}}<i class="material-icons">chevron_right</i></a></li>
            @endif
        @endforeach
        @foreach($root_products as $rp)
            <li><a href="{{ '/product/'.$rp->url_name }}">{{$rp->menu_name}}</a></li>
        @endforeach
        @foreach($sections as $section)
            @if (!$section->main_section)
            <li><a class="haschild" data-subdrop="{{$section->id}}">{{$section->menu_name}}<i class="material-icons">chevron_right</i></a></li>
            @endif
        @endforeach
        </ul>
        @foreach(array_keys($productsBySection) as $key)
        <ul class="subdrop" data-subdrop="{{ $key }}">
            @foreach( $productsBySection[$key] as $product)
                <li><a href="{{ '/product/'.$product->url_name }}">{{ $product->menu_name }}</a></li>
            @endforeach
        </ul>
        @endforeach
</div>
<div class="drop" data-drop-target="info">
    <ul>
        <li><a href="/order">Предварительный расчет</a></li>
        @foreach( $articles as $a )
            <li><a href="{{ '/article/'.$a->url_name }}">{{ $a->menu_name }}</a></li>
        @endforeach
    </ul>
</div>
<div class="drop" data-drop-target="about">
    <ul>
        <li><a href="/contacts">Контакты</a></li>
        <li><a href="/about">О компании</a></li>
    </ul>
</div>
<nav>
    <div class="nav-wrapper">
        <div class="container">
            <ul class="hide-on-med-and-up">
                <li><a href="#" data-activates="collapse_menu" class="button-collapse"><i class="material-icons collapse_icon">menu</i>Меню</a></li>
            </ul>
            <ul class="hide-on-small-only drop_menu">
                <li><i class="material-icons hide-on-small-only" style="color:#555">menu</i></li>
                <li><a data-drop-target="catalog">Каталог</a></li>
                <li><a data-drop-target="info">Информация</a></li>
                <li><a data-drop-target="about">О нас</a></li>       
            </ul>
            <ul class="side-nav" id="collapse_menu">
                <li class="title_li">Каталог</li>
                @foreach($sections as $section)
                    @if ($section->main_section)
                        <li><a href="/section/{{ $section->url_name }}">{{$section->menu_name}}</a></li>
                    @endif
                @endforeach
                <li><a href="/catalog">Весь каталог</a></li>
                <li class="title_li">Информация</li>
                <li><a href="/order">Как заказать</a></li>
                @foreach($articles as $a)
                    <li><a href="{{ '/article/'.$a->url_name }}">{{ $a->menu_name }}</a></li>
                @endforeach
                <li class="title_li">О нас</li>
                <li><a href="/contacts">Контакты</a></li>
                <li><a href="/about">О компании</a></li>
            </ul>
            <?php echo "@if (!Auth::guest())"; ?>
            <ul class="right"> 
                <li>{{ Auth::user()->name }}</li>  
                <li><a href="/logout">Выйти</a></li>
                <li><button class="btn reload_menu">Новое меню</button></li>
            </ul>
            <?php echo "@endif"; ?>
        </div>
    </div>
</nav>