/*
Author       : Dreamguys
Template Name: POS - Bootstrap Admin Template
*/
// #brand ajax
// $(document).ready(function(){
function hidePurUnitPrice() {
    var hidebtn     = document.getElementById('hideUnitPrice');
    var table       = $("#hideUnitPrice").next("table");
    var Tfoot       = table.find('tfoot tr:visible');
    var unitcol     = $("table tr .unit:visible");
    var unitcolHide = $("table tr .unit");
    var qtycol      = $("table tr .qty:visible");
    var Theadlength = 0;
    
    if (unitcolHide[0].style.display == 'none') {
        
        for (let i = 0; i < unitcolHide.length; i++) {
            unitcolHide[i].style.display = "revert";
            unitcolHide[i].style.display = "revert";
            qtycol[i].style.background= "#EEEEEE";
        }
        
        Theadlength = table.find('thead th:visible').length;

        for (let i = 0; i < Tfoot.length; i++) {
            if(Theadlength == 5) {
                Tfoot[i].cells[0].setAttribute("colspan", "2");
                Tfoot[i].cells[1].setAttribute("colspan", "2");
            } else if(Theadlength == 7) {
                Tfoot[i].cells[0].setAttribute("colspan", "3");
                Tfoot[i].cells[1].setAttribute("colspan", "3");
            }
        }
        
        hidebtn.innerHTML = "Hide <b>UNIT PRICE</b> Column";
    } else{
        for (let i = 0; i < unitcol.length; i++) {
            unitcol[i].style.display = "none";
            unitcol[i].style.display = "none";
            qtycol[i].style.background= "#DDDDDD";
        }
        
        Theadlength = table.find('thead th:visible').length;

        for (let i = 0; i < Tfoot.length; i++) {
            if(Theadlength == 4) {
                Tfoot[i].cells[0].setAttribute("colspan", "2");
                Tfoot[i].cells[1].setAttribute("colspan", "1");
            } else if(Theadlength == 6) {
                Tfoot[i].cells[0].setAttribute("colspan", "3");
                Tfoot[i].cells[1].setAttribute("colspan", "2");
            }
        }

        hidebtn.innerHTML = "Show <b>UNIT PRICE</b> Column";
    }

}

function hideUnitPrice() {
    var hidebtn     = document.getElementById('hideUnitPrice');
    var unitcol     = $("table tr .unit:visible");
    var unitcolHide = $("table tr .unit");
    
    if (unitcolHide[0].style.display == 'none') {
        
        for (let i = 0; i < unitcolHide.length; i++) {
            unitcolHide[i].style.display = "revert";
            unitcolHide[i].style.display = "revert";
        }
        adjustColspan();
        hidebtn.innerHTML = "Hide <b>UNIT PRICE</b> Column";
    } else{
        for (let i = 0; i < unitcol.length; i++) {
            unitcol[i].style.display = "none";
            unitcol[i].style.display = "none";
        }
        adjustColspan();
        hidebtn.innerHTML = "Show <b>UNIT PRICE</b> Column";
    }
}

function hideQuantity() {
    var hidebtn     = document.getElementById('hideQuantity');
    var qtycol     = $("table tr .qty:visible");
    var qtycolHide = $("table tr .qty");
    
    if (qtycolHide[0].style.display == 'none') {
        
        for (let i = 0; i < qtycolHide.length; i++) {
            qtycolHide[i].style.display = "revert";
            qtycolHide[i].style.display = "revert";
        }
        adjustColspan();
        hidebtn.innerHTML = "Hide <b>QUANTITY</b> Column";
    } else{
        for (let i = 0; i < qtycol.length; i++) {
            qtycol[i].style.display = "none";
            qtycol[i].style.display = "none";
        }
        adjustColspan();
        hidebtn.innerHTML = "Show <b>QUANTITY</b> Column";
    }
}

function hideTotalPrice() {
    var hidebtn     = document.getElementById('hideTotalPrice');
    var totalcol     = $("table tr .total:visible");
    var totalcolHide = $("table tr .total");
    
    if (totalcolHide[0].style.display == 'none') {
        
        for (let i = 0; i < totalcolHide.length; i++) {
            totalcolHide[i].style.display = "revert";
            totalcolHide[i].style.display = "revert";
        }
        adjustColspan();
        hidebtn.innerHTML = "Hide <b>TOTAL PRICE</b> Column";
    } else{
        for (let i = 0; i < totalcol.length; i++) {
            totalcol[i].style.display = "none";
            totalcol[i].style.display = "none";
        }
        adjustColspan();
        hidebtn.innerHTML = "Show <b>TOTAL PRICE</b> Column";
    }
}

