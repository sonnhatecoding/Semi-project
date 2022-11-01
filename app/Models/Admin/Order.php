<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Order extends Model
{
    use HasFactory;
    Protected $table = 'orders';

    public function getAllOrders($filters = [],$keywords = null,$perPage = null){
        //DB::enableQueryLog(); 
        $orders = DB::table($this->table)
        ->select('orders.*','users.user_name','users.user_email', 'users.user_address', 'users.user_phoneNumber')
        ->join('users', 'orders.user_id', '=', 'users.user_id')
        ->orderBy('orders.order_createAt', 'DESC');

        if(!empty($filters)){
            $orders =$orders->where($filters);
        }

        if(!empty($keywords)){
            $orders =$orders->where(function($query) use ($keywords){
                $query->orWhere('user_name', 'LIKE', '%'.$keywords.'%');
                $query->orWhere('user_email', 'LIKE', '%'.$keywords.'%');
                $query->orWhere('user_phoneNumber', 'LIKE', $keywords);
            });
        }

        if(!empty($perPage)){
            $orders = $orders ->paginate($perPage)->withQueryString();
        }else{
            $orders = $orders ->get();
        }
        //$sql = DB::getQueryLog();
        //dd($sql);
        return $orders;
    }

    public function getEdit($id){
        return DB::select('SELECT * FROM '.$this ->table.' WHERE order_id = ?', [$id]);
    }

    public function postEdit($data, $id){
        return DB::table($this->table)
        ->where('order_id', '=', $id)
        ->update($data);
    }

    public function deleteOrder($id){
        return DB::table($this->table)
        ->where('order_id', '=', $id)
        ->delete();
    }
}
