<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no"><!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> @yield('title') </title>
    <meta property="og:title" content="Dashboard">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="Responsive admin theme build on top of Bootstrap 4">
    <meta property="og:description" content="Responsive admin theme build on top of Bootstrap 4">
    <link rel="canonical" href="https://uselooper.com">
    {{--  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">  --}}
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/font-awesome.min.css') }}">
    {{--  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">  --}}
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/icon.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/vendor/select2/css/select2.min.css') }}">
    <meta property="og:url" content="#">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/vendor/summernote/summernote-bs4.min.css') }}">

    {{--  <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>  --}}
    <script src="{{ URL::to('/public/admin/assets/javascript/jquery.min.js') }}"></script>
    <script src="{{ URL::to('/public/admin/assets/javascript/sweet-alert.min.js') }}"></script>
    <meta property="og:site_name" content="Hello - Amazing">
    <script type="application/ld+json">
      {
        "name": "Looper - Bootstrap 4 Admin Theme",
        "description": "Responsive admin theme build on top of Bootstrap 4",
        "author":
        {
          "@type": "Person",
          "name": "Beni Arisandi"
        },
        "@type": "WebSite",
        "url": "",
        "headline": "Dashboard",
        "@context": "http://schema.org"
      }
    </script><!-- End SEO tag -->
    <!-- FAVICONS -->
    <link rel="apple-touch-icon" sizes="144x144" href="{{ URL::to('/public/admin/assets/apple-touch-icon.png') }}">
    <link rel="shortcut icon" href="{{ URL::to('/public/admin/assets/favicon.ico') }}">
    <meta name="theme-color" content="#3063A0"><!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/google-font.css') }}">
    {{--  <link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet"><!-- End GOOGLE FONT -->  --}}
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/vendor/flatpickr/flatpickr.min.css') }}"><!-- END PLUGINS STYLES -->
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/vendor/toastr/build/toastr.min.css') }}"><!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/theme.min.css') }}" data-skin="default">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/theme-dark.min.css') }}" data-skin="dark">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/custom.css') }}">
    <script>
      var skin = localStorage.getItem('skin') || 'default';
      var isCompact = JSON.parse(localStorage.getItem('hasCompactMenu'));
      var disabledSkinStylesheet = document.querySelector('link[data-skin]:not([data-skin="' + skin + '"])');
      // Disable unused skin immediately
      disabledSkinStylesheet.setAttribute('rel', '');
      disabledSkinStylesheet.setAttribute('disabled', true);
      // add flag class to html immediately
      if (isCompact == true) document.querySelector('html').classList.add('preparing-compact-menu');
    </script><!-- END THEME STYLES -->
  </head>
  <style>
      .dt-button{
        border: 1px solid #ccc !important;
        padding:7px !important;
        border-radius: 2px;
        background-color: #f7f7f7de !important;
      }
      .top-bar-list{background-color: #b0d5aa !important;}
      .top-bar-brand{background-color: #b0d5aa !important;}
      .btn-block{background-color: #b0d5aa !important;}
      .btn-sm {background-color: #b0d5aa !important;}
      .has-active .menu-link{background-color:transparent !important;color:#347938 !important;}

  </style>
  <body>
    <!-- .app -->
    <div class="app">
      <!--[if lt IE 10]>
      <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
      <![endif]-->
      <!-- .app-header -->
      <header class="app-header app-header-dark">
        <!-- .top-bar -->
        <div class="top-bar">
          <!-- .top-bar-brand -->
          <div class="top-bar-brand">
            <!-- toggle aside menu -->
            <button class="hamburger hamburger-squeeze mr-2" type="button" data-toggle="aside-menu" aria-label="toggle aside menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle aside menu -->
            @if(Auth::user())
            <a href="{{ URL::to('/admin/dashboard') }}">
                <h4>Bitcoins</h4>
            </a>
            @else
            <a href="{{ URL::to('/admin/dashboard') }}">
                <h4>Bitcoins</h4>
            </a>
            @endif
          </div><!-- /.top-bar-brand -->
          <!-- .top-bar-list -->
          <div class="top-bar-list">
            <!-- .top-bar-item -->
            <div class="top-bar-item px-2 d-md-none d-lg-none d-xl-none">
              <!-- toggle menu -->
              <button class="hamburger hamburger-squeeze" type="button" data-toggle="aside" aria-label="toggle menu"><span class="hamburger-box"><span class="hamburger-inner"></span></span></button> <!-- /toggle menu -->
            </div><!-- /.top-bar-item -->
            <!-- .top-bar-item -->
            <div class="top-bar-item top-bar-item-full">
              <!-- .top-bar-search -->
            </div><!-- /.top-bar-item -->
            <!-- .top-bar-item -->
            <div class="top-bar-item top-bar-item-right px-0 d-none d-sm-flex">
              <!-- .nav -->
              <!-- .btn-account -->
              <div class="dropdown d-none d-md-flex">
                <button class="btn-account" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                    <span class="user-avatar user-avatar-md"><img src="{{ URL::to('/public/admin/assets/user.jpg') }}" alt="" width="100px"></span> <span class="account-summary pr-lg-4 d-none d-lg-block"><span class="account-name">
                {{ Auth::user()->name  }}
                </span> <span class="account-description">
                </span></span></button> <!-- .dropdown-menu -->
                <div class="dropdown-menu">
                  <div class="dropdown-arrow d-lg-none" x-arrow=""></div>
                  <div class="dropdown-arrow ml-3 d-none d-lg-block"></div>
                   {{--  <h6 class="dropdown-header d-none d-md-block d-lg-none"> Beni Arisandi </h6><a class="dropdown-item" href="{{ URL::to('/admin/profile') }}"><span class="dropdown-icon oi oi-person"></span> @lang('translation.profile')</a>  --}}
                    <a class="dropdown-item" href="{{ URL::to('/admin/logout') }}">
                        <span class="dropdown-icon oi oi-account-logout"></span>
                        @lang('translation.logout')
                    </a>

                  {{--  <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>  --}}
                </div><!-- /.dropdown-menu -->
              </div><!-- /.btn-account -->
            </div><!-- /.top-bar-item -->
          </div><!-- /.top-bar-list -->
        </div><!-- /.top-bar -->
      </header><!-- /.app-header -->
      <!-- .app-aside -->
      <aside class="app-aside app-aside-expand-md app-aside-light">
        <!-- .aside-content -->
        <div class="aside-content">
          <!-- .aside-header -->
          <header class="aside-header d-block d-md-none">
            <!-- .btn-account -->
            <button class="btn-account" type="button" data-toggle="collapse" data-target="#dropdown-aside"><span class="user-avatar user-avatar-lg"><img src="{{ URL::to('/public/admin/assets/images/avatars/profile.jpg') }}" alt=""></span> <span class="account-icon"><span class="fa fa-caret-down fa-lg"></span></span> <span class="account-summary"><span class="account-name">
              {{ Auth::user()->name  }}
                {{--  </span> <span class="account-description">Marketing Manager</span></span></button> <!-- /.btn-account -->  --}}
            <!-- .dropdown-aside -->
            <div id="dropdown-aside" class="dropdown-aside collapse">
              <!-- dropdown-items -->
              <div class="pb-3">
                <a class="dropdown-item" href="user-profile.html"><span class="dropdown-icon oi oi-person"></span> Profile</a> <a class="dropdown-item" href="auth-signin-v1.html"><span class="dropdown-icon oi oi-account-logout"></span> @lang('translation.logout')</a>
                <div class="dropdown-divider"></div><a class="dropdown-item" href="#">Help Center</a> <a class="dropdown-item" href="#">Ask Forum</a> <a class="dropdown-item" href="#">Keyboard Shortcuts</a>
              </div><!-- /dropdown-items -->
            </div><!-- /.dropdown-aside -->
          </header><!-- /.aside-header -->
          <!-- .aside-menu -->
          <div class="aside-menu overflow-hidden">
            <!-- .stacked-menu -->
            <nav id="stacked-menu" class="stacked-menu">
              <!-- .menu -->
              <ul class="menu">
                <li class="menu-item @yield('dashboard')">
                  <a href="{{ URL::to('/admin/dashboard') }}" class="menu-link text-green"><span class="fas fa-home"></span> <span class="menu-text">@lang('translation.dashboard')</span></a>
                </li><!-- /.menu-item -->
                 <!-- .menu-item -->
                 <li class="menu-item @yield('categories')">
                  <a href="#" class="menu-link"><span class="oi oi-cloud-upload"></span> <span class="menu-text">Users</span></a>
                </li>
                <li class="menu-item @yield('audios')">
                    <a href="#" class="menu-link"><span class="oi oi-audio-spectrum"></span> <span class="menu-text">Deposit</span></a>
                </li>
                <li class="menu-item has-child @yield('courses-has-open')">
                    <a href="#" class="menu-link"><span class="oi oi-list"></span> <span class="menu-text">Withdraw</span></a> <!-- child menu -->
                    <ul class="menu">
                        <li class="menu-item @yield('course-types')">
                            <a href="#" class="menu-link"><span class="menu-text text-green">Courses Types</span></a>
                       </li>
                       <li class="menu-item @yield('course-audios')">
                        <a href="#" class="menu-link"> <span class="menu-text text-green">Deposit</span></a>
                   </li>
                    </ul><!-- /child menu -->
                  </li>
            <li class="menu-item @yield('contact-support')">
               <a href="#" class="menu-link"><span class="oi oi-envelope-closed"></span> <span class="menu-text">Withdraw</span></a>
            </li>
        </li><!-- /.menu-item -->
             </ul><!-- /.menu -->
            </nav><!-- /.stacked-menu -->
          </div><!-- /.aside-menu -->
          <!-- Skin changer -->
          <footer class="aside-footer border-top p-2">
            <button class="btn btn-light btn-block" data-toggle="skin"><span class="d-compact-menu-none" style="color:white">Night mode</span> <i class="fas fa-moon ml-1"></i></button>
          </footer><!-- /Skin changer -->
        </div><!-- /.aside-content -->
      </aside><!-- /.app-aside -->
      <!-- .app-main -->
      <main class="app-main">
        <!-- .wrapper -->
        <div class="wrapper">


              @yield('content')


        </div><!-- .app-footer -->
        <footer class="app-footer">
          <div class="copyright"> Bitcoins © 2021-22. All right reserved. </div>
        </footer><!-- /.app-footer -->
        <!-- /.wrapper -->
      </main><!-- /.app-main -->
    </div><!-- /.app -->

</body>
</html>
  <!-- BEGIN BASE JS -->

  <script src="{{ URL::to('/public/admin/assets/vendor/jquery/jquery.min.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/vendor/popper.js/umd/popper.min.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS -->
  <!-- BEGIN PLUGINS JS -->
  <script src="{{ URL::to('/public/admin/assets/vendor/pace-progress/pace.min.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/vendor/flatpickr/flatpickr.min.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/vendor/easy-pie-chart/jquery.easypiechart.min.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/vendor/chart.js/Chart.min.js') }}"></script> <!-- END PLUGINS JS -->
  <script src="{{ URL::to('/public/admin/assets/vendor/toastr/build/toastr.min.js') }}"></script>
  <!-- BEGIN THEME JS -->
  <script src="{{ URL::to('/public/admin/assets/javascript/theme.min.js') }}"></script> <!-- END THEME JS -->
  <!-- BEGIN PAGE LEVEL JS -->
  {{-- <script src="{{ URL::to('/public/admin/assets/javascript/pages/dashboard-demo.js') }}"></script> <!-- END PAGE LEVEL JS --> --}}

    {{-- <script src="{{ URL::to('/public/admin/assets/javascript/pages/toastr-demo.js') }}"></script> <!-- END PAGE LEVEL JS --> --}}

  <!-- BEGIN THEME JS -->
  <script src="{{ URL::to('/public/admin/assets/vendor/summernote/summernote-bs4.min.js') }}"></script>
  <!-- BEGIN PAGE LEVEL JS -->
  <script src="{{ URL::to('/public/admin/assets/javascript/pages/summernote-demo.js') }}"></script>

  <!-- END PAGE LEVEL JS -->

  <script src="{{ URL::to('/public/admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}"></script>
   <script src="{{ URL::to('/public/admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
   <script src="{{ URL::to('/public/admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script> --}}
  <script src="{{ URL::to('/public/admin/assets/vendor/datatables.net-buttons-bs4/js/buttons.bootstrap4.min.js') }}"></script>
   <!-- END PLUGINS JS -->

  <!-- BEGIN THEME JS -->
{{--
 <script src="https://cdn.datatables.net/buttons/1.6.4/js/dataTables.buttons.min.js"></script>
  <script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.flash.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.html5.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.6.4/js/buttons.print.min.js"s></script>  --}}
  <!-- BEGIN PAGE LEVEL JS -->
  <script src="{{ URL::to('/public/admin/assets/vendor/select2/js/select2.min.js') }}"></script>
<script src="{{ URL::to('/public/admin/assets/javascript/pages/select2-demo.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/javascript/pages/dataTables.bootstrap.js') }}"></script>
  <script src="{{ URL::to('/public/admin/assets/javascript/pages/datatables-demo.js') }}"></script>
  <!-- END PAGE LEVEL JS -->

