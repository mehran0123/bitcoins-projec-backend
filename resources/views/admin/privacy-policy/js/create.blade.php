<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        //preventing from copt paste
        $('#name_english').on("cut copy paste",function(e) {
                e.preventDefault();
            });

            $('#short_name_english').on("cut copy paste",function(e) {
                e.preventDefault();
            });
        //for add new News Post
        $('#add_privacy_policy').click(function(){
            const details = $('#details').val();
            //applying validations here
            if(!details != "" || !$.trim(details).length){
                 $('#details_error').html("Privacy Policy Required*");
                 return $('#details').focus();
            }else if(details.length < 2){
                    $('#details_error').html("Privacy Policy Should be greater than 2 Characters.");
                return  $('#details').focus();
            }else{
                 $('#details_error').html("");
                var formData = new FormData();
                formData.append('details',details);
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('privacy-policy.create') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                       console.log(res);
                       if(res == "success"){
                        swal('success',"Privacy Policy Created Successfully!",'success');
                        $('#details').val('');
                        window.location.href="{{ route('admin') }}";
                       }else{
                        $('#details_error').html("Privacy Policy Already Exists.");
                        $('#details').focus();
                       }
                     },error:function(xhr){
                         console.log(xhr.responseText);
                     }
                 });


            }
        });

        //for image preview
        function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
            $('#blah').attr('src', e.target.result);
            $('#blah').attr('class','d-block')
            }

            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
        }

        $("#fileupload-btn").change(function() {
        readURL(this);
        });

        //appling validations on input fields
        // $('input[name="details"]').on('keypress', function(e) {
        //   var regex = new RegExp("^[a-zA-Z ]*$");
        //   var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        //   if (regex.test(str)) {
        //      return true;
        //   }
        //   e.preventDefault();
        //   return false;
        //  });

        //  $('input[name="name_arabic"]').on('keypress', function(e) {
        //   var regex = new RegExp("^[a-zA-Z ]*$");
        //   var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
        //   if (regex.test(str)) {
        //      return true;
        //   }
        //   e.preventDefault();
        //   return false;
        //  });

    });
</script>


