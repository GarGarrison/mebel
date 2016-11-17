@extends('layouts.app')

@section('meta')
    <meta name="Keywords" content="корпусная мебель кухни мебель шкафы спальни на заказ Москва Подмосковье от производителя"/>
    <meta name="Description" content="Вашамебель - контакты. Изготовление мебели на заказ - кухни, шкафы-купе и другая корпусная мебель"/> 
    <title>ВашаМебель - изготовление мебели на заказ по индивидуальным размерам - контакты</title>
@endsection

@section('content')
<h1>Контакты</h1>
<div class="row">
    <div class="col s12 l8">
        <table>
            <tbody>
                <tr>
                    <td><u>Наши консультанты:</u></td>
                    <td>
                        <span class="bold-phones">{{ config('z_my.phone') }}</span><br />
                        <span class="bold-phones">{{ config('z_my.consult_phone') }}</span>
                    </td>
                </tr>
                <tr>
                    <td><u>Наш адрес:</u></td>
                    <td><span class="bold-phones">{{ config('z_my.address') }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<h6>Сделать заказ или задать нам вопрос вы можете заполнив форму:</h6>
@if (session('response'))
    <script type="text/javascript">alert("Ваш вопрос успешно отправлен!")</script>
@endif
<form class="col s12" method="post" action="{{ url('/util/mail') }}">
    {{ csrf_field() }}
    <input type="hidden" name="subject" value="question">
    <div class="row">
        <div class="input-field col s12 l6">
            <i class="material-icons prefix">account_circle</i>
            <input name="name" type="text" class="validate">
            <label for="name">Имя</label>
            @if ($errors->has('name'))
                <span class="error-block">{{ $errors->first('name') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 l6">
            <i class="material-icons prefix">phone</i>
            <input name="phone" type="text" class="validate">
            <label for="phone">Телефон</label>
            @if ($errors->has('phone'))
                <span class="error-block">{{ $errors->first('phone') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 l6">
            <i class="material-icons prefix">business</i>
            <input name="address" type="text" class="validate">
            <label for="address">Город</label>
            @if ($errors->has('address'))
                <span class="error-block">{{ $errors->first('address') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 l6">
            <i class="material-icons prefix">email</i>
            <input name="email" type="text" class="validate">
            <label for="email">Электронная почта</label>
            @if ($errors->has('email'))
                <span class="error-block">{{ $errors->first('email') }}</span>
            @endif
        </div>
    </div>
    <div class="row">
        <div class="input-field col s12 l6">
            <i class="material-icons prefix">comment</i>
            <textarea name="text" class="materialize-textarea"></textarea>
            <label for="text">Сообщение</label>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l6">
            <button type="submit" class="btn-large">
            <i class="material-icons right">mail_outline</i>
                Отправить
            </button>
        </div>
    </div>
</form>
@endsection