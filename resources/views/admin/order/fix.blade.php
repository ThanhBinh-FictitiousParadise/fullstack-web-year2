@extends('admin.layout.master')
@section('title', 'orders')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">List of Orders</h3>
    </div>
    <div class="card-body">
        <div class="container">
            <div class="row">
                <div class="col-4">
                    <ul class="nav nav-pills nav-sidebar flex-column">
                        <li><label>Receiver Name<span>:</span></label>{{ $orders->first()->orders->receiver_name }}
                        </li>
                        <li><label>Receiver
                                Address<span>:</span></label>{{ $orders->first()->orders->receiver_address }}</li>
                        <li><label>Receiver
                                Phone<span>:</span></label>{{ $orders->first()->orders->receiver_phone }}</li>
                        <li><label>Receiver Email<span>:</span></label>{{ $orders->first()->orders->receiver_mail }}
                        </li>

                    </ul>
                </div>
                <div class="col-8">
                    <ul>
                        <li><label>Total Amount<span>:</span></label>{{ $orders->first()->orders->total_amount }}
                            VND</li>
                        <li>
                            <label>Status<span>:</span>
                                @if($orders->first()->orders->status === 1)
                                Pending
                                @elseif($orders->first()->orders->status === 2)
                                Processing
                                @elseif($orders->first()->orders->status === 3)
                                Shipping
                                @elseif($orders->first()->orders->status === 4)
                                Delivered 
                                @elseif($orders->first()->orders->status === 5)
                                Completed
                                @elseif($orders->first()->orders->status === 0)
                                Cancelled
                                @endif
                            </label>
                        </li>
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
                @foreach ($orders as $orders)
                <tr>
                    <td>{{ $orders->products->product_name }}</td>
                    <td>{{ $orders->products->selling_price }}.000vnd</td>
                    <td>{{ $orders->quantity }}</td>
                    <td>{{ $orders->quantity * $orders->products->selling_price }}.000vnd</td>
                </tr>
                @endforeach
            </tbody>
        </table>

        @if($orders->orders->status != 5 && $orders->orders->status != 0)
        <form action="{{ url('/order/' . $orders->orders->id . '/update') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <select name="order_status">
                @if($orders->orders->status == 1)
                <option value="2" {{ $orders->orders->status == '2' ? 'selected' : '' }}>Processing
                </option>
                @elseif($orders->orders->status == 2)
                <option value="3" {{ $orders->orders->status == '3' ? 'selected' : '' }}>Shipped
                </option>
                @elseif($orders->orders->status == 3)
                <option value="4" {{ $orders->orders->status == '4' ? 'selected' : '' }}>Delivered
                </option>
                @elseif($orders->orders->status == 4)
                <option value="5" {{ $orders->orders->status == '5' ? 'selected' : '' }}>Completed
                </option>
                @endif
                <option value="0" {{ $orders->orders->status == '0' ? 'selected' : '' }}>Cancel
                </option>
            </select>
            <button type="submit">Update</button>
        </form>
        @endif
    </div>
</div>
@endsection