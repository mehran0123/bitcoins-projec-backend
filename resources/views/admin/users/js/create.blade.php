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
    $(document).ready(function(){
         //for add new Country
         $('#add_administration').click(function(){
            const name = $('#name').val();
            const email = $('#email').val();
            const phone = $('#phone').val();
            const password = $('#password').val();
            const confirm_password = $(`#confirm_password`).val();
            const user_role = $('#user_role').val();
            //applying validations here
         if(user_role == 0){
                $('#name_error').html("");
                $('#user_role_error').html("user role Required*.");
                return $('#user_role').focus()
        }else if(!name || !$.trim(name).length){
                $('#user_role_error').html("");
                $('#name_error').html("");
                $('#name_error').html("user name Required*.");
                return $('#name').focus()
         }
         else if(!email || !$.trim(email).length){
                $('#user_role_error').html("");
                $('#name_error').html("");
                $('#email_error').html("Email Required*.");
                return $('#email').focus()
          }
            else if(!phone || !$.trim(phone).length){
                $('#user_role_error').html("");
                $('#name_error').html("");
                $('#email_error').html("");
                $('#phone_error').html("Phone No. Required*.");
                return $('#phone').focus()
            }
            else if(!password || !$.trim(password).length){
                $('#user_role_error').html("");
                $('#name_error').html("");
                $('#email_error').html("");
                $('#password_error').html("Password required");
                return $('#password').focus();
            }else if(password.length <= 5){
                $('#user_role_error').html("");
                $('#name_error').html("");
                $('#email_error').html("");
                $('#password_error').html("");
                $('#password_error').html("password length should be equal or greater than 5 characters");
                return $('#password').focus();
            }else if(!confirm_password){
                $('#user_role_error').html("");
                $('#name_error').html("");
                $('#email_error').html("");
                $('#password_error').html("");
                $('#confirm_password_error').html("");
                $('#confirm_password_error').html("Confirm password required");
                return $('#confirm_password').focus();
            }else if(confirm_password != password){
                $('#user_role_error').html("");
                $('#name_error').html("");
                $('#email_error').html("");
                $('#password_error').html("");
                $('#confirm_password_error').html("");
                $('#confirm_password_error').html("password does not match.");
                return $('#confirm_password').focus();
             }else{
                $('#user_role_error').html("");
                $('#name_error').html("");
                $('#email_error').html("");
                $('#password_error').html("");
                $('#confirm_password_error').html("");
                var formData = new FormData();
                formData.append('name',name);
                formData.append('email',email);
                formData.append('phone',phone);
                formData.append('password',password);
                formData.append('user_role',user_role);
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('users.create-process') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                   // return console.log(res);
                       if(res == "true"){
                        $('#password').val("");
                        $('#confirm_password').val("");
                        $('#email').val("");
                        $('#phone').val("");
                        $('#user_role').val(0);
                        $('#name').val("");
                        swal('success',"User Created Successfully!",'success');
                        $('#user_role').val("");
                       }else if(res == "UserRole"){
                          $('#user_role_error').html("User Role already exists.");
                          return $('#user_role').focus()
                       }else if(res == "email")
                       {
                         $('#email_error').html("Email Address already exists.");
                          return $('#email').focus()
                       }
                     },error:function(xhr){
                         console.log(xhr.responseText);
                     }
                 });
            }
          });
    //TODO: Generating Random Passowrd
    $('#generate_password').click(function(){
        var randomstring = Math.random().toString(36).slice(-8);
        $('#password').val(randomstring);
        $('#confirm_password').val(randomstring);
     });

 });

</script>
