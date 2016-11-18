<div class="drop" name="catalog">
        <ul>
                                <a class="haschild" name="1">Кухни<i class="material-icons">chevron_right</i></a>
                                            <a class="haschild" name="2">Шкафы<i class="material-icons">chevron_right</i></a>
                                                                                <a name="8" href="/product/spalni">Спальни</a>
                    <a name="9" href="/product/detskie">Детская мебель</a>
                    <a name="10" href="/product/ofisnaya-mebel">Мебель для офиса</a>
                    <a name="11" href="/product/biblioteki-na-zakaz">Библиотеки</a>
                                                                                <a class="haschild" name="3">Материалы<i class="material-icons">chevron_right</i></a>
                                            <a class="haschild" name="4">Комплектующие<i class="material-icons">chevron_right</i></a>
                            </ul>
                <ul class="subdrop" name="1">
                            <a href="/product/kuhni-massiv-dereva-na-zakaz">Кухни из массива</a>
                            <a href="/product/kuhni-emal">Кухни Эмаль</a>
                            <a href="/product/kuhni-iz-plastika">Кухни из пластика</a>
                            <a href="/product/kuhni-fantaziya">Кухни Фантазия</a>
                            <a href="/product/kuhni-ldsp">Кухни ЛДСП</a>
                            <a href="/product/kuhni-mdf-plenka-pvh">Кухни МДФ пленка ПВХ</a>
                            <a href="/product/kuhni-s-ramochnymi-fasadami">Кухни с рамочными фасадами</a>
                    </ul>
                <ul class="subdrop" name="2">
                            <a href="/product/shkafi-kupe-vstroennie">Шкафы-купе встроенные</a>
                            <a href="/product/shkafi-v-prihozhuyu">Шкафы в прихожую</a>
                            <a href="/product/stenki">Стенки в гостинную</a>
                            <a href="/product/shkafi-kupe-na-zakaz">Шкафы-купе</a>
                            <a href="/product/shkafi-stvorchatie">Створчатые шкафы</a>
                    </ul>
                <ul class="subdrop" name="3">
                            <a href="/product/fasadi-plenka-pvh">Фасады пленка ПВХ</a>
                            <a href="/product/kamen">Искусственный камень</a>
                    </ul>
                <ul class="subdrop" name="4">
                            <a href="/product/fasadi">Варианты фасадов</a>
                            <a href="/product/vitrazhi">Витражи</a>
                            <a href="/product/zerkala">Зеркала</a>
                            <a href="/product/vidvizhnie-mehanizmi">Системы выдвижения ящиков</a>
                            <a href="/product/podemnie-mehanizmi">Подъемные механизмы</a>
                    </ul>
        </div>
<div class="drop" name="info">
    <ul>
        <a href="/order">Предварительный расчет</a>
                    <a href="/article/kak-mi-rabotaem">Как мы работаем</a>
                    <a href="/article/kak-vibrat-kuhnu">Как выбрать кухню</a>
            </ul>
</div>
<div class="drop" name="about">
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
                <li><a name="catalog">Каталог</a></li>
                <li><a name="info">Информация</a></li>
                <li><a name="about">О нас</a></li>       
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