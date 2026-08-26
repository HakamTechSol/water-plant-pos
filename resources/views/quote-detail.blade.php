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
<script src="https://cdnjs.cloudflare.com/ajax/libs/html2pdf.js/0.10.1/html2pdf.bundle.min.js"></script>
<script>

function Convert_HTML_To_PDF() {
    var hideUnitPrice = document.getElementById('hideUnitPrice');
    hideUnitPrice.style.display = 'none';
    var hideQuantity = document.getElementById('hideQuantity');
    hideQuantity.style.display = 'none';
    var hideTotalPrice = document.getElementById('hideTotalPrice');
    hideTotalPrice.style.display = 'none';

    var documentHTML = document.querySelector("#document");
    var elementHTML = '';
    @if($info->quote_type == "Official")
        elementHTML = document.querySelector("#content_official");
    @else
        elementHTML = document.querySelector("#content_unofficial");
    @endif
    var specificationHTML = document.querySelector("#specification");
    elementHTML.querySelector('table').style.fontSize = '8px';

    var elementToPrint = document.createElement('div');
    elementToPrint.append(documentHTML.cloneNode(true));
    elementToPrint.append(elementHTML.cloneNode(true));
    elementToPrint.append(specificationHTML.cloneNode(true));
    var page_break = '';
    if(documentHTML.innerText.trim() != ''){
        page_break = ['#content', '#specification'];
    } else {
        page_break = ['#specification'];
    }

    html2pdf().set({
      html2canvas: {
        dpi: 192,
        letterRendering: true,
    @if($info->quote_type != "Official")
        // scale:1,
        width: 2.5 * 192, //target width in the PDF document
    @endif
        letterRendering: true,
        scale:2,
        useCORS: true
      },
    @if($info->quote_type == "Official")
        jsPDF: { unit: 'mm', format: 'a4', orientation: 'portrait' },
        margin: [30, 10, 40, 10],
        pagebreak: { before:  page_break}
    @else
        jsPDF: { unit: 'mm', format: [76, Math.floor((elementHTML.clientHeight * 25.4) / 100)], orientation: 'portrait' },
        margin: [0, 10, 0, -15]
    @endif
    }).from(elementToPrint).save('quotation-document.pdf');
        hideUnitPrice.style.display = 'revert';
        hideQuantity.style.display = 'revert';
        hideTotalPrice.style.display = 'revert';
        elementHTML.querySelector('table').style.fontSize = 'unset';
    }
