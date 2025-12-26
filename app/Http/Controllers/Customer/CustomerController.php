<?php

namespace App\Http\Controllers\Customer;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use App\Models\Order;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class CustomerController extends Controller
{
    public function all() {
        $customer  = customer::where('isDeleted', 0)-> paginate(5);
        return view('admin.customer.customer',compact('customer'));
    }

    public function index(Request $request)
    {
        parent::get_data();

        if (Auth::guard('customers')->check()) {
            $uid = Auth::guard('customers')->user()->id;
            $customer = Customer::findOrFail($uid);
            $request->session()->put('customer_key', $customer);
            return view('customer.index');
        } else {
            return view('customer.index');
        }
    }

    public function showContact() {
        parent::get_data();
        return view('customer.contact');
    }

    public function aboutUs() {
        parent::get_data();
        return view('customer.about-us');
    }

    public function fix()
    {
        parent::get_data();
        $uid = Auth::guard('customers')->user()->id;
        $customer = Customer::findOrFail($uid);
        $order = Order::query()
            ->where('customer_id','=',$uid)
            ->get();
        $statusNames = [
        1 => 'Pending',
        2 => 'Processing',
        3 => 'Shipped',
        4 => 'Delivered',
        5 => 'Completed',
        0 => 'Cancelled',
    ];
        return view('customer.account', compact('customer','order','statusNames'));
    }

    public function update(Request $request) {
        $id = $request->id;
        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $path = 'dist/img/customer/';
            $file->move($path, $filename);
            
            Customer::findOrFail($id)->update([
                'image' => $path . $filename,
            ]);
        }

        Customer::findOrFail($id)->update([
            'customer_name' => $request->customer_name,
            'phone_number' => $request->phone_number,
            'address' => $request->address,
            'email' => $request->email,
        ]);

        return redirect()-> route('account.fix');
    }
}
