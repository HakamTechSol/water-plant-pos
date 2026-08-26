<?php $page = "Add Product - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Product Add @endslot
        @slot('title_1') Create new product @endslot
        @endcomponent
        <div class="modal fade" id="Addsize" tabindex="-1" aria-labelledby="Addsize" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Size</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('addsize')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Parent Category</label>
                                <select required  class="select" name="category_name">
                                    <option value="">Choose Category</option>
                                    @foreach ($category as $category1)
                                    <option value="{{$category1->id}}">{{$category1->category_name}}</option>
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
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Size</label>
                                <input required  type="text" name="size_name">
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
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category Code</label>
                                <input required  type="text" name="size_category_code">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('size_category_code')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="size_desc"></textarea>
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('size_desc')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" name="submit " type="submit">Submit</button>
                            <!-- <a href="{{url('sizelist')}}" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </form>
                    </div>
                </div>

            </div>
        </div>
        <!-- for add category -->
        <div class="modal fade" id="Addcategory" tabindex="-1" aria-labelledby="Addcatergory" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="exampleModalLabel">Add Category</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                    </div>
                    <div class="modal-body">
                    <form action="{{route('add-category')}}" method="POST" >
                    @csrf
                    <div class="card-body">
                        <div class="row">
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category Name</label>
                                    <input required  type="text" name="category_name">
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
                            <div class="col-lg-6 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Category Code</label>
                                    <input required  type="text"  name="category_code">
                                </div>
                           
                            <div class="text-danger">
                                @error('0')
                                    {{$message}}
                                @enderror
                                @error('category_code')
                                    {{$message}}
                                @enderror
                            </div>
                            </div>
                            <div class="col-lg-12">
                                <div class="form-group">
                                    <label>Description</label>
                                    <textarea class="form-control" name="category_desc"></textarea>
                                </div>
                            <div class="text-danger">
                                @error('0')
                                    {{$message}}
                                @enderror
                                @error('category_desc')
                                    {{$message}}
                                @enderror
                            </div>
                          
                            </div>
                            <div class="col-lg-12">
                                <button type="submit" name="submit" class="btn btn-submit me-2">Submit</button>
                               
                            </div>
                        </div>
                    </div>
                    </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
        <!-- end add category -->
        
        <!-- for add brands -->
        <div class="modal fade" id="Addbrands" tabindex="-1" aria-labelledby="Addbrands" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Brand</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                            <form action="{{route('addbrand1')}}" method="post" enctype="multipart/form-data">
            @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-lg-8 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Brand Name</label>
                                <input required  type="text" name="brand_name">
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
                                    <input required  type="file" name="brand_image">
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
                        </div>
                    </div>
                </div>
        </form>
                            </div>
                            
                        </div>
                    </div>
                </div>
        <!-- for end brands -->
        <form action="{{route('add_product')}}" method="POST" enctype="multipart/form-data">
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
                                <input required  type="text" name="product_name">
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
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select required  class="select" id="category_name" onchange="get_brands()" name="category_name">
                                    <option value="">Choose Category</option>
                                    @foreach($category as $category1)
                                    <option value="{{$category1->id}}">{{$category1->category_name}}</option>
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
                        <div class="col-lg-1 col-sm-3 col-3 ">
                                        <button style="margin-top:20px" class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Addcategory">
                                            <div class="add-icon">
                                                <span><img src="{{ URL::asset('/assets/img/icons/plus1.svg')}}" alt="img"></span>
                                            </div>
                                        </button>
                                    </div>
                       
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Size</label>
                                <select class="select" id="size" name="size_name">
                                    <option value="">Choose Size</option>
                                  
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
                        <div class="col-lg-1 col-sm-3 col-3 ">
                        <button style="margin-top:20px" class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Addsize">
                            <div class="add-icon">
                                <span><img src="{{ URL::asset('/assets/img/icons/plus1.svg')}}" alt="img"></span>
                            </div>
                        </button>
                    </div>
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Brand</label>
                                <select required  class="select" name="brand">
                                    <option value="">Choose Brand</option>
                                    @foreach($brands as $brand)
                                    <option value="{{$brand->brand_id}}">{{$brand->brand_name}}</option>
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
                        <div class="col-lg-1 col-sm-3 col-3 ">
                                        <button style="margin-top:20px" class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#Addbrands">
                                            <div class="add-icon">
                                                <span><img src="{{ URL::asset('/assets/img/icons/plus1.svg')}}" alt="img"></span>
                                            </div>
                                        </button>
                                    </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Unit</label>
                                <select required  class="select" name="unit">
                                    <option value="">Choose Unit</option>
                                    <option value="Liter">Liter</option>
                                    <option value="ml">Mille letter</option>
                                    <option value="Piece">Piece</option>
                                    <option value="Ft">Ft</option>
                                    <option value="Meter">Meter</option>
                                    <option value="Kg">Kg</option>
                                    <option value="Inch">Inch</option>
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
                                <input required  type="text" name="SKU">
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
                                <input required  type="text" name="price">
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
                                <input required  type="text" name="quantity">
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
                                <textarea class="form-control" name="pro_desc"></textarea>
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
                                    <input type="file" name="pro_image" class="form-control">
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
                        <div class="col-lg-12">
                            <button class="btn btn-submit me-2" type="submit" name="submit">Submit</button>
                            <!-- <a href="{{url('productlist')}}" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </div>
</div>
@endsection