<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- End Required meta tags -->
    <!-- Begin SEO tag -->
    <title> @yield('title') </title>
    <meta property="og:title" content="Dashboard">
    <meta name="author" content="Beni Arisandi">
    <meta property="og:locale" content="en_US">
    <meta name="description" content="">
    <meta property="og:description" content="">
    <link rel="canonical" href="">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <link rel="stylesheet"
        href="{{ URL::to('/public/admin/assets/vendor/datatables.net-buttons-bs4/css/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/font-awesome.min.css') }}">
    {{--
		<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
		--}}
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
    <meta name="theme-color" content="#3063A0">
    <!-- End FAVICONS -->
    <!-- GOOGLE FONT -->
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/google-font.css') }}">
    {{--
		<link href="https://fonts.googleapis.com/css?family=Fira+Sans:400,500,600" rel="stylesheet">
		<!-- End GOOGLE FONT -->  --}}
    <!-- BEGIN PLUGINS STYLES -->
    <link rel="stylesheet"
        href="{{ URL::to('/public/admin/assets/vendor/open-iconic/font/css/open-iconic-bootstrap.min.css') }}">
    <link rel="stylesheet"
        href="{{ URL::to('/public/admin/assets/vendor/@fortawesome/fontawesome-free/css/all.min.css') }}">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/vendor/flatpickr/flatpickr.min.css') }}">
    <!-- END PLUGINS STYLES -->
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/vendor/toastr/build/toastr.min.css') }}">
    <!-- END PLUGINS STYLES -->
    <!-- BEGIN THEME STYLES -->
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/theme.min.css') }}" data-skin="default">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/theme-dark.min.css') }}"
        data-skin="dark">
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets/stylesheets/custom.css') }}">
    <title>VIP CAJAB</title>
    <!-- Bootstrap 4.0-->
    <link rel="stylesheet"
        href="{{ URL::to('/public/admin/assets') }}/vendors_components/bootstrap/dist/css/bootstrap.css">
    <!-- bootstrap wysihtml5 - text editor -->
    <link rel="stylesheet"
        href="{{ URL::to('/public/admin/assets') }}/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.css">
    <!--amcharts -->
    <link href="{{ URL::to('/public/admin/assets') }}/lib/3/plugins/export/export.css" rel="stylesheet"
        type="text/css" />
    <!-- Data Table-->
    <link rel="stylesheet" type="text/css"
        href="{{ URL::to('/public/admin/assets') }}/vendors_components/datatable/datatables.min.css" />
    <!-- theme style -->
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets') }}/css/style.css">
    <!--  skins -->
    <link rel="stylesheet" href="{{ URL::to('/public/admin/assets') }}/css/skin_color.css">
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
    .dt-button {
        border: 1px solid #ccc !important;
        padding: 7px !important;
        border-radius: 2px;
        background-color: #f7f7f7de !important;
    }

    div#carouselExampleIndicators {
        box-shadow: -1px 0px 10px 6px #000;
        margin-bottom: 25px;
    }

    .top-bar-list {
        background-color: #b0d5aa !important;
    }

    .top-bar-brand {
        background-color: #b0d5aa !important;
    }

    .btn-block {
        background-color: #b0d5aa !important;
    }

    .btn-sm {
        background-color: #b0d5aa !important;
    }

    .has-active .menu-link {
        background-color: transparent !important;
        color: #347938 !important;
    }

    video {
        width: 100%;
        position: fixed;
    }

    h4.cardscounter {
        color: #fbae1c !important;
        font-weight: 700;
        text-shadow: 2px 1px black;
    }

    select option {
        color: #ffffff !important;
    }

    a.calendar-btn {
        display: block;
        width: 200px;
        background: #fbae1c;
        color: #000;
        font-weight: 800;
        text-align: center;
        padding: 10px;
        margin: 14px;
        font-size: 18px;
        border-radius: 9px;
    }

    @media(max-width:660px) {
        .breadcrumb a {
            font-size: 14px;
        }

        td.day {
            width: 14%;
            height: 80px;

        }

        .page-title {
            margin-top: 0;
            font-size: 15px;
        }

        .content-header {
            padding: 0;
        }

        h3 {
            font-size: 15px;
        }

        .content-header>h3 {
            padding: 8px 10px;
        }

        .main-header .logo {
            height: 35px;
            line-height: 35px;
        }

        .navbar-custom-menu .navbar-nav>li {
            height: 50px;
        }

        .content-header .breadcrumb {
            padding: 6px 10px !important;
        }

        .content {
            min-height: 250px;
            padding: 0;
        }

        .box.bg-light.counter-card {
            margin-top: 10px;
            margin-bottom: 0px;
        }

        .col-3 {
            flex: 0 0 25%;
            max-width: 25%;
            padding: 0 4px;
        }

        .dark-skin .main-header .navbar .nav>li>a {
            margin-top: 0px;
        }

        div#carouselExampleIndicators {
            box-shadow: -1px 0px 4px 3px #000;
            margin: 10px 8px;
        }

        .row {
            width: 100%;
            margin: auto;
        }

        .content .col-12 {
            padding: 0;
        }

        .box-body {
            padding: 5px;
        }

        h4.cardscounter {
            font-size: 10px;
            min-height: 30px;
            display: flex;
            align-content: center;
            justify-content: center;
            align-items: center;
        }

        .carousel-indicators {
            margin-bottom: -4px;
        }

        .box.p-4 {
            padding: 10px !important;
            margin-bottom: 10px;
        }

        .ranks_s h2 {
            font-size: 12px !important;
            margin-top: 0px !important;
        }

        .ranks_s p {
            font-size: 10px;
            margin: 0;
        }

        footer.main-footer {
            font-size: 12px;
            text-align: center;
        }

        .user-profile {
            display: none;
        }

        .ranks_s h3 {
            font-size: 10px;
            margin: 5px;
        }

        .ranks-section h4 {
            font-size: 14px;
            margin: 2px;
        }

        .main-sidebar {
            margin-top: 95px;

        }

        .cardscounter+h3 {
            font-size: 10px;
        }

        .box.bg-light.counter-card span,
        .box.bg-light.counter-card i {
            font-size: 50px;
            top: 0px;
        }

        a.calendar-btn {
            display: block;
            width: 120px;
            background: #fbae1c;
            color: #000;
            font-weight: 800;
            text-align: center;
            padding: 10px;
            margin: 14px;
            font-size: 13px;
            border-radius: 9px;
        }
    }
