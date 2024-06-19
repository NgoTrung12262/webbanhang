<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\order;
use App\Models\products;
use Illuminate\Http\Request;


class oderController extends Controller
{
    public function list_order(){
        $orders = order::all();
        return view("admin.order.list",[
            "orders"=> $orders
        ]);
    }
    public function detail_order(Request $request){
        $order_detail = json_decode($request->order_detail, true);
        $product_id = array_keys($order_detail);
        $products = products::whereIn("id", $product_id)->get();
        return view("admin.order.detail",[
            "products" => $products,
            "order_detail" => $order_detail
        ]);
    }
    public function delete_list($id)
    {
        $item = order::find($id);

        if (!$item) {
            return back()->with('error', 'Item not found.');
        }
        $item->delete();
        return redirect('/admin/order_list');
    }
}
