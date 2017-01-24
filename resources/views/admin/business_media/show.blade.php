@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')

<?php
$show_view = true;
$readonly = "css class";
$action = "show";
?>
@include('admin.business_media.form_open_edit')
@include('admin.business_media.form')

@include('layouts.boxbottom')
@endsection