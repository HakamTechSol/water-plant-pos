<?php $page="Create Account - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Account Add @endslot
        @slot('title_1') Add/Update Accounts @endslot
        @endcomponent
        <div class="card">
            @if(session('success'))
            <div class="alert alert-success alert-dismissible fade show" role="alert">
                <strong>{{ session('success') }}</strong>
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            @if(count($errors) > '0')
            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                <strong>{{ $error }}</strong>
                <br>
                @endforeach
                <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
            </div>
            @endif
            <div class="card-body">
                <form action="{{ route('store.account') }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" placeholder="Enter The Name Of Bank" required>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account Title</label>
                                <input type="text" placeholder="Enter Title Of Account" name="account_title">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Amount</label>
                                <input type="text" name="amount" placeholder="Please Enter Amount">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Account No.</label>
                                <input type="text" name="account_number" placeholder="Please Enter Account Number" required>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Submit</button>
                        <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
