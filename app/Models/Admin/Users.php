<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Users extends Model
{
    use HasFactory;
    
    Protected $table = 'users';

    public function getAllUsers($filters = [], $keywords = null, $perPage = null){
        // DB::enableQueryLog(); 
        $users = DB::table($this->table)
        ->select('users.*', 'user_role.ur_name as role')
        ->join('user_role', 'users.ur_id', '=', 'user_role.ur_id')
        ->orderBy('users.user_createAt', 'DESC');

        if(!empty($filters)){
            $users =$users->where($filters);
        }
        
        if(!empty($keywords)){
            $users =$users->where(function($query) use ($keywords){
                $query->orWhere('user_name', 'LIKE', '%'.$keywords.'%');
                $query->orWhere('user_email', 'LIKE', '%'.$keywords.'%');
                $query->orWhere('user_phoneNumber', 'LIKE', $keywords);
            });
        }

        if(!empty($perPage)){
            $users = $users ->paginate($perPage)->withQueryString();
        }else{
            $users = $users ->get();
        }
        // $sql = DB::getQueryLog();
        // dd($sql);
        return $users;
    }


    public function addUser($data){
        return DB::table($this -> table) -> insert($data);
    }

    public function getEdit($id){
        return DB::select('SELECT * FROM '.$this ->table.' WHERE user_id = ?', [$id]);
    }

    public function postEdit($data, $id){
        return DB::table($this->table)
        ->where('user_id', '=', $id)
        ->update($data);
    }

    public function deleteUser($id){
        return DB::table($this->table)
        ->where('user_id', '=', $id)
        ->delete();
    }


}
