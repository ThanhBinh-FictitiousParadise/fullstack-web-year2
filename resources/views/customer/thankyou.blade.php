@extends('customer.layout.master')
@section('title', 'Thank You')
@section('content')

<div class="container mt-5">
    <div class="row">
        <div class="col-md-12">
            <div class="text-center">
                <h2>Thank You for Your Purchase!</h2>
                <p>We have received your order and it is being processed.</p>
                <p>We will contact you shortly for further instructions.</p>
                <img src="{{ asset('dist/img/camon.png') }}"  >
            </div>
        </div>
    </div>
</div>

@endsection
