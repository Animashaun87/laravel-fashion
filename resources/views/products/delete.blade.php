@extends('layouts.master')

@section('title')
Delete Product
@endsection

@section('banner')
<section class="banner-area organic-breadcrumb">
<div class="container">
    <div class="breadcrumb-banner d-flex flex-wrap align-items-center">
        <div class="col-first">
          <h1>
              Delete Product  
         </h1>
        </div>
    </div>
</div>
</section>

@endsection

@section('content')
 <div class="container">
     <div class="row">
         <div class="col-md-6 col-md-3">
             <h1>Delete Product</h1>
             <form method="post" action="{{url('products/delete/'.$product->id)}}" enctype="multipart/form-data">
             	@csrf
             	<div class="form-group">
             		<div class="col-md-2">
             			<label for="name">Name*</label>
             		</div>
             		<div class="col-md-10">
             			<div class="form-control">{{$product->name}}</div>
             	</div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="price">Price*</label>
                    </div>
                    <div class="col-md-10">
                    	<div class="form-control">{{$product->price/100}}</div>
                    </div>
                </div>

                <div class="form-group">
                    <div class="col-md-2">
                        <label for="category">Category*</label>
                    </div>
                    <div class="col-md-10">
                          <div class="form-control">@if($product->category){{$product->category->name}}@endif</div>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-2">
                        <label for="description">Description*</label>
                    </div>
                    <div class="col-md-10">
                        <div class="form-control">{{$product->description}}</div>
                    </div>
                </div>
             	<div class="form-group">
             		<div class="col-md-2">
             			<label for="picture">Picture*</label>
             		
             		</div>
             		<div class="col-md-10">
             				@if($product->picture)
             				<img src="{{url($product->picture)}}" width="70px">
             				@endif
             		</div>
             	</div>


                <div class="text-danger">
                    <strong>*</strong> = Required fields
                </div>
             	<div class="form-group">
             		<button type="submit" class="btn btn-primary">
             			Delete Product
             		</button>
             	</div>
             </form>
         </div>
     </div>
 </div>
@endsection