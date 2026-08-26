<?php $page = "Edit Sales - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper"> 
    <div class="content"> 
        @component('components.pageheader')
        @slot('title') Edit Sale @endslot
        @slot('title_1') Edit your sale details @endslot
        @endcomponent
        <form action="{{ route('update.sales', ['id' => $sale->id]) }}" method="POST">
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
                                <label>Customer</label>
                                <select class="select" name="customer_id" required>
                                    <option value="{{ $sale->customer_id }}" selected>{{ $sale->customer_info->Name }}</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Date </label>
                                <div class="input-groupicon">
                                    <input required type="text" class="datetimepicker" name="sales_date" value="{{$sale->sales_date}}" required>
                                    <div class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                    </div>
                                </div>
                            </div>

                        </div>
                        @php
                        $pending = '';
                        $delivered='';
                        $return='';
                        if($sale->status == 'Pending'){
                            $pending = 'selected';
                            $delivered='';
                            $return='';
                        }
                        elseif($sale->status == 'Delivered'){
                            $delivered = 'selected';
                            $pending = '';
                            $return='';
                        }
                        elseif($sale->status == 'Return'){
                            $return = 'selected';
                            $pending = '';
                            $delivered='';
                        }
                        @endphp
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Status</label>
                                <select class="select" name="status" required>
                                    <option {{$pending}} value="Pending">Pending</option>
                                    <option {{$delivered}} value="Delivered">Delivered</option>
                                    <option {{$return}} value="Return">Return</option>
                                </select>
                                <!-- <input required type="hidden" name="prev_status" value="{{$sale->status}}" /> -->
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Account</label>
                                <select class="select" name="sale_account" required>
                                    @foreach ($accounts as $account)
                                    <option value="{{ $account->id }}" {{ ($account->id == $sale->account_id) ? 'selected':'' }}>{{ $account->bank_name }}</option>
                                    @endforeach
                                </select>
                                <!-- <input required type="hidden" value="{{$account->id}}" name="prev_sale_account"/> -->
                            </div>
                        </div>

                        <meta name="csrf-token" content="{{ csrf_token() }}">
                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <div class="input-groupicon">
                                    <select   id="productlist" class="form-select form-select-sm select2" name="productName" aria-label=".form-select-sm example">
                                        <option selected value="">Open this select menu</option>
                                        @foreach ($products as $product1)
                                        <option value="{{$product1->product_id}}">{{$product1->product_id.' '.$product1->product_name}}</option>
                                        @endforeach
                                    </select>
                                    <div class="text-danger">
                                        @error('0')
                                        {{$message}}
                                        @enderror
                                        @error('productName')
                                        {{$message}}
                                        @enderror
                                    </div>
                                    <div class="text-danger">
                                        @error('0')
                                        {{$message}}
                                        @enderror
                                        @error('product_id')
                                        {{$message}}
                                        @enderror
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
                                        $i=1;
                                        @endphp
                                        @foreach($sale_products as $product)
                                        <tr>
                                            <td>{{$i}}</td>
                                            @php
                                            $i=$i+1;
                                            @endphp
                                            <td>
                                                <h6>{{$product->product_info->product_name}}</h6>
                                                <p>{{-- $product->product_info->product_desc --}}</p>
                                            </td>
                                            <td>
                                                <input required type="hidden" name="product_id[]" value="{{$product->product_id}}" />
                                                <input type="hidden" name="is_deleted[]" value="0">
                                                <input required onclick="this.readOnly=false" onchange="totol_price()" oninput="total_price()" on onblur="this.readOnly=true" readonly type="number" name="quantity[]" value="{{$product->quantity}}" class="form-control">
                                                <input type="hidden" name="old_quantity" value="{{ $product->quantity }}">
                                            </td>
                                            <td>{{$product->product_info->product_unit}}</td>
                                            <td> <input required onclick="this.readOnly=false" onchange="totol_price()" onblur="this.readOnly=true" readonly type="number" class="form-control" value="{{$product->price}}" name="Amount[]"></td>
                                            <td><input type="number" class="form-control" readonly id="subtotal" value="{{$product->price*$product->quantity}}"/>
                                            <input type="hidden" name="product_price[]" value="{{ $product->price * $product->quantity }}"></td>
                                            <td>
                                                <a onclick="deleteProduct(this, 1)" class="delete-set"><i class="fa fa-trash" aria-hidden="true"></i></a>
                                            </td>
                                        </tr>
                                        @endforeach


                                        <!-- <tr>
                                            <td>2</td>
                                            <td class="productimgname">
                                                <a class="product-img">
                                                    <img src="{{ URL::asset('/assets/img/product/product1.jpg')}}" alt="product">
                                                </a>
                                                <a href="javascript:void(0);">Macbook pro</a>
                                            </td>
                                            <td>1.00</td>
                                            <td>1500.00</td>

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

                            <div class="row">

                                <div class="col-lg-6 ">
                                    <div class="total-order w-100 max-widthauto m-auto mb-4">
                                        <ul>

                                            <li class="total">
                                                <h4>Total</h4>
                                                <input required type="number" value="{{$sale->total_amount}}" class="form-control" readonly name="total_amount" id="totalamount">
                                            </li>
                                            <div class="text-danger">
                                                @error('0')
                                                {{$message}}
                                                @enderror
                                                @error('total_amount')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>

                                <div class="col-lg-3 col-sm-9 col-9 mb-4">

                                    <div class="form-group">
                                        <label>Tax (%)</label>
                                        <input required onkeyup="grandtotalcalculator()" id="taxval" type="number" class="form-control" name="tax" value="{{$sale->tax}}">
                                        <span>PKR {!! ($sale->tax/100*$sale->total_amount) !!}</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-9 col-9 mb-4">

                                    <div class="form-group">
                                        <label>Discount (%)</label>
                                        <input required onkeyup="grandtotalcalculator()" id="discountval" type="number" class="form-control" name="discount" value="{{$sale->discount}}">
                                        <span>PKR {!! ($sale->discount/100*$sale->total_amount) !!}</span>
                                    </div>
                                </div>

                                <div class="col-lg-3 col-sm-9 col-9 mb-4">

                                    <div class="form-group">
                                        <label>Shipping Charges</label>
                                        <input required onkeyup="grandtotalcalculator()" id="shippingcharges" type="number" class="form-control" name="shipping_charges" value="{{$sale->shipping_charges}}">
                                    </div>
                                </div>
                                @php
                                $grand = ($sale->total_amount)-($sale->discount/100*$sale->total_amount)+($sale->shipping_charges)+($sale->tax/100*$sale->total_amount);
                                if($sale->Sale_type == 'Official'){
                                $official = 'selected';
                                $unofficial = '';
                                }
                                elseif($sale->Sale_type == 'Unofficial'){
                                $official = '';
                                $unofficial = 'selected';
                                }
                                @endphp
                                <div class="col-lg-3 col-sm-9 col-9 mb-4">
                                    <div class="form-group">
                                        <label>Save As</label>
                                        <select class="select" title="Please Select Type" name="sale_type">
                                            <option {!! $official !!} value="Official">Pure Water</option>
                                            <option {!! $unofficial !!} value="Unofficial">Water Care House</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="col-lg-3 col-sm-6 col-12">
                                    <div class="form-group">
                                        <label>Paid amount</label>
                                        <input required type="text" name="paid_amount" value="{{$sale->paid_amount}}" required>
                                        <!-- <input required type="hidden" name="prev_amt" value="{{$sale->paid_amount}}" /> -->
                                    </div>
                                </div>
                                <div class="col-lg-9"></div>
                                <div class="col-lg-6 ">
                                    <div class="total-order w-100 max-widthauto m-auto mb-4">
                                        <ul>
                                            <li class="total">
                                                <h4>Grand Total</h4>
                                                <input required value="{{$grand}}" type="number" class="form-control" readonly id="grandtotal">
                                                <!-- // <h5 id="totalamount">RS: 0.00</h5> -->
                                                <!-- <input required type="hidden"  /> -->
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                                <div class="col-lg-6"></div>
                            </div>
                            <div class="col-lg-12">
                                <button class="btn btn-submit me-2" type="submit">Update Sales</button>
                                {{-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> --}}
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </form>

    </div>
</div>
</div>
@endsection
