<?php $page = "Edit Category - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Product Edit Category @endslot
        @slot('title_1') Edit a product Category @endslot
        @endcomponent
        <div class="card">
            <form action="{{route('editcategory2',[$category->id])}}" method="POST" enctype="multipart/form-data">
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
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Name</label>
                                <input required type="text" name="category_name" value="{{old('name',$category->category_name)}}">
                            </div>
                            <div class="text-danger">
                        @if ($errors->has('category_name'))
                        <span class="errormsg">{{ $errors->first('category_name') }}</span>
                        @endif
                        </div>
                        </div>
                       
                        <div class="col-lg-6 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Code</label>
                                <input required type="text" name="category_code" value="{{old('name',$category->category_code)}}">
                            </div>
                            <div class="text-danger ">
                        @if ($errors->has('category_code'))
                        <span class="errormsg">{{ $errors->first('category_code') }}</span>
                        @endif
                        </div>
                        </div>
                        
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="category_desc">{{old('name',$category->category_desc)}}</textarea>
                            </div>
                            <div class="text-danger">
                        @if ($errors->has('category_desc'))
                        <span class="errormsg">{{ $errors->first('category_desc') }}</span>
                        @endif
                        </div>
                        </div>
                        
                        <!-- <div class="col-lg-12">
                            <div class="form-group">
                                <label> Product Image</label>
                                <div class="image-upload">
                                    <input required type="file" name="category_image" accept="images/*" value="{{ asset('storage/category_img/'.$category->image) }}">
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
                                        <div class="productviews">
                                            <div class="productviewsimg">
                                            <img src="{{ asset('storage/category_img/'.$category->image) }}" alt="product">
                                            </div>
                                            <div class="productviewscontent">
                                                <div class="productviewsname">
                                                    <h2>{{$category->image}}</h2>
                                                    <h3></h3>
                                                </div>
                                                <a href="javascript:void(0);" class="hideset">x</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                        <div class="col-lg-12">
                        <button type="submit" name="submit" class="btn btn-submit me-2">Update</button>
                            <!-- <a href="{{url('categorylist')}}" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </div>
            </form>
        </div>
        <!-- /add -->
    </div>
</div>
@endsection