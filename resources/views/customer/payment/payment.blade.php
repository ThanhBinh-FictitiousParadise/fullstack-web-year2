@extends('customer.layout.master')
@section('title', 'laptopshop')
@section('content')

@php
$total = 0;
@endphp
@if (session('cart'))
@foreach (session('cart') as $id => $details)
@php $total += $details['price'] * $details['quantity'] @endphp
@endforeach
@endif

<!-- Loader -->
<div id="cr-overlay">
    <span class="loader"></span>
</div>

<link rel="stylesheet" href="{{asset('assets/css/test.css')}}">
<div id="container" class="container mt-5">
    <div class="progress px-1" style="height: 3px;">
        <div class="progress-bar" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
    </div>
    <div class="step-container d-flex justify-content-between">
        <div class="step-circle" onclick="displayStep(1)">1</div>
        <div class="step-circle" onclick="displayStep(2)">2</div>
        <div class="step-circle" onclick="displayStep(3)">3</div>
    </div>

    <form id="multi-step-form" action="{{ route('pay.checkout') }}" method="POST">
        @csrf
        <div class="step step-1">
            <!-- Step 1 form fields here -->
            <h3>Step 1</h3>

            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1">@</span>
                    <input type="email" required class="form-control" id="field1" name="receiver_mail" placeholder="Receiver email" aria-label="Email" aria-describedby="basic-addon1" value="{{session('customer_key')->email}}"></div>
            </div>

            <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" required class="form-control" id="field2" name="receiver_name" placeholder="Receiver full name" aria-label="Name" aria-describedby="basic-addon2" value="{{session('customer_key')->customer_name}}">
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group mb-3">
                    <span class="input-group-text" id="basic-addon1"><i class="ri-phone-line"></i></span>
                    <input type="number" required class="form-control" id="field3" name="receiver_phone" placeholder="Receiver phone number" aria-label="Phone" aria-describedby="basic-addon3" value="{{session('customer_key')->phone_number}}">
                </div>
            </div>

            <div class="mb-3">
                <div class="input-group mb-3">
                    <input type="text" required class="form-control" id="field4" name="receiver_address" placeholder="Receiver address" aria-label="Address" aria-describedby="basic-addon4" value="{{session('customer_key')->address}}">
                </div>
            </div>


            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>

        <div class="step step-2">
            <!-- Step 2 form fields here -->
            <h3>Step 2: Chọn phương thức thanh toán</h3>
            <div class="mb-3">
                <label for="paymentMethod" class="form-label">Phương thức thanh toán:</label>
                <select class="form-control" id="paymentMethod" name="payment_id" disabled>
                    <option value="2" selected>Pay after receive</option>
                </select>
            </div>
            <button type="button" class="btn btn-primary prev-step">Previous</button>
            <button type="button" class="btn btn-primary next-step">Next</button>
        </div>

        <div class="step step-3">
            <!-- Step 3 form fields here -->
            <h3>Step 3: Xác nhận đơn hàng</h3>
            <input type="hidden" name="total" value='{{$total}}'>
            <div class="mb-3">
                <label for="totalAmount" class="form-label">Tổng số tiền:</label>
                <input type="text" class="form-control" id="totalAmount" name="total_amount" readonly value="{{$total}}">
            </div>
            <button type="button" class="btn btn-primary prev-step">Previous</button>
            <button type="submit" class="btn btn-success">Submit</button>
        </div>

    </form>

</div>
<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script src="{{asset('assets/js/test.js')}}"></script>
@endsection