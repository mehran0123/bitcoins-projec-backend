<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function() {

        //updating profile here
        $('#reset-password').click(function() {


            var password = $("input[name='password']").val();
            var token = $("input[name='token']").val();
            var conf_password = $("input[name='conf_password']").val();


            // alert(`password:${password} confirm:${conf_password}`);

            if (!password) {
                $('#message').html(
                '<span class="text-danger text-center">Password is required*</span>');
            } else if (password.length <= 5) {
                $('#message').html(
                    '<span class="text-danger text-center">Password length should be greater than 5 characters</span>'
                    );
            } else if (password != conf_password) {
                $('#message').html(
                '<span class="text-danger text-center">Passwords not matched</span>');
            } else {
                $('#message').html('');
                var formData = new FormData();
                formData.append('password', password);
                formData.append('token', token);
                formData.append('_token', "{{ csrf_token() }}");

                $.ajax({
                    url: "{{ URL::to('/admin/reset-password-process') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(res) {
                        if (res == "true") {
                            $("input[name='password']").val('');
                            $("input[name='conf_password']").val('');
                            const message = "@lang('translation.password_update')";
                            return $('#message').html(
                                '<span class="text-success text-center">' + message +
                                '</span>');
                        } else {
                            const message = "@lang('translation.link_expire')";
                            return $('#message').html(
                                '<span class="text-danger text-center">' + message +
                                '</span>');

                        }


                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });

            }


        });

        var field = document.querySelector("input[name='password']");


        field.addEventListener('keypress', function(event) {
            var key = event.keyCode;
            if (key === 32) {
                event.preventDefault();
            }
        });
        var conf_field = document.querySelector("input[name='conf_password']");

        conf_field.addEventListener('keypress', function(event) {
            var key = event.keyCode;
            if (key === 32) {
                event.preventDefault();
            }
        });


    });
</script>
