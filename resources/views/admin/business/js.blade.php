<script>


    $(document).ready(function () {

        // Uso de select2 para campo de business
        $('#id_business').select2();

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
                business_name: {required: true}
            }
        });

        // Define si es un formulario de mantenedor o formluario rapido
        $(function () {
            $('form[name=regionForm]').submit(function () {
                console.log($("#modal_input").val());
                is_modal = $("#modal_input").val();
                if (is_modal == "sim") {

                    $.post($(this).attr('action'), $(this).serialize(), function (json) {
                        $("#id_business").append('<option value=' + json['id_business'] + ' selected="selected">' + json['business_name'] + '</option>');
                        //console.log(json['id_business']);
                        $('#myModal').modal('toggle');
                    }, 'json');

                    return false;
                }

            });
        });
    });
</script>