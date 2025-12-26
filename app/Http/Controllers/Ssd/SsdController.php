<?php

namespace App\Http\Controllers\Ssd;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Ssd;

class SsdController extends Controller
{
    public function all()
{
    $ssd = Ssd::where('isDeleted', 0)-> paginate(5);
    return view('admin.ssd.ssd', compact('ssd'));
}

    public function create() {
        return view('admin.ssd.create');
    }

    public function store(Request $request) {
//        dd(1);
        $request ->validate([
            'ssd_name' => 'required|max:50|string'
        ]);

        Ssd::create([
            'ssd_name' => $request->ssd_name,
        ]);

        return redirect()->route('ssd.all');
    }

    public function fix(int $id) {
        $ssd = Ssd::findOrFail($id);
        return view('admin.ssd.fix',compact('ssd'));
    }

    public function update(Request $request,int $id) {
        $request ->validate([
            'ssd_name' => 'required|max:50|string',
        ]);

        Ssd::findOrFail($id)->update([
            'ssd_name' => $request->ssd_name,
        ]);

        return redirect()-> route('ssd.all');
    }

    public  function delete(int $id){
        $ssd = Ssd::findOrFail($id);
        $ssd -> delete();

        return redirect() -> back() -> with('status','Ssd deleted');
    }
}
