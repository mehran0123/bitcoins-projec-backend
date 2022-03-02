@extends('layouts.master')
@section('title','Create Deposit Record')
@section('deposist','has-active')

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
            <a href="{{ URL::to('/trade-center/dashboard') }}"></i>@lang('translation.dashboard')</a>
          </li>
            <li class="breadcrumb-item active">
              <a href="{{ route('deposits.list') }}">Deposits List</a>
            </li>
            <li class="breadcrumb-item active">
                <a href="">Add Deposit Record</a>
              </li>
      </ol>
    </nav><!-- /.breadcrumb -->
    <!-- title -->
  </header><!-- /.page-title-bar -->
  <div class="card">
    <!-- .card-body -->
    <div class="card-body">
      <h4 class="card-title">Add Deposit Record
      <a href="{{ route('deposits.list') }}" class="btn btn-primary text-white btn-sm pull-right float-right">@lang('translation.back')</a>
    </h4><!-- form .needs-validation -->
    <form method="post" onsubmit="return false">
        <!-- .form-row -->
        <div class="form-row">
            <div class="col-md-6 mb-3">
                <label for="name">Deposit Method</label>
                {{-- <select id="bank_id" class="form-control">
                    <option value="">Select deposit method</option>
                    @foreach ($banks as $bank)
                    <option value="{{ $bank->id }}">
                        {{ $bank->type }}
                    </option>
                    @endforeach
                </select> --}}
                <select class="form-control" id="bank_id">
                    <option value="0">Select method type</option>
                    <option value="Local bank">Local bank</option>
                    <option value="Binance">Binance</option>
                    <option value="Coin Base">Coin Base</option>
                    <option value="Perfect Money">Perfect Money</option>
                    <option value="Skril">Skril</option>
                    <option value="Paypal">Paypal</option>
                    <option value="Wechat">Wechat</option>
                    <option value="Amazon Pay">Amazon Pay</option>
                    <option value="Google Pay">Google Pay</option>
                    <option value="Apple Pay">Apple Pay</option>
                    <option value="American Express">American Express</option>
                    <option value="Stripe">Stripe</option>
                    <option value="Square">Square</option>
                    <option value="Visa Checkout">Visa Checkout</option>
                </select>
                {{-- <input type="number" class="form-control" id="deposit_amount" name="deposit_amount" autofocus> --}}
                <small id="bank_id_error" class="text-danger"></small>
            </div>
          <div class="col-md-6 mb-3">
              <label for="name">Deposit Amount</label>
              <input type="number" class="form-control" id="deposit_amount" name="deposit_amount" autofocus>
              <small id="deposit_amount_error" class="text-danger"></small>
          </div>
        </div><!-- /.form-row -->
        <div class="col-md-12 col-lg-12 mb-4">
            <label class="mr-2">Slip Image</label>
            <div class="group-contain" style="
               display: flex;
               ">
               <div class="btn btn-secondary fileinput-button" style="line-height: 2;height: 50px;">
                  <i class="fa fa-plus fa-fw"></i> <span>Add File</span>
                  <input id="slip-image" type="file" name="file-one" accept="image/*">
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
      <button class="btn btn-primary btn-lg btn-block" type="button" id="add_deposit">Add Deposit Record</button>
    </form><!-- /form .needs-validation -->
    </div><!-- /.card-body -->
  </div>
    </div></div>
    @include('admin.deposits.js.create')
    @endsection
