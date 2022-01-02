@extends('layouts.master')
@section('title','Privacy Policy List')
@section('privacy-policy','has-active')
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
                  <a href="">Privacy Policy List</a>
                </li>
          </ol>
        </nav><!-- /.breadcrumb -->
        <!-- title -->
        @if (count($privacy_policy) < 1)
        <h1 class="page-title"> Privacy Policy List
            <a href="{{ route('privacy-policy.createView') }}" class="btn btn-sm btn-success float-right">
                Add Privacy Policy
            </a>
        </h1>
        @endif
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
          <th>Privacy Details </th>
          <th class="text-center"> Action </th>
        </tr>
      </thead>
      <tbody id="partial-view">
        @if (count($privacy_policy) > 0)
@foreach ($privacy_policy as $key => $category)
  <tr id="row_{{ $category->id }}">
      <td class="text-left">{{ ++$key }}</td>
       <td>
        {{ $category->details }}
       </td>
      <td class="align-middle text-center">
          <a href="{{ URL::to('admin/privacy-policy/edit') }}/{{ $category->id  }}" id="update_catgory-missing" class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip" title="Edit Category">
              <i class="fa fa-pencil-alt text-primary" style="padding-top: 7px !important"></i>
          </a>
          <a href="#">
              <span class="sr-only">Edit</span>
          </a>
        </td>
    </tr>
@endforeach
@endif
      </tbody>
      <tfoot>
        <tr>
            <th class="text-left"> ID </th>
            <th>Privacy Details </th>
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

@include('admin.privacy-policy.js.index')
@endsection


