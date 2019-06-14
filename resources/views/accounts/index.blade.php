@extends('layouts.master')

@section('title', 'Account')

@section('banner')
<section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>My Account</h1>
                        </div>
                    </div>
                </div>
</section>
@endsection 

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
       		<h1>Account</h1>
       		@include('flash::message')
       		<div class="accordion" id="accordionExample">
  <div class="card">
    <div class="card-header" id="headingOne">
      <h2 class="mb-0">
        <button class="btn btn-link" type="button" data-toggle="collapse" data-target="#collapseOne" aria-expanded="true" aria-controls="collapseOne">
          Profile
        </button>
      </h2>
    </div>

    <div id="collapseOne" class="collapse show" aria-labelledby="headingOne" data-parent="#accordionExample">
      <div class="card-body">
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
  </div>
  <div class="card">
    <div class="card-header" id="headingTwo">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseTwo" aria-expanded="false" aria-controls="collapseTwo">
          Change Password
        </button>
      </h2>
    </div>
    <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionExample">
      <div class="card-body">
        <form class="row" method="post" action="{{url('change_password')}}">
                	@csrf
                    <div class="col-lg-12 form-group">
                        <input type="password" placeholder="Old Password*" required="" name="old_password" class="form-control">
                    </div>
                    <div class="col-lg-12 form-group">
                        <input type="password" placeholder="New Password*" required="" name="new_password" class="form-control">
                    </div>
                    <div class="col-lg-12 form-group">
                        <input type="password" placeholder="Confirm new Password*" required="" name="confirm_password" class="form-control">
                    </div>
                <div class="mt-20 form-group">
                    <button type="submit" class="btn btn-block btn-primary">
                    	Change Password
                    </button>
                </div>
            </form>
      </div>
    </div>
  </div>
  <div class="card">
    <div class="card-header" id="headingThree">
      <h2 class="mb-0">
        <button class="btn btn-link collapsed" type="button" data-toggle="collapse" data-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
          Payment History
        </button>
      </h2>
    </div>
    <div id="collapseThree" class="collapse" aria-labelledby="headingThree" data-parent="#accordionExample">
      <div class="card-body">
        <table border="1" width="100%">
          <thead>
            <tr>
              <th>Product</th>
              <th>Quantity</th>
              <th>Total</th>
              <th>Date</th>
            </tr>
          </thead>
          <tbody>
             @foreach($user->paid_orders as $order)
            
            <tr>
              <td>{{$order->product_name}}</td>
              <td>{{$order->quantity}}</td>
              <td>&#8358;{{number_format($order->total, 2)}}</td>
              <td>{{date('d F, Y h:i:s a', strtotime($order->updated_at))}}</td>
            </tr>
            @endforeach
          </tbody>
        </table>
      </div>
    </div>
  </div>
</div>
   		</div>
   </div>
</div>
@endsection

@section('scripts')
<script>
	$('.collapse').collapse()
</script>
@stop