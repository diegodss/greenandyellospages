{!! Form::open(['url' => 'usuario', 'name' => 'usuario_form']) !!}
{{ Form::hidden('usuario_registra', Auth::user()->id) }}
{{ Form::hidden('action', 'create') }}
