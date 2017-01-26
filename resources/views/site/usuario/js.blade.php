<script>


    $(document).ready(function () {

        $("form[name=regionForm]").validate({
            rules: {
                name: {required: true}
                , email: {required: true}
                , password: {required: true, minlength: 6}
                , password_confirm: {
                    required: true
                    , minlength: 6
                    , equalTo: "#password"
                }

            }
        });







    });
</script>