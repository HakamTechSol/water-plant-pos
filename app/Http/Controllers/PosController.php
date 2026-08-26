<?php

namespace App\Http\Controllers;

use App\Models\Account;
use App\Models\Attendance;
use App\Models\companysettings;
use App\Models\customer;
use App\Models\Document;
use App\Models\employee;
use App\Models\Expenses;
use App\Models\Invoices;
use App\Models\InvoiceSales;
use App\Models\PlantProducts;
use App\Models\Plants;
use App\Models\products;
use App\Models\Purchase;
use App\Models\Purchasedproducts;
use App\Models\QuoteProducts;
use App\Models\Quotes;
use App\Models\sale;
use App\Models\Sales;
use App\Models\salesproduct;
use App\Models\specification;
use App\Models\supplier;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
// use DB;
use PDF;
use PhpOffice\PhpSpreadsheet\Calculation\DateTimeExcel\Month;
// use Illuminate\Http\Request;

use Symfony\Component\HttpFoundation\Request;

class PosController extends Controller
{

    // Sing In Page
    public function login_page()
    {
        if (session('user_id')) {
            return redirect()->route('index')->with('error', 'You are already signed In!');
        } else {
            return view('signin');
        }

    }

    // Add Account Page Preview
    public function add_account()
    {

        return view('createaccount');

    }

    // Storing Of Bank Account
    public function store_account(Request $request)
    {

        $request->validate([

            'bank_name' => 'required',
            'account_title' => 'required',
            'amount' => 'required',
            'account_number' => 'required',

        ]);

        // dd($request->all());

        $acc = new Account;

        $acc->admin_id = session('user_id');
        $acc->bank_name = $request['bank_name'];
        $acc->account_number = $request['account_number'];
        $acc->amount = $request['amount'];
        $acc->account_title = $request['account_title'];

        $acc->save();

        return redirect()->route('account.list')->with('success', 'Account Has Been Added Successfully !');

    }

    // List Of Accounts
    public function list_accounts()
    {

        $lists = Account::with('user_info')->orderBy('id', 'desc')->get();

        // Checking Working For ORM Foreing Keys.
        // return $list;

        $data = compact('lists');

        return view('accountlist')->with($data);

    }

    public function delete_account($id)
    {

        // Login For If Any Expense Is working with the account, then show error.
        $check = Expenses::where('account_id', '=', $id)->first();
        // $check2 = Purchase::where('')->first();

        if ($check) {

            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);

            // return redirect()->route('account.list')->with('error', 'This account has been used for some expenses !');

        } else {

            $list = Account::find($id)->delete();

            return response()->json([
                'success' => 'Record  deleted successfully!',
            ]);

        }

    }

    public function edit_account($id)
    {

        $acc = Account::find($id);

        $data = compact('acc');

        return view('editaccount')->with($data);

    }

    public function update_account($id, Request $request)
    {

        $request->validate([
            'bank_name' => 'required',
            'account_title' => 'required',
            'amount' => 'required',
            'account_number' => 'required',
        ]);

        $acc = Account::find($id);

        $acc->bank_name = $request['bank_name'];
        $acc->account_title = $request['account_title'];
        $acc->account_number = $request['account_number'];
        $acc->amount = $request['amount'];

        $acc->save();

        return redirect()->route('account.list')->with('success', 'Account Has Been Updated Successfully !');

    }

    public function add_expense()
    {

        $accounts = Account::all();

        $emps = employee::all();

        $data = compact('accounts', 'emps');

        return view('createexpense')->with($data);

    }

    public function store_expense(Request $request)
    {

        $request->validate([

            'expense_account' => 'required',
            'expense_date' => 'required',
            'expense_amount' => 'required',
            'expense_subject' => 'required',
            'emp_id' => 'required',

        ]);

        $check = Account::find($request['expense_account']);

        // return $remain;

        if ($check->amount >= $request['expense_amount']) {

            // Saving amount in current account after arithmatic operations.
            $remain = $check->amount - $request['expense_amount'];

            $check->account_number;
            $check->account_title;
            $check->bank_name;
            $check->admin_id = session('user_id');
            $check->amount = $remain;

            // return $check->amount;

            $check->save();

            // Saving expense in expenses talbe.
            $exp = new Expenses;

            $exp->user_id = session('user_id');
            $exp->account_id = $request['expense_account'];
            $exp->emp_id = $request['emp_id'];
            $exp->expense_date = $request['expense_date'];
            $exp->expense_amount = $request['expense_amount'];
            $exp->expense_subject = $request['expense_subject'];
            $exp->expense_description = $request['expense_description'];

            $exp->save();

            return redirect()->route('list.expense')->with('success', 'Expense Has Been Added Successfully !');

        } else {

            return redirect()->route('create.expense')->with('error', 'Amount in account is not sufficient !');
        }

    }

    public function expense_list()
    {

        $exp = Expenses::orderBy('id', 'desc')->with('emp_info')->get();
        $employees= employee::select('id','Emp_FName','Emp_LName')->get();
        $total_expenses= Expenses::sum('expense_amount');

        $data = compact('exp','employees', 'total_expenses');

        return view('expenselist')->with($data);

    }


