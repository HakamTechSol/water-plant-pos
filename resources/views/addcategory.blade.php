<?php $page="Add Category - Pure Water";?>
@extends('layout.mainlayout')
@section('content')		
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')                
			@slot('title') Product Add Category @endslot
			@slot('title_1') Create new product Category @endslot
		@endcomponent
        <!-- /add -->
        <div class="card">
            <form action="{{route('add-category')}}" method="POST" >
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
                            <input required type="text" name="category_name">
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
                            <input required type="text"  name="category_code">
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
	  