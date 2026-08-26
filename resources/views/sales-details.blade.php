<style>
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

            var hideUnitPrice = document.getElementById('hideUnitPrice');
            hideUnitPrice.style.display = 'none';
            var hideQuantity = document.getElementById('hideQuantity');
            hideQuantity.style.display = 'none';
            var hideTotalPrice = document.getElementById('hideTotalPrice');
            hideTotalPrice.style.display = 'none';

            var doc;
            
            // Source HTMLElement or a string containing HTML.
            var elementHTML = '';
            @if($info->Sale_type == "Official")
                doc = new jsPDF();
                elementHTML = document.querySelector("#content_official");
                elementHTML.querySelector('table').style.fontSize = '8px';
            @else
                // Document of 76mm wide and 3276mm high
                document.getElementsByClassName('address')[0].style.display = 'none';
                document.getElementsByClassName('email')[0].style.display = 'none';
                document.getElementById('company').style.textAlign = 'center';
                document.getElementsByTagName('header')[0].style.justifyContent ="center";
                document.getElementsByTagName('header')[0].style.display ="grid";
                
                document.querySelector('table').style.fontSize = '9px';
                document.querySelectorAll('td').forEach(el => el.style.fontWeight = "bolder");
                document.querySelectorAll('th').forEach(el => el.style.fontWeight = "bolder");

                document.getElementById('invoice').children[0].style.fontSize="1.4em";
                document.getElementById('invoice').style.float="left";
                document.getElementById('details').children[0].style.fontSize="10px";
                document.getElementById('details').children[0].style.display="flex";
                document.getElementById('details').children[0].children[0].style.lineHeight="2.5";
                document.getElementById('details').children[1].style.fontSize="8px";
                document.getElementById('details').style.marginBottom="5px";
                document.getElementById('details').style.marginTop="5px";
                
                elementHTML = document.querySelector("#content_unofficial");
                doc = new jsPDF('p', 'mm', [76, Math.floor((elementHTML.clientHeight * 25.4) / 110)]);
                

            @endif
            // console.log(elementHTML);

            doc.html(elementHTML, {
                callback: function(doc) {
                    // Save the PDF
                    if(doc.save('sale-document.pdf')){
                        
                        hideUnitPrice.style.display = 'revert';
                        hideQuantity.style.display = 'revert';
                        hideTotalPrice.style.display = 'revert';
                                                
                        document.getElementById('details').style.marginBottom="50px";
                        document.getElementById('details').style.marginTop="0px";
                        document.getElementById('details').style.display="block";
                        
                        document.getElementsByClassName('address')[0].style.display = 'revert';
                        document.getElementsByClassName('email')[0].style.display = 'revert';
                        document.getElementById('company').style.textAlign = 'right';
                        document.getElementsByTagName('header')[0].style.justifyContent ="revert";
                        document.getElementsByTagName('header')[0].style.display ="block";
                        
                        elementHTML.querySelector('table').style.fontSize = 'unset';
                        document.querySelectorAll('td').forEach(el => el.style.fontWeight = "revert");
                        document.querySelectorAll('th').forEach(el => el.style.fontWeight = "unset");
        
                        document.getElementById('invoice').children[0].style.fontSize="2.1em";
                        document.getElementById('invoice').style.float="right";
                        document.getElementById('details').children[0].style.fontSize="revert";
                        document.getElementById('details').children[0].style.display="block";
                        document.getElementById('details').children[0].children[0].style.lineHeight="revert";
                        document.getElementById('details').children[1].style.fontSize="revert";
                                
                        document.getElementById('details').style.marginBottom="50px";
                        document.getElementById('details').style.marginTop="0px";
                        
                        doc.autoPrint();
                        //This is a key for printing
                        doc.output('dataurlnewwindow');
                        // var blob = doc.output("blob");
                        // window.open(URL.createObjectURL(blob));
                    }
                },
                margin: [10, 10, 10, 10],
                autoPaging: 'text',
                x: 0,
                y: 0,
                @if($info->Sale_type == "Official")
                width: 190, //target width in the PDF document
                windowWidth: 675 //window width in CSS pixels
                @else
                width: 50, //target width in the PDF document
                windowWidth: 280 //window width in CSS pixels
                @endif
            });

        }
        
        function Export2Word(element, filename = ''){
            var preHtml = "<html xmlns:o='urn:schemas-microsoft-com:office:office' xmlns:w='urn:schemas-microsoft-com:office:word' xmlns='http://www.w3.org/TR/REC-html40'><head><meta charset='utf-8'><title>Export HTML To Doc</title></head><body>";
            var postHtml = "</body></html>";
            var html = preHtml+document.getElementById(element).innerHTML+postHtml;
        
            var blob = new Blob(['\ufeff', html], {
                type: 'application/msword'
            });
            
            // Specify link url
            var url = 'data:application/vnd.ms-word;charset=utf-8,' + encodeURIComponent(html);
            
            // Specify file name
            filename = filename?filename+'.doc':'document.doc';
            
            // Create download link element
            var downloadLink = document.createElement("a");
        
            document.body.appendChild(downloadLink);
            
            if(navigator.msSaveOrOpenBlob ){
                navigator.msSaveOrOpenBlob(blob, filename);
            }else{
                // Create a link to the file
                downloadLink.href = url;
                
                // Setting the file name
                downloadLink.download = filename;
                
                //triggering the function
                downloadLink.click();
            }
            
            document.body.removeChild(downloadLink);
        }
</script>
<?php $page = "Sale Detail - Pure Water"; ?>
@extends('layout.mainlayout')
@section('content')
<div class="page-wrapper">
    <div class="content">
        @component('components.pageheader')
        @slot('title') Sale Details @endslot
        @slot('title_1') View Sale Details @endslot
        @endcomponent
        
        <button id="hideUnitPrice" onclick="hideUnitPrice()" class="btn btn-primary mb-4">Hide <b>UNIT PRICE</b> Column</button>
        <button id="hideQuantity" onclick="hideQuantity()" class="btn btn-primary mb-4">Hide <b>QUANTITY</b> Column</button>
        <button id="hideTotalPrice" onclick="hideTotalPrice()" class="btn btn-primary mb-4">Hide <b>TOTAL</b> Column</button>
        <div class="card">
            <div class="card-body">
                <div class="card-sales-split">
                    <h2>Invoice Details</h2>
                    <ul>
                        <li>
                            <!-- <a target="_blank" id="button" href="{!! route('export.sales', ['id' => Request('id'), 'type' => 'pdf']) !!}"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a> -->
                            @if($info->Sale_type == "Official")
                            <a onclick="Convert_HTML_To_PDF()"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                            @else
                            <a id="export"><img src="{{ URL::asset('/assets/img/icons/pdf.svg')}}" alt="img"></a>
                            @endif
                        </li>
                    </ul>
                </div>
                <!--official sale print div -->
                @if($info->Sale_type == "Official")
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
                                <div class="to">INVOICE TO:</div>
                                <h2 class="name">{{ $info->customer_info->Name }}</h2>
                                <div class="address">{{ $info->customer_info->Address }}</div>
                                <div class="email"><a href="mailto:{{ $info->customer_info->Email }}">{{ $info->customer_info->Email }}</a></div>
                            </div>
                            <div id="invoice">
                                <h1>INV-{{ $info->sales_date }}-{{ $info->id }}</h1>
                                <div class="date">Date of Invoice: {{ $info->sales_date }}</div>
                            </div>
                        </div>
                        <table cellspacing="0" cellpadding="0">
                            <thead>
                                <tr>
                                    <th class="no">#</th>
                                    <th class="desc">Product Name</th>
                                    <!--<th class="desc">BRAND</th>-->
                                    <!--<th class="desc">SIZE</th>-->
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
                                    <!--<td class="desc">{{ $product->product_info->brand_info->brand_name }}</td>-->
                                    <!--<td class="desc">{{ $product->product_info->size_info->size_name }}</td>-->
                                    <td class="unit">Rs {{ $product->price }}</td>
                                    <td class="qty">{{ $product->quantity }} {{ $product->product_info->product_unit }}</td>
                                    <td class="total">Rs {{ $product->quantity*$product->price }}</td>
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
                        <!-- <div id="thanks">Thank you!</div>
                        <div id="notices">
                            <div>Ter:</div>
                            <div class="notice">A finance charge of 1.5% will be made on unpaid balances after 30 days.</div>
                        </div> -->
                    </main>
                    <!-- <footer>
                        Invoice was created on a computer and is valid without the signature and seal.
                    </footer> -->
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
                            <h6>{{ $com->Name }}</h6>
                            <div>Addr: {{ $com->address }}</div>
                            <div>Ph #:<b>{{ $com->Phone }}</b></div>
                            <div>Email: <a href="mailto:{{ $com->Email }}">{{ $com->Email }}</a></div>
                            <br>
                        </div>
                    </header>
                    <main>
                        <div id="details" class="clearfix">
                            <div>
                                <div class="to">To: <b>{{ $info->customer_info->Name }}</b></div>
                                <!--<h2 class="name">{{ $info->customer_info->Name }}</h2>-->
                                <!--<div class="address">{{ $info->customer_info->Address }}</div>-->
                                <div class="date">Date: <b>{{ $info->sales_date }}</b></div>
                                <!--<div class="email"><a href="mailto:{{ $info->customer_info->Email }}">{{ $info->customer_info->Email }}</a></div>-->
                            </div>
                            <div id="invoice">
                                <h4 class="name">Invoice No: {{ $info->id }}</h4>
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
                                    <!--<td class="desc">{{ $product->product_info->brand_info->brand_name }}</td>-->
                                    <!--<td class="desc">{{ $product->product_info->size_info->size_name }}</td>-->
                                    <td>{{ $product->price }}</td>
                                    <td>{{ $product->quantity }} {{ $product->product_info->product_unit }}</td>
                                    <td>{{ $product->quantity*$product->price }}</td>
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
                                    <td colspan="2">Shipping Charges</td>
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
   link.download = 'sale-document';   
   document.body.appendChild(link);
   if (navigator.msSaveOrOpenBlob ) navigator.msSaveOrOpenBlob( blob, 'sale-document.doc'); // IE10-11
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