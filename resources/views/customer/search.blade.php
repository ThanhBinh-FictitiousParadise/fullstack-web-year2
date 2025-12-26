@extends('customer.layout.master')
@section('title', 'Search Results')
@section('content')
<section class="section-search-results padding-b-100">
    <div class="container" data-aos="fade-up" data-aos-duration="2000">
        <div class="row">
            <div class="col-lg-12">
                <div class="mb-30">
                    <div class="cr-banner">
                        <h2>Search Results</h2>
                    </div>
                    <div class="cr-banner-sub-title">
                        <p>Found {{ $products->count() }} results for your search.</p>
                    </div>
                </div>
            </div>
        </div>
        <div class="product-content row mb-minus-24">
            @foreach ($products as $product)
            <div class="col-xl-3 col-lg-4 col-12 mb-24">
                <div class="cr-product-box">
                    <div class="cr-product-card">
                        <div class="cr-product-image">
                            <div class="cr-image-inner zoom-image-hover">
                                <img src="{{ asset($product->image) }}" class="img" alt="product">
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
            @endforeach
        </div>
    </div>
</section>
@endsection