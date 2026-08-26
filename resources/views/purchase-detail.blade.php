<style>
    @font-face {
        font-family: SourceSansPro;
        src: url(SourceSansPro-Regular.ttf);
    }

    .clearfix:after {
        display: table;
        clear: both;
    }

    a {
        color: #0087C3;
        text-decoration: none;
    }

    body {
        position: relative;
        width: 33cm;  
        height: 29.7cm; 
        margin: 0 auto; 
        color: #555555;
        background: #FFFFFF; 
        font-family: Arial, sans-serif; 
        font-size: 14px; 
        font-family: SourceSansPro;
    }

    header {
        padding: 10px 0;
        margin-bottom: 20px;
        border-bottom: 1px solid #AAAAAA;
    }

    #logo {
        float: left;
        margin-top: 8px;
    }

    #logo img {
        height: 70px;
    }

    #company {
        float: right;
        text-align: right;
    }


    #details {
        margin-bottom: 50px;
    }

    #client {
        padding-left: 6px;
        border-left: 6px solid #0087C3;
        float: left;
    }

    #client .to {
        color: #777777;
    }

    h2.name {
        font-size: 1.4em;
        font-weight: normal;
        margin: 0;
    }

    #invoice {
        float: right;
        text-align: right;
    }

    #invoice h1 {
        color: #0087C3;
        font-size: 2.4em;
        line-height: 1em;
        font-weight: normal;
        margin: 0  0 10px 0;
    }

    #invoice .date {
        font-size: 1.1em;
        color: #777777;
    }

    table {
        width: 100%;
        border-collapse: collapse;
        border-spacing: 0;
        margin-bottom: 20px;
    }

    table th,
    table td {
        padding: 5px;
        background: #EEEEEE;
        text-align: center;
        border-bottom: 1px solid #FFFFFF;
    }

    table th {
        white-space: nowrap;        
        font-weight: normal;
    }

    table td {
        text-align: right;
    }

    table td h3{
        color: #0087C3;
        font-size: 1.2em;
        font-weight: normal;
        margin: 0 0 0.2em 0;
    }

    table .no {
        color: #FFFFFF;
        font-size: 1.0em;
        background: #0087C3;
    }

    table .desc {
        text-align: left;
    }

    table .unit {
        background: #DDDDDD;
    }

    table .qty {
    }

    table .total {
        background: #0087C3;
        color: #FFFFFF;
    }

    table td.unit,
    table td.qty,
    table td.total {
        font-size: 1.2em;
    }

    table tbody tr:last-child td {
        border: none;
    }

    table tfoot td {
        padding: 10px 20px;
        background: #FFFFFF;
        border-bottom: none;
        font-size: 1.0em;
        white-space: nowrap; 
        border-top: 1px solid #AAAAAA; 
    }

    table tfoot tr:first-child td {
        border-top: none; 
    }

    table tfoot tr:last-child td {
        color: #0087C3;
        font-size: 1.0em;
        border-top: 1px solid #0087C3; 
    }

    table tfoot tr td:first-child {
        border: none;
    }

    footer {
        color: #777777;
        width: 100%;
        height: 30px;
        position: absolute;
        bottom: 0;
        border-top: 1px solid #AAAAAA;
        padding: 8px 0;
        text-align: center;
    }
</style>
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/1.4.1/html2canvas.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.5.1/jspdf.umd.min.js"></script>
<script>
        window.jsPDF = window.jspdf.jsPDF;
        // Convert HTML content to PDF
        function Convert_HTML_To_PDF() {
            var doc = new jsPDF();
            
            var hideUnitPrice = document.getElementById('hideUnitPrice');
            hideUnitPrice.style.display = 'none';
            var doc = new jsPDF();
            
            // Source HTMLElement or a string containing HTML.
            var elementHTML = document.querySelector("#content");
            // console.log(elementHTML);
            elementHTML.querySelector('table').style.fontSize = 'unset';
        
            doc.html(elementHTML, {
                callback: function(doc) {
                    // Save the PDF
                    if(doc.save('purchase-document.pdf')){
                        hideUnitPrice.style.display = 'revert';
                        elementHTML.querySelector('table').style.fontSize = 'unset';
                    }
                },
                margin: [10, 10, 10, 10],
                autoPaging: 'text',
                x: 0,
                y: 0,
                width: 190, //target width in the PDF document
                windowWidth: 675 //window width in CSS pixels
            });
        }
