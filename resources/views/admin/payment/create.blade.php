@extends('admin.layout.master')
@section('title', 'laptopshop')
@section('content')
    <style>
        .center {
            padding-left: 40%;
            padding-top: 5px;
        }
    </style>
    <div class="card">
        <div class="card-header">
            <h3 class="card-title">Add payment method</h3>
        </div>
        <form action= "{{ route('payment.store') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <div class="col-lg-12">
                        <div>
                            <label>Payment method</label>
                            <input id="form" required name="method_name" class="form-control"
                                value="{{ old('method_name') }}">
                            @error('method_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </table>
            </div>
            <div class="card-footer center ">
                <button type="submit" class="btn btn-success">Add method</button>
                <button type="reset" class="btn btn-default">Refresh</button>
            </div>
        </form>
    </div>
@endsection
