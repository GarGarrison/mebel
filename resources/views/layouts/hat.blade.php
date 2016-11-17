<div class="container">
    <div class="row head">
        <div class="col s12 m6 logo">
            <a href="{{ url('/') }}"><img src="{{asset('img/yourlogo_rus.png')}}" alt="yourmebel.com logo"></a>
        </div>
        <div class="phones col s12 m6">
            <div><b>Консультация:</b><span class="bold-phones">{{ config('z_my.phone') }}</span></div>
            <div><span class="bold-phones">{{ config('z_my.consult_phone') }}</span></div>
            <a class="right" title="Напишите нам письмо" href="{{ url('/contacts') }}"><i class="material-icons">email</i></a>
        </div>
    </div>
</div>