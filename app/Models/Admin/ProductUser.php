<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class ProductUser extends Model
{
    use HasFactory;

    Protected $table = 'products';

    public function getProductsUser(){
        //DB::enableQueryLog(); 

        $products = DB::table($this->table)
        ->select('products.*', 'brands.*', 'colors.color_name as colors')
        ->join('colors', 'products.color_id', '=', 'colors.color_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->orderBy('products.pro_name', 'ASC')
        ->limit(9)
        ->offSet(1)
        ->get(); //return du lieu kieu "collections"
        return $products;
    }
}
