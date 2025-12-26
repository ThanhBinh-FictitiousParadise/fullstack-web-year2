<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;
    
    public function get_data() {
        $category = DB::table('categories')->where('isDeleted', '0')->orderBy('id', 'desc')->get();
        $products = DB::table('products')
        ->join('categories', 'categories.id', '=', 'products.category_id')
        ->join('cpus', 'cpus.id', '=', 'products.cpu_id')
        ->join('rams', 'rams.id', '=', 'products.ram_id')
        ->join('ssds', 'ssds.id', '=', 'products.ssd_id')
        ->join('screens', 'screens.id', '=', 'products.screen_id')
        ->select(
            'products.*',
            'categories.category_name as category_name',
            'cpus.cpu_name as cpu_name',
            'rams.ram_name as ram_name',
            'ssds.ssd_name as ssd_name',
            'screens.screen_name as screen_name'
        )
        ->where('products.isDeleted', 0) -> paginate(12);

        // View share global
        view()->share('products', $products);
        view()->share('category', $category);
    }
}
