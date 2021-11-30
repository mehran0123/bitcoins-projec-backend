<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){


    //end showing and hiding div section

        //Edit category
        $('#edit_privacy_policy').click(function(){
            const details = $('#details').val();
            //applying validations here
            if(!details != ""){
                 $('#edit_details_error').html("Privacy policy Required*");
                 return $('#details').focus();
            }else if(details.length < 2){
                    $('#edit_details_error').html("Privacy policy Should be greater than 2 Characters.");
                return  $('#details').focus();
            }else{
                 $('#edit_details_error').html("");
                var formData = new FormData();
                formData.append('id',"{{ $privacy->id}}");
                formData.append('details',details);
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('privacy-policy.update') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                        console.log(res);
                       if(res == "success"){
                        swal('success',"Privacy policy Updated Successfully!",'success');
                        $('#details_error').html("");
                       }else if(res == "duplicate"){
                        $('#details_error').html("Privacy policy Already Exists.");
                        return $('#details').focus();
                       }
                     },error:function(xhr){
                         console.log(xhr.responseText);
                     }
                 });


            }
        });


          //applying validation
          $('#details').keypress(function(e){
            var regex = new RegExp("^[a-zA-Z0-9 ]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            return false;
          });
          //preventing from copt paste
          $('#details').on("cut copy paste",function(e) {
                e.preventDefault();
            });


    });
</script>


