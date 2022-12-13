<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\ProductModel;

class SearchController extends Controller
{
    //
    public function search(Request $request)
    {
        $ProductSearch = CartProductModel::WHERE('pro_name','like','%'.$request->key.'%')
                                        ->orWhere('pro_price',$request->key)
                                        ->get();

        return view('users.views.search', compact('ProductSearch'));
    }
}
