<?php $page = "Add Purchase - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Add Purchase @endslot
        @slot('title_1') Add your New Purchase @endslot
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
                                <h5 class="modal-title" id="exampleModalLabel">Add Supplier</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">X</button>
                            </div>
                            <div class="modal-body">
                                <form action="{{route('add-supplier')}}" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Supplier Name</label>
                                                <input required type="text" name="name">

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
                                                <input required type="text" name="email">
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
                                                <input required type="text" name="phone" maxlength="11" >
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
                                                <label>Company Name</label>
                                                <input required type="text" name="company">
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$company}}
                                                    @enderror
                                                    @error('company')
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
                                                <input required type="text" name="city">
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
                                                <input required type="text" name="address">
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$customer_address}}
                                                    @enderror
                                                    @error('address')
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

                <form method="POST" action="{{ route('store.purchase') }}">
                    @csrf
                    <div class="row">
                        @if($errors->any())
                            {!! implode('', $errors->all('<div class="text-danger pt-2">:message</div>')) !!}
                        @endif
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Select Supplier</label>
                                <div class="row">
                                    <div class="col-lg-9 col-sm-9 col-9">

                                        <select class="select" name="supplier_account" required="">
                                            <option hidden selected value="">Please Select Supplier</option>
                                            @foreach ($suppliers as $customer1)
                                            <option value="{{$customer1->id}}">{{$customer1->Name}}</option>
                                            @endforeach
                                        </select>

                                    </div>

                                    <div class="col-lg-3 col-sm-3 col-3 ps-0">
                                        <button style="margin-top:-10px" class="btn" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
                                            <div class="add-icon">
                                                <span><img src="{{ URL::asset('/assets/img/icons/plus1.svg')}}" alt="img"></span>
                                            </div>
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>EDD</label>
                                <div class="input-groupicon">
                                    <input required type="text" placeholder="Choose Date" name="delivery_date" class="datetimepicker" required>
                                    <a class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Status</label>
                                <select class="select" title="Please Select Account" name="purchase_status" required>
                                    <option disabled hidden>Please Select Account</option>
                                    <option value="Recieved">Recieved</option>
                                    <option value="Pending">Pending</option>
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-9 col-9 mb-4">

                            <div class="form-group">
                                <label>Choose Account</label>
                                <select class="select" title="Please Select Account" name="sale_account" required>
                                    <option disabled hidden>Please Select Account</option>

                                    @foreach ($accounts as $acc)
                                    <option value="{{ $acc->id }}">{{ $acc->bank_name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Purhcase Description</label>
                                <div class="input-groupicon">
                                    <textarea name="purchase_desc"></textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <div class="input-groupicon">
                                    <select  id="productlist" class="form-select form-select-sm select2" name="productName" aria-label=".form-select-sm example">
                                        <option selected>Open this select menu</option>
                                        @foreach ($products as $product1)
                                        <option value="{{$product1->product_id}}">{{$product1->product_id.' '.$product1->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger pt-2">
                                        @error('0')
                                        {{$message}}
                                        @enderror
                                        @error('productName')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <!-- <input required type="text" placeholder="Please type product code and select...">
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
                                    <td><input required onclick="" onblur="" readonly type="number" name="quantity[]" class="form-control"></td>
                                    <td> <input required onclick="" readonly type="number" class="form-control" name="Amount[]"></td>
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
                        <div class="col-lg-6 ">
                            <div class="total-order w-100 max-widthauto m-auto mb-4">
                                <ul>
                                    <!-- <li>
                                    <h4>Shipping</h4>
                                    <h5>$ 0.00</h5>
                                </li> -->
                                    <li class="total">
                                        <h4>Total</h4>
                                        <input required type="number" class="form-control" readonly name="total_amount" id="totalamount">
                                        <!-- // <h5 id="totalamount">RS: 0.00</h5> -->
                                        <!-- <input required type="hidden"  /> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Tax (%)</label>
                                <input required onkeyup="grandtotalcalculator()" id="taxval" type="number" class="form-control" name="tax" value="0">
                                <span></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Discount (%)</label>
                                <input required onkeyup="grandtotalcalculator()" id="discountval" type="number" class="form-control" name="discount" value="0">
                                <span></span>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label>Shipping Charges</label>
                                <input required onkeyup="grandtotalcalculator()" id="shippingcharges" type="number" class="form-control" name="shipping_charges" value="0">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Paid amount</label>
                                    <input required type="number" name="paidamount" class="form-control">
                                </div>
                                <div class="text-danger">
                                    @error('0')
                                    {{$message}}
                                    @enderror
                                    @error('paidamount')
                                    {{$message}}
                                    @enderror
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-6 ">
                            <div class="total-order w-100 max-widthauto m-auto mb-4">
                                <ul>
                                    <!-- <li>
                                    <h4>Shipping</h4>
                                    <h5>$ 0.00</h5>
                                </li> -->
                                    <li class="total">
                                        <h4>Grand Total</h4>
                                        <input required type="number" class="form-control" name="GrandTotal" readonly id="grandtotal">
                                        <!-- // <h5 id="totalamount">RS: 0.00</h5> -->
                                        <!-- <input required type="hidden"  /> -->
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Add Purchase</button>
                            <!-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a>  -->
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
