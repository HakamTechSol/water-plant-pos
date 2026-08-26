<?php $page="Purchase List - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Order List @endslot
        @slot('title_1') Manage your Orders @endslot
        @endcomponent
        <!-- /product list -->
        <div class="card">
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
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" class="datetimepicker cal-icon" placeholder="Choose Date">
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Reference">
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Supplier</option>
                                        <option>Supplier</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Status</option>
                                        <option>Inprogress</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Choose Payment Status</option>
                                        <option>Payment Status</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="{{ URL::asset('/assets/img/icons/search-whites.svg')}}" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                            <tr>
                                <!-- <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th> -->
                                <th>S. No</th>
                                <th>Entry Date</th>
                                <th>Supplier Name</th>
                                <th>Purchase Desc</th>
                                <th>Account</th>
                                <th>EDD</th>
                                <th>Status</th>
                                <th>Total Amount</th>
                                <th>Paid</th>
                                <th>Balance</th>
                                <th>Added By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sno=1;
                            @endphp
                            @foreach ($purs as $pur)

                            <tr>
                                <td>{{$sno}}</td>
                                <td>{{ $pur->entry_date ? date('d-m-Y', strtotime($pur->entry_date)) : '-' }}</td>
                                <td class="text-bolds">{{ $pur->supp_info->Name }}</td>
                                <td class="text-bolds">{{ $pur->purchase_desc }}</td>
                                <td>{{ $pur->acc_info->bank_name }}</td>
                                <td>{{ $pur->entry_date != '0000-00-00' ? date('d-m-Y', strtotime($pur->delivery_date)) : '-' }}</td>
                                <td>
                                    @if($pur->status == 'Return')
                                    <span class="badges bg-lightred">Return</span>
                                    @elseif($pur->status == 'Recieved')
                                    <span class="badges bg-lightgreen">Recieved</span>
                                    @elseif($pur->status == 'Pending')
                                    <span class="badges bg-lightred">Pending</span>
                                    @endif
                                </td>
                                <td>PKR {{ $pur->total_amount - ($pur->total_amount * $pur->discount / 100) + ($pur->total_amount * $pur->tax / 100) + $pur->shipping_charges }}</td>
                                <td class="text">PKR {{$pur->paid_amount}}</td>
                                @if($pur->paid_amount > $pur->total_amount)
                                <td class="text" style="color:green">PKR +{{$pur->paid_amount-$pur->total_amount}}</td>
                                @elseif($pur->paid_amount == $pur->total_amount)
                                <td class="text">PKR 0</td>
                                @else
                                <td class="text" style="color:red">PKR {{$pur->paid_amount-$pur->total_amount}}</td>
                                @endif
                                <td>{{ ucfirst($pur->user_info->name) }}</td>
                                <td class="text-center">
                                    <a class="" data-bs-toggle="tooltip" data-bs-original-title="View Order" href="{{ route('view.purchase', ['id' => $pur->id]) }}">
                                        <img src="{{ URL::asset('/assets/img/icons/eye1.svg')}}" class="me-2" alt="img">
                                    </a>
                                    <a class="" data-bs-toggle="tooltip" data-bs-original-title="Edit Order" href="{{ Route('edit.purchase', ['id' => $pur->id]) }}">
                                        <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" class="me-2" alt="img">
                                    </a>
                                    <a class="" data-bs-toggle="tooltip" data-bs-original-title="Delete Order" onclick="deleteorder('{{ $pur->id }}')">
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
@endsection
