<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Unit;
use App\Http\Requests\Admin\UnitRequest;

class UnitController extends Controller
{
    const _Per_Page = 5;
    public function __construct(){
        $this ->units = new Unit();
    }
    
    public function index(Request $request){
        $title = 'Units List';
        $filters = [];
        $keywords = null;

        if(!empty($request->cp_id)){
            $cp_id = $request ->cp_id;
            $filters [] = ['units.cp_id', '=', $cp_id];
        }

        if(!empty($request->keywords)){
            $keywords = $request ->keywords;
        }

        $unitList = $this -> units -> getAllUnit($filters, $keywords, self::_Per_Page);
        return view('admins.views.units.list', compact('title', 'unitList'));
    }


    public function getAdd(){
        $title = 'Add new unit';
        $allCompany = getAllCompanys();
        return view('admins.views.units.add', compact('title', 'allCompany'));
    }

    public function postAdd(UnitRequest $request){
        $dataInsert =[
            'unit_name' => $request->unit_name,
            'unit_email' => $request->unit_email,
            'cp_id' => $request->cp_id,
            'unit_phoneNumber' => $request->unit_phoneNumber,
            'unit_address' => $request->unit_address,
        ];

        $this ->units ->addUnit($dataInsert);
       return redirect() -> route('admin.unit.index')-> with('msg', 'Successfully added new unit!');
    }

    public function getEdit(Request $request, $id =0){
        $title = 'Edit unit information';
        $allCompany = getAllCompanys();
        if(!empty($id)){
            $unitDetail = $this->units ->getEdit($id);
            if(!empty($unitDetail[0])){
                $request ->session()->put('unit_id', $id);
                $unitDetail = $unitDetail[0];
            }else{
                return redirect()->route('admin.unit.index')->with('msg', 'Unit does not exist!');
            }
        }else{
            return redirect()->route('admin.unit.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.units.edit', compact('title', 'allCompany', 'unitDetail'));
    }

    public function postEdit(UnitRequest $request){
        $id = session('unit_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }

        $dataUpdate = [
            'unit_name' => $request->unit_name,
            'unit_email' => $request->unit_email,
            'cp_id' => $request->cp_id,
            'unit_phoneNumber' => $request->unit_phoneNumber,
            'unit_address' => $request->unit_address,
        ];
        $this->units -> postEdit($dataUpdate, $id);
        return redirect()->route('admin.unit.index')->with('msg', 'Update unit information successfully!');
    }
    
    public function delete($id= 0){
        if(!empty($id)){
            $unitDetail =  $this ->units ->getEdit($id);
            if(!empty($unitDetail[0])){
                $deleteUnit = $this ->units->deleteUnit($id);
                if($deleteUnit){
                    $msg = 'Unit removal successful!';
                }else{
                    $msg = 'You cannot remove the unit at this time. Please try again later!';
                }
            }else{
                $msg ='Unit does not exist!';
            }
        }else{
            $msg = 'Link does not exist!';
        }
        return redirect()->route('admin.unit.index')->with('msg', $msg);
    }

}
