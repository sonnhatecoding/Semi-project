<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\UserModel;
use App\Http\Requests\User\SignupRequest;
use DB;


class SigninController extends Controller
{
    // sign in
    public function getSignin()
    {
        return view('users.views.signin');
    }

    
    
    public function postSignin(Request $request)
    {
        $user_name['info'] = $request->user_name;
        $user_password = $request->user_password;

        $result = DB::table('users')->WHERE('user_name', $user_name)->get()->toArray();
        
        foreach ($result as $value) {
            # code...
        }

        if ($value->user_password == $user_password) 
        {
            return redirect()->route('index', $user_name)->with('message','thanh cong');
        }else {
            echo 'đăng nhập thất bại';
        }

        // $arr = ['uUsername' => $request->uUsername, 'uPassword' => $request->uPassword];
        // if (Auth::attempt($arr)) 
        // {
        //     dd('thanh cong');
        //     return redirect()->route('clients.index')->with('message','thanh cong');
        // }else
        // {
        //     return redirect()->route('clients.login')->with('message','that bai');
        //     dd('that bai');
        // }

        // if (Auth::attempt(['uUsername' => $request->uUsername, 'uPassword' => $request->uPassword])) 
        // {
        //     if (Auth::user()->role == 1) 
        //     {
        //         dd('thành công');
        //         return view('Font_end.content.index');
        //     }
        //     else
        //     {
        //         dd('thất bại');
        //         return view('Back_end.content.index');
        //     }
            

        // }
        // else
        // {
        //     Auth::logout();
        //     return redirect()->back()->with('message','tài khoản chưa tồn tại');
        // }
    }
        
}
