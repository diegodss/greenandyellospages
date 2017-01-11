@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')
@include('alerts.success')

@include('admin.business.form_open_edit')
@include('admin.business.form')

@include('layouts.boxbottom')
@endsection