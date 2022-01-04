@extends('layouts.master')
@section('title','Dashboard')
@section('dashboard','has-active')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="box">
            <div class="tree-map"></div>
        </div>
    </div>
<!-- /.content-wrapper -->
</div>
@include('admin.mynetwork.js.index')
@endsection
