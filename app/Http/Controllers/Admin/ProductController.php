<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Product;
use App\Http\Requests\Admin\ProductRequest;

class ProductController extends Controller
{
    //
    const _Per_Page = 7;

    public function __construct(){
        $this ->products = new Product();
    }

    public function index(Request $request){
        $title = 'Products List';
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
        return view('admins.views.products.list', compact('title', 'productList'));
    }

    public function getAdd(){
        $title = 'Add new product';
        $allBrands = getAllBrands();
        $allColors = getAllColors();
        return view('admins.views.products.add', compact('title', 'allColors', 'allBrands'));
    }

    public function postAdd(ProductRequest $request){
        if($request->has('pro_image')){
            $file = $request ->pro_image;
            $ext = $request ->pro_image->extension();
            $file_name = time().'.main.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image' => $file_name]);

        if($request->has('pro_image1')){
            $file = $request ->pro_image1;
            $ext = $request ->pro_image1->extension();
            $file_name = time().'.01.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image1' => $file_name]);

        if($request->has('pro_image2')){
            $file = $request ->pro_image2;
            $ext = $request ->pro_image2->extension();
            $file_name = time().'.02.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image2' => $file_name]);

        if($request->has('pro_image3')){
            $file = $request ->pro_image3;
            $ext = $request ->pro_image3->extension();
            $file_name = time().'.03.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image3' => $file_name]);

        if($request->has('pro_image4')){
            $file = $request ->pro_image4;
            $ext = $request ->pro_image4->extension();
            $file_name = time().'.04.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image4' => $file_name]);
        
        $dataInsert =[
            'pro_name' => $request->pro_name,
            'brand_id' => $request->brand_id,
            'color_id' => $request->color_id,
            'pro_ram' => $request->pro_ram,
            'pro_iMemory' => $request->pro_iMemory,
            'pro_oSystem' => $request->pro_oSystem,
            'pro_warrantyPeriod' => $request->pro_warrantyPeriod,
            'pro_image' => $request->image,
            'pro_image1' => $request->image1,
            'pro_image2' => $request->image2,
            'pro_image3' => $request->image3,
            'pro_image4' => $request->image4,
            'pro_quatity' => $request->	pro_quatity,
            'pro_origin' => $request->pro_origin,
            'pro_price' => $request->pro_price,
            'pro_reducedPrice' => $request->pro_reducedPrice,
            'pro_launchDate' => $request->pro_launchDate,
            'pro_description' => $request->pro_description,
        ];

        $this ->products ->addProduct($dataInsert);

        return redirect() -> route('admin.product.index')-> with('msg', 'Successfully added new product!');
    }

    public function image(Request $request, $id =0){
        $title = 'Image of product';
        if(!empty($id)){
            $imageDetail = $this->products ->getEdit($id);
            if(!empty($imageDetail[0])){
                $imageDetail = $imageDetail[0];
            }else{
                return redirect()->route('admin.product.index')->with('msg', 'Images does not exist!');
            }
        }else{
            return redirect()->route('admin.product.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.products.image', compact('title', 'imageDetail'));
    }

    public function getEdit(Request $request,$id = 0){
        $title = 'Edit product information';
        $allBrands = getAllBrands();
        $allColors = getAllColors();
        if(!empty($id)){
            $productDetail = $this->products ->getEdit($id);
            if(!empty($productDetail[0])){
                $request ->session()->put('pro_id', $id);
                $productDetail = $productDetail[0];
            }else{
                return redirect()->route('admin.product.index')->with('msg', 'Product does not exist!');
            }
        }else{
            return redirect()->route('admin.product.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.products.edit', compact('title', 'productDetail','allBrands', 'allColors'));
    }

    public function postEdit(ProductRequest $request){
        $id = session('pro_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }

        if($request->has('pro_image')){
            $file = $request ->pro_image;
            $ext = $request ->pro_image->extension();
            $file_name = time().'.main.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image' => $file_name]);

        if($request->has('pro_image1')){
            $file = $request ->pro_image1;
            $ext = $request ->pro_image1->extension();
            $file_name = time().'.01.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image1' => $file_name]);

        if($request->has('pro_image2')){
            $file = $request ->pro_image2;
            $ext = $request ->pro_image2->extension();
            $file_name = time().'.02.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image2' => $file_name]);

        if($request->has('pro_image3')){
            $file = $request ->pro_image3;
            $ext = $request ->pro_image3->extension();
            $file_name = time().'.03.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image3' => $file_name]);

        if($request->has('pro_image4')){
            $file = $request ->pro_image4;
            $ext = $request ->pro_image4->extension();
            $file_name = time().'.04.'.$ext;
            $file->move(public_path('images/product'), $file_name);
        }
        $request ->merge(['image4' => $file_name]);

        $dataUpdate = [
            'pro_name' => $request->pro_name,
            'brand_id' => $request->brand_id,
            'color_id' => $request->color_id,
            'pro_ram' => $request->pro_ram,
            'pro_iMemory' => $request->pro_iMemory,
            'pro_oSystem' => $request->pro_oSystem,
            'pro_warrantyPeriod' => $request->pro_warrantyPeriod,
            'pro_quatity' => $request->	pro_quatity,
            'pro_image' => $request->image,
            'pro_image1' => $request->image1,
            'pro_image2' => $request->image2,
            'pro_image3' => $request->image3,
            'pro_image4' => $request->image4,
            'pro_origin' => $request->pro_origin,
            'pro_price' => $request->pro_price,
            'pro_reducedPrice' => $request->pro_reducedPrice,
            'pro_launchDate' => $request->pro_launchDate,
            'pro_description' => $request->pro_description,
        ];
        $this->products -> postEdit($dataUpdate, $id);
        return redirect()->route('admin.product.index')->with('msg', 'Update product information successfully!');
    }

    public function delete($id = 0){
        if(!empty($id)){
            $productDetail =  $this ->products ->getEdit($id);
            if(!empty($productDetail[0])){
                $deleteProduct = $this ->products->deleteProduct($id);
                if($deleteProduct){
                    $msg = 'Product removal successful!';
                }else{
                    $msg = 'You cannot remove the product at this time. Please try again later!';
                }
            }else{
                $msg ='Product does not exist!';
            }
        }else{
            $msg = 'Link does not exist!';
        }
        return redirect()->route('admin.product.index')->with('msg', $msg);
    }
}
