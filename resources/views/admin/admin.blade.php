@extends('layouts.app')

@section('custom_css')
<link rel="stylesheet" type="text/css" href="{{asset('css/picker_helper.css')}}">
@endsection

@section('custom_script')
<script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
<script type="text/javascript" src="{{asset('/libs/nicEdit/nicEdit.js')}}"></script>
@endsection

@section('admin')
<div class="col s12">
    <div class="card">
        <ul class="tabs">
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_edit_product') }}">~ продукт</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_edit_section') }}">~ раздел</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_edit_property') }}">~ свойство</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_edit_article') }}">~ статью</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_edit_similar') }}">~ похожее</a></li>
            <li><div style="width: 5px; height: 100%; background-color: #bf6200;"></div></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_add_product') }}">+ продукт</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_add_section') }}">+ раздел</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_add_property') }}">+ свойство</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_add_article') }}">+ статью</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_add_similar') }}">+ похожее</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <div class="tab-container"></div>
    </div>
</div>
@endsection