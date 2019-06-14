@extends('layouts.master')

@section('banner')
<section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Checkout</h1>
                        </div>
                    </div>
                </div>
            </section>
@endsection

@section('content')
<div class="container">
    <div action="#" class="billing-form">
        <div class="row">
            <div class="col-lg-8 col-md-6">
                <h3 class="billing-title mt-20 mb-10">Billing Details</h3>
                <div class="row">
                <form class="row" method="post" action="{{url('profile_update')}}">
                	@csrf
                    <div class="col-lg-12">
                        <input type="text" placeholder="Name*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Name*'" required="" value="{{auth()->user()->name}}" class="common-input" name="name">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" placeholder="Phone number*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Phone number*'" required="" class="common-input" value="{{auth()->user()->phone_number}}" name="phone_number">
                    </div>
                    <div class="col-lg-6">
                        <input type="email" placeholder="Email Address*" onfocus="this.placeholder=''" onblur="this.placeholder = 'Email Address*'" value="{{auth()->user()->email}}" required="" class="common-input" name="email">
                    </div>
                    <div class="col-lg-12">
                        <textarea placeholder="Address" onfocus="this.placeholder=''" onblur="this.placeholder = 'Address'" required="" class="common-input" required="" name="address">{{auth()->user()->address}}</textarea>
                    </div>
                    <div class="col-lg-6">
                        <input type="text" placeholder="Town/City" onfocus="this.placeholder=''" onblur="this.placeholder = 'Town/City*'" required="" class="common-input" value="{{auth()->user()->town}}" name="town">
                    </div>
                    <div class="col-lg-6">
                        <input type="text" placeholder="State" onfocus="this.placeholder=''" onblur="this.placeholder = 'State'" value="{{auth()->user()->state}}" required="" class="common-input" name="state">
                    </div>

                    <div class="col-lg-12">
                        <div class="sorting">
                            <input type="country" placeholder="Country" onfocus="this.placeholder=''" onblur="this.placeholder = 'Country'" value="{{auth()->user()->country}}" required="" class="common-input" name="country">
                        </div>
                    </div>
                <div class="mt-20">
                    <button type="submit" class="btn btn-block btn-primary">
                    	Update my Details
                    </button>
                </div>
            </form>
                </div>
            </div>
            
            <div class="col-lg-4 col-md-6">
                <div class="order-wrapper mt-50">
                    <h3 class="billing-title mb-10">Your Order</h3>
                    <div class="order-list">
                        <div class="list-row d-flex justify-content-between">
                            <div>Product</div>
                            <div>Total</div>
                        </div>
                        @php $total = 0; @endphp
                        @foreach($carts as $cart)
                        <div class="list-row d-flex justify-content-between">
                            <div>{{$cart->name}}</div>
                            <div>x {{$cart->qty}}</div>
                            <div>&#8358; {{number_format(($cart->qty * $cart->price), 2)}}</div>
                        </div>
                        @php $total += ($cart->qty * $cart->price); @endphp
                        @endforeach
                        <div class="list-row d-flex justify-content-between">
                            <h6>Total</h6>
                            <div class="total">&#8358; {{Cart::subtotal()}}</div>
                        </div>
                        
                        {{-- <div class="mt-20 d-flex align-items-start">
                            <input type="checkbox" class="pixel-checkbox" id="login-4">
                            <label for="login-4">I’ve read and accept the <a href="#" class="terms-link">terms &amp; conditions*</a></label>
                        </div> --}}
                        <form method="POST" action="{{ route('pay') }}" accept-charset="UTF-8" class="form-horizontal" role="form">
                        	@csrf
					            <input type="hidden" name="email" value="{{auth()->user()->email}}">
					            <input type="hidden" name="orderID" value="{{$orderId}}">
					            <input type="hidden" name="amount" value="{{$total*100}}"> 
					            <input type="hidden" name="quantity" value="1">
					            <input type="hidden" name="reference" value="{{ Paystack::genTranxRef() }}">
					            <p>
					              <button class="view-btn color-2 w-100 mt-20"><span>Proceed to Payment</span></button>
					            </p>
						</form>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection