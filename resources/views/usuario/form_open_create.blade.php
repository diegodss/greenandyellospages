{!! Form::open(['url' => 'usuario', 'name' => 'regionForm']) !!}
{{ Form::hidden('usuario_registra', Auth::user()->id) }}
{{ Form::hidden('action', 'create') }}
