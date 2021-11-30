@extends('layouts.master')
@section('title','Dashboard')
@section('dashboard','has-active')
@section('content')
 <!-- .page -->
 <div class="page">
    <!-- .page-inner -->
    <div class="page-inner">
      <!-- .page-title-bar -->
<header class="page-title-bar">
    <div class="d-flex flex-column flex-md-row">
      <p class="lead">
        <span class="font-weight-bold">Hi, {{ Auth::user()->name }}.</span> <span class="d-block text-muted">Here’s what’s happening with your business today.</span>
      </p>
    </div>
  </header><!-- /.page-title-bar -->
    <!-- .page-section -->
    <div class="page-section">
        <!-- .section-block -->
        <div class="section-block">
            <!-- metric row -->
          <div class="metric-row">
            <div class="col-lg-6">
              <div class="metric-row metric-flush">
                <!-- metric column -->
                <!-- /metric column -->
                <!-- metric column -->
                <div class="col">
                  <!-- .metric -->
                  <a href="#" class="metric metric-bordered align-items-center">
                    <div class="metric-badge">
                      <span class="badge badge-lg badge-success"><span class="oi oi-media-record pulse mr-1"></span>Total Users </span>
                    </div>
                    {{--  <h2 class="metric-label">  </h2>  --}}
                    <p class="metric-value h3">
                        <sub><i class="oi oi-people"></i></sub> <span class="value">{{ isset($users) ? $users : 0}}</span>
                    </p>
                  </a> <!-- /.metric -->
                </div> &nbsp &nbsp; &nbsp; <!-- /metric column -->
                <!-- metric column -->
                <div class="col">
                    <!-- .metric -->
                    <a href="#" class="metric metric-bordered align-items-center">
                      <h2 class="metric-label">Total Withdraw</h2>
                      <p class="metric-value h3">
                        <sub><i class="fa fa-tasks"></i></sub> <span class="value">(0)</span>
                      </p>
                    </a> <!-- /.metric -->
                  </div><!-- /metric column -->
                </div>
              </div><!-- metric column -->
                <!-- metric column -->
                <div class="col">
                  <!-- .metric -->
                  <a href="#" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label">Total Deposit</h2>
                    <p class="metric-value h3">
                      <sub><i class="oi oi-audio"></i></sub> <span class="value">0</span>
                    </p>
                  </a> <!-- /.metric -->
                </div>
                <div class="col">
                  <!-- .metric -->
                  <a href="#" class="metric metric-bordered align-items-center">
                    <h2 class="metric-label"> Total Transections </h2>
                    <p class="metric-value h3">
                      <sub><i class="oi oi-cloud-upload"></i></sub> <span class="value">0</span>
                    </p>
                  </a> <!-- /.metric -->
                </div><!-- /metric column -->
              </div>
            </div><!-- metric column -->

            <!-- .section-block -->

           </div><!-- /metric row -->
            <!-- metric row -->
           <!-- /metric row -->
          </div><!-- /.section-block -->
      </div><!-- /.page-section -->
    </div></div>
@endsection
