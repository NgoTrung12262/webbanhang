<?php

namespace App\Http\Controllers;

use App\Mail\Xacnhandonhang;
use App\Models\order;
use App\Models\products;
use Illuminate\Contracts\Session\Session;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Str;
use Termwind\Components\Raw;

class FrontendController extends Controller
{
    public function index(Request $request)
    {
        $products = products::take(5)->get();
        $popularProducts = products::orderBy('name', 'asc')->take(5)->get();
        return view("home", [
            "product" => $products,
            'popularProducts' => $popularProducts
        ]);
    }
    public function show_product(Request $request)
    {
        $product = products::find($request->id);
        $popularProducts = products::orderBy('name', 'asc')->take(5)->get();

        return view("product", [
            "product" => $product,
            'popularProducts' => $popularProducts
        ]);
    }

    public function add_cart(Request $request)
    {
        $product_qty = $request->quantity_number;
        $product_id = $request->product_id;
        $cart = session()->get('cart', []);
        if (!is_array($cart)) {
            $cart = [];
        }
        if (isset($cart[$product_id])) {
            $cart[$product_id]['quantity'] += $product_qty;
        } else {
            $cart[$product_id] = [
                'id' => $product_id,
                'quantity' => $product_qty
            ];
        }
        session(['cart' => $cart]);

        return redirect('/cart');
    }
    public function show_cart()
    {
        $cart = session('cart', []);
        $cart = array_filter($cart, function ($item) {
            return is_array($item) && isset($item['quantity']);
        });
        $popularProducts = products::orderBy('name', 'asc')->take(5)->get();
        $products = products::whereIn('id', array_keys($cart))->get();

        $cartDetails = $products->map(function ($product) use ($cart) {
            return [
                'image' => $product->image,
                'id' => $product->id,
                'name' => $product->name,
                'price' => $product->price,
                'price_sale' => $product->price_sale,
                'quantity' => $cart[$product->id]['quantity'],
                'total' => $product->price * $cart[$product->id]['quantity']
            ];
        });
        $totalAll = $cartDetails->sum('total');
        return view('cart', ['cartDetails' => $cartDetails, 'totalAll' => $totalAll, 'popularProducts' => $popularProducts]);
    }

    public function remove_cart($id)
    {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect()->route('show_cart');
    }
    public function update_cart(Request $request)
    {
        $cart = session()->get('cart', []);
        $productId = $request->input('product_id');
        $quantity = $request->input('quantity_number');
        if ($productId && $quantity) {

            $cart[$productId] = [
                'id' => $productId,
                'quantity' => $quantity,

            ];
            session()->put('cart', $cart);
        }

        return redirect()->route('show_cart');
    }
    public function send_cart(Request $request)
    {
        $token = Str::random(12);
        $order = new order();
        $order->name = $request->input('name');
        $order->phone = $request->input('phone');
        $order->email = $request->input('email');
        $order->city = $request->input('city');
        $order->district = $request->input('district');
        $order->wart = $request->input('wart');
        $order->address = $request->input('address');
        $order->note = $request->input('note');
        $order_detail = json_encode($request->input('product_id'));
        $order->order_detail = $order_detail;
        $order->token = $token;
        $order->save();
        $nameinfo = $order->name;
        $Mail = Mail::to($order->email)->send(new Xacnhandonhang($nameinfo));
        return redirect('/order_cf');
    }

}
