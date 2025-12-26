<?php

namespace App\Http\Controllers\Customer\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Customer;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class RegisterController extends Controller
{
    public function show(){
        return view('customer.auth.register');
    }

    public function store(Request $request){
        $validator = Validator::make($request->all(), [
            'Customer_name' => 'required|max:255|string',
            'phone_number' => 'required|max:10|min:10',
            'address' => 'required',
            'email' => 'required|unique:customers,email',
            'password' => ['required', 'confirmed', 'min:8'],
        ],[
            'Customer_name.required' => 'Không được để trống tên',
            'Customer_name.max' => 'Không được quá 255 kí tự',
            'phone_number.required' => 'Làm ơn hãy điền vào',
            'phone_number.max' => 'Không được quá 10 số',
            'phone_number.min' => 'Không được ít hơn 10 số',
            'email.required' => 'Không được để trống email',
            'password.required' => 'PLease enter password',
            'password.min' => 'Password must be at least 8 characters',
            'password.confirmed' => 'Password confirmation does not match!'
        ]);

        if($validator -> fails()) {
            return redirect() -> route('register.showData') -> withErrors($validator) -> withInput();
        }
        
        $customer = new Customer();
        $customer -> customer_name = $request -> Customer_name;
        $customer -> phone_number = $request -> phone_number;
        $customer -> email = $request -> email;
        $customer -> address = $request -> address;
        $customer -> password = $request -> password;
        $customer ->save();
        return redirect::to('/login');
    }
}
