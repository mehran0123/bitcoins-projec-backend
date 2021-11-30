<div class="col-lg-4">
    <!-- .card -->
    <div class="card card-fluid">
      <h6 class="card-header"> @lang('translation.your_details') </h6><!-- .nav -->
      <nav class="nav nav-tabs flex-column border-0">
        <a href="{{ URL::to('/admin/profile/settings') }}" class="nav-link @yield('profile')">@lang('translation.profile')</a>
        <a href="{{ URL::to('/admin/profile/settings/change-password') }}" class="nav-link @yield('change-password')">@lang('translation.change_password')</a>
        {{-- <a href="user-billing-settings.html" class="nav-link">Billing</a>
        <a href="user-notification-settings.html" class="nav-link">Notifications</a> --}}
      </nav><!-- /.nav -->
    </div><!-- /.card -->
  </div>
