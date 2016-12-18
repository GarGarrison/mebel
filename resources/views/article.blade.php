@extends('layouts.app')

@section('meta')
<meta name="Keywords" content="{{ $article->meta_keywords}}"/>
<meta name="Description" content="{{ $article->meta_description}}"/> 
<title>{{ $article->title }}</title>
@endsection

@section('content')
    <h1>{{ $article->header }}</h1>
    <div class="article_text"> 
    {!! $article->text !!}
    </div>
@endsection