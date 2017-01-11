{!! Form::open(['url' => 'category', 'name' => 'categoryForm']) !!}
{{ Form::hidden('usuario_registra', Auth::user()->id) }}
{{ Form::hidden('action', 'create') }}
