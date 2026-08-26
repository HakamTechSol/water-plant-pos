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
@if(Route::is(['form-select2']))
<script src="{{ URL::asset('assets/plugins/select2/js/custom-select.js')}}"></script>
@endif
<!-- Datetimepicker JS -->
<script src="{{ URL::asset('assets/js/moment.min.js')}}"></script>
<script src="{{ URL::asset('assets/js/bootstrap-datetimepicker.min.js')}}"></script>
@if(Route::is(['calendar']))
<!-- Full Calendar JS -->
<script src="{{ URL::asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/fullcalendar.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/fullcalendar/jquery.fullcalendar.js')}}"></script>
@endif
@if(Route::is(['chart-flot']))
<!-- Chart JS -->
<script src="{{ URL::asset('assets/plugins/flot/jquery.flot.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/flot/jquery.flot.fillbetween.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/flot/jquery.flot.pie.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/flot/chart-data.js')}}"></script>
@endif
@if(Route::is(['chart-c3']))
<!-- Chart JS -->
<script src="{{ URL::asset('assets/plugins/c3-chart/d3.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/c3-chart/c3.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/c3-chart/chart-data.js')}}"></script>
@endif
<!-- Chart JS -->
<script src="{{ URL::asset('assets/plugins/apexchart/apexcharts.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/apexchart/chart-data.js')}}"></script>
@if(Route::is(['chart-js']))
<!-- Chart JS -->
<script src="{{ URL::asset('assets/plugins/chartjs/chart.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/chartjs/chart-data.js')}}"></script>
@endif
@if(Route::is(['chart-morris']))
<!-- Chart JS -->
<script src="{{ URL::asset('assets/plugins/morris/raphael-min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/morris/morris.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/morris/chart-data.js')}}"></script>
@endif
@if(Route::is(['chart-peity']))
<!-- Chart JS -->
<script src="{{ URL::asset('assets/plugins/peity/jquery.peity.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/peity/chart-data.js')}}"></script>
@endif
@if(Route::is(['clipboard']))
<!-- Clipboard JS -->
<script src="{{ URL::asset('assets/plugins/clipboard/clipboard.min.js')}}"></script>
@endif
@if(Route::is(['counter']))
<!-- Stickynote JS -->
<script src="{{ URL::asset('assets/plugins/countup/jquery.counterup.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/countup/jquery.waypoints.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/countup/jquery.missofis-countdown.js')}}"></script>
@endif
@if(Route::is(['drag-drop']))
<!-- Dragula JS -->
<script src="{{ URL::asset('assets/plugins/dragula/dragula.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/dragula/drag-drop.min.js')}}"></script>
@endif
@if(Route::is(['form-wizard']))
<!-- Wizard JS -->
<script src="{{ URL::asset('assets/plugins/twitter-bootstrap-wizard/jquery.bootstrap.wizard.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/twitter-bootstrap-wizard/prettify.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/twitter-bootstrap-wizard/form-wizard.js')}}"></script>
@endif
@if(Route::is(['lightbox']))
<!-- Alertify JS -->
<script src="{{ URL::asset('assets/plugins/lightbox/glightbox.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/lightbox/lightbox.js')}}"></script>
@endif
@if(Route::is(['notification']))
<!-- Alertify JS -->
<script src="{{ URL::asset('assets/plugins/alertify/alertify.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/alertify/custom-alertify.min.js')}}"></script>
@endif
@if(Route::is(['rating']))
<!-- Raty JS -->
<script src="{{ URL::asset('assets/plugins/raty/jquery.raty.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/raty/custom.raty.js')}}"></script>
@endif
@if(Route::is(['scrollbar']))
<!-- Plyr JS -->
<script src="{{ URL::asset('assets/plugins/scrollbar/scrollbar.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/scrollbar/custom-scroll.js')}}"></script>
@endif
@if(Route::is(['stickynote']))
<!-- Stickynote JS -->
<script src="{{ URL::asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/stickynote/sticky.js')}}"></script>
@endif
@if(Route::is(['text-editor','document']))
<!-- Summernote JS -->
<!-- <script src="{{ URL::asset('assets/plugins/summernote/dist/summernote-bs4.min.js')}}"></script> -->

<!-- include summernote css/js -->
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
@endif
@if(Route::is(['timeline']))
<!-- Stickynote JS -->
<script src="{{ URL::asset('assets/js/jquery-ui.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/stickynote/sticky.js')}}"></script>
@endif
@if(Route::is(['toastr']))
<script src="{{ URL::asset('assets/plugins/toastr/toastr.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/toastr/toastr.js')}}"></script>
@endif
@if(Route::is(['rangeslider']))
<!-- Rangeslider JS -->
<script src="assets/plugins/ion-rangeslider/ion.rangeSlider.min.js"></script>
<script src="assets/plugins/ion-rangeslider/custom-rangeslider.js"></script>
@endif
<!-- Owl JS -->
<script src="{{ URL::asset('assets/plugins/owlcarousel/owl.carousel.min.js')}}"></script>
<!-- Fileupload JS -->
<script src="{{ URL::asset('assets/plugins/fileupload/fileupload.min.js')}}"></script>
<!-- Sweetalert 2 -->
<script src="{{ URL::asset('assets/plugins/sweetalert/sweetalert2.all.min.js')}}"></script>
<script src="{{ URL::asset('assets/plugins/sweetalert/sweetalerts.min.js')}}"></script>
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

<!-- Custom JS -->
<script src="{{ URL::asset('assets/js/script.js')}}"></script>

