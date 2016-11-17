<!DOCTYPE html>
<html lang="ru">
<head>
@include('layouts.head')
</head>
<body>
    @include('layouts.hat')
    <nav></nav>
    <div class="container">
        <h1 style="font-size: 5em;">404</h1>
        <h2>Сожалеем, такой страницы не существует</h2>
        <p>Ознакомьтесь с нашим каталогом, там Вы точно найдете что-нибудь интересное!</p>
        <a href="/catalog"><button class="btn-large" style="margin-top: 20px;">В каталог</button></a>
    </div>
</body>
</html>