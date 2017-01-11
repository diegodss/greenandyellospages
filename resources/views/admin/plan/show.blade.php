@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')

<?php
$show_view = true;
$readonly = "css class";
$action = "show";
?>
@include('admin.category.form_open_edit')
@include('admin.category.form')

@include('layouts.boxbottom')
@endsection