<script>
var employees_select = document.getElementById("Employee");
var employee_column = document.getElementById("Employee_column");
var Expenses_select = document.getElementById("Expenses");
var Expenses_column = document.getElementById("Expense_column");
employees_select.style.display = "none";
employee_column.style.display = "none";
Expenses_select.style.display = "none";
Expenses_column.style.display = "none";
function gettypedetails(){
   var type = document.getElementById("type"); 
   var value = type.value;

   if(type.value=="Employee_Type"){
       employees_select.style.display = "block";
        employee_column.style.display = "block";
        Expenses_select.style.display = "none";
        Expenses_column.style.display = "none";
   }
    else if(type.value=="Expense_Type"){
       employees_select.style.display = "none";
        employee_column.style.display = "none";
        Expenses_select.style.display = "block";
        Expenses_column.style.display = "block";
   }
}

</script>
{{-- Working For Add Quotation By Getting Data From Link and make it dynamic --}}
<script type="text/javascript">
    $("#plantId").on("change", function() {
        var id = $("#plantId").val();
        $.ajax({
            url: '/get-plant-products'
            , type: "POST"
            , data: {
                id: id
                , _token: "{{ csrf_token() }}"
            }
            , success: function(plant_products) {
                $("#producttable").append(plant_products);
                totol_price();
            }

        }); // indentation
    })

</script>

{{-- Working For Sale Working --}}
<script type="text/javascript">
    $(document).ready(function() {

        $("#customerId").on("change", function() {
            var id = $("#customerId").val();

            $.ajax({
                url: '/get-sales'
                , type: "POST"
                , data: {
                    id: id
                    , _token: "{{ csrf_token() }}"
                },

                success: function(sales) {
                    $("#saleDrop").html(sales)
                }
            });

        });

    })

    // Getting Sale Drop
    $(document).ready(function() {

        $("#saleDrop").on("change", function() {
            var Saleid = $("#saleDrop").val();
            console.log(Saleid)

            $.ajax({
                url: '/get-sales-details'
                , type: "POST"
                , data: {
                    id: Saleid
                    , _token: "{{ csrf_token() }}"
                },

                success: function(sales) {
                    // console.log(sales)
                    $("#invoiceTab").append(sales)
                }
            });
        });
    });

    // Working For Attendance Storing and Getting Data
    $(document).ready(function() {
        $("#attdatePicker").on("change", function() {
            var date = $("#attdatePicker").val();
            $.ajax({
                url: "{!! url('get-attendance') !!}"
                , type: "POST"
                , data: {
                    id: date
                    , _token: "{{ csrf_token() }}"
                }
                , success: function(response) {
                    $("#AtteTable").html(response)
                }

            })



        })
    });
    @if(isset($sale) && isset($purchase))
    if ($('#sales_chartt').length > 0) {
        var options = {
            series: [{
                name: 'Sales'
                , data: {!!$sale!!}
            , }, {
                name: 'Purchase'
                , data: {!!$purchase!!}
            }]
            , colors: ['#28C76F', '#EA5455']
            , chart: {
                type: 'bar'
                , height: 300
                , stacked: true,

                zoom: {
                    enabled: true
                }
            }
            , responsive: [{
                breakpoint: 280
                , options: {
                    legend: {
                        position: 'bottom'
                        , offsetY: 0
                    }
                }
            }]
            , plotOptions: {
                bar: {
                    horizontal: false
                    , columnWidth: '20%'
                    , endingShape: 'rounded'
                }
            , }
            , xaxis: {
                categories: [' Jan ', 'feb', 'march', 'april'
                    , 'may', 'june', 'july', 'august', 'september'
                    , 'october', 'november', 'december'
                ]
            , }
            , legend: {
                position: 'right'
                , offsetY: 40
            }
            , fill: {
                opacity: 1
            }
        };

        var chart = new ApexCharts(document.querySelector("#sales_chartt"), options);
        chart.render();
    }
    @endif

</script>

<script type="text/javascript">
    $(document).ready(function() {
        $('#getMonth').on("change", function() {
            var month = $('#getMonth').val();
            console.log(month);

            $.ajax({

                url: "/get-salary-att"
                , type: "POST"
                , data: {
                    id: month
                    , _token: "{{ csrf_token() }}"
                },

                success: function(response) {
                    $("#salTable").html(response)
                }

            });
        })

        // Datatable2
        if ($('.datanew1').length > 0) {
            $('.datanew1').DataTable({
                "dom": 'Bfrtip'
                , "buttons": [
                    'excel', 'pdf'
                ]
                , "bFilter": true
                , "sDom": 'fBtlpi'
                , 'pagingType': 'numbers'
                , "ordering": true
                , "language": {
                    search: ' '
                    , sLengthMenu: 'MENU'
                    , searchPlaceholder: "Search..."
                    , info: "START - END of TOTAL items"
                , },
                // initComplete: (settings, json)=>{
                //     $('.dataTables_filter').appendTo('#tableSearch');
                //     $('.dataTables_filter').appendTo('.search-input');
                // },
            });
        }
    });

    $('.select2').select2();
    $(".convert-to-sale").on("click", function() {
        var id = $(this).data('id');
        var amount = $(this).data('amount');

        $.ajax({
            url: "/check-quote-convert-to-sale/" + id
            , type: "GET"
            , data: {
                _token: "{{ csrf_token() }}"
            }
            , success: function(response) {
                if (response.error) {
                    swal({
                        text: response.msg
                        , icon: "error"
                    , });
                } else {
                    var url = "/quote-convert-to-sale/" + id;
                    $('#convert-to-sale-form').attr("action", url);
                    $('#total_amount_convert').val(amount);
                    $('#convert-to-sale-modal').modal('show');
                }
            }

        });
    });

</script>

<script src="https://cdn.datatables.net/1.13.1/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/dataTables.buttons.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/pdfmake.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.html5.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jszip/3.1.3/jszip.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.1.53/vfs_fonts.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.2/js/buttons.print.min.js"></script>
