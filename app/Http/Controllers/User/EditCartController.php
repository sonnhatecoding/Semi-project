<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\CartProductModel;
use DB;

class EditCartController extends Controller
{

    public function updatecart(Request $request)
    {
        if ($request->id and $request->id) {
            $cart = session()->get('cart');//edit cart controller

            $cart[$request->id]["pQuantity"] = $request->pQuantity;

            session()->put('cart', $cart);//sesion cart

            $subTotal = $cart[$request->id]['pQuantity'] * $cart[$request->id]['pPrice'];

            $total = $this->getCartTotal();// total cart

            dd($cart);

            return view('Font_end.content.shoppingcart', ['msg' => 'Cart updated successfully!', 'total' => $total, '$subTotal' => $subTotal]);
        }
    }
}