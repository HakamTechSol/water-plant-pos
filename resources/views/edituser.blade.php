<?php $page = "Edit Employee - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') User Management @endslot
        @slot('title_1') Edit/Update User @endslot
        @endcomponent
        <div class="card">
            <form action="{{route('edituser',[$employee->id])}}" method="POST">
                @csrf
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
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" value="{{$employee->Emp_FName}}" name="FName">
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
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" value="{{$employee->Emp_LName}}" name="LName">
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
                        <!-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>User Name</label>
                                <input type="text" value="Thomas12">
                            </div>

                        </div> -->
                        <!-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Password</label>
                                <div class="pass-group">
                                    <input type="password" class=" pass-input" placeholder="123456">
                                    <span class="fas toggle-password fa-eye-slash"></span>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" value="{{$employee->Emp_phone}}" name="phone">
                            </div>
                            <div class="text-danger pt-2">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('Phone')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="text" value="{{$employee->emp_salary}}" name="salary">
                            </div>
                            <div class="text-danger pt-2">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('Phone')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Hours Per Day</label>
                                <input type="text" name="hours_per_day"  value="{{$employee->hours_per_day}}">
                            </div>
                            <div class="text-danger pt-2">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('hours_per_day')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" value="{{$employee->Emp_Email}}" name="Email">
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
                        <!-- <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Role</label>
                                <select class="select">
                                    <option>Owner</option>
                                    <option> </option>
                                </select>
                            </div>
                        </div> -->
                        <!-- <div class="col-lg-12">
                            <div class="form-group">
                                <label> User Image</label>
                                <div class="image-upload">
                                    <input type="file">
                                    <div class="image-uploads">
                                        <img src="{{ URL::asset('/assets/img/icons/upload.svg')}}" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <!-- <div class="col-12">
                            <div class="product-list">
                                <ul class="row">
                                    <li class="ps-0">
                                        <div class="productviewset">
                                            <div class="productviewsimg">
                                                <img src="{{ URL::asset('/assets/img/customer/profile2.jpg')}}" alt="img">
                                            </div>
                                            <div class="productviewscontent">
                                                <a href="javascript:void(0);" class="hideset"><i class="fa fa-trash-alt"></i></a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" type="submit">Update</button>
                            <!-- <a class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /add -->
    </div>
</div>
@endsection
