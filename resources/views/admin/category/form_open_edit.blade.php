<?php $action = isset($action) ? $action : "edit"; ?>
{!! Form::model($category,['method' => 'PATCH','route'=>['category.update',$category->id_category]]) !!}
{{ Form::hidden('usuario_registra', $category->usuario_registra) }}
{{ Form::hidden('usuario_modifica', Auth::user()->id) }}
{{ Form::hidden('action', $action) }}