public function filter_expenses(Request $request)
    {
        
      $validatedData = $request->validate([
         'start'             => 'required',
         'end'                 => 'required',
         'type'                => 'required|in:Expense_Type,Employee_Type',
         'Filter_type'          => 'required',

     ]);
        
        $start_date = $validatedData['start'];
        $end_date=  $validatedData['end'];
        $type = $validatedData['type'];
        $filtertype= $validatedData['Filter_type'];
        if( $type=="Expense_Type"){
              $exp = Expenses::where([
    ['expense_date','>=',$start_date],
    ['expense_date','<=', $end_date],
    ['expense_subject','=',$filtertype]
])->orderBy('id', 'desc')->with('emp_info')->get();

 $total_expenses= Expenses::where([
    ['expense_date','>=',$start_date],
    ['expense_date','<=', $end_date],
    ['expense_subject','=', $filtertype]
])->sum('expense_amount');
            
        }
         if( $type=="Employee_Type"){
              $exp = Expenses::where([
    ['expense_date','>=',$start_date],
    ['expense_date','<=', $end_date],
    ['emp_id','=', $filtertype]
])->orderBy('id', 'desc')->with('emp_info')->get();

            $total_expenses= Expenses::where([
    ['expense_date','>=',$start_date],
    ['expense_date','<=', $end_date],
    ['emp_id', $filtertype]])->sum('expense_amount');
        }
        
        
        $employees= employee::select('id','Emp_FName','Emp_LName')->get();
       // $total_expenses= Expenses::sum('expense_amount');

        $data = compact('exp','employees', 'total_expenses');

        return view('expenselist')->with($data);

    }
    
    public function edit_expense($id)
    {

        $accounts = Account::all();

        $emps = employee::all();

        $exp = Expenses::find($id);

        $data = compact('exp', 'accounts', 'emps');

        return view('edit-expense')->with($data);

    }

    public function update_expense($id, Request $request)
    {

        $request->validate([

            'expense_account' => 'required',
            'expense_date' => 'required',
            'expense_amount' => 'required',
            'expense_subject' => 'required',

        ]);

        $new_account = $request['expense_account'];
        $oldAcc = $request['old_account'];
        $old_expense = $request['old_amount'];
        $new_expense = $request['expense_amount'];

        $account = Account::find($oldAcc);
        $amount = $account->amount;
        $account->amount = $amount + $old_expense;
        $account->save();

        $CheckAcc = Account::find($new_account);
        $check = $CheckAcc->amount;

        if ($check >= $new_expense) {

            $newAccount = Account::find($new_account);
            $newAmount = $newAccount->amount;
            $newAccount->amount = $newAmount - $new_expense;
            $newAccount->save();

            $exp = Expenses::find($id);
            $exp->account_id = $new_account;
            $exp->user_id = session('user_id');
            $exp->emp_id = $request['emp_id'];
            $exp->expense_date = $request['expense_date'];
            $exp->expense_amount = $new_expense;
            $exp->expense_subject = $request['expense_subject'];
            $exp->expense_description = $request['expense_description'];
            $exp->save();

            return redirect()->route('list.expense')->with('success', 'Expense Has Been Update Successfully !');

        } else {

            $account = Account::find($oldAcc);
            $amount = $account->amount;
            $account->amount = $amount - $old_expense;
            $account->save();

            return redirect()->route('list.expense')->with('error', 'Amount Is Not Sufficient !');

        }

    }

    public function delete_expense($id)
    {

        $exp = Expenses::with('acc_info')->find($id);

        $account = Account::find($exp->account_id);

        $account->amount = $account->amount + $exp->expense_amount;

        $account->save();

        $del = Expenses::find($id)->delete();

        if ($del) {
            return response()->json([
                'success' => 'Record  deleted successfully!',
            ]);
        }

        // return redirect()->route('list.expense')->with('success', 'Expense Has Been Deleted !');

    }

    public function add_purchase()
    {

        $suppliers = supplier::all();

        $accounts = Account::all();

        $products = products::all();

        $data = compact('suppliers', 'accounts', 'products');

        return view('add-purchase')->with($data);

    }

    public function store_purchase(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'supplier_account' => 'required',
            'delivery_date' => 'required',
            'purchase_status' => 'required',
            'sale_account' => 'required',
            'total_amount' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'total_amount' => 'required',
            'GrandTotal' => 'required',
            'paidamount' => 'required',
        ]);

        $acc = Account::find($request['sale_account']);
        $paidamt = $request['total_amount'] + ($request['tax'] / 100 * $request['total_amount']) + $request['shipping_charges'] - ($request['discount'] / 100 * $request['total_amount']);

        if ($acc->amount >= $request['paidamount']) {
        // if ($acc->amount >= $paidamt) {

            $pur = new Purchase;

            $pur->user_id = session('user_id');
            $pur->account_id = $request['sale_account'];
            $pur->delivery_date = $request['delivery_date'];
            $pur->paid_amount = $request['paidamount'];
            // $pur->paid_amount = $paidamt;
            $pur->supplier_id = $request['supplier_account'];
            $pur->total_amount = $request['total_amount'];
            $pur->status = $request['purchase_status'];
            $pur->purchase_desc = $request['purchase_desc'];
            $pur->entry_date = date('Y-m-d');
            $pur->shipping_charges = $request['shipping_charges'];
            $pur->tax = $request['tax'];
            $pur->discount = $request['discount'];
            $pur->GrandTotal = $request['GrandTotal'];

            $pur->save();

            $purchase_id = $pur->id;

            foreach ($request->product_id as $key => $product_id) {

                $pro = new Purchasedproducts;

                $pro->product_id = $product_id;
                $pro->purchase_id = $purchase_id;
                $pro->price = $request->Amount[$key];
                $pro->quantity = $request->quantity[$key];

                $pro->save();

                $product = DB::table('products')->where('product_id', '=', $product_id)->first();

                $dsave = DB::table('products')->where('product_id', $product_id)->update(['product_qty' => $product->product_qty + $request->quantity[$key]]);

            }

            // Working For Account Balancing

            if ($request['purchase_status'] != "Return") {

                $current = $acc->amount;
                // $new = $paidamt;
                $new = $request['paidamount'];

                $balance = $current - $new;

                $acc->bank_name;
                $acc->account_number;
                $acc->account_title;
                $acc->admin_id;
                $acc->amount = $balance;

                $acc->save();

            }
            // else {

            //     $current = $acc->amount;
            //     $new = $request['total_amount'];

            //     $balance = $current + $new;

            //     $acc->bank_name;
            //     $acc->account_number;
            //     $acc->account_title;
            //     $acc->admin_id;
            //     $acc->amount = $balance;

            //     $acc->save();
            // }

            return redirect()->route('purchase.list')->with('success', 'Purchase Has Been Added !');

        } else {

            return redirect()->back()->with('error', 'Amount is not sufficient to process this purchase !');

        }

    }

    public function list_purchases()
    {

        $purs = Purchase::with('user_info', 'supp_info', 'acc_info')->orderby('id', 'desc')->get();

        // return $purs;

        $data = compact('purs');

        return view('purchaselist')->with($data);

    }

    public function edit_purchase($id)
    {

        $products = products::all();

        $accounts = Account::all();

        $suppliers = supplier::all();

        $pur = Purchase::with('acc_info', 'supp_info')->find($id);

        $pro = Purchasedproducts::where('purchase_id', '=', $id)->with('product_info')->get();

        $data = compact('pur', 'products', 'pro', 'accounts', 'suppliers');

        return view('edit-purchase')->with($data);

    }

    public function update_purchase(Request $request, $id)
    {
        $request->validate([
            'supplier_account' => 'required',
            'purchase_status' => 'required',
            'delivery_date' => 'required',
            'sale_account' => 'required',
            'total_amount' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'GrandTotal' => 'required',
            'product_id' => 'required',
            'paid_amount' => 'required',
        ]);

        try{

            if (count($request->product_id) == 1) {
                foreach ($request->product_id as $key => $product_id) {
                    if (isset($request->is_deleted[$key]) && $request->is_deleted[$key] == 1) {
                        return redirect()->back()->with('error', 'Please Select Products.');
                    }
                }
            }
            $acc = Account::find($request['sale_account']);

            if ($acc->amount >= $request['paid_amount']) {
                foreach ($request->product_id as $key => $product_id) {
                    $product = products::where('product_id', '=', $product_id)->firstOrFail();
                    $purchaseOldQuantity = Purchasedproducts::where('purchase_id', '=', $id)->where('product_id', '=', $product_id)->first();
                    if ($purchaseOldQuantity !== null) {
                        $sale_qty = (int) $purchaseOldQuantity->quantity;
                        $product_qty = (int) $product->product_qty;
                        $current_qty = (int) $request->quantity[$key];
                    } else {
                        $sale_qty = 0;
                    }

                    if ($sale_qty > 0) {
                        if ($sale_qty >= $current_qty) {
                            $newqty = $sale_qty - $current_qty;
                            $newqty = $product_qty - (int) $newqty;
                        } else {
                            $newqty = $current_qty - $sale_qty;
                            $newqty = $product_qty + (int) $newqty;
                        }
                    } else {
                        $product_qty = (int) $product->product_qty;
                        $current_qty = (int) $request->quantity[$key];
                        $newqty = $product_qty + $current_qty;
                    }

                    DB::table('products')->where('product_id', '=', $product_id)->update([
                        'product_qty' => $newqty,
                    ]);
                }

                $purs = Purchase::find($id);

                $pursoldstatus = $purs->status;
                $pursoldaccount = $purs->account_id;
                $pursoldamount = $purs->paid_amount; 

                $purs->account_id = $request['sale_account'];
                $purs->delivery_date = $request['delivery_date'];
                // $purs->paid_amount =  $new;
                $purs->paid_amount = $request['paid_amount'];
                $purs->supplier_id = $request['supplier_account'];
                $purs->total_amount = $request['total_amount'];
                $purs->status = $request['purchase_status'];
                $purs->purchase_desc = $request['purchase_desc'];
                $purs->entry_date = date('Y-m-d');
                $purs->shipping_charges = $request['shipping_charges'];
                $purs->tax = $request['tax'];
                $purs->discount = $request['discount'];
                $purs->GrandTotal = $request['GrandTotal'];
                $purs->save();
               

                // Working for Balancing account amount.
                $previousacc = Account::find($pursoldaccount);

                // $prevbal = 0;
                // $current = 0;

                if ($pursoldstatus != 'Return') {
                    $prevbal = $previousacc->amount + $pursoldamount;
                    $previousacc->amount = $prevbal;
                    $previousacc->bank_name;
                    $previousacc->account_number;
                    $previousacc->account_title;
                    $previousacc->admin_id;
                    $previousacc->save();
                }

                $acc = Account::find($request['sale_account']);

                if ($request['purchase_status'] != 'Return') {
                    $current = $acc->amount - $request['paid_amount'];
                    $acc->bank_name;
                    $acc->account_number;
                    $acc->account_title;
                    $acc->admin_id;
                    $acc->amount = $current;

                    $acc->save();
                }

                if($pursoldstatus != 'Return'){
                    // update quantity in product before delete
                    if($request['purchase_status'] == 'Return'){
                        foreach ($request->product_id as $key => $product_id) {
                            $product = products::where('product_id', '=', $product_id)->firstOrFail();
                            $purchaseOldQuantity = Purchasedproducts::where('purchase_id', '=', $id)->where('product_id', '=', $product_id)->first();
                            $product_qty = (int) $product->product_qty;
                            $current_qty = (int) $request->quantity[$key];
                            $newqty = $product_qty - $current_qty;
                            DB::table('products')->where('product_id', '=', $product_id)->update([
                                'product_qty' => $newqty,
                            ]);
                        }
                    }
                    else{
                        foreach ($request->product_id as $key => $product_id) {
                            $product = products::where('product_id', '=', $product_id)->firstOrFail();
                            $purchaseOldQuantity = Purchasedproducts::where('purchase_id', '=', $id)->where('product_id', '=', $product_id)->first();
                            if ($purchaseOldQuantity !== null) {
                                $sale_qty = (int) $purchaseOldQuantity->quantity;
                                $product_qty = (int) $product->product_qty;
                                $current_qty = (int) $request->quantity[$key];
                            } else {
                                $sale_qty = 0;
                            }

                            if ($sale_qty > 0) {
                                if ($sale_qty >= $current_qty) {
                                    $newqty = $sale_qty - $current_qty;
                                    $newqty = $product_qty - (int) $newqty;
                                } else {
                                    $newqty = $current_qty - $sale_qty;
                                    $newqty = $product_qty + (int) $newqty;
                                }
                            } else {
                                $product_qty = (int) $product->product_qty;
                                $current_qty = (int) $request->quantity[$key];
                                $newqty = $product_qty + $current_qty;
                            }

                            DB::table('products')->where('product_id', '=', $product_id)->update([
                                'product_qty' => $newqty,
                            ]);
                        }
                    }
                }
                else{
                    if ($request['purchase_status'] != 'Return') {
                        // update quantity in product before delete
                        foreach ($request->product_id as $key => $product_id) {
                            $product = products::where('product_id', '=', $product_id)->firstOrFail();
                            $purchaseOldQuantity = Purchasedproducts::where('purchase_id', '=', $id)->where('product_id', '=', $product_id)->first();
                            $product_qty = (int) $product->product_qty;
                            $current_qty = (int) $request->quantity[$key];
                            $newqty = $product_qty + $current_qty;
                            DB::table('products')->where('product_id', '=', $product_id)->update([
                                'product_qty' => $newqty,
                            ]);
                        }
                    }
                }

                $del = Purchasedproducts::where('purchase_id', '=', $id)->delete();
                $purchaseid = $id;

                foreach ($request->product_id as $key => $product_id) {
                    if (isset($request->is_deleted[$key]) && $request->is_deleted[$key] == 0) {
                        $purchaseproduct = new Purchasedproducts();
                        $purchaseproduct->product_id = $product_id;
                        $purchaseproduct->purchase_id = $purchaseid;
                        $purchaseproduct->price = $request->Amount[$key];
                        $purchaseproduct->quantity = $request->quantity[$key];
                        $purchaseproduct->save();
                    } else {
                        $curbal = $acc->amount - $request->Amount[$key] * $request->quantity[$key];
                        $acc->amount = $curbal;
                        $acc->bank_name;
                        $acc->account_number;
                        $acc->account_title;
                        $acc->admin_id;
                        $acc->save();
                    }
                }

                return redirect()->back()->with('success', 'Purchase has been updated !');

            } else {

                $prevacc = Account::find($request['prev_sale_account']);
                if ($request['prev_purchase_status'] != 'Return') {
                    $prevbal = $prevacc->amount - $request['prev_paid_amount'];
                    $prevacc->amount = $prevbal;
                    $prevacc->bank_name;
                    $prevacc->account_number;
                    $prevacc->account_title;
                    $prevacc->admin_id;
                    $prevacc->save();
                }

                return redirect()->back()->with('error', 'Amount is not sufficient to process this purchase !');

            }
        }
        catch(Exception $e){
            return redirect()->back()->with('error', $e);
            
        }

    }

    public function delete_purchase($id)
    {


        $purchase = Purchase::with('acc_info')->find($id);

        // return $purchase;

        $bank_amount = $purchase->acc_info->amount;

        $bank_id = $purchase->acc_info->id;

        // return $bank_amount;

        $purchase_amount = $purchase->paid_amount;
        $final_amount = $bank_amount + $purchase_amount;
        $account = Account::find($bank_id);
        $account->amount = $final_amount;
        $account->save();

        $purproduct = Purchasedproducts::where('purchase_id','=',$id)->get();

        foreach($purproduct as $pur){
            $product = products::where('product_id', '=', $pur->product_id)->first();
            $oldQuantity = Purchasedproducts::where('purchase_id', '=', $id)->where('product_id', '=', $pur->product_id)->first();
            $product_qty = (int)$product->product_qty;
            // $current_qty = (int) $request->quantity[$key];
            $newqty = $product_qty - $oldQuantity->quantity;
            DB::table('products')->where('product_id', '=', $pur->product_id)->update([
                'product_qty' => $newqty,
            ]);
        }

        $pro = Purchasedproducts::where('purchase_id', '=', $id)->delete();
        $delpur = Purchase::find($id)->delete();

        if ($delpur) {
            return response()->json([
                'success' => 'Record deleted successfully!',
            ]);
        }

    }

    public function add_plant()
    {

        $products = products::all();
        $specification = specification::all();

        $data = compact('products', 'specification');

        return view('add-plant')->with($data);

    }

    public function list_plant()
    {

        $plants = Plants::with('user_info')->with('Specification')->get();

        $data = compact('plants');

        return view('plantlist')->with($data);

    }

    public function store_plant(Request $request)
    {

        $request->validate([
            'plant_name' => 'required',
            'date' => 'required',
            'product_id' => 'required',
            'total_amount' => 'required',
            'quantity' => 'required',
            'Amount' => 'required',
            'specification' => 'required',
        ]);

        $plant = new Plants;

        $plant->plant_name = $request['plant_name'];
        $plant->date = $request['date'];
        $plant->user_id = session('user_id');
        $plant->total_amount = $request['total_amount'];
        $plant->specifiction_id = $request['specification'];

        $plant->save();

        $plant_id = $plant->id;

        foreach ($request->product_id as $key => $product_id) {

            $pro = new PlantProducts;
            $pro->plant_id = $plant_id;
            $pro->product_id = $product_id;
            $pro->amount = $request->Amount[$key];
            $pro->quantity = $request->quantity[$key];

            $pro->save();

        }

        return redirect()->route('plant.list')->with('success', 'Plant Has Been Added');

    }

    public function edit_plant($id)
    {

        $plant = Plants::find($id);

        $plant_products = PlantProducts::where('plant_id', '=', $id)->with('product_info')->get();
        // return $plant_products;

        $products = products::all();

        $data = compact('plant', 'products', 'plant_products');

        return view('edit-plant')->with($data);

    }

    public function update_plant(Request $request, $id)
    {
        $request->validate([
            'plant_name' => 'required',
            'date' => 'required',
            'product_id' => 'required',
            'total_amount' => 'required',
            'quantity' => 'required',
            'Amount' => 'required',
        ]);

        $plant = Plants::find($id);

        $plant->plant_name = $request['plant_name'];
        $plant->date = $request['date'];
        $plant->user_id = session('user_id');
        $plant->total_amount = $request['total_amount'];

        $plant->save();

        $del = PlantProducts::where('plant_id', '=', $id)->delete();

        foreach ($request->product_id as $key => $product_id) {

            $pro = new PlantProducts;
            $pro->plant_id = $id;
            $pro->product_id = $product_id;
            $pro->amount = $request->Amount[$key];
            $pro->quantity = $request->quantity[$key];

            $pro->save();
        }

        return redirect()->route('plant.list')->with('success', 'Plant Has Been Added Successfully !');
    }

    public function delete_plant($id)
    {
        try {
            $plant_products = PlantProducts::where('plant_id', '=', $id)->delete();
            $plant = Plants::find($id)->delete();

            return response()->json([
                'success' => 'Plant Has Been Deleted !',
            ]);
        } catch (\Illuminate\Database\QueryException$ex) {

            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);
        }

    }

    public function add_qoute()
    {
        $plants = Plants::with('plant_products')->get();

        $products = products::all();

        $customers = customer::all();

        // return $plants;

        $data = compact('plants', 'products', 'customers');

        return view('add-quote')->with($data);
    }

    public function store_quote(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'customer_id' => 'required',
            'quote_date' => 'required',
            'quote_validity' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'Amount' => 'required',
            'totalamount' => 'required',
        ]);

        $quote = new Quotes;

        $quote->customer_id = $request['customer_id'];
        if (isset($request['plant_id'])) {
            $quote->plant_id = $request['plant_id'];
        } else {
            $quote->plant_id = "Plant not included";
        }
        $quote->user_id = session('user_id');
        $quote->quote_date = $request['quote_date'];
        $quote->quote_validity = $request['quote_validity'];
        $quote->quote_type = $request['quote_type'];
        $quote->total_amount = $request['totalamount'];
        $quote->shipping_charges = $request['shipping_charges'];
        $quote->tax = $request['tax'];
        $quote->discount = $request['discount'];

        $quote->save();

        $id = $quote->id;

        foreach ($request['product_id'] as $key => $product_id) {

            $pro = new QuoteProducts;
            $pro->quote_id = $id;
            $pro->product_id = $product_id;
            $pro->quantity = $request->quantity[$key];
            $pro->amount = $request->Amount[$key];

            $pro->save();

        }

        return redirect()->route('quotation.list')->with('success', 'Quote Has Been Added !');

    }

    public function plant_products(Request $request)
    {

        $plant_products = PlantProducts::with('product_info')->where('plant_id', '=', $request['id'])->get();

        $i = 1;

        foreach ($plant_products as $product) { 

            echo '
                <tr>
                <td>' . $i . '</td>
                <td>
                    <h6>' . $product->product_info->product_name . '</h6>
                </td>
                <input type="hidden" name="product_id[]" value="' . $product->product_info->product_id . '"></input>
                <input type="hidden" name="is_deleted[]" value="0">
                <td><input onchange="totol_price()" onblur="" type="number" name="quantity[]" class="form-control" value = "' . $product->quantity . '"></td>
                <td>' . $product->product_info->product_unit . '</td>
                <td> <input onchange="totol_price()" type="number" class="form-control" name="Amount[]" value="' . $product->amount . '"></td>
                <td><input type="number" class="form-control" readonly id="subtotal" value="' . $product->amount * $product->quantity . '"/></td>
                <td>
                <a onclick="deleteProduct(this)"><i class="fa fa-trash" aria-hidden="true"></i></a>
                </td>
            </tr>
            ';

            $i++;
        };
    }

    public function quote_list()
    {

        $quotes = Quotes::with('user_info', 'plant_info', 'customer_info')->orderBy('id','DESC')->get();

        $accounts = Account::all();

        // return $quotes;

        $data = compact('quotes', 'accounts');

        return view('quotationlist')->with($data);

    }
    public function checkQuoteConvertToSale(Request $request, $id)
    {
        $quote_products = QuoteProducts::where('quote_id', '=', $id)->with('product_info')->get();
        $error = 0;
        $count = 0;
        $msg = "";
        foreach ($quote_products as $key => $quote_product) {
            if ($quote_product['product_info']['product_qty'] < $quote_product['quantity']) {
                $count++;
                $error = 1;
                $msg = "Product Out of Stock";
            }
        }

        return Response()->json([
            'error' => $error,
            'count' => $count,
            'msg' => $msg,
        ]);
    }

    public function QuoteConvertToSale(Request $request, $id)
    {

        $request->validate([
            'status' => 'required',
            'paidamount' => 'required',
            'sale_account' => 'required',
        ]);

        $quote = Quotes::with('customer_info')->find($id);
        $quote->is_converted_to_sale = 1;
        $quote->save();

        $company = companysettings::Where('type', '=', $quote['quote_type'])->firstOrFail();

        $sale = new Sales;
        $sale->customer_id = $quote['customer_info']['id'];
        $sale->status = $request['status'];
        $sale->account_id = $request['sale_account'];
        $sale->paid_amount = $request['paidamount'];
        $sale->total_amount = $quote['total_amount'];
        $sale->sales_date = $quote['quote_date'];
        $sale->user_id = session('user_id');
        $sale->Sale_type = $quote['quote_type'];
        $sale->Company_id = $company->id;
        $sale->shipping_charges = $quote['shipping_charges'];
        $sale->tax = $quote['tax'];
        $sale->discount = $quote['discount'];
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

        $quote_products = QuoteProducts::where('quote_id', '=', $id)->get();

        foreach ($quote_products as $key => $quote_product) {
            $product = products::where('product_id', '=', $quote_product->product_id)->firstOrFail();
            $product_qty = (int) $product->product_qty;
            $current_qty = (int) $quote_product->quantity;
            $newqty = $product_qty - $current_qty;
            DB::table('products')->where('product_id', '=', $quote_product->product_id)->update([
                'product_qty' => $newqty,
            ]);
            $salesproduct = new salesproduct();
            $salesproduct->product_id = $quote_product->product_id;
            $salesproduct->saleid = $salesid;
            $salesproduct->price = $quote_product->amount;
            $salesproduct->quantity = $quote_product->quantity;
            $salesproduct->save();
        }

        return redirect()->route('quotation.list')->with('success', 'Quotation Has Been Converted to Sale Successfully !');

    }

    public function quote_delete($id)
    {
        try {
            $del_prp = QuoteProducts::where('quote_id', '=', $id)->delete();
            $del = Quotes::find($id)->delete();

            return response()->json([
                'success' => 'Quotation Has Been Deleted Successfully !',
            ]);
        } catch (\Illuminate\Database\QueryException $ex) {

            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);
        }

    }

    public function edit_quote($id)
    {

        $customers = customer::all();

        $plants = Plants::all();

        $products = products::all();

        $quote = Quotes::with('plant_info', 'customer_info')->find($id);

        $quote_products = QuoteProducts::where('quote_id', '=', $id)->with('product_info')->get();

        $data = compact('quote', 'quote_products', 'customers', 'plants', 'products');

        // return $data;

        return view('edit-quote')->with($data);

    }

    public function update_quote($id, Request $request)
    {

        $request->validate([
            'customer_id' => 'required',
            'product_id' => 'required',
            'quantity' => 'required',
            'Amount' => 'required',
            'totalamount' => 'required',
            'quote_date' => 'required',
            'quote_validity' => 'required',
            'quote_type' => 'required',
        ]);

        $quote = Quotes::find($id);

        if ($request['plant_id']) {
            $quote->plant_id = $request['plant_id'];
        } 
        $quote->quote_date = $request['quote_date'];
        $quote->quote_validity = $request['quote_validity'];
        $quote->customer_id = $request['customer_id'];
        $quote->total_amount = $request['totalamount'];
        $quote->user_id = session('user_id');
        $quote->shipping_charges = $request['shipping_charges'];
        $quote->tax = $request['tax'];
        $quote->discount = $request['discount'];
        $quote->quote_type = $request['quote_type'];

        $quote->save();

        $del = QuoteProducts::where('quote_id', '=', $id)->delete();

        foreach ($request['product_id'] as $key => $product_id) {
            $pro = new QuoteProducts;
            $pro->quote_id = $id;
            $pro->product_id = $product_id;
            $pro->amount = $request->Amount[$key];
            $pro->quantity = $request->quantity[$key];

            $pro->save();
        }

        return redirect()->back()->with('success', 'Quote Has Been Updated !');

    }

    public function sales_return()
    {

        $returns = Sales::where('status', '=', 'Return')->get();

        $data = compact('returns');

        return view('salesreturnlist')->with($data);

    }

    public function purchase_return()
    {

        $returns = Purchase::with('supp_info', 'acc_info', 'user_info')->where('status', '=', "return")->get();

        // return $return;

        $data = compact('returns');

        return view('purchasereturnlist')->with($data);

    }

    public function add_invoice()
    {

        $customers = customer::all();

        $data = compact('customers');

        return view('createinvoice')->with($data);
    }

    public function get_sales_options(Request $request)
    {

        $sales = sale::where('customer_id', '=', $request['id'])->get();

        // return $sales;

        echo "<option selected disabled>Sales List</option>";
        foreach ($sales as $sale) {
            echo '<option value="' . $sale->id . '">Sale Date: ' . $sale->sales_date . ' & Total Amount: ' . $sale->total_amount . '</option>';
        }
    }

    public function sales_details(Request $request)
    {
        $saled = Sales::find($request['id'])->with('user_info')->get();

        foreach ($saled as $sale) {
            echo '<tr>
                    <td>' . $sale->user_info->name . '</td>
                    <td id="totalAmount"><input type="hidden" name="sale_amount[]" value="' . $sale->total_amount . '">' . $sale->total_amount . '</td>
                    <td><input type="hidden" name="sale_date[]" value="' . $sale->sales_date . '">' . $sale->sales_date . '</td>
                    <td>' . $sale->status . '</td>
                    <td>
                    <input type="hidden" name="sale_id[]" value="' . $sale->id . '">
                    <a class="delete-set"><i class="fa fa-trash"></i></a>
                    </td>
                </tr>';
        }
    }

    public function quote_save(Request $request)
    {

        // dd($request->all());

        $request->validate([
            'customer_id' => 'required',
            'save_as' => 'required',
            'quote_date' => 'required',
            'quote_validity' => 'required',
            'sale_id' => 'required',
            'sale_amount' => 'required',
            'sale_date' => 'required',
        ]);

        // dd($request->all());

        $invoice = new Invoices;

        $invoice->user_id = session('user_id');
        $invoice->customer_id = $request['customer_id'];
        $invoice->quote_date = $request['quote_date'];
        $invoice->quote_validity = $request['quote_validity'];
        $invoice->invoice_type = $request['save_as'];

        $invoice->save();

        $id = $invoice->id;

        foreach ($request['sale_id'] as $key => $sale_id) {

            $sale = new InvoiceSales;
            $sale->invoice_id = $id;
            $sale->sale_id = $sale_id;
            $sale->save();

        }

        return redirect()->route('invoice.list')->with('success', 'Invoice Has Been Generated Successfully !');

    }

    public function invoice_list()
    {

        $invoices = Invoices::with('user_info', 'customer_info')->get();

        // return $invoices;
        $data = compact('invoices');

        return view('invoicelist')->with($data);

    }

    public function delete_invoice($id)
    {
        $del_sales = InvoiceSales::where('invoice_id', '=', $id)->delete();
        $invoice = Invoices::find($id)->delete();

        return redirect()->route('invoice.list')->with('success', 'Invoice Has Been Deleted Successfully !');
    }

    public function edit_invoice($id)
    {

        $customers = customer::all();

        $invoice_sale = InvoiceSales::where('invoice_id', '=', $id)->with('sales_info')->get();

        $invoice = Invoices::find($id);

        $data = compact('customers', 'invoice', 'invoice_sale');

        return view('edit-invoice')->with($data);

    }

    public function update_invoice(Request $request, $id)
    {
        $request->validate([
            'customer_id' => 'required',
            'save_as' => 'required',
            'quote_date' => 'required',
            'quote_validity' => 'required',
            'sale_amount' => 'required',
            'sale_id' => 'required',
        ]);

        $inv = Invoices::find($id);

        $inv->user_id = session('user_id');
        $inv->customer_id = $request['customer_id'];
        $inv->quote_date = $request['quote_date'];
        $inv->quote_validity = $request['quote_validity'];
        $inv->invoice_type = $request['save_as'];

        $inv->save();

        $del = InvoiceSales::where('invoice_id', '=', $id)->delete();

        foreach ($request['sale_id'] as $key => $sale_id) {

            $sale = new InvoiceSales;
            $sale->invoice_id = $id;
            $sale->sale_id = $sale_id;

            $sale->save();

        }

        return redirect()->route('invoice.list')->with('success', 'Invoice Has Been Updated Successfully !');

    }

    public function showInvoice($id)
    {
        $info = Invoices::with('customer_info')->find($id);

        $invoice_sale = InvoiceSales::where('invoice_id', '=', $id)->with('sales_info')->get();

        $com = companysettings::find(1);

        $document = Document::first();

        $data = compact('info', 'invoice_sale', 'com', 'document');

        return view('show-invoice')->with($data);

    }

    public function exportInvoice($id = 0, $type = '')
    {
        $info = Invoices::with('customer_info')->find($id);

        $invoice_sale = InvoiceSales::where('invoice_id', '=', $id)->with('sales_info')->get();

        $com = companysettings::find(1);

        $document = Document::first();
        $print = ($type == 'pdf') ? false : true;
        $data = compact('info', 'invoice_sale', 'com', 'document', 'print');

        if ($type == 'pdf') {
            $pdf = PDF::loadView('export-invoice', $data)->setOptions(['defaultFont' => 'sans-serif']);
            // download PDF file with download method
            return $pdf->stream('invoice.pdf');
        } else {
            return view('export-invoice')->with($data);
        }

    }

    public function purchase_view($id)
    {

        $purchase = Purchase::with('user_info', 'acc_info', 'supp_info')->find($id);

        $products = Purchasedproducts::where('purchase_id', '=', $id)->with('product_info')->get();

        $com = companysettings::find(1);

        $data = compact('purchase', 'products', 'com');

        // return $data;

        return view('purchase-detail')->with($data);

    }

    public function plant_view($id)
    {
        $plant = Plants::with('user_info')->find($id);

        $products = PlantProducts::where('plant_id', '=', $id)->with('product_info')->get();
        $specification = specification::where('id', '=', $plant->specifiction_id)->first();

        $com = companysettings::find(1);
        $data = compact('plant', 'products', 'com', 'specification');

        // return $data;

        return view('plant-detail')->with($data);

    }

    public function quote_detail($id)
    {

        $info = Quotes::with('user_info', 'plant_info', 'customer_info')->find($id);

        // return $info;

        $products = QuoteProducts::where('quote_id', '=', $id)->with('product_info')->get();

        $document = Document::first();

        if ($info->plant_info) {

            if ($info->plant_info->specifiction_id != 0) {

                // return "Success";

                $specification = specification::find($info->plant_info->specifiction_id);

                // return $specification;

                $com = companysettings::find(1);

                $data = compact('info', 'products', 'com', 'specification','document');

            }
        } else {
            $specification = [];

            $com = companysettings::Where('type', '=', $info->quote_type)->firstOrFail();
            // $com = companysettings::find(1);

            $data = compact('info', 'products', 'com','specification','document');

        }

        // return $data;

        return view('quote-detail')->with($data);

    }

    public function add_attendance()
    {
        return view('attendence');
    }

    public function get_attendance(Request $request)
    {
        $date = $request['id'];

        $att = Attendance::where('date', '=', $date)->with('emp_info')->get();

        if (count($att) > '0') {

            foreach ($att as $info) {
                echo '
                    <tr>
                    <td>' . ucfirst($info->emp_info->Emp_FName) . ' ' . ucfirst($info->emp_info->Emp_LName) . '</td>
                    <input type="hidden" name="emp_name[]" value="' . $info->emp_name . '">

                    <td>
                        <select class="select" name="attendance[' . $info->emp_id . ']">
                            <option selected disabled ' . ($info->status == "Not Marked" ? "selected" : "") . '>Not Marked</option>
                            <option value="FullDay" ' . ($info->status == "FullDay" ? "selected" : "") . '>Full Day</option>
                            <option value="HalfDay" ' . ($info->status == "HalfDay" ? "selected" : "") . '>Half Day</option>
                            <option value="Leave" ' . ($info->status == "Leave" ? "selected" : "") . '>Leave</option>
                        </select>
                    </td>
                    <td><input type="number" name="hours_per_day[' . $info->emp_id . ']" value="' . $info->hours_per_day . '"></td>
                    <input type="hidden" name="emp_id[]" value="' . $info->emp_id . '">
                    </tr>
                ';

            }

        } else {

            $emp = employee::all();

            foreach ($emp as $info) {
                echo '
                    <tr>
                    <td>' . $info->Emp_FName . '</td>
                    <input type="hidden" name="emp_name[]" value="' . $info->Emp_FName . '">
                    <td>
                        <select class="select" name="attendance[' . $info->id . ']">
                            <option selected disabled>Not Marked</option>
                            <option value="FullDay">Full Day</option>
                            <option value="HalfDay">Half Day</option>
                            <option value="Leave">Leave</option>
                        </select>
                    </td>
                    <td><input type="number" name="hours_per_day[' . $info->id . ']"></td>
                    <input type="hidden" name="emp_id[]" value="' . $info->id . '">
                    </tr>
                ';

            }

        }

    }

    public function store_attendance(Request $request)
    {
        $request->validate([
            'emp_name' => 'required',
            'attendance' => 'required',
            'date' => 'required',
            'emp_id' => 'required',
            'hours_per_day' => 'required',
        ]);

        $date = $request['date'];

        $check = Attendance::where('date', '=', $date)->get();

        if (count($check) > '0') {

            $del = Attendance::where('date', '=', $date)->delete();

            foreach ($request['emp_id'] as $key => $emp_id) {
                $new = new Attendance();
                $new->emp_id = $emp_id;
                $new->status = isset($request->attendance[$emp_id]) ? $request->attendance[$emp_id] : 'Not Marked';
                $new->date = $date;
                $new->hours_per_day = isset($request->hours_per_day[$emp_id]) ? $request->hours_per_day[$emp_id] : null;
                $new->save();
            }

        } else {

            foreach ($request['emp_id'] as $key => $emp_id) {
                $new = new Attendance();
                $new->emp_id = $emp_id;
                $new->status = isset($request->attendance[$emp_id]) ? $request->attendance[$emp_id] : 'Not Marked';
                $new->hours_per_day = isset($request->hours_per_day[$emp_id]) ? $request->hours_per_day[$emp_id] : null;
                $new->date = $date;
                $new->save();
            }

        }

        return redirect()->back()->with('success', 'Attendance Has Been Added Successfully !');

    }

    public function index($year = '')
    {

        $supp_count = supplier::all()->count();

        $customer_count = customer::all()->count();

        $inv_count = Sales::all()->count(); //tobeupdated

        $sum_quote = Quotes::all()->sum('total_amount');

        $sum_pur = Purchase::where("status", '!=', "return")->get(); //tobeupdated

        $sum_sale = Sales::where("status", '!=', "return")->get();

        $emp_count = employee::all()->count();
        $total_purchase = Purchase::where('status', '<>', 'Return')->sum('GrandTotal');
        $total_sales = Sales::where('status', '<>', 'Return')->sum('paid_amount');

        $year = $year ? $year : date('Y');

        $totalpur = 0;
        foreach ($sum_pur as $pur) {
            $rowdiscount = ($pur->discount / 100 * $pur->total_amount);
            $rowtotal = $pur->total_amount - $rowdiscount;
            $totalpur = $totalpur + $rowtotal + ($pur->tax / 100 * $pur->total_amount) + $pur->shipping_charges;
        }
        $totalsale = 0;
        foreach ($sum_sale as $sale) {
            $rowdiscount1 = ($sale->discount / 100 * $sale->total_amount);
            $rowtotal1 = $sale->total_amount - $rowdiscount1;
            $totalsale = $totalsale + $rowtotal1 + ($sale->tax / 100 * $sale->total_amount) + $sale->shipping_charges;
        }

        $purchases = Purchase::select(
            \DB::raw('year(created_at) as year'),
            \DB::raw('month(created_at) as month'),
            \DB::raw('sum(total_amount) as total_amount'),
        )
            ->whereYear('created_at', $year)
            ->groupBy('year')
            ->groupBy('month')
            ->get();

        $purchase = [];

        for ($month = 1; $month <= 12; $month++) {
            $purchase[] = optional($purchases->first(fn($row) => $row->month == $month))->total_amount ? optional($purchases->first(fn($row) => $row->month == $month))->total_amount : 0;
        }

        $purchase = json_encode($purchase, JSON_NUMERIC_CHECK);

        $sales = Sale::select(
            \DB::raw('year(created_at) as year'),
            \DB::raw('month(created_at) as month'),
            \DB::raw('sum(total_amount) as total_amount'),
        )
            ->whereYear('created_at', $year)
            ->groupBy('year')
            ->groupBy('month')
            ->get();

        $sale = [];

        for ($month = 1; $month <= 12; $month++) {
            $sale[] = optional($sales->first(fn($row) => $row->month == $month))->total_amount ? optional($sales->first(fn($row) => $row->month == $month))->total_amount : 0;
        }

        $sale = json_encode($sale, JSON_NUMERIC_CHECK);

        // return $sum_pur;

        $product_count = products::all()->count();

        // Working For Product SKU
        // $pro = products::all()->first();

        $pro_checks = products::whereRaw('product_qty < product_SKU')->get();

        // return $pro_checks;

        // Working For Order Updates
        $uporders = Purchase::where('delivery_date', '>', Carbon::now()->format('d-m-Y'))->with('supp_info')->get();

        // return $uporders;

        $data = compact('supp_count', 'customer_count', 'inv_count', 'product_count', 'sum_quote', 'totalpur', 'totalsale', 'emp_count', 'purchase', 'sale', 'pro_checks', 'uporders', 'total_purchase', 'total_sales');

        return view('index')->with($data);

    }

    public function salary_page()
    {

        return view('salary');

    }

    public function salary_calaulate(Request $request)
    {

        $employee = employee::all();

        // $emp = employee::all()->first();

        // $salary = $emp->emp_salary;

        // $att = Attendance::whereMonth('date', '=', $request['id'])->with('emp_info')->get();

        // $att_count = Attendance::whereMonth('date', '=', $request['id'])->with('emp_info')->count();

        foreach ($employee as $emp) {

            $att = Attendance::whereMonth('date', '=', $request['id'])->with('emp_info')->get();

            $att_count = Attendance::whereMonth('date', '=', $request['id'])->with('emp_info')->count();

            $status = Attendance::whereMonth('date', '=', $request['id'])->where('emp_id', '=', $emp->id)->where('status', 'Leave')->count();

            $hrs = Attendance::whereMonth('date', '=', $request['id'])->where('emp_id', '=', $emp->id)->sum('hours_per_day');
            $per_day_salary_div = $emp->emp_salary / 30;
            $salary_div = $emp->hours_per_day ? $per_day_salary_div / $emp->hours_per_day : $per_day_salary_div / 8;
            $salary = $salary_div * $hrs;

            echo '
            <tr>
                <td>' . $emp->Emp_FName . ' ' . $emp->Emp_LName . '</td>
                <td> ' . $status . ' </td>
                <td>
                    PKR ' . $salary . '
                </td>
                <td>PKR ' . $emp->emp_salary . '</td>
            </tr>
            ';

        }

    }

    public function reporting(Request $request)
    {
        $start_date = '';
        $end_date = '';

        if (\Request::isMethod('post')) {
            if ($request->start_date && $request->end_date) {
                $start_date = $request->start_date;
                $end_date = $request->end_date;
            } else if (!$request->start_date && !$request->end_date) {
                return back()->with('error', 'Choose Start Date and End Date')->withInput($request->all());
            } else if (!$request->start_date) {
                return back()->with('error', 'Choose Start Date')->withInput($request->all());
            } else {
                return back()->with('error', 'Choose End Date')->withInput($request->all());
            }
        }

        if ($start_date && $end_date) {

            $sales = Sales::with('acc_info', 'user_info')->whereBetween('sales_date', [$start_date, $end_date])->orderBy('id', 'desc')->get();
            $purs = Purchase::with('user_info', 'supp_info', 'acc_info')->whereBetween('delivery_date', [$start_date, $end_date])->get();
            $exp = Expenses::whereBetween('expense_date', [$start_date, $end_date])->get();
            $quotes = Quotes::with('user_info', 'plant_info', 'customer_info')->whereBetween('quote_date', [$start_date, $end_date])->get();
            $total_purchase = Purchase::whereBetween('delivery_date', [$start_date, $end_date])->where('status','!=','Return')->sum('GrandTotal');
            $total_sales = Sales::whereBetween('sales_date', [$start_date, $end_date])->where('status','!=','Return')->sum('paid_amount');
            $total_expenses = Expenses::whereBetween('expense_date', [$start_date, $end_date])->sum('expense_amount');

        } else {

            $sales = Sales::with('acc_info', 'user_info')->orderBy('id', 'desc')->get();
            $purs = Purchase::with('user_info', 'supp_info', 'acc_info')->get();
            $exp = Expenses::all();
            $quotes = Quotes::with('user_info', 'plant_info', 'customer_info')->get();
            $total_purchase = Purchase::where('status','!=','Return')->sum('GrandTotal');
            $total_sales = Sales::where('status','!=','Return')->sum('paid_amount');
            $total_expenses = Expenses::sum('expense_amount');

        }

        $employee = employee::all();
        $hrs = 0;
        $per_day_salary_div = 0;
        $salary_div = 0;
        $salary = 0;
        foreach ($employee as $emp) {
            if ($start_date && $end_date) {
                $start_date_at = date('Y-m-d', strtotime($start_date));
                $end_date_at = date('Y-m-d', strtotime($end_date));
                $hrs = Attendance::whereBetween('date', [$start_date_at, $end_date_at])->where('emp_id', '=', $emp->id)->sum('hours_per_day');
            } else {
                $hrs = Attendance::where('emp_id', '=', $emp->id)->sum('hours_per_day');
            }
            $per_day_salary_div += $emp->emp_salary / 30;
            $salary_div += $emp->hours_per_day ? $per_day_salary_div / $emp->hours_per_day : $per_day_salary_div / 8;
            $salary += $salary_div * $hrs;
        }
        $total_profit = $total_sales - $total_purchase;
        $net_profit = $total_profit - ($total_expenses + $salary);

        $data = compact('sales', 'purs', 'exp', 'quotes', 'salary', 'total_sales', 'total_purchase', 'total_profit', 'total_expenses', 'net_profit');

        return view('reporting')->with($data);
    }

}
