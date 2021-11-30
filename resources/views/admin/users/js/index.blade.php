
  <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

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
                            autoPrint: false,
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




          //delete zone here
          $('body').delegate('#delete_user','click',function(){
              const id = $(this).find('input[name="id"]').val();



              swal({
              title: "@lang('translation.delete_users')",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
              if (willDelete) {

                  $.ajax({
                  url:"{{ route('admin.users.delete') }}",
                  method:"POST",
                  data : {"_token":"{{ csrf_token() }}",id},
                  success:function(res){
                      swal("@lang('translation.delete_user_success')", {
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


               //change zone status here
           $('body').delegate('#change_status','click',function(){
              const id = $(this).parent().find('input[name="id"]').val();

                const optoin = $(this);

              $.ajax({
                  url:"{{ route('admin.users.status') }}",
                  method:"POST",
                  data : {"_token":"{{ csrf_token() }}",id},
                  success:function(res){



                    if(res == 0){
                        optoin.attr('class','material-icons text-success');
                        optoin.html("check_box");
                    }else{
                        optoin.attr('class','material-icons text-danger');
                        optoin.html("check_box_outline_blank");
                    }

                  },error:function(xhr){

                      console.log(xhr.responseText);
                  }
              });

          });



      });



  </script>
