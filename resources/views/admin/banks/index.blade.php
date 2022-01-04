@extends('layouts.master')
@section('title','Bank list')
{{-- @section('banks-has-open','has-open has-active') --}}
@section('bank','has-active')
<style>
    i{
        cursor: pointer;
    }
    .img-fluid{
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
                <a href="{{ URL::to('/trade-center/dashboard') }}"></i>@lang('translation.dashboard')</a>
              </li>
              <li class="breadcrumb-item active">
                <a href="{{ route('bank.list') }}">banks Setting</a>
              </li>
          </ol>
        </nav><!-- /.breadcrumb -->
        <!-- title -->
        <h1 class="page-title">Bank List
            <a href="{{ route('bank.createView') }}" class="btn btn-sm btn-success float-right">Create</a>
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
            <th> Title </th>
            <th> Type </th>
            <th> Account No. </th>
            <th> Transection Fee</th>
            <th class="text-center"> Status </th>
            <th class="text-center"> Action </th>
        </tr>
      </thead>
      <tbody>
        @if (count($banks) > 0)
        @foreach ($banks as $key => $bank)
        <tr>
            <td>{{ ++$key }}</td>
            <td>{{ $bank->title}}</td>
            <td>
                {{ $bank->type }}
            </td>
            <td>{{ $bank->account_no }}</td>
            <td>{{ $bank->transection_fee !='' ?  $bank->transection_fee : 0 }}</td>
            <td class="text-center">
                <input type="hidden" name="id" value="{{ $bank->id }}">
                @if ($bank->is_active == 1)
                <i class="material-icons text-success"  id="change_status">check_box</i>
                @else
                <i class="material-icons text-danger" id="change_status">check_box_outline_blank</i>
                @endif
            </td>
            <td class="align-middle text-center">
                <a href="{{ route('bank.edit', ['id' => $bank->id]) }}" class="btn btn-sm btn-icon btn-secondary">
                    <i class="fa fa-pencil-alt text-primary" style="padding-top: 7px !important"></i>
                </a>
                <a href="#">
                    <span class="sr-only">Edit</span>
                </a>
                 {{-- <a href="#" id="delete_bank" class="btn btn-sm btn-icon btn-secondary">
                        <i class="far fa-trash-alt" style="padding-top: 7px !important;color:red"></i> <span class="sr-only">Remove</span>
                        <input type="hidden" name="id" value="{{ $bank->id }}">
                    </a> --}}
              </td>
        </tr>
        @endforeach
        @endif
      </tbody>
      <tfoot>
        <tr>
            <th class="text-left"> ID </th>
            <th> Title </th>
            <th> Type </th>
            <th> Account No. </th>
            <th> Transection Fee</th>
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
@include('admin.banks.js.index')
@endsection


