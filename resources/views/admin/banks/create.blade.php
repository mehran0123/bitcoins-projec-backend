@extends('layouts.master')
@section('title','Bank list')
@section('bank','has-active')
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
        <li class="breadcrumb-item ">
            <a href="{{ URL::to('/trade-center/dashboard') }}"></i>@lang('translation.dashboard')</a>
        </li>
        <li class="breadcrumb-item">
            <a href="{{ route('bank.list') }}">Bank Settings</a>
          </li>
        <li class="breadcrumb-item active">
          <a href="#">Create</a>
        </li>
      </ol>
    </nav><!-- /.breadcrumb -->
    <!-- title -->

  </header><!-- /.page-title-bar -->
  <div class="card">
    <!-- .card-body -->
    <div class="card-body">
      <h4 class="card-title"> Create Bank
      <a href="{{ route('bank.list') }}" class="btn btn-primary text-white btn-sm pull-right">@lang('translation.back')</a>
    </h4><!-- form .needs-validation -->
      <form method="post" onsubmit="return false">
     <div class="form-row">
        <div class="col-md-6">
            <label for="type">Type</label>
            <select class="form-control" id="type">
                <option value="0">select account type</option>
                <option value="1">Local bank</option>
                <option value="2">Binance</option>
                <option value="3">Coin Base</option>
                <option value="4">Perfect Money</option>
                <option value="5">Skril</option>
                <option value="6">Paypal</option>
                <option value="7">Wechat</option>
                <option value="8">Amazon Pay</option>
                <option value="9">Google Pay</option>
                <option value="10">Apple Pay</option>
                <option value="11">American Express</option>
                <option value="12">Stripe</option>
                <option value="13">Square</option>
                <option value="14">Visa Checkout</option>
            </select>
            <small id="type_error" class="text-danger"></small>
        </div>
        <div class="col-md-6">
            <label for="title">Account Title</label>
            <input type="text" id="account_title" placeholder="Enter Account Title" class="form-control"/>
            <small id="account_title_error" class="text-danger"></small>
        </div>
    </div>
        <div class="row">
            <div class="col-md-6 mt-2">
                <label for="account_no">Account No</label>
                <input type="number" placeholder="Enter your account no" class="form-control" id="account_no">
                <small id="account_no_error" class="text-danger"></small>
            </div>
            <div class="col-md-6 mt-2">
                <label for="transection_fee">Transection Fee</label>
                <input type="number" placeholder="Enter transection fee" class="form-control" id="transection_fee">
                <small id="transection_fee_error" class="text-danger"></small>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12">
               <textarea class="form-control"  placeholder="Enter Other Details" id="other_details"></textarea>
               <small id="other_details_error" class="text-danger"></small>
            </div>
        </div>
        <br>
    <button class="btn btn-primary btn-lg btn-block" id="add_bank">Create</button>
  </form><!-- /form .needs-validation -->
</div><!-- /.card-body -->
  </div>
</div>
</div>
@include('admin.banks.js.create')
@endsection
