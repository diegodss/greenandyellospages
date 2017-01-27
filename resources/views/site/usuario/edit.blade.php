@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')
@include('alerts.success')

@include('site.usuario.form_open_edit')
@include('site.usuario.form')

@include('layouts.boxbottom')
@endsection