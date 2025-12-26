@extends('customer.layout.master')
@section('title', 'laptopshop')
@section('content')
<style>
    .card-img {
        height: 80px;
        object-fit: cover;
        width: 80px;
    }
</style>
<!-- Product -->
@if(session('success'))
<div class="alert alert-success">
    {{ session('success') }}
</div>
@elseif(session('fail'))
<div class="alert alert-danger">
    {{ session('fail') }}
</div>
@endif
<section id="cart-items">
    <div class="container">
        <div class="table-responsive cart_info">
            <table id="cart" class="table table-bordered">
                <thead>
                    <tr class=" cart_menu">
                        <td>Product</td>
                        <td>Image</td>
                        <td>Price</td>
                        <td>Quantity</td>
                        <td>Total</td>
                        <td>Action</td>
                    </tr>
                </thead>
                <tbody>
                    @php
                    $total = 0;
                    @endphp
                    @if (session('cart'))
                    @foreach (session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr rowId="{{ $id }}">
                        <td data-th="Product">
                            <h5 class="nomargin">{{ $details['name'] }}</h5>
                        </td>
                        <td data-th="Image">
                            <img src="{{asset('dist/img/product/' . $details['image'])}}" class="card-img" />
                        </td>
                        <td data-th="Price">{{ number_format($details['price']) }}đ</td>
                        <td data-th="Quantity">
                            <input type="number" value="{{ $details['quantity'] }}" class="form-control quantity cart_update" min="1" />
                        </td>
                        <td data-th="Subtotal" class="text-center">{{ number_format($details['price'] * $details['quantity']) }}đ</td>
                        <td class="actions" data-th="Action">
                            <button class="btn btn-danger btn-sm delete-product" id="delete-product">Delete</button>
                        </td>
                    </tr>
                    @endforeach
                    @endif
                </tbody>

                <tfoot>
                    <tr>
                        <td colspan="6" style="text-align:right;">
                            <h3><strong>Total {{ number_format($total) }}đ</strong></h3>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="6" style="text-align:right;">

                            <div class="buttons-container">
                                <a href="/" class="btn btn-danger"> <i class="fa fa-arrow-left"></i> Continue Shopping</a>
                                @if (!session()->has('customer_key'))
                                <a href="/login" class="btn btn-primary" id="checkout-live-button"><i class="fa fa-money"></i> Login</a>
                                @else
                                <a href="/pay" class="btn btn-success" id="checkout-live-button"><i class="fa fa-money"></i> Checkout</a>
                                @endif
                            </div>
                        </td>
                    </tr>
                </tfoot>

            </table>
        </div>
    </div>
</section>

<script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $(document).on('change', '.cart_update', function(e) {
            e.preventDefault();
            var ele = $(this);
            $.ajax({
                url: "{{ route('update_cart') }}",
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.closest("tr").attr("rowId"),
                    quantity: ele.val()
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(document).on('click', '#delete-product', function(e2) {
            e2.preventDefault();
            var ele = $(this);
            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: "{{ route('delete.cart.product') }}",
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.closest("tr").attr("rowId")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });

    });
</script>
<script type="text/javascript">
    $(document).ready(function() {
        $(".edit-cart-info").change(function(e3) {
            e3.preventDefault();
            var ele = $(this);
            $.ajax({
                url: "{{ route('update_cart') }}",
                method: "patch",
                data: {
                    _token: '{{ csrf_token() }}',
                    id: ele.parents("tr").attr("rowId"),
                },
                success: function(response) {
                    window.location.reload();
                }
            });
        });

        $(".delete-product").click(function(e4) {
            e4.preventDefault();

            var ele = $(this);

            if (confirm("Do you really want to delete?")) {
                $.ajax({
                    url: "{{ route('delete.cart.product') }}",
                    method: "DELETE",
                    data: {
                        _token: '{{ csrf_token() }}',
                        id: ele.parents("tr").attr("rowId")
                    },
                    success: function(response) {
                        window.location.reload();
                    }
                });
            }
        });
    });
</script>
@endsection