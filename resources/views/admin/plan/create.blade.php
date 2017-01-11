@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')

@include('admin.category.form_open_create')
@include('admin.category.form')

@include('layouts.boxbottom')
@endsection