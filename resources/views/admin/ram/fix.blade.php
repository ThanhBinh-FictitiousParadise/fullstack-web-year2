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
                <form action= "{{ url('/ram/' . $ram->id . '/fix') }}" role="form" method="post" enctype="multipart/form-data">
                    @csrf
                    @method('Put')
                    <div class="card-body">
                        <table id="example1" class="table table-bordered table-striped">
                            <div class="col-lg-12">
                    <div>
                        <label>Ram name</label>
                        <input  required name="ram_name" class="form-control" value="{{ $ram->ram_name }}">
                        @error('ram_name')
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
