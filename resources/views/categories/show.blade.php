@extends('layouts.master')

@section('title')
@endsection

@section('banner')
<section class="banner-area organic-breadcrumb">
<div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
        <div class="col-first">
          <h1>
            {{$category->name}}
            
          @auth
          @if(auth()->user()->isAdmin())
          <a href="{{url('categories/edit/'.$category->id)}}" class="btn btn-info btn-sm">Edit</a>
          <a href="{{url('categories/delete/'.$category->id)}}" class="btn btn-danger btn-sm">Delete</a></h1>
          @endif
          @endauth
          </h1>
        </div>
    </div>
</div> 
</section>
@endsection

@section('content') 

<div class="container">
  <section class="women-product-area section-gap" id="women">
    <div class="container">
      <div class="countdown-content pb-40">
        <div class="title text-center">
          <h1 class="mb-10">New released Products for {{$category->name}}</h1>
          <p>Buy now and save money.</p>
        </div>
      </div>
      <div class="row">
        @foreach($category->products as $product)
        <div class="col-lg-3 col-md-6 single-product">
                      <div class="content">
                          <div class="content-overlay"></div>
                             <img class="content-image img-fluid d-block mx-auto" src="{{url($product->picture)}}" alt="">
                          <div class="content-details fadeIn-bottom">
                                <div class="bottom d-flex align-items-center justify-content-center">
                                    <a href="#"><span class="lnr lnr-heart"></span></a>
                                    <a href="{{url('product/'.$product->url)}}" title="View Details"><span class="lnr lnr-layers"></span></a>
                                    <a href="javascript:addcart({{$product->id}})"><span class="lnr lnr-cart"></span></a>
                                    <a href="#" data-toggle="modal" data-target="#exampleModal"><span class="lnr lnr-frame-expand"></span></a>
                                </div>
                          </div>
                      </div>
                                          <div class="price">
                                <h5 class="text-white"><a href="{{url('product/'.$product->url)}}" style="color: white;">{{$product->name}}</a>
                                 </h5>
                                <h3 class="text-white">
                                  <a href="{{url('product/'.$product->url)}}" style="color: white;">
                                    &#8358; {{number_format($product->price/100, 2)}}
                                  </a>
                                </h3>
                           </div>
                           <div class="text-success" id="cart_feedback{{$product->id}}"></div>
                                                                     
                    </div>
       
        @endforeach
      </div>
    </div>
  </section>
</div>

@endsection