</script>
<?php $page = "Order Detail - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Order Detail @endslot
        @slot('title_1') View Order Details @endslot
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
                <div class="card-sales-split">
                    <h2>Order Date : {{ $purchase->delivery_date }}</h2>
                    <ul>
                        <li>
                            <!-- <a target="_blank" id="button" href="{!! route('export.sales', ['id' => Request('id'), 'type' => 'pdf']) !!}"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a> -->
                            <a onclick="Convert_HTML_To_PDF()"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                        </li> 
                    </ul>
                </div>
                <div id="content">
                    <header class="clearfix">
                        <div id="logo">
                            <img src="{{ asset('storage/companylogo/'.$com->Logo)}}" alt="logo">
                        </div>
                        <div id="company">
                            <h2 class="name">{{ $com->Name }}</h2>
                            <div>{{ $com->address }}</div>
                            <div>{{ $com->Phone }}</div>
                            <div><a href="mailto:{{ $com->Email }}">{{ $com->Email }}</a></div>
                        </div>
                    </header>
                    <main>
                        <div id="details" class="clearfix">
                            <div id="client">
                                <div class="to">INVOICE FROM:</div>
                                <h2 class="name">{{ ucfirst($purchase->supp_info->Name) }}</h2>
                                <div class="address">{{ $purchase->supp_info->Address }}</div>
                                <div class="email"><a href="mailto:{{ ucfirst($purchase->supp_info->Email) }}">{{ ucfirst($purchase->supp_info->Email) }}</a></div>
                            </div>
                            <div id="invoice">
                                <h1>INVOICE 3-2-1</h1>
                                <div class="date">Date of Invoice: {{ $purchase->entry_date ? date('d-m-Y', strtotime($purchase->entry_date)) : '-' }}</div>
                                <div class="date">EDD: {{ $purchase->delivery_date }}</div>
                            </div>
                        </div>
                        <button id="hideUnitPrice" onclick="hidePurUnitPrice()" class="btn btn-primary mb-4">Hide <b>UNIT PRICE</b> Column</button>
                        <table border="0" cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th class="no">#</th>
                                    <th class="desc">Product Name</th>
                                    <th class="desc">BRAND</th>
                                    <th class="desc">SIZE</th>
                                    <th class="unit">UNIT PRICE</th>
                                    <th class="qty">QUANTITY</th>
                                    <th class="total">TOTAL</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                $n=1;
                                @endphp
                                @foreach($products as $product)
                                <tr>
                                    <td class="no">{{$n}}</td>
                                    <td class="desc"><h3>{{ $product->product_info->product_name }}</h3>{{-- $product->product_info->product_desc --}}</td>
                                    <td class="desc">{{ $product->product_info->brand_info->brand_name }}</td>
                                    <td class="desc">{{ $product->product_info->size_info->size_name }}</td>
                                    <td class="unit">PKR {{ $product->price }}</td>
                                    <td class="qty">{{ $product->quantity }} {{ $product->product_info->product_unit }}</td>
                                    <td class="total">PKR {{ $product->quantity*$product->price }}</td>
                                </tr>
                                @php
                                $n++;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="3">SUBTOTAL</td>
                                    <td>PKR {{ $purchase->total_amount }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="3">
                                        <span style="color:#0087C3">({{ $purchase->discount }}% of Sub-Total)</span>
                                        Discount
                                    </td>
                                    <td>PKR {{$purchase->discount/100*$purchase->total_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="3">
                                        <span style="color:#0087C3">({{ $purchase->tax }}% of Sub-Total)</span>
                                        TAX
                                    </td>
                                    <td>PKR {{$purchase->tax/100*$purchase->total_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="3">Shipping Charges</td>
                                    <td>PKR {{ $purchase->shipping_charges }}</td>
                                </tr>
                                <tr>
                                    <td colspan="3"></td>
                                    <td colspan="3">GRAND TOTAL</td>
                                    <td>PKR {{ $purchase->total_amount - ($purchase->total_amount * $purchase->discount / 100) + ($purchase->total_amount * $purchase->tax / 100) + $purchase->shipping_charges }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
