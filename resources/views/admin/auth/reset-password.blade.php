@include('layouts.master_header')
<body>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <main class="auth">
      <!-- form -->
      <form class="auth-form auth-form-reflow" method="post" action="#">
        @csrf
        <div class="text-center mb-4">
          <div class="mb-4">
            <img class="rounded" src="assets/apple-touch-icon.png" alt="" height="72">
          </div>
          <h1 class="h3"> @lang('translation.reset_your_password') </h1>
        </div>
        <div class="form-group mb-4">
          <label class="d-block text-left" for="inputUser">@lang('translation.new_password')</label> <input type="password"  name="password" id="inputPassword" class="form-control form-control-lg" required="" autofocus="">
          <p class="text-muted">
          </p>
        </div>
        <div class="form-group mb-4">
            <label class="d-block text-left" for="inputUser">@lang('translation.confirm_password')</label>
            <input type="password" name="conf_password" id="inputPassword" class="form-control form-control-lg" required="">
            <div id="message">
            <x-messages/>
            </div>
          </div>
        <!-- /.form-group -->
        <!-- actions -->
        <div class="d-block d-md-inline-block mb-2">
          <input type="hidden" name="token" value="{{ $token }}">
          <button class="btn btn-lg btn-block btn-primary" type="button" id="reset-password">@lang('translation.reset_password')</button>

        </div>
        <div class="d-block d-md-inline-block">
            <a href="http://localhost/shark_cms/admin" class="btn btn-block btn-light">@lang('translation.return_to_sign_in')</a>
          </div>
      </form><!-- /.auth-form -->


    </main><!-- /.auth -->
  </body>
</html>

@include('admin.auth.js.reset-password')
@include('layouts.master_footer')
