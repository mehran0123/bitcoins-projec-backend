@include('layouts.master_header')

  <body>
      <style>
          .auth-header{
            background-color: #b0d5aa !important;
          }
          .btn-block{
            background-color: #b0d5aa !important;
          }
      </style>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <main class="auth">
      <header id="auth-header" class="auth-header" style="background-image: url({{ URL::to('/public/admin/assets/images/illustration/img-1.png') }});">

        <h1>
            <img src="{{ URL::to('/public/admin/assets/user.jpg') }}" alt="Logo Image" height="100px" width="100px">

           <span class="sr-only">Sign In</span>
        </h1>
        <p> Bitcoins
        </p>
      </header><!-- form -->
      <form action="{{ URL::to('/admin/login-pro') }}" method="POST" class="auth-form">
        <!-- .form-group -->
        @csrf
        <x-messages/>
        <div class="form-group">
          <div class="form-label-group">
            <input type="email" id="inputUser" class="form-control" name="email" placeholder="@lang('translation.email')" autofocus="" required/> <label for="inputEmail">Email</label>
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <div class="form-label-group">
            <input type="password" id="inputPassword" class="form-control" name="password" placeholder="@lang('translation.password')" required/> <label for="inputPassword">Password</label>
          </div>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        <div class="form-group">
          <button class="btn btn-lg btn-primary btn-block" type="submit">@lang('translation.sign_in')</button>
        </div><!-- /.form-group -->
        <!-- .form-group -->
        {{-- <div class="form-group text-center">
          <div class="custom-control custom-control-inline custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label" for="remember-me">@lang('translation.keep_me_sign_in')</label>
          </div>
        </div><!-- /.form-group --> --}}
        <!-- recovery links -->
        {{-- <div class="text-center pt-3">
          {{-- <a href="auth-recovery-username.html" class="link">Forgot Username?</a> --}}
           {{-- <span class="mx-2">·</span> <a href="{{ URL::to('/admin/forgot-password') }}" class="link">@lang('translation.forgot_password')</a> --}}
        {{-- </div><!-- /recovery links --> --}}
      </form><!-- /.auth-form -->
@include('layouts.master_footer')
  </body>
</html>
