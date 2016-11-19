<div class="drop" data-drop-target="catalog">
        <ul>
                                <li><a class="haschild" data-subdrop="1">Кухни<i class="material-icons">chevron_right</i></a></li>
                                            <li><a class="haschild" data-subdrop="2">Шкафы<i class="material-icons">chevron_right</i></a></li>
                                                                                <li><a href="/product/spalni">Спальни</a></li>
                    <li><a href="/product/detskie">Детская мебель</a></li>
                    <li><a href="/product/ofisnaya-mebel">Мебель для офиса</a></li>
                    <li><a href="/product/biblioteki-na-zakaz">Библиотеки</a></li>
                                                                                <li><a class="haschild" data-subdrop="3">Материалы<i class="material-icons">chevron_right</i></a></li>
                                            <li><a class="haschild" data-subdrop="4">Комплектующие<i class="material-icons">chevron_right</i></a></li>
                            </ul>
                <ul class="subdrop" data-subdrop="1">
                            <li><a href="/product/kuhni-massiv-dereva-na-zakaz">Кухни из массива</a></li>
                            <li><a href="/product/kuhni-emal">Кухни Эмаль</a></li>
                            <li><a href="/product/kuhni-iz-plastika">Кухни из пластика</a></li>
                            <li><a href="/product/kuhni-fantaziya">Кухни Фантазия</a></li>
                            <li><a href="/product/kuhni-ldsp">Кухни ЛДСП</a></li>
                            <li><a href="/product/kuhni-mdf-plenka-pvh">Кухни МДФ пленка ПВХ</a></li>
                            <li><a href="/product/kuhni-s-ramochnymi-fasadami">Кухни с рамочными фасадами</a></li>
                    </ul>
                <ul class="subdrop" data-subdrop="2">
                            <li><a href="/product/shkafi-kupe-vstroennie">Шкафы-купе встроенные</a></li>
                            <li><a href="/product/shkafi-v-prihozhuyu">Шкафы в прихожую</a></li>
                            <li><a href="/product/stenki">Стенки в гостинную</a></li>
                            <li><a href="/product/shkafi-kupe-na-zakaz">Шкафы-купе</a></li>
                            <li><a href="/product/shkafi-stvorchatie">Створчатые шкафы</a></li>
                    </ul>
                <ul class="subdrop" data-subdrop="3">
                            <li><a href="/product/fasadi-plenka-pvh">Фасады пленка ПВХ</a></li>
                            <li><a href="/product/kamen">Искусственный камень</a></li>
                    </ul>
                <ul class="subdrop" data-subdrop="4">
                            <li><a href="/product/fasadi">Варианты фасадов</a></li>
                            <li><a href="/product/vitrazhi">Витражи</a></li>
                            <li><a href="/product/zerkala">Зеркала</a></li>
                            <li><a href="/product/vidvizhnie-mehanizmi">Системы выдвижения ящиков</a></li>
                            <li><a href="/product/podemnie-mehanizmi">Подъемные механизмы</a></li>
                    </ul>
        </div>
<div class="drop" data-drop-target="info">
    <ul>
        <li><a href="/order">Предварительный расчет</a></li>
                    <li><a href="/article/kak-mi-rabotaem">Как мы работаем</a></li>
                    <li><a href="/article/kak-vibrat-kuhnu">Как выбрать кухню</a></li>
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