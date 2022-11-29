<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class ProductUser extends Model
{
    use HasFactory;

    Protected $table = 'products';

    public function getProductsUser($filters = [],$keywords = null){
        //DB::enableQueryLog(); 

        $products = DB::table($this->table)
        ->select('products.*', 'brands.*', 'colors.color_name as colors')
        ->join('colors', 'products.color_id', '=', 'colors.color_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->orderBy('products.pro_name', 'ASC')
        ->limit(6)
        ->offSet(1);

        if(!empty($filters)){
            $products =$products->where($filters);
        }

        if(!empty($keywords)){
            $products =$products->where(function($query) use ($keywords){
                $query->orWhere('pro_name', 'LIKE', '%'.$keywords.'%');
            });
        }

        $products = $products ->get();
        // ->get(); //return du lieu kieu "collections"
        return $products;
    }

    public function getDetail($id){
        return DB::select('SELECT * FROM '.$this ->table.' INNER JOIN brands ON products.brand_id=brands.brand_id 
        INNER JOIN colors ON products.color_id=colors.color_id WHERE pro_id = ?', [$id]);
    }
}
