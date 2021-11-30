<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){

          //preventing from copt paste
          $('#name_english').on("cut copy paste",function(e) {
                e.preventDefault();
            });

             //preventing from copt paste
          $('#short_name_english').on("cut copy paste",function(e) {
                e.preventDefault();
            });


    //showing and hiding div section
    $('#AR').click(function(){
        $('#name_english_div').attr('class','d-none');
        $('#english_editor').attr('class','d-none');
        $('#name_arabic_div').attr('class','col-md-12 mb-3');
        $('#category_arabic_dev').attr('class','col-md-4 mb-3');
        $('#arabic_editor').attr('class','col-md-12 mb-3');
    });

    $('#EN').click(function(){
        $('#name_english_div').attr('class','col-md-12 mb-3');
        $('#category_english_div').attr('class','col-md-4 mb-3 ');
        $('#english_editor').attr('class','col-md-12 mb-3');
        $('#name_arabic_div').attr('class','d-none');;
    });

    //end showing and hiding div section

        //Edit category
        $('#edit_category').click(function(){
            const category_name = $('#category_name').val();
            //applying validations here
            if(!category_name != ""){
                 $('#edit_category_name_error').html("Category Name Required*");
                 return $('#category_name').focus();
            }else if(category_name.length < 2){
                    $('#edit_category_name_error').html("Category Name Should be greater than 2 Characters.");
                return  $('#category_name').focus();
            }else{
                 $('#edit_category_name_error').html("");
                var formData = new FormData();
                formData.append('id',"{{ $category->id}}");
                formData.append('category_name',category_name);
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('category.update') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                        console.log(res);
                       if(res == "success"){
                        swal('success',"Category Name Updated Successfully!",'success');
                        $('#edit_category_name_error').html("");
                       }else if(res == "duplicate"){
                        $('#edit_category_name_error').html("Category Name Already Exists.");
                        return $('#category_name').focus();
                       }
                     },error:function(xhr){
                         console.log(xhr.responseText);
                     }
                 });


            }
        });


          //applying validation
          $('#category_name').keypress(function(e){
            var regex = new RegExp("^[a-zA-Z0-9 ]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            return false;
          });
          //preventing from copt paste
          $('#category_name').on("cut copy paste",function(e) {
                e.preventDefault();
            });


    });
</script>


