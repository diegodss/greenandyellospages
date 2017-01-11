<script>


    $(document).ready(function () {

        // Uso de select2 para campo de category
        $('#id_category').select2();

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
                category_name: {required: true}
                , category_phone: {required: true}
                , category_email: {required: true}
                , category_address: {required: true}
                , category_zip: {required: true}
                , category_latitude: {required: true}
                , category_longitude: {required: true}
                , category_about: {required: true}
                , category_services: {required: true}
            }
        });

        // Define si es un formulario de mantenedor o formluario rapido
        $(function () {
            $('form[name=regionForm]').submit(function () {
                console.log($("#modal_input").val());
                is_modal = $("#modal_input").val();
                if (is_modal == "sim") {

                    $.post($(this).attr('action'), $(this).serialize(), function (json) {
                        $("#id_category").append('<option value=' + json['id_category'] + ' selected="selected">' + json['category_name'] + '</option>');
                        //console.log(json['id_category']);
                        $('#myModal').modal('toggle');
                    }, 'json');

                    return false;
                }

            });
        });
    });
</script>