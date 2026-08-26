<?php $page = "Reporting - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <!-- /Filter -->
        <div class="card">
            <div class="card-body pb-0">
                <form action="{!! route('reporting') !!}" method="POST" id="report_form">
                    @csrf()
                    <div class="row">
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" name="start_date" class="datetimepicker cal-icon" placeholder="Choose Start Date" value="{!! old('start_date') !!}">
                            </div>
                        </div>
                        <div class="col-lg col-sm-6 col-12">
                            <div class="form-group">
                                <input type="text" name="end_date" class="datetimepicker cal-icon" placeholder="Choose End Date" value="{!! old('end_date') !!}">
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-6 col-12">
                            <div class="form-group">
                                <a class="btn btn-filters ms-auto" onclick="event.preventDefault();document.getElementById('report_form').submit();"><img src="{{ URL::asset('/assets/img/icons/search-whites.svg')}}" alt="img"></a>
                            </div>
                        </div>
                    </div>
                    @if(session('error'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        <strong>{{ session('error') }}</strong>
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                    @endif
                </form>
            </div>
        </div>
        <!-- /Filter -->
        <div class="card">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="row">
                <div class="col-md-2 d-flex">
                    <div class="dash-count">
                        <div class="dash-counts">
                            <h4><span class="fw-bold">{!! $total_sales !!}</span></h4>
                            <h5>Total Sales Made</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex">
                    <div class="dash-count das1">
                        <div class="dash-counts">
                            <h4><span class="fw-bold">{!! $total_purchase !!}</span></h4>
                            <h5>Total Purchase Made</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h4><span class="fw-bold">{!! $total_profit !!}</span></h4>
                            <h5>Total Profit</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex">
                    <div class="dash-count das3">
                        <div class="dash-counts">
                            <h4><span class="fw-bold">{!! $total_expenses !!}</span></h4>
                            <h5>Total Expense Made</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex">
                    <div class="dash-count das1">
                        <div class="dash-counts">
                            <h4><span class="fw-bold" id="TotalSalaries">{!! $salary !!}</span></h4>
                            <h5>Total Salaries Distributed</h5>
                        </div>
                    </div>
                </div>
                <div class="col-md-2 d-flex">
                    <div class="dash-count das2">
                        <div class="dash-counts">
                            <h4><span class="fw-bold">{!! $net_profit !!}</span></h4>
                            <h5>Net Profit</h5>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        @component('components.pageheader')
        @slot('title') Sales List @endslot
        @slot('title_1') Manage your Sales @endslot
        @endcomponent
        <!-- /product list -->
        <div class="card">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  datanew1">
                        <thead>
                            <th>Date</th>
                            <th>Customer Name</th>
                            <th>Status</th>
                            <th>Payment</th>
                            <th>Total</th>
                            <th>Paid</th>
                            <th>Sale Account</th>
                            <th>Biller</th>
                            </tr>
                        </thead>
                        <tbody>

                            @php
                            $saleVal = 0;
                            @endphp

                            @foreach($sales as $sale)

                            @php 
                                $tax = $sale->tax/100*$sale->total_amount;
                                $discount = $sale->discount/100*$sale->total_amount;
                                $grand = $sale->total_amount - $discount + $tax + $sale->shipping_charges;
                            @endphp
                            <tr>
                                <td>{{$sale->sales_date}}</td>
                                <td>{{$sale->customer_info->Name}}</td>

                                <td>
                                    @if($sale->status=='Delivered')
                                    <span class="badges bg-lightgreen">Delivered</span>
                                    @elseif($sale->status=='Pending')
                                    <span class="badges bg-lightred">Pending</span>
                                    @elseif($sale->status=='Return')
                                    <span class="badges bg-lightred">Return</span>
                                    @endif

                                </td>
                                <td>
                                    @if($sale->paid_amount >= $grand && $sale->status!='Return')
                                    <span class="badges bg-lightgreen">Paid</span>
                                    @elseif($sale->paid_amount >= $grand || $sale->status=='Return')
                                    <span class="badges bg-lightred">Not Paid</span>
                                    @else
                                    <span class="badges bg-lightred">Due</span>
                                    @endif
                                </td>
                                <td>{{$grand}} PKR</td>

                                <td class="text">{{$sale->paid_amount}} PKR</td>
                                <td>{{ ucfirst($sale->acc_info->bank_name) }}</td>
                                <td>{{ ucfirst($sale->user_info->name) }}</td>

                                @php
                                $saleVal += $sale->paid_amount;
                                @endphp


                                {{-- {{ $saleVal }} --}}
                            </tr>
                            @endforeach
                            <input type="hidden" name="" value="{{ $saleVal }}" id="allSales">
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
        @component('components.pageheader')
        @slot('title') Purchase List @endslot
        @slot('title_1') Manage your purchases @endslot
        @endcomponent
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table datanew1">
                        <thead>
                            <tr>
                                <th>Supplier Name</th>
                                <th>Purchased By</th>
                                <th>Account</th>
                                <th>EDD</th>
                                <th>Entry Date</th>
                                <th>Status</th>
                                <th>Total Amount</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $purVal = 0;
                            @endphp
                            @foreach ($purs as $pur)

                            <tr>
                                <td class="text-bolds">{{ $pur->supp_info->Name }}</td>
                                <td>{{ ucfirst($pur->user_info->name) }}</td>
                                <td>{{ $pur->acc_info->bank_name }}</td>
                                <td>{{ $pur->delivery_date }}</td>
                                <td>{{ $pur->entry_date != '0000-00-00' ? date('d-m-Y', strtotime($pur->entry_date)) : '-' }}</td>
                                <td>
                                    @if($pur->status == 'Recieved')
                                    <span class="badges bg-lightgreen">Received</span>
                                    @elseif($pur->status == 'Return')
                                    <span class="badges bg-lightred">Return</span>
                                    @elseif($pur->status == 'Pending')
                                    <span class="badges bg-lightred">Pedning</span>
                                    @endif
                                </td>
                                <td>{{ $pur->paid_amount }}</td>
                            </tr>

                            @php
                            $purVal += $pur->paid_amount
                            @endphp

                            @endforeach

                            <input type="hidden" name="" value="{{ $purVal }}" id="AllPurchase">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
        @component('components.pageheader')
        @slot('title') Expenses LIST @endslot
        @slot('title_1') Manage your purchases @endslot
        @endcomponent
        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset">
                                <img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img">

                            </a>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  datanew1">
                        <thead>
                            <tr>
                                <th>Bank Account</th>
                                <th>Subject</th>
                                <th>Generate By</th>
                                <th>Amount</th>
                                <th>Expense Date</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $expVal = 0;
                            @endphp
                            @foreach ($exp as $info)

                            <tr>
                                <td>{{ $info->acc_info->bank_name }}</td>
                                <td>{{ $info->expense_subject }}</td>
                                <td>{{ ucfirst($info->user_info->name) }}</td>
                                <td>{{ $info->expense_amount }}</td>
                                <td>{{ $info->expense_date }}</td>
                            </tr>
                            @php
                            $expVal += $info->expense_amount;
                            @endphp

                            @endforeach

                            <input type="hidden" name="" value="{{ $expVal }}" id="AllExpense">

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
        @component('components.pageheader')
        @slot('title') Quotation List @endslot
        @slot('title_1') Manage your Quotations @endslot
        @endcomponent

        <!-- /product list -->
        <div class="card">
            <div class="card-body">
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table  datanew1">
                        <thead>
                            <tr>
                                <th>Customer Name</th>
                                <th>Quote Date</th>
                                <th>User Name</th>
                                <th>Grand Total ($)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($quotes as $info)

                            <tr>
                                <td class="productimgname">
                                    <a href="javascript:void(0);">{{ ucfirst($info->customer_info->Name) }}</a>
                                </td>
                                <td>{{ $info->quote_date }}</td>
                                <td>{{ ucfirst($info->user_info->name) }}</td>
                                <td>{{ $info->total_amount }}</td>
                            </tr>

                            @endforeach

                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@component('components.modal-popup')
@endcomponent
@endsection
