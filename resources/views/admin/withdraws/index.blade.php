@extends('layouts.master')
@section('title','Withdraw List')
@section('deposist','has-active')
<style>
    i{
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
                <a href="{{ URL::to('/trade-center/dashboard') }}"></i>@lang('translation.dashboard')</a>
              </li>
                <li class="breadcrumb-item active">
                  <a href="">Withdraw List</a>
                </li>
          </ol>
        </nav><!-- /.breadcrumb -->
        <!-- title -->
        <h1 class="page-title"> Withdraw List
            <a href="{{ route('deposits.createView') }}" class="btn btn-sm btn-success float-right">
                Add Withdraw
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
          <th>Amount</th>
          <th>Slip</th>
          <th class="text-center"> Status </th>
          <th class="text-center"> Action </th>
        </tr>
      </thead>
      <tbody id="partial-view">
        @if (count($deposits) > 0)
@foreach ($deposits as $key => $deposit)
  @if( $deposit->name != 'Meditation Courses')
  <tr id="row_{{ $deposit->id }}">
      <td class="text-left">{{ ++$key }}</td>
       <td>
        {{ $deposit->amount }}
       </td>
       <td>
        <img src="{{ asset('/storage/app') }}/{{ $deposit->slip }}" height="50px">
       </td>
      <td class="text-center">
          <input type="hidden" name="id" value="{{ $deposit->id }}">
          @if ($deposit->status == 1)
          <i class="material-icons text-success"  id="change_status">check_box</i>
          @else
          <i class="material-icons text-danger" id="change_status">check_box_outline_blank</i>
          @endif
      </td>
      <td class="align-middle text-center">
          <a href="{{ URL::to('trade-center/deposits/edit') }}/{{ $deposit->id  }}" id="update_catgory-missing" class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip" title="View deposit">
              <i class="fa fa-eye text-primary" style="padding-top: 7px !important"></i>
          </a>
          <a href="#">
              <span class="sr-only">Edit</span>
          </a>
          {{-- <a href="#" id="delete_deposit" class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip" title="Delete deposit">
            <i class="far fa-trash-alt" style="padding-top: 7px !important;color:red"></i> <span class="sr-only">Remove</span>
            <input type="hidden" name="id" value="{{ $deposit->id }}">
          </a> --}}
        </td>
    </tr>
    @endif
@endforeach
@endif
      </tbody>
      <tfoot>
        <tr>
            <th class="text-left"> ID </th>
            <th>Amount</th>
            <th>Slip</th>
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

@include('admin.deposits.js.index')
@endsection


