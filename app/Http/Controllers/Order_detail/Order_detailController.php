<?php

namespace App\Http\Controllers\Order_detail;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Support\Facades\DB;

class Order_detailController extends Controller
{
    public function show() 
    {
        $order_details = DB::table('order_details')
            ->join('orders', 'orders.id', '=', 'order_detail.order_id')
            ->join('products', 'products.id', '=', 'order_detail.product_id')
            ->select(
                'order_details.*',
                'orders.order_status as order_name',
                'products.product_name as product_name',
            )
            ->get();
        $data['order_details'] = $order_details;
        return view('customer.cart.cart',$data);
    }

}
