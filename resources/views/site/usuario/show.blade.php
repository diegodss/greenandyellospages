@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')

<?php
$show_view = true;
$readonly = "css class";
$action = "show";
?>
@include('site.usuario.form_open_edit')
@include('site.usuario.form')

@include('layouts.boxbottom')
@endsection