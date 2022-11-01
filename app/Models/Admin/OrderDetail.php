<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class OrderDetail extends Model
{
    use HasFactory;

    Protected $table = 'order_detail';

    public function getDetailOrders($id){
        //DB::enableQueryLog(); 
        $order_detail = DB::table($this->table)
        ->select('order_detail.*','products.*', 'users.user_name', 'brands.brand_logo', 'colors.color_name')
        ->join('orders', 'order_detail.order_id', '=', 'orders.order_id')
        ->join('users', 'orders.user_id', '=', 'users.user_id')
        ->join('products', 'order_detail.pro_id', '=', 'products.pro_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->join('colors', 'products.color_id', '=', 'colors.color_id')
        ->where('order_detail.order_id', '=', $id)
        ->get();
        //$sql = DB::getQueryLog();
        //dd($sql);
        return $order_detail;
    }

    public function getEdit($id){
        // $quanlity = 0;
        // $total = 0;

        //$edit_order_detai = DB::select('SELECT * FROM '.$this ->table.' WHERE od_id = ?', [$id]);

        $order = DB::table($this->table)
        ->select('order_detail.*','products.pro_price')
        ->join('products', 'order_detail.pro_id', '=', 'products.pro_id')
        ->where('od_id', '=' ,$id)
        ->get();

        // $temp = $edit_order_detai[0]-> order_id;
        // //dd ($edit_order_detai);

        // $order = DB::table($this->table)
        // ->select('order_detail.*','products.pro_price')
        // ->join('products', 'order_detail.pro_id', '=', 'products.pro_id')
        // ->where('order_id', '=' ,$temp)
        // ->get()
        // ->toArray();
        // //dd($order);

        // foreach ($order as $update){
        //     $quanlity += $update -> od_quantity;
        //     $total += ($update -> od_quantity * $update -> pro_price);
        // }

        //dd($order);
        return $order;

    }

    public function postEditOrderDetail($data, $id){
        return DB::table($this->table)
        ->where('od_id', '=', $id)
        ->update($data);
    }

    public function postEditOrder($data){
        DB::enableQueryLog(); 
        return DB::table('orders')
        ->select('order_detail.*','orders.*')
        ->join('order_detail', 'order_detail.order_id', '=', 'orders.order_id')
        ->where('orders.order_id', '=', 'order_detail.order_id')
        ->update($data);
        $sql = DB::getQueryLog();
        dd($sql);

    }

    public function deleteOrderDetail($id){
        return DB::table($this->table)
        ->where('od_id', '=', $id)
        ->delete();
    }
}
