@extends('layouts.app')

@section('content')
<h4>Обратная связь</h4>
<div class="row">
    <div class="col s12 l6">
        <table>
            <tbody>
                <tr>
                    <td><u>Телефон консультанта:</u></td>
                    <td><span class="bold-phones">{{ config('z_my.consult_phone') }}</span></td>
                </tr>
                <tr>
                    <td><u>Телефон замерщика:</u></td>
                    <td><span class="bold-phones">{{ config('z_my.zamer_phone') }}</span></td>
                </tr>
                <tr>
                    <td><u>Наш адрес:</u></td>
                    <td><span class="bold-phones">{{ config('z_my.address') }}</span></td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
<h6 style="text-indent: 15px;">Сделать заказ или задать нам вопрос вы можете заполнив форму:</h6>
@if (!empty($response))
    <script type="text/javascript">alert("Успешно отправлено!")</script>
@endif
<form class="col s12" method="post" action="{{ url('/feedback') }}">
    {{ csrf_field() }}
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
            <label for="address">Адрес</label>
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
            <label for="text">Комментарий</label>
        </div>
    </div>
    <div class="row">
        <div class="col s12 l6">
            <a href="{{ url('/mail') }}">
            <button type="submit" class="btn">
                Отправить
            </button>
            </a>
        </div>
    </div>
</form>
@endsection