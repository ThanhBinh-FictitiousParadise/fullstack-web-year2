<?php

namespace App\Http\Controllers\Customer\Auth;

use App\Http\Controllers\Controller;
use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;

class LoginController extends Controller
{
    public function show(){
        if (Auth::guard('customers')->check()) {
            return Redirect('/');
        } else {
            return view("customer.auth.login");
        }
    }

    public function authenticate(Request $request){

        $validator = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('customers')->attempt($validator)) {
            $request->session()->regenerate();
            $uid = Auth::guard('customers')->user()->id;
            $customer = Customer::findOrFail($uid);
            $request->session()->put('customer_key', $customer);
            return redirect()->intended('/');
        } else {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request) {
        Auth::guard('customers')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return Redirect('/');
    }

}
