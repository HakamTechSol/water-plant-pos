<?php

namespace App\Http\Controllers;

use App\Exports\sizesExport;
use App\Models\size;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class SizeController extends Controller
{
    public function index()
    {
        $category = DB::table('categories')->get();

        return view('sizeadd', ['category' => $category]);
    }
    public function fetch_size($id)
    {

        $brands = DB::table('sizes')->where('cate_id', $id)->get();
        return response()->json(['brands' => $brands]);
    }
    public function show()
    {
        $size = DB::table('sizes')->select('sizes.*', 'users.name', 'categories.*')
            ->join('categories', 'categories.id', '=', 'sizes.cate_id')->join('users', 'sizes.created_by', '=', 'users.id')
            ->orderBy('size_id', 'desc')->get();
        return view('sizelist', ['size' => $size]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'size_name' => 'required',
            'size_category_code' => 'required',
           
        ]);
        // 'size_name', 'size_cate_code', 'size_desc','cate_id'
        $size = new size();
        $size->cate_id = $request->input('category_name');
        $size->size_name = $request->input('size_name');
        $size->size_cate_code = $request->input('size_category_code');
        $size->size_desc = $request->input('size_desc');
        $size->created_by =   session('user_id');
        $size->save();
        return redirect()->back()->with('success', 'Size has been Added Successfully.');
    }
    public function edit($size_id)
    {
        $size1 = DB::table('sizes')->where('size_id', $size_id)->first();
        $category = DB::table('categories')->get();
        return view('editsize', ['size' => $size1, 'category' => $category]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'size_name' => 'required',
            'size_cate_code' => 'required',
           
        ]);

        DB::table('sizes')->where('size_id', $id)->update(['cate_id' => $request->input('category_name'),
            'size_name' => $request->input('size_name'), 'size_cate_code' => $request->input('size_cate_code'), 'size_desc' => $request->input('size_desc')]);
        return redirect()->back()->with('success', 'Size has been updated');
    }
    public function destroy($id)
    {
        try {
            DB::delete('delete from  sizes where size_id  = ?', [$id]);
            return response()->json([
                'success' => 'Record  deleted successfully!',
            ]);
        } catch (Exception $e) {
            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);
        }
    }
    public function export()
    {
        return Excel::download(new sizesExport, 'size.xlsx');
    }
}
