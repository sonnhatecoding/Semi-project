<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Users;
use App\Http\Requests\Admin\UserRequest;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    const _Per_Page = 5;

    public function __construct(){
        $this ->users = new Users();
    }

    public function index(Request $request){
        $title = 'Users List';
        $filters = [];
        $keywords = null;

        if(!empty($request->status)){
            $status = $request -> status;
            if($status=='active'){
                $status =1;
            }else{
                $status =0;
            }
            $filters [] = ['users.user_status', '=', $status];
        }
        
        if(!empty($request->ur_id)){
            $ur_id = $request ->ur_id;
            $filters [] = ['users.ur_id', '=', $ur_id];
        }

        if(!empty($request->keywords)){
            $keywords = $request ->keywords;
        }

        $userList = $this -> users -> getAllUsers($filters, $keywords, self::_Per_Page);
        return view('admins.views.users.list', compact('title', 'userList'));
    }

    public function getAdd(){
        $title = 'Add new user';
        $allUserRole = getAllUserRoles();
        return view('admins.views.users.add', compact('title', 'allUserRole'));
    }

    public function postAdd(UserRequest $request){
        $dataInsert =[
            'user_name' => $request->user_name,
            'user_email' => $request->user_email,
            'ur_id' => $request->ur_id,
            'user_phoneNumber' => $request->user_phoneNumber,
            'user_password' => Hash::make($request->user_password),
            'user_address' => $request->user_address,
            'user_status' => $request->user_status,
            "user_createAt" => date('Y-m-d H:i:s')
        ];

        $this ->users ->addUser($dataInsert);
        return redirect() -> route('admin.user.index')-> with('msg', 'Successfully added new user!');
    }

    public function getEdit(Request $request, $id =0){
        $title = 'Edit user information';
        $allUserRole = getAllUserRoles();
        if(!empty($id)){
            $userDetail = $this->users ->getEdit($id);
            if(!empty($userDetail[0])){
                $request ->session()->put('user_id', $id);
                $userDetail = $userDetail[0];
            }else{
                return redirect()->route('admin.user.index')->with('msg', 'User does not exist!');
            }
        }else{
            return redirect()->route('admin.user.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.users.edit', compact('title', 'allUserRole','userDetail'));
    }

    public function postEdit(UserRequest $request){    
        $id = session('user_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }

        $dataUpdate = [
            'user_name' => $request->user_name,
            'ur_id' => $request->ur_id,
            'user_status' => $request->user_status,
            'user_email' => $request->user_email,
            'user_phoneNumber' => $request->user_phoneNumber,
            'user_password' => $request->user_password,
            'user_address' => $request->user_address,
        ];
        $this->users -> postEdit($dataUpdate, $id);
        return redirect()->route('admin.user.index')->with('msg', 'Update user information successfully!');
    }

    public function delete ($id =0){
        if(!empty($id)){
            $userDetail =  $this ->users ->getEdit($id);
            if(!empty($userDetail[0])){
                $deleteUser = $this ->users->deleteUser($id);
                if($deleteUser){
                    $msg = 'User removal successful!';
                }else{
                    $msg = 'You cannot remove the user at this time. Please try again later!';
                }
            }else{
                $msg ='User does not exist!';
            }
        }else{
            $msg = 'Link does not exist!';
        }
        return redirect()->route('admin.user.index')->with('msg', $msg);
    }
}
