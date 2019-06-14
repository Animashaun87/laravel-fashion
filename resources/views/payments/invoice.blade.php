@extends('layouts.master')

@section('title')
Invoice
@endsection

@section('banner')
<section class="banner-area organic-breadcrumb">
                <div class="container">
                    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
                        <div class="col-first">
                            <h1>Invoice</h1>
                         <nav class="d-flex align-items-center justify-content-start">
                            <a href="{{url('/')}}">Home<i class="fa fa-caret-right" aria-hidden="true"></i></a>
                            <a href="#">Invoice</a>
                        </nav>
                        </div>
                    </div>
                </div>
            </section>
@endsection

@section('content')
 <div class="container">
     <div class="row">
        @include('flash::message')
         <div class="col-md-12">
             <h3>Invoice. Order ID - {{$payment->batch_code}}</h3>
         </div>
     </div>
 </div>
 <div class="container">
    <p>&nbsp;</p>
    <h4>Payment Details</h4>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Name</th>
                <th>Email</th>
                <th>Address</th>
                <th>Amount Paid</th>
                <th>Payment Date</th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>
                    {{auth()->user()->name}}
                </td>
                <td>
                    {{auth()->user()->email}}
                </td>
                <td>
                    {{auth()->user()->address}}
                </td>
                <td>
                    {{$payment->currency}} {{number_format($payment->amout)}}
                </td>
                <td>
                    {{date('d M, Y', strtotime($payment->transaction_date))}}
                </td>
            </tr>
        </tbody>
    </table>
    <h4>Order Details</h4>
    <table class="table table-striped table-hover">
        <thead>
            <tr>
                <th>Product</th>
                <th>Unit Price(&#8358;)</th>
                <th>Qty</th>
                <th>Total Price(&#8358;)</th>
            </tr>
        </thead>
        <tbody>
            @foreach($payment->orders as $order)
            <tr>
                <td>
                    {{$order->product_name}}
                </td>
                <td>
                    &#8358;{{number_format($order->price, 2)}}
                </td>
                <td>
                    {{$order->quantity}}
                </td>
                <td>
                   &#8358;{{number_format($order->total, 2)}}
                </td>
            </tr>
            @endforeach
        </tbody>
    </table>
</div>

@endsection
