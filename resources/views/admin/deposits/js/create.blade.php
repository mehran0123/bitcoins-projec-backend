<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

        $('#add_deposit').click(function(){
            const bank_id = $('#bank_id').val();
            const deposit_amount = $('#deposit_amount').val();
            var slip = $('input[name="file-one"]').val();
            //applying validations here
             if(!bank_id != "" || !$.trim(bank_id).length){
                 $('#bank_id_error').html("Deposit Method Required*");
                 return $('#bank_id').focus();
            }else if(!deposit_amount != "" || !$.trim(deposit_amount).length){
                 $('#deposit_amount_error').html("Deposit Amount Required*");
                 return $('#deposit_amount').focus();
            } else if(!slip){
                $('#image_one_error').html("Deposit Slip Required*");
                 return $('#slip-image').focus();
            }else{
                   $('#deposit_amount_error').html("");
               slip = document.getElementById('slip-image').files[0];
                var formData = new FormData();
                formData.append('bank_id',bank_id);
                formData.append('deposit_amount',deposit_amount);
                formData.append('slip',slip);
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('deposits.create-process') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                       console.log(res);
                       if(res == "true"){
                        swal('success',"Deposit Record Created Successfully!",'success');
                        $('#deposit_amount').val('');
                        $('input[name="file-one"]').val('');
                        $('#blah-one').attr('class','d-none')
                      //   window.location.reload();
                       }else{
                           swal('error',"Something Went Worng!",'error');
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
            $('#blah-one').attr('src', e.target.result);
            $('#blah-one').attr('class','d-block')
            }
            reader.readAsDataURL(input.files[0]); // convert to base64 string
        }
        }
        $("#slip-image").change(function() {
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


