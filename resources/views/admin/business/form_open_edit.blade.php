<?php $action = isset($action) ? $action : "edit"; ?>
{!! Form::model($business,['method' => 'PATCH','route'=>['business.update',$business->id_business]]) !!}
{{ Form::hidden('usuario_registra', $business->usuario_registra) }}
{{ Form::hidden('usuario_modifica', Auth::user()->id) }}
{{ Form::hidden('action', $action) }}
