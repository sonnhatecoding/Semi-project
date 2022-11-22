<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\IVDetail;

class IVDetailController extends Controller
{
    //

    public function __construct(){
        $this ->ivDetail = new IVDetail();
    }

    public function index(Request $request,$id = 0){
        $title = 'Inventory voucher Detail';
        if(!empty($id)){
            $ivDetailList = $this->ivDetail ->getDetailInventoryVouchers($id);
        }else{
            return redirect()->route('admin.inventory-vouchers.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.inventory_vouchers.inventory_vouchers_detail.list', compact('title', 'ivDetailList'));
    }

    public function getEdit(Request $request,$id = 0){
        $title = 'Edit Inventory Vouchers detail information';
        if(!empty($id)){
            $ivDetail = $this->ivDetail ->getEdit($id);
            if(!empty($ivDetail[0])){
                $request ->session()->put('ivd_id', $id);
                $ivDetail = $ivDetail[0];
            }else{
                return redirect()->route('admin.order.order-detail.index')->with('msg', 'Inventory Vouchers detail does not exist!');
            }
        }else{
            return redirect()->route('admin.order.order-detail.index')->with('msg', 'Link does not exist!');
        }

        return view('admins.views.inventory_vouchers.inventory_vouchers_detail.edit', compact('title', 'ivDetail'));
    }

    public function postEdit(Request $request){
        $id = session('ivd_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }
    
        $dataUpdateIvDetail = [
            'iv_quantity' => $request->iv_quantity,
            'iv_price' => $request->iv_price,
            'iv_total' => $request->iv_quantity*$request->iv_price
        ];

        $this->ivDetail -> postEditIvDetail($dataUpdateIvDetail, $id);
        
        return redirect()->route('admin.inventory-vouchers.index')->with('msg', 'Update Inventory Vouchers detail information successfully!');
    }

    public function delete($id = 0){
        if(!empty($id)){
            $ivDetail =  $this ->ivDetail ->getEdit($id);
            if(!empty($ivDetail[0])){
                $deleteIvDetail = $this ->ivDetail->deleteIvDetail($id);
                if($deleteIvDetail){
                    $msg = 'Inventory Vouchers detail removal successful!';
                }else{
                    $msg = 'You cannot remove the Inventory Vouchers detail at this time. Please try again later!';
                }
            }else{
                $msg ='Inventory Vouchers detail does not exist!';
            }
        }else{
            $msg = 'Link does not exist!';
        }
        return redirect()->route('admin.inventory-vouchers.index')->with('msg', $msg);
    }
}
