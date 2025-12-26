<?php

namespace App\Http\Controllers\Payment;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Payment_method;
use Illuminate\Support\Facades\DB;
use Illuminate\Validation\Rule;

class PaymentController extends Controller
{


    public function all()
    {
        $payment  = Payment_method::where('isDeleted', 0)->paginate(5);
        return view('admin.payment.payment', compact('payment'));
    }

    public function create()
    {
        return view('admin.payment.create');
    }

    public function store(Request $request)
    {
        //        dd(1);
        $request->validate([
            'method_name' => 'required|max:50|string'
        ]);

        Payment_method::create([
            'method_name' => $request->method_name,
        ]);

        return redirect()->route('payment.all');
    }

    public function fix(int $id)
    {
        $payment = Payment_method::findOrFail($id);
        return view('admin.payment.fix', compact('payment'));
    }

    public function update(Request $request, int $id)
    {
        $request->validate([
            'method_name' => 'required|max:50|string',
        ]);

        Payment_method::findOrFail($id)->update([
            'method_name' => $request->method_name,
        ]);

        return redirect()->route('payment.all');
    }

    public  function delete(int $id)
    {
        $payment = Payment_method::findOrFail($id);
        $payment->delete();
        return redirect()->back()->with('status', 'Payment deleted');
    }

    public function add()
    {
        $payment  = Payment_method::where('isDeleted', 0);
        return view('customer.userpayment', compact('payment'));
    }
}
