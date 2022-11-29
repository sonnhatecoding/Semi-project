<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\ProductUser;
use App\Models\Admin\Product;

class FrontEndController extends Controller
{
    //
    const _Per_Page = 12;

    public function __construct(){
        $this ->productUser = new ProductUser();
        $this ->products = new Product();
    }
        
    public function index(Request $request){
        $title = 'Home';
        $filters = [];
        $keywords = null;
    
        if(!empty($request->brands)){
            $brands = $request ->brands;
            $filters [] = ['products.brand_id', '=', $brands];
        }
    
        if(!empty($request->colors)){
            $colors = $request ->colors;
            $filters [] = ['products.color_id', '=', $colors];
        }
    
        if(!empty($request->rams)){
            $rams = $request -> rams;
            if($rams=='2'){
                $rams =2;
            }elseif($rams=='4'){
                $rams =4;
            }elseif($rams=='6'){
                $rams =6;
            }else{
                $rams =8;
            }
            $filters [] = ['products.pro_ram', '=', $rams];
        }
    
        if(!empty($request->internal_memory)){
            $internal_memory = $request -> internal_memory;
            if($internal_memory=='32'){
                $internal_memory =32;
            }elseif($internal_memory=='64'){
                $internal_memory =64;
            }elseif($internal_memory=='128'){
                $internal_memory =128;
            }elseif($internal_memory=='256'){
                $internal_memory =256;
            }elseif($internal_memory=='512'){
                $internal_memory =512;
            }else{
                $internal_memory =1024;
            }
            $filters [] = ['products.pro_iMemory', '=', $internal_memory];
        }
    
        if(!empty($request->operating_system)){
            $operating_system = $request -> operating_system;
            if($operating_system=='Android'){
                $operating_system ='Android';
            }elseif($operating_system=='IOS'){
                $operating_system ='IOS';
            }elseif($operating_system=='Windows Phone'){
                $operating_system ='Windows Phone';
            }elseif($operating_system=='Symbian'){
                $operating_system ='Symbian';
            }elseif($operating_system=='BlackBerry OS'){
                $operating_system ='BlackBerry OS';
            }else{
                $operating_system ='Bada';
            }
            $filters [] = ['products.pro_oSystem', '=', $operating_system];
        }
    
        if(!empty($request->warranty_period)){
            $warranty_period = $request -> warranty_period;
            if($warranty_period=='6'){
                $warranty_period =6;
            }elseif($warranty_period=='8'){
                $warranty_period =8;
            }elseif($warranty_period=='12'){
                $warranty_period =12;
            }elseif($warranty_period=='18'){
                $warranty_period =18;
            }elseif($warranty_period=='24'){
                $warranty_period =24;
            }else{
                $warranty_period =36;
            }
            $filters [] = ['products.pro_warrantyPeriod', '=', $warranty_period];
        }
    
        if(!empty($request->keywords)){
            $keywords = $request ->keywords;
        }
            
        $productList = $this -> productUser -> getProductsUser($filters, $keywords);
        return view('users.index', compact('title','productList'));
    }

    public function cart(){
        return view('users.views.cart');
    }

    // public function detail(){
    //     return view('users.views.detail');
    // }

    public function detail(Request $request,$id = 0){
        $title = 'Detail';
        if(!empty($id)){
            $productDetail = $this->productUser ->getDetail($id);
            if(!empty($productDetail[0])){
                $request ->session()->put('pro_id', $id);
                $productDetail = $productDetail[0];
            }else{
                return redirect()->route('index')->with('msg', 'Product does not exist!');
            }
        }else{
            return redirect()->route('index')->with('msg', 'Link does not exist!');
        }
        return view('users.views.detail', compact('title','productDetail'));
    }

    public function category(Request $request){
        $title = 'Product List';
        $allBrands = getAllBrands();
        $allColors = getAllColors();
        $filters = [];
        $keywords = null;
    
        if(!empty($request->brands)){
            $brands = $request ->brands;
            $filters [] = ['products.brand_id', '=', $brands];
        }
        if(!empty($request->colors)){
            $colors = $request ->colors;
            $filters [] = ['products.color_id', '=', $colors];
        }

        if(!empty($request->rams)){
            $rams = $request -> rams;
            if($rams=='2'){
                $rams =2;
            }elseif($rams=='4'){
                $rams =4;
            }elseif($rams=='6'){
                $rams =6;
            }else{
                $rams =8;
            }
            $filters [] = ['products.pro_ram', '=', $rams];
        }

        if(!empty($request->internal_memory)){
            $internal_memory = $request -> internal_memory;
            if($internal_memory=='32'){
                $internal_memory =32;
            }elseif($internal_memory=='64'){
                $internal_memory =64;
            }elseif($internal_memory=='128'){
                $internal_memory =128;
            }elseif($internal_memory=='256'){
                $internal_memory =256;
            }elseif($internal_memory=='512'){
                $internal_memory =512;
            }else{
                $internal_memory =1024;
            }
            $filters [] = ['products.pro_iMemory', '=', $internal_memory];
        }

        if(!empty($request->operating_system)){
            $operating_system = $request -> operating_system;
            if($operating_system=='Android'){
                $operating_system ='Android';
            }elseif($operating_system=='IOS'){
                $operating_system ='IOS';
            }elseif($operating_system=='Windows Phone'){
                $operating_system ='Windows Phone';
            }elseif($operating_system=='Symbian'){
                $operating_system ='Symbian';
            }elseif($operating_system=='BlackBerry OS'){
                $operating_system ='BlackBerry OS';
            }else{
                $operating_system ='Bada';
            }
            $filters [] = ['products.pro_oSystem', '=', $operating_system];
        }

        if(!empty($request->warranty_period)){
            $warranty_period = $request -> warranty_period;
            if($warranty_period=='6'){
                $warranty_period =6;
            }elseif($warranty_period=='8'){
                $warranty_period =8;
            }elseif($warranty_period=='12'){
                $warranty_period =12;
            }elseif($warranty_period=='18'){
                $warranty_period =18;
            }elseif($warranty_period=='24'){
                $warranty_period =24;
            }else{
                $warranty_period =36;
            }
            $filters [] = ['products.pro_warrantyPeriod', '=', $warranty_period];
        }

        if(!empty($request->keywords)){
            $keywords = $request ->keywords;
        }
        
        $productList = $this -> products -> getAllProducts($filters, $keywords,self::_Per_Page);
        return view('users.views.category', compact('title','productList','allBrands','allColors'));
    }
}
