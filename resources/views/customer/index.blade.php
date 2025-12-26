@extends('customer.layout.master')
@section('title', 'laptopshop')
@section('content')
<style>
    .img {
        height: 200px;
        object-fit: cover;
    }
</style>

<!-- Hero slider -->
<section class="section-hero padding-b-100 next">
    <div class="cr-slider swiper-container">
        <div class="swiper-wrapper">
            <div class="swiper-slide">
                <div class="cr-hero-banner cr-banner-image-two">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cr-left-side-contain slider-animation">
                                    <h1>Explore fresh & juicy fruits.</h1>
                                    <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Amet reiciendis
                                        beatae consequuntur.</p>
                                    <div class="cr-last-buttons">
                                        <a href="shop-left-sidebar.html" class="cr-button">
                                            shop now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="swiper-slide">
                <div class="cr-hero-banner cr-banner-image-one">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class="cr-left-side-contain slider-animation">
                                    <h5><span>100%</span> New </h5>
                                    <h1>The best way to stuff your wallet.</h1>
                                    <p>Explore our computer collection and dive into the world of cutting-edge
                                        technology. From sleek laptops to powerful desktops, we have everything you need
                                        to meet all your work and entertainment needs.</p>
                                    <div class="cr-last-buttons">
                                        <a href="shop-left-sidebar.html" class="cr-button">
                                            shop now
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="swiper-pagination"></div>
    </div>
</section>

<!-- Popular product -->
<section class="section-popular-product-shape padding-b-100">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">

        <div class="product-content row mb-minus-24" id="MixItUpDA2FB7">
            <div class="col-xl-3 col-lg-4 col-12 mb-24">
                @if (session('success'))
                <div class="alert alert-success">
                    {{ session('success') }}
                </div>
                @elseif (session('fail'))
                <div class="alert alert-danger">
                    {{ session('fail') }}
                </div>
                @endif
                <div class="row mb-minus-24 sticky">
                    <div class="col-lg-12 col-sm-6 col-6 cr-product-box banner-480 mb-24">
                        <div class="cr-ice-cubes">
                            <img src="{{ asset('assets/img/product/product-banner.png') }}" alt="product banner">
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-xl-9 col-lg-8 col-12 mb-24">
                <div class="row mb-minus-24" id="product-list">
                    @foreach ($products as $product)
                    <div class="mix category-{{ $product->category_id }} col-xxl-3 col-xl-4 col-6 cr-product-box mb-24">
                        <div class="cr-product-card">
                            <div class="cr-product-image">
                                <div class="cr-image-inner zoom-image-hover">
                                    <img src="{{ asset('dist/img/product/' . $product->image) }}" class="img" alt="product">
                                </div>
                                <div class="cr-side-view">
                                    <a href="javascript:void(0)" class="wishlist">
                                        <i class="ri-heart-line"></i>
                                    </a>
                                    <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                        <i class="ri-eye-line"></i>
                                    </a>
                                </div>
                                <a class="cr-shopping-bag" href="{{ route('addproduct.to.cart', $product->id) }}">
                                    <i class="ri-shopping-bag-line"></i>
                                </a>
                            </div>
                            <div class="cr-product-details">
                                <div class="cr-brand">
                                    <a href="shop-left-sidebar.html">{{ $product->category_name }}</a>
                                    <div class="cr-star">
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-fill"></i>
                                        <i class="ri-star-line"></i>
                                        <p>(4.5)</p>
                                    </div>
                                </div>
                                <a href="{{ url('customer/product/' . $product->id) }}" class="title">{{ $product->product_name }}</a>
                                <p class="cr-price"><span class="new-price">{{ number_format($product->selling_price) . 'VNĐ' }}</span>
                                </p>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Product banner -->
<section class="section-product-banner padding-b-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30">
                    <div class="cr-banner">
                        <h2>Popular Products</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>The following are the products most purchased by customers. </p>
                    </div>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-12">
                <div class="cr-banner-slider swiper-container">
                    <div class="swiper-wrapper">

                        @foreach ($products as $product)
                        @if ($product->feature == 1)
                        <div class="swiper-slide" data-aos="fade-up" data-aos-duration="2000">
                            <div class="col-xxl-4 cr-product-box mb-24">
                                <div class="cr-product-card">
                                    <div class="cr-product-image">
                                        <div class="cr-image-inner zoom-image-hover">
                                            <img src="{{ asset('dist/img/product/' . $product->image) }}" class="img" alt="product">
                                        </div>
                                        <div class="cr-side-view">
                                            <a href="javascript:void(0)" class="wishlist">
                                                <i class="ri-heart-line"></i>
                                            </a>
                                            <a class="model-oraganic-product" data-bs-toggle="modal" href="#quickview" role="button">
                                                <i class="ri-eye-line"></i>
                                            </a>
                                        </div>
                                        <a class="cr-shopping-bag" href="{{ route('addproduct.to.cart', $product->id) }}">
                                            <i class="ri-shopping-bag-line"></i>
                                        </a>
                                    </div>
                                    <div class="cr-product-details">
                                        <div class="cr-brand">
                                            <a href="shop-left-sidebar.html">{{ $product->category_name }}</a>
                                            <div class="cr-star">
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-fill"></i>
                                                <i class="ri-star-line"></i>
                                                <p>(4.5)</p>
                                            </div>
                                        </div>
                                        <a href="{{ url('customer/product/' . $product->id) }}" class="title">{{ $product->product_name }}</a>
                                        <p class="cr-price"><span class="new-price">{{ number_format($product->selling_price) . 'VNĐ' }}</span>
                                        </p>
                                    </div>
                                </div>
                            </div>
                        </div>
                        @endif
                        @endforeach

                    </div>
                </div>
            </div>
        </div>

    </div>
</section>

<!-- Services -->
<section class="section-services padding-b-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="cr-services-border" data-aos="fade-up" data-aos-duration="2000">
                    <div class="cr-service-slider swiper-container">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-red-packet-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Product Packing</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-customer-service-2-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>24X7 Support</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-truck-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Delivery in 5 Days</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div>
                            <div class="swiper-slide">
                                <div class="cr-services">
                                    <div class="cr-services-image">
                                        <i class="ri-money-dollar-box-line"></i>
                                    </div>
                                    <div class="cr-services-contain">
                                        <h4>Payment Secure</h4>
                                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing.</p>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Deal -->
<section class="section-deal padding-b-100">
    <div class="bg-banner-deal">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <div class="cr-deal-rightside">
                        <div class="cr-deal-content" data-aos="fade-up" data-aos-duration="2000">
                            <span><code>35%</code> OFF</span>
                            <h4 class="cr-deal-title">Great deal on Dell computer.</h4>
                            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do maecenas accumsan
                                lacus
                                vel facilisis. </p>
                            <div id="timer" class="cr-counter">
                                <div class="cr-counter-inner">
                                    <h4>
                                        <span id="days"></span>
                                        Days
                                    </h4>
                                    <h4>
                                        <span id="hours"></span>
                                        Hrs
                                    </h4>
                                    <h4>
                                        <span id="minutes"></span>
                                        Min
                                    </h4>
                                    <h4>
                                        <span id="seconds"></span>
                                        Sec
                                    </h4>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
@endsection