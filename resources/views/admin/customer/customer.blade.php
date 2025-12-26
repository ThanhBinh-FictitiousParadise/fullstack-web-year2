@extends('admin.layout.master')
@section('title', 'laptopshop')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Index</h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <threat>
                    <tr>
                        <th>ID</th>
                        <th>Customer name</th>
                        <th>Phone number</th>
                        <th>Address</th>
                        <th>Email</th>
                    </tr>
                </threat>
                <tbody>
                    @foreach ($customer as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->customer_name }}</td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->address }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="form-group">
                                <a href="{{ url('customer/' . $item->id . '/fix') }}" class="btn btn-primary">
                                    <i class="fas fa-solid fa-wrench"></i>
                                </a>
                                <a href="{{ url('customer/' . $item->id . '/delete') }}" class="btn btn-danger"
                                    onclick="return confirm('Are you sure ?')">
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
                {{ $customer->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
