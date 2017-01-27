<?php $action = isset($action) ? $action : "edit"; ?>
{!! Form::model($usuario,['method' => 'PATCH','route'=>['site.usuario.update',$usuario->id], 'name' => 'usuario_form']) !!}
{{ Form::hidden('region_registra', $usuario->region_registra) }}
{{ Form::hidden('region_modifica', Auth::user()->id) }}
{{ Form::hidden('action', $action) }}
