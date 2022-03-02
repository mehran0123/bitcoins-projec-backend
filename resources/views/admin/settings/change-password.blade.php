@extends('layouts.master')
@section('title','Profile Settings')
@section('settings','active')
@section('change-password','active')
@section('content')
<!-- .page -->
<div class="page">
    <!-- .page-cover -->
    @include('admin.profile.profile-header')
    <!-- .page-inner -->
    <div class="page-inner">
      <!-- .page-title-bar -->
      <header class="page-title-bar">
        <nav aria-label="breadcrumb">
          <ol class="breadcrumb">
            <li class="breadcrumb-item active">
              <a href="{{ URL::to('/admin/profile/settings') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>@lang('translation.settings')</a>
            </li>
          </ol>
        </nav>
      </header><!-- /.page-title-bar -->
      <!-- .page-section -->
      <div class="page-section">
        <!-- grid row -->
        <div class="row">
          <!-- grid column -->
         @include('admin.settings.side-settings')
          <!-- /grid column -->
          <!-- grid column -->
          <div class="col-lg-8">
            <!-- .card -->
            <div class="card card-fluid">
              <h6 class="card-header"> @lang('translation.change_password') </h6><!-- .card-body -->
              <div class="card-body">

                <form action="#">
                    <div class="form-row">
                    <!-- form column -->
                    <label for="input02" class="col-md-3">@lang('translation.old_password')</label> <!-- /form column -->
                    <!-- form column -->
                    <div class="col-md-9 mb-3">
                      <input type="password" class="form-control" name="password" id="input02" minlength="6" required/>
                    </div><!-- /form column -->
                  </div><!-- /form row -->
                  <!-- form row -->
                  <div class="form-row">
                    <!-- form column -->
                    <label for="input03" class="col-md-3">@lang('translation.new_password')</label> <!-- /form column -->
                    <!-- form column -->
                    <div class="col-md-9 mb-3">
                        <input type="password" class="form-control" name="new_password" id="input02"  minlength="6" required/>
                    </div><!-- /form column -->
                  </div><!-- /form row -->
                  <div class="form-row">
                    <!-- form column -->
                    <label for="input03" class="col-md-3">@lang('translation.confirm_password')</label> <!-- /form column -->
                    <!-- form column -->
                    <div class="col-md-9 mb-3">
                        <input type="password" class="form-control" name="conf_password" id="input02"  minlength="6" required/>
                        <div id="message"></div>
                    </div>
                    <!-- /form column -->
                  </div><!-- /form row -->

                  <hr>
                  <!-- .form-actions -->
                  <div class="form-actions">
                    <button type="button" class="btn btn-primary ml-auto" id="change_password">@lang('translation.change_password')</button>
                  </div><!-- /.form-actions -->
                </form><!-- /form -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->

          </div><!-- /grid column -->
        </div><!-- /grid row -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div>

@include('admin.settings.js.change-password')
@endsection
