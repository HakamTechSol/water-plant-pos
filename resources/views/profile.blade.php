<?php $page = "My Profile - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Profile @endslot
        @slot('title_1') User Profile @endslot
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
                <form action="{{route('profile',[$employee->id])}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input required type="text" placeholder="Enter first name" value="{{$employee->First_name}}" name="FName">
                            </div>
                            <div class="text-danger pt-2">
                                        @error('0')
                                        {{$message}}
                                        @enderror
                                        @error('FName')
                                        {{$message}}
                                        @enderror
                                    </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input required type="text" placeholder="Enter last name" value="{{$employee->Last_name}}" name="LName">
                            </div>
                            <div class="text-danger pt-2">
                                        @error('0')
                                        {{$message}}
                                        @enderror
                                        @error('LName')
                                        {{$message}}
                                        @enderror
                                    </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input required type="text" placeholder="Enter email address" value="{{$employee->email}}" name="Email">
                            </div>
                            <div class="text-danger pt-2">
                                        @error('0')
                                        {{$message}}
                                        @enderror
                                        @error('Email')
                                        {{$message}}
                                        @enderror
                                    </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input required type="text" placeholder="Enter phone number" value="{{$employee->phone}}"  name="phone">
                            </div>
                            <div class="text-danger pt-2">
                                        @error('0')
                                        {{$message}}
                                        @enderror
                                        @error('phone')
                                        {{$message}}
                                        @enderror
                                    </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>User Name</label>
                                <input required type="text" placeholder="Enter user name" value="{{$employee->name}}" name="username">
                            </div>
                            <div class="text-danger pt-2">
                                        @error('0')
                                        {{$message}}
                                        @enderror
                                        @error('username')
                                        {{$message}}
                                        @enderror
                                    </div>
                        </div>
                        <div class="col-lg-6 col-sm-12">
                            <div class="form-group">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input required type="password" class=" pass-input" value="{{$employee->password}}" name="password">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                                <div class="text-danger pt-2">
                                        @error('0')
                                        {{$message}}
                                        @enderror
                                        @error('password')
                                        {{$message}}
                                        @enderror
                                    </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-submit me-2" type="submit">Submit</button>
                            <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection