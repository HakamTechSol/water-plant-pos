<?php $page = "Sales List - Pure Water"; ?> 
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Sales List @endslot
        @slot('title_1') Manage your sales @endslot
        @endcomponent
        <!-- /product list -->
        <div class="card">
            <meta name="csrf-token" content="{{ csrf_token() }}">
            
            <div class="card-body">
                @if(session('success'))
                <div class="alert alert-success alert-dismissible fade show" role="alert">
                    <strong>{{ session('success') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                @if(session('error'))
                <div class="alert alert-danger alert-dismissible fade show" role="alert">
                    <strong>{{ session('error') }}</strong>
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
                @endif
                <div class="table-top">
                    
                    <div class="search-set">
                        <div class="search-path">
                            {{-- <a class="btn btn-filter" id="filter_search">
                                <img src="{{ URL::asset('/assets/img/icons/filter.svg')}}" alt="img">
                            <span><img src="{{ URL::asset('/assets/img/icons/closes.svg')}}" alt="img"></span>
                            </a> --}}
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            {{-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ URL::asset('/assets/img/icons/excel.svg')}}" alt="img"></a>
                            </li> --}}
                            {{-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ URL::asset('/assets/img/icons/printer.svg')}}" alt="img"></a>
                            </li>
                        </ul> --}}
                    </div>
                </div>
                
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <!-- <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th> -->
                                <th>S. No</th>
                                <th>Date</th>
                                <th>Customer Name</th>
                                <th>Brand</th>
                                <th>Status</th>
                                <th>Payment</th>
                                <th>Sale Amount</th>
                                <th>Paid</th>
                                <th>Sale Account</th>
                                <th>Biller</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sno=1;
                            @endphp
                            @foreach($sales as $sale)

                            @php 
                                $tax = $sale->tax/100*$sale->total_amount;
                                $discount = $sale->discount/100*$sale->total_amount;
                                $grand = $sale->total_amount - $discount + $tax + $sale->shipping_charges;
                            @endphp
                            <tr>
                                <td>{{$sno}}</td>
                                <td>{{$sale->sales_date}}</td>
                                <td>{{$sale->customer_info->Name}}</td>
                                <td>{{$sale->sale_products->product_info->brand_info->brand_name}}</td>
                                <td>
                                    @if($sale->status=='Pending')
                                    <span class="badges bg-lightred">
                                        Pending
                                    </span>
                                    @elseif($sale->status=='Delivered')
                                    <span class="badges bg-lightgreen">
                                        Delivered
                                    </span>
                                    @elseif($sale->status=='Return')
                                    <span class="badges bg-lightred">Return</span>
                                    @endif
                                </td>
                                <td>
                                    @if($sale->paid_amount >= $grand && $sale->status != 'Return')
                                    <span class="badges bg-lightgreen">Paid</span>
                                    @elseif($sale->status == 'Return')
                                    <span class="badges bg-lightred">Not Paid</span>
                                    @else
                                    <span class="badges bg-lightred">Due</span>
                                    @endif
                                </td>
                                <td>PKR {{$grand}}</td>
                                <td class="text">PKR {{$sale->paid_amount}}</td>
                                <td>{{ ucfirst($sale->acc_info->bank_name) }}</td>
                                <td>{{ ucfirst($sale->user_info->name) }}</td>
                                <td class="text-center">
                                    <a data-bs-toggle="tooltip" data-bs-original-title="View Sale" href="{{route('sales.detail.page',['id' => $sale->id])}}" class="">
                                        <img src="{{ URL::asset('/assets/img/icons/eye1.svg')}}" class="me-2" alt="img">
                                    </a>
                                
                                    <a data-bs-toggle="tooltip" data-bs-original-title="Edit Sale" href="{{route('edit-sales',[$sale->id])}}" class="">
                                        <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" class="me-2" alt="img">
                                    </a>
                                
                                    <a data-bs-toggle="tooltip" data-bs-original-title="Delete" onclick="deletesale('{{$sale->id}}')" class="">
                                        <img src="{{ URL::asset('/assets/img/icons/delete1.svg')}}" class="me-2" alt="img">
                                    </a>
                                </td>
                            </tr>
                            @php
                            $sno++;
                            @endphp
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
