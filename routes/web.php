<?php

use App\Http\Controllers\Admin\Auth\AdminLoginController;
use App\Http\Controllers\Customer\Auth\RegisterController;
use App\Http\Controllers\Customer\Auth\LoginController;
use App\Http\Controllers\Customer\CustomerController;
use App\Http\Controllers\Category\CategoryController;
use App\Http\Controllers\Cpu\CpuController;
use App\Http\Controllers\Ram\RamController;
use App\Http\Controllers\Screen\ScreenController;
use App\Http\Controllers\Ssd\SsdController;
use App\Http\Controllers\Order\OrderController;
use App\Http\Controllers\Product\ProductController;
use App\Http\Controllers\Payment\PaymentController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\Employee\EmployeeController;
use App\Http\Controllers\Order_detail\Order_detailController;
use App\Http\Middleware\CheckLogin;
use App\Models\Order_detail;
use Illuminate\Support\Facades\Route;


/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// ADMIN

//Đăng nhập hệ thống admin
Route::controller(AdminLoginController::class)->group(function () {
    Route::get('/admin/login', 'show')->middleware('revalidate')->name('admin.login');
    Route::post('/admin/login', 'authenticate');
});

// Đăng xuất hệ thống
Route::get('/admin/logout', [AdminLoginController::class, 'logout'])->name('logout')->middleware('checkLogin');

Route::middleware(CheckLogin::class)->group(function () {
    // Dashboard
    Route::get('/admin', [AdminLoginController::class, 'showDash'])->name('admin');

    // Products
    Route::controller(ProductController::class)->group(function () {
        Route::get('/product/index', 'all')->name('product.all');
        Route::get('/product/create', 'create')->name('product.create');
        Route::post('/product/create', 'store')->name('product.store');
        Route::get('/product/{id}/fix', 'fix');
        Route::post('/product/update', 'update');
        Route::get('/product/{id}/detail', 'detail');
        Route::get('/product/{id}/delete', 'delete');
    });

    // Category
    Route::controller(CategoryController::class)->group(callback: function () {
        Route::get('/category/index', 'all')->name('category.all');
        Route::get('/category/create', 'create')->name('category.create');
        Route::post('/category/create', 'store')->name('category.store');
        Route::get('/category/{id}/fix', 'fix');
        Route::put('/category/{id}/fix', 'update');
        Route::get('/category/{id}/delete', 'delete');
    });

    // CPUs
    Route::controller(CpuController::class)->group(function () {
        Route::get('/cpu/index', 'all')->name('cpu.all');
        Route::get('/cpu/create', 'create')->name('cpu.create');
        Route::post('/cpu/create', 'store')->name('cpu.store');
        Route::get('/cpu/{id}/fix', 'fix');
        Route::put('/cpu/{id}/fix', 'update');
        Route::get('/cpu/{id}/delete', 'delete');
    });

    // Rams
    Route::controller(RamController::class)->group(function () {
        Route::get('/ram/index', 'all')->name('ram.all');
        Route::get('/ram/create', 'create')->name('ram.create');
        Route::post('/ram/create', 'store')->name('ram.store');
        Route::get('/ram/{id}/fix', 'fix');
        Route::put('/ram/{id}/fix', 'update');
        Route::get('/ram/{id}/delete', 'delete');
    });

    //Screens
    Route::controller(ScreenController::class)->group(function () {
        Route::get('/screen/index', 'all')->name('screen.all');
        Route::get('/screen/create', 'create')->name('screen.create');
        Route::post('/screen/create', 'store')->name('screen.store');
        Route::get('/screen/{id}/fix', 'fix');
        Route::put('/screen/{id}/fix', 'update');
        Route::get('/screen/{id}/delete', 'delete');
    });

    //Ssd
    Route::controller(SsdController::class)->group(function () {
        Route::get('/ssd/index', 'all')->name('ssd.all');
        Route::get('/ssd/create', 'create')->name('ssd.create');
        Route::post('/ssd/create', 'store')->name('ssd.store');
        Route::get('/ssd/{id}/fix', 'fix');
        Route::put('/ssd/{id}/fix', 'update');
        Route::get('/ssd/{id}/delete', 'delete');
    });

    //Orders
    Route::controller(OrderController::class)->group(function () {
        Route::get('/order/index', 'all')->name('order.all');
        Route::get('/order/{id}/detail', 'fix');
        Route::post('/order/{id}/update', 'update');
    });

    Route::controller(CustomerController::class)->group(function () {
        Route::get('/customer', 'all')->name('customer.all');
        Route::get('/customer/create', 'create')->name('customer.create');
        Route::post('/customer/create', 'store')->name('customer.store');
        Route::get('/customer/{id}/fix', 'fix');
        Route::put('/customer/{id}/fix', 'update');
        Route::get('/customer/{id}/delete', 'delete');
    });
    
    Route::controller(EmployeeController::class)->group(function () {
        Route::get('/employee/index', 'all')->name('employee.all');
        Route::get('/employee/create', 'create')->name('employee.create');
        Route::post('/employee/create', 'store')->name('employee.store');
        Route::get('/employee/{id}/fix', 'fix');
        Route::put('/employee/{id}/fix', 'update');
        Route::get('/employee/{id}/delete', 'delete');
    });
});

// CUSTOMER

Route::controller(RegisterController::class)->group(function () {
    Route::get('/register', "show")->name('register.showData');
    Route::post('/register', "store")->name('register.storeData');
});

Route::controller(LoginController::class)->group(function () {
    Route::get('/login', "show")->name('login.showData');
    Route::post('/login', "authenticate")->name('login.authData');
    Route::get('/logout', "logout")->name('login.logout');
});

Route::get('/', [App\Http\Controllers\Customer\CustomerController::class, 'index']);

Route::controller(ProductController::class)->group(function () {
    Route::get('/customer/product/{id}', 'product_detail');
    Route::get('/product-all', 'full')->name('product-all.all');
    Route::get('/product-left-sidebar', 'left_sidebar')->name('product-left-sidebar');
    Route::get('/customer/{id}', 'addtocart')->name('addproduct.to.cart');
    Route::get('/cart', 'savecart')->name('cart.show');
    Route::patch('update-cart', 'updatecart')->name('update_cart');
    Route::delete('/delete-cart-product', 'deletecart')->name('delete.cart.product');
    Route::post('/pay', 'checkout')->name('pay.checkout');
    Route::get('/pay', 'showPay')->name('pay.showPay');
    Route::get('/pay/checkout', 'payCheckout')->name('thank');
});

Route::controller(CustomerController::class)->group(function () {
    Route::get('/account', 'fix')->name('account.fix');
    Route::put('/account', 'update')->name('account.update');
    Route::get('/contact', 'showContact')->name('contact');
    Route::get('/about-us', 'aboutUs')->name('about-us');
});

Route::controller(OrderController::class)->group(function () {
    Route::get('/order-detail/{id}', 'order_detail')->name('order_detail');
    Route::post('/order-detail', 'cancel_order')->name('cancel_order');
});

Route::controller(HomeController::class)->group(function () {
    Route::get('/search', 'search')->name('search');
    Route::get('/search-imei', 'showSearchForm')->name('search_imei');
    Route::post('/search-imei', 'search_imei')->name('search-imei.submit');
});