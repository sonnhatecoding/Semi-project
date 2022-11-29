<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User\UserModel;
use App\Http\Requests\User\SignupRequest;

use Illuminate\Support\Facades\Hash;

class SignupController extends Controller
{
    // sign up 
    public function getRegister()
    {
        return view('users.views.signup');
    }

    public function postRegister(SignupRequest $request)
    {

        $users = new UserModel;

        $users->user_name = $request->user_name;

        $users->user_email = $request->user_email;

        $users->user_phoneNumber = $request->user_phoneNumber;

        $users->user_address = $request->user_address;

        $users->user_password =$request->user_password;
        $users->ur_id = 2;
        $users->user_status = 1;
        $users->user_createAt = date('Y-m-d H:i:s');
        $users->save();

        return redirect()->route('signin');

    }
}
