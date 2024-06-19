<?php

namespace App\Http\Controllers;

use App\Models\products;
use Illuminate\Http\Request;

class CartController extends Controller
{
    public function update(Request $request, $id)
    {
        $product = products::find($id);

        if (!$product) {
            return response()->json(['success' => false, 'message' => 'Sản phẩm không tồn tại'], 404);
        }
        $quantity = $request->input('quantity', 1);
        $updatedProduct = [
            'id' => $product->id,
            'name' => $product->name,
            'price' => $product->price,
            'quantity' => $quantity,
            'total' => $product->price * $quantity,
        ];

        $totalAll = 0;

        return response()->json([
            'success' => true,
            'itemTotalFormatted' => number_format($updatedProduct['total'], 0, ',', '.') . ' đ',
            'totalAllFormatted' => number_format($totalAll, 0, ',', '.') . ' đ',
        ]);

    }

  
    public function remove_cart($id) {
        $cart = session()->get('cart', []);

        if (isset($cart[$id])) {
            unset($cart[$id]);
            session(['cart' => $cart]);
        }

        return redirect('/order_cf');
    }
}
