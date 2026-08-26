<?php $page="Edit User Account - Pure Water";?>
@extends('layout.mainlayout')
@section('content')	
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')                
			@slot('title') Edit User Account @endslot
			@slot('title_1') Manage User Account Settings @endslot
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
                <form action="{{route('edit-user-account',old('name',$user1->id))}}" method="POST">
                    @csrf
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Email<span class="manitory">*</span></label>
                                <input required type="text" placeholder="Enter email" value="{{old('name',$user1->email)}}" name="email">
                                <div class="text-danger ">
                                    @if ($errors->has('email'))
                                    <span class="errormsg">{{ $errors->first('email') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>User Name<span class="manitory">*</span></label>
                                <input required type="text" placeholder="enter name" value="{{old('name',$user1->name)}}" name="name">
                                <div class="text-danger ">
                                    @if ($errors->has('name'))
                                    <span class="errormsg">{{ $errors->first('name') }}</span>
                                    @endif
                                </div>
                            </div>

                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Password<span class="manitory">*</span></label>
                                <input required type="password" placeholder="Enter password" value="{{old('name',$user1->password)}}" name="password">
                                <div class="text-danger pt-2">
                                    @if ($errors->has('password'))
                                    <span class="errormsg">{{ $errors->first('password') }}</span>
                                    @endif
                                </div>
                            </div>
                        </div>
                        @php
                        if($user1->role == 'Admin'){
                            $admin = 'selected';
                            $subadmin = '';
                        }
                        elseif($user1->role == 'Sub-Admin'){
                            $admin = '';
                            $subadmin = 'selected';
                        }
                        @endphp
                        <div class="col-md-6">
                            <div class="form-group">
                                <label>Role<span class="manitory">*</span></label>
                                <select class="select" name="role" required>
                                    <option>Select Role</option>
                                    <option value="Admin" {{$admin}}>Admin</option>
                                    <option value="Sub-Admin" {{$subadmin}}>Sub-Admin</option>
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
                                <button class="btn btn-submit me-2" type="submit">update</button>
                                <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        <!-- /add -->
    </div>
</div>
@endsection