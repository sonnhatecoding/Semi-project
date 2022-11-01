<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class IVDetail extends Model
{
    use HasFactory;

    Protected $table = 'inventory_vouchers_detail';

    public function getDetailInventoryVouchers($id){
        //DB::enableQueryLog(); 
        $ivDetail = DB::table($this->table)
        ->select('inventory_vouchers_detail.*','products.pro_name','products.pro_oSystem','products.pro_ram','products.pro_ram','products.pro_image','units.unit_name','companys.cp_name', 'brands.brand_logo','colors.color_name')
        ->join('inventory_vouchers', 'inventory_vouchers_detail.iv_id', '=', 'inventory_vouchers.iv_id')
        ->join('products', 'inventory_vouchers_detail.pro_id', '=', 'products.pro_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->join('colors', 'products.color_id', '=', 'colors.color_id')
        ->join('units', 'inventory_vouchers.unit_id', '=', 'units.unit_id')
        ->join('companys', 'units.cp_id', '=', 'companys.cp_id')
        ->where('inventory_vouchers_detail.iv_id', '=', $id)
        ->get();
        //$sql = DB::getQueryLog();
        //dd($sql);
        return $ivDetail;
    }
}
