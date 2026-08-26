<?php $page = "Edit Size - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Product Edit Size @endslot
        @slot('title_1') Create new product Size @endslot
        @endcomponent
        <form action="{{route('editsize2',[$size->size_id])}}" method="post">
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
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select required class="select" name="category_name">
                                    @foreach ($category as $category1)
                                        <!-- @@if($category1->id == old('size_name',$size->cate_id)) -->
                                        <?php if($category1->id == old('category_name',$size->cate_id)){?>
                                        <option value="{{$category1->id}}" selected>{{$category1->category_name}}</option>
                                        <?php }else{ ?>
                                            <option value="{{$category1->id}}">{{$category1->category_name}}</option>
                                        <?php }?>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Size Name</label>
                                <input required type="text" name="size_name" value="{{old('size_name',$size->size_name)}}">
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
                                <input required type="text" name="size_cate_code" value="{{old('size_cate_code',$size->size_cate_code)}}">
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('size_cate_code')
                                {{$message}}
                                @enderror
                            </div>
                        </div>
                        <div class="col-lg-12">
                            <div class="form-group">
                                <label>Description</label>
                                <textarea class="form-control" name="size_desc">{{old('size_desc',$size->size_desc)}}</textarea>
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
                            <button class="btn btn-submit me-2" type="submit">Submit</button>
                            <!-- <a href="{{url('sizelist')}}" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </div>
            </div>
        </form>
        <!-- /add -->
    </div>
</div>
@endsection