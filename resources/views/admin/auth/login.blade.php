@include('layouts.master_header')

  <body style="overflow:hidden;">
      <style>
          .auth-header{
              padding:0;
            background-color: #0000 !important;
          }
          /*.btn-block{*/
          /*  background-color: #b0d5aa !important;*/
          /*}*/
          #background-video {
    position: absolute;
    top: 0;
    width: 100%;
    left: 0;
    z-index: -1;
    height: 150vh;
}
.auth{
      background-color: #0000 !important;
}
body {
    background-color: #ffffff00;
}
video {
    width: 100%;
    position: absolute;
}
.auth {
    justify-content: center;
}
footer.auth-footer {
    display: none;
}
.btn-block {
    background-color: #fee715ff !important;
    color: #101820ff;
    font-weight: 900;
    border-color: #101820ff;
}
.form-control {
    display: block;
    width: 100%;
    height: calc(1.5em + 0.75rem + 2px);
    padding: 0.375rem 0.75rem;
    font-size: 1rem;
    font-weight: 400;
    line-height: 1.5;
    color: #000000;
    background-color: #ffffff;
}
.auth-form {
    padding: 3rem 2rem 1rem;
    max-width: 420px;
    border-radius: 0.25rem;
    background-color: #222230;
    box-shadow: 0 0 0 1px rgb(20 20 31 / 5%), 0 1px 3px 0 rgb(20 20 31 / 15%);
    background: rgba( 0, 0, 0, 0.45 );
    box-shadow: 0 8px 32px 0 rgb(31 38 135 / 37%);
    backdrop-filter: blur( 3px );
    -webkit-backdrop-filter: blur( 3px );
    border-radius: 10px;
    border: 1px solid rgba( 255, 255, 255, 0.18 );
}
.gradient-custom-3 {
  /* fallback for old browsers */
  background: #84fab0;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(132, 250, 176, 0.5), rgba(143, 211, 244, 0.5))
}
.gradient-custom-4 {
  /* fallback for old browsers */
  background: #84fab0;

  /* Chrome 10-25, Safari 5.1-6 */
  background: -webkit-linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1));

  /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
  background: linear-gradient(to right, rgba(132, 250, 176, 1), rgba(143, 211, 244, 1))
}
h1.signup-title {
    text-align: center;
    color: #fee715;
    text-shadow: 2px -2px black;
}
a {
    color: #fee715;
}
      </style>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <video autoplay muted loop>
     <source src="{{ URL::to('/public/admin/assets/videoplayback.mp4')}}" type="video/mp4">
    </video>
     <main class="auth" style="/*background-image: url({{ URL::to('/public/admin/assets/images/bg.gif') }});*/">
      <!--<header id="auth-header" class="auth-header" style="/*background-image: url({{ URL::to('/public/admin/assets/images/bg.gif') }});*/">-->
      <!--  <h1>-->
      <!--      <img src="{{ URL::to('/public/admin/assets/user.jpg') }}" alt="Logo Image" height="100px" width="100px">-->

      <!--     <span class="sr-only">Sign In</span>-->
      <!--  </h1>-->
      <!--  <p> Bitcoins-->
      <!--  </p>-->
      <!--</header><!-- form -->
      <form action="{{ URL::to('/admin/login-pro') }}" method="POST" class="auth-form">
        <!-- .form-group -->
        @csrf
        <x-messages/>
        <div class="form-group">
          <div class="form-label-group">
            <h1 class="signup-title">Sign Up</h1>
          </div>
        </div><!-- /.form-group -->

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
         <div class="form-group text-left">
          <div class="custom-control custom-control-inline custom-checkbox">
            <input type="checkbox" class="custom-control-input" id="remember-me"> <label class="custom-control-label" for="remember-me">@lang('translation.keep_me_sign_in')</label>
          </div>
        </div><!-- /.form-group -->
         <!--recovery links -->
        <div class="text-center pt-3">
         <span class="mx-2">·</span> <a href="{{ URL::to('/admin/forgot-password') }}" class="link">@lang('translation.forgot_password')</a>
         </div><!-- /recovery links -->
      </form><!-- /.auth-form -->
@include('layouts.master_footer')
  </body>
</html>
