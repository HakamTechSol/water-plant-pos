<?php $page = "Add Quotation - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Add Quotation @endslot
        @slot('title_1') Add New Quotation @endslot
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
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Add Customer</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('addcustomeronsales')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Customer Name</label>
                                                <input required type="text" name="customer_name">

                                                <div class="text-danger">
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
                                                <input required type="text" name="customer_email">
                                                <div class="text-danger">
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
                                                <input required type="text" name="customer_phone">
                                                <div class="text-danger">
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
                                                <label>Country</label>
                                                <input required type="text" name="country">
                                                <div class="text-danger">
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
                                                <input required type="text" name="customer_city">
                                                <div class="text-danger">
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
                                                <input required type="text" name="customer_address">
                                                <div class="text-danger">
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
                                                <div class="text-danger">
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

                <form method="POST" action="{{ route('store.quote') }}">
                    @csrf
                    <div class="row">
                        <div class="col-lg-2 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Customer</label>
                                <select class="select" name="customer_id" required>
                                    <option selected disabled>Choose Customer</option>
                                    @foreach ($customers as $customer1)
                                    <option value="{{$customer1->id}}">{{$customer1->Name}}</option>
                                    @endforeach
                                </select>
                                <div class="text-danger">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('customer')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-1 col-sm-1 col-3 ps-0">
                            <button style="margin-top:20px" class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                <div class="add-icon">
                                    <span><img src="{{ URL::asset('/assets/img/icons/plus1.svg')}}" alt="img"></span>
                                </div>
                            </button>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date</label>
                                <div class="input-groupicon">
                                    <input type="text" placeholder="Choose Date" name="quote_date" class="datetimepicker" required>
                                    <a class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Plant</label>
                                <select class="select" name="plant_id" id="plantId">
                                    <option value="">Choose Plant</option>
                                    @foreach ($plants as $plant)
                                    <option value=" {{$plant->id}}">{{$plant->plant_name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Save As</label>
                                <select class="select" title="Please Select Type" name="quote_type">
                                    <option>Please Select Option</option>
                                    <option value="Official">Official</option>
                                    <option value="Unofficial">Unofficial</option>
                                </select>
                            </div>
                            <div class="text-danger">
                                @error('0')
                                {{$message}}
                                @enderror
                                @error('quote_type')
                                {{$message}}
                                @enderror
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
                                    <!-- <input type="text" placeholder="Please type product code and select...">
                                <div class="addonset">
                                    <img src="{{ URL::asset('/assets/img/icons/scanners.svg')}}" alt="img">
                                </div> -->
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
                                    <!-- <tr>
                                    <td>1</td>
                                    <td class="productimgname">
                                        <a class="product-img">
                                            <img src="{{ URL::asset('/assets/img/product/product7.jpg')}}" alt="product">
                                        </a>
                                        <a href="javascript:void(0);">Apple Earpods</a>
                                    </td>
                                    <td><input onclick="" onblur="" readonly type="number" name="quantity[]" class="form-control"></td>
                                    <td> <input onclick="" readonly type="number" class="form-control" name="Amount[]"></td>
                                    <td>1500.00</td>
                                    <td>
                                        <a href="javascript:void(0);" class="delete-set"><img src="{{ URL::asset('/assets/img/icons/delete.svg')}}" alt="svg"></a>
                                    </td>
                                </tr> -->


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
                            <div class="col-lg-6 ">
                                <div class="total-order w-100 max-widthauto m-auto mb-4">
                                    <ul>
                                        <!-- <li>
                                    <h4>Shipping</h4>
                                    <h5>$ 0.00</h5>
                                </li> -->
                                        <li class="total">
                                            <h4>Total</h4>
                                            <input type="number" class="form-control" readonly name="totalamount" id="totalamount">
                                            <!-- // <h5 id="totalamount">RS: 0.00</h5> -->
                                            <!-- <input type="hidden"  /> -->
                                        </li>
                                        <div class="text-danger">
                                            @error('0')
                                            {{$message}}
                                            @enderror
                                            @error('totalamount')
                                            {{$message}}
                                            @enderror
                                        </div>
                                    </ul>
                                </div>
                            </div>

                            <div class="col-lg-6"></div>
                            <div class="col-lg-3 col-sm-6">
                                <div class="form-group">
                                    <label>Validity</label>
                                    <div class="input-groupicon">
                                        <input type="text" placeholder="Choose Date" name="quote_validity" class="datetimepicker" required>
                                        <a class="addonset">
                                            <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                        </a>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-9 col-9 mb-4">
                                <div class="form-group">
                                    <label>Tax (%)</label>
                                    <input onkeyup="grandtotalcalculator()" id="taxval" type="number" name="tax" value="0" class="form-control">
                                    <span></span>
                                </div>
                                <div class="text-danger">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('tax')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-9 col-9 mb-4">
                                <div class="form-group">
                                    <label>Discount (%)</label>
                                    <input onkeyup="grandtotalcalculator()" id="discountval" type="number" class="form-control" name="discount" value="0">
                                    <span></span>
                                </div>
                                <div class="text-danger">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('discount')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-3 col-sm-9 col-9 mb-4">
                                <div class="form-group">
                                    <label>Shipping Charges</label>
                                    <input onkeyup="grandtotalcalculator()" id="shippingcharges" type="number" class="form-control" name="shipping_charges" value="0">
                                </div>
                                <div class="text-danger">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('shipping_charges')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                            <div class="col-lg-6 ">
                                <div class="total-order w-100 max-widthauto m-auto mb-4">
                                    <ul>
                                        <li class="total">
                                            <h4>Grand Total</h4>
                                            <input type="number" class="form-control" readonly id="grandtotal">
                                            <!-- // <h5 id="totalamount">RS: 0.00</h5> -->
                                            <!-- <input type="hidden"  /> -->
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <div class="col-lg-6"></div>
                        </div>

                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Submit</button>
                            <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> -->
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
