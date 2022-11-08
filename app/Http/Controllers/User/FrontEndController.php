<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class FrontEndController extends Controller
{
    //
    public function cart(){
        return view('users.views.cart');
    }

    public function detail(){
        return view('users.views.detail');
    }
}
