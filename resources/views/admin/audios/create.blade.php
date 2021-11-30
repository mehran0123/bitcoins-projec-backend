@extends('layouts.master')
@section('title','Create Audio')
@section('audios','has-active')


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
              <a href="{{ route('audios.list') }}">Audios</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="">Add Audio</a>
              </li>
      </ol>
    </nav><!-- /.breadcrumb -->
    <!-- title -->
  </header><!-- /.page-title-bar -->
  <div class="card">
    <!-- .card-body -->
    <div class="card-body">
      <h4 class="card-title">Add Audio
      <a href="{{ route('audios.list') }}" class="btn btn-primary text-white btn-sm pull-right float-right">@lang('translation.back')</a>
    </h4><!-- form .needs-validation -->
    <form method="post" onsubmit="return false">
        <!-- .form-row -->
        <div class="form-row">
          <div class="col-md-4 mb-3">
              <label for="name">Category Name</label>
              @if(count($categories) > 0)
                <select name="category_id" class="form-control" id="category_id">
                  @foreach ($categories as $category)
                    @if($category->name !='Meditation Courses')
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @endif
                  @endforeach
                </select>
              @endif
              <small id="category_name_error" class="text-danger"></small>
          </div>
          <div class="col-md-4 mb-3">
            <label for="name">Audio Name</label>
            <input type="text" class="form-control" id="audio_name" name="audio_name" autofocus>
            <small id="audio_name_error" class="text-danger"></small>
        </div>
        <div class="col-md-4 mb-3">
            <label for="name">Artist</label>
            <input type="text" class="form-control" id="artist" name="artist" autofocus>
            <small id="artist_error" class="text-danger"></small>
        </div>
        </div>
        <div class="row">
            <div class="col-md-12">
            <label for="name">Details</label>
                <textarea class="form-control" cols="5" rows="5" id="details"></textarea>
                 <small id="details_error" class="text-danger"></small>
            </div>
        </div><br>
        <div class="row">
            <div class="col-md-12">
                <label for="name">Select Audio File</label>
                <input type="file" name="audio" accept="audio/*" class="form-control" id="audio">
                <small id="audio_error" class="text-danger"></small>
            </div>
        </div><br>
            <div class="col-md-12 col-lg-12 mb-4">
                <label class="mr-2">Track Image</label>
                <div class="group-contain" style="
                   display: flex;
                   ">
                   <div class="btn btn-secondary fileinput-button" style="line-height: 2;height: 50px;">
                      <i class="fa fa-plus fa-fw"></i> <span>Add File</span>
                      <input id="fileupload-btn-one" type="file" name="file-one" accept="image/*">
                   </div>
                   <div class="form-group" style="
                      display: block;
                      margin: 0 auto;
                      ">
                      <div id="uploadList" class="list-group list-group-flush list-group-divider" style="margin: auto;">
                         <img src="#" alt="Preview Image" id="blah-one" class="d-none" height="100px">
                      </div>
                   </div>
                </div>
                <!-- /.form-group -->
                <small id="image_one_error" class="text-danger"></small>
        </div>
     <hr>
      <button class="btn btn-primary btn-lg btn-block" type="button" id="add_audio">Add Audio</button>
    </form><!-- /form .needs-validation -->
    </div><!-- /.card-body -->
  </div>
    </div></div>
    @include('admin.audios.js.create')
    @endsection
