<script>


    $(document).ready(function () {

        /* ------------------ */
        $('#working_hour_time_start_1').timepicker({
            minuteStep: 1,
            template: 'dropdown',
            showInputs: false,
            showSeconds: false,
            defaultTime: false,
            //showMeridian: false
        });
        $('#working_hour_time_end_1').timepicker({
            minuteStep: 1,
            template: 'dropdown',
            showInputs: false,
            showSeconds: false,
            defaultTime: false,
            //showMeridian: false
        });

        $('#working_hour_time_start_2').timepicker({
            minuteStep: 1,
            template: 'dropdown',
            showInputs: false,
            showSeconds: false,
            defaultTime: false,
            //showMeridian: false
        });

        /* ------------------ */
        $('#get_localization').click(function () {

            var address = {
                address: $("#address").val() + ', ' + $("#city").val() + ', ' + $("#state").val()
            }
            console.log(address);
            $('#mensaje').html('enviando...');
            var request = $.ajax({
                method: "GET",
                url: "http://maps.google.com/maps/api/geocode/json",
                data: address
            });
            request.done(function (data) {
                $('#mensaje').html(data);
                //var json = JSON.parse(data);
                lat = data.results[0].geometry.location.lat;
                lng = data.results[0].geometry.location.lng;
                $("#business_latitude").val(lat);
                $("#business_longitude").val(lng);
                update_map(lat, lng);
                //alert(data);
            });
            request.fail(function (data, textStatus) {
                $('#mensaje').html("Error: " + textStatus);
                console.log(data);
            }); // fail
        }); // click
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
                , business_phone: {required: true}
                , business_email: {required: true}
                , business_address: {required: true}
                , business_zip: {required: true}
                , business_latitude: {required: true}
                , business_longitude: {required: true}
                , business_about: {required: true}
                , business_services: {required: true}
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


    function initMap() {
        var myLatLng = {lat: -25.363, lng: 131.044};

        lat = parseFloat(document.getElementById('business_latitude').value);
        lng = parseFloat(document.getElementById('business_longitude').value);
        zoom = 4;
        if (lat != '' && lng != '') {
            //update_map(lat, lng);
            var myLatLng = {lat: lat, lng: lng};
            zoom = 15;
        }
        console.log(myLatLng);
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: zoom,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }

    function update_map(lat, lng) {
        var myLatLng = {lat: lat, lng: lng};

        console.log(myLatLng);
        var map = new google.maps.Map(document.getElementById('map'), {
            zoom: 15,
            center: myLatLng
        });

        var marker = new google.maps.Marker({
            position: myLatLng,
            map: map,
            title: 'Hello World!'
        });
    }

</script>