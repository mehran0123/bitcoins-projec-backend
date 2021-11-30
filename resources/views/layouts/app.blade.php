<!DOCTYPE html>
<html lang="en">

	<head>

		<!-- Required meta tags -->
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

		<!-- Meta Tags -->
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="description" content="Application Center">
		<meta name="keywords" content="">
		<meta name="author" content="Unicoder">

		<!-- Favicon -->
		<link rel="shortcut icon" href="{{ URL::to('/public/web/img/favicon.png') }}">

		<!--	Css Link
			========================================================-->
		<link rel="stylesheet" type="text/css" href="{{ URL::to('/public/web/css/app.css') }}">

		<!--	Title
			=========================================================-->
		<title>@yield('title')</title>

	</head>
	<body>

<style>
    input{
        color:black !important;
    }
</style>
		<!-- Header -->
		<header>
			<!-- Dasktop Container -->
			<div class="container dasktopContainer d-none d-lg-block ">
				<div class="row">

					<!-- Nav left -->
					<div class="col">
						<nav>
							<ul class="nav">
								<li class="nav-item"><a class="nav-link" href="#">@lang('translation.about_naps')</a></li>
								<li class="nav-item"><a class="nav-link" href="#">@lang('translation.solutions')</a></li>
								<li class="nav-item"><a class="nav-link" href="#">@lang('translation.technologise')</a></li>
							</ul>
						</nav>
					</div>


					<!-- Logo -->
					<div class="col-sm-1 col-md-1">
						<div class="logo">
							<a href="{{ route('web.home.index') }}"><img src="{{ URL::to('/public/web') }}/img/logo.png"></a>
						</div>
					</div>

					<!-- Nav Right -->
					<div class="col">
						<nav>
							<ul class="nav  justify-content-end">
								<li class="nav-item"><a class="nav-link" href="#">@lang('translation.press_center')</a></li>
								<li class="nav-item"><a class="nav-link" href="#">@lang('translation.career')</a></li>
								<li class="nav-item"><a class="nav-link btn btn-primary" href="{{ route('web.home.index') }}">@lang('translation.application_center')</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
			<!-- Mobile Container -->
			<div class="container mobileContainer d-block d-lg-none">
				<div class="row">
					<div class="col-sm-12 col-md-12">
						<nav class="navbar navbar-expand-lg navbar-light bg-light">

							<!-- logo -->
							<a class="navbar-brand" href="#"><img src="{{ URL::to('/public/web') }}/img/logo.png"></a>

							<!-- Responsive Button -->
							<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
								<span class="navbar-toggler-icon"></span>
							</button>

							<!-- Nav -->
							<div class="collapse navbar-collapse" id="navbarNavDropdown">
								<ul class="navbar-nav">
									<li class="nav-item"><a class="nav-link" href="#">@lang('translation.about_naps')</a></li>
									<li class="nav-item"><a class="nav-link" href="#">@lang('translation.solutions')</a></li>
									<li class="nav-item"><a class="nav-link" href="#">@lang('translation.technologise')</a></li>
									<li class="nav-item"><a class="nav-link" href="#">@lang('translation.press_center')</a></li>
									<li class="nav-item"><a class="nav-link" href="#">@lang('translation.career')</a></li>
									<li class="nav-item"><a class="nav-link" href="#">@lang('translation.application_center')</a></li>
								</ul>
							</div>
						</nav>
					</div>
				</div>
			</div>
		</header>
		<!-- Header -->

		<!-- BottomBar -->
		<div class="BottomBar">
			<div class="container">
				<div class="row">

					<!-- Nav Left -->
					<div class="col-sm-6 col-md-6">
						<ul class="nav">
							<li class="nav-item">
								<a class="nav-link" href="#">@lang('translation.eQueue_online')</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">@lang('translation.about_the_center')</a>
							</li>
							<li class="nav-item">
								<a class="nav-link" href="#">@lang('translation.contacts')</a>
							</li>
						</ul>
					</div>

					<!-- Nav Right -->
					<div class="col-sm-6 col-md-6">
						<ul class="nav justify-content-end">
							<li class="nav-item">
								<a class="nav-link" href="{{ URL::to('/login') }}"><img src="{{ URL::to('/public/web') }}/icons/user.png">@lang('translation.user')</a>
                            </li>
                            @if (Session::has('user'))
                            <li class="nav-item">
								<a class="nav-link" href="{{ route('web.auth.logout') }}">@lang('translation.logout')</a>
                            </li>
                            @endif
							<li class="nav-item">
								<a class="nav-link" href="#"><img src="{{ URL::to('/public/web') }}/icons/phone.png">@lang('translation.call_canter')</a>
							</li>
							 <li class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle" data-toggle="dropdown" href="#" role="button" aria-haspopup="true" aria-expanded="false"><img src="{{ URL::to('/public/web') }}/icons/lang.png">
                                    @if (Session::has('web_lang'))
                                        @if (Session::get('web_lang') == 'ar')
                                        English
                                        @else
                                        عربي
                                        @endif
                                    @else
                                    عربي
                                    @endif

                                </a>
							    <div class="dropdown-menu">
                                  @if (Session::has('web_lang'))
                                        @if (Session::get('web_lang') == 'ar')
                                  <a class="dropdown-item" href="{{ URL::to('/web_lang/en') }}">English</a>
                                  <a class="dropdown-item" href="{{ URL::to('/web_lang/ar') }}">عربي</a>
                                        @else
                                        <a class="dropdown-item" href="{{ URL::to('/web_lang/ar') }}">عربي</a>
                                        <a class="dropdown-item" href="{{ URL::to('/web_lang/en') }}">English</a>
                                        @endif
                                  @else
                                  <a class="dropdown-item" href="{{ URL::to('/web_lang/ar') }}">عربي</a>
							      <a class="dropdown-item" href="{{ URL::to('/web_lang/en') }}">English</a>
                                  @endif
							    </div>
						  	</li>
						</ul>
					</div>
				</div>
			</div>
		</div>
		<!-- BottomBar -->


        @yield('content')


		<!-- Footer -->
		<footer>
			<div class="container">
				<div class="row">
					<div class="col-sm-6 col-md-6">
						<p>Application Center ©2018-2020 All rights reserved</p>
					</div>
					<div class="col-sm-6 col-md-6">
						<nav>
							<ul class="nav  justify-content-end">
								 <li class="nav-item"><a class="nav-link" href="#">Cookies</a></li>
								 <li class="nav-item"><a class="nav-link" href="#">Legal notes & Privacy Policy</a></li>
								 <li class="nav-item"><a class="nav-link" href="#">Ethics charter</a></li>
							</ul>
						</nav>
					</div>
				</div>
			</div>
		</footer>
		<!-- Footer -->



		<!--	Js Link
		============================================================-->
		<script src="{{ URL::to('/public/web') }}/js/bundle.js"></script>
<script  src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.8/jquery-ui.min.js" type="text/javascript"></script>

	</body>
</html>
