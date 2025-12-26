@extends('customer.layout.master')
@section('title', 'laptopshop')
@section('content')
<style>
    .custom-icon {
        border: 15px solid white; /* Màu viền và kích thước viền có thể thay đổi tùy ý */
    }
</style>
    <!-- Checkout section -->
    <section class="cr-checkout-section padding-tb-100">
        <div class="container">
            <div class="row">
                <!-- Sidebar Area Start -->
                <div class="cr-sidebar-wrap">
                    <!-- Sidebar Summary Block -->
                    <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
                        <div class="col-xl-3 col-lg-4 col-12 mb-24">
                            <nav class="mt-2">
                                <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu"
                                    data-accordion="false" >
                                    <li class="nav-item " >
                                        <a class="nav-link">
                                            <i class="nav-icon fas fa-user"></i>
                                            <p>
                                                Customer account
                                            </p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="custom-icon"></i>
                                                    <p>Profile</p>
                                                </a>
                                            </li>
                                            <li class="nav-item">
                                                <a class="nav-link">
                                                    <i class="custom-icon"></i>
                                                    <p>Address</p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="{{ route('customer.all') }}" class="nav-link">
                                            <i class="nav-icon fas fa-money-bill-wave"></i>
                                            <p>Payment method</p>
                                        </a>
                                        <ul class="nav nav-treeview">
                                            <li class="nav-item" >
                                                <a class="nav-link" >
                                                    <i class="custom-icon"></i>
                                                    <p>
                                                        Bank or credit/debit card
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item" data-filter=".Afterreceive">
                                                <a class="nav-link">
                                                    <i class="custom-icon"></i>
                                                    <p>
                                                        After receive
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item" data-filter=".Installments">
                                                <a class="nav-link">
                                                    <i class="custom-icon"></i>
                                                    <p>
                                                        Installments
                                                    </p>
                                                </a>
                                            </li>
                                            <li class="nav-item" data-filter=".E-wallet">
                                                <a class="nav-link">
                                                    <i class="custom-icon"></i>
                                                    <p>
                                                        E-wallet
                                                    </p>
                                                </a>
                                            </li>
                                        </ul>
                                    </li>
                                    <li class="nav-item">
                                        <a href="#" class="nav-link">
                                            <i class="fas fa-clipboard-list nav-icon"></i>
                                            <p> Purchase order </p>
                                        </a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                        <div class="col-xl-9 col-lg-8 col-12 mb-24">
                            <div class="row mb-minus-24">
                                <div class="mix Bank ">
                                    <div class="cr-checkout-content">
                                        <div class="cr-checkout-inner">
                                            <div class="cr-checkout-wrap">
                                                <div class="cr-checkout-block cr-check-bill">
                                                    <h3 class="cr-checkout-title">Billing Details</h3>
                                                    <div class="cr-bl-block-content">
                                                        <div class="cr-check-subtitle">Checkout Options</div>
                                                        <span class="cr-bill-option">
                                                            <span>
                                                                <input type="radio" id="bill1" name="radio-group">
                                                                <label for="bill1">I want to use an existing
                                                                    address</label>
                                                            </span>
                                                            <span>
                                                                <input type="radio" id="bill2" name="radio-group"
                                                                    checked>
                                                                <label for="bill2">I want to use new address</label>
                                                            </span>
                                                        </span>
                                                        <div class="cr-check-bill-form mb-minus-24">
                                                            <form action="#" method="post">
                                                                <span class="cr-bill-wrap cr-bill-half">
                                                                    <label>First Name*</label>
                                                                    <input type="text" name="firstname"
                                                                        placeholder="Enter your first name" required>
                                                                </span>
                                                                <span class="cr-bill-wrap cr-bill-half">
                                                                    <label>Last Name*</label>
                                                                    <input type="text" name="lastname"
                                                                        placeholder="Enter your last name" required>
                                                                </span>
                                                                <span class="cr-bill-wrap">
                                                                    <label>Address</label>
                                                                    <input type="text" name="address"
                                                                        placeholder="Address Line 1">
                                                                </span>
                                                                <span class="cr-bill-wrap cr-bill-half">
                                                                    <label>City *</label>
                                                                    <span class="cr-bl-select-inner">
                                                                        <select name="cr_select_city" id="cr-select-city"
                                                                            class="cr-bill-select">
                                                                            <option selected disabled>City</option>
                                                                            <option value="1">City 1</option>
                                                                            <option value="2">City 2</option>
                                                                            <option value="3">City 3</option>
                                                                            <option value="4">City 4</option>
                                                                            <option value="5">City 5</option>
                                                                        </select>
                                                                    </span>
                                                                </span>
                                                                <span class="cr-bill-wrap cr-bill-half">
                                                                    <label>Post Code</label>
                                                                    <input type="text" name="postalcode"
                                                                        placeholder="Post Code">
                                                                </span>
                                                                <span class="cr-bill-wrap cr-bill-half">
                                                                    <label>Country *</label>
                                                                    <span class="cr-bl-select-inner">
                                                                        <select name="cr_select_country"
                                                                            id="cr-select-country" class="cr-bill-select">
                                                                            <option selected disabled>Country</option>
                                                                            <option value="1">Country 1</option>
                                                                            <option value="2">Country 2</option>
                                                                            <option value="3">Country 3</option>
                                                                            <option value="4">Country 4</option>
                                                                            <option value="5">Country 5</option>
                                                                        </select>
                                                                    </span>
                                                                </span>
                                                                <span class="cr-bill-wrap cr-bill-half">
                                                                    <label>Region State</label>
                                                                    <span class="cr-bl-select-inner">
                                                                        <select name="cr_select_state"
                                                                            id="cr-select-state" class="cr-bill-select">
                                                                            <option selected disabled>Region/State</option>
                                                                            <option value="1">Region/State 1</option>
                                                                            <option value="2">Region/State 2</option>
                                                                            <option value="3">Region/State 3</option>
                                                                            <option value="4">Region/State 4</option>
                                                                            <option value="5">Region/State 5</option>
                                                                        </select>
                                                                    </span>
                                                                </span>
                                                            </form>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <span class="cr-check-order-btn">
                                                <a class="cr-button mt-30" href="#">Place Order</a>
                                            </span>
                                        </div>
                                    </div>
                                </div>
                                <div class="mix Afterreceive col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                                    <div class="cr-product-card">
                                        <div class="cr-product-image">
                                            <div class="cr-image-inner zoom-image-hover">
                                                <img src="assets/img/product/9.jpg" alt="product-1">
                                            </div>
                                            <div class="cr-side-view">
                                                <a href="javascript:void(0)" class="wishlist">
                                                    <i class="ri-heart-line"></i>
                                                </a>
                                                <a class="model-oraganic-product" data-bs-toggle="modal"
                                                    href="#quickview" role="button">
                                                    <i class="ri-eye-line"></i>
                                                </a>
                                            </div>
                                            <a class="cr-shopping-bag" href="javascript:void(0)">
                                                <i class="ri-shopping-bag-line"></i>
                                            </a>
                                        </div>
                                        <div class="cr-product-details">
                                            <div class="cr-brand">
                                                <a href="shop-left-sidebar.html">Snacks</a>
                                                <div class="cr-star">
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <i class="ri-star-fill"></i>
                                                    <p>(5.0)</p>
                                                </div>
                                            </div>
                                            <a href="product-left-sidebar.html" class="title">Best snakes with hazel nut
                                                pack 200gm</a>
                                            <p class="cr-price"><span class="new-price">$145</span> <span
                                                    class="old-price">$150</span></p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
                <!-- Sidebar Summary Block -->
            </div>
        </div>
        </div>
    </section>
    <!-- Checkout section End -->
@endsection
