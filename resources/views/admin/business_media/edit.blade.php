@extends('layouts.app')
@yield('main-content')
@section('main-content')

@include('layouts.boxtop')
@include('alerts.success')

@include('admin.business_media.form_open_edit')
@include('admin.business_media.form')

@include('layouts.boxbottom')
@endsection