<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class InventoryVouchers extends Model
{
    use HasFactory;

    Protected $table = 'inventory_vouchers';

    public function getAllInventoryVoucherss($filters = [],$keywords = null,$perPage = null){
        //DB::enableQueryLog(); 
        $inventoryVouchers = DB::table($this->table)
        ->select('inventory_vouchers.*','units.*','companys.cp_name', 'users.user_name')
        ->join('units', 'inventory_vouchers.unit_id', '=', 'units.unit_id')
        ->join('companys', 'units.cp_id', '=', 'companys.cp_id')
        ->join('users', 'inventory_vouchers.user_id', '=', 'users.user_id')
        ->orderBy('inventory_vouchers.iv_date', 'DESC');

        if(!empty($filters)){
            $inventoryVouchers =$inventoryVouchers->where($filters);
        }

        if(!empty($keywords)){
            $inventoryVouchers =$inventoryVouchers->where(function($query) use ($keywords){
                $query->orWhere('cp_name', 'LIKE', '%'.$keywords.'%');
                $query->orWhere('unit_name', 'LIKE', '%'.$keywords.'%');
                $query->orWhere('unit_email', 'LIKE', '%'.$keywords.'%');
                $query->orWhere('unit_phoneNumber', 'LIKE', $keywords);
            });
        }

        if(!empty($perPage)){
            $inventoryVouchers = $inventoryVouchers ->paginate($perPage)->withQueryString();
        }else{
            $inventoryVouchers = $inventoryVouchers ->get();
        }
        //$sql = DB::getQueryLog();
        //dd($sql);
        return $inventoryVouchers;
    }

    public function getEdit($id){
        return DB::select('SELECT * FROM '.$this ->table.' WHERE iv_id = ?', [$id]);
    }

    public function postEdit($data, $id){
        return DB::table($this->table)
        ->where('iv_id', '=', $id)
        ->update($data);
    }
}
