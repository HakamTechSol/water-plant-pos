<?php $page = "Add Brand - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Add Brand @endslot
        @slot('title_1') Create new Brand @endslot
        @endcomponent
        <!-- /add -->
        <form action="{{route('addbrand1')}}" method="post" enctype="multipart/form-data">
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
                                <input required type="text" name="brand_name">
                            </div>
                            <div class="text-danger">
                        @error('0')
                            {{$message}}
                        @enderror
                        @error('brand_name')
                            {{$message}}
                        @enderror
                    </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="brand_desc"></textarea>
                            </div>
                            <div class="text-danger">
                                @error('0')
                                    {{$message}}
                                @enderror
                                @error('brand_desc')
                                    {{$message}}
                                @enderror
                            </div>
                        </div>

                        <!-- <div class="col-lg-12">
                            <div class="form-group">
                                <label> Product Image</label>
                                <div class="image-upload">
                                    <input type="file" name="brand_image">
                                    <div class="image-uploads">
                                        <img src="{{ URL::asset('/assets/img/icons/upload.svg')}}" alt="img">
                                        <h4>Drag and drop a file to upload</h4>
                                    </div>
                                    <div class="text-danger">
                                        @error('0')
                                            {{$message}}
                                        @enderror
                                        @error('brand_image')
                                            {{$message}}
                                        @enderror
                                    </div>
                                </div>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                            <button  class="btn btn-submit me-2" type="submit">Submit</button>
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