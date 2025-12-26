@extends('admin.layout.master')
@section('title','laptopshop')
@section('content')

<link rel="stylesheet" href="{{asset('assets/css/gears/dashboard.css')}}">

<!-- Small boxes (Stat box) -->
<div class="row">
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-info">
            <div class="inner">
                <?php $temp = count($todaysOrder) ?>
                <h3>{{$temp}}</h3>

                <p>Orders today</p>
            </div>
            <div class="icon">
                <i class="ion ion-bag"></i>
            </div>
            <a class="btn small-box-footer" data-bs-toggle="modal" data-bs-target="#today-order">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <!-- <div class="col-lg-3 col-6">
        <div class="small-box bg-success">
            <div class="inner">
                <h3>53<sup style="font-size: 20px">%</sup></h3>

                <p>Bounce Rate</p>
            </div>
            <div class="icon">
                <i class="ion ion-stats-bars"></i>
            </div>
            <a href="#" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div> -->
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <!-- small box -->
        <div class="small-box bg-warning">
            <div class="inner">
                <h3>{{$totalCustomer}}</h3>

                <p>User Registrations</p>
            </div>
            <div class="icon">
                <i class="ion ion-person-add"></i>
            </div>
            <a href="/customer" class="small-box-footer">More info <i class="fas fa-arrow-circle-right"></i></a>
        </div>
    </div>
    <!-- ./col -->
    <div class="col-lg-3 col-6">
        <?php
        $supply = count($lowSupply)
        ?>
        <!-- small box -->
        @if($supply > 0)
        <div class="small-box bg-danger">
            @else
            <div class="small-box bg-success">
                @endif
                <div class="inner">
                    <h3>{{$supply}}</h3>

                    <p>Products low on supply</p>
                </div>
                <div class="icon">
                    <i class="ion ion-pie-graph"></i>
                </div>
                <a class="btn small-box-footer" data-bs-toggle="modal" data-bs-target="#low-supply">More info <i class="fas fa-arrow-circle-right"></i></a>
            </div>
        </div>
        <!-- ./col -->
    </div>
    <!-- /.row -->

    <!-- STATISTIC -->
    <div class="row">
        <div class="col-12">
            <!-- Custom Tabs -->
            <div class="card styled-card-1">
                <div class="card-header d-flex p-0">
                    <h3 class="card-title p-3">Top 5</h3>
                    <ul class="nav nav-pills ml-auto p-2 nav-top">
                        <li class="nav-item"><a class="nav-link active" href="#tab_1" data-toggle="tab">latest orders</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_2" data-toggle="tab">Best selling products</a></li>
                        <li class="nav-item"><a class="nav-link" href="#tab_3" data-toggle="tab">Worst selling products</a></li>
                        <li class="nav-item" style="padding-top: 5px;">
                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </li>
                    </ul>
                </div><!-- /.card-header -->
                <div class="card-body no-pad">
                    <div class="tab-content">

                        <!-- Tab pane -->
                        <div class="tab-pane active" id="tab_1">
                            <div class="table-responsive">
                                <table class="table modded-table-1 m-0 shadow">
                                    <thead>
                                        <tr>
                                            <th>Order ID</th>
                                            <th>Ordered customer</th>
                                            <th>Order time</th>
                                            <th>Status</th>
                                            <th>Total</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach($latestOrders as $latestOrders)
                                        <tr>
                                            <td>
                                                <div>{{$latestOrders->id}}</div>
                                            </td>
                                            <td>{{$latestOrders->customer->customer_name}}</td>
                                            <td>{{$latestOrders->order_date}}</td>
                                            <td>
                                                @if($latestOrders->status == 1)
                                                <span class="badge badge-warning">Pending</span>
                                                @elseif($latestOrders->status == 2)
                                                <span class="badge badge-primary">Accepted</span>
                                                @elseif($latestOrders->status == 3)
                                                <span class="badge badge-success">Shipping</span>
                                                @elseif($latestOrders->status == 4)
                                                <span class="badge badge-success">Delivered</span>
                                                @elseif($latestOrders->status == 5)
                                                <span class="badge badge-success">Completed</span>
                                                @elseif($latestOrders->status == 0)
                                                <span class="badge badge-danger">Cancelled</span>
                                                @endif
                                            </td>
                                            <td>
                                                <div class="sparkbar" data-color="#00a65a" data-height="20">{{$latestOrders->total_amount}}</div>
                                            </td>
                                            <td>
                                                <a href="{{ url('order/' . $latestOrders->id . '/detail') }}" class="text-muted">
                                                    <i class="fas fa-search"></i>
                                                </a>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>

                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_2">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-home-tab" data-bs-toggle="tab" data-bs-target="#nav-home" type="button" role="tab" aria-controls="nav-home" aria-selected="true">Of all time</button>
                                    <button class="nav-link" id="nav-by-year-tab" data-bs-toggle="tab" data-bs-target="#nav-by-year" type="button" role="tab" aria-controls="nav-by-year" aria-selected="false">By this year</button>
                                    <button class="nav-link" id="nav-by-month-tab" data-bs-toggle="tab" data-bs-target="#nav-by-month" type="button" role="tab" aria-controls="nav-by-month" aria-selected="false">By this month</button>
                                    <button class="nav-link" id="nav-by-week-tab" data-bs-toggle="tab" data-bs-target="#nav-by-week" type="button" role="tab" aria-controls="nav-by-week" aria-selected="false">By this week</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">

                                <!-- Best selling of all time -->
                                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab" tabindex="0">
                                    <div class="table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Date for sale</th>
                                                    <th>Price</th>
                                                    <th>Sold</th>
                                                    <th>More</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- top 5 best selling products -->
                                                @foreach($mostSold as $mostSold)
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('dist/img/product/' . $mostSold->products->image)}}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                        {{$mostSold->products->product_name}}
                                                    </td>
                                                    <td>{{$mostSold->products->created_at}}</td>
                                                    <td>${{$mostSold->products->selling_price}}</td>
                                                    <td>
                                                        {{$mostSold->count}} Sold
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('product/' . $mostSold->product_id . '/detail') }}" class="text-muted">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Best selling this year -->
                                <div class="tab-pane fade" id="nav-by-year" role="tabpanel" aria-labelledby="nav-by-year-tab" tabindex="0">
                                    <div class="table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Date for sale</th>
                                                    <th>Price</th>
                                                    <th>Sold</th>
                                                    <th>More</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- top 5 best selling products -->
                                                @foreach($mostSoldThisYear as $mostSoldThisYear)
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('dist/img/product/' . $mostSoldThisYear->products->image)}}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                        {{$mostSoldThisYear->products->product_name}}
                                                    </td>
                                                    <td>{{$mostSoldThisYear->products->created_at}}</td>
                                                    <td>${{$mostSoldThisYear->products->selling_price}}</td>
                                                    <td>
                                                        {{$mostSoldThisYear->count}} Sold
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('product/' . $mostSoldThisYear->product_id . '/detail') }}" class="text-muted">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Best selling this month -->
                                <div class="tab-pane fade" id="nav-by-month" role="tabpanel" aria-labelledby="nav-by-month-tab" tabindex="0">
                                    <div class="table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <td>Date for sale</td>
                                                    <th>Price</th>
                                                    <th>Sold</th>
                                                    <th>More</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- top 5 best selling products -->
                                                @foreach($mostSoldThisMonth as $mostSoldThisMonth)
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('dist/img/product/' . $mostSoldThisMonth->products->image)}}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                        {{$mostSoldThisMonth->products->product_name}}
                                                    </td>
                                                    <td>{{$mostSoldThisMonth->products->created_at}}</td>
                                                    <td>${{$mostSoldThisMonth->products->selling_price}}</td>
                                                    <td>
                                                        {{$mostSoldThisMonth->count}} Sold
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('product/' . $mostSoldThisMonth->product_id . '/detail') }}" class="text-muted">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>

                                <!-- Best selling this week -->
                                <div class="tab-pane fade" id="nav-by-week" role="tabpanel" aria-labelledby="nav-by-week-tab" tabindex="0">
                                    <div class="table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <td>Date for sale</td>
                                                    <th>Price</th>
                                                    <th>Sold</th>
                                                    <th>More</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- top 5 best selling products -->
                                                @foreach($mostSoldThisWeek as $mostSoldThisWeek)
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('dist/img/product/' . $mostSoldThisWeek->products->image)}}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                        {{$mostSoldThisWeek->products->product_name}}
                                                    </td>
                                                    <td>{{$mostSoldThisWeek->products->created_at}}</td>
                                                    <td>${{$mostSoldThisWeek->products->selling_price}}</td>
                                                    <td>
                                                        {{$mostSoldThisWeek->count}} Sold
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('product/' . $mostSoldThisWeek->product_id . '/detail') }}" class="text-muted">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>

                        </div>

                        <!-- Worst selling -->
                        <!-- /.tab-pane -->
                        <div class="tab-pane" id="tab_3">
                            <nav>
                                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                    <button class="nav-link active" id="nav-worst-of-all-tab" data-bs-toggle="tab" data-bs-target="#nav-worst-of-all" type="button" role="tab" aria-controls="nav-worst-of-all" aria-selected="true">Of all time</button>
                                </div>
                            </nav>
                            <div class="tab-content" id="nav-tabContent">
                                <div class="tab-pane fade show active" id="nav-worst-of-all" role="tabpanel" aria-labelledby="nav-worst-of-all-tab" tabindex="0">
                                    <div class="table-responsive p-0">
                                        <table class="table table-striped table-valign-middle">
                                            <thead>
                                                <tr>
                                                    <th>Product</th>
                                                    <th>Price</th>
                                                    <th>Sold</th>
                                                    <th>More</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                                <!-- top 5 worst selling products -->
                                                @foreach($worstSold as $worstSold)
                                                <tr>
                                                    <td>
                                                        <img src="{{asset('dist/img/product/' . $worstSold->image)}}" alt="Product 1" class="img-circle img-size-32 mr-2">
                                                        {{$worstSold->product_name}}
                                                    </td>
                                                    <td>{{$worstSold->selling_price}}$</td>
                                                    <td>
                                                        {{$worstSold->total_quantity}} Sold
                                                    </td>
                                                    <td>
                                                        <a href="{{ url('product/' . $worstSold->id . '/detail') }}" class="text-muted">
                                                            <i class="fas fa-search"></i>
                                                        </a>
                                                    </td>
                                                </tr>
                                                @endforeach

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="tab-pane fade" id="nav-profile" role="tabpanel" aria-labelledby="nav-profile-tab" tabindex="0">...</div>
                                <div class="tab-pane fade" id="nav-contact" role="tabpanel" aria-labelledby="nav-contact-tab" tabindex="0">...</div>
                                <div class="tab-pane fade" id="nav-disabled" role="tabpanel" aria-labelledby="nav-disabled-tab" tabindex="0">...</div>
                            </div>

                        </div>
                        <!-- /.tab-pane -->
                    </div>
                    <!-- /.tab-content -->
                </div><!-- /.card-body -->

                <div class="card-footer clearfix">
                    <a href="/product/index" class="btn btn-sm btn-info float-left">View all products</a>
                    <a href="/order/index" class="btn btn-sm btn-secondary float-right">View All Orders</a>
                </div><!-- /.card-footer -->
            </div>
            <!-- ./card -->
        </div>
        <!-- /.col -->
    </div>

    <!-- CHARTS -->
    <section class="content chart-container">
        <div class="container-fluid">
            <ul class="nav nav-pills nav-fill" style="margin: 15px 0;">
                <li class="nav-item">
                    <a class="btn nav-link active" id="switchWeekly">Weekly</a>
                </li>
                <li class="nav-item">
                    <a class="btn nav-link" id="switchMonthly">Monthly</a>
                </li>
                <li class="nav-item">
                    <a class="btn nav-link" id="switchYearly">Last year</a>
                </li>
            </ul>
            <div class="row">

                <div class="col-md-6">

                    <!-- AREA CHART -->
                    <div class="card card-primary">
                        <div class="card-header">
                            <h3 class="card-title">Area Chart</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="myChart"></canvas>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>

                    <!-- DOUGHNUT -->
                    <div class="card card-danger">
                        <div class="card-header">
                            <h3 class="card-title">Donut Chart</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <canvas id="doughnut"></canvas>
                        </div>
                    </div>

                </div>

                <div class="col-md-6">

                    <!-- LINE CHART -->
                    <div class="card card-info">
                        <div class="card-header">
                            <h3 class="card-title">Line Chart</h3>

                            <div class="card-tools">
                                <button type="button" class="btn btn-tool" data-card-widget="collapse">
                                    <i class="fas fa-minus"></i>
                                </button>
                                <button type="button" class="btn btn-tool" data-card-widget="remove">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                        </div>
                        <div class="card-body">
                            <div class="chart">
                                <canvas id="line"></canvas>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section class="modals">

        <!-- Modal today order -->
        <div class="modal fade" id="today-order" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Latest orders</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">Total</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Time ordered</th>
                                    <th scope="col">More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($todaysOrder as $todaysOrder)
                                <tr>
                                    <th scope="row">{{$todaysOrder->id}}</th>
                                    <td>{{$todaysOrder->total_amount}}</td>
                                    <td>
                                        @if($todaysOrder->status == 1)
                                        <span class="badge badge-warning">Pending</span>
                                        @elseif($todaysOrder->status == 2)
                                        <span class="badge badge-primary">Accepted</span>
                                        @elseif($todaysOrder->status == 3)
                                        <span class="badge badge-success">Shipping</span>
                                        @elseif($todaysOrder->status == 4)
                                        <span class="badge badge-success">Delivered</span>
                                        @elseif($todaysOrder->status == 5)
                                        <span class="badge badge-success">Completed</span>
                                        @elseif($todaysOrder->status == 0)
                                        <span class="badge badge-danger">Cancelled</span>
                                        @endif
                                    </td>
                                    <td>{{$todaysOrder->order_date}}</td>
                                    <td>
                                        <a href="{{ url('order/' . $todaysOrder->id . '/detail') }}" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>

        <!-- Modal low supply -->
        <div class="modal fade" id="low-supply" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg modal-dialog-centered modal-dialog-scrollable">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="staticBackdropLabel">Low supply products</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th scope="col">Id</th>
                                    <th scope="col">product name</th>
                                    <th scope="col">Quantity</th>
                                    <th scope="col">For sale since</th>
                                    <th scope="col">More</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($lowSupply as $lowSupply)
                                <tr>
                                    <th scope="row">{{$lowSupply->id}}</th>
                                    <td>{{$lowSupply->product_name}}</td>
                                    <td>{{$lowSupply->quantity}}</td>
                                    <td>{{$lowSupply->created_at}}</td>
                                    <td>
                                        <a href="{{ url('product/' . $lowSupply->id . '/fix') }}" class="text-muted">
                                            <i class="fas fa-search"></i>
                                        </a>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                        <button type="button" class="btn btn-primary">Understood</button>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <script type="text/javascript">
    {{ksort($weeklyRevenue);}}
    {{ksort($monthlyRevenue);}}
    const weeklyRevenueData = {!! json_encode(array_values($weeklyRevenue)) !!};
    const monthlyData = {!! json_encode(array_values($monthlyRevenue)) !!};
    const yearlyData = {!! json_encode(array_values($yearlyRevenue)) !!};
    </script>

    <script>
        const ctx = document.getElementById('myChart').getContext('2d');
        const myChart = new Chart(ctx, {
            type: 'bar',
            data: {
                labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                datasets: [{
                    label: 'Weekly Revenue',
                    data: Object.values(weeklyRevenueData),
                    backgroundColor: 'rgba(75, 192, 192, 0.6)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 1,
                }],
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                scales: {
                    y: {
                        beginAtZero: true,
                    },
                },
            },
        });


        const doughnut = document.getElementById('doughnut');

        const doughnutChart = new Chart(doughnut, {
            type: 'doughnut',
            data: {
                labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                datasets: [{
                    label: 'Weekly Revenue',
                    data: Object.values(weeklyRevenueData),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    xAxes: [{
                        type: 'category',
                        afterFit: function(me) {
                            me.paddingLeft = 0;
                            me.paddingRight = 0;
                        }
                    }],
                }
            }
        });

        const line = document.getElementById('line');

        const lineChart = new Chart(line, {
            type: 'line',
            data: {
                labels: ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'],
                datasets: [{
                    label: 'Weekly Revenue',
                    data: Object.values(weeklyRevenueData),
                    borderWidth: 1
                }]
            },
            options: {
                scales: {
                    y: {
                        beginAtZero: true
                    },
                    xAxes: [{
                        type: 'category',
                        afterFit: function(me) {
                            me.paddingLeft = 0;
                            me.paddingRight = 0;
                        }
                    }],
                }
            }
        });

        const weeklyLabels = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
        const monthlyLabels = ['January', 'Febuary', 'March', 'April', 'May', 'June', 'July','August','September','October','November','December'];
        const yearlyLabels = ['Last year','This year']

        document.getElementById('switchWeekly').addEventListener('click', () => {
            myChart.data.labels = weeklyLabels; // Update labels
            myChart.data.datasets[0].data = Object.values(weeklyRevenueData); // Update data
            doughnutChart.data.labels = weeklyLabels; // Update labels
            doughnutChart.data.datasets[0].data = Object.values(weeklyRevenueData); // Update data
            lineChart.data.labels = weeklyLabels; // Update labels
            lineChart.data.datasets[0].data = Object.values(weeklyRevenueData); // Update data
            myChart.update(); // Refresh the chart
            doughnutChart.update(); // Refresh the chart
            lineChart.update(); // Refresh the chart
        });

        document.getElementById('switchMonthly').addEventListener('click', () => {
            myChart.data.labels = monthlyLabels; // Update labels
            myChart.data.datasets[0].data = Object.values(monthlyData); // Update data
            doughnutChart.data.labels = monthlyLabels; // Update labels
            doughnutChart.data.datasets[0].data = Object.values(monthlyData); // Update data
            lineChart.data.labels = monthlyLabels; // Update labels
            lineChart.data.datasets[0].data = Object.values(monthlyData); // Update data
            myChart.update(); // Refresh the chart
            doughnutChart.update(); // Refresh the chart
            lineChart.update(); // Refresh the chart
        });

        document.getElementById('switchYearly').addEventListener('click', () => {
            myChart.data.labels = yearlyLabels; // Update labels
            myChart.data.datasets[0].data = Object.values(yearlyData); // Update data
            doughnutChart.data.labels = yearlyLabels; // Update labels
            doughnutChart.data.datasets[0].data = Object.values(yearlyData); // Update data
            lineChart.data.labels = yearlyLabels; // Update labels
            lineChart.data.datasets[0].data = Object.values(yearlyData); // Update data
            myChart.update(); // Refresh the chart
            doughnutChart.update(); // Refresh the chart
            lineChart.update(); // Refresh the chart
        });
    </script>

    @endsection