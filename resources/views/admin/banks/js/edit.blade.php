<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script>

    $(document).ready(function(){
         //for add new Country
         $('#edit_bank').click(function(){
            const type = $('#type').val();
            const account_title = $('#account_title').val();
            const account_no = $('#account_no').val();
            const transection_fee = $('#transection_fee').val();
            const other_details = $('#other_details').val();
            //applying validations here
         if(type == 0){
                $('#name_error').html("");
                $('#type_error').html("Account Type Required*.");
                return $('#type').focus()
        } else if(!account_title || !$.trim(account_title).length){
                $('#type_error').html("");
                $('#account_title_error').html("");
                $('#account_title_error').html("Account Title Required*.");
                return $('#account_title').focus()
         } else if(!account_no || !$.trim(account_no).length){
                $('#account_title_error').html("");
                $('#type_error').html("");
                $('#account_no_error').html("account no. Required*.");
                return $('#account_no').focus()
          }
        //  else if(!transection_fee || !$.trim(transection_fee).length){
        //         $('#account_title_error').html("");
        //         $('#type_error').html("");
        //         $('#account_no_error').html("");
        //         $('#transection_fee_error').html("transection_fee No. Required*.");
        //         return $('#transection_fee').focus()
        // }
        else{
                $('#account_title_error').html("");
                $('#type_error').html("");
                $('#account_no_error').html("");
                var formData = new FormData();
                formData.append('type',type);
                formData.append('account_title',account_title);
                formData.append('account_no',account_no);
                formData.append('transection_fee',transection_fee);
                formData.append('other_details',other_details);
                formData.append('id',"{{ $bank->id }}");
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('bank.update') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                   // return console.log(res);
                       if(res == "true"){
                        swal('success',"Bank Updated Successfully!",'success');
                       }else if(res == "account_no")
                       {
                         $('#account_no_error').html("account no. already exists.");
                          return $('#account_no').focus()
                       }
                     },error:function(xhr){
                         console.log(xhr.responseText);
                     }
                 });
            }
          });
 });

</script>
