<b>Заказ с сайта Yourmebel.com</b>
<table>
    <tr>
        <td>Имя:</td>
        <td>{{ $request['name'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Телефон:</td>
        <td>{{ $request['phone'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Адрес:</td>
        <td>{{ $request['address'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{{ $request['email'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Вид мебели:</td>
        <td>{{ $request['section'] or "Не указано" }}</td>
    </tr>
</table>
<b>Параметры</b>
<table>
@if ($request['section'] == 'Кухни на заказ')
    <tr>
        <td>Фасад:</td>
        <td>{{ $request['product'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Формат:</td>
        <td>{{ $request['format'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Столешница:</td>
        <td>{{ $request['stol_material'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Погонные метры:</td>
        <td>{{ $request['meters'] or "Не указано" }}</td>
    </tr>
@elseif ($request['section'] == 'Шкафы на заказ')
     <tr>
        <td>Какой шкаф:</td>
        <td>{{ $request['product'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Длинна:</td>
        <td>{{ $request['length'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Высота:</td>
        <td>{{ $request['height'] or "Не указано" }}</td>
    </tr>
    <tr>
        <td>Ширина:</td>
        <td>{{ $request['width'] or "Не указано" }}</td>
    </tr>
@endif
    <tr>
        <td>Пожелания</td>
        <td>{{ $request['wishes'] or "Не указано" }}</td>
    </tr>
</table>