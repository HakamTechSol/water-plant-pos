<?php

use App\Http\Controllers\addbrands;
use App\Http\Controllers\AddCategory;
use App\Http\Controllers\addproducts;
use App\Http\Controllers\companysettingController;
use App\Http\Controllers\CustomAuthController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\DocumentController;
use App\Http\Controllers\employeeController;
use App\Http\Controllers\PosController;
use App\Http\Controllers\salesController;
use App\Http\Controllers\SpecificationController;
use App\Http\Controllers\SizeController;
use App\Http\Controllers\supplierController;
use App\Http\Controllers\usercontroller;
use FontLib\Table\Type\name;
use Illuminate\Support\Facades\Route;

// Route::get('/', function () {

//     return view('signin');

// })->name('ok');

Route::get('/', [PosController::class, 'login_page'])->name('login');

Route::post('custom-login', [CustomAuthController::class, 'customSignin'])->name('signin.custom');

Route::post('signin', [usercontroller::class, 'login'])->name('signin1');

Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

Route::get('signout', [CustomAuthController::class, 'signOut'])->name('signout');

//my own routes
Route::resource('category', AddCategory::class);

// Aamir Working For POS

// With MiddleWare Working

Route::middleware('admin')->group(function () {

    Route::get('/reporting', [PosController::class, 'reporting'])->name('reporting');
    Route::post('/reporting', [PosController::class, 'reporting'])->name('reporting');
// Preview For Adding Bank Account.
    Route::get('/document', [DocumentController::class, 'index'])->name('document');
    Route::post('/document-store', [DocumentController::class, 'documentStore'])->name('store.document');
    Route::get('/create-account', [PosController::class, 'add_account'])->name('preview.account.page');

// Saving OF Bank Account
    Route::post('/create-account', [PosController::class, 'store_account'])->name('store.account');

// List Of Accounts(Createed By Main Admin)
    Route::get('/list-all-account', [PosController::class, 'list_accounts'])->name('account.list');

// Delete Of Accout
    Route::get('/delete-account/{id}', [PosController::class, 'delete_account'])->name('delete.account');

// Edit Account
    Route::get('/edit-account/{id}', [PosController::class, 'edit_account'])->name('edit.account');

// Update Account
    Route::post('/update-account/{id}', [PosController::class, 'update_account'])->name('update.account');

// Create Expense
    Route::get('/create-expense', [PosController::class, 'add_expense'])->name('create.expense');

// Store Expense
    Route::post('/store-expense', [PosController::class, 'store_expense'])->name('store.expense');

// List Of Expense
    Route::get('/list-expense', [PosController::class, 'expense_list'])->name('list.expense');

//Filter Expense
    Route::post('/list-expense', [PosController::class, 'filter_expenses'])->name('filter.expense');

// Edit Expense
    Route::get('/edit-expense/{id}', [PosController::class, 'edit_expense'])->name('edit.expense');

// Update Expense
    Route::post('/update-expense/{id}', [PosController::class, 'update_expense'])->name('update.expense');

// Delete Expense
    Route::get('/delete-expense/{id}', [PosController::class, 'delete_expense'])->name('delete.expense');
// Add Purchase
    Route::get('/add-purchase', [PosController::class, 'add_purchase'])->name('add.purchase');

// Storing of Purchase
    Route::post('/store-purchase', [PosController::class, 'store_purchase'])->name('store.purchase');

// List Of All Purchases
    Route::get('/list-all-purchases', [PosController::class, 'list_purchases'])->name('purchase.list');

// Edit Purchase
    Route::get('/edit-purchase/{id}', [PosController::class, 'edit_purchase'])->name('edit.purchase');

    // Update Purchase
    Route::post('/update-purchase/{id}', [PosController::class, 'update_purchase'])->name('update.purchase');

// Delete Purchase
    Route::get('/delete-purchase/{id}', [PosController::class, 'delete_purchase'])->name('delete.purchase');

    // Add Plant
    Route::get('/add-plant', [PosController::class, 'add_plant'])->name('add.plant');

    // List Of Plants
    Route::get('/list-plants', [PosController::class, 'list_plant'])->name('plant.list');

    // Storing Of Plant
    Route::post('/store-plant', [PosController::class, 'store_plant'])->name('store.plant');

    // Deletion Of Plant + Listing
    Route::get('/delete-plant/{id}', [PosController::class, 'delete_plant'])->name('delete.plant');

    // Edit Plant
    Route::get('/edit-plant/{id}', [PosController::class, 'edit_plant'])->name('edit.plant');

    // Update Plant
    Route::post('/update-plant/{id}', [PosController::class, 'update_plant'])->name('update.plant');

    // Quote Main Pgae
    Route::get('/add-quote', [PosController::class, 'add_qoute'])->name('add.quote');

    // Getting Plant Products
    Route::POST('/get-plant-products', [PosController::class, 'plant_products'])->name('plant.products');

    // Sale Update
    Route::post('/update-sales/{id}', [salesController::class, 'sale_update'])->name('update.sales');

    // Sales Return
    Route::get('/sales-return', [PosController::class, 'sales_return'])->name('sale.return.list');

    // Purchase Return Listg
    Route::get('/purchase-return', [PosController::class, 'purchase_return'])->name('purchase.return.list');

    // Quote Storing to DB
    Route::post('/store-quote', [PosController::class, 'store_quote'])->name('store.quote');

    // Quotation List
    Route::get('/quote-list', [PosController::class, 'quote_list'])->name('quotation.list');

    // Quote Convert to Sale
    Route::get('/check-quote-convert-to-sale/{id}', [PosController::class, 'checkQuoteConvertToSale'])->name('quote.check-convert-to-sale');
    Route::post('/quote-convert-to-sale/{id}', [PosController::class, 'QuoteConvertToSale'])->name('quote.convert-to-sale');

    // Quote Deletion
    Route::delete('/quote-delete/{id}', [PosController::class, 'quote_delete']);

    // Edit Quote
    Route::get('/edit-quote/{id}', [PosController::class, 'edit_quote'])->name('edit.quote');

    // Update Quote
    Route::post('/update-quote/{id}', [PosController::class, 'update_quote'])->name('update.quote');

    // Create Invoice
    Route::get('/add-invoice', [PosController::class, 'add_invoice'])->name('add.invoice');

    // Ajax sales working
    Route::post('/get-sales', [PosController::class, 'get_sales_options']);

    // Ajax Adding Sales
    Route::post('/get-sales-details', [PosController::class, 'sales_details']);

    // Sales Detail
    Route::get('/sales-details-preview/{id}', [salesController::class, 'sale_detail'])->name('sales.detail.page');

    // Quote Sve
    Route::post('/save-quote', [PosController::class, 'quote_save'])->name('invoice.store');

    // List Of Invoices
    Route::get('/list-all-invoices', [PosController::class, 'invoice_list'])->name('invoice.list');

    // Delete Invoice
    Route::get('/delete-invoice/{id}', [PosController::class, 'delete_invoice'])->name('delete.invoice');

    // Edit Invoice
    Route::get('/edit-invoice/{id}', [PosController::class, 'edit_invoice'])->name('edit.invoice');

    // Show Invoice
    Route::get('/show-invoice/{id}', [PosController::class, 'showInvoice'])->name('show.invoice');
    Route::get('/export-invoice/{id?}/{type?}', [PosController::class, 'exportInvoice'])->name('export.invoice');

    // Update Invoice
    Route::post('/update-invoice/{id}', [PosController::class, 'update_invoice'])->name('update.invoice');

    // View Purchase
    Route::get('/view-purchase/{id}', [PosController::class, 'purchase_view'])->name('view.purchase');

    // View Plant Details
    Route::get('/view-plant/{id}', [PosController::class, 'plant_view'])->name('view.plant');

    // View Quote Details
    Route::get('/quote-details/{id}', [PosController::class, 'quote_detail'])->name('view.quote.details');

    // Attendance Working
    Route::get('/add-attendance', [PosController::class, 'add_attendance'])->name('add.attendance');

    // Get Attendance
    Route::post('/get-attendance', [PosController::class, 'get_attendance']);

    //Store Attendance
    Route::post('/store-attendance', [PosController::class, 'store_attendance'])->name('store.attendance');

    // Salary List
    Route::get('/employee-salary', [PosController::class, 'salary_page'])->name('employee.salary');

    // Getting Employees Salary
    Route::post('/get-salary-att', [PosController::class, 'salary_calaulate']);

    // specfication list
    Route::get('/Specification_list', [SpecificationController::class, 'index'])->name('Specificationlist');

    // add specfication
    Route::get('/add_specification', function () {
        return view('add_specification');})->name('add_specification');

    Route::post('/addspecification', [SpecificationController::class, 'store'])->name('addspecification');

    //view specfication

    Route::get('/view_specification/{id}', [SpecificationController::class, 'edit'])->name('view_specification');
    //add specification

    Route::post('/add_specification', function () {
        return view('add_specification');})->name('add.specification');

//edit specification
    Route::get('/edit_specification/{id}', [SpecificationController::class, 'edit2'])->name('edit_specification');
    Route::post('/edit_specification/{id}', [SpecificationController::class, 'update'])->name('edit_specification');

//delete specification

    Route::delete('delete_specification/{id}', [SpecificationController::class, 'destroy']);
    // FAHAD WORKING

    Route::get('/addcategory', function () {
        return view('addcategory');
    })->name('addcategory');

    Route::get('category_export', [AddCategory::class, 'export'])->name('category.export');

    Route::post('addcategory', [AddCategory::class, 'store'])->name('add-category');

    Route::get('categorylist', [AddCategory::class, 'index'])->name('categorylist');

    Route::delete('categorydel/{id}', [AddCategory::class, 'destroy'])->name('category.destroy');

    Route::get('editcategory/{id}', [AddCategory::class, 'edit'])->name('editcategory1');

    Route::post('editcategory/{id}', [AddCategory::class, 'update'])->name('editcategory2');

    Route::get('size', [SizeController::class, 'index'])->name('size');

    Route::post('size', [SizeController::class, 'store'])->name('addsize');

    Route::get('sizelist', [SizeController::class, 'show'])->name('sizelist');

    Route::delete('sizedel/{id}', [SizeController::class, 'destroy'])->name('size.destroy');

    Route::get('editsize/{id}', [SizeController::class, 'edit'])->name('editsize');

    Route::get('size_export', [SizeController::class, 'export'])->name('size.export');

    Route::post('editsize/{id}', [SizeController::class, 'update'])->name('editsize2');

    //brands
    Route::get('addbrand', [addbrands::class, 'index']);

    Route::post('addbrand', [addbrands::class, 'store'])->name('addbrand1');

    Route::get('brandlist', [addbrands::class, 'index'])->name('brandlist');

    Route::get('editbrand/{id}', [addbrands::class, 'edit'])->name('editbrand');

    Route::post('editbrand/{id}', [addbrands::class, 'update'])->name('editbrand2');

    Route::get('/addbrand', function () {
        return view('addbrand');
    })->name('addbrand');

    Route::delete('brandsdel/{id}', [addbrands::class, 'destroy'])->name('brandsdel.destroy');

    //size
    Route::get('get_size/{id}', [SizeController::class, 'fetch_size']);

    Route::get('addproduct', [addproducts::class, 'index'])->name('addproduct');

    Route::post('addproduct', [addproducts::class, 'store'])->name('add_product');

    Route::get('productlist', [addproducts::class, 'show'])->name('productlist');

    Route::get('edit_product/{id}', [addproducts::class, 'edit'])->name('editproduct');

    Route::post('edit_product/{id}', [addproducts::class, 'update'])->name('edit_product');

    Route::get('product_detail/{id}', [addproducts::class, 'edit_2'])->name('productdetail');

    Route::delete('/product/{id}', [addproducts::class, 'destroy']);

    Route::get('product_export', [addproducts::class, 'export'])->name('product.export');

    Route::get('product_export_pdf', [addproducts::class, 'create_pdf']);

    //customers
    Route::post('/addcustomer', [CustomerController::class, 'store'])->name('add-customer');
    Route::post('/addcustomeronsales', [CustomerController::class, 'storeajax'])->name('addcustomeronsales');
    Route::get('/addcustomer', function () {
        return view('addcustomer');
    })->name('addcustomer');
    Route::get('customerlist', [CustomerController::class, 'index'])->name('customerlist');

    Route::get('editcustomer/{id}', [CustomerController::class, 'edit'])->name('editcustomer');

    Route::post('editcustomer/{id}', [CustomerController::class, 'update'])->name('editcustomer2');

    Route::delete('customerdel/{id}', [CustomerController::class, 'destroy'])->name('customer.destroy');

    //supplier
    Route::get('/addsupplier', function () {
        return view('addsupplier');
    })->name('addsupplier');

    Route::post('/addsupplier', [supplierController::class, 'store'])->name('add-supplier');

    Route::get('supplierlist', [supplierController::class, 'index'])->name('supplierlist');

    Route::get('editsupplier/{id}', [supplierController::class, 'edit'])->name('editsupplier');

    Route::post('editsupplier/{id}', [supplierController::class, 'update'])->name('editsupplier2');

    Route::delete('supplierdel/{id}', [supplierController::class, 'destroy'])->name('supplier.destroy');

    // Route::resource('/addcustomer', [CustomerController::class, 'storeajax']);
    // sales part
    Route::get('add-sales', [salesController::class, 'index'])->name('add-sales');

    Route::get('getproduct/{id}', [addproducts::class, 'fetch_product']);

    Route::post('addsales', [salesController::class, 'store'])->name('addsales');

    Route::get('saleslist', [salesController::class, 'getsales'])->name('saleslist');

    Route::get('salesdel/{id}', [salesController::class, 'destroy'])->name('salesdel.destroy');

    Route::get('/sales-details/{id}', [salesController::class, 'sale_update'])->name('sales-details');

    Route::get('edit-sales/{id}', [salesController::class, 'edit2'])->name('edit-sales');

    Route::post('edit-sales/{id}', [salesController::class, 'update'])->name('editsales');

    Route::get('companysettings', [companysettingController::class, 'index'])->name('companysettings');

    Route::post('companysettings', [companysettingController::class, 'store'])->name('addcompanysettings');

    Route::post('unofficialsettings', [CompanySettingController::class, 'store_unofficial'])->name('unofficial.settings');

    Route::post('companysettings/{id}', [companysettingController::class, 'update'])->name('updatecompanysettings');

    Route::get('/export-sale/{id?}/{type?}', [salesController::class, 'exportSales'])->name('export.sales');

    //users
    Route::get('user-account-list', [usercontroller::class, 'index'])->name('user-account-list');

    Route::post('/add-user-account', [usercontroller::class, 'store'])->name('add-user-account');

    Route::get('edit-user-account/{id}', [usercontroller::class, 'edit'])->name('edituser-account-list');

    Route::post('edit-user-account/{id}', [usercontroller::class, 'update'])->name('edit-user-account');

    Route::delete('user-account-list/{id}', [usercontroller::class, 'destroy'])->name('user-account-list.destroy');

    //profile
    Route::get('profile/{id?}', [usercontroller::class, 'edit2'])->name('profile');

    Route::post('profile/{id?}', [usercontroller::class, 'updatebyuser'])->name('profile');

    //Route::post('profileimg/{id}', [usercontroller::class, 'updateuserimg'])->name('profileimg');

    Route::get('/adduser', function () {
        return view('adduser');
    })->name('adduser');

    //new adduser
    Route::get('/add-user-account', function () {
        return view('add-user-account');
    });

    Route::post('adduser', [employeeController::class, 'store'])->name('adduser');

    Route::get('userlist', [employeeController::class, 'index'])->name('userlist');

    Route::get('edituser/{id}', [employeeController::class, 'edit'])->name('edituser');

    Route::post('edituser/{id}', [employeeController::class, 'update'])->name('edituser');

    Route::delete('userdel/{id}', [employeeController::class, 'destroy'])->name('user.destroy');

    Route::get('/index/{year?}', [PosController::class, 'index'])->name('index');

});
