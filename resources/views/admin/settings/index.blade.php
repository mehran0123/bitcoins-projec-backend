@extends('layouts.master')
@section('title','Profile Settings')
@section('settings','active')
@section('profile','active')
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
              <a href="{{ URL::to('admin/profile/settings') }}"><i class="breadcrumb-icon fa fa-angle-left mr-2"></i>@lang('translation.settings')</a>
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
              <h6 class="card-header"> @lang('translation.public_profile') </h6><!-- .card-body -->
              <div class="card-body">
                <!-- .media -->
                <div class="media mb-3">
                  <!-- avatar -->
                  <div class="user-avatar user-avatar-xl fileinput-button">
                    <div class="fileinput-button-label"> @lang('translation.change_photo') </div><img id="blash"  src="{{ URL::to('/storage/app') }}/{{ Auth::user()->image }}" alt=""> <input id="fileupload-avatar" type="file" name="avatar">
                  </div><!-- /avatar -->
                  <!-- .media-body -->
                  <div class="media-body pl-3">
                    <h3 class="card-title"> {{ Auth::user()->name }} </h3>
                    <h6 class="card-subtitle text-muted"> @lang('translation.avtar_instruction') </h6>
                    <p class="card-text">
                      <small>JPG, GIF or PNG 400x400, &lt; 2 MB.</small>
                    </p><!-- The avatar upload progress bar -->
                    <div id="progress-avatar" class="progress progress-xs fade">
                      <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuemin="0" aria-valuemax="100"></div>
                    </div><!-- /avatar upload progress bar -->
                  </div><!-- /.media-body -->
                </div><!-- /.media -->
                <!-- form -->
                <form method="post" action="#">
                  <div class="form-row">
                    <!-- form column -->
                    <label for="input02" class="col-md-3">@lang('translation.username')</label> <!-- /form column -->
                    <!-- form column -->
                    <div class="col-md-9 mb-3">
                      <input type="text" class="form-control" name="name" id="input02" value="{{ Auth::user()->name }}" required/>
                    </div><!-- /form column -->
                  </div><!-- /form row -->
                  <!-- form row -->
                  <div class="form-row">
                    <!-- form column -->
                    <label for="input03" class="col-md-3">@lang('translation.email')</label> <!-- /form column -->
                    <!-- form column -->
                    <div class="col-md-9 mb-3">
                        <input type="email" class="form-control" name="email" id="input02" value="{{ Auth::user()->email }}" required/>
                        <div id="message"></div>
                    </div><!-- /form column -->
                  </div><!-- /form row -->
                  <!-- form row -->
                  {{-- <div class="form-row">
                    <!-- form column -->
                    <label for="input04" class="col-md-3">Available for hire?</label> <!-- /form column -->
                    <!-- form column -->
                    <div class="col-md-9 mb-3">
                      <div class="custom-control custom-checkbox">
                        <input type="checkbox" class="custom-control-input" id="input04" checked> <label class="custom-control-label" for="input04">Yes, hire me</label>
                      </div>
                    </div><!-- /form column -->
                  </div><!-- /form row --> --}}
                  <hr>
                  <!-- .form-actions -->
                  <div class="form-actions">
                    <button type="button" class="btn btn-primary ml-auto" id="update_profile">@lang('translation.update_profile')</button>
                  </div><!-- /.form-actions -->
                </form><!-- /form -->
              </div><!-- /.card-body -->
            </div><!-- /.card -->
            <!-- .card -->
            {{-- <div class="card card-fluid">
              <h6 class="card-header"> Social Networks </h6><!-- form -->
              <form method="post">
                <!-- .list-group -->
                <div class="list-group list-group-flush mt-3 mb-0">
                  <!-- .list-group-item -->
                  <div class="list-group-item">
                    <!-- .list-group-item-figure -->
                    <div class="list-group-item-figure">
                      <div class="tile tile-md bg-twitter">
                        <i class="fab fa-twitter"></i>
                      </div>
                    </div><!-- /.list-group-item-figure -->
                    <!-- .list-group-item-body -->
                    <div class="list-group-item-body">
                      <input type="text" class="form-control" id="twitter" placeholder="Twitter Username" value="@stilearningTwit">
                    </div><!-- /.list-group-item-body -->
                  </div><!-- /.list-group-item -->
                  <!-- .list-group-item -->
                  <div class="list-group-item">
                    <!-- .list-group-item-figure -->
                    <div class="list-group-item-figure">
                      <div class="tile tile-md bg-facebook">
                        <i class="fab fa-facebook-f"></i>
                      </div>
                    </div><!-- /.list-group-item-figure -->
                    <!-- .list-group-item-body -->
                    <div class="list-group-item-body">
                      <input type="text" class="form-control" id="facebook" placeholder="Facebook Username">
                    </div><!-- /.list-group-item-body -->
                  </div><!-- /.list-group-item -->
                  <!-- .list-group-item -->
                  <div class="list-group-item">
                    <!-- .list-group-item-figure -->
                    <div class="list-group-item-figure">
                      <div class="tile tile-md bg-linkedin">
                        <i class="fab fa-linkedin"></i>
                      </div>
                    </div><!-- /.list-group-item-figure -->
                    <!-- .list-group-item-body -->
                    <div class="list-group-item-body">
                      <input type="text" class="form-control" id="linkedin" placeholder="Linkedin Username">
                    </div><!-- /.list-group-item-body -->
                  </div><!-- /.list-group-item -->
                  <!-- .list-group-item -->
                  <div class="list-group-item">
                    <!-- .list-group-item-figure -->
                    <div class="list-group-item-figure">
                      <div class="tile tile-md bg-dribbble">
                        <i class="fab fa-dribbble"></i>
                      </div>
                    </div><!-- /.list-group-item-figure -->
                    <!-- .list-group-item-body -->
                    <div class="list-group-item-body">
                      <input type="text" class="form-control" id="dribbble" placeholder="Dribbble Username">
                    </div><!-- /.list-group-item-body -->
                  </div><!-- /.list-group-item -->
                  <!-- .list-group-item -->
                  <div class="list-group-item">
                    <!-- .list-group-item-figure -->
                    <div class="list-group-item-figure">
                      <div class="tile tile-md bg-github">
                        <i class="fab fa-github"></i>
                      </div>
                    </div><!-- /.list-group-item-figure -->
                    <!-- .list-group-item-body -->
                    <div class="list-group-item-body">
                      <input type="text" class="form-control" id="github" placeholder="Github Username">
                    </div><!-- /.list-group-item-body -->
                  </div><!-- /.list-group-item -->
                </div><!-- /.list-group -->
                <!-- .card-body -->
                <div class="card-body">
                  <hr>
                  <!-- .form-actions -->
                  <div class="form-actions">
                    <button type="submit" class="btn btn-primary ml-auto">Update Socials</button>
                  </div><!-- /.form-actions -->
                </div><!-- /.card-body -->
              </form><!-- /form -->
            </div><!-- /.card --> --}}
          </div><!-- /grid column -->
        </div><!-- /grid row -->
      </div><!-- /.page-section -->
    </div><!-- /.page-inner -->
  </div><!-- /.page -->
</div>
@include('admin.settings.js.index')
@endsection
