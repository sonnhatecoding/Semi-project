<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Color;
use App\Http\Requests\Admin\ColorRequest;

class ColorController extends Controller
{
    //
    const _Per_Page = 6;

    public function __construct(){
        $this -> colors = new Color();
    }

    public function index(Request $request){
        $title = 'Colors List';
        $keywords = null;
        // search
        if(!empty($request->keywords)){
            $keywords = $request ->keywords;
        }
        $colorList = $this -> colors -> getAllColor($keywords, self::_Per_Page);
        return view('admins.views.colors.list', compact('title', 'colorList'));
    }

    public function getAdd(){
        $title = 'Add new Color';
        return view('admins.views.colors.add', compact('title'));
    }

    public function postAdd(ColorRequest $request){
        $dataInsert =[
            'color_name' => $request->color_name,
        ];

        $this ->colors ->addColor($dataInsert);
        return redirect() -> route('admin.color.index')-> with('msg', 'Add new color successfully!');
    }

    public function getEdit(Request $request, $id =0){
        $title = 'Edit color information';
        if(!empty($id)){
            $colorDetail = $this->colors ->getEdit($id);
            if(!empty($colorDetail[0])){
                $request ->session()->put('color_id', $id);
                $colorDetail = $colorDetail[0];
            }else{
                return redirect()->route('admin.color.index')->with('msg', 'Color does not exist!');
            }
        }else{
            return redirect()->route('admin.color.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.colors.edit', compact('title', 'colorDetail'));
    }

    public function postEdit(ColorRequest $request){
        $id = session('color_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }
        $dataUpdate = [
            'color_name' => $request-> color_name
        ];
        $this->colors -> postEdit($dataUpdate, $id);
        return redirect() -> route('admin.color.index')-> with('msg', 'Update color information successfully!');
    }

    public function delete($id){
        if(!empty($id)){
            $colorDetail =  $this ->colors ->getEdit($id);
            if(!empty($colorDetail[0])){
                $deleteColor = $this ->colors->deleteColor($id);
                if($deleteColor){
                    $msg = 'Color removal successful!';
                }else{
                    $msg = 'You cannot remove the color at this time. Please try again later!';
                }
            }else{
                $msg ='Color does not exist!';
            }
        }else{
            $msg = 'Link does not exist!';
        }
        return redirect()->route('admin.color.index')->with('msg', $msg);
    }
}
