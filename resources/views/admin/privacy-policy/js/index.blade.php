
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

            });


  </script>
