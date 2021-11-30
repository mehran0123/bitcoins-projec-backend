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
        $('#add_audio').click(function(){
            const audio_name = $('#audio_name').val();
            const artist = $('#artist').val();
            const details = $('#details').val();
            const category_id = $('#category_id').val();
            var image = $('input[name="file-one"]').val();
            var audio = $('input[name="audio"]').val();

            //applying validations here
            if(category_id == ""){
                 $('#category_name_error').html("category name required*");
                 return $('#category_id').focus();
            }else if(!audio_name != "" || !$.trim(audio_name).length){
                 $('#audio_name_error').html("Audio Name Required*");
                 return $('#audio_name').focus();
            }else if(!artist != "" || !$.trim(artist).length){
                 $('#artist_error').html("offered by Name Required*");
                 return $('#artist').focus();
            }else if(!details != "" || !$.trim(details).length){
                    $('#details_error').html("details required*.");
                return  $('#details').focus();
            }else if(!image){
                $('#image_one_error').html("");
                $('#title_english_error').html("");
                return $('#image_one_error').html("Icon required.*");
            }else if(!audio){
                $('#audio_one_error').html("");
                $('#title_english_error').html("");
                return $('#audio_error').html("Icon required.*");
            }else{
                 $('#category_name_error').html("");
                var formData = new FormData();
                image = document.getElementById('fileupload-btn-one').files[0];
                audio = document.getElementById('audio').files[0];
                formData.append('audio_name',audio_name);
                formData.append('artist',artist);
                formData.append('details',details);
                formData.append('category_id',category_id);
                formData.append('image',image);
                formData.append('audio',audio);
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('audios.create') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                       console.log(res);
                       if(res == "success"){
                        swal('success',"Audio Created Successfully!",'success');
                        $('#audio_name').val('');
                        window.location.reload();
                       }else{
                        $('#audio_name_error').html("Audio Name Already Exists.");
                        $('#audio_name').focus();
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
        $("#fileupload-btn-one").change(function() {
        readURL(this);
        });

    });
</script>


