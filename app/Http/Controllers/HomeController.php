<?php

namespace App\Http\Controllers;

use App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Imei;
use Illuminate\Support\Facades\DB;

class HomeController extends Controller
{
    public function search(Request $request)
    {
        $keywords = $request->input('keywords_submit');
        parent::get_data();
        // Sử dụng Eloquent để truy vấn sản phẩm theo tên
        $products = Product::where('product_name', 'like', '%' . $keywords . '%')->get();

        // Trả về view với kết quả tìm kiếm
        return view('customer.search', compact('products'));
    }

    public function showSearchForm()
    {parent::get_data();
        return view('customer.search-imei');
    }

    public function search_imei(Request $request)
    {
        parent::get_data();
        $imei = $request->input('imei_submit');
        
        // Tìm kiếm IMEI trong bảng imeis
        $imeiRecord = IMEI::where('imei_number', $imei)->first();
        
        $product = null;

        if ($imeiRecord) {
            // Nếu tìm thấy IMEI, lấy thông tin sản phẩm tương ứng
            $product = Product::find($imeiRecord->product_id);
        }

        return view('customer.search-imei', compact('product'));
    }
}
