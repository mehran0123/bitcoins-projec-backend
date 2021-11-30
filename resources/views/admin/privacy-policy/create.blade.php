@extends('layouts.master')
@section('title','Create Privacy Policy')
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
            <a href="{{ URL::to('/admin/dashboard') }}"></i>@lang('translation.dashboard')</a>
          </li>
            <li class="breadcrumb-item active">
              <a href="{{ route('categories.list') }}">@lang('translation.categories')</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="">Add Privacy Policy</a>
              </li>
      </ol>
    </nav><!-- /.breadcrumb -->
    <!-- title -->
  </header><!-- /.page-title-bar -->
  <div class="card">
    <!-- .card-body -->
    <div class="card-body">
      <h4 class="card-title">Add Privacy Policy
      <a href="{{ route('admin') }}" class="btn btn-primary text-white btn-sm pull-right float-right">@lang('translation.back')</a>
    </h4><!-- form .needs-validation -->
    <form method="post" onsubmit="return false">
        <!-- .form-row -->
        <div class="form-row">
          <div class="col-md-12 mb-3">
              <label for="name">Privacy Policy</label>
              <textarea name="details" class="form-control" id="details" cols="10" rows="5" autofocus></textarea>
              <small id="details_error" class="text-danger"></small>
          </div>
        </div><!-- /.form-row -->
     <hr>
      <button class="btn btn-primary btn-lg btn-block" type="button" id="add_privacy_policy">Add Privacy Policy</button>
    </form><!-- /form .needs-validation -->
    </div><!-- /.card-body -->
  </div>
    </div></div>
    @include('admin.privacy-policy.js.create')
    @endsection
