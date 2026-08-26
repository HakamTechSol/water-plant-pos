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
            var hideQuantity = document.getElementById('hideQuantity');
            hideQuantity.style.display = 'none';
            var hideTotalPrice = document.getElementById('hideTotalPrice');
            hideTotalPrice.style.display = 'none';

            // Source HTMLElement or a string containing HTML.
            var elementHTML = document.querySelector("#content");
            var specificationHTML = document.querySelector("#specification");
            // console.log(elementHTML);
            var options = {
                margin: [10, 10, 10, 10]
                , autoPaging: 'text'
                , x: 0
                , y: 0
                , width: 190, //target width in the PDF document
                windowWidth: 675 //window width in CSS pixels
            };
            doc.html(elementHTML, options).then(() => {
                if(elementHTML.innerHTML != '\n                                    '){
                    var noOfPages = doc.internal.getNumberOfPages();
                    var y = (doc.internal.pageSize.height - 20) * noOfPages; // sub margins
                    doc.addPage();
                }
                return doc.html(specificationHTML, { y: y, margin: [10, 10, 10, 10], autoPaging: 'text', x: 0, width: 190, windowWidth: 675});
            }).then(() => {
                if(doc.save('purchase-document.pdf'){
                    hideUnitPrice.style.display = 'revert';
                    hideQuantity.style.display = 'revert';
                    hideTotalPrice.style.display = 'revert';
                }
            });
        }
</script>
<?php $page = "Plant Detail - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Plant Detail @endslot
        @slot('title_1') View Plant Details @endslot
        @endcomponent
        <div class="card">
            <div class="card-body">
                <div class="card-sales-split">
                    <!-- <h3>s</h3> -->
                    <h2>Creation Date : {{ $plant->created_at->format('d-m-Y') }}</h2>
                    <ul>
                        <tr>
                            <!-- <a target="_blank" href="{!! route('export.sales', ['id' => Request('id'), 'type' => 'pdf']) !!}"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a> -->
                            <a onclick="Convert_HTML_To_PDF()"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                        </tr>
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
                                <h4>Plant Details</h4>
                                <h6>Grand Total: PKR {{ $plant->total_amount }}</h6>
                            </div>
                        </div>
                        <button id="hideUnitPrice" onclick="hideUnitPrice()" class="btn btn-primary mb-4">Hide <b>UNIT PRICE</b> Column</button>
                        <button id="hideQuantity" onclick="hideQuantity()" class="btn btn-primary mb-4">Hide <b>QUANTITY</b> Column</button>
                        <button id="hideTotalPrice" onclick="hideTotalPrice()" class="btn btn-primary mb-4">Hide <b>TOTAL</b> Column</button>
                        <table cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th class="no">#</th>
                                    <th class="desc">DESCRIPTION</th>
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
                                    <td class="unit">PKR {{ $product->product_info->product_price }}</td>
                                    <td class="qty">{{ $product->quantity }} {{ $product->product_info->product_unit }}</td>
                                    <td class="total">PKR {{ $product->quantity*$product->product_info->product_price }}</td>
                                </tr>
                                @php
                                $n++;
                                @endphp
                                @endforeach
                            </tbody>
                        </table>
                    </main>
                </div>
                <div id="specification">
                    <main>
                        <h4 class="mt-4">Plant Specifications</h4>
                        <table >
                            <tbody>
                                <tr>
                                    <th class="desc">Part No</th>
                                    <td class="no">{{$specification->partno}}</td>
                                    <th class="desc">Capacity</th>
                                    <td class="no">{{$specification->capacity}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">Booster Pump</th>
                                    <td class="no">{{$specification->boosterpump}}</td>
                                    <th class="desc">High-Pressure Pump</th>
                                    <td class="no">{{$specification->highpressurepump}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">Filter Housing/5-Micron Filter</th>
                                    <td class="no">{{$specification->filterhousing}}</td>
                                    <th class="desc">FRP Multimedia Vessels</th>
                                    <td class="no">{{$specification->frpmultimedia}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">FRP Membrane Housing</th>
                                    <td class="no">{{$specification->frpmembranehousing}}</td>
                                    <th class="desc">Membrane</th>
                                    <td class="no">{{$specification->membrane}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">Water Quality Indicators</th>
                                    <td class="no">{{$specification->waterqualityindicators}}</td>
                                    <th class="desc">Flow Meters</th>
                                    <td class="no">{{$specification->flowmeters}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">Pressure Gauges</th>
                                    <td class="no">{{$specification->pressuregauges}}</td>
                                    <th class="desc">Water Level Indicator</th>
                                    <td class="no">{{$specification->waterlevelindicator}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">Low Pressure Switch</th>
                                    <td class="no">{{$specification->lowpressureswitch}}</td>
                                    <th class="desc">Auto Flash System</th>
                                    <td class="no">{{$specification->autoflashsystem}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">R O Frame Parts/Skid</th>
                                    <td class="no">{{$specification->roframeparts}}</td>
                                    <th class="desc">Electical Controls</th>
                                    <td class="no">{{$specification->electricalcontrols}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">CIP System Clean-In-Place</th>
                                    <td class="no">{{$specification->cip}}</td>
                                    <th class="desc">Dimension (inches)</th>
                                    <td class="no">{{$specification->dimension}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">UV Sterilization</th>
                                    <td class="no">{{$specification->uvsterilization}}</td>
                                    <th class="desc">Mineralization</th>
                                    <td class="no">{{$specification->mineralization}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">Assiscalant Chemical</th>
                                    <td class="no">{{$specification->assiscalantchemical}}</td>
                                    <th class="desc">Storage Tanks</th>
                                    <td class="no">{{$specification->storagetanks}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">Feed Water Requirements</th>
                                    <td class="no">{{$specification->feedwater}}</td>
                                    <th class="desc">TDS</th>
                                    <td class="no">{{$specification->tds}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">SDI</th>
                                    <td class="no">{{$specification->sdi}}</td>
                                    <th class="desc">Turbidity Level</th>
                                    <td class="no">{{$specification->turbiditylevel}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">Iron</th>
                                    <td class="no">{{$specification->iron}}</td>
                                    <th class="desc">PH</th>
                                    <td class="no">{{$specification->ph}}</td>
                                </tr>
                                <tr>
                                    <th class="desc">Oxidizer</th>
                                    <td class="no">{{$specification->oxidizer}}</td>
                                    <th class="desc">Hardness</th>
                                    <td class="no">{{$specification->hardness}}</td>
                                </tr>
                                </tr>
                            </tbody>
                        </table>
                    </main>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection