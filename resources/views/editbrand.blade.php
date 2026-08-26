<?php $page = "Edit Brand - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Brand Edit @endslot
        @slot('title_1') Update your Brand @endslot
        @endcomponent
        <form action="{{ route('editbrand2',[$brand->brand_id]) }}" method="POST" enctype="multipart/form-data">
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
                                <label>Brand Name</label>
                                <input required type="text" name="brand_name" value="{{old('name',$brand->brand_name)}}">
                            </div>
                            <div class="text-danger">
                                @if ($errors->has('brand_name'))
                                <span class="errormsg">{{ $errors->first('brand_name') }}</span>
                                @endif
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="brand_desc">{{old('desc',$brand->brand_desc)}}</textarea>
                            </div>
                            <div class="text-danger">
                                @if ($errors->has('brand_desc'))
                                <span class="errormsg">{{ $errors->first('brand_desc') }}</span>
                                @endif
                            </div>
                        </div>
                     
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" name="submit" type="submit">Submit</button>
                            <!-- <a href="{{url('brandlist')}}" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /add -->
    </div>
</div>
@endsection