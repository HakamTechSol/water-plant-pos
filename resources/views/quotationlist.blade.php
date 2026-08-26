<?php $page="Quotation List - Pure Water";?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Quotation List @endslot
        @slot('title_1') Manage your Quotations @endslot
        @endcomponent

        <!-- /product list -->
        <div class="card">
            <meta name="csrf-token" content="{{csrf_token() }}">
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

                <div class="modal fade" id="convert-to-sale-modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                    <div class="modal-dialog">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="exampleModalLabel">Convert to Sale</h5>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <form action="" method="POST" id="convert-to-sale-form">
                                    @csrf
                                    <div class="row">
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Total amount</label>
                                                <input type="number" disabled="" value="" class="form-control" id="total_amount_convert">
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Paid amount</label>
                                                <input type="number" name="paidamount" class="form-control">
                                            </div>
                                            <div class="text-danger pt-2">
                                                @error('0')
                                                {{$message}}
                                                @enderror
                                                @error('paidamount')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </div>

                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Status</label>
                                                <!-- <select class="select" name="status">
                                                    <option>Choose Status</option>
                                                    <option>Completed</option>
                                                    <option>Inprogress</option>
                                                </select> -->
                                                <select class="select" name="status">
                                                    <option>Choose Status</option>
                                                    <option value="Delivered">Delivered</option>
                                                    <option value="Pending">Pending</option>
                                                    <!--  <option value="Recieved">Recieved</option>
                                                    <option value="Pending">Pending</option>
                                                    <option value="Cancelled">Cancelled</option>
                                                    <option value="Return">Return</option> -->
                                                </select>
                                            </div>
                                            <div class="text-danger pt-2">
                                                @error('0')
                                                {{$message}}
                                                @enderror
                                                @error('status')
                                                {{$message}}
                                                @enderror
                                            </div>
                                        </div>
                                        <div class="col-lg-6 col-sm-6 col-12">
                                            <div class="form-group">
                                                <label>Choose Account</label>
                                                <select class="select" title="Please Select Account" name="sale_account">
                                                    <option>Please Select Account</option>

                                                    @foreach ($accounts as $acc)
                                                    <option value="{{ $acc->id }}">{{ $acc->bank_name }}</option>
                                                    @endforeach
                                                </select>
                                                <div class="text-danger pt-2">
                                                    @error('0')
                                                    {{$message}}
                                                    @enderror
                                                    @error('sale_account')
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
                <div class="table-top">
                    <div class="search-set">
                        <div class="search-path">
                        </div>
                        <div class="search-input">
                            <a class="btn btn-searchset"><img src="{{ URL::asset('/assets/img/icons/search-white.svg')}}" alt="img"></a>
                        </div>
                    </div>
                    <div class="wordset">
                        <ul>
                            {{-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="pdf"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                            </li>
                            <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="excel"><img src="{{ URL::asset('/assets/img/icons/excel.svg')}}" alt="img"></a>
                            </li> --}}
                            {{-- <li>
                                <a data-bs-toggle="tooltip" data-bs-placement="top" title="print"><img src="{{ URL::asset('/assets/img/icons/printer.svg')}}" alt="img"></a>
                            </li> --}}
                        </ul>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table datanew quote">
                        <thead>
                            <tr>
                                <!-- <th>
                                    <label class="checkboxs">
                                        <input type="checkbox" id="select-all">
                                        <span class="checkmarks"></span>
                                    </label>
                                </th> -->
                                <th>S. No</th>
                                <th>Customer Name</th>
                                <th>Quote Date</th>
                                <th>Plant Name</th>
                                <th>User Name</th>
                                <th>Grand Total</th>
                                <th>Conversion</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @php
                            $sno=1;
                            @endphp
                            @foreach ($quotes as $info)
                            <tr>
                                <!-- <td>
                                    <label class="checkboxs">
                                        <input type="checkbox">
                                        <span class="checkmarks"></span>
                                    </label>
                                </td> -->
                                <td>{{$sno}}</td>
                                <td>{{ ucfirst($info->customer_info->Name) }}</td>
                                <td>{{ $info->quote_date }}</td>
                                @if($info->plant_info)
                                <td>{{ $info->plant_info->plant_name }}</td>
                                @else
                                <td>-</td>
                                @endif
                                <td>{{ ucfirst($info->user_info->name) }}</td>
                                <td>PKR {{ ($info->total_amount)-($info->total_amount/100*$info->tax)+($info->total_amount/100*$info->discount)+($info->shipping_charges) }}</td>
                                <td>
                                    @if($info->is_converted_to_sale)
                                    Converted to Sale
                                    @else
                                    <button class="btn btn-submit convert-to-sale" type="button" data-id="{!! $info->id !!}" data-amount="{!! $info->total_amount !!}">Convert to Sale</button>
                                    @endif
                                </td>
                                <td>
                                    <a data-bs-toggle="tooltip" data-bs-original-title="View Quotations" href="{{ route('view.quote.details', ['id' => $info->id]) }}">
                                        <img src="{{ URL::asset('/assets/img/icons/eye1.svg')}}" class="me-2" alt="img">
                                    </a>
                                    <a data-bs-toggle="tooltip" data-bs-original-title="Edit Quotation" href="{{ route('edit.quote', ['id' => $info->id]) }}">
                                        <img src="{{ URL::asset('/assets/img/icons/edit.svg')}}" class="me-2" alt="img">
                                    </a>
                                    <a data-bs-toggle="tooltip" data-bs-original-title="Delete Quotation" onclick="deletequote('{{ $info->id }}')">
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
