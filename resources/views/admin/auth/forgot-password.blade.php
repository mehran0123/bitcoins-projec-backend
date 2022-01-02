@include('layouts.master_header')
<body>
<video autoplay muted loop>
    <source src="{{ URL::to('/public/admin/assets/videoplayback.mp4')}}" type="video/mp4">
   </video>

    <!--[if lt IE 10]>
    <div class="page-message" role="alert">You are using an <strong>outdated</strong> browser. Please <a class="alert-link" href="http://browsehappy.com/">upgrade your browser</a> to improve your experience and security.</div>
    <![endif]-->
    <!-- .auth -->
    <main class="auth">
      <!-- form -->
      <form class="auth-form" method="post" action="{{ URL::to('/trade-center/forgot-password-process') }}">
        @csrf
        <div class="text-center mb-4">
          <h1 class="h3"> @lang('translation.enter_your_email') </h1>
        </div>
        <div class="form-group mb-4">
          <input type="text" placeholder="@lang('translation.email')" name="email" id="inputEmail" class="form-control form-control-lg" required="" autofocus="">
          <p class="text-muted">
            <small>@lang('translation.forgot-narration')</small>
          </p>
          <p>
              <x-messages/>
          </p>
        </div><!-- /.form-group -->
        <!-- actions -->
        <div class="d-block d-md-inline-block mb-2">
          <button class="btn btn-lg btn-block btn-primary" type="submit">@lang('translation.send_email')</button>
        </div>
        <div class="d-block d-md-inline-block">
          <a href="{{ URL::to('/trade-center') }}" class="btn btn-block btn-light">@lang('translation.return_to_sign_in')</a>
        </div>
      </form><!-- /.auth-form -->
    @include('layouts.master_footer')

    </main><!-- /.auth -->
  </body>
</html>
@include('layouts.master_header')
