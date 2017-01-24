@include('alerts.errors')
<input type="hidden" name="modal" id="modal_input" value="<?php echo isset($modal) ? $modal : ""; ?>" />
<div class="row">
    <div class="col-xs-6">
        <div class="form-group required">
            {!! Form::label('business_media_name', 'Nome da empresa:') !!}
            {!! Form::text('business_media_name',null,['class'=>'form-control' ]) !!}
        </div>
        <div class="form-group required">
            {!! Form::label('business_media_phone', 'Telefone:') !!}
            {!! Form::text('business_media_phone',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('business_media_whatsapp', 'Whatsapp:') !!}
            {!! Form::text('business_media_whatsapp',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_media_email', 'E-mail:') !!}
            {!! Form::text('business_media_email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_media_address', 'Endereco:') !!}
            {!! Form::text('business_media_address',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_media_zip', 'ZIP:') !!}
            {!! Form::text('business_media_zip',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_media_state', 'Estado') !!}
            {!! Form::text('business_media_state',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_media_country', 'Pais') !!}
            {!! Form::text('business_media_country',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_media_latitude', 'Latitude:') !!}
            {!! Form::text('business_media_latitude',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_media_longitude', 'Longitude:') !!}
            {!! Form::text('business_media_longitude',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_media_website', 'Website:')  !!}
            {!! Form::text('business_media_website',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_media_type', 'Tipo de Empresa') !!}
            {!! Form::text('business_media_type',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_media_entity', 'Entidade') !!}
            {!! Form::text('business_media_entity',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_media_scale', 'Escala') !!}
            {!! Form::text('business_media_scale',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_media_about', 'Sobre a empresa') !!}
            {!! Form::text('business_media_about',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_media_services', 'Servicos') !!}
            {!! Form::text('business_media_services',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_media_abn', 'ABN:') !!}
            {!! Form::text('business_media_abn',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_media_tfn', 'TFN') !!}
            {!! Form::text('business_media_tfn',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('fl_status', 'Ativo:') !!}
            {!! Form::checkbox('fl_status', '1', $business_media->fl_status, ['class'=>'form-control_none', 'id'=>'fl_status', 'data-size'=>'mini']) !!}
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
@include('admin.business_media.js')