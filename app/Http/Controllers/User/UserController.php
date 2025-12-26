<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\User;

class UserController extends Controller
{
    public function all(){
        $admin = User::all();
        $data['admin'] = $admin;
        return view('admin\admin',$data);

    }
    public function show($id){
        $user = User::find($id);
        $data ['user'] = $user;
        return view('user-detail',$data);
    }

    public function create() {
        return view('admin\create');
    }

    public function store(Request $request) {
        $request ->validate([
            'admin_name' => 'required|max:255|string',
            'phone_number' => 'required|max:10|int',
            'level' => 'required|max:11|int',
            'email' => 'required|max:255|string',
            'password' => 'required|max:255|string'
        ]);

        User::create([
            'admin_name' => $request->Admin_name,
        ]);

        return redirect('admin/create_admin')->with('status','Admin Created');
    }
}
