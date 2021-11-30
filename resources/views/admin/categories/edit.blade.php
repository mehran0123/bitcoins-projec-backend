@extends('layouts.master')
@section('title','Edit Category')
@section('categories','has-active')
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
              <a href="{{ route('categories.list') }}">Categories List</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="">Edit Category</a>
              </li>
      </ol>
    </nav><!-- /.breadcrumb -->
    <!-- title -->

  </header><!-- /.page-title-bar -->
  <div class="card">
    <!-- .card-body -->
    <div class="card-body">
      <h4 class="card-title"> Edit Category
      <a href="{{ route('categories.list') }}" class="btn btn-primary text-white btn-sm pull-right float-right">@lang('translation.back')</a>
    </h4><!-- form .needs-validation -->

      <form method="post" onsubmit="return false">
          <!-- .form-row -->
          <div class="form-row">
                <!-- grid column -->
            <div class="col-md-12 mb-3">
                <label for="category_name">Category Name</label>
                <input type="text" class="form-control" id="category_name" name="category_name" value="{{ $category->name }}" autofocus>
                <small id="edit_category_name_error" class="text-danger"></small>
              </div><!-- /grid column -->
          </div><!-- /.form-row -->
        <button class="btn btn-primary btn-lg btn-block" id="edit_category">Update Category</button>
      </form><!-- /form .needs-validation -->
    </div><!-- /.card-body -->
  </div>
    </div></div>
    @include('admin.categories.js.edit')
    @endsection
