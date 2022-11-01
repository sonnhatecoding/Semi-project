<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Brand;
use App\Http\Requests\Admin\BrandRequest;
class BrandController extends Controller
{
    //
    const _Per_Page = 6;

    public function __construct(){
        $this -> brands = new Brand();
    }

    // brand list
    public function index(Request $request){
        $title = 'Brands List';
        $keywords = null;
        // search
        if(!empty($request->keywords)){
            $keywords = $request ->keywords;
        }

        $brandList = $this -> brands -> getAllBrand($keywords, self::_Per_Page);
        return view('admins.views.brands.list', compact('title', 'brandList'));
    }

    // Get add Brand
    public function getAdd(){
        $title = 'Add new Brand';
        return view('admins.views.brands.add', compact('title'));
    }

    // handle add Brand
    public function postAdd(BrandRequest $request){
        if($request->has('brand_logo')){
            $file = $request ->brand_logo;
            $ext = $request ->brand_logo->extension();
            $file_name = time().'.logo.'.$ext;
            $file->move(public_path('images/brand'), $file_name);
        }
        $request ->merge(['image' => $file_name]);

        $dataInsert =[
            'brand_name' => $request->brand_name,
            'brand_logo' => $request->image,
        ];

        $this ->brands ->addBrand($dataInsert);
        return redirect() -> route('admin.brand.index')-> with('msg', 'Add new successful Brand!');
    }

    // get edit Brand
    public function getEdit(Request $request, $id =0){
        $title = 'Edit Brand information!';
        if(!empty($id)){
            $brandDetail = $this->brands ->getEdit($id);
            if(!empty($brandDetail[0])){
                $request ->session()->put('brand_id', $id);
                $brandDetail = $brandDetail[0];
            }else{
                return redirect()->route('admin.brand.index')->with('msg', 'Brand does not exist');
            }
        }else{
            return redirect()->route('admin.brand.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.brands.edit', compact('title', 'brandDetail'));
    }

    // Handle edit Brand
    public function postEdit(BrandRequest $request){
        $id = session('brand_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }
        if($request->has('brand_logo')){
            $file = $request ->brand_logo;
            $ext = $request ->brand_logo->extension();
            $file_name = time().'.logo.'.$ext;
            $file->move(public_path('images/brand'), $file_name);
        }
        $request ->merge(['image' => $file_name]);

        $dataUpdate = [
            'brand_name' => $request-> brand_name,
            'brand_logo' => $request->image,
        ];
        $this->brands -> postEdit($dataUpdate, $id);
        return redirect() -> route('admin.brand.index')-> with('msg', 'Update thuong hieu thành công');
    }

    public function delete($id = 0){
        if(!empty($id)){
            $brandDetail =  $this ->brands ->getEdit($id);
            if(!empty($brandDetail[0])){
                $deleteBrand = $this ->brands->deleteBrand($id);
                if($deleteBrand){
                    $msg = 'Brand removal successful!';
                }else{
                    $msg = 'You cannot remove the brand at this time. Please try again later!';
                }
            }else{
                $msg ='Brand does not exist!';
            }
        }else{
            $msg = 'Link does not exist!';
        }
        return redirect()->route('admin.brand.index')->with('msg', $msg);
    }
}
