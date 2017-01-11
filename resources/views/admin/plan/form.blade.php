@include('alerts.errors')
<input type="hidden" name="modal" id="modal_input" value="<?php echo isset($modal) ? $modal : ""; ?>" />
<div class="row">
    <div class="col-xs-6">
        <div class="form-group required">
            {!! Form::label('category_name', 'Nome da empresa:') !!}
            {!! Form::text('category_name',null,['class'=>'form-control' ]) !!}
        </div>
        <div class="form-group required">
            {!! Form::label('category_phone', 'Telefone:') !!}
            {!! Form::text('category_phone',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('category_whatsapp', 'Whatsapp:') !!}
            {!! Form::text('category_whatsapp',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('category_email', 'E-mail:') !!}
            {!! Form::text('category_email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('category_address', 'Endereco:') !!}
            {!! Form::text('category_address',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('category_zip', 'ZIP:') !!}
            {!! Form::text('category_zip',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('category_state', 'Estado') !!}
            {!! Form::text('category_state',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('category_country', 'Pais') !!}
            {!! Form::text('category_country',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('category_latitude', 'Latitude:') !!}
            {!! Form::text('category_latitude',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('category_longitude', 'Longitude:') !!}
            {!! Form::text('category_longitude',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('category_website', 'Website:')  !!}
            {!! Form::text('category_website',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('category_type', 'Tipo de Empresa') !!}
            {!! Form::text('category_type',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('category_entity', 'Entidade') !!}
            {!! Form::text('category_entity',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('category_scale', 'Escala') !!}
            {!! Form::text('category_scale',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('category_about', 'Sobre a empresa') !!}
            {!! Form::text('category_about',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('category_services', 'Servicos') !!}
            {!! Form::text('category_services',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('category_abn', 'ABN:') !!}
            {!! Form::text('category_abn',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('category_tfn', 'TFN') !!}
            {!! Form::text('category_tfn',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fl_status', 'Ativo:') !!}
            {!! Form::checkbox('fl_status', '1', $category->fl_status, ['class'=>'form-control_none', 'id'=>'fl_status', 'data-size'=>'mini']) !!}
        </div>
    </div>
    <div class="col-xs-6">
    </div>
</div>

<div class = "form-group text-right">
    <?php if ((isset($modal)) && ($modal == "sim")) {
        ?><button type="button" class="btn btn-default" data-dismiss="modal">Cerrar</button><?php
    } else {
        ?><a href="{{ URL::previous() }}" class="btn btn-primary">Volver</a><?php
    }

    if ((!isset($show_view)) or ( isset($show_view) && !$show_view)) {
        ?>
        {!!Form::submit('Guardar', ['class' => 'btn btn-success'])!!}
        <?php
    }
    ?>
</div>

{!!Form::close()!!}
@include('admin.category.js')