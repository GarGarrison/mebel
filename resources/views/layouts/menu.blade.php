<div class="drop" data-drop-target="catalog">
        <ul>
                                <a class="haschild" data-subdrop="1">Кухни<i class="material-icons">chevron_right</i></a>
                                            <a class="haschild" data-subdrop="2">Шкафы<i class="material-icons">chevron_right</i></a>
                                                                                <a href="/product/spalni">Спальни</a>
                    <a href="/product/detskie">Детские</a>
                    <a href="/product/ofisnaya-mebel">Мебель для офиса</a>
                    <a href="/product/biblioteki-na-zakaz">Библиотеки</a>
                                                                                <a class="haschild" data-subdrop="3">Материалы<i class="material-icons">chevron_right</i></a>
                                            <a class="haschild" data-subdrop="4">Комплектующие<i class="material-icons">chevron_right</i></a>
                            </ul>
                <ul class="subdrop" data-subdrop="1">
                            <a href="/product/kuhni-massiv-dereva-na-zakaz">Кухни из массива test</a>
                            <a href="/product/kuhni-mdf-plenka-pvh">Кухни МДФ пленка ПВХ</a>
                            <a href="/product/kuhni-emal">Кухни Эмаль</a>
                            <a href="/product/kuhni-iz-plastika">Кухни Пластик</a>
                            <a href="/product/kuhni-ldsp">Кухни ЛДСП</a>
                            <a href="/product/kuhni-fantaziya">Кухни Фантазия на заказ</a>
                            <a href="/product/kuhni-s-ramochnymi-fasadami">Кухни рамочный фасад</a>
                    </ul>
                <ul class="subdrop" data-subdrop="2">
                            <a href="/product/shkafi-kupe-vstroennie">Шкафы-купе встроенные</a>
                            <a href="/product/shkafi-v-prihozhuyu">Шкафы в прихожую</a>
                            <a href="/product/stenki">Стенки в гостинную</a>
                            <a href="/product/shkafi-kupe-na-zakaz">Шкафы-купе</a>
                            <a href="/product/shkafi-stvorchatie">Створчатые шкафы</a>
                    </ul>
                <ul class="subdrop" data-subdrop="3">
                            <a href="/product/fasadi-plenka-pvh">Фасады пленка ПВХ</a>
                            <a href="/product/kamen">Искусственный камень</a>
                    </ul>
                <ul class="subdrop" data-subdrop="4">
                            <a href="/product/fasadi">Варианты фасадов</a>
                            <a href="/product/vitrazhi">Витражи</a>
                            <a href="/product/zerkala">Зеркала</a>
                            <a href="/product/vidvizhnie-mehanizmi">Системы выдвижения ящиков</a>
                            <a href="/product/podemnie-mehanizmi">Подъемные механизмы</a>
                    </ul>
        </div>
<div class="drop" data-drop-target="info">
    <ul>
        <a href="/order">Предварительный расчет</a>
                    <a href="/article/kak-mi-rabotaem">Как мы работаем</a>
                    <a href="/article/kak-vibrat-kuhnu">Как выбрать кухню</a>
            </ul>
</div>
<div class="drop" data-drop-target="about">
    <ul>
        <a href="/contacts">Контакты</a>
        <a href="/about">О компании</a>
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
                                                            <li><a href="/section/kuhni">Кухни</a></li>
                                                                                <li><a href="/section/shkafi">Шкафы</a></li>
                                                                                                                            <li><a href="/catalog">Весь каталог</a></li>
                <li class="title_li">Информация</li>
                <li><a href="/order">Как заказать</a></li>
                                    <li><a href="/article/kak-mi-rabotaem">Как мы работаем</a></li>
                                    <li><a href="/article/kak-vibrat-kuhnu">Как выбрать кухню</a></li>
                                <li class="title_li">О нас</li>
                <li><a href="/contacts">Контакты</a></li>
                <li><a href="/about">О компании</a></li>
            </ul>
            @if (!Auth::guest())            <ul class="right"> 
                <li>gar.garrison</li>  
                <li><a href="/logout">Выйти</a></li>
                <li><button class="btn reload_menu">Новое меню</button></li>
            </ul>
            @endif        </div>
    </div>
</nav>