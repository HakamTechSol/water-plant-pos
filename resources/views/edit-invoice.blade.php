<?php $page="Create Invoice";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Invoice Edit @endslot
        @slot('title_1') Update Invoice @endslot
        @endcomponent
        <div class="card">
            <div class="card-body">
                <form action="{{ route('update.invoice', ['id' => $invoice->id]) }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Costumer Name</label>
                                <select class="select" name="customer_id" id="customerIdLoad" required>
                                    {{-- <option selected disabled>Please Select Customer</option> --}}
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}" {{ ($customer->id == $invoice->customer_id)? 'selected':'' }}>{{ $customer->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Save As</label>
                                <select class="select" name="save_as" required>
                                    {{-- <option selected disabled>Please Select Invoice Type</option> --}}
                                    <option value="official" {{ ($invoice->invoice_type == 'official')? 'selected':'' }}>Official</option>
                                    <option value="unofficial" {{ ($invoice->invoice_type == 'unofficial')? 'selected':'' }}>Un-Official</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Invoice Date </label>
                                <div class="input-groupicon">
                                    <input type="text" placeholder="DD-MM-YYYY" value="{{ $invoice->quote_date }}" class="datetimepicker" name="quote_date" required>
                                    <div class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Please Select List</label>
                                <select class="select" id="saleDropDown" name="sale_id">
                                    <option selected disabled>Sales List</option>
                                    @foreach ($invoice_sale as $sale)
                                    <option value="{{ $sale->id }}">{{ $sale->sales_info->sales_date }} & {{ $sale->sales_info->total_amount }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="table-responsive">
                            <table class="table">
                                <thead>
                                    <tr>
                                        <th>User</th>
                                        <th>Total Amount </th>
                                        <th>Date</th>
                                        <th>Status</th>
                                        {{-- <th></th> --}}
                                    </tr>
                                </thead>
                                <tbody id="invoiceJunc">
                                    @foreach ($invoice_sale as $info)
                                    <tr>
                                        <td>{{ $info->sale_id }}</td>
                                        <td id="totalAmount"><input type="hidden" name="sale_amount[]" value="{{ $info->sales_info->total_amount }}">{{ $info->sales_info->total_amount }}</td>
                                        <td><input type="hidden">{{ $info->sales_info->sales_date }}</td>
                                        <td>{{ $info->sales_info->status }}</td>
                                        <td>
                                            <input type="hidden" name="sale_id[]" value="{{ $info->sales_info->id }}">
                                            <a class="delete-set"><i class="fa fa-trash"></i></a>
                                        </td>
                                    </tr>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12 float-md-right">
                            <div class="total-order">
                                <ul>
                                    <li class="total">
                                        <h4>Grand Total</h4>
                                        <h5 id="totalamount">$ 0.00</h5>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-lg-12">
                            <button type="submit" class="btn btn-submit me-2">Update Invoice</button>
                            {{-- <a href="{{url('invoicelist')}}" class="btn btn-cancel">Cancel</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
