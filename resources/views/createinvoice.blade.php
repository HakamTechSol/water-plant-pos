<?php $page="Create Invoice";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Invoice Add @endslot
        @slot('title_1') Add Invoice @endslot
        @endcomponent
        <div class="card">
            <div class="card-body">
                <form action="{{ route('invoice.store') }}" method="POST">
                    @csrf
                    <div class="row">

                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Costumer Name</label>
                                <select class="select" name="customer_id" id="customerId" required>
                                    <option selected disabled>Please Select Customer</option>
                                    @foreach ($customers as $customer)
                                    <option value="{{ $customer->id }}">{{ $customer->Name }}</option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Save As</label>
                                <select class="select" name="save_as" required>
                                    <option selected disabled>Please Select Invoice Type</option>
                                    <option value="official">Official</option>
                                    <option value="unofficial">Un-Official</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-lg-3 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Invoice Date </label>
                                <div class="input-groupicon">
                                    <input type="text" placeholder="DD-MM-YYYY" class="datetimepicker" name="quote_date" required>
                                    <div class="addonset">
                                        <img src="{{ URL::asset('/assets/img/icons/calendars.svg')}}" alt="img">
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="col-lg-12 col-sm-6 col-12">
                            <div class="form-group">
                                <label>Please Select List</label>
                                <select class="select" id="saleDrop" name="sale_id">
                                    <option selected disabled>Sales List</option>
                                    {{-- @foreach ($customers as $customer)
                                <option value="{{ $customer->id }}">{{ $customer->Name }}</option>
                                    @endforeach --}}
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
                                <tbody id="invoiceTab">
                                    {{-- <tr>
                                    <td>INV-100</td>
                                    <td>2000.00</td>
                                    <td>0.00</td>
                                    <td>0.00</td>
                                    <td>
                                        <a class="delete-set"><img src="{{ URL::asset('/assets/img/icons/delete.svg')}}" alt="svg"></a>
                                    </td>
                                    </tr> --}}
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
                            <button type="submit" class="btn btn-submit me-2">Create Invoice</button>
                            {{-- <a href="{{url('invoicelist')}}" class="btn btn-cancel">Cancel</a> --}}
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>

@endsection
