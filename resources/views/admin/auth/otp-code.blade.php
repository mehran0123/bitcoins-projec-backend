@include('layouts.master_header')
<body>
    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <main class="auth">
      <!-- form -->
      <form class="auth-form auth-form-reflow" onsubmit="return false;">
        @csrf
        <div class="text-center mb-4">
          <div class="mb-4">
            <img class="rounded" src="assets/apple-touch-icon.png" alt="" height="72">
          </div>
          <h1 class="h3">OTP CODE </h1>
        </div>
        <div class="form-group mb-4">
          <label class="d-block text-left" for="otp_code">OTP CODE</label> <input type="number"  name="otp_code" id="otp_code" class="form-control form-control-lg" required="" autofocus="">
          <p id="message">
          </p>
        </div>
        <!-- /.form-group -->
        <!-- actions -->
        <div class="d-block d-md-inline-block mb-2">
          <button class="btn btn-lg btn-block btn-primary" type="button" id="send_otp">Submit</button>
        </div>
      </form><!-- /.auth-form -->

    </main><!-- /.auth -->
  </body>
</html>

@include('admin.auth.js.otp_code')
@include('layouts.master_footer')
