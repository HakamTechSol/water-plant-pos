<?php $page = "Edit Purchase - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<style type="text/css">
    .comp_disabled {
        pointer-events: none;
        background-color: #ddd;
        border-color: #a8a8a8;
    }

    .button_disabled {
        pointer-events: none;
    }

    /*Select2 ReadOnly Start*/
    select[readonly].select2-hidden-accessible+.select2-container {
        pointer-events: none;
        touch-action: none;
    }

    select[readonly].select2-hidden-accessible+.select2-container .select2-selection {
        background: #eee;
        box-shadow: none;
    }

    select[readonly].select2-hidden-accessible+.select2-container .select2-selection__arrow,
    select[readonly].select2-hidden-accessible+.select2-container .select2-selection__clear {
        display: none;
    }

    /*Select2 ReadOnly End*/

</style>
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Edit Order @endslot
        @slot('title_1') Edit Order @endslot
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
                                <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="#" method="POST">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Customer Name</label>
                                                <input required type="text" name="customer_name">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Email</label>
                                                <input required type="text" name="customer_email">
                                                <div class="text-danger pt-2">
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Phone</label>
                                                <input required type="text" name="customer_phone">
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
                                                <input required type="text" name="customer_city">
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
                                                <input required type="text" name="customer_address">
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

                <form method="POST" action="{{ route('update.purchase', ['id' => $pur->id]) }}">
                    @csrf
                    <div class="row">
                        @if($errors->any())
                        {!! implode('', $errors->all('<div class="text-danger pt-2">:message</div>')) !!}
                        @endif
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Supplier</label>
                                <select class="select {!! $pur->status == 'complete' ? 'comp_disabled' : '' !!}" {!! $pur->status == 'complete' ? 'readonly' : '' !!} name="supplier_account">
                                    <option value="">Choose Supplier</option>
                                    @foreach ($suppliers as $customer1)
                                    <option value="{{$customer1->id}}" {{ ($customer1->id == $pur->supplier_id) ? 'selected':'' }}>{{$customer1->Name}}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>EDD</label>
                                <div class="input-groupicon">
                                    <input required type="text" placeholder="Choose Date" value="{{ $pur->delivery_date }}" name="delivery_date" class="datetimepicker {!! $pur->status == 'complete' ? 'comp_disabled' : '' !!}" {!! $pur->status == 'complete' ? 'readonly' : '' !!} >
                                    <a class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Choose Status</label>
                                <select class="select" title="Please Select Account" name="purchase_status">
                                    <option disabled hidden>Please Select Status</option>
                                    <option value="Return" {!! $pur->status == "Return" ? "selected" : '' !!}>Return</option>
                                    <option value="Recieved" {!! $pur->status == "Recieved" ? "selected" : '' !!}>Recieved</option>
                                    <option value="Pending" {!! $pur->status == "Pending" ? "selected" : '' !!}>Pending</option>
                                </select>
                                <input required type="hidden" value="{{ $pur->status }}" name="prev_purchase_status" />
                            </div>
                        </div>

                        <div class="col-lg-3 col-sm-9 col-9 mb-4">

                            <div class="form-group">
                                <label>Choose Account</label>
                                <select name="sale_account" class="select   "  title="Please Select Account">
                                    <option disabled hidden>Please Select Account</option>

                                    @foreach ($accounts as $acc)
                                    <option value="{{ $acc->id }}" {{ ($acc->id == $pur->account_id) ? 'selected':'' }}>{{ $acc->bank_name }}</option>
                                    @endforeach
                                    
                                </select>
                                <input required type="hidden" value="{{ $pur->account_id }}" name="prev_sale_account" />
                            </div>
                        </div> 

                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Purhcase Description</label>
                                <div class="input-groupicon">
                                    <textarea name="purchase_desc" class="{!! $pur->status == 'complete' ? 'comp_disabled' : '' !!}" {!! $pur->status == 'complete' ? 'readonly' : '' !!}>{!! $pur->purchase_desc !!}</textarea>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Product Name</label>
                                <div class="input-groupicon">
                                    <select   id="productlist" class="form-select form-select-sm select2 {!! $pur->status == 'complete' ? 'comp_disabled' : '' !!}" {!! $pur->status == 'complete' ? 'readonly' : '' !!} name="productName" aria-label=".form-select-sm example">
                                        <option selected>Please Select Products</option>
                                        @foreach ($products as $product1)
                                        <option value="{{$product1->product_id}}">{{$product1->product_id.' '.$product1->product_name}}</option>
                                        @endforeach
                                    </select>
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
                                    @foreach ($pro as $p)

                                    <tr>
                                        <td>{{$i}}</td>
                                        <td>
                                            <h6>{{ $p->product_info->product_name }}</h6>
                                            <p>{{-- $p->product_info->product_desc --}}</p>
                                        </td>
                                        <input required type="hidden" name="product_id[]" value="{{ $p->product_id }}">
                                        <input type="hidden" name="is_deleted[]" value="0">
                                        <td><input required onclick="this.readOnly=false" onchange="totol_price()" onblur="this.readOnly=true" readonly type="number" name="quantity[]" class="form-control {!! $pur->status == 'complete' ? 'comp_disabled' : '' !!}" {!! $pur->status == 'complete' ? 'readonly' : '' !!} value="{{ $p->quantity }}">
                                        <input type="hidden" name="old_quantity" value="{{ $p->quantity }}">
                                        </td>
                                        <td>{{ $p->product_info->product_unit}}</td>
                                        <td> <input required onclick="this.readOnly=false" onchange="totol_price()" onblur="this.readOnly=true" readonly type="number" class="form-control {!! $pur->status == 'complete' ? 'comp_disabled' : '' !!}" {!! $pur->status == 'complete' ? 'readonly' : '' !!} name="Amount[]" value="{{ $p->price }}"></td>
                                        <td>
                                            <input type="number" class="form-control" readonly id="subtotal" value="{{ $p->price * $p->quantity }}"/></td>
                                            <input type="hidden" name="product_price[]" value="{{ $p->price * $p->quantity }}">
                                        </td>
                                        <td>
                                            <a onclick="deleteProduct(this, 1)" class="delete-set"><i class="fa fa-trash" aria-hidden="true"></i></a>
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
                        <div class="col-lg-6 ">
                            <div class="total-order w-100 max-widthauto m-auto mb-4">
                                <ul>
                                    <li class="total">
                                        <h4>Total</h4>
                                        <input required type="number" name="total_amount" class="form-control" readonly value="{{ $pur->total_amount }}" id="totalamount">
                                        <!-- // <h5 id="totalamount">RS: 0.00</h5> -->
                                        <!-- <input required type="hidden"  /> -->
                                    </li>
                                    <div class="text-danger pt-2">
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

                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Tax (%)</label>
                                <input required onkeyup="grandtotalcalculator()" id="taxval" type="number" class="form-control {!! $pur->status == 'complete' ? 'comp_disabled' : '' !!}" {!! $pur->status == 'complete' ? 'readonly' : '' !!} name="tax" value="{!! $pur->tax !!}">
                                <span>PKR {!! ($pur->tax/100*$pur->total_amount) !!}</span>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Discount (%)</label>
                                <input required onkeyup="grandtotalcalculator()" id="discountval" type="number" class="form-control {!! $pur->status == 'complete' ? 'comp_disabled' : '' !!}" {!! $pur->status == 'complete' ? 'readonly' : '' !!} name="discount" value="{!! $pur->discount !!}">
                                <span>PKR {!! ($pur->discount/100*$pur->total_amount) !!}</span>
                            </div>
                        </div>

                        <div class="col-md-4">

                            <div class="form-group">
                                <label>Shipping Charges</label>
                                <input required onkeyup="grandtotalcalculator()" id="shippingcharges" type="number" class="form-control {!! $pur->status == 'complete' ? 'comp_disabled' : '' !!}" {!! $pur->status == 'complete' ? 'readonly' : '' !!} name="shipping_charges" value="{!! $pur->shipping_charges !!}">
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-lg-3 col-sm-6 col-12">
                                <div class="form-group">
                                    <label>Paid amount</label>
                                    <input required type="text" name="paid_amount" value="{{$pur->paid_amount}}" required>
                                    <!-- <input required type="hidden" name="prev_amt" value="{{$pur->paid_amount}}" /> -->
                                </div>
                            </div>
                        </div>
                        @php
                        $grand = ($pur->total_amount)-($pur->discount/100*$pur->total_amount)+($pur->shipping_charges)+($pur->tax/100*$pur->total_amount);
                        @endphp
                        <div class="col-lg-6 ">
                            <div class="total-order w-100 max-widthauto m-auto mb-4">
                                <ul>
                                    <li class="total">
                                        <h4>Grand Total</h4>
                                        <input required value="{{$grand}}" type="number" name="GrandTotal" class="form-control" readonly id="grandtotal">
                                        <input required type="hidden" name="prev_grandtotal" value="{{$grand}}" />
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-6"></div>
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update Order</button>
                            {{-- <a href="javascript:void(0);" class="btn btn-cancel">Cancel</a> --}}
                        </div>
                    </div>
                </form>

            </div>
        </div>
    </div>
</div>
@endsection
