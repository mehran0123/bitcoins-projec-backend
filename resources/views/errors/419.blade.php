@include('layouts.master_header')
<body>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .empty-state -->
    <main id="notfound-state" class="empty-state empty-state-fullpage bg-black">
      <!-- .empty-state-container -->
      <div class="empty-state-container">
        <div class="card">
          <div class="card-header bg-light text-left">
            <i class="fa fa-fw fa-circle text-red"></i> <i class="fa fa-fw fa-circle text-yellow"></i> <i class="fa fa-fw fa-circle text-teal"></i>
          </div>
          <div class="card-body">
            <h1 class="state-header display-1 font-weight-bold">
              <span>4</span> <i class="far fa-frown text-red"></i> <span>9</span>
            </h1>
            <h3> @lang('translation.link_expire')</h3>
            <div class="state-action">
              <a href="{{ URL::to('/admin') }}" class="btn btn-lg btn-light"><i class="fa fa-angle-right"></i> Go Home</a>
            </div>
          </div>
        </div>
      </div><!-- /.empty-state-container -->
    </main><!-- /.empty-state -->
