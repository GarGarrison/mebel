<b>Заказ с сайта Yourmebel.com</b>
<table>
    <tr>
        <td>Имя</td>
        <td>{{ $request['name'] }}</td>
    </tr>
    <tr>
        <td>Телефон</td>
        <td>{{ $request['phone'] }}</td>
    </tr>
    <tr>
        <td>Адрес</td>
        <td>{{ $request['address'] }}</td>
    </tr>
    <tr>
        <td>Email</td>
        <td>{{ $request['email'] }}</td>
    </tr>
    <tr>
        <td>Вид мебели</td>
        <td>{{ $request['section'] }}</td>
    </tr>
</table>
<b>Параметры</b>
<table>
@if ($request['section'] == 'Кухни')
    <tr>
        <td>Фасад</td>
        <td>{{ $request['product'] }}</td>
    </tr>
    <tr>
        <td>Формат</td>
        <td>{{ $request['format'] }}</td>
    </tr>
    <tr>
        <td>Погонные метры</td>
        <td>{{ $request['meters'] }}</td>
    </tr>
@elseif ($request['section'] == 'Шкафы')
     <tr>
        <td>Какой шкаф</td>
        <td>{{ $request['product'] }}</td>
    </tr>
    <tr>
        <td>Длинна</td>
        <td>{{ $request['length'] }}</td>
    </tr>
    <tr>
        <td>Высота</td>
        <td>{{ $request['height'] }}</td>
    </tr>
    <tr>
        <td>Ширина</td>
        <td>{{ $request['width'] }}</td>
    </tr>
@endif
    <tr>
        <td>Пожелания</td>
        <td>{{ $request['wishes'] }}</td>
    </tr>
</table>