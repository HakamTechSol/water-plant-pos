<?php $page="Product List - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Product List @endslot
        @slot('title_1') Manage your products @endslot
        @endcomponent
        <meta name="csrf-token" content="{{ csrf_token() }}">
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
                        <div class="search-path">
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset">
                                <img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            {{-- <li>
                                <a data-bs-toggle="tooltip" href="{{  URL::to('product_export_pdf') }}" data-bs-placement="top" title="pdf"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" href="{{ route('product.export') }}" data-bs-placement="top" title="excel"><img src="{{ URL::asset('/assets/img/icons/excel.svg')}}" alt="img"></a>
                            </li> --}}
                            {{-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ URL::asset('/assets/img/icons/printer.svg')}}" alt="img"></a>
                            </li> --}}
                        </ul>
                    </div>
                </div>
                <meta name="csrf-token" content="{{ csrf_token() }}">
                <div class="table-responsive">
                    <table class="table datanew" id="producttble">
                        <thead>
                            <tr>
                                <th>S. No</th>
                                <th>Product Name</th>
                                <th>SKU</th>
                                <th>Category</th>
                                <th>Size</th>
                                <th>Brand</th>
                                <th>Price</th>
                                <th>Unit</th>
                                <th>Qty</th>
                                <th>Created By</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sno=1;
                            @endphp
                            @foreach ($products as $product)
                                @if($product->product_qty <= $product->product_SKU)
                                @php
                                    $color = '#ffc9bb';
                                    @endphp
                                @else
                                @php
                                    $color = 'white';
                                    @endphp
                                @endif
                            <tr style="background-color: {{$color}}">
                                <td>{{$sno}}</td>
                                <td>
                                    <a href="javascript:void(0);" class="product-img">
                                    <img src="{{ asset('storage/product_img/'.$product->product_img)}}" alt="product">

                                        
                                    </a>
                                    <a href="javascript:void(0);">{{$product->product_name}}</a>
                                </td>
                                <td>{{$product->product_SKU}}</td>
                                <td>{{$product->category_name}}</td>
                                <td>{{$product->size_name}}</td>
                                <td>{{$product->brand_name}}</td>
                                <td>PKR {{$product->product_price}}</td>
                                <td>{{$product->product_unit}}</td>
                                <td>{{$product->product_qty}}</td>
                                <td>{{$product->name}}</td>
                                <td>
                                    <a class="me-3" href="{{route('productdetail',[$product->product_id])}}">
                                        <img src="{{ URL::asset('/assets/img/icons/eye.svg')}}" alt="img">
                                    </a>
                                    <a class="me-3" href="{{route('editproduct',[$product->product_id])}}">
                                        <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" alt="img">
                                    </a>
                                    <!-- <a class=" product_del_btn"  data-id="{{ $product->product_id }}">
                                    <img src="{{ URL::asset('/assets/img/icons/delete.svg')}}" alt="img">
                                    </a> -->
                                    <a class="product_del_btn" data-id="{{ $product->product_id }}">
                                        <img src="{{ URL::asset('/assets/img/icons/delete.svg')}}" alt="img">
                                    </a>
                                </td>
                            </tr>
                            @php
                            $sno++;
                            @endphp
                            @endforeach
                            <!--
                            <tr>
                                <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td>
                                <td class="productimgname">
                                    <a href="javascript:void(0);" class="product-img">
                                        <img src="{{ URL::asset('/assets/img/product/product17.jpg')}}" alt="product">
                                    </a>
                                    <a href="javascript:void(0);">Limon</a>
                                </td>
                                <td>PT0011</td>
                                <td>Health Care	</td>
                                <td>N/D</td>
                                <td>10.00</td>
                                <td>kg</td>
                                <td>100.00</td>
                                <td>Admin</td>
                                <td>
                                    <a class="me-3" href="{{url('product-details')}}">
                                        <img src="{{ URL::asset('/assets/img/icons/eye.svg')}}" alt="img">
                                    </a>
                                    <a class="me-3" href="{{url('editproduct')}}">
                                        <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" alt="img">
                                    </a>
                                    <a class="confirm-text" href="javascript:void(0);">
                                        <img src="{{ URL::asset('/assets/img/icons/delete.svg')}}" alt="img">
                                    </a>
                                </td>
                            </tr> -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- /product list -->
    </div>
</div>
@endsection
