<script>


    $(document).ready(function () {

        // Uso de select2 para campo de business_media
        $('#id_business_media').select2();

        // Determina si el form es solamente para visualizacion
        var show_view = <?php echo isset($show_view) ? $show_view : "false"; ?>;
        if (show_view) {
            $("input, textarea").attr('readonly', 'readonly');
        }

        // Inicia switch para estado activo/inactivo
        $("[name='fl_status']").bootstrapSwitch();

        //Inicia validacion
        $("form[name=regionForm]").validate({
            rules: {
                business_media_name: {required: true}
                , business_media_phone: {required: true}
                , business_media_email: {required: true}
                , business_media_address: {required: true}
                , business_media_zip: {required: true}
                , business_media_latitude: {required: true}
                , business_media_longitude: {required: true}
                , business_media_about: {required: true}
                , business_media_services: {required: true}
            }
        });

        // Define si es un formulario de mantenedor o formluario rapido
        $(function () {
            $('form[name=regionForm]').submit(function () {
                console.log($("#modal_input").val());
                is_modal = $("#modal_input").val();
                if (is_modal == "sim") {

                    $.post($(this).attr('action'), $(this).serialize(), function (json) {
                        $("#id_business_media").append('<option value=' + json['id_business_media'] + ' selected="selected">' + json['business_media_name'] + '</option>');
                        //console.log(json['id_business_media']);
                        $('#myModal').modal('toggle');
                    }, 'json');

                    return false;
                }

            });
        });
    });
</script>