function adjustColspan() {
    var table       = $("#hideUnitPrice").parent().find("table");
    var Tfoot       = table.find('tfoot tr:visible');
    var Theadlength = table.find('thead th:visible').length;

    var ceil = Math.ceil(Theadlength / 3);
    ceil = ceil == 0 ? 1 : ceil;
    var mod = Theadlength % 3;
    mod = mod == 0 ? 1 : mod;

    for (let i = 0; i < Tfoot.length; i++) {
        if(Theadlength < 3) {
            mod = 0;
            Tfoot[i].cells[0].style.display = "none";
            Tfoot[i].cells[1].style.width = 40;
        } else {
            Tfoot[i].cells[0].style.display = "revert";
            Tfoot[i].cells[0].setAttribute("colspan", ceil);
            Tfoot[i].cells[1].style.width = 400;
        }
        Tfoot[i].cells[1].setAttribute("colspan", mod);
    }
}


function grandtotalcalculator() {
    var val = 0;
    var totalamount = document.getElementById('totalamount');
    var tax = document.getElementById('taxval');
    var taxval = 0;
    if(tax){
        taxval = tax.value ? parseInt(tax.value) : 0;
        tax.nextElementSibling.innerHTML = 'PKR ' + (taxval / 100 * totalamount.value);
    }
    var discount = document.getElementById('discountval');
    var dis = 0;
    if(discount){
        dis = discount.value ? parseInt(discount.value) : 0;
        discount.nextElementSibling.innerHTML = 'PKR ' + (dis / 100 * totalamount.value);
    }
    var shippingcharges = document.getElementById('shippingcharges');
    var shipval = 0;
    if(shippingcharges){
        shipval = shippingcharges.value ? parseInt(shippingcharges.value) : 0;
    }
    var grandtotal = document.getElementById('grandtotal');
    val = parseInt(totalamount.value) - (dis / 100 * totalamount.value);
    val = val + (taxval / 100 * totalamount.value) + shipval;
    if(grandtotal){
        grandtotal.value = val;
    }
}
function deletequote(id) {
    console.log(id)
    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to delete ?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "/quote-delete/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        if (response['unsuccess'] == "Record not deleted successfully!") {

                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 2000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload();
                        }
                    }
                    , error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not Deleted', '', 'info')
        }
    })
}
function deletesale(id) {
    console.log(id)
    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to delete ?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "/salesdel/" + id,
                    type: 'GET',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        if (response['unsuccess'] == "Record not deleted successfully!") {

                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 2000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload();
                        }
                    }
                    , error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not Deleted', '', 'info')
        }
    })
}
function deleteplant(id) {
    console.log(id)
    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to delete ?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "/delete-plant/" + id,
                    type: 'GET',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        if (response['unsuccess'] == "Record not deleted successfully!") {

                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 2000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload();
                        }
                    }
                    , error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not Deleted', '', 'info')
        }
    })
}
function deletesupplier(id) {
    console.log(id)
    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to delete ?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "/supplierdel/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        Swal.fire('Deleted!', '', 'success');
                        location.reload()
                    }
                    , error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not Deleted', '', 'info')
        }
    })
}
function deletespecification(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "delete_specification/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        console.log(response)
                        if (response['unsuccess'] == "Record not deleted successfully!") {

                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 2000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload();
                        }
                    }
                    , error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not Deleted', '', 'info')
        }
    })
}

function deleteemp(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "/userdel/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        if (response['unsuccess'] == "Record not deleted successfully!") {

                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 2000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload();
                        }
                    }
                    , error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire(' Not Deleted', '', 'info')
        }
    })
}
function deletecustomer(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "/customerdel/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        if (response['unsuccess'] == "Record not deleted successfully!") {

                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 2000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload();
                        }
                    }
                    , error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not Deleted', '', 'info')
        }
    })
}
function deleteuser(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax({
                url: "/user-account-list/" + id,
                type: 'DELETE',
                data: {
                    "id": id,
                    "_token": token,
                },
                success: function (response) {
                    if (response['unsuccess'] == "Record not deleted successfully!") {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'The data is linked to some other data',
                            type: 'error',
                            timer: 2000,
                        });
                    } else {
                        Swal.fire('Deleted!', '', 'success');
                        location.reload();
                    }
                },
                error: function () {
                    Swal.fire({
                        title: 'Not Deleted!',
                        text: 'Server Error',
                        type: 'error',
                        timer: 2000,
                    });
                }
            });
        }
        else if (result.isDenied) {
            Swal.fire('Not Deleted', '', 'info')
        }
    })
}
function deletesales(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "/salesdel/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        console.log(response)
                        if (response['unsuccess'] == 'Record not deleted successfully!') {
                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 2000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload();
                        }
                    }
                    , error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constraint error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire(' Not Deleted', '', 'info')
        }
    })
}
function deletesize(id) {
    console.log(id)
    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "sizedel/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        if (response['unsuccess'] == 'Record not deleted successfully!') {
                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 2000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload()
                        }
                    }, error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }

                });

        } else if (result.isDenied) {
            Swal.fire('Not Deleted', '', 'info')
        }
    })
}
function deletecate(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "categorydel/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        console.log(response['unsuccess'])
                        if (response['unsuccess'] == 'Record not deleted successfully!') {
                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 3000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload()
                        }
                    }, error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not  Deleted', '', 'info')
        }
    })
}
function deletebrands(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "/brandsdel/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        console.log(response['unsuccess'])
                        if (response['unsuccess'] == 'Record not deleted successfully!') {
                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 3000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload()
                        }
                    }, error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not  Deleted', '', 'info')
        }
    })
}
c = 1;

