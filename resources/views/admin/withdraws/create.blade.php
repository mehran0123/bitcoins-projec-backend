@extends('layouts.master')
@section('title', 'Create Withdraw Record')
@section('deposist', 'has-active')

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
                            <a href="{{ route('deposits.list') }}">Withdraw List</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="">Add Withdraw Record</a>
                        </li>
                    </ol>
                </nav><!-- /.breadcrumb -->
                <!-- title -->
            </header><!-- /.page-title-bar -->
            <div class="card">
                <!-- .card-body -->
                <div class="card-body">
                    <h4 class="card-title">Add Withdraw Record
                        <a href="{{ route('deposits.list') }}"
                            class="btn btn-primary text-white btn-sm pull-right float-right">@lang('translation.back')</a>
                    </h4><!-- form .needs-validation -->
                    <form method="post" onsubmit="return false">
                        <!-- .form-row -->
                        <div class="form-row">
                            <div class="col-md-6 mb-3">
                                <label for="name">Withdraw Amount</label>
                                <input type="number" class="form-control" id="withdraw_amount" name="withdraw_amount"
                                    autofocus>
                                <small id="withdraw_amount_error" class="text-danger"></small>
                            </div>
                            <div class="col-md-6 mb-3">
                                <label for="name">Withdraw type</label>
                                <input type="text" class="form-control" id="withdraw_type" name="withdraw_type">
                                <small id="withdraw_type_error" class="text-danger"></small>
                            </div>
                        </div><!-- /.form-row -->

                        <hr>
                        <button class="btn btn-primary btn-lg btn-block" type="button" id="add_withdraw">Add Withdraw
                            Record</button>
                    </form><!-- /form .needs-validation -->
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
    @include('admin.withdraws.js.create')
@endsection
