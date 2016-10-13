@extends('layouts.app')

@section('content')
    <h1>{{ $article->header }}</h1>
    {!! $article->text !!}
@endsection