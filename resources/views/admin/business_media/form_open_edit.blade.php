<?php $action = isset($action) ? $action : "edit"; ?>
{!! Form::model($business_media,['method' => 'PATCH','route'=>['business_media.update',$business_media->id_business_media]]) !!}
{{ Form::hidden('usuario_registra', $business_media->usuario_registra) }}
{{ Form::hidden('usuario_modifica', Auth::user()->id) }}
{{ Form::hidden('action', $action) }}
