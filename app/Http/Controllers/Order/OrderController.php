<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Product;
use App\Models\Order_detail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class OrderController extends Controller
{
    public function all()
    {
        $orders = DB::table('orders')
            ->join('customers', 'customers.id', '=', 'orders.customer_id')
            ->select(
                'orders.*',
                'customers.customer_name as customer_name',
            )
            ->where('orders.isDeleted', 0)->paginate(4);

            $data['orders'] = $orders;
        return View('admin.order.order', $data);
    }

    public function fix(int $id)
    {
        $orders = Order_detail::query()
            ->with('products')
            ->with('orders')
            ->where('order_id', $id)
            ->get();
        
        return view('admin.order.fix', compact('orders'));
    }

    public function update(Request $request, int $id)
    {
        Order::findOrFail($id)->update(['status' => $request->order_status]);
        
        return redirect()->back();
    }
    
    public function order_detail(int $id)
    {
        parent::get_data();
        $orders = Order_detail::query()
            ->with('products')
            ->with('orders')
            ->where('order_id', $id)
            ->get();
        
        return view('customer.order-detail', compact('orders'));
    }

    public function cancel_order(Request $request) {
        $oid = $request->order_id;
        $checkOrder = Order::findOrFail($oid);
        if($checkOrder->status === 1) {
            $checkOrder->update([
                'status' => 0,
            ]);
            return redirect()->back()->with('success','Order cancelled!');
        }else {
            return redirect()->back()->with('fail','You can only cancel order when pending');
        }
    }
}
