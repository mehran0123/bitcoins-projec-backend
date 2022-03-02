<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>
    $(document).ready(function(){
        //checking old passwor is correct or not
        $("input[name='password']").focusout(function(){
            const password = $(this).val();

            $.ajax({
                url:"{{ URL::to('/admin/profile/settings/check-old-password') }}",
                method:"POST",
                data : {"_token":"{{ csrf_token() }}",password:password},
                success:function(res){
                    if(res == "false"){
                         $('#message').html('<span class="text-danger text-center">@lang("translation.old_password_error")</span>');
                        $("input[name='password']").val('');
                        $("input[name='password']").focus();
                    }
                },error:function(xhr){
                    console.log(xhr.responseText);
                }
             });

        });

        //change password
        $('#change_password').click(function(){
            const password = $('input[name="password"]').val();
            const new_password = $('input[name="new_password"]').val();
            const conf_password = $('input[name="conf_password"]').val();

            if(!password){
                $('#message').html('<span class="text-danger text-center">@lang("translation.old_password_required")</span>');
            }else if(!new_password){
                $('#message').html('<span class="text-danger text-center">@lang("translation.new_password_required")</span>');
            }else if(new_password.length <= 5){
                $('#message').html('<span class="text-danger text-center">@lang("translation.password_length_error")</span>');
            }else if(new_password == password){
                $('#message').html('<span class="text-danger text-center">@lang("translation.new_old_password_error")</span>');
            }else if(new_password != conf_password){
                $('#message').html('<span class="text-danger text-center">@lang("translation.passwords_not_matched_error")</span>');
            }else{
                $('#message').html('<span class="text-danger text-center"></span>');

                $.ajax({
                url:"{{ URL::to('/admin/profile/settings/change-password-process') }}",
                method:"POST",
                data : {"_token":"{{ csrf_token() }}",password:new_password},
                success:function(res){
                $('#message').html('<span class="text-success text-center">@lang("translation.password_update")</span>');
                $('input[name="password"]').val('');
                $('input[name="new_password"]').val('');
                $('input[name="conf_password"]').val('');


                },error:function(xhr){
                    console.log(xhr.responseText);
                }
             });
            }

        });








    });
</script>
