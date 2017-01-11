@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')
@include('alerts.success')

@include('admin.category.form_open_edit')
@include('admin.category.form')

@include('layouts.boxbottom')
@endsection