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

    <form action="{{ url('/product/update') }}" role="form" method="post" enctype="multipart/form-data">
        @csrf
        <div class="card-body">
            <input hidden name="id" value="{{$product->id}}">
            <table id="example1" class="table table-bordered table-striped">
                <div class="col-sm-6 " style=" float : left ">
                    <div class="col-lg-12">
                        <div>
                            <label>Product Name</label>
                            <input required name="product_name" class="form-control" value="{{ $product->product_name }}">
                            @error('Product_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label>Quantity</label>
                            <input id="form" required name="quantity" type="number" min="0" class="form-control" value="{{ $product->quantity }}">
                            @error('Product_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div>
                            <label>Price</label>
                            <input id="form" required name="selling_price" type="number" min="0" class="form-control" value="{{ $product->selling_price }}">
                            @error('Product_name')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>
                        <div style="margin-top: 20px;">
                            <label>Image</label>
                            <input name="image" type="file" onchange="preview();">
                            <br>
                            <div>
                                <img src="{{ asset( '/' . $product->image) }}" id="" width="150" height=" 200">
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-sm-6 " style=" float : right ">
                    <div class="col-lg-12">

                        <div>
                            <label>Category</label>
                            <select required name="category_id" class="form-control">
                                @foreach ($category as $key => $value)
                                <option {{ $value->id == $product->category_id ? 'selected':'' }} value="{{ $value->id }}">{{ $value->category_name }}</option>
                                @endforeach
                            </select>
                            @error('category_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label>Cpu</label>
                            <select required name="cpu_id" class="form-control">
                                @foreach ($cpu as $key => $value)
                                <option {{ $value->id == $product->cpu_id ? 'selected':'' }} value="{{ $value->id }}">{{ $value->cpu_name }}</option>
                                @endforeach
                            </select>
                            @error('cpu_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label>Ram</label>
                            <select required name="ram_id" class="form-control">
                                @foreach ($ram as $key => $value)
                                <option {{ $value->id == $product->ram_id ? 'selected':'' }} value="{{ $value->id }}">{{ $value->ram_name }}</option>
                                @endforeach
                            </select>
                            @error('ram_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label>Ssd</label>
                            <select required name="ssd_id" class="form-control">
                                @foreach ($ssd as $key => $value)
                                <option {{ $value->id == $product->ssd_id ? 'selected':'' }} value="{{ $value->id }}">{{ $value->ssd_name }}</option>
                                @endforeach
                            </select>
                            @error('ssd_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label>Screen</label>
                            <select required name="screen_id" class="form-control">
                                @foreach ($screen as $key => $value)
                                <option {{ $value->id == $product->screen_id ? 'selected':'' }} value="{{ $value->id }}">{{ $value->screen_name }}</option>
                                @endforeach
                            </select>
                            @error('screen_id')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div>
                            <label>Feature</label>
                            <input type="number" required name="feature" class="form-control" value="{{ $product->feature }}">
                        </div>

                        <div>
                            <label>Description</label>
                            <textarea required name="pro_desc" class="form-control">{{ $product->pro_desc }}</textarea>
                            @error('Pro_desc')
                            <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                    </div>
                </div> <!--/.main-->
            </table>
        </div>
        <div class="card-footer center">
            <button type="submit" class="btn btn-success">Update</button>
            <button type="reset" class="btn btn-default">Refresh</button>
        </div>
    </form>
</div>
@endsection