@extends('layouts.master')

@section('title')
Shop Now
@endsection

@section('banner')
<section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Cart</h1>
	                     <nav class="d-flex align-items-center justify-content-start">
	                        <a href="{{url('')}}">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
	                        <a href="#">cart</a>
	                    </nav>
                        </div>
                    </div>
                </div>
            </section>
@endsection

@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-6 col-md-3">
             <h1>hurry shop now</h1>
         </div>
     </div>
 </div>
 <div class="container" id="cart_table">
    Awaiting Javascript
</div>
<!--  <div class="container"> 
     <div class="row">
         <div class="col-md-6 col-md-3">
             <h1>hurry shop now</h1>
         </div>
     </div>
 </div>
 <div class="container">
                <div class="cart-title">
                    <div class="row">
                        <div class="col-md-6">
                            <h6 class="ml-15">Product</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Price</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Quantity</h6>
                        </div>
                        <div class="col-md-2">
                            <h6>Total</h6>
                        </div>
                    </div>
                </div>
                @foreach($carts as $cart)
                <div class="cart-single-item">
                    <div class="row align-items-center">
                        <div class="col-md-6 col-12">
                            <div class="product-item d-flex align-items-center">
                                <img src="{{url($cart->model->picture)}}" class="img-fluid" alt="" style="max-width: 100px">
                                <h6>{{$cart->name}}</h6>
                            </div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="price">&#8358; {{number_format($cart->price, 2)}}</div>
                        </div>
                        <div class="col-md-2 col-6">
                            <div class="quantity-container d-flex align-items-center mt-15">
                                <input type="text" class="quantity-amount" value="{{$cart->qty}}" />
                                <div class="arrow-btn d-inline-flex flex-column">
                                    <button class="increase arrow" type="button" title="Increase sQuantity"><span class="lnr lnr-chevron-up"></span></button>
                                    <button class="decrease arrow" type="button" title="Decrease Quantity"><span class="lnr lnr-chevron-down"></span></button>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-2 col-12">
                            <div class="total">&#8358;{{number_format($cart->total, 2)}}</div>
                        </div>
                    </div>
                </div>
                @endforeach
                <div class="cupon-area d-flex align-items-center justify-content-between flex-wrap">
                    <a href="#" class="view-btn color-2"><span>Update Cart</span></a>
                    <div class="cuppon-wrap d-flex align-items-center flex-wrap">
                        <div class="cupon-code">
                            <input type="text">
                            <button class="view-btn color-2"><span>Apply</span></button>
                        </div>
                    </div>
                </div>
            </div> -->
@endsection

 @section('scripts')
<script>
    document.addEventListener('DOMContentLoaded', cart_table())
    function cart_table()
    {
        const table = document.getElementById('cart_table');
        table.innerHTML = '<div class="text-info text-center">Loading...</div>';
        $('#cart_table').load(base+"/cart_table");
    }
    function update_cart_table(rowId) {
        const cart_qty = document.getElementById('cart_qty'+rowId).value;
        if (isNaN(cart_qty) || parseInt(cart_qty) < 1 || cart_qty == "") {
            document.getElementById('cart_qty'+rowId).value = 1;
            return;
        }
        const feedback = document.getElementById('cart_table_feedback');
        feedback.innerHTML = '<div class="text-info text-center">Loading...</div>';
        $('#cart_table').load(base+"/cart_table/"+rowId+"/"+cart_qty);
    }
    function remove_cart_item(rowId) {
        const feedback = document.getElementById('cart_table_feedback');
        feedback.innerHTML = '<div class="text-info text-center">Loading...</div>';
        $('#cart_table').load(base+"/remove_cart_item/"+rowId);
    }
</script>
 @endsection
