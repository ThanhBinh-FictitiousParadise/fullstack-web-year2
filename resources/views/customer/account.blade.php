@extends('customer.layout.master')
@section('title', 'laptopshop')
@section('content')
<style>
    .custom-icon {
        border: 15px solid white;
        /* Màu viền và kích thước viền có thể thay đổi tùy ý */
    }

    /* CSS for the myaccount-tab-menu */
    .myaccount-tab-menu {
        display: flex;
        flex-direction: column;
        background-color: #f8f9fa;
        padding: 20px;
        border-radius: 5px;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    }

    .myaccount-tab-menu a {
        display: flex;
        align-items: center;
        padding: 10px 15px;
        margin-bottom: 10px;
        color: #333;
        text-decoration: none;
        border-radius: 5px;
        transition: background-color 0.3s, color 0.3s;
    }

    .myaccount-tab-menu a:hover,
    .myaccount-tab-menu a.active {
        background-color: #007bff;
        color: #fff;
    }

    .myaccount-tab-menu a i {
        margin-right: 10px;
        font-size: 18px;
    }

    .myaccount-tab-menu a.active i {
        color: #fff;
    }

    .myaccount-tab-menu a:hover i {
        color: #fff;
    }

    /* Responsive adjustments */
    @media (max-width: 991px) {
        .myaccount-tab-menu {
            flex-direction: row;
            overflow-x: auto;
            white-space: nowrap;
        }

        .myaccount-tab-menu a {
            flex: 1;
            text-align: center;
            margin-bottom: 0;
            border-radius: 0;
        }

        .myaccount-tab-menu a:hover,
        .myaccount-tab-menu a.active {
            border-radius: 0;
        }
    }
</style>
<section class="cr-checkout-section padding-tb-100">
    <div class="container">
        <div class="row">
            <div class="col-lg-3 col-12">
                <div class="myaccount-tab-menu nav" role="tablist">
                    <a href="#dashboad" class="active" data-bs-toggle="tab"><i class="fas fa-user"></i>
                        My account</a>
                    <a href="#orders" data-bs-toggle="tab"><i class="fas fa-clipboard-list"></i> Purchase order</a>
                    <a href="#order-history" data-bs-toggle="tab"><i class="fa fa-cart-arrow-down"></i> purchase history </a>
                    <a href="/logout"><i class="fas fa-sign-out-alt"></i> Logout</a>
                </div>
            </div>
            <div class="col-lg-9 col-12 mt--30 mt-lg--0">
                <div class="tab-content" id="myaccountContent">
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade show active" id="dashboad" role="tabpanel">
                        <div class="myaccount-content">
                            <div class="cr-sidebar-wrap" style="padding: 0px;">
                                <!-- Sidebar Summary Block -->
                                <div class="card-header">
                                    <h3 class="card-title">My account</h3>
                                </div>
                                <form action="{{ route('account.update')}}" role="form" method="post" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')
                                    <div class="card-body">
                                        <div class="col-sm-8" style="float: left">
                                            <div class="col-lg-12">
                                                <input hidden name="id" value="{{$customer->id}}">
                                                <div>
                                                    <label>Customer name</label>
                                                    <input id="form" required name="customer_name" class="form-control" placeholder="Customer name" value="{{ old('customer_name', $customer->customer_name) }}">
                                                </div>
                                                <div>
                                                    <label>Phone number</label>
                                                    <input type="text" class="form-control" placeholder="Phone number" name="phone_number" value="{{ old('phone_number', $customer->phone_number) }}">
                                                </div>
                                                <div>
                                                    <label>Address</label>
                                                    <input type="text" class="form-control" placeholder="Address" name="address" value="{{ old('address', $customer->address) }}">
                                                </div>
                                                <div>
                                                    <label>Email</label>
                                                    <input type="email" class="form-control" placeholder="Email" name="email" value="{{ old('email', $customer->email) }}">
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-sm-4" style="float: left; border-left: .0625rem solid #efefef">
                                            <div class="col-lg-12">
                                                <div>
                                                    <label>Image </label>
                                                    <input id="form" name="image" type="file" onchange="preview();">
                                                    <br>
                                                    <div>
                                                        <img src="#" id="image" width="150" height="200">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="orders" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Orders</h3>
                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone number</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($order as $item)
                                    @if ($item->status != 5 && $item->status != 0)
                                    <tbody>
                                        <tr>
                                            <td>{{$item->receiver_name}}</td>
                                            <td>{{$item->receiver_phone}}</td>
                                            <td>{{$item->receiver_address}}</td>
                                            <td>{{$item->receiver_mail}}</td>
                                            <td>
                                                @if($item->status == 1)
                                                Pending
                                                @elseif($item->status == 2)
                                                Processing
                                                @elseif($item->status == 3)
                                                Shipped
                                                @elseif($item->status == 4)
                                                Delivered
                                                @endif
                                            </td>
                                            <td>{{$item->order_date}}</td>
                                            <td><a href="{{ url('order-detail/' . $item->id ) }}" class="btn">View</a></td>
                                        </tr>
                                    </tbody>
                                    @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                    <!-- Single Tab Content Start -->
                    <div class="tab-pane fade" id="order-history" role="tabpanel">
                        <div class="myaccount-content">
                            <h3>Orders</h3>
                            <div class="myaccount-table table-responsive text-center">
                                <table class="table table-bordered">
                                    <thead class="thead-light">
                                        <tr>
                                            <th>Name</th>
                                            <th>Phone number</th>
                                            <th>Address</th>
                                            <th>Email</th>
                                            <th>Status</th>
                                            <th>Date</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    @foreach ($order as $item)
                                    @if ($item->status == 5 || $item->status == 0)
                                    <tbody>
                                        <tr>
                                            <td>{{$item->receiver_name}}</td>
                                            <td>{{$item->receiver_phone}}</td>
                                            <td>{{$item->receiver_address}}</td>
                                            <td>{{$item->receiver_mail}}</td>
                                            <td>
                                                @if($item->status == 5)
                                                Completed
                                                @elseif($item->status == 0)
                                                Cancelled
                                                @endif
                                            </td>
                                            <td>{{$item->order_date}}</td>
                                            <td><a href="{{ url('order-detail/' . $item->id ) }}" class="btn">View</a></td>
                                        </tr>
                                    </tbody>
                                    @endif
                                    @endforeach
                                </table>
                            </div>
                        </div>
                    </div>
                    <!-- Single Tab Content End -->
                </div>
            </div>

        </div>
    </div>
    <!-- Sidebar Summary Block -->
</section>
@endsection