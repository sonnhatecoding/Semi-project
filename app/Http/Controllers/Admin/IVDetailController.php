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
}