</script>
<?php $page = "Quotation Detail - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Quote Details @endslot
        @slot('title_1') View quote details @endslot
        @endcomponent
        <div class="card">
            <div class="card-body">
                <div class="card-sales-split">
                    <h2>Document</h2>
                </div>
                <div id="document">
                    @if($document)
                        {!! $document->document !!}
                    @endif
                </div>
            </div>
        </div>
        <button id="hideUnitPrice" onclick="hideUnitPrice()" class="btn btn-primary mb-4">Hide <b>UNIT PRICE</b> Column</button>
        <button id="hideQuantity" onclick="hideQuantity()" class="btn btn-primary mb-4">Hide <b>QUANTITY</b> Column</button>
        <button id="hideTotalPrice" onclick="hideTotalPrice()" class="btn btn-primary mb-4">Hide <b>TOTAL</b> Column</button>
        <div class="card">
            <div class="card-body">
                <div class="card-sales-split">
                    <h2>Quote Date : {{ $info->quote_date }}</h2>
                    <ul>
                        <li>
                            <!-- <a target="_blank" href="{!! route('export.sales', ['id' => Request('id'), 'type' => 'pdf']) !!}"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a> -->
                             @if($info->quote_type == "Official")
                            <a onclick="Convert_HTML_To_PDF()"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                            @else
                            <a id="export"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                            @endif
                        </li>
                    </ul>
                </div>
                <!--official quote print div -->
                @if($info->quote_type == "Official")
                <div id="content_official">
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
                                <div class="to">QUOTATION TO:</div>
                                <h2 class="name">{{ $info->customer_info->Name }}</h2>
                                <div class="address" style="max-width: 250px;">{{ $info->customer_info->Address }}</div>
                                <div class="email"><a href="mailto:{{ $info->customer_info->Email }}">{{ $info->customer_info->Email }}</a></div>
                            </div>
                            <div id="invoice">
                                <h1 class="h2">QUOTATION {{ $info->quote_date }}-{{ $info->id }}</h1>
                                @if($info->plant_info)
                                <div class="date">Plant Name: {{$info->plant_info->plant_name}}</div>
                                @endif
                                <div class="date">Quotation Date: {{ $info->quote_date }}</div>
                                <div class="date">Validity: {{ $info->quote_validity }}</div>
                            </div>
                        </div>
                        <table cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th class="no">#</th>
                                    <th class="desc">Product Name</th>
                                    <!-- <th class="desc">BRAND</th>
                                    <th class="desc">SIZE</th> -->
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
                                    <td class="desc">
                                        <h3>{{ $product->product_info->product_name }}</h3>{{-- $product->product_info->product_desc --}}
                                    </td>
                                    <!-- <td class="desc">{{ $product->product_info->brand_info->brand_name }}</td>
                                    <td class="desc">{{ $product->product_info->size_info->size_name }}</td> -->
                                    <td class="unit">Rs {{ $product->amount }}</td>
                                    <td class="qty">{{ $product->quantity }} {{ $product->product_info->product_unit }}</td>
                                    <td class="total">Rs {{ $product->quantity*$product->amount }}</td>
                                </tr>
                                @php
                                $n++;
                                @endphp
                                @endforeach
                            </tbody>
                            <tfoot>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">SUBTOTAL</td>
                                    <td>Rs {{ $info->total_amount }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">
                                        <span style="color:#0087C3">({{ $info->discount }}% of Sub-Total)</span>
                                        Discount
                                    </td>
                                    <td>Rs {{$info->discount/100*$info->total_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">
                                        <span style="color:#0087C3">({{ $info->tax }}% of Sub-Total)</span>
                                        TAX
                                    </td>
                                    <td>Rs {{$info->tax/100*$info->total_amount}}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">Shipping Charges</td>
                                    <td>Rs {{ $info->shipping_charges }}</td>
                                </tr>
                                <tr>
                                    <td colspan="2"></td>
                                    <td colspan="2">GRAND TOTAL</td>
                                    <td>Rs {{ $info->total_amount - ($info->total_amount * $info->discount / 100) + ($info->total_amount * $info->tax / 100) + $info->shipping_charges }}</td>
                                </tr>
                            </tfoot>
                        </table>
                    </main>
                </div>
                @else
                <div id="docx">
                    <!--un-official sale print div -->
                    <div id="content_unofficial" class="content_unofficial" style="font-family: "Lucida Console", "Courier New", monospace;">
                        <header class="clearfix">
                            <!--<div id="logo">-->
                            <!--    <img src="{{ asset('storage/companylogo/'.$com->Logo)}}" alt="logo">-->
                            <!--</div>-->
                            <div id="company">
                                <h4 class="name">{{ $com->Name }}</h4>
                                <div>Addr: {{ $com->address }}</div>
                                <div>Ph #: <b>{{ $com->Phone }}</b></div>
                                <div>Email: <a href="mailto:{{ $com->Email }}">{{ $com->Email }}</a></div>
                                <br>
                            </div>
                        </header>
                        <main>
                            <div id="details" class="clearfix">
                                <div>
                                    <div class="to">To: <b>{{ $info->customer_info->Name }}</b></div>
                                    <!--<h2 class="name">{{ $info->customer_info->Name }}</h2>-->
                                    <!--<div class="address" style="max-width: 250px;">{{ $info->customer_info->Address }}</div>-->
                                    <!--<div class="email"><a href="mailto:{{ $info->customer_info->Email }}">{{ $info->customer_info->Email }}</a></div>-->
                                    
                                    <div class="date">Date: {{ $info->quote_date }}</div>
                                    <div class="date">Validity: {{ $info->quote_validity }}</div>
                                </div>
                                <div id="invoice">
                                    <h4 class="name">Quotation No: {{ $info->id }}</h4>
                                    <!--<h1 style="font-size: 1.6em;">QUOTATION {{ $info->quote_date }}-{{ $info->id }}</h1>-->
                                    <!--@if($info->plant_info)-->
                                    <!--<div class="date">Plant Name: {{$info->plant_info->plant_name}}</div>-->
                                    <!--@endif-->
                                    <!--<div class="date">Quotation Date: {{ $info->quote_date }}</div>-->
                                    <!--<div class="date">Validity: {{ $info->quote_validity }}</div>-->
                                </div>
                            </div>
                            <table cellspacing="5" cellpadding="5">
                                <thead>
                                    <tr>
                                        <th>#</th>
                                        <th>Item</th>
                                        <th>Price</th>
                                        <th>Qty</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                    $n=1;
                                    @endphp
                                    @foreach($products as $product)
                                    <tr>
                                        <td>{{$n}}</td>
                                        <td>{{ $product->product_info->product_name }}<br>{{-- $product->product_info->product_desc --}}</td>
                                        <!-- <td class="desc">{{ $product->product_info->brand_info->brand_name }}</td>
                                        <td class="desc">{{ $product->product_info->size_info->size_name }}</td> -->
                                        <td>{{ $product->amount }}</td>
                                        <td>{{ $product->quantity }} {{ $product->product_info->product_unit }}</td>
                                        <td>{{ $product->quantity*$product->amount }}</td>
                                    </tr>
                                    @php
                                    $n++;
                                    @endphp
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"><b>Sub Total</b></td>
                                        <td><b>{{ $info->total_amount }}</b></td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">
                                            Discount
                                        </td>
                                        <td>{{$info->discount/100*$info->total_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">
                                            Tax
                                        </td>
                                        <td>{{$info->tax/100*$info->total_amount}}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">Shipping</td>
                                        <td>{{ $info->shipping_charges }}</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2">POS Fee</td>
                                        <td>5</td>
                                    </tr>
                                    <tr>
                                        <td colspan="2"></td>
                                        <td colspan="2"><b>Grand Total</b></td>
                                        <td><b>{{ 5+$info->total_amount - ($info->total_amount * $info->discount / 100) + ($info->total_amount * $info->tax / 100) + $info->shipping_charges }}</b></td>
                                    </tr>
                                </tfoot>
                            </table>
                            <div id="details" class="clearfix">
                                <div>
                                    <p style="font-size: 0.8em;">Thank You for Your Business!
                                    <br>Please Come Again</p>
                                    <p style="font-size: 0.8em;">Developed By: <b>Enfixo Technologies</b>
                                    <br><b>Ph: 03053203555</b></p>
                                </div>
                            </div>
                        </main>
                    </div>
                </div>
                @endif
                <div id="specification">
                    <main>
                        @if($specification)

                        <h4 class="mt-4">Plant Specifications</h4>
                        <table cellspacing="0" cellpadding="0">
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

                        @endif
                    </main>
                </div>
            </div>
        </div>

    </div>
</div>
<script>
window.export.onclick = function() {
 
   if (!window.Blob) {
      alert('Your legacy browser does not support this action.');
      return;
   }

   var html, link, blob, url, css;
   
   // EU A4 use: size: 841.95pt 595.35pt;
   // US Letter use: size:11.0in 8.5in;
   
   document.getElementById('company').children[0].style.fontSize="1.6em";
   document.querySelector('table').style.fontSize = '12px';
   
   var height = document.getElementById('content_unofficial').clientHeight * 0.31;
   css = (
     '<style>' +
     '@page content_unofficial{size: 85mm '+Math.floor(height)+'mm ;mso-page-orientation: landscape; margin: 30;}' +
     'div.content_unofficial {page: content_unofficial;}' +
     '</style>'
   );
   
   html = window.docx.innerHTML;
   blob = new Blob(['\ufeff', css + html], {
     type: 'application/msword'
   });
   url = URL.createObjectURL(blob);
   link = document.createElement('A');
   link.href = url;
   // Set default file name. 
   // Word will append file extension - do not add an extension here.
   link.download = 'quotation-document';   
   document.body.appendChild(link);
   if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, 'quotation-document.doc'); // IE10-11
   		else link.click();  // other browsers
   document.body.removeChild(link);
   
    myWindow=window.open('','','');
    myWindow.document.write(css + html);
    myWindow.document.close(); //missing code
    myWindow.focus();
    myWindow.print();
 };
</script>
@endsection
