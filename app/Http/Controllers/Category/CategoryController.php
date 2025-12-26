<?php

namespace App\Http\Controllers\Category;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;

class CategoryController extends Controller
{
    public function all() {
        $category  = Category::where('isDeleted', 0)-> paginate(5);
        return view('admin.category.category', compact('category'));
    }

    public function create() {
        return view('admin.category.create');
    }

    public function store(Request $request) {
//        dd(1);
        $request ->validate([
            'category_name' => 'required|max:50|string'
        ]);

        Category::create([
            'category_name' => $request->category_name,
        ]);

        return redirect()-> route('category.all');
    }

    public function fix(int $id) {
        $category = Category::findOrFail($id);
        return view('admin.category.fix',compact('category'));
    }

    public function update(Request $request,int $id) {
        $request ->validate([
            'category_name' => 'required|max:50|string',
        ]);

        Category::findOrFail($id)->update([
            'category_name' => $request->category_name,
        ]);

        return redirect()-> route('category.all');
    }

    public  function delete(int $id){
        $category = Category::findOrFail($id);
        $category -> delete();

        return redirect() -> back() -> with('status','Category deleted');
    }
}
