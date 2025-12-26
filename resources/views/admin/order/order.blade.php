@extends('admin.layout.master')
@section('title', 'laptopshop')
@section('content')
<div class="card">
    <div class="card-header">
      <h3 class="card-title">Danh sách</h3>
    </div>
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Tên khách hàng</th>
                    <th>Ngày mua</th>
                    <th>Tổng tiền</th>
                    <th>Thao tác</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($orders as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->customer_name }}</td>
                        <td>{{ $item->order_date }}</td>
                        <td>{{ $item->total_amount }}</td>
                        <td class="form-group">
                            <a href="{{ url('order/' . $item->id . '/detail') }}" class="btn btn-primary">
                                <i class="fas fa-regular fa-clipboard-list"></i>
                            </a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 ml-auto">
            {{ $orders->onEachSide(1)->links() }}
        </div>
    </div>
</div>
@endsection
