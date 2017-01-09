@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')
@include('alerts.success')

@include('business.form_open_edit')
@include('business.form')

@include('layouts.boxbottom')
@endsection