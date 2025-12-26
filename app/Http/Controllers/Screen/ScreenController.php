<?php

namespace App\Http\Controllers\Screen;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Screen;

class ScreenController extends Controller
{
    public function all() {
        $screen  = Screen ::where('isDeleted', 0)-> paginate(5);
        return view('admin.screen.screen',compact('screen'));
    }

    public function create() {
        return view('admin.screen.create');
    }

    public function store(Request $request) {
//        dd(1);
        $request ->validate([
            'screen_name' => 'required|max:50|string'
        ]);

        Screen::create([
            'screen_name' => $request->screen_name,
        ]);

        return redirect()-> route('screen.all');
    }

    public function fix(int $id) {
        $screen = Screen::findOrFail($id);
        return view('admin.screen.fix',compact('screen'));
    }

    public function update(Request $request,int $id) {
        $request ->validate([
            'screen_name' => 'required|max:50|string',
        ]);

        Screen::findOrFail($id)->update([
            'screen_name' => $request->screen_name,
        ]);

        return redirect()-> route('screen.all');
    }

    public  function delete(int $id){
        $screen = Screen::findOrFail($id);
        $screen -> delete();

        return redirect() -> back() -> with('status','Screen deleted');
    }
}
