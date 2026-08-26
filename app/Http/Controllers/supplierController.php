<?php

namespace App\Http\Controllers;

use App\Models\supplier;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class supplierController extends Controller
{
    public function index()
    {
        $supplier = supplier::select('suppliers.*', 'users.name')->join('users', 'users.id', '=', 'suppliers.created_by')->orderBy('suppliers.id', 'desc')->get();
        return view('supplierlist', compact('supplier'));
    }
    public function edit($id)
    {
        $supplier = supplier::find($id);
        return view('editsupplier', ['supplier' => $supplier]);
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
        $supplier = supplier::find($id);
        $supplier->Name = $request->input('name');
        $supplier->Phone = $request->input('phone');
        $supplier->Email = $request->input('email');
        $supplier->company = $request->input('company');
        $supplier->City = $request->input('city');
        $supplier->Address = $request->input('address');
        $supplier->Description = $request->input('description');
        $supplier->update();
        return redirect()->back()->with('success', 'Supplier has been updated');
    }
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'phone' => 'required',
            'email' => 'required|email',
            'company' => 'required',
            'city' => 'required',
            'address' => 'required',            
        ]);
        $supplier = new supplier();
        $supplier->Name = $request->input('name');
        $supplier->Phone = $request->input('phone');
        $supplier->Email = $request->input('email');
        $supplier->company = $request->input('company');
        $supplier->City = $request->input('city');
        $supplier->Address = $request->input('address');
        $supplier->Description = $request->input('description');
        $supplier->created_by = session('user_id');
        $supplier->save();
        return redirect()->back()->with('success', 'Supplier has been created successfully.');
    }

    public function destroy($id)
    {

        try {
            DB::delete('delete from suppliers where id = ?', [$id]);
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
