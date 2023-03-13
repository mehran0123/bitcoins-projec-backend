@extends('layouts.master')
@section('title', 'Create Slider')
@section('sliders', 'has-active')


@section('content')
    <style>
        small {
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
                            <a href="{{ route('sliders.list') }}">Sliders</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="">Add Slider</a>
                        </li>
                    </ol>
                </nav><!-- /.breadcrumb -->
                <!-- title -->
            </header><!-- /.page-title-bar -->
            <div class="card">
                <!-- .card-body -->
                <div class="card-body">
                    <h4 class="card-title">Add Slider
                        <a href="{{ route('sliders.list') }}"
                            class="btn btn-primary text-white btn-sm pull-right float-right">@lang('translation.back')</a>
                    </h4><!-- form .needs-validation -->
                    <form method="post" onsubmit="return false">
                        <!-- .form-row -->
                        <div class="col-md-12 col-lg-12 mb-4">
                            <label class="mr-2">Slider Image</label>
                            <div class="group-contain" style="
                   display: flex;
                   ">
                                <div class="btn btn-secondary fileinput-button" style="line-height: 2;height: 50px;">
                                    <i class="fa fa-plus fa-fw"></i> <span>Add File</span>
                                    <input id="fileupload-btn-one" type="file" name="file-one" accept="image/*">
                                </div>
                                <div class="form-group" style="display: block;margin: 0 auto;">
                                    <div id="uploadList" class="list-group list-group-flush list-group-divider"
                                        style="margin: auto;">
                                        <img src="#" alt="Preview Image" id="blah-one" class="d-none"
                                            height="100px">
                                    </div>
                                </div>
                            </div>
                            <!-- /.form-group -->
                            <small id="image_one_error" class="text-danger"></small>
                        </div>
                        <hr>
                        <button class="btn btn-primary btn-lg btn-block" type="button" id="add_slider">Add Slider</button>
                    </form><!-- /form .needs-validation -->
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
    @include('admin.sliders.js.create')
@endsection
