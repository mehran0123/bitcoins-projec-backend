<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

<script>

    $(document).ready(function(){

        $("#data-table").DataTable({
                    dom:
                        "<'text-muted'Bi>\n  <'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>\n     <'table-responsive'tr>\n        <'row align-items-center'<'col-sm-12 col-md-5'i>  <'col-sm-12 col-md-7 d-flex justify-content-end'p>>",
                        buttons: [
                        "copyHtml5",
                         "csv",
                         "excel",
                         "pdf",
                        {
                            extend: "print",
                            autoPrint: true,
                        },
                    ],
                    language: {
                    paginate: {
                            previous: '<i class="fa fa-lg fa-angle-left"></i>',
                            next: '<i class="fa fa-lg fa-angle-right"></i>',
                        },
                    },

                    autoWidth: false,

                });


         //delete User here
         $('body').delegate('#delete_user','click',function(){
              const id = $(this).find('input[name="id"]').val();
              swal({
              title: "Do you want to delete this User?",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                  url:"{{ route('users.delete') }}",
                  method:"POST",
                  data : {"_token":"{{ csrf_token() }}",id},
                  success:function(res){
                      swal("User Deleted Successfully!", {
                  icon: "success",
                  });
                  window.location.reload();
                  },error:function(xhr){
                      console.log(xhr.responseText);
                  }
              });
              } else {
                  // swal("Your imaginary file is safe!");
              }
              });

              });


               //change delete status here
           $('body').delegate('#change_status','click',function(){
              const id = $(this).parent().find('input[name="id"]').val();
              const option = $(this);

              $.ajax({
                  url:"{{ route('bank.change-status') }}",
                  method:"POST",
                  data : {"_token":"{{ csrf_token() }}",id},
                  success:function(res){
                    if(res == 0){
                        option.attr('class','material-icons text-success');
                        option.html("check_box");
                    }else{
                        option.attr('class','material-icons text-danger');
                        option.html("check_box_outline_blank");
                    }
                  },error:function(xhr){
                      console.log(xhr.responseText);
                  }
              });
          });
        });
</script>
