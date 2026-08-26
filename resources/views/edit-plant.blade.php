<?php $page = "Edit Plant - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Edit Plant @endslot
        @slot('title_1') Edit you existing plant. @endslot
        @endcomponent
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
        <div class="card">

            <div class="card-body">
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('addcustomeronsales')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Customer Name</label>
                                                <input type="text" name="customer_name">

                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$customer_name}}
                                                    @enderror
                                                    @error('customer_name')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="text" name="customer_email">
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$customer_email}}
                                                    @enderror
                                                    @error('customer_email')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input type="text" name="customer_phone">
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$customer_phone}}
                                                    @enderror
                                                    @error('customer_phone')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Choose Country</label>
                                                <select class="select" name="country">
                                                    <option>Choose Country</option>
                                                    <option value="India">India</option>
                                                    <option value="USA">USA</option>
                                                    <option value="pakistan">pakistan</option>
                                                    <option value="UAE">UAE</option>

                                                </select>
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$country}}
                                                    @enderror
                                                    @error('country')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-3 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>City</label>
                                                <input type="text" name="customer_city">
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$customer_city}}
                                                    @enderror
                                                    @error('customer_city')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-9 col-12">
                                            <div class="form-group">
                                                <label>Address</label>
                                                <input type="text" name="customer_address">
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$customer_address}}
                                                    @enderror
                                                    @error('customer_address')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <div class="form-group">
                                                <label>Description</label>
                                                <textarea class="form-control" name="description"></textarea>
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$description}}
                                                    @enderror
                                                    @error('description')
                                                    {{$message}}
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-12">
                                            <button class="btn btn-submit me-2" type="submit">Submit</button>
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                            <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                                        </div>
                                    </div>

                                </form>
                            </div>
                            <div class="modal-footer">

                                <!-- <button type="button" class="btn btn-primary">Save changes</button> -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- for add sales -->

                <form method="POST" action="{{ route('update.plant', ['id' => $plant->id]) }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Plane Name</label>
                                <input type="text" placeholder="Please Enter Name Of Plant" value="{{ $plant->plant_name }}" name="plant_name" required>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Purchase Date</label>
                                <div class="input-groupicon">
                                    <input type="text" placeholder="Choose Date" value="{{ $plant->date }}" name="date" class="datetimepicker" required>
                                    <a class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                    </a>
                                </div>
                            </div>
                        </div>


                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <div class="input-groupicon">
                                    <select   id="productlist" class="form-select form-select-sm select2" name="productName" aria-label=".form-select-sm example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($products as $product1)
                                        <option value="{{$product1->product_id}}">{{$product1->product_id.' '.$product1->product_name}}</option>
                                        @endforeach
                                    </select>
                                </div>
                            </div>
                        </div>

                    </div>
                    <div class="row">
                        <div class="table-responsive mb-3">
                            <table class="table" id="producttable1">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Product Name</th>
                                        <th>QTY</th>
                                        <th>Unit</th>
                                        <th>Price</th>
                                        <th>Subtotal</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody id="producttable">
                                    @php
                                    $i = 1;
                                    @endphp
                                    @foreach ($plant_products as $pro)

                                    <tr>
                                        <td>{{ $i }}</td>
                                        <td>
                                            <h6>{{ $pro->product_info->product_name }}</h6>
                                            <p> {{-- $pro->product_info->product_desc --}}</p>
                                        </td>
                                        <input type="hidden" name="product_id[]" value="{{ $pro->product_info->product_id }}">
                                        <input type="hidden" name="is_deleted[]" value="0">
                                        <td><input onchange="totol_price()" onblur="" value="{{ $pro->quantity }}" type="number" name="quantity[]" class="form-control"></td>
                                        <td>{{ $pro->product_info->product_unit }}</td>
                                        <td> <input onchange="totol_price()" type="number" value="{{ $pro->amount }}" class="form-control" name="Amount[]"></td>
                                        <td><input type="number" class="form-control" readonly id="subtotal" value="{{ $pro->amount }}"/></td>
                                        <td>
                                            <a onclick="deleteProduct(this)" class="delete-set"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                        </td>
                                    </tr>

                                    @php
                                    $i++;
                                    @endphp

                                    @endforeach



                                </tbody>
                            </table>
                        </div>
                    </div>

                    <div class="row">

                        <!-- <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Discount</label>
                            <input type="text" >
                        </div>
                    </div> -->
                        <!-- <div class="col-lg-3 col-sm-6 col-12">
                        <div class="form-group">
                            <label>Shipping</label>
                            <input type="text" >
                        </div>
                    </div> -->

                        <div class="row">
                            <!-- <div class="col-lg-6 ">
                            <div class="total-order w-100 max-widthauto m-auto mb-4">
                                <ul>
                                    <li>
                                        <h4>Order Tax</h4>
                                        <h5>$ 0.00 (0.00%)</h5>
                                    </li>
                                    <li>
                                        <h4>Discount	</h4>
                                        <h5>$ 0.00</h5>
                                    </li>
                                </ul>
                            </div>
                        </div> -->
                            <div class="col-lg-6 ">
                                <div class="total-order w-100 max-widthauto m-auto mb-4">
                                    <ul>
                                        <!-- <li>
                                        <h4>Shipping</h4>
                                        <h5>$ 0.00</h5>
                                    </li> -->
                                        <li class="total">
                                            <h4>Grand Total</h4>
                                            <input type="number" readonly class="form-control" value="{{ $plant->total_amount }}" name="total_amount" id="totalamount">
                                            <!-- // <h5 id="totalamount">RS: 0.00</h5> -->
                                            <!-- <input type="hidden"  /> -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update Plant</button>
                            {{-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> --}}
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
