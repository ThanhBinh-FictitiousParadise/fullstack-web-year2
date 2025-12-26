<?php

namespace App\Http\Controllers\Ram;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ram;

class RamController extends Controller
{
    public function all() {
        $ram  = Ram ::where('isDeleted', 0)-> paginate(5);
        return view('admin.ram.ram', compact('ram'));
    }

    public function create() {
        return view('admin.ram.create');
    }

    public function store(Request $request) {
//        dd(1);
        $request ->validate([
            'ram_name' => 'required|max:50|string'
        ]);

        Ram::create([
            'ram_name' => $request->ram_name,
        ]);

        return redirect()->route('ram.all');
    }

    public function fix(int $id) {
        $ram = Ram::findOrFail($id);
        return view('admin.ram.fix',compact('ram'));
    }

    public function update(Request $request,int $id) {
        $request ->validate([
            'ram_name' => 'required|max:50|string',
        ]);

        Ram::findOrFail($id)->update([
            'ram_name' => $request->ram_name,
        ]);

        return redirect()-> route('ram.all');
    }

    public  function delete(int $id){
        $ram = Ram::findOrFail($id);
        $ram -> delete();

        return redirect() -> back() -> with('status','Ram deleted');
    }
}