$('#productlist').on('select2:close', function (e) {
    addproducttocart()
});

function addproducttocart() {
    // alert('asd');
    var productid = document.getElementById('productlist');

    var oldlist = document.getElementsByName('product_id[]');

    var quantity = document.getElementsByName('quantity[]');

    for (i = 0; i < oldlist.length; i++) {

        if (productid.value === oldlist[i].value) {

            quantity[i].value = Number(quantity[i].value) + 1;
            this.totol_price();
            this.grandtotalcalculator();
            return;
        }

    }
    var producttable = document.getElementById('producttable');

    var tablerow = "";
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({

        type: "GET",
        url: "/getproduct/" + productid.value,
        // data:{id : cate_id},
        dataType: "Json",
        success: function (response) {
            console.log(response['product'].length)
            if(response['product'].length > 0){
                var count = document.getElementById("producttable");
                c = count.rows.length + 1;
                tablerow = `   <tr>
    			<td>`+ c + `</td>
    			<td>
    				<input type="hidden" name="product_id[]" value="`+ response['product'][0]['product_id'] + `"/>
    				<h6>`+ response['product'][0]['product_name'] + `</h6>
                    <input type="hidden" name="is_deleted[]" value="0">
    				<input type="hidden" class="form-control" value="`+ response['product'][0]['product_name'] + `" name="productname[]">
    			</td>
    			<td> <input onclick="this.readOnly=false" onchange="totol_price()" onblur="this.readOnly=true" readonly type="number" name="quantity[]" value="1" class="form-control"></td>
                <td>`+ response['product'][0]['product_unit'] + `</td>
    			<td> <input onclick="this.readOnly=false" onchange="totol_price()" onblur="this.readOnly=true" readonly type="number" class="form-control" value="`+ response['product'][0]['product_price'] + `" name="Amount[]"></td>
                <td> 
                    <input type="number" class="form-control" readonly id="subtotal" value="`+ response['product'][0]['product_price'] + `"/>
                    <input type="hidden" name="product_price[]" value="`+ response['product'][0]['product_price'] + `">
                </td>
                <td>
    			<a onclick="deleteProduct(this)"><i class="fa fa-trash" aria-hidden="true"></i></a>
    			</td>
    		</tr>`;
                c = c + 1;
                var oldhtml = producttable.innerHTML;

                var newhtm = oldhtml + tablerow;
                producttable.innerHTML = newhtm;
                totol_price();
                grandtotalcalculator();
            }
            // console.log(response['brands'])
            // console.log( Object.keys(response['brands']).length)

        },
        error: function (xhr, status, error) {
            console.error(xhr);
        }

    });
}
function removeradonly(r) {
}
function totol_price() {
    var quantity = document.getElementsByName('quantity[]');
    var price = document.getElementsByName('Amount[]');
    //var totalproductamount = document.getElementsByClassName('totalamount');
    var totalamount = document.getElementById('totalamount');
    var is_deleted = document.getElementsByName('is_deleted[]');
    // var tax = document.getElementById('taxval');
    // var discount = document.getElementById('discountval');
    // var shippingcharges = document.getElementById('shippingcharges');
    var k = 0;
    for (var i = 0; i < quantity.length; i++) {
        if(is_deleted[i] && is_deleted[i].value == 0) {
            quantity[i].setAttribute('value', quantity[i].value);
            price[i].setAttribute('value', price[i].value);
            price[i].parentElement.nextElementSibling.firstElementChild.setAttribute('value', Number(quantity[i].value) * Number(price[i].value));
            price[i].parentElement.nextElementSibling.lastElementChild.setAttribute('value', Number(quantity[i].value) * Number(price[i].value));

            k += Number(quantity[i].value) * Number(price[i].value);
        }
        //totalproductamount[i].innerHTML=  Number(quantity[i].value)*Number(price[i].value);
        //console.log(totalproductamount[i])
    }
    // discount /= 100;
    // k -= discount;
    // k += tax;
    // k += shippingcharges;
    totalamount.value = k;
    //console.log(totalamount.value)
    grandtotalcalculator();
}

