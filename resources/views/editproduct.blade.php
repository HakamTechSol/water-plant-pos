<?php $page = "Edit Product - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Product Edit @endslot
        @slot('title_1') Update your product @endslot
        @endcomponent
        <form action="{{ route('edit_product',[$product->product_id]) }}" method="post" enctype="multipart/form-data">
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
                                <label>Product Name</label>
                                <input required type="text" name="product_name" value="{{old('name',$product->product_name)}}">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('product_name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select required class="select" id="category_name" onchange="get_brands()" name="category_name">
                                    @foreach ($categorys as $category)
                                    <?php if ($category->id == $product->cate_id) { ?>

                                    <option value="{{$category->id}}" selected="">{{ $category->category_name}}</option>
                                    <?php } else { ?>
                                    <option value="{{$category->id}}">{{ $category->category_name}}</option>

                                    <?php } ?>

                                    @endforeach
                                </select>
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('category_name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Size</label>
                                <select required class="select" id="size" name="size_name">

                                    @foreach ($size as $size1)
                                    <?php if ($size1->size_id == $product->size_id) { ?>

                                    <option value="{{$size1->size_id}}" selected="">{{ $size1->size_name}}</option>
                                    <?php } else { ?>
                                    <option value="{{$size1->size_id}}">{{ $size1->size_name}}</option>

                                    <?php } ?>

                                    @endforeach
                                </select>
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('size_name')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Brand</label>
                                <select required class="select" name="brand">
                                    @foreach ($brands as $brand)
                                    <?php if ($brand->brand_id == $product->brand_id) { ?>

                                    <option value="{{$brand->brand_id}}">{{ $brand->brand_name}}</option>
                                    <?php } else { ?>
                                    <option value="{{$brand->brand_id}}">{{ $brand->brand_name}}</option>

                                    <?php } ?>

                                    @endforeach
                                </select>
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('brand')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Unit</label>
                                <select required class="select" name="unit">
                                    <option value="Liter" {!!  $product->product_unit == "Liter" ? "selected" : "" !!}>Liter</option>
                                    <option value="ml" {!!  $product->product_unit == "ml" ? "selected" : "" !!}>Mille letter</option>
                                    <option value="Piece" {!!  $product->product_unit == "Piece" ? "selected" : "" !!}>Piece</option>
                                    <option value="Ft" {!!  $product->product_unit == "Ft" ? "selected" : "" !!}>Ft</option>
                                    <option value="Meter" {!!  $product->product_unit == "Meter" ? "selected" : "" !!}>Meter</option>
                                    <option value="Kg" {!!  $product->product_unit == "Kg" ? "selected" : "" !!}>Kg</option>
                                    <option value="Inch" {!!  $product->product_unit == "Inch" ? "selected" : "" !!}>Inch</option>
                                </select>
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('unit')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>SKU</label>
                                <input required type="text" name="SKU" value="{{old('name',$product->product_SKU)}}">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('SKU')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Price</label>
                                <input required type="text" name="price" value="{{old('name',$product->product_price)}}">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('price')
                                {{$message}}
                                @enderror
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Quantity</label>
                                <input required type="text" name="quantity" value="{{old('name',$product->product_qty)}}">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('quantity')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea name="pro_desc" class="form-control">{{$product->product_desc}}</textarea>
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('pro_desc')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label> Product Image</label>
                                <div class="">
                                    <input type="file" name="pro_image" class="form-control" value="{{ asset('storage/product_img/'.$product->product_img) }}">
                                </div>
                                <div class="text-danger">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('pro_image')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-12">
                            <div class="product-list">
                                <ul class="row">
                                    <li>
                                        <div class="productviews">
                                            <div class="productviewsimg">
                                                <img src="{{ URL::asset('storage/product_img/'.$product->product_img)}}" alt="img">
                                            </div>
                                            <div class="productviewscontent">
                                                <div class="productviewsname">
                                                    <h2>{{$product->product_img}}</h2>
                                                    <h3>581kb</h3>
                                                </div>
                                                <a href="javascript:void(0);" class="hideset">x</a>
                                            </div>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" name="submit" type="submit">Update</button>
                            <!-- <a href="{{url('productlist')}}" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /add -->
    </div>
</div>
@endsection
