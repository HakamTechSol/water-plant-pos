<?php $page="Home - Pure Water";?> 
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        <div class="row">
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget">
                    <div class="dash-widgetimg">
                        <span><img src="{{ URL::asset('/assets/img/icons/dash1.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5><span class="counters" data-count="{{ $emp_count }}">${{ $emp_count }}</span></h5>
                        <h6>Total Employees</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash1">
                    <div class="dash-widgetimg">
                        <span><img src="{{ URL::asset('/assets/img/icons/dash2.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>PKR <span class="counters" data-count="{{ $total_sales-$total_purchase  }}">${{ $totalsale-$totalpur }}</span></h5>
                        <h6>Total Profit</h6>
                    </div> 
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash2">
                    <div class="dash-widgetimg">
                        <span><img src="{{ URL::asset('/assets/img/icons/dash3.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>PKR <span class="counters" data-count="{{ $total_sales }}">${{ $totalsale }}</span></h5>
                        <h6>Total Sale</h6>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12">
                <div class="dash-widget dash3">
                    <div class="dash-widgetimg">
                        <span><img src="{{ URL::asset('/assets/img/icons/dash4.svg')}}" alt="img"></span>
                    </div>
                    <div class="dash-widgetcontent">
                        <h5>PKR <span class="counters" data-count="{{ $total_purchase }}">$ {{ $total_purchase }}</span></h5>
                        <h6>Total Purchase </h6>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count">
                    <div class="dash-counts">
                        <h4>{{ $customer_count }}</h4>
                        <h5>Customers</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das1">
                    <div class="dash-counts">
                        <h4>{{ $supp_count }}</h4>
                        <h5>Suppliers</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="user-check"></i>
                    </div>
                </div>
            </div>
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das2">
                    <div class="dash-counts">
                        <h4>{{ $inv_count }}</h4>
                        <h5>Sales</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="file-text"></i>
                    </div>
                </div>
            </div> 
            <div class="col-lg-3 col-sm-6 col-12 d-flex">
                <div class="dash-count das3">
                    <div class="dash-counts">
                        <h4>{{ $product_count }}</h4>
                        <h5>Products</h5>
                    </div>
                    <div class="dash-imgs">
                        <i data-feather="box"></i>
                    </div>
                </div>
            </div>
        </div>
        <!-- Button trigger modal -->

        <div class="row">
            <div class="col-lg-12 col-sm-12 col-12 d-flex">
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Purchase & Sales</h5>
                        <div class="graph-sets">
                            <div class="dropdown">
                                <button class="btn btn-white btn-sm dropdown-toggle" type="button" id="dropdownMenuButton" data-bs-toggle="dropdown" aria-expanded="false">
                                    {!! Request('year') ? Request('year') : date('Y') !!} <img src="{{ URL::asset('/assets/img/icons/dropdown.svg')}}" alt="img" class="ms-2">
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                                    <li>
                                        <a href="{!! route('index', date('Y')) !!}" class="dropdown-item {!! Request('year') ? (Request('year') == date('Y') ? 'active' : '') : 'active' !!} ">{!! date('Y') !!}</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('index', date('Y', strtotime('-1 year'))) !!}" class="dropdown-item {!! Request('year') ? (Request('year') == date('Y', strtotime('-1 year')) ? 'active' : '') : '' !!} ">{!! date('Y', strtotime('-1 year')) !!}</a>
                                    </li>
                                    <li>
                                        <a href="{!! route('index', date('Y', strtotime('-2 year'))) !!}" class="dropdown-item {!! Request('year') ? (Request('year') == date('Y', strtotime('-2 year')) ? 'active' : '') : '' !!} ">{!! date('Y', strtotime('-2 year')) !!}</a>
                                    </li>
                                </ul>
                            </div>
                        </div>

                    </div>
                    <div class="card-body">
                        <div id="sales_chartt"></div>
                    </div>
                </div>
            </div>

        </div>

        <div class="row">
            <div class="col-md-6 d-flex">
                <!-- /product list -->
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Product Updates</h5>
                    </div>
                    <div class="card-body">

                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    {{-- <a class="btn btn-filter" id="filter_search">
                                        <img src="{{ URL::asset('/assets/img/icons/filter.svg')}}" alt="img">
                                    <span><img src="{{ URL::asset('/assets/img/icons/closes.svg')}}" alt="img"></span>
                                    </a> --}}
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset">
                                        <img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img">

                                    </a>
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
                                    </li> --}}
                                </ul>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Product SKU</th>
                                        <th>Product Quantity</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($pro_checks as $pro)
                                    <tr>
                                        <td>{{ $pro->product_name }}</td>
                                        <td>{{ $pro->product_SKU }}</td>
                                        <td>{{ $pro->product_qty }}</td>
                                        <td>The product is going to be out of stock soon !</td>

                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    {{-- <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Bottle</td>
                                        <td>Going to be expire</td>

                                    </tr>

                                </tbody>
                            </table>
                        </div> --}}
                </div>
            </div>

            <div class="col-md-6 d-flex">
                <!-- /product list -->
                <div class="card flex-fill">
                    <div class="card-header pb-0 d-flex justify-content-between align-items-center">
                        <h5 class="card-title mb-0">Order Updates</h5>
                    </div>
                    <div class="card-body">

                        <div class="table-top">
                            <div class="search-set">
                                <div class="search-path">
                                    {{-- <a class="btn btn-filter" id="filter_search">
                                        <img src="{{ URL::asset('/assets/img/icons/filter.svg')}}" alt="img">
                                    <span><img src="{{ URL::asset('/assets/img/icons/closes.svg')}}" alt="img"></span>
                                    </a> --}}
                                </div>
                                <div class="search-input">
                                    <a class="btn btn-searchset">
                                        <img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img">

                                    </a>
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
                                    </li> --}}
                                </ul>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="table datanew">
                                <thead>
                                    <tr>
                                        <th>Supplier</th>
                                        <th>EDD</th>
                                        <th>Total Amount</th>
                                        {{-- <th>Status</th> --}}
                                    </tr>
                                </thead>
                                <tbody>

                                    @foreach ($uporders as $order)
                                    <tr>
                                        <td>{{ ucfirst($order->supp_info->Name) }}</td>
                                        <td>{{ $order->delivery_date }}</td>
                                        <td>{{ $order->total_amount }}</td>
                                        {{-- <td>Going to be expire</td> --}}
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>

                    </div>
                    {{-- <div class="table-responsive">
                            <table class="table  datanew">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>

                                    <tr>
                                        <td>Bottle</td>
                                        <td>Going to be expire</td>

                                    </tr>

                                </tbody>
                            </table>
                        </div> --}}
                </div>
            </div>
            <!-- /product list -->
        </div>
    </div>
</div>
</div>
<sc @endsection
