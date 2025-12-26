@extends('admin.layout.master')
@section('title', 'laptopshop')
@section('content')
<div class="card">
    <div class="card-header">
        <h3 class="card-title">Index</h3>
    </div>
    {{ session('status') }}
    <div class="card-body">
        <table id="example1" class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Product name</th>
                    <th>Image</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Operation</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($product as $item)
                <tr>
                    <td>{{ $item->id }}</td>
                    <td>{{ $item->product_name }}</td>
                    <td>
                        <img src="{{asset('dist/img/product/' . $item->image)}}" class="border p-2 m-3" style="width: 100px; height: 100px" alt="Img">
                    </td>
                    <td>{{ $item->selling_price }}$</td>
                    <td>{{ $item->quantity }}</td>
                    <td class="form-group">
                        <a href="{{ url('product/' . $item->id . '/detail') }}" class="btn btn-primary">
                            <i class="fas fa-regular fa-clipboard-list"></i>
                        </a>
                        <a href="{{ url('product/' . $item->id . '/fix') }}" class="btn btn-primary">
                            <i class="fas fa-solid fa-wrench"></i>
                        </a>
                        <a href="{{ url('product/' . $item->id . '/delete') }}" class="btn btn-danger" onclick="return confirm('Are you sure ?')">
                            <i class="fas fa-light fa-trash"></i>
                        </a>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
    <div class="row justify-content-center">
        <div class="col-md-7 ml-auto">
            {{ $product->onEachSide(1)->links() }}
        </div>
    </div>
</div>
@endsection