function deleteProduct(r, edit = 0) {
    //  c=c-1;
    var i = r.parentNode.parentNode.rowIndex;
    if(edit){
        var product_id = r.parentElement.parentElement.querySelector('input[name="product_id[]"]').value;
        var Amount = r.parentElement.parentElement.querySelector('input[name="product_price[]"]').value;
        var deletedrow = `<div>
            <input type="hidden" name="product_id[]" value="`+ product_id + `"/>
            <input type="hidden" name="quantity[]" value="0">
            <input type="hidden" name="is_deleted[]" value="1">
            <div>
            <input type="hidden" value="`+ Amount + `" name="Amount[]">
            </div>
            <div>
            <input type="hidden" value="">
            </div>
        </div>`;
        var parent = r.parentElement.parentElement.parentElement.parentElement.parentElement;
        parent.innerHTML+=deletedrow;
    }
    document.getElementById("producttable1").deleteRow(i);
    updateSerialNumber();
    totol_price();
    grandtotalcalculator();
}

function updateSerialNumber(){
    var tbody = document.getElementById("producttable");
    for (var i = 0; i< tbody.rows.length; i++){
      tbody.rows[i].cells[0].innerHTML = i+1;
    }
    c = c - 1;
}

function get_brands() {
    var cate_id = document.getElementById('category_name').value;
    var size_filed = document.getElementById("size");
    size_filed.innerHTML = ""
    // var cate_id = cate_id_filed.value

    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
    $.ajax({

        type: "GET",
        url: "/get_size/" + cate_id,
        // data:{id : cate_id},
        dataType: "Json",
        success: function (response) {

            if (Object.keys(response['brands']).length != 0) {
                // console.log(response['brands'][0]['size_name'])
                size_filed.innerHTML = "<option value=''> Choose size </option>"

                for (i = 0; i < Object.keys(response['brands']).length; i++) {
                    var option = document.createElement("option");
                    option.text = response['brands'][i]['size_name']
                    option.value = response['brands'][i]['size_id']
                    size_filed.append(option, size_filed[i + 1])
                }
            }
            else {
                console.log("shfs");
                size_filed.innerHTML = "<option value=''> No size found</option>"

            }

        },
        error: function (xhr, status, error) {
            swal({
                title: 'Not Deleted!',
                text: 'foreign key constant error',
                type: 'error',
                timer: 2000,
            });
        }


    });
}

function deleteexpense(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        console.log(id);
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "delete-expense/" + id,
                    type: 'GET',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        console.log(response['unsuccess'])
                        if (response['unsuccess'] == 'Record not deleted successfully!') {
                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 3000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload(true);
                        }
                    }, error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not  Deleted', '', 'info')
        }
    })
}

function deleteacc(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        console.log(id);
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "delete-account/" + id,
                    type: 'GET',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        console.log(response['unsuccess'])
                        if (response['unsuccess'] == 'Record not deleted successfully!') {
                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 3000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload(true);
                        }
                    }, error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not  Deleted', '', 'info')
        }
    })
}

function deleteorder(id) {

    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to Delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm Delete',
        denyButtonText: `Deny`,
    }).then((result) => {
        console.log(id);
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {
            $.ajax(
                {
                    url: "delete-purchase/" + id,
                    type: 'GET',
                    data: {
                        "id": id,
                        "_token": token,
                    },
                    success: function (response) {
                        console.log(response['unsuccess'])
                        if (response['unsuccess'] == 'Record not deleted successfully!') {
                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 3000,
                            });
                        } else {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload(true);
                        }
                    }, error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                });

        } else if (result.isDenied) {
            Swal.fire('Not  Deleted', '', 'info')
        }
    })
}


$(".product_del_btn").click(function () {
    var id = $(this).data("id");
    console.log(id);
    var token = $("meta[name='csrf-token']").attr("content");
    Swal.fire({
        title: 'Do you want to delete?',
        showDenyButton: true,
        showCancelButton: false,
        confirmButtonText: 'Confirm delete',
        denyButtonText: `Deny`,
    }).then((result) => {

        console.log('Ok');
        /* Read more about isConfirmed, isDenied below */
        if (result.isConfirmed) {

            $.ajax(
                {
                    url: "/product/" + id,
                    type: 'DELETE',
                    data: {
                        "id": id,
                        "_token": token,
                    },

                    success: function (response) {
                        console.log(response)
                        if (response['success'] == "Record  deleted successfully!") {
                            Swal.fire('Deleted!', '', 'success');
                            location.reload()

                        } else {

                            Swal.fire({
                                title: 'Not Deleted!',
                                text: 'Foreign key constant error',
                                type: 'error',
                                timer: 2000,
                            });

                        }
                        //$('#producttble').DataTable().ajax.reload(null, false);
                    },
                    error: function () {
                        Swal.fire({
                            title: 'Not Deleted!',
                            text: 'Foreign key constant error',
                            type: 'error',
                            timer: 2000,
                        });
                    }
                }
            );
        } else if (result.isDenied) {
            Swal.fire('Not Deleted', '', 'info')
        }
    })


});


