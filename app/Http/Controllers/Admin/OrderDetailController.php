<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Admin\OrderDetail;

use DB;

class OrderDetailController extends Controller
{
    //

    public function __construct(){
        $this ->order_detail = new OrderDetail();
    }

    public function index(Request $request,$id = 0){
        $title = 'Order Detail';
        if(!empty($id)){
            $orderDetailList = $this->order_detail ->getDetailOrders($id);
        }else{
            return redirect()->route('admin.order.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.orders.orderDetails.list', compact('title', 'orderDetailList'));
    }

    public function getEdit(Request $request,$id = 0){
        $title = 'Edit order detail information';
        if(!empty($id)){
            $odDetail = $this->order_detail ->getEdit($id);
            if(!empty($odDetail[0])){
                $request ->session()->put('od_id', $id);
                $odDetail = $odDetail[0];
                //dd($odDetail);
            }else{
                return redirect()->route('admin.order.order-detail.index')->with('msg', 'Order detail does not exist!');
            }
        }else{
            return redirect()->route('admin.order.order-detail.index')->with('msg', 'Link does not exist!');
        }

        return view('admins.views.orders.orderDetails.edit', compact('title', 'odDetail'));
    }

    public function postEdit(Request $request){
        $id = session('od_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }

        $quanlity = 0;
        $total = 0;

        $edit_order_detai = DB::select('SELECT * FROM order_detail WHERE od_id = ?', [$id]);
        $temp = $edit_order_detai[0]-> order_id;

        $order = DB::table('order_detail')
        ->select('order_detail.*','products.pro_price')
        ->join('products', 'order_detail.pro_id', '=', 'products.pro_id')
        ->where('order_id', '=' ,$temp)
        ->get()
        ->toArray();

        foreach ($order as $update){
            $quanlity += $update -> od_quantity;
            $total += ($update -> od_quantity * $update -> pro_price);
        }

        $dataUpdateOrderDetail = [
            'od_quantity' => $request->od_quantity,
            'od_total' => $request->od_quantity*$request->pro_price
        ];

        $dataUpdateOrder = [
            'order_quantity' => $quanlity,
            'order_total' => $total
        ];

        //dd($dataUpdateOrder);
        $this->order_detail -> postEditOrder($dataUpdateOrder);
        //$this->order_detail -> postEditOrderDetail($dataUpdateOrderDetail, $id);
        //$this->order_detail -> postEditOrder($dataUpdateOrder);
        

        //return redirect()->route('admin.order.index')->with('msg', 'Update order information successfully!');
    }

    public function delete($id = 0){
        if(!empty($id)){
            $odDetail =  $this ->order_detail ->getEdit($id);
            if(!empty($odDetail[0])){
                $deleteOD = $this ->order_detail->deleteOrderDetail($id);
                if($deleteOD){
                    $msg = 'Order detail removal successful!';
                }else{
                    $msg = 'You cannot remove the order detail at this time. Please try again later!';
                }
            }else{
                $msg ='Order detail does not exist!';
            }
        }else{
            $msg = 'Link does not exist!';
        }
        return redirect()->route('admin.order.index')->with('msg', $msg);
    }
}
