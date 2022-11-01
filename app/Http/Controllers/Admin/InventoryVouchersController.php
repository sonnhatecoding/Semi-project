<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\InventoryVouchers;
use App\Http\Requests\Admin\InventoryVouchersRequest;

class InventoryVouchersController extends Controller
{

    const _Per_Page = 7;
    public function __construct(){
        $this ->inventoryVouchers = new InventoryVouchers();
    }

    public function index(Request $request){
        $title = 'Inventory Vouchers List';
        $filters = [];
        $keywords = null;

        if(!empty($request->types)){
            $types = $request -> types;
            if($types=='import'){
                $types =0;
            }else{
                $types =1;
            }
            $filters [] = ['inventory_vouchers.iv_type', '=', $types];
        }

        if(!empty($request->status)){
            $status = $request -> status;
            if($status=='successful'){
                $status =0;
            }else{
                $status =1;
            }
            $filters [] = ['inventory_vouchers.iv_status', '=', $status];
        }

        if(!empty($request->keywords)){
            $keywords = $request ->keywords;
        }

        $ivList = $this -> inventoryVouchers -> getAllInventoryVoucherss($filters, $keywords,self::_Per_Page);
        return view('admins.views.inventory_vouchers.list', compact('title', 'ivList'));
    }

    public function getEdit(Request $request,$id = 0){
        $title = 'Edit inventory voucher information';
        if(!empty($id)){
            $ivDetail = $this->inventoryVouchers ->getEdit($id);
            if(!empty($ivDetail[0])){
                $request ->session()->put('iv_id', $id);
                $ivDetail = $ivDetail[0];
            }else{
                return redirect()->route('admin.inventory-vouchers.index')->with('msg', 'Inventory voucher does not exist!');
            }
        }else{
            return redirect()->route('admin.inventory-vouchers.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.inventory_vouchers.edit', compact('title', 'ivDetail'));
    }

    public function postEdit(InventoryVouchersRequest $request){
        $id = session('iv_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }

        $dataUpdate = [
            'iv_type' => $request->iv_type,
            'iv_status' => $request->iv_status,
            'iv_quantity' => $request->iv_quantity,
        ];
        $this->inventoryVouchers -> postEdit($dataUpdate, $id);
        return redirect()->route('admin.inventory-vouchers.index')->with('msg', 'Update inventory voucher information successfully!');
    }
}
