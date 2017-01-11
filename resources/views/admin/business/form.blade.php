@include('alerts.errors')
<input type="hidden" name="modal" id="modal_input" value="<?php echo isset($modal) ? $modal : ""; ?>" />
<div class="row">
    <div class="col-xs-6">
        <div class="form-group required">
            {!! Form::label('business_name', 'Nome da empresa:') !!}
            {!! Form::text('business_name',null,['class'=>'form-control' ]) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_abn', 'ABN:') !!}
            {!! Form::text('business_abn',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_tfn', 'TFN') !!}
            {!! Form::text('business_tfn',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required">
            {!! Form::label('business_phone', 'Telefone:') !!}
            {!! Form::text('business_phone',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group">
            {!! Form::label('business_whatsapp', 'Whatsapp:') !!}
            {!! Form::text('business_whatsapp',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_email', 'E-mail Publico:') !!}
            {!! Form::text('business_email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_website', 'Website:')  !!}
            {!! Form::text('business_website',null,['class'=>'form-control']) !!}
        </div>

        <div class="form-group">
            {!! Form::label('fl_status', 'Ativo:') !!}
            {!! Form::checkbox('fl_status', '1', $business->fl_status, ['class'=>'form-control_none', 'id'=>'fl_status', 'data-size'=>'mini']) !!}
        </div>
    </div>

    <div class="col-xs-6">

        <div class="form-group" >
            {!! Form::label('business_type', 'Tipo de Empresa') !!}
            {!! Form::text('business_type',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_entity', 'Entidade') !!}
            {!! Form::text('business_entity',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_scale', 'Escala') !!}
            {!! Form::text('business_scale',null,['class'=>'form-control']) !!}
        </div>

        <h3>Categoria</h3>
        <div class="category-box">
            @foreach ($category_s as $id_category => $category_name )
            <?php
            $checked = null;
            if (is_array($business_category))
                $checked = in_array($id_category, $business_category);
            ?>
            {!! Form::checkbox('category[]', $id_category ,$checked, ['class'=>'form-control_none']) !!}
            {{ $category_name }} <br />
            @endforeach
        </div>


        Plano
        <div class="form-group">
            {!! Form::label('id_plan', 'Plano:') !!}
            {!! Form::select('id_plan',[0=>'Seleccione']+$plans, $business->id_plan, array('id'=> 'id_plan' , 'class'=>'form-control') ) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <div class="form-group required" >
            {!! Form::label('business_about', 'Sobre a empresa') !!}
            {!! Form::text('business_about',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_services', 'Servicos') !!}
            {!! Form::text('business_services',null,['class'=>'form-control']) !!}
        </div>
    </div>
</div>
<div class="row">
    <div class="col-xs-6">
        <div class="form-group required" >
            {!! Form::label('business_address', 'Endereco:') !!}
            {!! Form::text('business_address',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_zip', 'ZIP:') !!}
            {!! Form::text('business_zip',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_state', 'Estado') !!}
            {!! Form::text('business_state',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_country', 'Pais') !!}
            {!! Form::text('business_country',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_country', 'Pais') !!}
            {!! Form::text('business_country',null,['class'=>'form-control']) !!}
        </div>
        {!!Form::button('Localizar no mapa', ['class' => 'btn btn-success', 'id' => 'get_localization'])!!}
    </div>

    <div class="col-xs-6">
        {!! Form::hidden('business_longitude',null,['class'=>'form-control']) !!}
        {!! Form::hidden('business_latitude',null,['class'=>'form-control']) !!}
        Mapa do Google
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h3>Arquivos e fotos</h3>
        <div class="form-group">
            {!! Form::label('Documentos') !!}
            {!! Form::file('media[]', ['multiple' => 'multiple']) !!}
        </div>
        {!! $medio_verificacion !!}
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h3>Jornada de trabalho:</h3>
        <table>
            @foreach ($working_days as $id => $day)
            <tr>
                <td>{!! Form::hidden('id_working_day[]', $id ,['class'=>'form-control']) !!}{{ $day }}</td>
                <td>{!! Form::text('working_hour_status_' . $id,null,['class'=>'form-control']) !!}</td>
                <td>{!! Form::text('working_hour_time_start_' . $id ,null,['class'=>'form-control']) !!}</td>
                <td>{!! Form::text('working_hour_time_end_' . $id,null,['class'=>'form-control']) !!}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
        <h3>Contatos:</h3>
        <table>
            <tr>
                <td>
                    {!! Form::label('contact_name', 'Nome:') !!}
                    {!! Form::text('contact_name',null,['class'=>'form-control']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    {!! Form::label('contact_document', 'Passaporte:') !!}
                    {!! Form::text('contact_document',null,['class'=>'form-control']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    {!! Form::label('contact_phone', 'Telefone:') !!}
                    {!! Form::text('contact_phone',null,['class'=>'form-control']) !!}
                </td>
            </tr>
            <tr>
                <td>
                    {!! Form::label('contact_email', 'E-mail:') !!}
                    {!! Form::text('contact_email',null,['class'=>'form-control']) !!}
                </td>
            </tr>
        </table>
    </div>
</div>


<div class="row">
    <div class="col-xs-12">
        <h3>Tags:</h3>
        {!! Form::label('tag', 'Informe as etiquetas relevantes, separando-as com virgula.') !!}
        {!! Form::text('contact_name',null,['class'=>'form-control']) !!}
    </div>
</div>


<!--

<div class="row">
    <div class="col-xs-6">
    </div>
    <div class="col-xs-6">
    </div>
</div>

<div class="row">
    <div class="col-xs-12">
    </div>
</div>


$('#fromwednesday').timepicker({
minuteStep: 1,
template: 'dropdown',
showInputs: false,
showSeconds: false,
defaultTime: false,

//showMeridian: false
});
$('#towednesday').timepicker({
minuteStep: 1,
template: 'dropdown',
showInputs: false,
showSeconds: false,
defaultTime: false,
//showMeridian: false
});
-->
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
@include('admin.business.js')