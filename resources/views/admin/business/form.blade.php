@include('alerts.errors')
<style>
    /* Always set the map height explicitly to define the size of the div
     * element that contains the map. */
    #map {
        height: 300px;
    }
    /* Optional: Makes the sample page fill the window. */
    html, body {
        height: 100%;
        margin: 0;
        padding: 0;
    }

    .category-box { height: 100px; overflow-y: scroll}
</style>


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


        <div class="form-group">
            {!! Form::label('fl_status', 'Ativo:') !!}
            {!! Form::checkbox('fl_status', '1', $business->fl_status, ['class'=>'form-control_none', 'id'=>'fl_status', 'data-size'=>'mini']) !!}
        </div>
    </div>

    <div class="col-xs-6">

        <div class="form-group required" >
            {!! Form::label('business_email', 'E-mail Publico:') !!}
            {!! Form::text('business_email',null,['class'=>'form-control']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_website', 'Website:')  !!}
            {!! Form::text('business_website',null,['class'=>'form-control']) !!}
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


    </div>
</div>
<div class="row">
    <div class="col-xs-12">
        <h3>Donos da empresa:</h3>
        <table class="table">
            <tr>
                <td>
                    {!! Form::hidden('id_business_contact',$business_contact->id_business_contact,['class'=>'form-control']) !!}
                    {!! Form::label('contact_name', 'Nome:') !!}
                    {!! Form::text('contact_name',$business_contact->contact_name,['class'=>'form-control']) !!}
                </td>
                <td>
                    {!! Form::label('contact_document', 'Passaporte:') !!}
                    {!! Form::text('contact_document',$business_contact->contact_document,['class'=>'form-control']) !!}
                </td>
                <td>
                    {!! Form::label('contact_phone', 'Telefone:') !!}
                    {!! Form::text('contact_phone',$business_contact->contact_phone,['class'=>'form-control']) !!}
                </td>
                <td>
                    {!! Form::label('contact_email', 'E-mail:') !!}
                    {!! Form::text('contact_email',$business_contact->contact_email,['class'=>'form-control']) !!}
                </td>
            </tr>
        </table>
    </div>
</div>

<div class="row">
    <div class="col-xs-12"><h3>Localizacao da empresa</h3></div>
    <div class="col-xs-6">

        <div class="form-group required" >
            {!! Form::label('business_address', 'Endereco:') !!}
            {!! Form::text('business_address','37 monaco street',['class'=>'form-control', 'id'=>'address']) !!}
        </div>
        <div class="form-group required" >
            {!! Form::label('business_zip', 'ZIP:') !!}
            {!! Form::text('business_zip',null,['class'=>'form-control', 'id'=>'zip']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_city', 'Cidade') !!}
            {!! Form::text('business_city','Gold Coast',['class'=>'form-control', 'id'=>'city']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_state', 'Estado') !!}
            {!! Form::text('business_state','Queensland',['class'=>'form-control', 'id'=>'state']) !!}
        </div>
        <div class="form-group" >
            {!! Form::label('business_country', 'Pais') !!}
            {!! Form::text('business_country','Australia',['class'=>'form-control', 'id'=>'country']) !!}
        </div>

    </div>

    <div class="col-xs-6">

        <div class="form-group" >
            {!!Form::button('Localizar no mapa', ['class' => 'btn btn-success', 'id' => 'get_localization'])!!}
            {!! Form::text('business_longitude',null,['class'=>'form-control', 'id' => 'business_longitude']) !!}
            {!! Form::text('business_latitude',null,['class'=>'form-control', 'id' => 'business_latitude']) !!}
        </div>
        <div class="form-group" >
            <div id="map"></div>
        </div>

    </div>
</div>




@include('layouts.boxbottom')

@include('layouts.boxtop')


<h3>Dados Sobre a empresa</h3>
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
    <div class="col-xs-4">
        <div class="form-group" >
            {!! Form::label('business_type', 'Tipo de Empresa') !!}
            {!! Form::select('business_type',[0=>'Seleccione']+$business_type_s, $business->business_type, array('id'=> 'business_type' , 'class'=>'form-control') ) !!}
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group" >
            {!! Form::label('business_entity', 'Entidade') !!}
            {!! Form::select('business_entity',[0=>'Seleccione']+$business_entity_s, $business->business_entity, array('id'=> 'business_entity' , 'class'=>'form-control') ) !!}
        </div>
    </div>
    <div class="col-xs-4">
        <div class="form-group" >
            {!! Form::label('business_scale', 'Escala') !!}
            {!! Form::select('business_scale',[0=>'Seleccione']+$business_scale_s, $business->business_scale, array('id'=> 'business_scale' , 'class'=>'form-control') ) !!}
        </div>
    </div>

    <div class="col-xs-12">
        <div class="form-group">
            {!! Form::label('id_plan', 'Plano:') !!}
            {!! Form::select('id_plan',[0=>'Seleccione']+$plans, $business->id_plan, array('id'=> 'id_plan' , 'class'=>'form-control') ) !!}
        </div>
    </div>
</div>





<div class="row">
    <div class="col-xs-12">
        <h3>Jornada de trabalho:</h3>
        <table class="table">
            @foreach ($working_days as $id => $day)
            <tr>
                <td>{!! Form::hidden('id_working_day[]', $id ,['class'=>'form-control']) !!}{{ $day }}</td>
                <td>{!! Form::select('working_hour_status_'. $id, $working_day_status_s, null, array('id'=> 'working_hour_status_'. $id , 'class'=>'form-control') ) !!}</td>
                <td>{!! Form::text('working_hour_time_start_' . $id ,null,['class'=>'form-control', 'id' => 'working_hour_time_start_' . $id]) !!}</td>
                <td>{!! Form::text('working_hour_time_end_' . $id,null,['class'=>'form-control', 'id' => 'working_hour_time_start_' . $id]) !!}</td>
            </tr>
            @endforeach
        </table>
    </div>
</div>




<div class="row">
    <div class="col-xs-12">
        <h3>Tags:</h3>
        <div class="form-group">
            {!! Form::label('tag', 'Informe as etiquetas relevantes, separando-as com virgula.') !!}
            {!! Form::text('tag',null,['class'=>'form-control']) !!}
        </div>


    </div>
</div>

@include('layouts.boxbottom')
@include('layouts.boxtop')
<div class="row">
    <div class="col-xs-12">
        <h3>Arquivos e fotos</h3>
        <div class="form-group">
            {!! Form::label('Documentos') !!}
            {!! Form::file('media[]', ['multiple' => 'multiple']) !!}
        </div>
        @foreach ($business_media as $media)
        {{ $media->media_name }}<br>
        {{ $media->media_type }}<br>
        {{ $media->media_path }}<br><br>



        @endforeach
    </div>
</div>
@include('layouts.boxbottom')
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



-->

<div class="row">
    <div class="col-xs-12">
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
    </div>
</div>
{!!Form::close()!!}
@include('admin.business.js')
<script async defer
        src="https://maps.googleapis.com/maps/api/js?key=AIzaSyCIoy2YInkjX7FgCokmyylOM26Z88oxris&callback=initMap">
</script>