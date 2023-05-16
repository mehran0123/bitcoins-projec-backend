<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    function passwordShowHide() {
        var x = document.getElementById("password");
        var y = document.getElementById("confirm_password");
        if (x.type === "password") {
            x.type = "text";
            y.type = "text";
        } else {
            x.type = "password";
            y.type = "password";
        }
    }
    $(document).ready(function() {
        //for add new Country
        $('#add_user').click(function() {
            const first_name = $('#first_name').val();
            const last_name = $('#last_name').val();
            const email = $('#email').val();
            const phone = $('#phone').val();
            const password = $('#password').val();
            const confirm_password = $(`#confirm_password`).val();
            const cnic_number = $('#cnic_number').val();
            //applying validations here
            if (!first_name || !$.trim(first_name).length) {
                $('#name_error').html("");
                $('#first_name_error').html("First Name Required*.");
                return $('#first_name').focus()
            } else if (!last_name || !$.trim(last_name).length) {
                $('#first_name_error').html("");
                $('#last_name_error').html("");
                $('#last_name_error').html("Last Name Required*.");
                return $('#last_name').focus()
            } else if (!email || !$.trim(email).length) {
                $('#last_name_error').html("");
                $('#first_name_error').html("");
                $('#email_error').html("Email Required*.");
                return $('#email').focus()
            } else if (!phone || !$.trim(phone).length) {
                $('#last_name_error').html("");
                $('#first_name_error').html("");
                $('#email_error').html("");
                $('#phone_error').html("Phone No. Required*.");
                return $('#phone').focus()
            } else if (!cnic_number || !$.trim(cnic_number).length) {
                $('#last_name_error').html("");
                $('#first_name_error').html("");
                $('#email_error').html("");
                $('#cnic_number_error').html("");
                $('#cnic_number_error').html("CNIC Number Required*.");
                return $('#cnic_number').focus()
            } else if (!password || !$.trim(password).length) {
                $('#last_name_error').html("");
                $('#first_name_error').html("");
                $('#email_error').html("");
                $('#cnic_number_error').html("");
                $('#password_error').html("Password required");
                return $('#password').focus();
            } else if (password.length <= 5) {
                $('#last_name_error').html("");
                $('#first_name_error').html("");
                $('#email_error').html("");
                $('#cnic_number_error').html("");
                $('#password_error').html(
                    "password length should be equal or greater than 5 characters");
                return $('#password').focus();
            } else if (!confirm_password) {
                $('#last_name_error').html("");
                $('#first_name_error').html("");
                $('#email_error').html("");
                $('#cnic_number_error').html("");
                $('#confirm_password_error').html("");
                $('#confirm_password_error').html("Confirm password required");
                return $('#confirm_password').focus();
            } else if (confirm_password != password) {
                $('#last_name_error').html("");
                $('#first_name_error').html("");
                $('#email_error').html("");
                $('#cnic_number_error').html("");
                $('#confirm_password_error').html("");
                $('#confirm_password_error').html("password does not match.");
                return $('#confirm_password').focus();
            } else {
                $('#last_name_error').html("");
                $('#first_name_error').html("");
                $('#email_error').html("");
                $('#cnic_number_error').html("");
                $('#confirm_password_error').html("");
                var image = document.getElementById('fileupload-btn-one').files[0];
                var formData = new FormData();
                formData.append('first_name', first_name);
                formData.append('last_name', last_name);
                formData.append('cnic_number', cnic_number);
                formData.append('image', image);
                formData.append('email', email);
                formData.append('phone', phone);
                formData.append('password', password);
                formData.append('_token', "{{ csrf_token() }}");
                $.ajax({
                    url: "{{ route('users.create-process') }}",
                    method: "POST",
                    data: formData,
                    contentType: false,
                    processData: false,
                    cache: false,
                    success: function(res) {
                        // return console.log(res);
                        if (res == "true") {
                            $('#password').val("");
                            $('#confirm_password').val("");
                            $('#email').val("");
                            $('#cnic_number').val("");
                            $('#phone').val("");
                            $('#first_name').val("");
                            $('#last_name').val("");
                            swal('success', "User Created Successfully!", 'success');
                            $('#user_role').val("");
                        } else if (res == "email") {
                            $('#email_error').html("Email Address already exists.");
                            return $('#email').focus()
                        }
                    },
                    error: function(xhr) {
                        console.log(xhr.responseText);
                    }
                });
            }
        });
        //TODO: Generating Random Passowrd
        $('#generate_password').click(function() {
            var randomstring = Math.random().toString(36).slice(-8);
            $('#password').val(randomstring);
            $('#confirm_password').val(randomstring);
        });

        //for image preview
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#blah-one').attr('src', e.target.result);
                    $('#blah-one').attr('class', 'd-block')
                }
                reader.readAsDataURL(input.files[0]); // convert to base64 string
            }
        }
        $("#fileupload-btn-one").change(function() {
            readURL(this);
        });

    });
</script>
