@extends('layouts.master')
@section('title','Administration list')
@section('administrations-has-open','has-open has-active')
@section('administration','has-active')
@section('content')
<style>
    small{
        font-size: 95% !important;
    }
</style>
<div class="page">
    <!-- .page-inner -->
    <div class="page-inner">
<header class="page-title-bar">
    <!-- .breadcrumb -->
    <nav aria-label="breadcrumb">
      <ol class="breadcrumb">
        <li class="breadcrumb-item ">
            <a href="{{ URL::to('/admin/dashboard') }}"></i>@lang('translation.dashboard')</a>
        </li>
        <li class="breadcrumb-item">
            <a href="#">Manage Administrations</a>
          </li>
          <li class="breadcrumb-item active">
            <a href="{{ route('administration.list') }}">Administrations</a>
          </li>
        <li class="breadcrumb-item active">
          <a href="#">Create</a>
        </li>
      </ol>
    </nav><!-- /.breadcrumb -->
    <!-- title -->

  </header><!-- /.page-title-bar -->
  <div class="card">
    <!-- .card-body -->
    <div class="card-body">
      <h4 class="card-title"> Update Administration
      <a href="{{ route('administration.list') }}" class="btn btn-primary text-white btn-sm pull-right">@lang('translation.back')</a>
    </h4><!-- form .needs-validation -->
      <form method="post" onsubmit="return false">
     <div class="form-row">
        <div class="col-md-6">
            <label for="user_role">User Role</label>
            <select class="form-control" name="user_role" id="user_role">
                <option value="0">Select User</option>
                <option value="3" @if($user->user_role == 3) {{ 'selected' }} @endif>Admin User</option>
                <option value="4" @if($user->user_role == 4) {{ 'selected' }} @endif>Standard User</option>
                <option value="5" @if($user->user_role == 5) {{ 'selected' }} @endif>Basic User</option>
                <option value="6" @if($user->user_role == 6) {{ 'selected' }} @endif>Acountant</option>
            </select>
            <small id="user_role_error" class="text-danger"></small>
        </div>
        <div class="col-md-6">
            <label for="name">User Name</label>
            <input type="text" placeholder="Enter User Name" value="{{ $user->name }}" class="form-control" id="name">
            <small id="name_error" class="text-danger"></small>
        </div>
    </div>
        <div class="row">
            <div class="col-md-6">
                <label for="email">User Eamil</label>
                <input type="email" placeholder="Enter User email" value="{{ $user->email }}" class="form-control" id="email">
                <small id="email_error" class="text-danger"></small>
            </div>
            <div class="col-md-6">
                <label for="phone">User Phone</label>
                <input type="number" value="{{ $user->phone }}" placeholder="Enter User phone number" class="form-control" id="phone">
                <small id="phone_error" class="text-danger"></small>
            </div>
        </div>
        <div class="row">
            <div class="col-md-5 col-lg-5 mb-3">
                <label for="password">Password<button class="btn btn-success btn-sm" id="generate_password" style="padding: 2px 12px 2px 12px !important"><span class="fa fa-plus"></span> Generate</button></label>
                <input type="password" value="{{ $user->c_password }}" class="form-control" name="password" id="password" placeholder="Enter password" autofocus/>
                <span class="form-text text-danger" id="password_error"></span>
            </div>
            <div class="col-md-5 col-lg-5 mb-3">
                <label for="confirm_password">Confirm Password</label>
                <input type="password" class="form-control" value="{{ $user->c_password }}" name="confirm_password" id="confirm_password" placeholder="Enter confirm password"/>
                <span class="form-text text-danger" id="confirm_password_error"></span>
            </div>
            <div class="col-md-2 col-lg-2 mb-2 mt-4">
                <input type="checkbox" onclick="passwordShowHide()">Show Password
            </div>
           </div>
        <br>
    <button class="btn btn-primary btn-lg btn-block" id="edit_administration">Update</button>
  </form><!-- /form .needs-validation -->
</div><!-- /.card-body -->
  </div>
</div>
</div>
@include('admin.administrations.js.edit')
@endsection
