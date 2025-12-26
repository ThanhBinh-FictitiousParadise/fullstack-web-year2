@extends('customer.layout.master')
@section('title', 'Search imei Results')
@section('content')
    <style>
        .img {
            height: 200px;
            object-fit: cover;
        }
    </style>
    <section class="section-search-results padding-b-100">
        <div class="container" data-aos="fade-up" data-aos-duration="2000">
            <h1>Find products by Imei</h1>

            <form method="POST" action="{{ route('search-imei.submit') }}">
                @csrf
                <label for="imei_submit">Enter IMEI:</label>
                <input type="text" id="imei_submit" name="imei_submit">
                <button type="submit">Search</button>
            </form>

            @if (isset($product))
                <div>
                    <h2>Product information:</h2>
                    <p>Product name: {{ $product->product_name }}</p>
                    <p>Image: </p><img src="{{ asset('dist/img/product/' . $product->image) }}" class="img"
                        alt="product">
                    <p>Selling_price: {{ $product->selling_price }}</p>
                    @if ($product->feature == 1)
                        <p>Feature: Popular product</p>
                    @else
                        <p>Feature: Regular Product</p>
                    @endif
                    <p>Description: {{ $product->pro_desc }}</p>
                    <!-- Hiển thị thông tin sản phẩm khác nếu cần -->
                </div>
            @endif

        </div>
    </section>
@endsection
