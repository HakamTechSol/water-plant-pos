<?php $page="Employee List - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Employee List @endslot
        @slot('title_1') Manage your Employee @endslot
        @endcomponent
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
                            <!-- <a class="btn btn-filter" id="filter_search">
                                <img src="{{ URL::asset('/assets/img/icons/filter.svg')}}" alt="img">
                                <span><img src="{{ URL::asset('/assets/img/icons/closes.svg')}}" alt="img"></span>
                            </a> -->
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
                <!-- /Filter -->
                <!-- <div class="card" id="filter_inputs">
                    <div class="card-body pb-0">
                        <div class="row">
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter User Name">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Phone">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <input type="text" placeholder="Enter Email">
                                </div>
                            </div>
                            <div class="col-lg-2 col-sm-6 col-12">
                                <div class="form-group">
                                    <select class="select">
                                        <option>Disable</option>
                                        <option>Enable</option>
                                    </select>
                                </div>
                            </div>
                            <div class="col-lg-1 col-sm-6 col-12 ms-auto">
                                <div class="form-group">
                                    <a class="btn btn-filters ms-auto"><img src="{{ URL::asset('/assets/img/icons/search-whites.svg')}}" alt="img"></a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div> -->
                <!-- /Filter -->

                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <!-- <th>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th> -->
                                <th>S. No</th>
                                <!-- <th>Profile</th> -->
                                <th>Name</th>
                                <!-- <th>User name </th> -->
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Salary</th>
                                <th>Expenses</th>
                                <th>Created by</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sno=1;
                            @endphp
                            @foreach ($Employee as $employee1)
                            <tr>
                                <!-- <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td> -->
                                <!-- <td class="productimgname">
                                    <a href="javascript:void(0);" class="product-img">
                                        <img src="{{ URL::asset('/assets/img/customer/customer1.jpg')}}" alt="product">
                                    </a>
                                </td> -->
                                <td>{{$sno}}</td>
                                <td>{{$employee1->Emp_FName}} {{$employee1->Emp_LName}} </td>
                                <td>{{$employee1->Emp_phone}}</td>
                                <td>{{$employee1->Emp_email}} </td>
                                <td>PKR {{$employee1->emp_salary}} </td>
                                <td>PKR {{ $employee1->total_expenses }}</td>
                                <td>
                                    {{$employee1->name}}
                                    <!-- <div class="status-toggle d-flex justify-content-between align-items-center">
                                        <input type="checkbox" id="user1" class="check" >
                                        <label for="user1" class="checktoggle">checkbox</label>
                                    </div> -->
                                </td>
                                <td>

                                    <a class="me-3" href="{{route('edituser',[$employee1->id])}}">
                                        <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" alt="img">
                                    </a>
                                    <a class="me-3 confirm-text" onclick=" deleteemp('{{$employee1->id}}')">
                                        <img src="{{ URL::asset('/assets/img/icons/delete.svg')}}" alt="img">
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