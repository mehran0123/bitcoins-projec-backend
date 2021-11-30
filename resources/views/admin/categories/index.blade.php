@extends('layouts.master')
@section('title','Categories List')
@section('categories','has-active')
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
                  <a href="">Categories List</a>
                </li>
          </ol>
        </nav><!-- /.breadcrumb -->
        <!-- title -->
        <h1 class="page-title"> Categories List
            <a href="{{ route('category.createView') }}" class="btn btn-sm btn-success float-right">
                Add Category
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
          <th>Category Title </th>
          {{-- <th>Category Type </th> --}}
          <th class="text-center"> Status </th>
          <th class="text-center"> Action </th>
        </tr>
      </thead>
      <tbody id="partial-view">
        @if (count($categories) > 0)
@foreach ($categories as $key => $category)
  @if( $category->name != 'Meditation Courses')
  <tr id="row_{{ $category->id }}">
      <td class="text-left">{{ ++$key }}</td>
       <td>
        {{ $category->name }}
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
        <a href="{{ URL::to('admin/category/view-category-courses') }}/{{ $category->id  }}" id="update_catgory-missing" class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip" title="View Audios">
            <i class="fa fa-eye text-primary" style="padding-top: 7px !important"></i>
        </a>
        <a href="#">
            <span class="sr-only">View Audios</span>
        </a>
          <a href="{{ URL::to('admin/category/edit') }}/{{ $category->id  }}" id="update_catgory-missing" class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip" title="Edit Category">
              <i class="fa fa-pencil-alt text-primary" style="padding-top: 7px !important"></i>
          </a>
          <a href="#">
              <span class="sr-only">Edit</span>
          </a>
          <a href="#" id="delete_category" class="btn btn-sm btn-icon btn-secondary" data-toggle="tooltip" title="Delete Category">
            <i class="far fa-trash-alt" style="padding-top: 7px !important;color:red"></i> <span class="sr-only">Remove</span>
            <input type="hidden" name="id" value="{{ $category->id }}">
          </a>
        </td>
    </tr>
    @endif
@endforeach
@endif
      </tbody>
      <tfoot>
        <tr>
          <th class="text-left"> ID </th>
          <th>Category Title </th>
          {{-- <th>Category Type </th> --}}
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

@include('admin.categories.js.index')
@endsection


