@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')

@include('admin.business_media.form_open_create')
@include('admin.business_media.form')

@include('layouts.boxbottom')
@endsection