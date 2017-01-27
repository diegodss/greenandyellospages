@include('alerts.errors')

@if (session('status'))
<div class="alert alert-success">
    {{ session('status') }}
</div>
@endif
@if (session('warning'))
<div class="alert alert-warning">
    {{ session('warning') }}
</div>
@endif

<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Senha:', ['id'=>'lblPassword']) !!}
            {!! Form::password('password',['class'=>'form-control','id'=>'password']) !!}
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('email', 'E-mail:') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirm', 'Confirmar senha:') !!}
            {!! Form::password('password_confirm',['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
</div>

{!! Form::close() !!}
@include('site.usuario.js')