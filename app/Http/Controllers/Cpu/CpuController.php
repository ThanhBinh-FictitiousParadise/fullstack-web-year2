<?php

namespace App\Http\Controllers\Cpu;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Cpu;

class CpuController extends Controller
{
    public function all() {
        $cpu  = Cpu ::where('isDeleted', 0)-> paginate(5);
        return view('admin.cpu.cpu', compact('cpu'));
    }

    public function create() {
        return view('admin.cpu.create');
    }

    public function store(Request $request) {
//        dd(1);
        $request ->validate([
            'cpu_name' => 'required|max:50|string'
        ]);

        Cpu::create([
            'cpu_name' => $request->cpu_name,
        ]);

        return redirect()-> route('cpu.all');
    }

    public function fix(int $id) {
        $cpu = Cpu::findOrFail($id);
        return view('admin.cpu.fix',compact('cpu'));
    }

    public function update(Request $request,int $id) {
        $request ->validate([
            'cpu_name' => 'required|max:50|string',
        ]);

        Cpu::findOrFail($id)->update([
            'cpu_name' => $request->cpu_name,
        ]);

        return redirect()-> route('cpu.all');
    }

    public  function delete(int $id){
        $cpu = Cpu::findOrFail($id);
        $cpu -> delete();

        return redirect() -> back() -> with('status','Cpu deleted');
    }
}
