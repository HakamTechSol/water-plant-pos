<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\companysettings;
use App\Models\customer;
use App\Models\Document;
use App\Models\products;
use App\Models\Sales;
use App\Models\salesproduct;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use PDF;

class salesController extends Controller
{
    public function index()
    {
        $product = products::all();
        $customer = customer::all();
        $accounts = Account::all();

        $data = compact('product', 'customer', 'accounts');

        // return view('add-sales', ['product' => $products, 'customer' => $customer]);

        return view('add-sales')->with($data);

    }

    public function store(Request $request)
    {
        $request->validate([
            'customer' => 'required',
            'orderdate' => 'required',
            'status' => 'required',
            'paidamount' => 'required',
            'totalamount' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'Amount' => 'required',
            'sale_account' => 'required',
            'sale_type' => 'required|in:"Official", "Unofficial"',
        ]);

        foreach ($request->product_id as $key => $product_id) {

            $product = products::where('product_id', '=', $product_id)->firstOrFail();

            if ($product->product_qty < $request->quantity[$key]) {
                return redirect()->back()->with('error', 'Product ' . $product->product_name . ' is less than demanded quantity');
            }

        }

        $company = companysettings::Where('type', '=', $request['sale_type'])->firstOrFail();

        $sale = new Sales;
        $sale->customer_id = $request['customer'];
        $sale->status = $request['status'];
        $sale->account_id = $request['sale_account'];
        $sale->paid_amount = $request['paidamount'];
        $sale->total_amount = $request['totalamount'];
        $sale->sales_date = $request['orderdate'];
        $sale->user_id = session('user_id');
        $sale->Sale_type = $request['sale_type'];
        $sale->Company_id = $company->id;
        $sale->shipping_charges = $request['shipping_charges'];
        $sale->tax = $request['tax'];
        $sale->discount = $request['discount'];
        $sale->save();

        // Working for Balancing account amount.
        $acc = Account::find($request['sale_account']);

        $balance = $acc->amount + $request['paidamount'];

        $acc->bank_name;
        $acc->account_number;
        $acc->account_title;
        $acc->admin_id;
        $acc->amount = $balance;

        $acc->save();

        $salesid = $sale->id;

        foreach ($request->product_id as $key => $product_id) {

            $product = products::where('product_id', '=', $product_id)->firstOrFail();

            $product_qty = (int) $product->product_qty;
            $current_qty = (int) $request->quantity[$key];
            $newqty = $product_qty - $current_qty;
            DB::table('products')->where('product_id', '=', $product_id)->update([
                'product_qty' => $newqty,
            ]);
            $salesproduct = new salesproduct();
            $salesproduct->product_id = $product_id;
            $salesproduct->saleid = $salesid;
            $salesproduct->price = $request->Amount[$key];
            $salesproduct->quantity = $request->quantity[$key];

            $salesproduct->save();

        }

        return redirect()->route('saleslist')->with('success', 'Sale has been created successfully.');
    }

    public function getsales()
    {
        $sales = Sales::with('acc_info', 'user_info','sale_products.product_info.brand_info')
            ->orderBy('sales.id', 'desc')
            ->get();
            
        $data = compact('sales');
        
        return view('saleslist')->with($data);

    }

    public function sale_detail($id)
    {

        $info = Sales::with('customer_info')->find($id);

        $products = salesproduct::where('saleid', '=', $id)->with('product_info','product_info.brand_info','product_info.size_info')->get();

        $com = companysettings::find($info->Company_id);
        // companysettings::where('id', '=',1);

        $data = compact('info', 'com', 'products');

        return view('sales-details')->with($data);
    }

