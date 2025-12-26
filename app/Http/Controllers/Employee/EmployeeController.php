<?php

namespace App\Http\Controllers\Employee;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\DB;
use App\Models\Admin;

class EmployeeController extends Controller
{
    public function all() {
        $employee  = Admin::where('isDeleted', 0)-> paginate(5);
        return view('admin.employee.employee',compact('employee'));
    }

    public function create()
    {
        return view('admin.employee.create');
    }

    public function store(Request $request){
        // Validate input data
        
        $validator = Validator::make($request->all(), [
            'admin_name' => 'required|max:255|string|unique:admins,admin_name',
            'phone_number' => 'required|digits:10|unique:admins,phone_number',
            'email' => 'required|unique:admins,email',
            'password' => 'required' // Thêm xác thực cho password nếu cần
        ],[
            'admin_name.required' => 'Không được để trống tên',
            'admin_name.max' => 'Không được quá 255 kí tự',
            'admin_name.unique' => 'Name already taken',
            'phone_number.required' => 'Làm ơn hãy điền số',
            'phone_number.digits' => 'Số điện thoại phải có đúng 10 số',
            'phone_number.unique' => 'Phone number already exists',
            'email.required' => 'Không được để trống email',
            'email.unique' => 'Email already taken',
            'password.required' => 'Không được để trống mật khẩu',
        ]);
    
        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->route('employee.create')->withErrors($validator)->withInput();
        }
        // Handle image upload
        $filename = null;
        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $extension;
            $path = 'dist/img/';
            $file->move($path, $filename);
            $admin = new Admin();
            $admin->image = $filename;
        }
    
        // Create and save new employee
        $admin = new Admin();
        $admin->admin_name = $request->admin_name;
        $admin->image = $filename ? $path . $filename : null;
        $admin->phone_number = $request->phone_number;
        $admin->email = $request->email;
        $admin->level = 1;
        $admin->password = bcrypt($request->password); // Mã hóa mật khẩu trước khi lưu
        $admin->save();
    
        // Redirect to all employees page
        return redirect()->route('employee.all');
    }
    
}