</style>

<body class="hold-transition dark-skin dark-sidebar sidebar-mini theme-yellow">
    <video autoplay muted loop>
        <source src="{{ URL::to('/public/admin/assets/videoplayback.mp4') }}" type="video/mp4">
    </video>
    <div class="wrapper">
        <header class="main-header">
            <!-- Logo -->
            <a href="index.html" class="logo">
                <!-- mini logo -->
                <div class="logo-mini">
                    <h2 class="logo">vip.cajab.com</h2>
                </div>
                <!-- logo-->
                <div class="logo-lg">
                    <h2 class="logo">vip.cajab.com</h2>
                    <!--<span class="light-logo"><img src="../images/logo-light-text.png" alt="logo"></span>-->
                    <!--  <span class="dark-logo"><img src="../images/logo-dark-text.png" alt="logo"></span>-->
                </div>
            </a>
            <!-- Header Navbar -->
            <nav class="navbar navbar-static-top">
                <!-- Sidebar toggle button-->
                <div>
                    <a href="#" class="sidebar-toggle" data-toggle="push-menu" role="button">
                        <i class="ti-align-left"></i>
                    </a>
                    <a href="#" data-provide="fullscreen" class="sidebar-toggle" title="Full Screen">
                        <i class="mdi mdi-crop-free"></i>
                    </a>
                </div>
                <div class="navbar-custom-menu r-side">
                    <ul class="nav navbar-nav">
                        <!-- full Screen -->
                        <li class="search-bar">
                            <div class="lookup lookup-circle lookup-right">
                                <input type="text" name="s">
                            </div>
                        </li>
                        <!-- Notifications -->
                        <li class="dropdown notifications-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="Notifications">
                                <i class="mdi mdi-bell"></i>
                            </a>
                            <ul class="dropdown-menu animated bounceIn">
                                <li class="header">
                                    <div class="p-20">
                                        <div class="flexbox">
                                            <div>
                                                <h4 class="mb-0 mt-0">Notifications</h4>
                                            </div>
                                            <div>
                                                <a href="#" class="text-danger">Clear All</a>
                                            </div>
                                        </div>
                                    </div>
                                </li>
                                <li>
                                    <!-- inner menu: contains the actual data -->
                                    <ul class="menu sm-scrol">
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-info"></i> Curabitur id eros quis nunc
                                                suscipit blandit.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-warning text-warning"></i> Duis malesuada justo eu
                                                sapien elementum, in semper diam posuere.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-users text-danger"></i> Donec at nisi sit amet tortor
                                                commodo porttitor pretium a erat.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-shopping-cart text-success"></i> In gravida mauris et
                                                nisi
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-danger"></i> Praesent eu lacus in libero
                                                dictum fermentum.
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-primary"></i> Nunc fringilla lorem
                                            </a>
                                        </li>
                                        <li>
                                            <a href="#">
                                                <i class="fa fa-user text-success"></i> Nullam euismod dolor ut quam
                                                interdum, at scelerisque ipsum imperdiet.
                                            </a>
                                        </li>
                                    </ul>
                                </li>
                                <li class="footer">
                                    <a href="#">View all</a>
                                </li>
                            </ul>
                        </li>
                        <!-- User Account-->
                        <li class="dropdown user user-menu">
                            <a href="#" class="dropdown-toggle" data-toggle="dropdown" title="User">
                                <img src="@if (Auth::user()->image) {{ URL::to('/storage/app') . '/' . Auth::user()->image }}
							@else
							{{ URL::to('/public/admin/assets/user.jpg') }} @endif
							"
                                    class="user-image rounded-circle" alt="User Image">
                            </a>
                            <ul class="dropdown-menu animated flipInX">
                                <!-- User image -->
                                <li class="user-header bg-img" style="background-image: url(../images/user-info.jpg)"
                                    data-overlay="3">
                                    <div class="flexbox align-self-center">
                                        <img src="@if (Auth::user()->image) {{ URL::to('/storage/app') . '/' . Auth::user()->image }}
							@else
							{{ URL::to('/public/admin/assets/user.jpg') }} @endif"
                                            class="float-left rounded-circle" alt="User Image">
                                        <h4 class="user-name align-self-center">
                                            <span>{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</span>
                                            <small>{{ Auth::user()->email }}</small>
                                        </h4>
                                    </div>
                                </li>
                                <!-- Menu Body -->
                                <li class="user-body">
                                    <a class="dropdown-item"
                                        href="{{ route('users.edit', ['id' => Auth::user()->id]) }}"><i
                                            class="ion ion-person"></i> My Profile</a>
                                    <a class="dropdown-item" href=""><i class="ion ion-bag"></i> My
                                        Balance</a>
                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                            class="ion ion-email-unread"></i> Inbox</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="javascript:void(0)"><i
                                            class="ion ion-settings"></i> Account Setting</a>
                                    <div class="dropdown-divider"></div>
                                    <a class="dropdown-item" href="{{ URL::to('/admin/logout') }}"><i
                                            class="ion-log-out"></i> Logout</a>
                                </li>
                            </ul>
                        </li>
                        <!-- Control Sidebar Toggle Button -->
                        <!--<li>-->
                        <!--	<a href="#" data-toggle="control-sidebar" title="Setting"><i class="fa fa-cog fa-spin"></i></a>-->
                        <!--</li>-->
                    </ul>
                </div>
            </nav>
        </header>
        <!-- Left side column. contains the logo and sidebar -->
        <aside class="main-sidebar">
            <!-- sidebar-->
            <section class="sidebar">
                <div class="user-profile">
                    <div class="ulogo">
                        <a href="">
                            <!-- logo for regular state and mobile devices -->
                            <h2 class="logo">vip.cajab.com</h2>
                        </a>
                    </div>
                    <div class="profile-pic">
                        <img src="
						@if (Auth::user()->image) {{ URL::to('/storage/app') . '/' . Auth::user()->image }}
							@else
							{{ URL::to('/public/admin/assets/user.jpg') }} @endif"
                            alt="user">
                        <div class="profile-info">
                            <h5 class="mt-15">{{ Auth::user()->first_name }} {{ Auth::user()->last_name }}</h5>
                            <div class="text-center d-inline-block">
                                <a href="{{ route('users.edit', ['id' => Auth::user()->id]) }}" class="link"
                                    data-toggle="tooltip" title="" data-original-title="Edit Profile"><i
                                        class="ion ion-gear-b"></i></a>
                                <a href="#" class="link px-15" data-toggle="tooltip" title=""
                                    data-original-title="Email"><i class="ion ion-android-mail"></i></a>
                                <a href="{{ URL::to('/admin/logout') }}" class="link" data-toggle="tooltip"
                                    title="" data-original-title="Logout"><i class="ion ion-power"></i></a>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- sidebar menu-->
                <ul class="sidebar-menu" data-widget="tree">
                    <li class="header nav-small-cap">Be a Partner</li>
                    <li class="active">
                        <a href="{{ URL::to('admin/dashboard') }}">
                            <i class="ti-dashboard"></i>
                            <span>Dashboard</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                    </li>

                    <li class="treeview">
                        <a href="#">
                            <i class="ti-user"></i>
                            <span>Manage Banks</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="ti-more"></i>Banks
                                </a>
                            </li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="ti-pie-chart"></i>
                            <span>Deposits</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('deposits.list') }}"><i class="ti-more"></i>Deposits Funds</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="ti-pie-chart"></i>
                            <span>Withdraw</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="#"><i class="ti-more"></i>Withdraw Funds</a></li>
                        </ul>
                    </li>
                    <li class="treeview">
                        <a href="#">
                            <i class="ti-bar-chart"></i>
                            <span>Reports</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ URL::to('admin/reports/transactions') }}"><i
                                        class="ti-more"></i>Transactions History</a></li>
                            <li><a href="{{ URL::to('admin/reports/deposits-transactions') }}"><i
                                        class="ti-more"></i>Deposit History</a></li>
                            <li><a href="{{ URL::to('admin/reports/withdraws-transactions') }}"><i
                                        class="ti-more"></i>Withdraw History</a></li>
                        </ul>
                    </li>

                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="ti-panel"></i>
                            <span>Ranks</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href=""><i class="ti-more"></i>Status</a></li>
                            <li><a href=""><i class="ti-more"></i>Ranks / Achivement</a></li>
                        </ul>
                    </li> --}}

                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="ti-wallet"></i>
                            <span>Daily Earning</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ route('daily.bonus.list') }}"><i class="ti-more"></i>Daily Earning</a>
                            </li>
                        </ul>
                    </li> --}}

                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="ti-stats-up"></i>
                            <span>Refer Friends</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            <li><a href="{{ URL::to('/admin/referfriends') }}"><i class="ti-more"></i>Refer a
                                    Friend</a></li>
                        </ul>
                    </li>
                   --}}
                    {{-- @if (Auth::user()->user_role == 1)
                        <li class="treeview">
                            <a href="#">
                                <i class="ti-files"></i>
                                <span>Transaction Method</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ URL::to('/admin/bank') }}"><i class="ti-more"></i>Manage Method</a>
                                </li>
                                <li><a href="{{ URL::to('/admin/bank/create') }}"><i class="ti-more"></i>Add
                                        Method</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="ti-files"></i>
                                <span>Manage Users</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ URL::to('/admin/users') }}"><i class="ti-more"></i>Manage Users</a>
                                </li>
                                <li><a href="{{ URL::to('/admin/Users/create') }}"><i class="ti-more"></i>Add
                                        Users</a></li>
                            </ul>
                        </li>

                        <li class="treeview">
                            <a href="#">
                                <i class="ti-files"></i>
                                <span>Percentage</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ URL::to('/admin/percentage') }}"><i class="ti-more"></i>Manage
                                        Percentage</a></li>
                                <li><a href="{{ URL::to('/admin/percentage/percentage-create') }}"><i
                                            class="ti-more"></i>Add Percentage</a></li>
                            </ul>
                        </li>
                        <li class="treeview">
                            <a href="#">
                                <i class="ti-files"></i>
                                <span>Manage Slider</span>
                                <span class="pull-right-container">
                                    <i class="fa fa-angle-right pull-right"></i>
                                </span>
                            </a>
                            <ul class="treeview-menu">
                                <li><a href="{{ URL::to('/admin/sliders') }}"><i class="ti-more"></i>Manage
                                        Slider</a></li>
                                <li><a href="{{ URL::to('/admin/sliders/create') }}"><i class="ti-more"></i>Add
                                        Slider</a></li>
                            </ul>
                        </li>
                    @endif --}}

                    {{-- <li class="treeview">
                        <a href="#">
                            <i class="ti-files"></i>
                            <span>My Profile</span>
                            <span class="pull-right-container">
                                <i class="fa fa-angle-right pull-right"></i>
                            </span>
                        </a>
                        <ul class="treeview-menu">
                            @if (Auth::user()->user_role == 2)
                                <li><a href="{{ route('users.edit', ['id' => Auth::user()->id]) }}"><i
                                            class="ti-more"></i>Edit Profile</a></li>
                            @endif
                            <li><a href="{{ URL::to('/admin/logout') }}"><i class="ti-more"></i>Logout</a></li>
                        </ul>
                    </li> --}}
                </ul>
            </section>
        </aside>
        <!-- Content Wrapper. Contains page content -->
        <div class="content-wrapper">
            @yield('content')
            <footer class="main-footer">
                &copy; @php echo date("Y"); @endphp <a href="">vip.cajab.com</a>. All Rights Reserved.
            </footer>
            <!-- Add the sidebar's background. This div must be placed immediately after the control sidebar -->
            <div class="control-sidebar-bg"></div>
        </div>
        <!-- .app-footer -->
