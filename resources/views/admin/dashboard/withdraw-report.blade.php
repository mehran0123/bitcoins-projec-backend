@extends('layouts.master')
@section('title','Dashboard')
@section('dashboard','has-active')
@section('content')
<div class="container-full">
    <!-- Content Header (Page header) -->
    <div class="content-header">
        <h3>
            Dashboard
            <small>Transactions</small>
        </h3>
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#"> Home</a></li>
            <li class="breadcrumb-item active">Withdraw Transactions</li>
        </ol>
    </div>
    <!-- Main content -->
    <section class="content">
            <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Withdraw Transactions</h4>
                 <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <form class="report-filter"><input type="hidden" name="method" value="withdraw"><input  placeholder="From Date" class="textbox-n" type="text" onfocus="(this.type='date')" name="start"><input placeholder="To Date" class="textbox-n" type="text" onfocus="(this.type='date')" name="end"><input type="submit" value="Search"></form>
                   {{-- <h4 class="box-title">All Transactions</h4> --}}
                   <div class="table-responsive">
                     <table id="alltransaction" class="table table-bordered table-hover display nowrap margin-top-10 w-p100">
                       <thead>
                           <tr>
                               <th>Sr#</th>
                               <th>Transaction Type</th>
                               <th>Payment Method</th>
                               <th>Date</th>
                               <th>Amount</th>
                               <th>Transaction (Fee)</th>
                           </tr>
                       </thead>
                       <tbody>
                           <tr>
                               <td>1</td>
                               <td>Deposit</td>
                               <td>Bank</td>
                               <td>20-12-2021</td>
                               <td>100</td>
                               <td>No</td>
                           </tr>
                           <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                        <tr>
                            <td>1</td>
                            <td>Deposit</td>
                            <td>Bank</td>
                            <td>20-12-2021</td>
                            <td>100</td>
                            <td>No</td>
                        </tr>
                    </tfoot>
                   </table>
                   </div>
               </div>
               <!-- /.box-body -->
            </div>
    </section>
    <!-- /.content -->
    </div>

<!-- /.content-wrapper -->
@endsection
