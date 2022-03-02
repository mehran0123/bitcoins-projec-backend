@extends('layouts.master')
@section('title','Edit Privacy Policy')
@section('privacy-policy','has-active')
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
        <li class="breadcrumb-item active">
            <a href="{{ URL::to('/trade-center/dashboard') }}"></i>@lang('translation.dashboard')</a>
          </li>
            <li class="breadcrumb-item active">
              <a href="{{ route('privacy-policy.list') }}">Privacy Policy List</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="">Edit Privacy Policy</a>
              </li>
      </ol>
    </nav><!-- /.breadcrumb -->
    <!-- title -->

  </header><!-- /.page-title-bar -->
  <div class="card">
    <!-- .card-body -->
    <div class="card-body">
      <h4 class="card-title"> Edit Privacy Policy
      <a href="{{ route('admin') }}" class="btn btn-primary text-white btn-sm pull-right float-right">@lang('translation.back')</a>
    </h4><!-- form .needs-validation -->

      <form method="post" onsubmit="return false">
          <!-- .form-row -->
          <div class="form-row">
                <!-- grid column -->
            <div class="col-md-12 mb-3">
                <label for="details">Privacy policy</label>
                <textarea name="details" id="details" rows="5" cols="15" class="form-control">{{ $privacy->details }}</textarea>
                <small id="details_error" class="text-danger"></small>
              </div><!-- /grid column -->
          </div><!-- /.form-row -->
        <button class="btn btn-primary btn-lg btn-block" id="edit_privacy_policy">Update Privacy policy</button>
      </form><!-- /form .needs-validation -->
    </div><!-- /.card-body -->
  </div>
    </div></div>
    @include('admin.privacy-policy.js.edit')
    @endsection
