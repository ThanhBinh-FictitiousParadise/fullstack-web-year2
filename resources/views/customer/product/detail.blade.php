@extends('customer.layout.master')
@section('title', 'laptopshop')
@section('content')
    <style>
        /* CSS để căn giữa nút và đặt màu cho nút */
        .center {
            text-align: center;
        }

        .add-to-cart-button {
            display: inline-block;
            padding: 10px 20px;
            background-color: #4CAF50;
            /* Màu xanh lá */
            color: white;
            text-align: center;
            text-decoration: none;
            font-size: 16px;
            margin-top: 20px;
            /* Khoảng cách từ nút đến phần trên */
            border: 2px solid #4CAF50;
            /* Viền màu xanh lá */
            border-radius: 5px;
            /* Bo tròn các góc của nút */
        }

        .add-to-cart-button:hover {
            background-color: #45a049;
            /* Màu xanh lá nhạt khi di chuột vào */
        }
    </style>
    <!-- Product -->
    <section class="section-product padding-t-100">
        <div class="container">
            <div class="row mb-minus-24" data-aos="fade-up" data-aos-duration="2000" data-aos-delay="600">
                <div class="col-xxl-4 col-xl-5 col-md-6 col-12 mb-24">
                    <div class="vehicle-detail-banner banner-content clearfix">
                        <div class="banner-slider">
                            <div class="slider slider-for">
                                <div class="slider-banner-image">
                                    <div class="zoom-image-hover">
                                        <img src="{{ asset('dist/img/product/' . $product->image) }}" alt="product-tab-1" class="product-image">
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xxl-8 col-xl-7 col-md-6 col-12 mb-24">
                    <div class="cr-size-and-weight-contain">
                        <h2 class="heading">{{ $product->product_name }}</h2>
                        <p>{{ $product->pro_desc }}</p>
                    </div>
                    <div class="cr-size-and-weight">
                        <div class="list">
                            <ul>
                                <li><label>Category<span>:</span></label>{{ $product->category_name }}</li>
                                @if ($product->feature == 1)
                                    <li><label>Feature <span>:</span></label>Popular product</li>
                                @else
                                    <li><label>Feature <span>:</span></label>Regular Product</li>
                                @endif
                                <li><label>Price <span>:</span></label>{{ $product->selling_price }}</li>
                                <li><label>Cpu <span>:</span></label>{{ $product->cpu_name }}</li>
                                <li><label>Ram <span>:</span></label>{{ $product->ram_name }}</li>
                                <li><label>Ssd <span>:</span></label>{{ $product->ssd_name }}</li>
                                <li><label>Screen <span>:</span></label>{{ $product->screen_name }}</li>
                                <li><label>Quantity <span>:</span></label>{{ $product->quantity }}</li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
            <div class="center">
                <a href="{{ route('addproduct.to.cart', $product->id) }}" class="add-to-cart-button">Add to Cart</a>
            </div>
        </div>

    </section>

@endsection
