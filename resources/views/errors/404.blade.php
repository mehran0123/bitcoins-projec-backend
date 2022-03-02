@include('layouts.master_header')
  <body>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .empty-state -->
    <main class="empty-state empty-state-fullpage bg-black">
      <!-- .empty-state-container -->
      <div class="empty-state-container">
        <div class="card">
          <div class="card-header bg-light text-left">
            <i class="fa fa-fw fa-circle text-red"></i> <i class="fa fa-fw fa-circle text-yellow"></i> <i class="fa fa-fw fa-circle text-teal"></i>
          </div>
          <div class="card-body">
            <div class="state-figure">
              <img class="img-fluid" src="{{ URL::to('/public/admin') }}/assets/images/illustration/img-2.svg" alt="" style="max-width: 320px">
            </div>
            <h3 class="state-header"> Page not found! </h3>
            <p class="state-description lead"> Sorry, you've misplaced that URL or it's pointing to something that doesn't exist. </p>
            <div class="state-action">
              <a href="{{ URL::to('/admin') }}" class="btn btn-lg btn-light"><i class="fa fa-angle-right"></i> Go Home</a>
            </div>
          </div>
        </div>
      </div><!-- /.empty-state-container -->
    </main><!-- /.empty-state -->
  </body>
</html>