</body>

</html>
<!-- BEGIN BASE JS -->
{{-- <script src="{{ URL::to('/public/admin/assets/vendor/jquery/jquery.min.js') }}"></script>
<script src="{{ URL::to('/public/admin/assets/vendor/popper.js/umd/popper.min.js') }}"></script>
<script src="{{ URL::to('/public/admin/assets/vendor/bootstrap/js/bootstrap.min.js') }}"></script> <!-- END BASE JS --> --}}
<!-- BEGIN PLUGINS JS -->
<script src="{{ URL::to('/public/admin/assets/vendor/stacked-menu/js/stacked-menu.min.js') }}"></script>
<script src="{{ URL::to('/public/admin/assets/vendor/perfect-scrollbar/perfect-scrollbar.min.js') }}"></script>
<!-- jQuery 3 -->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/jquery-3.3.1/jquery-3.3.1.js"></script>
<!-- fullscreen -->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/screenfull/screenfull.js"></script>
<!-- jQuery UI 1.11.4 -->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/jquery-ui/jquery-ui.js"></script>
<!-- popper -->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/popper/dist/popper.min.js"></script>
<!-- Bootstrap 4.0-->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/bootstrap/dist/js/bootstrap.js"></script>
<!-- Slimscroll -->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/jquery-slimscroll/jquery.slimscroll.js"></script>
<!-- FastClick -->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/fastclick/lib/fastclick.js"></script>
<!-- Bootstrap WYSIHTML5 -->
<script src="{{ URL::to('/public/admin/assets') }}/vendor_plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.js">
</script>
<!--amcharts charts -->
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/amcharts.js" type="text/javascript"></script>
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/gauge.js" type="text/javascript"></script>
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/serial.js" type="text/javascript"></script>
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/amstock.js" type="text/javascript"></script>
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/pie.js" type="text/javascript"></script>
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/plugins/dataloader/dataloader.min.js"></script>
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/plugins/animate/animate.min.js" type="text/javascript">
</script>
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/plugins/export/export.min.js" type="text/javascript"></script>
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/themes/patterns.js" type="text/javascript"></script>
<script src="{{ URL::to('/public/admin/assets') }}/lib/3/themes/dark.js" type="text/javascript"></script>
<!-- webticker -->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/Web-Ticker-master/jquery.webticker.min.js">
</script>
<!-- EChartJS JavaScript -->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/echarts-master/dist/echarts-en.min.js"></script>
<script
    src="{{ URL::to('/public/admin/assets') }}/vendors_components/echarts-liquidfill-master/dist/echarts-liquidfill.min.js">
