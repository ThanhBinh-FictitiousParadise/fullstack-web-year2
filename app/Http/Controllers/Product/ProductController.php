<?php

namespace App\Http\Controllers\Product;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Order;
use App\Models\Order_detail;
use Illuminate\Support\Facades\Auth;
use App\Models\Rating;
use Illuminate\Support\Facades\Validator;
use App\Models\Imei;
use Illuminate\Support\Facades\DB;

class ProductController extends Controller
{
    public function all()
    {
        $product = DB::table('products')
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
            ->where('products.isDeleted', 0)->paginate(5);

        $data['product'] = $product;
        return view('admin.product.product', $data);
    }

    public function create()
    {
        $category = DB::table('categories')->get();
        $cpu = DB::table('cpus')->get();
        $ram = DB::table('rams')->get();
        $ssd = DB::table('ssds')->get();
        $screen = DB::table('screens')->get();
        return view('admin.product.create', compact('category', 'cpu', 'ram', 'ssd', 'screen'));
    }

    public function store(Request $request)
    {
        $request->validate([

        ]);

        $validator = Validator::make($request->all(), [
            'product_name' => 'required|max:50|string|unique:products,product_name',
            'selling_price' => 'required|integer',
            'quantity' => 'required|integer',
            'category_id' => 'required',
            'cpu_id' => 'required',
            'ram_id' => 'required',
            'ssd_id' => 'required',
            'screen_id' => 'required',
            'feature' => 'required|int',
            'pro_desc' => 'string|nullable',
        ], [
            'product_name.required' => 'Không được để trống tên',
            'product_name.max' => 'Name too long, under 50 words',
            'product_name.unique' => 'Name already taken'
        ]);

        // Check for validation errors
        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();

            $filename = time() . '.' . $extension;
            $path = 'dist/img/product/';
            $file->move($path, $filename);
        }

        Product::create([
            'product_name' => $request->product_name,
            'image' => $filename,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'cpu_id' => $request->cpu_id,
            'ram_id' => $request->ram_id,
            'ssd_id' => $request->ssd_id,
            'screen_id' => $request->screen_id,
            'feature' => $request->feature,
            'pro_desc' => $request->pro_desc,
        ]);

