@extends('layouts.master')
@section('title','Audios List')
@section('audios','has-active')
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
                  <a href="">Audios List</a>
                </li>
          </ol>
        </nav><!-- /.breadcrumb -->
        <!-- title -->
        <h1 class="page-title"> Audios List
            <a href="{{ route('audios.createView') }}" class="btn btn-sm btn-success float-right">
                Add Audio
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
            <th>Category </th>
            <th>Audio Title </th>
            <th>Artist</th>
            <th>Image</th>
            <th class="text-center"> Status </th>
            <th class="text-center"> Action </th>
        </tr>
      </thead>
      <tbody id="partial-view">
        @if (count($audios) > 0)
@foreach ($audios as $key => $category)
  <tr id="row_{{ $category->id }}">
      <td class="text-left">{{ ++$key }}</td>
      <td>
        {{ $category->category->name }}
       </td><td>
        {{ $category->name }}
       </td>
       <td>
        {{ $category->artist }}
       </td>
       <td>
        <img src="{{ asset('/storage/app') }}/{{ $category->image->file_name }}" height="50px">
       </td>
      <td class="text-center">
          <input type="hidden" name="id" value="{{ $category->id }}">
          @if ($category->status == 1)
          <i class="material-icons text-success"  id="change_status">check_box</i>
          @else
          <i class="material-icons text-danger" id="change_status">check_box_outline_blank</i>
          @endif
      </td>
      <td class="align-middle text-center">
          <a href="{{ URL::to('admin/audios/edit') }}/{{ $category->id  }}" id="update_catgory-missing" class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip" title="Edit Course">
              <i class="fa fa-pencil-alt text-primary" style="padding-top: 7px !important"></i>
          </a>
          <a href="#">
              <span class="sr-only">Edit</span>
          </a>
          <a href="#" id="delete_audio" class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip" title="Delete Category">
            <i class="far fa-trash-alt" style="padding-top: 7px !important;color:red"></i> <span class="sr-only">Remove</span>
            <input type="hidden" name="id" value="{{ $category->id }}">
          </a>
        </td>
    </tr>
@endforeach
@endif
      </tbody>
      <tfoot>
        <tr>
            <th class="text-left"> ID </th>
            <th>Category</th>
            <th>Audio Title </th>
            <th>Artist</th>
            <th>Image</th>
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

@include('admin.audios.js.index')
@endsection


