@include('alerts.errors')
<div class="row">
    <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('name', 'Nome:') !!}
            {!! Form::text('name',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password', 'Senha:', ['id'=>'lblPassword']) !!}
            {!! Form::password('password',null,['class'=>'form-control','id'=>'password']) !!}
        </div>
    </div>
    <div class="col-xs-6">
        <div class="form-group">
            {!! Form::label('email', 'E-mail:') !!}
            {!! Form::text('email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('password_confirm', 'Confirmar senha:']) !!}
            {!! Form::password('password_confirm',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="form-group">
    {!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
</div>

{!! Form::close() !!}
@include('usuario.js')