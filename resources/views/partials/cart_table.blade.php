@if($carts->isEmpty())
<h4 class="text-danger text-center">
    No item in cart. <a href="{{url('')}}" class="btn btn-info">
        Keep shoppping
    </a>
</h4>
@else
<div class="cart-title">
    <div id="cart_table_feedback"></div>
        <div class="row">
            <div class="col-md-4">
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
            <div class="col-md-2">
                &nbsp;
            </div>

        </div>
    </div>
    @foreach($carts as $cart)
    <div class="cart-single-item">
        <div class="row align-items-center">
            <div class="col-md-4 col-12">
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
                    <input type="text" class="quantity-amount" id="cart_qty{{$cart->rowId}}" value="{{$cart->qty}}" onkeyup="update_cart_table('{{$cart->rowId}}')" />
                    <div class="arrow-btn d-inline-flex flex-column">
                        <button class="increase arrow" type="button" title="Increase Quantity" onclick="update_cart_table('{{$cart->rowId}}')"><span class="lnr lnr-chevron-up"></span></button>
                        <button class="decrease arrow" type="button" title="Decrease Quantity" onclick="update_cart_table('{{$cart->rowId}}')"><span class="lnr lnr-chevron-down"></span></button>

                    </div>
                </div>
            </div>
            <div class="col-md-2 col-12">
                <div class="total">&#8358;{{number_format(($cart->price*$cart->qty), 2)}}</div>
            </div>
            <div class="col-md-2 col-12">
                <button type="button" onclick="remove_cart_item('{{$cart->rowId}}')" class="btn btn-xs btn-danger">x</button>
            </div>
        </div>
    </div>
    @endforeach
    <div class="cupon-area d-flex align-items-center justify-content-between flex-wrap">
        <a href="{{url('checkout')}}" class="view-btn color-2"><span>Checkout</span></a>
        <h2>
            <strong>TOTAL:</strong>
            &#8358;{{Cart::subtotal()}}
        </div>
    </div>
@endif