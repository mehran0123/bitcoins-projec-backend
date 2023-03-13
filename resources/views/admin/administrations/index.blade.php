@extends('layouts.master')
@section('title', 'Administration list')
@section('administrations-has-open', 'has-open has-active')
@section('administration', 'has-active')
<style>
    i {
        cursor: pointer;
    }

    .img-fluid {
        width: 60px !important;
        height: 60px !important;
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
                        <li class="breadcrumb-item">
                            <a href="{{ URL::to('/admin/dashboard') }}"></i>@lang('translation.dashboard')</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="#">Manage Administration</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="{{ route('administration.list') }}">Administration</a>
                        </li>
                    </ol>
                </nav><!-- /.breadcrumb -->
                <!-- title -->
                <h1 class="page-title">Administration List
                    <a href="{{ route('administration.create') }}" class="btn btn-sm btn-success float-right">Create</a>
                </h1>

            </header><!-- /.page-title-bar -->
            <!-- .page-section -->
            <div class="page-section">
                <!-- .card -->
                <div class="card card-fluid" id="partial-div">
                    <!-- .card-body -->
                    <div class="card-body">
                        <!-- .table -->
                        <table id="data-table" class="table dt-responsive nowrap w-100">
                            <thead>
                                <tr>
                                    <th class="text-left"> ID </th>
                                    <th> Name </th>
                                    <th> Email </th>
                                    {{-- <th > Password </th> --}}
                                    <th> Role </th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Action </th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (count($administrations) > 0)
                                    @foreach ($administrations as $key => $user)
                                        <tr>
                                            <td>{{ ++$key }}</td>
                                            <td>{{ $user->name }}</td>
                                            <td>{{ $user->email }}</td>
                                            {{-- <td>{{ $user->c_password }}</td> --}}
                                            <td>
                                                @if ($user->user_role == 3)
                                                    {{ 'Admin' }}
                                                @elseif($user->user_role == 4)
                                                    {{ 'Standard User' }}
                                                @elseif($user->user_role == 5)
                                                    {{ 'Basic User' }}
                                                @elseif($user->user_role == 6)
                                                    {{ 'Accountant' }}
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <input type="hidden" name="id" value="{{ $user->id }}">
                                                @if ($user->is_active == 1)
                                                    <i class="material-icons text-success" id="change_status">check_box</i>
                                                @else
                                                    <i class="material-icons text-danger"
                                                        id="change_status">check_box_outline_blank</i>
                                                @endif
                                            </td>
                                            <td class="align-middle text-center">
                                                <a href="{{ route('administration.edit', ['id' => $user->id]) }}"
                                                    class="btn btn-sm btn-icon btn-secondary">
                                                    <i class="fa fa-pencil-alt text-primary"
                                                        style="padding-top: 7px !important"></i>
                                                </a>
                                                <a href="#">
                                                    <span class="sr-only">Edit</span></a> <a href="#"
                                                    id="delete_administration" class="btn btn-sm btn-icon btn-secondary">
                                                    <i class="far fa-trash-alt"
                                                        style="padding-top: 7px !important;color:red"></i> <span
                                                        class="sr-only">Remove</span>
                                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @endif
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th class="text-left"> ID </th>
                                    <th> Name </th>
                                    <th class="text-center"> Status </th>
                                    <th class="text-center"> Action </th>
                            </tfoot>
                        </table><!-- /.table -->
                    </div><!-- /.card-body -->


                </div><!-- /.card -->
            </div><!-- /.page-section -->
        </div><!-- /.page-inner -->
    </div><!-- /.page -->
    </div>
    @include('admin.countries.js.index')
@endsection
