<?php $page = "Add Customer - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Customer Management @endslot
        @slot('title_1') Add/Update Customer @endslot
        @endcomponent
        <form action="{{route('add-customer')}}" method="POST">
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
                                <label>Customer Name</label>
                                <input type="text" name="customer_name" >

                                <div class="text-danger pt-2">
                                    @error('0')
                                    {{$customer_name}}
                                    @enderror
                                    @error('customer_name')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Email</label>
                                <input type="text" name="customer_email">
                                <div class="text-danger pt-2">
                                    @error('0')
                                    {{$customer_email}}
                                    @enderror
                                    @error('customer_email')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Phone</label>
                                <input type="text" name="customer_phone"  maxlength="11" >
                                <div class="text-danger pt-2">
                                    @error('0')
                                    {{$customer_phone}}
                                    @enderror
                                    @error('customer_phone')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Company</label>
                                <input type="text" name="company"/> 
                               
                                <div class="text-danger pt-2">
                                    @error('0')
                                    {{$company}}
                                    @enderror
                                    @error('company')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>City</label>
                                <input type="text" name="customer_city">
                                <!-- <select class="select">
                                <option>Choose City</option>
                                <option>City 1</option>
                                <option>City 2</option>
                            </select> -->
                                <div class="text-danger pt-2">
                                    @error('0')
                                    {{$customer_city}}
                                    @enderror
                                    @error('customer_city')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-9 col-12">
                            <div class="form-group">
                                <label>Address</label>
                                <input type="text" name="customer_address">
                                <div class="text-danger pt-2">
                                    @error('0')
                                    {{$customer_address}}
                                    @enderror
                                    @error('customer_address')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="description"></textarea>
                                <div class="text-danger pt-2">
                                    @error('0')
                                    {{$description}}
                                    @enderror
                                    @error('description')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <!-- <div class="col-lg-12">
                        <div class="form-group">
                            <label>	Avatar</label>
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
                            <button class="btn btn-submit me-2" type="submit">Submit</button>
                            <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /add -->
    </div>
</div>
@endsection