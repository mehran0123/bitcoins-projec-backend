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
            <li class="breadcrumb-item active">Deposit Transactions</li>
        </ol>
    </div>
    <!-- Main content -->
    <section class="content">
            <div class="box">
               <div class="box-header with-border">
                 <h4 class="box-title">Deposit Transactions</h4>
                 <h6 class="box-subtitle">Export data to Copy, CSV, Excel, PDF & Print</h6>
               </div>
               <!-- /.box-header -->
               <div class="box-body">
                   <form class="report-filter"><input type="hidden" name="method" value="deposit"><input  placeholder="From Date" class="textbox-n" type="text" onfocus="(this.type='date')" name="start"><input placeholder="To Date" class="textbox-n" type="text" onfocus="(this.type='date')" name="end"><input type="submit" value="Search"></form>
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
                            @php 
                                $key=1;    
                           @endphp
                           @if(Auth::user()->user_role==1)
                           @foreach ($adtransdeposit as $transactions)
                           <tr>
                               <td>{{$key++}}</td>
                               <td>Deposit</td>
                               <td>{{ $transactions->bank_id }}</td>
                               <td>{{ $transactions->created_at }}</td>
                               <td>{{ $transactions->amount }}</td>
                               <td> {{  (DB::Table('banks')->select('transection_fee')->where('type',$transactions->bank_id)->first())->transection_fee;  }}</td>
                           </tr>
                      
                           @endforeach
                           @endif
                           
                           @if(Auth::user()->user_role==2)
                           @foreach ($transdeposit as $transactions)
                           <tr>
                               <td>{{$key++}}</td>
                               <td>Deposit</td>
                               <td>{{ $transactions->bank_id }}</td>
                               <td>{{ $transactions->created_at }}</td>
                               <td>{{ $transactions->amount }}</td>
                               <td> {{  (DB::Table('banks')->select('transection_fee')->where('type',$transactions->bank_id)->first())->transection_fee;  }}</td>
                           </tr>
                      
                           @endforeach
                           @endif
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
