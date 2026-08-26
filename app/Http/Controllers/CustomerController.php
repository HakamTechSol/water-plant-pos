<?php

namespace App\Http\Controllers;

use App\Models\customer;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function index()
    {
        $customer = customer::select('customers.*', 'users.name')->join('users', 'users.id', '=', 'customers.created_by')->orderBy('id', 'desc')->get();
        return view('customerlist', compact('customer'));
    }
    public function edit($id)
    {
        $customer = customer::find($id);
        return view('editcustomer', ['customer' => $customer]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',           
            'address' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'city' => 'required',
        ]);
        $customer = customer::find($id);
        $customer->Name = $request->input('name');
        $customer->Phone = $request->input('phone');
        $customer->Email = $request->input('email');
        $customer->company = $request->input('company');
        $customer->City = $request->input('city');
        $customer->Address = $request->input('address');
        $customer->Description = $request->input('description');
        $customer->update();
        return redirect()->back()->with('success', 'Customer has been updated');
    }
    public function store(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required|email',
            'company' => 'required',
            'customer_city' => 'required',
            'customer_address' => 'required',
        ]);
        // ["name","Email","Phone","company","City","Address","Description"];
        $customer = new customer();
        $customer->Name = $request->input('customer_name');
        $customer->Phone = $request->input('customer_phone');
        $customer->Email = $request->input('customer_email');
        $customer->company = $request->input('company');
        $customer->City = $request->input('customer_city');
        $customer->Address = $request->input('customer_address');
        $customer->Description = $request->input('description');
        $customer->	created_by =  session('user_id');
        $customer->save();
        return redirect()->back()->with('success', 'Customer has been Added Successfully.');
    }
    public function storeajax(Request $request)
    {
        $request->validate([
            'customer_name' => 'required',
            'customer_phone' => 'required',
            'customer_email' => 'required|email',
            // 'company' => 'required',
            'customer_city' => 'required',
            'customer_address' => 'required',
           
        ]);
        $customer = new customer();
        $customer->Name = $request->input('customer_name');
        $customer->Phone = $request->input('customer_phone');
        $customer->Email = $request->input('customer_email');
        $customer->company = $request->input('company');
        $customer->City = $request->input('customer_city');
        $customer->Address = $request->input('customer_address');
        $customer->Description = $request->input('description');
        $customer->created_by = session('user_id');
        $customer->save();
        return redirect()->back()->with('success', 'Customer has been Added Successfully.');
    }

    public function destroy($id)
    {

        try {
            DB::delete('delete from customers where id = ?', [$id]);
            return response()->json([
                'success' => 'Record  deleted successfully!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);
        }
    }
}
