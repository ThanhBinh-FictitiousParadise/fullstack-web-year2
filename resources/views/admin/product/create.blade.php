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
        <h3 class="card-title">Add product</h3>
    </div>
    <form action="{{ route('product.store') }}" role="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <table id="example1" class="table table-bordered table-striped">
                <div class="col-sm-6 " style=" float : left ">
                    <div class="col-lg-12">
                        <div>
                            <label>Product name</label>
                            <input id="form" required name="product_name" class="form-control" value="{{ old('product_name') }}">
                            @error('product_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label>Quantity</label>
                            <input id="form" required name="quantity" type="number" min="0" class="form-control" value="{{ old('quantity') }}">
                        </div>
                        <div>
                            <label>Price</label>
                            <input id="form" required name="selling_price" type="number" min="0" class="form-control" value="{{ old('selling_price') }}">
                        </div>
                        <div>
                            <label>Image product</label>
                            <input id="form" required name="image" type="file" onchange="preview();">
                            <br>
                            <div>
                                <img src="#" id="image" width="150" height=" 200">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-6 " style=" float : right ">
                    <div class="col-lg-12">
                        <div>
                            <label>Category</label>
                            <select required name="category_id" class="form-control">
                                <option selected>Select category</option>
                                @foreach ($category as $key => $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->category_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Cpu</label>
                            <select required name="cpu_id" class="form-control">
                                <option selected>Select cpu</option>
                                @foreach ($cpu as $key => $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->cpu_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Ram</label>
                            <select required name="ram_id" class="form-control">
                                <option selected>Select ram</option>
                                @foreach ($ram as $key => $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->ram_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Ssd</label>
                            <select required name="ssd_id" class="form-control">
                                <option selected>Select ssd</option>
                                @foreach ($ssd as $key => $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->ssd_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Screen</label>
                            <select required name="screen_id" class="form-control">
                                <option selected>Select screen</option>
                                @foreach ($screen as $key => $value)
                                <option value="{{ $value->id }}">
                                    {{ $value->screen_name }}
                                </option>
                                @endforeach
                            </select>
                        </div>
                        <div>
                            <label>Feature</label>
                            <input id="form" required name="feature" class="form-control" value="{{ old('feature') }}">
                        </div>
                        <div>
                            <label>Description</label>
                            <textarea id="form" name="pro_desc" class="form-control" value="{{ old('pro_desc') }}"></textarea>
                            @error('Pro_desc')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                    </div>
                </div>
            </table>
        </div>
        <div class="card-footer center ">
            <button type="submit" class="btn btn-success">Add new</button>
            <button type="reset" class="btn btn-default">Refresh</button>
        </div>
    </form>
</div>
@endsection