<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

//updating profile here
$('#send_otp').click(function(){
    var otp_code = $("#otp_code").val();

     /// alert(otp_code);


    // alert(`password:${password} confirm:${conf_password}`);

 if(!otp_code){
    $('#message').html('<span class="text-danger text-center">OTP is required*</span>');
  }else{
    $('#message').html('');
    var formData = new FormData();
    formData.append('otp_code',otp_code);
    formData.append('_token',"{{ csrf_token() }}");
    $.ajax({
                url:"{{ URL::to('/trade-center/opt-code-process') }}",
                method:"POST",
                data : formData,
                contentType:false,
                processData:false,
                cache:false,
                success:function(res){
                    //return console.log(res);
                if(res == "true"){
                    window.location = "{{ route('trade-center') }}";
                }else{
                    return $('#message').html('<span class="text-danger text-center">OTP Incorrect,Please Try Again!</span>');
                }


                },error:function(xhr){
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
