<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use DB;

class Product extends Model
{
    use HasFactory;

    Protected $table = 'products';

    public function getAllProducts($filters = [],$keywords = null, $perPage = null){
        //DB::enableQueryLog(); 
        $products = DB::table($this->table)
        ->select('products.*', 'brands.*', 'colors.color_name as colors')
        ->join('colors', 'products.color_id', '=', 'colors.color_id')
        ->join('brands', 'products.brand_id', '=', 'brands.brand_id')
        ->orderBy('products.pro_name', 'ASC');

        if(!empty($filters)){
            $products =$products->where($filters);
        }

        if(!empty($keywords)){
            $products =$products->where(function($query) use ($keywords){
                $query->orWhere('pro_name', 'LIKE', '%'.$keywords.'%');
            });
        }

        if(!empty($perPage)){
            $products = $products ->paginate($perPage)->withQueryString();
        }else{
            $products = $products ->get();
        }
        // $sql = DB::getQueryLog();
        // dd($sql);
        return $products;
    }

    public function addProduct($data){
        return DB::table($this -> table) -> insert($data);
    }

    public function getEdit($id){
        return DB::select('SELECT * FROM '.$this ->table.' WHERE pro_id = ?', [$id]);
    }

    public function postEdit($data, $id){
        return DB::table($this->table)
        ->where('pro_id', '=', $id)
        ->update($data);
    }

    public function deleteProduct($id){
        return DB::table($this->table)
        ->where('pro_id', '=', $id)
        ->delete();
    }
}
