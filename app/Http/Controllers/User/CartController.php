<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\CartProductModel;
use DB;

class CartController extends Controller
{
    public function cart()
    {
        return view('users.views.cart');//show cart controler
    }

    public function addtocart($id) 
    {
        $product = CartProductModel::find($id); 

        if(!$product) 
        {
            abort(404); 
        } 

        $cart = session()->get('cart');
        // if cart is empty then this the first product 
        if(!$cart) 
        { 

            $cart = 
            [ 
                $id => 
                [ 
                    "pro_name" => $product->pro_name, 
                    "pro_quatity" => 1, 
                    "pro_price" => $product->pro_price, 
                    "pro_image" => $product->pro_image 
                ] 
            ]; 

            session()->put('orders', $cart); 

            return view('users.views.cart');
        } 

        // if cart not empty then check if this product exist then increment quantity 
        if(isset($cart[$id])) 
        { 
            $cart[$id]['pro_quatity']++; 

            session()->put('orders', $cart); 

            return view('users.views.cart', ['msg' => 'Product added to cart successfully!']); 
        } 
        // if item not exist in cart then add to cart with quantity = 1 
        $cart[$id] = 
        [ 
            "pro_name" => $product->pro_name, 
            "pro_quatity" => 1, 
            "pro_price" => $product->pro_price, 
            "pro_image" => $product->pro_image
        ]; 

        session()->put('orders', $cart); 

        return view('users.views.cart', ['msg' => 'Product added to cart successfully!']); 
    }

    // public function delete()
    // {
    //     if ($request->id) 
    //     {
    //         $cart = session()->get('cart');

    //         if (isset($cart[$request->id])) 
    //         {
    //             unset($cart[$request->id]);

    //             session()->put('cart', $cart); 
    //         }
    //         return view('Font_end.content.shoppingcart', ['msg' => 'Delete successfully!']);
    //     }
    // }

    // public function updatecart(Request $request)
    // {
    //     if ($request->id and $request->id) 
    //     {
    //         $cart = session()->get('cart');

    //         $cart[$request->id]["pQuantity"] = $request->pQuantity;

    //         session()->put('cart', $cart);

    //         $subTotal = $cart[$request->id]['pQuantity'] * $cart[$request->id]['pPrice'];

    //         $total = $this->getCartTotal();

    //         dd($cart);

    //         return view('Font_end.content.shoppingcart', ['msg' => 'Cart updated successfully!', 'total' => $total, '$subTotal' => $subTotal]);
    //     }
    // }
}
