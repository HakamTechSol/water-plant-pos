<?php $page="Add Expense - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Expense Add @endslot
        @slot('title_1') Add/Update Expenses @endslot
        @endcomponent
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

                <form action="{{ route('store.expense') }}" method="post">

                    @csrf

                    <div class="row">
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Select Employee</label>
                                <select class="select" name="emp_id" label="Select Employee" required>
                                    <option selected disabled>Select Employee</option>

                                    {{-- Accounts Drop Down From DB --}}
                                    @foreach ($emps as $emp)
                                    <option value="{{ $emp->id }}">{{ ucfirst($emp->Emp_FName) }} {{ ucfirst($emp->Emp_LName) }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense for</label>
                                <select class="select" name="expense_subject" label="Select Type" required>
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
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense Date </label>
                                <div class="input-groupicon">
                                    <input type="text" name="expense_date" placeholder="Choose Expense Date" class="datetimepicker" required>
                                    <div class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="expense_amount" placeholder="Please Enter Expense Amount" required>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense Account</label>
                                <select class="select" name="expense_account" label="Select Account For Expense" required>
                                    <option selected disabled>Select Account For Expense</option>

                                    {{-- Accounts Drop Down From DB --}}
                                    @foreach ($accounts as $acc)
                                    <option value="{{ $acc->id }}">{{ $acc->bank_name }}</option>
                                    @endforeach

                                </select>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="expense_description" placeholder="Please Enter Description For Expense"></textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Add Expense</button>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection