<?php

namespace App\Http\Controllers\Admin\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use App\Models\Admin;
use App\Models\Customer;
use Illuminate\Support\Facades\DB;
use App\Models\Order;
use App\Models\Order_detail;
use App\Models\Product;
use Carbon\Carbon;
use Illuminate\Http\JsonResponse;

class AdminLoginController extends Controller
{
    public function show()
    {
        if (Auth::guard('admins')->check()) {
            return Redirect('/admin');
        } else {
            return view('admin.auth.login');
        }
    }

    private function ordersOfTheDay($startOfToday)
    {
        $ordering = Order::where([
            ['order_date', '>=', $startOfToday],
            ['isDeleted', '==', 0]
        ])
            ->orderBy('status')
            ->get();
        return $ordering;
    }

    private function userRegistation()
    {
        $totalCustomer = 0;
        $customerGet = Customer::where([
            ['isDeleted', '==', 0],
        ])->get();

        foreach ($customerGet as $customerGet) {
            $totalCustomer++;
        }
        return $totalCustomer;
    }

    private function latestOrders()
    {
        $latestOrders = Order::query()
            ->with('customer')
            ->where('orders.isDeleted', 0)
            ->limit(5)
            ->orderBy('order_date', 'desc')
            ->get();
        return $latestOrders;
    }

    private function bestSelling()
    {
        $mostSold = Order_detail::select('product_id', DB::raw('SUM(quantity) as `count`'))
            ->with('products')
            ->join('orders', 'order_detail.order_id', '=', 'orders.id')
            ->where('orders.status', '=', '5')
            ->groupBy('product_id')
            ->orderBy('count', 'DESC')
            ->limit(5)
            ->get();

        return $mostSold;
    }

    private function bestSellingByWeek()
    {
        $mostSoldByWeek = Order_detail::select('product_id', DB::raw('SUM(quantity) as `count`'))
            ->with('products')
            ->join('orders', 'order_detail.order_id', '=', 'orders.id')
            ->where('orders.status', '=', '5')
            ->whereBetween('orders.order_date', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])
            ->groupBy('product_id')
            ->orderBy('count', 'DESC')
            ->limit(5)
            ->get();

