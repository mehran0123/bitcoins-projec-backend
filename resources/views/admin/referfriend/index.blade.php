@extends('layouts.master')
@section('title','Dashboard')
@section('dashboard','has-active')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <div class="box">
            <div class="container tabs-switch">
                <div class="tab-slider--nav">
                    <ul class="tab-slider--tabs">
                        <li class="tab-slider--trigger active" rel="tab1">Left Referal Code</li>
                        <li class="tab-slider--trigger" rel="tab2">Right Referal Code</li>
                    </ul>
                </div>
                <div class="tab-slider--container">
                    <div id="tab1" class="tab-slider--body">
                        <h3 class="code-blk">Referal Code</h3>
                        <div class="highlight">
                            <pre>
                                <code>{{ Auth::user()->left_code }}</code>
                            </pre>
                        </div>

                    </div>
                    <div id="tab2" class="tab-slider--body">
                        <h3 class="code-blk">Referal Code</h3>
                        <div class="highlight">
                            <pre>
                                <code>{{ Auth::user()->right_code }}</code>
                            </pre>
                        </div>
                   </div>
                </div>
            </div>
        </div>
    </div>
<!-- /.content-wrapper -->
</div>

@endsection
