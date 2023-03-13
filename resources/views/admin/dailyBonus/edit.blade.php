@extends('layouts.master')
@section('title', 'Edit Bank')
@section('bank', 'has-active')
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
                        <li class="breadcrumb-item ">
                            <a href="{{ URL::to('/admin/dashboard') }}"></i>@lang('translation.dashboard')</a>
                        </li>
                        <li class="breadcrumb-item">
                            <a href="{{ route('bank.list') }}">Bank Settings</a>
                        </li>
                        <li class="breadcrumb-item active">
                            <a href="#">Edit</a>
                        </li>
                    </ol>
                </nav><!-- /.breadcrumb -->
                <!-- title -->

            </header><!-- /.page-title-bar -->
            <div class="card">
                <!-- .card-body -->
                <div class="card-body">
                    <h4 class="card-title"> Edit Bank
                        <a href="{{ route('bank.list') }}"
                            class="btn btn-primary text-white btn-sm pull-right">@lang('translation.back')</a>
                    </h4><!-- form .needs-validation -->
                    <form method="post" onsubmit="return false">
                        <div class="form-row">
                            <div class="col-md-6">
                                <label for="type">Type</label>
                                <select class="form-control" id="type">
                                    <option value="0">select account type</option>
                                    <option value="Local bank" @if ($bank->type == 'Local bank') {{ 'selected' }} @endif>
                                        Local bank</option>
                                    <option value="Binance" @if ($bank->type == 'Binance') {{ 'selected' }} @endif>
                                        Binance</option>
                                    <option value="Coin Base" @if ($bank->type == 'Coin Base') {{ 'selected' }} @endif>
                                        Coin Base</option>
                                    <option value="Perfect Money"
                                        @if ($bank->type == 'Perfect Money') {{ 'selected' }} @endif>Perfect Money</option>
                                    <option value="Skril" @if ($bank->type == 'Skril') {{ 'selected' }} @endif>
                                        Skril</option>
                                    <option value="Paypal" @if ($bank->type == 'Paypal') {{ 'selected' }} @endif>
                                        Paypal</option>
                                    <option value="Wechat" @if ($bank->type == 'Wechat') {{ 'selected' }} @endif>
                                        Wechat</option>
                                    <option value="Amazon Pay"
                                        @if ($bank->type == 'Amazon Pay') {{ 'selected' }} @endif>Amazon Pay</option>
                                    <option value="Google Pay"
                                        @if ($bank->type == 'Google Pay') {{ 'selected' }} @endif>Google Pay</option>
                                    <option value="Apple Pay" @if ($bank->type == 'Apple Pay') {{ 'selected' }} @endif>
                                        Apple Pay</option>
                                    <option value="American Express"
                                        @if ($bank->type == 'American Express') {{ 'selected' }} @endif>American Express
                                    </option>
                                    <option value="Stripe" @if ($bank->type == 'Stripe') {{ 'selected' }} @endif>
                                        Stripe</option>
                                    <option value="Square" @if ($bank->type == 'Square') {{ 'selected' }} @endif>
                                        Square</option>
                                    <option value="Visa Checkout"
                                        @if ($bank->type == 'Visa Checkout') {{ 'selected' }} @endif>Visa Checkout
                                    </option>
                                </select>
                                <small id="type_error" class="text-danger"></small>
                            </div>
                            <div class="col-md-6">
                                <label for="title">Account Title</label>
                                <input type="text" id="account_title" value="{{ $bank->title }}"
                                    placeholder="Enter Account Title" class="form-control" />
                                <small id="account_title_error" class="text-danger"></small>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6 mt-2">
                                <label for="account_no">Account No</label>
                                <input type="number" value="{{ $bank->account_no }}" placeholder="Enter your account no"
                                    class="form-control" id="account_no">
                                <small id="account_no_error" class="text-danger"></small>
                            </div>
                            <div class="col-md-6 mt-2">
                                <label for="transection_fee">Transection Fee</label>
                                <input type="number" value="{{ $bank->transection_fee }}"
                                    placeholder="Enter transection fee" class="form-control" id="transection_fee">
                                <small id="transection_fee_error" class="text-danger"></small>
                            </div>
                        </div>
                        <br>
                        <div class="row">
                            <div class="col-md-12">
                                <textarea class="form-control" placeholder="Enter Other Details" id="other_details">{{ $bank->other_details }}</textarea>
                                <small id="other_details_error" class="text-danger"></small>
                            </div>
                        </div>
                        <br>
                        <button class="btn btn-primary btn-lg btn-block" id="edit_bank">Edit</button>
                    </form><!-- /form .needs-validation -->
                </div><!-- /.card-body -->
            </div>
        </div>
    </div>
    @include('admin.banks.js.edit')
@endsection
