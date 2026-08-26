<?php

namespace App\Http\Controllers;

use App\Models\brands;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class addbrands extends Controller
{
    public function index()
    {
        $brands = brands::orderBy('brand_id', 'desc')->get();
        return view('brandlist', ['brands' => $brands]);
    }
    public function create()
    {
        return view('addbrand');
    }

    public  function store(Request $request)
    {
        $request->validate([
            'brand_name' => 'required',

          //  'brand_image' => 'required'
        ]);
        try{
       
        $brand = new brands();
      //  $brand->brand_image = $name;
        $brand->brand_name = $request->input('brand_name');
        $brand->brand_desc = $request->input('brand_desc');
        $brand->save();
        return redirect()->back()->with('success', 'Brand has been Added Successfully.');
    }
    catch(Exception $e){
        return redirect()->back()->with('error', $e);

    }
    }
    public function show(brands $brands)
    {
        return view('show', compact('brands'));
    }
    public function edit($id)
    {
        $brands =  DB::table('brands')->where('brand_id', $id)->first();
        return view('editbrand', ['brand' => $brands]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'brand_name' => 'required',
           
        ]);
  

            DB::table('brands')->where('brand_id', $id)->update([
                'brand_name' => $request->input('brand_name'),
                'brand_desc' => $request->input('brand_desc')
            ]);
            return redirect()->back()->with('success', 'Brand has been updated');
       
    }
    public function destroy($id)
    {
        $product_delete = DB::delete('delete from brands where brand_id = ?', [$id]);
        if ($product_delete) {
            return response()->json([
                'success' => 'Record  deleted successfully!'
            ]);
        } else {
            return response()->json([
                'unsuccess' => 'Record not deleted successfully!'
            ]);
        }
    }
}
