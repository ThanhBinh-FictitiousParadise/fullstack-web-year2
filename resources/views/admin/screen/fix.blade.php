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
            <h3 class="card-title">Modify</h3>
        </div>
        <form action= "{{ url('/screen/' . $screen->id . '/fix') }}" role="form" method="post"
            enctype="multipart/form-data">
            @csrf
            @method('Put')
            <div class="card-body">
                <table id="example1" class="table table-bordered table-striped">
                    <div class="col-lg-12">
                        <div>
                            <label>Screen name</label>
                            <input id="form" required name="screen_name" class="form-control"
                                value="{{ $screen->screen_name }}">
                            @error('screen_name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </table>
            </div>
            <div class="card-footer center ">
                <button type="submit" class="btn btn-success">Update</button>
                <button type="reset" class="btn btn-default">Refresh</button>
            </div>
        </form>
    </div>
@endsection
