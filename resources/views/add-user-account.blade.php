<?php $page = "Add User Account - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Account Setting @endslot
        @slot('title_1') Manage Account Setting @endslot
        @endcomponent
        <div class="card">
            <meta name="csrf-token" content="{{csrf_token() }}">
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
                
                <h4>Add Account</h4>
                <hr>
                <form action="{{route('add-user-account')}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email<span class="manitory">*</span></label>
                                <input required type="text" placeholder="Enter email" name="email">
                                <div class="text-danger">
                                    @if ($errors->has('email'))
                                    <span class="errormsg">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User Name<span class="manitory">*</span></label>
                                <input required type="text" placeholder="enter name" name="username">
                                <div class="text-danger">
                                    @if ($errors->has('username'))
                                    <span class="errormsg">{{ $errors->first('username') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password<span class="manitory">*</span></label>
                                <input required type="password" placeholder="Enter password" name="password">
                                <div class="text-danger">
                                    @if ($errors->has('password'))
                                    <span class="errormsg">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role<span class="manitory">*</span></label>
                                <select class="select" name="role" required>
                                    <option>Select Role</option>
                                    <option value="Admin">Admin</option>
                                    <option value="Sub-Admin">Sub-Admin</option>
                                </select>
                                <div class="text-danger ">
                                    @if ($errors->has('role'))
                                    <span class="errormsg">{{ $errors->first('role') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-12">
                                <button class="btn btn-submit me-2" type="submit">Submit</button>
                                <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection