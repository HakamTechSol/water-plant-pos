<?php $page = "Add Size - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Add Size @endslot
        @slot('title_1') Create new Size @endslot
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
                <form action="{{route('addsize')}}" method="post">
                    @csrf
                    <div class="row">
                        <div class="col-lg-4 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Category</label>
                                <select required class="select" name="category_name">
                                    <option>Choose Category</option>
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
                                <label>Size Name</label>
                                <input required type="text" name="size_name">
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
                                <input required type="text" name="size_category_code">
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
        <!-- /add -->
    </div>
</div>
@endsection