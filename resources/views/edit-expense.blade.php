<?php $page="Edit Expense - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Edit Expense @endslot
        @slot('title_1') Update Expenses @endslot
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

                <form action="{{ route('update.expense', ['id' => $exp->id ]) }}" method="post">

                    @csrf

                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Select Employee</label>
                                <select class="select" name="emp_id" label="Select Account For Expense" required>
                                    {{-- <option selected disabled>Please Select Account Again</option> --}}

                                    {{-- Accounts Drop Down From DB --}}
                                    @foreach ($emps as $emp)

                                    <option value="{{ $emp->id }}"> {{ ucfirst($emp->Emp_FName) }} {{ ucfirst($emp->Emp_LName) }}</option>

                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense Account</label>
                                <select class="select" name="expense_account" label="Select Account For Expense" required>
                                    {{-- <option selected disabled>Please Select Account Again</option> --}}

                                    {{-- Accounts Drop Down From DB --}}
                                    @foreach ($accounts as $acc)

                                    <option value="{{ $acc->id }}" {{ ($acc->id == $exp->account_id) ? 'selected':'' }}> {{ $acc->bank_name }}</option>

                                    @endforeach
                                </select>
                                <input type="hidden" name="old_account" value="{{ $exp->account_id }}">
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Expense Date </label>
                                <div class="input-groupicon">
                                    <input type="text" name="expense_date" value="{{ $exp->expense_date }}" class="datetimepicker" required>
                                    <div class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="expense_amount" value="{{ $exp->expense_amount }}" required>
                                <input type="hidden" name="old_amount" value="{{ $exp->expense_amount }}">
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Expense for</label>
                                <input type="text" name="expense_subject" value="{{ $exp->expense_subject }}" required>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="expense_description" rows="" cols="">{{ $exp->expense_description }}</textarea>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update Expense</button>
                            {{-- <a href="{{url('expenselist')}}" class="btn btn-cancel">Cancel</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection