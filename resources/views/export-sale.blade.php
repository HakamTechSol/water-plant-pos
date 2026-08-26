<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=0">
    <meta name="description" content="POS - Bootstrap Admin Template">
    <meta name="keywords" content="admin, estimates, bootstrap, business, corporate, creative, invoice, html5, responsive, Projects">
    <meta name="author" content="Dreamguys - Bootstrap Admin Template">
    <meta name="robots" content="noindex, nofollow">
    <title>Export Invoice</title>

    <!-- Favicon -->
    <link rel="shortcut icon" href="{{asset('assets/img/favicon.png')}}">
    <link href="https://fonts.googleapis.com/css2?family=Poppins:ital,wght@0,500;0,600;0,700;1,400&display=swap" rel="stylesheet">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/bootstrap.min.css')}}">

    <!-- Fontawesome CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/fontawesome.min.css')}}">
    <link rel="stylesheet" href="{{asset('assets/plugins/fontawesome/css/all.min.css')}}">

    <!-- animation CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/animate.css')}}">
    <!-- Owl Carousel CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/owlcarousel/owl.carousel.min.css')}}">
    <!-- Select2 CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/select2/css/select2.min.css')}}">

    <!-- Dragula CSS -->
    <link rel="stylesheet" href="{{asset('assets/plugins/dragula/css/dragula.min.css')}}">
    <!-- Datatable CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/dataTables.bootstrap4.min.css')}}">

    <!-- Main CSS -->
    <link rel="stylesheet" href="{{asset('assets/css/style.css')}}">

    <style type="text/css">
        .page_break { page-break-before: always; }
        .text-primary {
            color: rgba(13,110,253,1)!important;
        }
        .card .card-body {
            padding: 15px !important;
        }
        .card-sales-split {
            flex-direction: column !important;
        }
        .card-sales-split {
            padding-bottom: 10px !important;
        }
        .col-md-9 {
            flex: 0 0 auto !important;
            width: 75% !important;
        }
        .col-md-3 {
            flex: 0 0 auto !important;
            width: 25% !important;
        }
        .col-md-4 {
            flex: 0 0 auto !important;
            width: 33.33333333% !important;
        }

        .col-md-8 {
            flex: 0 0 auto !important;
            width: 66.66666667% !important;
        }
        .col-md-6 {
            flex: 0 0 auto !important;
            width: 50% !important;
        }
        .col-md-12 {
            flex: 0 0 auto;
            width: 100%;
        }
    </style>
</head>
<body>

        <div class="card">
            <div class="card-body">
                <div class="card-sales-split">
                    <h2>Document</h2>
                </div>
                {!! $document ? $document->document : '' !!}
            </div>
        </div>
        <div class="page_break"></div>
        <div class="card" style="height: 97%; background-color: #DBE7F2">

            <div class="card-body">
                <div class="card-sales-split">
                    <h2>Invoice</h2>
                </div>
                <div class="invoice-box table-height">
                    <div class="row">
                        <div class="col-md-9"></div>
                        <div class="col-md-3" style="float: right !important;">
                            <img src="{{ asset('storage/companylogo/'.$com->Logo)}}" alt="logo" height="120px" width="100%">
                        </div>
                        <div class="col-md-9" style="margin-top:50px !important;">
                            <h4 class="text-primary"><b>Billing To</b></h4>
                            <h6>Name: {{ $info->customer_info->Name }}</h6>
                            <h6>Email: {{ $info->customer_info->Email }}</h6>
                            <h6>Phone: {{ $info->customer_info->Phone }}</h6>
                            <h6>Address: {{ $info->customer_info->Address }}</h6>
                        </div>
                        <div class="col-md-3" style="margin-top:-120px !important;float: right !important;">
                            <br><br>
                            <h6><b>Payment Status: 
                            @if($info->paid_amount== $info->total_amount)
                            Paid
                            @else
                            Due
                            @endif</b></h6>
                            <h6><b>Date: {{ $info->sales_date }}</b></h6>
                            <h6><b>Status: {{ $info->status }}</b></h6>
                        </div>
                        <div class="col-md-12" style="margin-top:30px">
                            <table cellpadding="0" cellspacing="0" style="width: 100%;line-height: inherit;text-align: left;">
                                <tbody>
                                    <tr class="heading" class="primary" style="margin-top:20px; background-color:#6CBC44">
                                        <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                            Product Name
                                        </td>
                                        <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                            QTY
                                        </td>
                                        <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                            Price
                                        </td>
                                        <td style="padding: 5px;vertical-align: middle;font-weight: 600;color: #5E5873;font-size: 14px;padding: 10px; ">
                                            Subtotal
                                        </td>
                                    </tr>

                                    @foreach($products as $product)
                                    <tr class="details" style="border-bottom:1px solid #E9ECEF ;">
                                        <td style="padding: 10px;vertical-align: top; display: flex;align-items: center;">
                                            <img src="{{URL:: asset('storage/product_img/'.$product->product_info->product_img)}}" alt="img" class="me-2" style="width:40px;height:40px;">
                                            {{ $product->product_info->product_name }}
                                        </td>
                                        <td style="padding: 10px;vertical-align: top; ">
                                            {{ $product->quantity }}
                                        </td>
                                        <td style="padding: 10px;vertical-align: top; ">
                                            {{ $product->price }}
                                        </td>
                                        <td style="padding: 10px;vertical-align: top; ">
                                            {{ ($product->quantity) * ($product->price) }}
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                        <div class="col-md-6" style="margin-top:40px">
                            <h4 class="text-primary">Terms & Conditions</h4>
                            <p>No return
                            <br>No Exchange
                            <br>Payment Before Delivery</p>
                        </div>
                        <div class="col-md-6"></div>
                        <!-- <div class="col-md-6" style="margin-top:20px">
                            <h4 class="text-primary"><b>Company Info</b></h4>
                            <h6>Name: {{ $com->Name }}</h6>
                            <h6>Email: {{ $com->Email }}</h6>
                            <h6>Phone: {{ $com->Phone }}</h6>
                            <h6>Address: {{ $com->address }}</h6>
                        </div> -->
                        <div class="col-md-8" ></div>
                        <div class="col-md-4 text-center" style="float: right !important;">
                            <h4 style="background-color:#6CBC44">Total: Rs {{ $info->total_amount }}</h4>
                            <h6>Tax: {{ $info->tax }}%</h6>
                            <h2 style="background-color:#6CBC44">Grand Total: Rs {{ $info->total_amount }}</h2>
                            <br/><br/>
                            <p>----------------------
                            <br>Aqib Zafar
                            <br>CEO</p>
                        </div>
                    </div>
                    <!-- <hr> -->
                    <div class="row text-center" style="display: inline-block;margin-top: 250px; width: 100%;">
                        <div class="col-md-4" style="display: inline-block; width: 25% !important;">
                            <h6>Email</h6>
                            <h6>{{ $com->Email}}</h6>
                        </div>
                        <div class="col-md-4" style="display: inline-block;">
                            <h6>Phone</h6>
                            <h6>{{ $com->Phone}}</h6>
                        </div>
                        <div class="col-md-4"style="display: inline-block;" >
                            <h6>Address</h6>
                            <h6>{{ $com->address}}</h6>
                        </div>
                    </div>
                </div>
            </div>
</div>
    <!-- jQuery -->
    <script src="{{ URL::asset('assets/js/jquery-3.6.0.min.js')}}"></script>

    <!-- Bootstrap Core JS -->
    <script src="{{ URL::asset('assets/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Feather Icon JS -->
    <script src="{{ URL::asset('assets/js/feather.min.js')}}"></script>

    <!-- Slimscroll JS -->
    <script src="{{ URL::asset('assets/js/jquery.slimscroll.min.js')}}"></script>

    <!-- Datatable JS -->
    <script src="{{ URL::asset('assets/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/datatables.min.js')}}"></script>

    <!-- Select2 JS -->
    <script src="{{ URL::asset('assets/plugins/select2/js/select2.min.js')}}"></script>
    <!-- Datetimepicker JS -->
    <script src="{{ URL::asset('assets/js/moment.min.js')}}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
    <!-- Chart JS -->
    <script src="{{ URL::asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/apexchart/chart-data.js')}}"></script>
    <!-- Owl JS -->
    <script src="{{ URL::asset('assets/plugins/owlcarousel/owl.carousel.min.js')}}"></script>
    <!-- Fileupload JS -->
    <script src="{{ URL::asset('assets/plugins/fileupload/fileupload.min.js')}}"></script>
    <!-- Sweetalert 2 -->
    <script src="{{ URL::asset('assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
    <script src="{{ URL::asset('assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>

    <!-- Custom JS -->
    <script src="{{ URL::asset('assets/js/script.js')}}">
    </script>

    <script type="text/javascript">
        @if($print)
            window.print();
            window.onmousemove = function() {
              window.close();
            }
        @endif
    </script>
</body>
</html>
