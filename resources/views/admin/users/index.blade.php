@extends('layouts.master')
@section('title','Users List')
@section('users','has-active')
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
                <a href="{{ URL::to('/admin/dashboard') }}"></i>@lang('translation.dashboard')</a>
              </li>
                <li class="breadcrumb-item active">
                  <a href="">@lang('translation.users')</a>
                </li>
          </ol>
        </nav><!-- /.breadcrumb -->
        <!-- title -->
        <h1 class="page-title"> @lang('translation.user_list')
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
          <th class="text-left">ID</th>
          <th>Full Name</th>
          <th> Email </th>
          <th>Geder</th>
          <th>DOB</th>
          <th> Date </th>
          <th class="text-center"> Status </th>
          <th class="text-center"> Action </th>
        </tr>
      </thead>
      <tbody id="partial-view">
        @if (count($users) > 0)
        @foreach ($users as $key => $user)
  <tr id="row_{{ $user->id }}">
      <td class="text-left">{{ ++$key }}</td>
      <td>{{ $user->name }}</td>
      <td>{{ $user->email }}</td>
      <td>{{ $user->gender == 1 ? trans('translation.male') : trans('translation.female') }}</td>
      <td>{{ $user->dob }}</td>
      <td>{{ $user->created_at }}</td>
      <td class="text-center">
          <input type="hidden" name="id" value="{{ $user->id }}">
          @if ($user->is_active == 1)
          <i class="material-icons text-success"  id="change_status">check_box</i>

          @else
          <i class="material-icons text-danger" id="change_status">check_box_outline_blank</i>

          @endif
      </td>
      <td class="align-middle text-center">
          <a href="#">
              <span class="sr-only">Edit</span></a> <a href="#" id="delete_user" class="btn btn-sm btn-icon btn-secondary">
                  <i class="far fa-trash-alt" style="padding-top: 7px !important;color:red"></i> <span class="sr-only">Remove</span>
                  <input type="hidden" name="id" value="{{ $user->id }}">

              </a>
        </td>

  </tr>
@endforeach
@endif



      </tbody>
      <tfoot>
        <tr>
            <th class="text-left">ID</th>
            <th>Full Name</th>
            <th> Email </th>
            <th>Geder</th>
            <th>DOB</th>
            <th> Date </th>
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



@include('admin.users.js.index')

@endsection


