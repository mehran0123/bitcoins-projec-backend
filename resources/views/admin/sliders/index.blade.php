@extends('layouts.master')
@section('title', 'Sliders List')
@section('sliders', 'has-active')
<style>
    i {
        cursor: pointer;
    }
</style>
@section('content')
    <!-- .page -->
    <div class="page">
        <!-- .page-inner -->
        <div class="page-inner">
            <!-- .page-title-bar -->
            <header class="page-title-bar">
                <!-- .breadcrumb -->
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item active">
                            <a href="{{ URL::to('/admin/dashboard') }}"></i>@lang('translation.dashboard')</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="">Sliders List</a>
                        </li>
                    </ol>
                </nav><!-- /.breadcrumb -->
                <!-- title -->
                <h1 class="page-title"> Slider List
                    <a href="{{ route('sliders.createView') }}" class="btn btn-sm btn-success float-right">
                        Add Slider
                    </a>
                </h1>
            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid">
                    <!-- .card-body -->
                    <div class="card-body">
                        <!-- .table -->
                        <table id="data-table" class="datatable table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-left"> ID </th>
                                    <th>Image</th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody id="partial-view">
                                @if (count($sliders) > 0)
                                    @foreach ($sliders as $key => $slider)
                                        <tr id="row_{{ $slider->id }}">
                                            <td class="text-left">{{ ++$key }}</td>
                                            <td>
                                                <img src="{{ asset('/storage/app') }}/{{ $slider->image }}" height="50px">
                                            </td>
                                            <td class="text-center">
                                                <input type="hidden" name="id" value="{{ $slider->id }}">
                                                @if ($slider->status == 1)
                                                    <i class="material-icons text-success" id="change_status">check_box</i>
                                                @else
                                                    <i class="material-icons text-danger"
                                                        id="change_status">check_box_outline_blank</i>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ URL::to('admin/sliders/edit') }}/{{ $slider->id }}"
                                                    id="update_catgory-missing" class="btn btn-sm btn-icon btn-secondary"
                                                    data-toggle="tooltip" title="Edit Course">
                                                    <i class="fa fa-pencil-alt text-primary"
                                                        style="padding-top: 7px !important"></i>
                                                </a>
                                                <a href="#">
                                                    <span class="sr-only">Edit</span>
                                                </a>
                                                <a href="#" id="delete_slider"
                                                    class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip"
                                                    title="Delete Slider">
                                                    <i class="far fa-trash-alt"
                                                        style="padding-top: 7px !important;color:red"></i> <span
                                                        class="sr-only">Remove</span>
                                                    <input type="hidden" name="id" value="{{ $slider->id }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-left"> ID </th>
                                    <th>Image</th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </tfoot>
                        </table><!-- /.table -->
                    </div><!-- /.card-body -->
                </div><!-- /.card -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
    </div>

    @include('admin.sliders.js.index')
@endsection