    public function edit2($id)
    {
        $sale = Sales::with('customer_info')->find($id);

        $sale_products = salesproduct::with('product_info')->where('saleid', '=', $id)->get();

        $accounts = Account::all();

        $products = products::all();

        $data = compact('sale', 'sale_products', 'products', 'accounts');

        return view('edit-sales')->with($data);

    }
    public function sale_update(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required',
            'sales_date' => 'required',
            'paid_amount' => 'required',
            'status' => 'required',
            'sale_account' => 'required',
            'total_amount' => 'required',
            'product_id' => 'required',
            // 'quantity' => 'required',
            // 'amount' => 'required',
            'sale_type' => 'required|in:"Official", "Unofficial"',
        ]);

        try{

        if(count($request->product_id) == 1){
            foreach ($request->product_id as $key => $product_id) {
                if(isset($request->is_deleted[$key]) && $request->is_deleted[$key] == 1){
                    return redirect()->back()->with('error', 'Please Select Products.');
                }
            }
        }

        foreach ($request->product_id as $key => $product_id) {
            $saleOldQuantity = salesproduct::where('saleid', '=', $id)->where('product_id', '=', $product_id)->first();
            $product = products::where('product_id', '=', $product_id)->firstOrFail();
            if ($saleOldQuantity != null) {
                $sale_qty = (int) $saleOldQuantity->quantity;
                $product_qty = (int) $product->product_qty;
                $current_qty = (int) $request->quantity[$key];
            } else{
                $sale_qty=0;
                $current_qty = (int) $request->quantity[$key];
            }

            if ($sale_qty >= 0) {
                if ($sale_qty < $current_qty) {
                    $newqty = $current_qty - $sale_qty;
                    if ($product->product_qty <  $newqty) {
                        return redirect()->back()->with('error', 'Product ' . $product->product_name . ' is less than demanded quantity');
                    }
                } 
            } 
          

        }
        $company = companysettings::Where('type', '=', $request['sale_type'])->firstOrFail();
        $sale = Sales::find($id);
        $saleoldstatus = $sale->status;
        $saleoldaccount = $sale->account_id;
        $saleoldamount = $sale->paid_amount; 
        $sale->customer_id = $request['customer_id'];
        $sale->status = $request['status'];
        $sale->account_id = $request['sale_account'];
        $sale->paid_amount = $request['paid_amount'];
        $sale->total_amount = $request['total_amount'];
        $sale->sales_date = $request['sales_date'];
        $sale->user_id = session('user_id');
        $sale->tax = $request['tax'];
        $sale->Sale_type = $request['sale_type'];
        $sale->Company_id = $company->id;
        $sale->shipping_charges = $request['shipping_charges'];
        $sale->discount = $request['discount'];
        $sale->save();
       

        // Working for Balancing account amount.
        $previousacc = Account::find($saleoldaccount);

        // $prevbal = 0;
        // $current = 0;
        if ($saleoldstatus != 'Return') {
            $prevbal = $previousacc->amount - $saleoldamount;
            $previousacc->amount = $prevbal;
            $previousacc->bank_name;
            $previousacc->account_number;
            $previousacc->account_title;
            $previousacc->admin_id;
            $previousacc->save();
        }
        $acc = Account::find($request['sale_account']);

        if ($request['status'] != 'Return') {
            $current = $acc->amount + $request['paid_amount'];
            $acc->bank_name;
            $acc->account_number;
            $acc->account_title;
            $acc->admin_id;
            $acc->amount = $current;

            $acc->save();
        }

        if($saleoldstatus != 'Return'){
            // update quantity in product before delete
            if($request['status'] == 'Return'){
                foreach ($request->product_id as $key => $product_id) {
                    $product = products::where('product_id', '=', $product_id)->firstOrFail();
                    $saleOldQuantity = salesproduct::where('saleid', '=', $id)->where('product_id', '=', $product_id)->first();
                    $product_qty = (int) $product->product_qty;
                    $current_qty = (int) $request->quantity[$key];
                    $newqty = $product_qty + $current_qty;
                    DB::table('products')->where('product_id', '=', $product_id)->update([
                        'product_qty' => $newqty,
                    ]);
                }
            }
            else{
                foreach ($request->product_id as $key => $product_id) {
                    $product = products::where('product_id', '=', $product_id)->firstOrFail();
                    $saleOldQuantity = salesproduct::where('saleid', '=', $id)->where('product_id', '=', $product_id)->first();
                    if ($saleOldQuantity !== null) {
                        $sale_qty = (int) $saleOldQuantity->quantity;
                        $product_qty = (int) $product->product_qty;
                        $current_qty = (int) $request->quantity[$key];
                    } else {
                        $sale_qty=0;
                        $current_qty = (int) $request->quantity[$key];
                    }
    
                    if ($sale_qty > 0) {
                        if ($sale_qty >= $current_qty) {
                            $newqty = $sale_qty - $current_qty;
                            $newqty = $product_qty + (int) $newqty;
                        } else {
                            $newqty = $current_qty - $sale_qty;
                            $newqty = $product_qty - (int) $newqty;
                        }
                    } else {
                        $product_qty = (int) $product->product_qty;
                        $current_qty = (int) $request->quantity[$key];
                        $newqty = $product_qty - $current_qty;
                    }
    
                    DB::table('products')->where('product_id', '=', $product_id)->update([
                        'product_qty' => $newqty,
                    ]);
                }
            }
        }
        else{
            if($request['status'] != 'Return'){
                // update quantity in product before delete
                foreach ($request->product_id as $key => $product_id) {
                    $product = products::where('product_id', '=', $product_id)->firstOrFail();
                    $saleOldQuantity = salesproduct::where('saleid', '=', $id)->where('product_id', '=', $product_id)->first();
                    $product_qty = (int) $product->product_qty;
                    $current_qty = (int) $request->quantity[$key];
                    $newqty = $product_qty - $current_qty;
                    DB::table('products')->where('product_id', '=', $product_id)->update([
                        'product_qty' => $newqty,
                    ]);
                }
            }
        }

        

        $del = salesproduct::where('saleid', '=', $id)->delete();

        $salesid = $id;

        foreach ($request->product_id as $key => $product_id) {

            if(isset($request->is_deleted[$key]) && $request->is_deleted[$key] == 0){
                $salesproduct = new salesproduct();
                $salesproduct->product_id = $product_id;
                $salesproduct->saleid = $salesid;
                $salesproduct->price = $request->Amount[$key];
                $salesproduct->quantity = $request->quantity[$key];
                $salesproduct->save();
            } else {
                $curbal = $acc->amount + $request->Amount[$key] * $request->quantity[$key];
                $acc->amount = $curbal;
                $acc->bank_name;
                $acc->account_number;
                $acc->account_title;
                $acc->admin_id;
                $acc->save();
            }
        }
        return redirect()->back()->with('success', 'Sale has been updated successfully.');}
        catch(Exception $e){
        return redirect()->back()->with('error', $e);
            
        }

    }
    public function exportSales($id = 0, $type = '')
    {

        $info = Sales::with('customer_info')->find($id);

        $products = salesproduct::where('saleid', '=', $id)->with('product_info')->get();

        $com = companysettings::find($info->Company_id);

        // $data = compact('info', 'com', 'products');

        $document = Document::first();
        $print = ($type == 'pdf') ? false : true;
        $data = compact('info', 'products', 'com', 'document', 'print');

        if ($type == 'pdf') {
            $pdf = PDF::loadView('export-sale', $data);
            // download PDF file with download method
            return $pdf->stream('invoice.pdf');
        } else {
            return view('export-sale')->with($data);
        }

    }
    public function destroy($id)
    { 
        try {
            $sales = Sales::find($id);

            $bank_id = $sales->acc_info->id;

            $bank_amount = $sales->acc_info->amount;

            $sale_amount = $sales->paid_amount;

            $final_amount = $bank_amount - $sale_amount;

            $bank = Account::find($bank_id);

            $bank->amount = $final_amount;

            $bank->save();

            $saleproducts = salesproduct::where('saleid','=',$id)->get();

            foreach($saleproducts as $sale){
                $product = products::where('product_id', '=', $sale->product_id)->first();
                $saleOldQuantity = salesproduct::where('saleid', '=', $id)->where('product_id', '=', $sale->product_id)->first();
                $product_qty = (int)$product->product_qty;
                // $current_qty = (int) $request->quantity[$key];
                $newqty = $product_qty + $saleOldQuantity->quantity;
                DB::table('products')->where('product_id', '=', $sale->product_id)->update([
                    'product_qty' => $newqty,
                ]);
            }

            $sales = Sales::find($id)->delete();
            $pro = salesproduct::where('saleid', '=', $id)->delete();

            return response()->json([
                'success' => 'Sale Has Been Deleted !',
            ]);
        } catch (\Illuminate\Database\QueryException$ex) {

            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);
        }

    }

}
