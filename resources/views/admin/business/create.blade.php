@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')

@include('business.form_open_create')
@include('business.form')

@include('layouts.boxbottom')
@endsection