        return redirect()->route('product.all');
    }

    public function fix(int $id)
    {
        $category = DB::table('categories')->get();
        $cpu = DB::table('cpus')->get();
        $ram = DB::table('rams')->get();
        $ssd = DB::table('ssds')->get();
        $screen = DB::table('screens')->get();
        $product = Product::findOrFail($id);
        return view('admin.product.fix', compact('category', 'cpu', 'ram', 'ssd', 'screen', 'product'));
    }

    public function update(Request $request)
    {
        $id = $request->id;
        $request->validate([
            'product_name' => 'required',
            'selling_price' => 'required|int',
            'quantity' => 'required|int',
            'category_id' => 'required',
            'cpu_id' => 'required',
            'ram_id' => 'required',
            'ssd_id' => 'required',
            'screen_id' => 'required',
            'feature' => 'required|int',
            'pro_desc' => 'nullable',
        ]);

        if ($request->has('image')) {
            $file = $request->file('image');
            $extension = $file->getClientOriginalName();
            $filename = time() . '.' . $extension;
            $path = 'dist/img/product/';
            $file->move($path, $filename);
            Product::findOrFail($id)->update([
                'image' => $path . $filename,
            ]);
        }

        Product::findOrFail($id)->update([
            'product_name' => $request->product_name,
            'selling_price' => $request->selling_price,
            'quantity' => $request->quantity,
            'category_id' => $request->category_id,
            'cpu_id' => $request->cpu_id,
            'ram_id' => $request->ram_id,
            'ssd_id' => $request->ssd_id,
            'screen_id' => $request->screen_id,
            'feature' => $request->feature,
            'pro_desc' => $request->pro_desc,
        ]);

        return redirect()->route('product.all');
    }

    public function delete(int $id)
    {
        DB::table("products")
            ->where("id", $id)
            ->update(['isDeleted' => 1]);
        return redirect()->back()->with('status', 'Product deleted');
    }

    public function detail($id)
    {
        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
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
            ->find($id);

        $data['product'] = $product;
        return view('admin.product.detail', $data, compact('product'));
    }

    public function product_detail($id)
    {
        parent::get_data();

        $product = Product::join('categories', 'categories.id', '=', 'products.category_id')
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
            ->find($id);

        $data['product'] = $product;
        return view('customer.product.detail', $data, compact('product'));
    }

    public function full()
    {
        parent::get_data();
        return view('customer.product-all');
    }

    public function left_sidebar()
    {
        parent::get_data();
        return view('customer.product-left-sidebar');
    }

    public function savecart()
    {
        parent::get_data();
        return view('customer.cart.cart');
    }

    public function addtocart($id)
    {
        $product = Product::findOrFail($id);
        $pqt = $product->quantity;
        if ($pqt <= 0) {
            return redirect()->back()->with('fail', 'we dont have enough of this product to provide for you');
        } else {
            $cart = session()->get('cart', []);
            if (isset($cart[$id])) {
                $cart[$id]['quantity']++;
            } else {
                $cart[$id] = [
                    "id" => $id,
                    "name" => $product->product_name,
                    "quantity" => 1,
                    "price" => $product->selling_price,
                    "image" => $product->image,
                ];
            }
            session()->put('cart', $cart);
            return redirect()->back()->with('success', 'Product has been added to cart');
        }
    }

    public function updatecart(Request $request)
    {
        if ($request->id && $request->quantity) {

            $pid = $request->id;
            $quantity = $request->quantity;

            $product = Product::findOrFail($pid);
            $pqt = $product->quantity;
            if ($quantity > $pqt) {
                session()->flash('fail', 'we dont have enough of this product to provide for you');
            } else {
                $cart = session()->get('cart');
                $cart[$pid]["quantity"] = $quantity;
                if ($cart[$pid]["quantity"] <= 0) {
                    $cart[$pid]["quantity"] = 1;
                }
                session()->put('cart', $cart);
                session()->flash('success', 'Cart successfully updated!');
            }
        }
    }

    public function deletecart(Request $request)
    {
        if ($request->id) {
            $cart = session()->get('cart');
            if (isset($cart[$request->id])) {
                unset($cart[$request->id]);
                session()->put('cart', $cart);
            }
            session()->flash('success', 'Product successfully deleted');
        }
    }

    public function generateIMEI($product_id)
    {
        // Tạo số IMEI ngẫu nhiên
        $imei_number = mt_rand(100000000, 999999999);

        // Lưu số IMEI vào bảng imeis
        $imei = new IMEI();
        $imei->product_id = $product_id;
        $imei->imei_number = $imei_number;
        $imei->save();
    }

    public function checkout(Request $request)
    {
        $cart = session()->get('cart');
        $total = $request->total;

        if (isset($cart)) {
            $uid = Auth::guard('customers')->user()->id;
            $new = new Order();
            $new->customer_id = $uid;
            $new->isDeleted = 0;
            $new->receiver_address = $request->receiver_address;
            $new->receiver_name = $request->receiver_name;
            $new->receiver_phone = $request->receiver_phone;
            $new->receiver_mail = $request->receiver_mail;
            $new->payment_id = $request->payment_id;
            $new->total_amount = $total;
            $new->save();
            $order_id = $new->id; // Sử dụng phương thức id() để lấy id của đơn hàng vừa tạo

            foreach ($cart as $data) {
                $newDetail = new Order_detail();
                $newDetail->order_id = $order_id;
                $newDetail->product_id = $data['id'];
                $newDetail->quantity = $data['quantity'];
                $newDetail->save();

                // Tạo số lượng IMEI tương ứng với số lượng sản phẩm
                for ($i = 0; $i < $data['quantity']; $i++) {
                    $this->generateIMEI($data['id']);
                }
            }

            session()->forget('cart');
        }
        parent::get_data();
        return view('customer.thankyou');
    }

    public function showPay()
    {
        parent::get_data();

        return view('customer.payment.payment');
    }

    public function payCheckout()
    {
        parent::get_data();
        return view('customer.thankyou');
    }
}
