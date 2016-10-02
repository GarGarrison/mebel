@extends('layouts.app')

@section('admin_script')
<script type="text/javascript" src="{{asset('js/admin.js')}}"></script>
@endsection

@section('content')
<div class="col s12">
    <div class="card">
        <ul class="tabs">
        <li class="tab col s12 m2"><a href="{{ url('/admin/show_edit_product') }}">~ продукт</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_edit_section') }}">~ раздел</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_edit_property') }}">~ свойство</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_add_product') }}">+ продукт</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_add_section') }}">+ раздел</a></li>
            <li class="tab col s12 m2"><a href="{{ url('/admin/show_add_property') }}">+ свойство</a></li>
        </ul>
    </div>
</div>
<div class="row">
    <div class="col s12">
        <div class="tab-container"></div>
    </div>
</div>
@endsection