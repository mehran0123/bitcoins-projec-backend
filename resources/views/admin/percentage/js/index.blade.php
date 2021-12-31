
  <script  src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>

  <script>


      $(document).ready(function(){
          //***FOR TOOLTIP***//
        $('[data-toggle="tooltip"]').tooltip();
       //***END***//
        $("#data-table").DataTable({
                    dom:
                        "<'text-muted'Bi>\n  <'row'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6'f>>\n     <'table-responsive'tr>\n        <'row align-items-center'<'col-sm-12 col-md-5'i>  <'col-sm-12 col-md-7 d-flex justify-content-end'p>>",
                        buttons: [
                    ],
                    language: {
                    paginate: {
                            previous: '<i class="fa fa-lg fa-angle-left"></i>',
                            next: '<i class="fa fa-lg fa-angle-right"></i>',
                        },
                    },

                    autoWidth: false,

                });
          //delete NEWS CATEGORY here
          $('body').delegate('#delete_category','click',function(){
              const id = $(this).find('input[name="id"]').val();
              swal({
              title: "@lang('translation.delete_category')",
              icon: "warning",
              buttons: true,
              dangerMode: true,
              })
              .then((willDelete) => {
              if (willDelete) {
                  $.ajax({
                  url:"#",
                  method:"POST",
                  data : {"_token":"{{ csrf_token() }}",id},
                  success:function(res){
                      swal("@lang('translation.category_delete_success')", {
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
               //change News status here
           $('body').delegate('#change_status','click',function(){
              const id = $(this).parent().find('input[name="id"]').val();
                const optoin = $(this);
              $.ajax({
                  url:"#",
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



          //applying validation
          $('#name_english').keypress(function(e){
            var regex = new RegExp("^[a-zA-Z0-9 ]+$");
            var str = String.fromCharCode(!e.charCode ? e.which : e.charCode);
            if (regex.test(str)) {
                return true;
            }
            return false;
          });

          //preventing from copt paste
          $('#name_english').on("cut copy paste",function(e) {
                e.preventDefault();
            });

          });



  </script>
