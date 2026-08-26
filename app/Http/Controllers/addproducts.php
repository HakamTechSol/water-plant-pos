<?php

namespace App\Http\Controllers;

use App\Exports\productExport;
use App\Models\products;
use Barryvdh\DomPDF\PDF;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;

class addproducts extends Controller
{
    public function index()
    {
        $categorys = DB::table('categories')->get();
        $sizes = DB::table('sizes')->get();
        $brands = DB::table('brands')->get();
        return view('addproduct', ['category' => $categorys, 'sizes' => $sizes, 'brands' => $brands]);
    }
    public function store(Request $request)
    {
        $request->validate([
            'product_name' => 'required',
            'category_name' => 'required',
            'size_name' => 'required',
            'brand' => 'required',
            'unit' => 'required',
            'SKU' => 'required',
            //   'minqty' => 'required',
            'quantity' => 'required',

            'price' => 'required',
            //   'pro_image' => 'required',
        ]);

        // return session('user_id');

        $product = new products();
        if ($request->hasFile('pro_image')) {
            $name = $request->file('pro_image')->getClientOriginalName();
            $size = $request->file('pro_image')->getSize();
            $path = $request->file('pro_image')->move(public_path('storage/product_img'), $name);
        } else {
            $name = "noimage.png";
        }
        $product->product_name = $request->input('product_name');
        $product->cate_id = $request->input('category_name');
        $product->size_id = $request->input('size_name');
        //$product->size_id = $request->input('size_name');
        $product->brand_id = $request->input('brand');
        $product->product_unit = $request->input('unit');
        $product->product_SKU = $request->input('SKU');
        $product->product_qty = $request->input('quantity');
        $product->product_desc = $request->input('pro_desc');
        $product->product_price = $request->input('price');
        $product->created_by = session('user_id');
        // $request->session('user_id')
        $product->product_img = $name;

        $product->save();
        return redirect()->route('productlist')->with('success', 'Product has been created successfully.');
    }
    public function show()
    {
        $products = DB::table('products')->select('products.*', 'users.name', 'categories.*', 'sizes.*', 'brands.*')
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->join('sizes', 'sizes.size_id', '=', 'products.size_id')
            ->join('brands', 'brands.brand_id', '=', 'products.brand_id')->join('users', 'users.id', '=', 'products.created_by')
            ->orderBy('product_id', 'desc')->get();
        return view('productlist', ['products' => $products]);
    }
    public function edit($id)
    {
        $categorys = DB::table('categories')->get();
        $brands = DB::table('brands')->get();
        $products = DB::table('products')->where('product_id', '=', $id)->first();
        $size = DB::table('sizes')->where('cate_id', '=', $products->cate_id)->get();
        return view('editproduct', ['product' => $products, 'categorys' => $categorys, 'brands' => $brands, 'size' => $size]);
    }
    public function edit_2($id)
    {

        $products = DB::table('products')->where('product_id', '=', $id)->first();
        $brands = DB::table('brands')->where('brand_id', '=', $products->brand_id)->first();
        $categorys = DB::table('categories')->where('id', '=', $products->cate_id)->first();
        $size = DB::table('sizes')->where('size_id', '=', $products->size_id)->first();
        return view('product-details', ['product' => $products, 'categorys' => $categorys, 'brands' => $brands, 'size' => $size]);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'product_name' => 'required',
            'category_name' => 'required',
            'size_name' => 'required',
            'brand' => 'required',
            'unit' => 'required',
            'SKU' => 'required',
            'quantity' => 'required',

            'price' => 'required',

        ]);
        if (!$request->hasFile('pro_image')) {
            DB::table('products')->where('product_id', $id)->update([
                'product_name' => $request->input('product_name'),
                'product_desc' => $request->input('pro_desc'), 'cate_id' => $request->input('category_name'),
                'size_id' => $request->input('size_name'), 'brand_id' => $request->input('brand'),
                'product_unit' => $request->input('unit'), 'product_SKU' => $request->input('SKU'),
                'product_qty' => $request->input('quantity'), 'product_price' => $request->input('price'),

            ]);
        } else {
            $name = $request->file('pro_image')->getClientOriginalName();
            $size = $request->file('pro_image')->getSize();
            $path = $request->file('pro_image')->move(public_path('storage/product_img'), $name);
            DB::table('products')->where('product_id', $id)->update([
                'product_name' => $request->input('product_name'),
                'product_desc' => $request->input('pro_desc'), 'cate_id' => $request->input('category_name'),
                'size_id' => $request->input('size_name'), 'brand_id' => $request->input('brand'),
                'product_unit' => $request->input('unit'), 'product_SKU' => $request->input('SKU'),
                'product_qty' => $request->input('quantity'), 'product_price' => $request->input('price'),
                'product_img' => $name,
            ]);
        }
        return redirect()->back()->with('success', 'Product has been updated');
    }
    public function export()
    {

        return Excel::download(new productExport, 'product.xlsx');
    }
    public function create_pdf()
    {
        $products = DB::table('products')->select(
            'product_id',
            'product_name',
            'category_name',
            'size_name' /*,'brand_name'*/,
            'product_unit',
            'product_SKU',
            // 'product_min_qty',
            'product_qty',
            'product_desc',
            'product_price',
            'product_img'
        )
            ->join('categories', 'categories.id', '=', 'products.cate_id')
            ->join('sizes', 'sizes.size_id', '=', 'products.size_id')
            ->join('brands', 'brands.brand_id', '=', 'products.brand_id')
            ->get();

        $pdf = PDF::loadView('productlist', compact('products'));
        // download PDF file with download method
        return $pdf->download('products.pdf');
    }
    public function destroy($id)
    {

        $product_delete = DB::delete('delete from products where product_id = ?', [$id]);
        if ($product_delete) {
            return response()->json([
                'success' => 'Record  deleted successfully!',
            ]);
        } else {
            return response()->json([
                'unsuccess' => 'Record not deleted successfully!',
            ]);
        }
    }
    public function fetch_product($id)
    {
        try {
            $products = DB::table('products')->where('product_id', $id)->get();

            return response()->json(['product' => $products]);
        } catch (Exception $ex) {

            return response()->json(['query error' => $ex]);
        }
    }
    public function fetch_product2($id)
    {
        try {
            $products = DB::table('products')->where('product_id', $id)->get();

            return response()->json(['product' => $products]);
        } catch (Exception $ex) {

            return response()->json(['query error' => $ex]);
        }
    }
}