        return $mostSoldByWeek;
    }

    private function bestSellingByMonth()
    {
        $mostSoldByMonth = Order_detail::select('product_id', DB::raw('SUM(quantity) as `count`'))
            ->with('products')
            ->join('orders', 'order_detail.order_id', '=', 'orders.id')
            ->where('orders.status', '=', '5')
            ->whereBetween('orders.order_date', [
                Carbon::now()->startOfMonth(),
                Carbon::now()->endOfMonth(),
            ])
            ->groupBy('product_id')
            ->orderBy('count', 'DESC')
            ->limit(5)
            ->get();

        return $mostSoldByMonth;
    }

    private function bestSellingByYear()
    {
        $mostSoldByYear = Order_detail::select('product_id', DB::raw('SUM(quantity) as `count`'))
            ->with('products')
            ->join('orders', 'order_detail.order_id', '=', 'orders.id')
            ->where('orders.status', '=', '5')
            ->whereBetween('orders.order_date', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->groupBy('product_id')
            ->orderBy('count', 'DESC')
            ->limit(5)
            ->get();

        return $mostSoldByYear;
    }

    private function worstSelling()
    {
        $combinedProducts = Product::leftJoin('order_detail', 'products.id', '=', 'order_detail.product_id')
            ->select('products.*', DB::raw('COALESCE(SUM(order_detail.quantity), 0) as total_quantity'))
            ->groupBy('products.id', 'products.product_name')
            ->orderBy('total_quantity')
            ->take(5)
            ->get();

        return $combinedProducts;
    }

    private function outOfStockProducts()
    {
        $lowSupply = Product::query()
            ->where('quantity', '<=', 30)
            ->get();

        return $lowSupply;
    }

    public function getWeeklyRevenue()
    {
        // Get revenue by day of the week
        $revenueByDayOfWeek = Order::query()
            ->select(DB::raw('DAYOFWEEK(order_date) as day'), DB::raw('SUM(total_amount) as total'))
            ->whereBetween('order_date', [
                Carbon::now()->startOfWeek(),
                Carbon::now()->endOfWeek(),
            ])
            ->where('status','=','5')
            ->groupBy('day')
            ->get();

        // Initialize an array with all days of the week
        $allDays = range(1, 7);

        // Create an associative array to store weekly revenue
        $weeklyRevenue = [];
        foreach ($revenueByDayOfWeek as $item) {
            $weeklyRevenue[$item->day] = (float) $item->total;
        }

        // Fill in missing days with 0 total_amount
        foreach ($allDays as $day) {
            if (!isset($weeklyRevenue[$day])) {
                $weeklyRevenue[$day] = 0;
            }
        }

        return $weeklyRevenue;
    }

    public function getMonthlyRevenue()
    {
        // Get revenue by month
        $revenueByMonth = Order::query()
            ->select(DB::raw('MONTH(order_date) as month'), DB::raw('SUM(total_amount) as total'))
            ->whereBetween('order_date', [
                Carbon::now()->startOfYear(),
                Carbon::now()->endOfYear(),
            ])
            ->where('status','=','5')
            ->groupBy('month')
            ->get();

        // Initialize an array with all months
        $allMonths = range(1, 12);

        // Create an associative array to store monthly revenue
        $monthlyRevenue = [];
        foreach ($revenueByMonth as $item) {
            $monthlyRevenue[$item->month] = (float) $item->total;
        }

        // Fill in missing months with 0 total_amount
        foreach ($allMonths as $month) {
            if (!isset($monthlyRevenue[$month])) {
                $monthlyRevenue[$month] = 0;
            }
        }

        return $monthlyRevenue;
    }

    public function calculateYearlyRevenue()
    {
        $currentYear = Carbon::now()->year;
        $lastYear = $currentYear - 1;

        $revenueThisYear = Order::whereYear('order_date', $currentYear)
            ->where('status','=','5')
            ->sum('total_amount');

        $revenueLastYear = Order::whereYear('order_date', $lastYear)
            ->where('status','=','5')
            ->sum('total_amount');

        $yearlyComparison = [
            '1' => $revenueLastYear,
            '2' => $revenueThisYear,
        ];

        // Now $yearlyComparison contains the revenue for this year and last year
        // You can further process or display this data as needed

        return $yearlyComparison;
    }

    public function showDash()
    {
        $today = now();
        $startOfToday = $today->startOfDay();

        // getting orders of the day
        $todaysOrder = $this->ordersOfTheDay($startOfToday);

        // getting total user registations
        $totalCustomer = $this->userRegistation();

        //Getting 5 latest orders
        $latestOrders = $this->latestOrders();

        //Getting 5 best selling products
        $mostSold = $this->bestSelling();
        $mostSoldThisWeek = $this->bestSellingByWeek();
        $mostSoldThisMonth = $this->bestSellingByMonth();
        $mostSoldThisYear = $this->bestSellingByYear();

        //Getting 5 worst selling products
        $worstSold = $this->worstSelling();

        //Getting low stock products
        $lowSupply = $this->outOfStockProducts();

        //Getting weekly revenue
        $weeklyRevenue = $this->getWeeklyRevenue();

        //Getting monthly revenue
        $monthlyRevenue = $this->getMonthlyRevenue();

        //Getting yearly revenue
        $yearlyRevenue = $this->calculateYearlyRevenue();

        return view('admin.dashboard', compact(
            'todaysOrder',
            'totalCustomer',
            'latestOrders',
            'mostSold',
            'worstSold',
            'lowSupply',
            'weeklyRevenue',
            'yearlyRevenue',
            'monthlyRevenue',
            'mostSoldThisWeek',
            'mostSoldThisMonth',
            'mostSoldThisYear'
        ));
    }

    public function authenticate(Request $request)
    {
        $adminLog = $request->validate([
            'email' => ['required', 'email'],
            'password' => ['required'],
        ]);

        if (Auth::guard('admins')->attempt($adminLog)) {
            $request->session()->regenerate();
            $uid = Auth::guard('admins')->user()->id;
            $admin = Admin::findOrFail($uid);
            $request->session()->put('admin_key', $admin);
            return redirect()->intended('/admin');
        } else {
            return back()->withErrors([
                'error' => 'The provided credentials do not match our records.',
            ])->onlyInput('email');
        }
    }

    public function logout(Request $request)
    {
        Auth::guard('admins')->logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('admin.login');
    }
}