// brand ajax
$(document).ready(function () {

    // Variables declarations
    var $wrapper = $('.main-wrapper');
    var $slimScrolls = $('.slimscroll');
    var $pageWrapper = $('.page-wrapper');
    feather.replace();

    // Page Content Height Resize
    $(window).resize(function () {
        if ($('.page-wrapper').length > 0) {
            var height = $(window).height();
            $(".page-wrapper").css("min-height", height);
        }
    });

    // Mobile menu sidebar overlay
    $('body').append('<div class="sidebar-overlay"></div>');
    $(document).on('click', '#mobile_btn', function () {
        $wrapper.toggleClass('slide-nav');
        $('.sidebar-overlay').toggleClass('opened');
        $('html').addClass('menu-opened');
        $('#task_window').removeClass('opened');
        return false;
    });

    $(".sidebar-overlay").on("click", function () {
        $('html').removeClass('menu-opened');
        $(this).removeClass('opened');
        $wrapper.removeClass('slide-nav');
        $('.sidebar-overlay').removeClass('opened');
        $('#task_window').removeClass('opened');
    });

    // Logo Hide Btn

    $(document).on("click", ".hideset", function () {
        $(this).parent().parent().parent().hide();
    });

    $(document).on("click", ".delete-set", function () {
        $(this).parent().parent().hide();
    });

    // Owl Carousel
    if ($('.product-slide').length > 0) {
        $('.product-slide').owlCarousel({
            items: 1,
            margin: 30,
            dots: false,
            nav: true,
            loop: false,
            responsiveClass: true,
            responsive: {
                0: {
                    items: 1
                },
                800: {
                    items: 1
                },
                1170: {
                    items: 1
                }
            }
        });
    }

    //Home popular
    if ($('.owl-product').length > 0) {
        var owl = $('.owl-product');
        owl.owlCarousel({
            margin: 10,
            dots: false,
            nav: true,
            loop: false,
            touchDrag: false,
            mouseDrag: false,
            responsive: {
                0: {
                    items: 2
                },
                768: {
                    items: 4
                },
                1170: {
                    items: 8
                }
            }
        });
    }
    // Datatable
    if ($('.datanew').length > 0) {
        $('.datanew').DataTable({
            "bFilter": true,
            "sDom": 'fBtlpi',
            'pagingType': 'numbers',
            "ordering": true,
            "language": {
                search: ' ',
                sLengthMenu: '_MENU_',
                searchPlaceholder: "Search...",
                info: "_START_ - _END_ of _TOTAL_ items",
            },
            initComplete: (settings, json) => {
                $('.dataTables_filter').appendTo('#tableSearch');
                $('.dataTables_filter').appendTo('.search-input');
            },
        });
    }

    if ($('.datanewquote').length > 0) {
        $('.datanewquote').DataTable({
            "bFilter": true,
            "sDom": 'fBtlpi',
            'pagingType': 'numbers',
            "ordering": true,
             "order": [[0, 'desc']],
            "language": {
                search: ' ',
                sLengthMenu: '_MENU_',
                searchPlaceholder: "Search...",
                info: "_START_ - _END_ of _TOTAL_ items",
            },
            initComplete: (settings, json) => {
                $('.dataTables_filter').appendTo('#tableSearch');
                $('.dataTables_filter').appendTo('.search-input');
            },
        });
    }

    // image file upload image
    function readURL(input) {
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function (e) {
                $('#blah').attr('src', e.target.result);
            }

            reader.readAsDataURL(input.files[0]);
        }
    }

    $("#imgInp").change(function () {
        readURL(this);
    });


    if ($('.datatable').length > 0) {
        $('.datatable').DataTable({
            "bFilter": false
        });
    }
    // Loader
    setTimeout(function () {
        $('#global-loader');
        setTimeout(function () {
            $("#global-loader").fadeOut("slow");
        }, 100);
    }, 50);

    // Datetimepicker
    if ($('.datetimepicker').length > 0) {
        $('.datetimepicker').datetimepicker({
            format: 'DD-MM-YYYY',
            icons: {
                up: "fas fa-angle-up",
                down: "fas fa-angle-down",
                next: 'fas fa-angle-right',
                previous: 'fas fa-angle-left'
            }
        });
    }

    // toggle-password
    if ($('.toggle-password').length > 0) {
        $(document).on('click', '.toggle-password', function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $(".pass-input");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }
    if ($('.toggle-passwords').length > 0) {
        $(document).on('click', '.toggle-passwords', function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $(".pass-inputs");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }
    if ($('.toggle-passworda').length > 0) {
        $(document).on('click', '.toggle-passworda', function () {
            $(this).toggleClass("fa-eye fa-eye-slash");
            var input = $(".pass-inputs");
            if (input.attr("type") == "password") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }

    // Select 2
    if ($('.select').length > 0) {
        $('.select').select2({
            minimumResultsForSearch: -1,
            width: '100%'
        });
    }

    // Counter
    if ($('.counter').length > 0) {
        $('.counter').counterUp({
            delay: 20,
            time: 2000
        });
    }
    if ($('#timer-countdown').length > 0) {
        $('#timer-countdown').countdown({
            from: 180, // 3 minutes (3*60)
            to: 0, // stop at zero
            movingUnit: 1000, // 1000 for 1 second increment/decrements
            timerEnd: undefined,
            outputPattern: '$day Day $hour : $minute : $second',
            autostart: true
        });
    }

    if ($('#timer-countup').length > 0) {
        $('#timer-countup').countdown({
            from: 0,
            to: 180
        });
    }

    if ($('#timer-countinbetween').length > 0) {
        $('#timer-countinbetween').countdown({
            from: 30,
            to: 20
        });
    }

    if ($('#timer-countercallback').length > 0) {
        $('#timer-countercallback').countdown({
            from: 10,
            to: 0,
            timerEnd: function () {
                this.css({ 'text-decoration': 'line-through' }).animate({ 'opacity': .5 }, 500);
            }
        });
    }

    if ($('#timer-outputpattern').length > 0) {
        $('#timer-outputpattern').countdown({
            outputPattern: '$day Days $hour Hour $minute Min $second Sec..',
            from: 60 * 60 * 24 * 3
        });
    }

    // Summernote

    if ($('#summernote').length > 0) {
        $('#summernote').summernote({
            height: 300,                 // set editor height
            minHeight: null,             // set minimum height of editor
            maxHeight: null,             // set maximum height of editor
            focus: true                  // set focus to editable area after initializing summernote
        });
    }



    // Sidebar Slimscroll
    if ($slimScrolls.length > 0) {
        $slimScrolls.slimScroll({
            height: 'auto',
            width: '100%',
            position: 'right',
            size: '7px',
            color: '#ccc',
            wheelStep: 10,
            touchScrollStep: 100
        });
        var wHeight = $(window).height() - 60;
        $slimScrolls.height(wHeight);
        $('.sidebar .slimScrollDiv').height(wHeight);
        $(window).resize(function () {
            var rHeight = $(window).height() - 60;
            $slimScrolls.height(rHeight);
            $('.sidebar .slimScrollDiv').height(rHeight);
        });
    }

    // Sidebar
    var Sidemenu = function () {
        this.$menuItem = $('#sidebar-menu a');
    };

    function init() {
        var $this = Sidemenu;
        $('#sidebar-menu a').on('click', function (e) {
            if ($(this).parent().hasClass('submenu')) {
                e.preventDefault();
            }
            if (!$(this).hasClass('subdrop')) {
                $('ul', $(this).parents('ul:first')).slideUp(250);
                $('a', $(this).parents('ul:first')).removeClass('subdrop');
                $(this).next('ul').slideDown(350);
                $(this).addClass('subdrop');
            } else if ($(this).hasClass('subdrop')) {
                $(this).removeClass('subdrop');
                $(this).next('ul').slideUp(350);
            }
        });
        $('#sidebar-menu ul li.submenu a.active').parents('li:last').children('a:first').addClass('active').trigger('click');
    }

    // Sidebar Initiate
    init();
    $(document).on('mouseover', function (e) {
        e.stopPropagation();
        if ($('body').hasClass('mini-sidebar') && $('#toggle_btn').is(':visible')) {
            var targ = $(e.target).closest('.sidebar, .header-left').length;
            if (targ) {
                $('body').addClass('expand-menu');
                $('.subdrop + ul').slideDown();
            } else {
                $('body').removeClass('expand-menu');
                $('.subdrop + ul').slideUp();
            }
            return false;
        }
    });

    //toggle_btn
    $(document).on('click', '#toggle_btn', function () {
        if ($('body').hasClass('mini-sidebar')) {
            $('body').removeClass('mini-sidebar');
            $(this).addClass('active');
            $('.subdrop + ul').slideDown();
            localStorage.setItem('screenModeNightTokenState', 'night');
            setTimeout(function () {
                $("body").removeClass("mini-sidebar");
                $(".header-left").addClass("active");
            }, 100);
        } else {
            $('body').addClass('mini-sidebar');
            $(this).removeClass('active');
            $('.subdrop + ul').slideUp();
            localStorage.removeItem('screenModeNightTokenState', 'night');
            setTimeout(function () {
                $("body").addClass("mini-sidebar");
                $(".header-left").removeClass("active");
            }, 100);
        }
        return false;
    });


    if (localStorage.getItem('screenModeNightTokenState') == 'night') {
        setTimeout(function () {
            $("body").removeClass("mini-sidebar");
            $(".header-left").addClass("active");
        }, 100);
    }

    $('.submenus').on('click', function () {
        $('body').addClass('sidebarrightmenu');
    });

    $('#searchdiv').on('click', function () {
        $('.searchinputs').addClass('show');
    });
    $('.search-addon span').on('click', function () {
        $('.searchinputs').removeClass('show');
    });
    $(document).on('click', '#filter_search', function () {
        $('#filter_inputs').slideToggle("slow");
    });
    $(document).on('click', '#filter_search1', function () {
        $('#filter_inputs1').slideToggle("slow");
    });
    $(document).on('click', '#filter_search2', function () {
        $('#filter_inputs2').slideToggle("slow");
    });
    $(document).on('click', '#filter_search', function () {
        $('#filter_search').toggleClass("setclose");
    });
    $(document).on("click", ".productset", function () {
        $(this).toggleClass("active");
    });
    //Increment Decrement value
    $('.inc.button').click(function () {
        var $this = $(this),
            $input = $this.prev('input'),
            $parent = $input.closest('div'),
            newValue = parseInt($input.val()) + 1;
        $parent.find('.inc').addClass('a' + newValue);
        $input.val(newValue);
        newValue += newValue;
    });
    $('.dec.button').click(function () {
        var $this = $(this),
            $input = $this.next('input'),
            $parent = $input.closest('div'),
            newValue = parseInt($input.val()) - 1;
        console.log($parent);
        $parent.find('.inc').addClass('a' + newValue);
        $input.val(newValue);
        newValue += newValue;
    });

    if ($('.custom-file-container').length > 0) {
        //First upload
        var firstUpload = new FileUploadWithPreview('myFirstImage')
        //Second upload
        var secondUpload = new FileUploadWithPreview('mySecondImage')
    }

    $('.counters').each(function () {
        var $this = $(this),
            countTo = $this.attr('data-count');
        $({ countNum: $this.text() }).animate({
            countNum: countTo
        },
            {
                duration: 2000,
                easing: 'linear',
                step: function () {
                    $this.text(Math.floor(this.countNum));
                },
                complete: function () {
                    $this.text(this.countNum);
                }

            });

    });


    // toggle-password
    if ($('.toggle-password').length > 0) {
        $(document).on('click', '.toggle-password', function () {
            $(this).toggleClass("fa-eye fa-eye");
            var input = $(".pass-input");
            if (input.attr("type") == "text") {
                input.attr("type", "text");
            } else {
                input.attr("type", "password");
            }
        });
    }


    if ($('.win-maximize').length > 0) {
        $('.win-maximize').on('click', function (e) {
            if (!document.fullscreenElement) {
                document.documentElement.requestFullscreen();
            } else {
                if (document.exitFullscreen) {
                    document.exitFullscreen();
                }
            }
        })
    }


    $(document).on('click', '#check_all', function () {
        $('.checkmail').click();
        return false;
    });
    if ($('.checkmail').length > 0) {
        $('.checkmail').each(function () {
            $(this).on('click', function () {
                if ($(this).closest('tr').hasClass('checked')) {
                    $(this).closest('tr').removeClass('checked');
                } else {
                    $(this).closest('tr').addClass('checked');
                }
            });
        });
    }

    // Popover
    if ($('.popover-list').length > 0) {
        var popoverTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="popover"]'))
        var popoverList = popoverTriggerList.map(function (popoverTriggerEl) {
            return new bootstrap.Popover(popoverTriggerEl)
        })
    }

    // Clipboard
    if ($('.clipboard').length > 0) {
        var clipboard = new Clipboard('.btn');
    }

    // Chat
    var chatAppTarget = $('.chat-window');
    (function () {
        if ($(window).width() > 991)
            chatAppTarget.removeClass('chat-slide');

        $(document).on("click", ".chat-window .chat-users-list a.media", function () {
            if ($(window).width() <= 991) {
                chatAppTarget.addClass('chat-slide');
            }
            return false;
        });
        $(document).on("click", "#back_user_list", function () {
            if ($(window).width() <= 991) {
                chatAppTarget.removeClass('chat-slide');
            }
            return false;
        });
    })();

    // Mail important

    $(document).on('click', '.mail-important', function () {
        $(this).find('i.fa').toggleClass('fa-star').toggleClass('fa-star-o');
    });


    var selectAllItems = "#select-all";
    var checkboxItem = ":checkbox";
    $(selectAllItems).click(function () {

        if (this.checked) {
            $(checkboxItem).each(function () {
                this.checked = true;
            });
        } else {
            $(checkboxItem).each(function () {
                this.checked = false;
            });
        }

    });

    // Tooltip
    if ($('[data-bs-toggle="tooltip"]').length > 0) {
        var tooltipTriggerList = [].slice.call(document.querySelectorAll('[data-bs-toggle="tooltip"]'))
        var tooltipList = tooltipTriggerList.map(function (tooltipTriggerEl) {
            return new bootstrap.Tooltip(tooltipTriggerEl)
        })
    }

    var right_side_views = '<div class="right-side-views d-none">' +
        '<ul class="sticky-sidebar siderbar-view">' +
        '<li class="sidebar-icons">' +
        '<a class="toggle tipinfo open-layout open-siderbar" href="javascript:void(0);" data-toggle="tooltip" data-placement="left" data-bs-original-title="Tooltip on left">' +
        '<div class="tooltip-five ">' +
        '<img src="assets/img/icons/siderbar-icon2.svg" class="feather-five" alt="">' +
        '<span class="tooltiptext">Check Layout</span>' +
        '</div>' +
        '</a>' +
        '</li>' +
        '</ul>' +
        '</div>' +

        '<div class="sidebar-layout">' +
        '<div class="sidebar-content">' +
        '<div class="sidebar-top">' +
        '<div class="container-fluid">' +
        '<div class="row align-items-center">' +
        '<div class="col-xl-6 col-sm-6 col-12">' +
        '<div class="sidebar-logo">' +
        '<a href="index.html" class="logo">' +
        '<img src="assets/img/logo.png" alt="Logo" class="img-flex">' +
        '</a>' +
        '</div>' +
        '</div>' +
        '<div class="col-xl-6 col-sm-6 col-12">' +
        '<a class="btn-closed" href="javascript:void(0);"><img class="img-fliud" src="assets/img/icons/sidebar-delete-icon.svg" alt="demo"></a>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '<div class="container-fluid">' +
        '<div class="row align-items-center">' +
        '<h5 class="sidebar-title">Choose layout</h5>' +
        '<div class="col-xl-12 col-sm-6 col-12">' +
        '<div class="sidebar-image align-center">' +
        '<img class="img-fliud" src="assets/img/demo-one.png" alt="demo">' +
        '</div>' +
        '<div class="row">' +
        '<div class="col-lg-6 layout">' +
        '<h5 class="layout-title">Dark Mode</h5>' +
        '</div>' +
        '<div class="col-lg-6 layout dark-mode">' +
        '<label class="toggle-switch" for="notification_switch3">' +
        '<span>' +
        '<input type="checkbox" class="toggle-switch-input" id="notification_switch3">' +
        '<span class="toggle-switch-label ms-auto">' +
        '	<span class="toggle-switch-indicator"></span>' +
        '</span>' +
        '</span>' +
        ' </label>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        '</div>' +
        $("body").append(right_side_views);

    // Sidebar Visible

    $('.open-layout').on("click", function (s) {
        s.preventDefault();
        $('.sidebar-layout').addClass('show-layout');
        $('.sidebar-settings').removeClass('show-settings');
    });
    $('.btn-closed').on("click", function (s) {
        s.preventDefault();
        $('.sidebar-layout').removeClass('show-layout');
    });
    $('.open-settings').on("click", function (s) {
        s.preventDefault();
        $('.sidebar-settings').addClass('show-settings');
        $('.sidebar-layout').removeClass('show-layout');
    });

    $('.btn-closed').on("click", function (s) {
        s.preventDefault();
        $('.sidebar-settings').removeClass('show-settings');
    });

    $('.open-siderbar').on("click", function (s) {
        s.preventDefault();
        $('.siderbar-view').addClass('show-sidebar');
    });

    $('.btn-closed').on("click", function (s) {
        s.preventDefault();
        $('.siderbar-view').removeClass('show-sidebar');
    });

    if ($('.toggle-switch').length > 0) {
        const toggleSwitch = document.querySelector('.toggle-switch input[type="checkbox"]');
        const currentTheme = localStorage.getItem('theme');
        var app = document.getElementsByTagName("BODY")[0];

        if (currentTheme) {
            app.setAttribute('data-theme', currentTheme);

            if (currentTheme === 'dark') {
                toggleSwitch.checked = true;
            }
        }

        function switchTheme(e) {
            if (e.target.checked) {
                app.setAttribute('data-theme', 'dark');
                localStorage.setItem('theme', 'dark');
            }
            else {
                app.setAttribute('data-theme', 'light');
                localStorage.setItem('theme', 'light');
            }
        }

        toggleSwitch.addEventListener('change', switchTheme, false);
    }

    if (window.location.hash == "#LightMode") {
        localStorage.setItem('theme', 'dark');
    }
    else {
        if (window.location.hash == "#DarkMode") {
            localStorage.setItem('theme', 'light');
        }
    }


    $('ul.tabs li').click(function () {
        var $this = $(this);
        var $theTab = $(this).attr('id');
        console.log($theTab);
        if ($this.hasClass('active')) {
            // do nothing
        } else {
            $this.closest('.tabs_wrapper').find('ul.tabs li, .tabs_container .tab_content').removeClass('active');
            $('.tabs_container .tab_content[data-tab="' + $theTab + '"], ul.tabs li[id="' + $theTab + '"]').addClass('active');
        }

    });


});







