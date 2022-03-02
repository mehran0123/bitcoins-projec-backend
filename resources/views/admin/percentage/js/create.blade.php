<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){


        //for add new News Post
        $('#add_percentage').click(function(){
            const percentage = $('#percentage').val();
            //applying validations here
            if(!percentage != "" || !$.trim(percentage).length){
                 $('#percentage_error').html("percentage required*");
                 return $('#name_english').focus();
            }else{
                 $('#percentage_error').html("");
                var formData = new FormData();
                formData.append('percentage',percentage);
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('percentage.create-process') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                       console.log(res);
                       if(res == "success"){
                        swal('success',"Percentage Created Successfully!",'success');
                        $('#percentage').val('');
                        // window.location.reload();
                       }else{
                        $('#percentage_error').html("Percentage Already Exists.");
                        $('#percentage').focus();
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
        // $('input[name="percentage"]').on('keypress', function(e) {
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


