@extends('customer.layout.master')
@section('title', 'orders')
@section('content')

@if (session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif (session('fail'))
<div class="alert alert-danger">
    {{ session('fail') }}
</div>
@endif
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Orders</h3>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <ul class="nav nav-pills nav-sidebar flex-column">
                        <li><label>Receiver Name<span>:</span></label>{{ $orders->first()->orders->receiver_name }}</li>
                        <li><label>Receiver Address<span>:</span></label>{{ $orders->first()->orders->receiver_address }}</li>
                        <li><label>Receiver Phone<span>:</span></label>{{ $orders->first()->orders->receiver_phone }}</li>
                        <li><label>Receiver Email<span>:</span></label>{{ $orders->first()->orders->receiver_mail }}</li>
                    </ul>
                </div>
                <div class="col-8">
                    <ul>
                        <li><label>Total Amount<span>:</span></label>{{ $orders->first()->orders->total_amount }} VND</li>
                        <label>Status<span>:</span></label>
                        @php
                        $status = 'Unknown';
                        if ($orders->first()->orders->status == 1) {
                        $status = 'Pending';
                        } elseif ($orders->first()->orders->status == 2) {
                        $status = 'Processing';
                        } elseif ($orders->first()->orders->status == 3) {
                        $status = 'Shipped';
                        } elseif ($orders->first()->orders->status == 4) {
                        $status = 'Delivered';
                        } elseif ($orders->first()->orders->status == 5) {
                        $status = 'Completed';
                        } elseif ($orders->first()->orders->status == 0) {
                        $status = 'Cancelled';
                        }
                        @endphp
                        {{ $status }}
                        @if($orders->first()->orders->status == 1)
                        <form action="{{ url('/order-detail') }}" method="post" role="form">
                            @csrf
                            <input hidden name="order_id" value="{{$orders->first()->orders->id}}">
                            <li><button class="btn btn-danger" type="submit">Cancel order</button></li>
                        </form>

                        @endif
                    </ul>
                </div>
            </div>
        </div>

        <table class="table">
            <thead>
                <tr>
                    <th>Product Name</th>
                    <th>Product Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $order)
                <tr>
                    <td>{{ $order->products->product_name }}</td>
                    <td>{{ $order->products->selling_price }}.000vnd</td>
                    <td>{{ $order->quantity }}</td>
                    <td>{{ $order->quantity * $order->products->selling_price }}.000vnd</td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
@endsection