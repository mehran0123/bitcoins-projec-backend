<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        function readURL(input) {
    if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
            $('#blash').attr('src', e.target.result);
        }

        reader.readAsDataURL(input.files[0]);
    }
}

$("#fileupload-avatar").change(function(){
    readURL(this);
});



//updating profile here
$('#update_profile').click(function(){

  var image = $("#fileupload-avatar").val();
  var name = $("input[name='name']").val();
  var email = $("input[name='email']").val();
  var regex = /^([a-zA-Z0-9_.+-])+\@(([a-zA-Z0-9-])+\.)+([a-zA-Z0-9]{2,4})+$/;
	var check = regex.test(email);

 if(!name){
    $('#message').html('<span class="text-danger text-center">@lang("translation.username_error")</span>');
  }else if(name.length <= 2){
    $('#message').html('<span class="text-danger text-center">@lang("translation.username_length_error")</span>');
  }else if(!email){
    $('#message').html('<span class="text-danger text-center">@lang("translation.email_required_error")</span>');
  }else if(check == false){
    $('#message').html('<span class="text-danger text-center">@lang("translation.email_format_error")</span>');
  }else{
    $('#message').html('');
    var property = document.getElementById('fileupload-avatar').files[0];
    var formData = new FormData();
    formData.append('name',name);
    formData.append('image',property);
    formData.append('email',email);
    formData.append('_token',"{{ csrf_token() }}");

    $.ajax({
                url:"{{ URL::to('/admin/profile/settings/update-profile') }}",
                method:"POST",
                data : formData,
                contentType:false,
                processData:false,
                cache:false,
                success:function(res){

                if(res == "false"){
                return $('#message').html('<span class="text-danger text-center">@lang("translation.email_not_araivable_error")</span>');
                }

                return $('#message').html('<span class="text-success text-center">@lang("translation.profile_update_success")</span>');

                },error:function(xhr){
                    console.log(xhr.responseText);
                }
             });

  }


});



});
</script>
