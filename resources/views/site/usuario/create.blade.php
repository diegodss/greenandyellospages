@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')

@include('site.usuario.form_open_create')
@include('site.usuario.form')

@include('layouts.boxbottom')
@endsection