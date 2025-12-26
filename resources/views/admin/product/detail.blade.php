@extends('admin.layout.master')
@section('title', 'laptopshop')
@section('content')

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
                                    <img src="{{ asset ($product->image) }}" alt="product-tab-1" class="product-image">
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
                    <div class="cr-review-star">
                        <div class="cr-star">
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                            <i class="ri-star-fill"></i>
                        </div>
                        <p>( 75 Review )</p>
                    </div>
                    <div class="list">
                        <ul>
                            <li><label>Category<span>:</span></label>{{ $product->category_name }}</li>
                            <li><label>Feature <span>:</span></label>Super Saver Pack</li>
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
    </div>
</section>

@endsection