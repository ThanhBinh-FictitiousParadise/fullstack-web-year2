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
                        <th>Employee name</th>
                        <th>Image</th>
                        <th>Phone number</th>
                        <th>Email</th>
                        <th>Operation</th>
                    </tr>
                </threat>
                <tbody>
                    @foreach ($employee as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->admin_name }}</td>
                            <td>
                                <img src="{{ asset($item->image)}}" class="border p-2 m-3" style="width: 100px; height: 100px" alt="Img">
                            </td>
                            <td>{{ $item->phone_number }}</td>
                            <td>{{ $item->email }}</td>
                            <td class="form-group">
                                <a href="{{ url('employee/' . $item->id . '/fix') }}" class="btn btn-primary">
                                    <i class="fas fa-solid fa-wrench"></i>
                                </a>
                                <a href="{{ url('employee/' . $item->id . '/delete') }}" class="btn btn-danger"
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
                {{ $employee->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
