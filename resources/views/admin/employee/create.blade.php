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
            <h3 class="card-title">Add employee</h3>
        </div>
        <form action= "{{ route('employee.store') }}" role="form" method="post" enctype="multipart/form-data">
            @csrf
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <div class="col-sm-6 " style=" float : left ">
                        <div class="col-lg-12">
                            <div>
                                <label>Employee name</label>
                                <input id="form" required name="admin_name" class="form-control"
                                    value="{{ old('admin_name') }}">
                                @error('admin_name')
                                    <span class="text-danger">{{ $message }}</span>
                                @enderror
                            </div>
                            <div>
                                <label>Phone number</label>
                                <input type="text" class="form-control" placeholder="Phone number" name="phone_number"
                                    value="{{ old('phone_number') }}">
                            </div>
                            @if ($errors->has('phone_number'))
                                <div class="mb-3">
                                    <span class="text-danger">{{ $errors->first('phone_number') }}</span>
                                </div>
                            @endif
                            <div>
                                <label>Email</label>
                                <input type="email" class="form-control" placeholder="Email" name="email"
                                    value="{{ old('email') }}">
                            </div>
                            @if ($errors->has('email'))
                                <div class="mb-3">
                                    <span class="text-danger">{{ $errors->first('email') }}</span>
                                </div>
                            @endif
                            <div>
                                <label>Password</label>
                                <input type="password" class="form-control" placeholder="Password" name="password"
                                    value="{{ old('password') }}">
                            </div>
                        </div>
                    </div>
                    <div class="col-sm-6 " style=" float : left ">
                        <div class="col-lg-12">
                            <div>
                                <label>Image </label>
                                <input id="form" required name="image" type="file" onchange = "preview();">
                                <br>
                                <div>
                                    <img src="#" id="image" width="150" height= " 200">
                                </div>
                            </div>
                        </div>
                    </div>
                </table>
            </div>
            <div class="card-footer center ">
                <button type="submit" class="btn btn-success">Add employee</button>
                <button type="reset" class="btn btn-default">Refresh</button>
            </div>
        </form>
    </div>
@endsection
