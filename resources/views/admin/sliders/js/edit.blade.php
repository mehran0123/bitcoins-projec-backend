<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>
    $(document).ready(function(){
        //for add new News Post
        $('#edit_slider').click(function(){
                var formData = new FormData();
                image = document.getElementById('fileupload-btn-one').files[0];
                formData.append('image',image);
                formData.append('id',"{{ $slider->id }}");
                formData.append('_token',"{{ csrf_token() }}");
                 $.ajax({
                     url:"{{ route('sliders.update') }}",
                     method:"POST",
                     data:formData,
                     contentType:false,
                     processData:false,
                     cache:false,
                     success:function(res){
                       console.log(res);
                       if(res == "success"){
                        swal('success',"Slider Image Created Successfully!",'success');
                        window.location.reload();
                       }
                     },error:function(xhr){
                         console.log(xhr.responseText);
                     }
                 });
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


