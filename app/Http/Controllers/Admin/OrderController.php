<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Admin\Order;
use App\Http\Requests\Admin\OrderRequest;

class OrderController extends Controller
{
    const _Per_Page = 7;
    public function __construct(){
        $this ->orders = new Order();
    }
    
    public function index(Request $request){
        $title = 'Order List';
        $filters = [];
        $keywords = null;

        if(!empty($request->status)){
            $status = $request -> status;
            if($status=='successful'){
                $status =0;
            }else{
                $status =1;
            }
            $filters [] = ['orders.order_status', '=', $status];
        }

        if(!empty($request->keywords)){
            $keywords = $request ->keywords;
        }

        $orderList = $this -> orders -> getAllOrders($filters, $keywords,self::_Per_Page);
        return view('admins.views.orders.list', compact('title', 'orderList'));
    }

    public function getEdit(Request $request,$id = 0){
        $title = 'Edit order information';
        if(!empty($id)){
            $orderDetail = $this->orders ->getEdit($id);
            if(!empty($orderDetail[0])){
                $request ->session()->put('order_id', $id);
                $orderDetail = $orderDetail[0];
            }else{
                return redirect()->route('admin.order.index')->with('msg', 'Order does not exist!');
            }
        }else{
            return redirect()->route('admin.order.index')->with('msg', 'Link does not exist!');
        }
        return view('admins.views.orders.edit', compact('title', 'orderDetail'));
    }

    public function postEdit(OrderRequest $request){
        $id = session('order_id');
        if(empty($id)){
            return back()->with ('msg', 'Link does not exist!');
        }

        $dataUpdate = [
            'order_status' => $request->order_status,
            'order_quantity' => $request->order_quantity,
        ];
        $this->orders -> postEdit($dataUpdate, $id);
        return redirect()->route('admin.order.index')->with('msg', 'Update order information successfully!');
    }

    public function delete($id =0){
        if(!empty($id)){
            $orderDetail =  $this ->orders ->getEdit($id);
            if(!empty($orderDetail[0])){
                $deleteOrder = $this ->orders->deleteOrder($id);
                if($deleteOrder){
                    $msg = 'Order removal successful!';
                }else{
                    $msg = 'You cannot remove the order at this time. Please try again later!';
                }
            }else{
                $msg ='Order does not exist!';
            }
        }else{
            $msg = 'Link does not exist!';
        }
        return redirect()->route('admin.order.index')->with('msg', $msg);
    }
}
