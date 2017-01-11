@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')

@include('admin.business.form_open_create')
@include('admin.business.form')

@include('layouts.boxbottom')
@endsection