<?php $page="Specifications List - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')                
			@slot('title') Specification List @endslot
			@slot('title_1') Manage your Specifications @endslot
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
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                </div>
                <!-- /Filter -->
                <div class="table-responsive">
                    <table class="table datanew">
                        <thead>
                        <meta name="csrf-token" content="{{ csrf_token() }}">
                            <tr>
                                <th>S. No</th>
                                <th>Specification List</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                        @php
                            $sno=1;
                            @endphp
                            @foreach ($specification as $specification1)
                            <tr>
                                <td>{{$sno}}</td>
                                <td>{{$specification1->specificationname}}</td>
                                <td>{{$specification1->name}}</td>
                                <td class="text-center">
                                    <a data-bs-toggle="tooltip" data-bs-original-title="View Specification"  href="{{route('view_specification',[$specification1->id])}}" class="">
                                        <img src="{{ URL::asset('/assets/img/icons/eye1.svg')}}" class="me-2" alt="img">
                                    </a>
                                    <a data-bs-toggle="tooltip" data-bs-original-title="Edit Specification"  href="{{route('edit_specification',[$specification1->id])}}" class="">
                                        <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" class="me-2" alt="img">
                                    </a>
                                    <a data-bs-toggle="tooltip" data-bs-original-title="Delete Specification" onclick="deletespecification('{{$specification1->id}}')" class="">
                                        <img src="{{ URL::asset('/assets/img/icons/delete1.svg')}}" class="me-2" alt="img">
                                    </a>                                       
                                </td>
                            </tr>
                            @php
                            $sno++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection