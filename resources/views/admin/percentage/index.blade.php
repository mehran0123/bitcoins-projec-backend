@extends('layouts.master')
@section('title', 'Percentage List')
@section('percentage', 'has-active')
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
                            <a href="">Percentage</a>
                        </li>
                    </ol>
                </nav><!-- /.breadcrumb -->
                <!-- title -->
                <h1 class="page-title"> Percentage
                    <a href="{{ route('percentage.create') }}" class="btn btn-sm btn-success float-right">
                        Add Percentage
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
                                    <th> Percentage</th>
                                    <th> Date</th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody id="partial-view">
                                @if (count($percentages) > 0)
                                    @foreach ($percentages as $key => $percentage)
                                        <tr id="row_{{ $percentage->id }}">
                                            <td class="text-left">{{ $percentage->id }}</td>
                                            <td>
                                                {{ $percentage->amount }}
                                            </td>
                                            <td>
                                                {{ $percentage->current_dat }}
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ URL::to('/admin/percentage/edit') }}/{{ $percentage->id }}"
                                                    id="update_percentage" class="btn btn-sm btn-icon btn-secondary"
                                                    data-toggle="tooltip" title="Edit percentage">
                                                    <i class="fa fa-pencil-alt text-primary"
                                                        style="padding-top: 7px !important"></i>
                                                </a>
                                                <a href="#">
                                                    <span class="sr-only">Edit</span>
                                                </a>
                                                {{-- <a href="#" id="delete_percentage" class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip" title="Delete percentage">
            <i class="far fa-trash-alt" style="padding-top: 7px !important;color:red"></i> <span class="sr-only">Remove</span>
            <input type="hidden" name="id" value="{{ $percentage->id }}">
          </a> --}}
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-left"> ID </th>
                                    <th>Percentage</th>
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

    @include('admin.percentage.js.index')
@endsection