</script>
<!-- This is data table -->
<script src="{{ URL::to('/public/admin/assets') }}/vendors_components/datatable/datatables.min.js"></script>
<!--  App -->
<script src="{{ URL::to('/public/admin/assets') }}/js/template.js"></script>
<script src="{{ URL::to('/public/admin/assets') }}/js/pages/dashboard.js"></script>
<script src="{{ URL::to('/public/admin/assets') }}/js/pages/dashboard-chart.js"></script>
<!--  for demo purposes -->
<script src="{{ URL::to('/public/admin/assets') }}/js/demo.js"></script>
<!-- BEGIN THEME JS -->
<script src="{{ URL::to('/public/admin/assets/javascript/theme.min.js') }}"></script> <!-- END THEME JS -->
<!-- BEGIN PAGE LEVEL JS -->
<!-- BEGIN THEME JS -->
<script src="{{ URL::to('/public/admin/assets/vendor/datatables.net/js/jquery.dataTables.min.js') }}"></script>
<script src="{{ URL::to('/public/admin/assets/vendor/datatables.net-buttons/js/dataTables.buttons.min.js') }}">
</script>
<script src="{{ URL::to('/public/admin/assets/vendor/datatables.net-buttons/js/buttons.html5.min.js') }}"></script>
<script src="{{ URL::to('/public/admin/assets/vendor/datatables.net-buttons/js/buttons.print.min.js') }}"></script>
<!-- END PLUGINS JS -->
<!-- BEGIN THEME JS -->
<script>
    $('#alltransaction').DataTable({
        dom: 'Bfrtip',
        buttons: [
            'copy', 'csv', 'excel', 'pdf', 'print'
        ]
    });
    $("document").ready(function() {
        $(".tab-slider--body").hide();
        $(".tab-slider--body:first").show();
    });

    $(".tab-slider--nav li").click(function() {
        $(".tab-slider--body").hide();
        var activeTab = $(this).attr("rel");
        $("#" + activeTab).fadeIn();
        if ($(this).attr("rel") == "tab2") {
            $('.tab-slider--tabs').addClass('slide');
        } else {
            $('.tab-slider--tabs').removeClass('slide');
        }
        $(".tab-slider--nav li").removeClass("active");
        $(this).addClass("active");
    });
    document.querySelectorAll('pre > code').forEach(function(codeBlock) {
        var button = document.createElement('button');
        button.className = 'copy-code-button';
        button.type = 'button';
        button.innerText = 'Copy';

        var pre = codeBlock.parentNode;
        if (pre.parentNode.classList.contains('highlight')) {
            var highlight = pre.parentNode;
            highlight.parentNode.insertBefore(button, highlight);
        } else {
            pre.parentNode.insertBefore(button, pre);
        }
    });

    function addCopyButtons(clipboard) {
        document.querySelectorAll('pre > code').forEach(function(codeBlock) {
            var button = document.createElement('button');
            button.className = 'copy-code-button';
            button.type = 'button';
            button.innerText = 'Copy';

            button.addEventListener('click', function() {
                clipboard.writeText(codeBlock.innerText).then(function() {
                    /* Chrome doesn't seem to blur automatically,
                       leaving the button in a focused state. */
                    button.blur();

                    button.innerText = 'Copied!';

                    setTimeout(function() {
                        button.innerText = 'Copy';
                    }, 2000);
                }, function(error) {
                    button.innerText = 'Error';
                });
            });

            var pre = codeBlock.parentNode;
            if (pre.parentNode.classList.contains('highlight')) {
                var highlight = pre.parentNode;
                highlight.parentNode.insertBefore(button, highlight);
            } else {
                pre.parentNode.insertBefore(button, pre);
            }
        });
    }
    if (navigator && navigator.clipboard) {
        addCopyButtons(navigator.clipboard);
    } else {
        var script = document.createElement('script');
        script.src = 'https://cdnjs.cloudflare.com/ajax/libs/clipboard-polyfill/2.7.0/clipboard-polyfill.promise.js';
        script.integrity = 'sha256-waClS2re9NUbXRsryKoof+F9qc1gjjIhc2eT7ZbIv94=';
        script.crossOrigin = 'anonymous';
        script.onload = function() {
            addCopyButtons(clipboard);
        };

        document.body.appendChild(script);
    }

    $(document).ready(function() {
        // Create date inputs
        minDate = new DateTime($('#min'), {
            format: 'MMMM Do YYYY'
        });
        maxDate = new DateTime($('#max'), {
            format: 'MMMM Do YYYY'
        });

        // DataTables initialisation
        var table = $('#example').DataTable();

        // Refilter the table
        $('#min, #max').on('change', function() {
            table.draw();
        });
    });
    $('.day span.earning_points:empty').hide();
</script>
