@extends('layouts.master')
@section('title','Users list')
{{-- @section('administrations-has-open','has-open has-active') --}}
@section('users','has-active')
@section('content')
<style>
    small{
        font-size: 95% !important;
    }
</style>
    <!-- .page-inner -->
    <div class="page-inner">
<header class="page-title-bar">
    <!-- .breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item ">
            <a href="{{ URL::to('/trade-center/dashboard') }}"></i>@lang('translation.dashboard')</a>
        </li>
        @if ( Auth::user()->user_role == 2)
        <li class="breadcrumb-item active">
            <a href="#">My Profile</a>
          </li>
        <li class="breadcrumb-item active">
          <a href="#">Edit Profile</a>
        </li>
        @else
        <li class="breadcrumb-item">
            <a href="#">Manage Users </a>
          </li>
          <li class="breadcrumb-item active">
            <a href="{{ route('users.list') }}">Users</a>
          </li>
        <li class="breadcrumb-item active">
          <a href="#">Edit</a>
        </li>
        @endif
        </ol>
    </nav><!-- /.breadcrumb -->
    <!-- title -->

  </header><!-- /.page-title-bar -->
  <div class="card">
    <!-- .card-body -->
    <div class="card-body">
      <h4 class="card-title"> Edit Profile
      <a href="{{ route('users.list') }}" class="btn btn-primary text-white btn-sm pull-right">@lang('translation.back')</a>
    </h4><!-- form .needs-validation -->
      <form method="post" onsubmit="return false">
     <div class="form-row">
        <div class="col-md-6">
            <label for="first_name">First Name</label>
            <input type="text" id="first_name" value="{{ $user->first_name }}" placeholder="Enter First Name" class="form-control"/>
            <small id="first_name_error" class="text-danger"></small>
        </div>
        <div class="col-md-6">
            <label for="first_name">Last Name</label>
            <input type="text" placeholder="Enter Last Name" value="{{ $user->last_name }}" class="form-control" id="last_name">
            <small id="last_name_error" class="text-danger"></small>
        </div>
    </div>
        <div class="row">

            <div class="col-md-4   @if(Auth::user()->user_role ==2) d-none  @endif">
                <label for="email">Eamil</label>
                <input type="email" placeholder="Enter your email" value="{{ $user->email }}" class="form-control" id="email">
                <small id="email_error" class="text-danger"></small>
            </div>

            <div class="col-md-4">
                <label for="phone">Phone No.</label>
                <input type="number" value="{{ $user->phone }}" placeholder="Enter User phone number" class="form-control" id="phone">
                <small id="phone_error" class="text-danger"></small>
            </div>
            <div class="col-md-4">
                <label for="cnic_number">CNIC No.</label>
                <input type="text" value="{{ $user->id_card_number }}" placeholder="Enter CNIC number" class="form-control" id="cnic_number">
                <small id="cnic_number_error" class="text-danger"></small>
            </div>

        </div>
        <div class="row mt-2">
            <div class="col-md-5 col-lg-5 mb-3">
                <label for="password">Password</label>
                <input type="password" class="form-control" value="{{ $user->real_password }}"  name="password" id="password" placeholder="Enter password" autofocus/>
                <span class="form-text text-danger" id="password_error"></span>
            </div>
            <div class="col-md-5 col-lg-5 mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" value="{{ $user->real_password }}" name="confirm_password" id="confirm_password" placeholder="Enter confirm password"/>
                <span class="form-text text-danger" id="confirm_password_error"></span>
            </div>
            <div class="col-md-2 col-lg-2 mb-2 mt-4">
                {{-- <input type="checkbox" onclick="passwordShowHide()">Show Password --}}
            </div>
        </div>
        <div class="col-md-12 col-lg-12 mb-4">
            <label class="mr-2">Profile Image</label>
            <div class="group-contain" style="display: flex;">
               <div class="btn btn-secondary fileinput-button" style="line-height: 2;height: 50px;">
                  <i class="fa fa-plus fa-fw"></i> <span>Add File</span>
                  <input id="fileupload-btn-one" type="file" name="file-one" accept="image/*">
               </div>
               <div class="form-group" style="display: block;margin: 0 auto;">
                  <div id="uploadList" class="list-group list-group-flush list-group-divider" style="margin: auto;">
                    <img src="{{ asset('/storage/app') }}/{{ $user->image }}" alt="Preview Image" id="blah-one" height="100px">
                  </div>
               </div>
            </div>
            <!-- /.form-group -->
            <small id="image_one_error" class="text-danger"></small>
    </div>
        <br>
    <button class="btn btn-primary btn-lg btn-block" id="edit_user">Edit</button>
  </form><!-- /form .needs-validation -->
</div><!-- /.card-body -->
  </div>
</div>
@include('admin.users.js.edit')
@endsection
