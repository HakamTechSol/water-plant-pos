<?php $page = "Add Employee - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Employee Management @endslot
        @slot('title_1') Add/Update Employee @endslot
        @endcomponent
        <form action="{{route('adduser')}}" method="POST">
            @csrf
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
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>First Name</label>
                                <input type="text" name="Fname">
                            </div>
                            <div class="text-danger pt-2">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('Fname')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Last Name</label>
                                <input type="text" name="Lname">
                            </div>
                            <div class="text-danger pt-2">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('Lname')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Salary</label>
                                <input type="text" name="salary">
                            </div>
                            <div class="text-danger pt-2">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('salary')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Hours Per Day</label>
                                <input type="text" name="hours_per_day">
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
                                <label>Phone</label>
                                <input type="text" name="Phone"  maxlength="11" >
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
                                <label>Email</label>
                                <input type="text" name="Email">
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
                            <label>Nic number</label>
                            <input type="text" >
                        </div>
                    </div> -->
                        <!-- <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Role</label>
                            <select class="select">
                                <option>Select</option>
                                <option>Owner</option>
                            </select>
                        </div>
                    </div> -->
                        <!-- <div class="col-lg-12">
                        <div class="form-group">
                            <label>	User Image</label>
                            <div class="image-upload">
                                <input type="file">
                                <div class="image-uploads">
                                    <img src="{{ URL::asset('/assets/img/icons/upload.svg')}}" alt="img">
                                    <h4>Drag and drop a file to upload</h4>
                                </div>
                            </div>
                        </div>
                    </div> -->
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <!-- <a href="{{url('userlist')}}" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /add -->
    </div>
</div>
@endsection
