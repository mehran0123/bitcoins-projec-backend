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
        $('#category_form').click(function(){
            const category_name = $('#category_name').val();
            //applying validations here
            if(!category_name != "" || !$.trim(category_name).length){
                 $('#category_name_error').html("Category Name Required*");
                 return $('#name_english').focus();
            }else if(category_name.length < 2){
                    $('#category_name_error').html("Category Name Should be greater than 2 Characters.");
                return  $('#category_name').focus();
            }else{
                 $('#category_name_error').html("");
                var formData = new FormData();
                formData.append('category_name',category_name);
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('category.create') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                       console.log(res);
                       if(res == "success"){
                        swal('success',"Category Created Successfully!",'success');
                        $('#category_name').val('');
                        // window.location.reload();
                       }else{
                        $('#category_name_error').html("Category Name Already Exists.");
                        $('#category_name').focus();
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
        // $('input[name="category_name"]').on('keypress', function(e) {
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


