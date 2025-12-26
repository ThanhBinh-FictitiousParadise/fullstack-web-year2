@extends('admin.layout.master')
@section('title', 'laptopshop')
@section('content')
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Index</h3>
        </div>
        <div class="card-body">
            <table id="example2" class="table table-bordered table-hover">
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Ram name</th>
                        <th>Operation</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($ram as $item)
                        <tr>
                            <td>{{ $item->id }}</td>
                            <td>{{ $item->ram_name }}</td>
                            <td class="form-group">
                                <a href="{{ url('ram/' . $item->id . '/fix') }}" class="btn btn-primary">
                                    <i class="fas fa-solid fa-wrench"></i>
                                </a>
                                <a href="{{ url('ram/' . $item->id . '/delete') }}" class="btn btn-danger"
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
                {{ $ram->onEachSide(1)->links() }}
            </div>
        </div>
    </div>
@endsection
