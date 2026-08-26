<?php $page="Edit Account - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Edit Account @endslot
        @slot('title_1') Update Accounts @endslot
        @endcomponent
        <div class="card">
            <div class="card-body">
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
                <form action="{{ route('update.account', ['id' => $acc->id]) }}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Bank Name</label>
                                <input type="text" name="bank_name" value="{{ $acc->bank_name }}" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Account Title</label>
                                <input type="text" value="{{ $acc->account_title }}" name="account_title" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Amount</label>
                                <div class="input-groupicon">
                                    <input type="text" name="amount" value="{{ $acc->amount }}" required>
                                    <!--   <div class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/dollar.svg')}}" alt="img">
                                    </div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="container-fluid">
                        <div class="form-group">
                            <label>Account No.</label>
                            <input type="text" name="account_number" value="{{ $acc->account_number }}" required>
                        </div>
                    </div>
                    <div class="col-lg-12">
                        <button type="submit" class="btn btn-submit me-2">Update Account</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
