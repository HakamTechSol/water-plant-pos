<?php $page="Expense List - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Expenses List @endslot
        @slot('title_1') Manage your purchases @endslot
        @endcomponent
        <!-- /Get Expense -->
        <div class="card">
            <div class="card-body">
                 <form method="POST" action="{{ route('filter.expense') }}" >
               
                <div class="row">
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                              @csrf
                            <label> Start Date </label>
                            <div class="input-groupicon">
                                <input type="text" name="start" placeholder="Choose Start Date" class="datetimepicker" required>
                                <div class="addonset">
                                    <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> End Date </label>
                            <div class="input-groupicon">
                                <input type="text" name="end" placeholder="Choose End Date" class="datetimepicker" required>
                                <div class="addonset">
                                    <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label> Search Type </label>
                            <select class="select" name="type" id="type" label="Select Type" required id="expensetype" onchange="gettypedetails()">
                                <option selected disabled>Search Type</option>
                                <option value="Expense_Type">Expense Type</option>
                                <option value="Employee_Type">Employee Type</option>
                            </select>
                        </div>
                    </div>
                   
                    <div class="col-lg-3 col-sm-6 col-12" id="Employee_column">
                        <div class="form-group">
                            <label>Select Employee</label>
                            <select class="select" id="Employee" name="Filter_type">
                               
                                <option value="">Choose Employee/Type</option>
                                  @foreach($employees as $employee)
                                   <option value="{{$employee->id}}">{{$employee->Emp_FName .$employee->Emp_LName}}</option>
                                  @endforeach
                              
                            </select>
                        </div>
                    </div>
                     <div class="col-lg-3 col-sm-6 col-12" id="Expense_column">
                            <div class="form-group">
                                <label>Expense for</label>
                                <select class="select" name="Filter_type" label="Select Type" id="Expenses" required>
                                    <option selected disabled>Expense For</option>
                                    <option value="Food">Food</option>
                                    <option value="Local Office">Local Office</option>
                                    <option value="Workshop Electrical">Workshop Electrical</option>
                                    <option value="Workshop Mechanical">Workshop Mechanical</option>
                                    <option value="Arsalan">Arsalan</option>
                                    <option value="Mehmood Anwar">Mehmood Anwar</option>
                                    <option value="Ahmar Mehmood">Ahmar Mehmood</option>
                                    <option value="Petrol">Petrol</option>
                                </select>
                            </div>
                        </div>
                    <div class="col-lg-6">
                        <button type="submit" class="btn btn-submit me-2">Get Total Expense</button>
                        <a class="btn btn-submit me-2" href="{{route('list.expense')}}">Reset</a>
                    </div>
                </div>
                </form>
            </div>
        </div>
        <!-- /Get Expense -->
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

                <div class="table-top row">
                    <div class="search-set col-md-10">
                        <div class="search-input">
                            <a class="btn btn-searchset">
                                <img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img">
                            </a>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <h5>Total Expense</h5>
                        <h5>PKR {{$total_expenses}}/=</h5>
                    </div>
                </div>
                <div class="table-responsive">
                    <table class="table  datanew">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Bank Account</th>
                                <th>Subject</th>
                                <th>Description</th>
                                <th>Generated By</th>
                                <th>Employee</th>
                                <th>Amount</th>
                                <th>Expense Date</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sno=1;
                            @endphp
                            @foreach ($exp as $info)

                            <tr>
                                <!-- <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td> -->
                                <td>{{$sno}}</td>
                                <td>{{ $info->acc_info->bank_name }}</td>
                                <td>{{ $info->expense_subject }}</td>
                                <td>{{ $info->expense_description }}</td>
                                <td>{{ ucfirst($info->user_info->name) }}</td>
                                <td>{{ ucfirst($info->emp_info->Emp_FName) }} {{ ucfirst($info->emp_info->Emp_LName) }} </td>
                                <td>PKR {{ $info->expense_amount }}</td>
                                <td>{{ $info->expense_date }}</td>
                                <td>

                                    <a class="me-3" href="{{ route('edit.expense', ['id' => $info->id]) }}">
                                        <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" alt="img">
                                    </a>
                                    <a class="me-3 confirm-text" onclick="deleteexpense( '{{$info->id}}' )">
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

@endsection


