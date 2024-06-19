<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Models\products;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;

class ProductController extends Controller
{
    public function insert_product(Request $request)
    {
        $product = new products();
        $product->name = $request->input('name');
        $product->material = $request->input('material');
        $product->price = $request->input('price');
        $product->price_sale = $request->input('price_sale');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->image = $request->input('image');
        if ($request->has('images')) {
            $product->images = implode("~", $request->input('images'));
        }
        $product->save();
        session()->flash('success', 'Thêm sản phẩm thành công.');
        return redirect()->back();
    }
    public function list_product()
    {
        $products = products::all();

        return view('admin.product.list', compact('products'));
    }
    public function delete_product(Request $request) {
        $product = Products::find($request-> product_id) -> delete();
        return response()->json([
            'session'=> true,
            redirect()->back()
      ]);

    }
    public function edit_product(Request $request){
        $product = Products::find($request-> id);
        return view('admin.product.edit',[
            'title'=> 'Sửa sản phẩm',
            'product' => $product
            ]);
    }
    public function update_product(Request $request){
     $product = Products::find($request->id);
     $product->name = $request->input('name');
        $product->material = $request->input('material');
        $product->price = $request->input('price');
        $product->price_sale = $request->input('price_sale');
        $product->description = $request->input('description');
        $product->content = $request->input('content');
        $product->image = $request->input('image');
        if ($request->has('images')) {
            $product->images = implode("~", $request->input('images'));
        }
        $product->save();
        session()->flash('success', 'Cập nhật sản phẩm thành công.');
        return redirect('/admin/product_list');
    }
}
