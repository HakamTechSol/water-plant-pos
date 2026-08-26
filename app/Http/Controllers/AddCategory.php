<?php

namespace App\Http\Controllers;

use App\Exports\categorysExport;
use App\Models\category;
use Exception;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class AddCategory extends Controller
{
    public function index()
    {
        $category = category::select('categories.*', 'users.name')->join('users', 'users.id', '=', 'categories.created_by')->orderBy('id', 'desc')->get();
        return view('categorylist', ['category' => $category]);
    }
    public function create()
    {
        return view('addcategory');
    }
    public function store(Request $request)
    {
        $request->validate([
            'category_name' => 'required',
            'category_code' => 'required',
           
           // 'category_image' => 'required',
        ]);
      //  $name = $request->file('category_image')->getClientOriginalName();
        //$size = $request->file('category_image')->getSize();

       // $path = $request->file('category_image')->storeAs('category_img/', $name, 'public');
       try{
         $category = new category();
     //   $category->image = $name;
        $category->category_name = $request->input('category_name');
        $category->category_code = $request->input('category_code');
        $category->category_desc = $request->input('category_desc');
        $category->created_by =  session('user_id');
        $category->save();
        return redirect()->back()->with('success', 'Category has been Added');
    }
        catch(Exception $e){
            return redirect()->back()->with('error', $e);

        }

    }
    public function show(category $category)
    {
        return view('show', compact('category'));
    }
    public function edit($id)
    {
        $category1 = category::find($id);
        return view('editcategory', ['category' => $category1]);
    }
    public function update(Request $request, $id)
    {
        $request->validate([
            'category_name' => 'required',
            'category_code' => 'required',
           
        ]);
        $category2 = category::find($id);

        
        
            $category2->category_name = $request->input('category_name');
            $category2->category_code = $request->input('category_code');
            $category2->category_desc = $request->input('category_desc');
        
        $category2->update();

        return redirect()->back()->with('success', 'Category has been updated');
    }
    public function destroy($id)
    {
        //    $id= $request->id;
        try {
            $category_del = DB::delete('delete from categories where id = ?', [$id]);
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
        return Excel::download(new categorysExport, 'category.xlsx');
    }
}
